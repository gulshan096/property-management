<?php
     
	 Class RoomModel extends CI_Model
	 {
			
		function __construct()
		{
			parent::__construct();
		}
			
		
		
		public function manageroom()
		{	
		   
		
			$amenities = $array['amenity'] = json_encode($this->input->post("amenity"));		
			$id=$this->input->post('id');
			$roomno=$this->input->post('room_no');
			$seater=$this->input->post('seater');
			$property=$this->input->post('property_id');
			$price=$this->input->post('price');
			$bed_no = $this->input->post('bed_no');
			
			
			
			$senddata	=	array(); 
			$senddata['status']		=	0; 
			$senddata['message']	=	"Something Went wrong, Please try again later...";
			
						
			$new_record	=	$this->db->query("SELECT * FROM `room` WHERE id = '$id'")->result_array();
			
			$error="";
			
			if(!($new_record)){
			
				if(empty($_FILES['photo_inp']['name'])){
					$error=	"Please Select a Image.";
				}
				
				if($error){
					$senddata['message']=$error;
					return json_encode($senddata);
				}
			}
			
			$check_already_room = $this->db->query("SELECT * FROM `room` WHERE room_no='$roomno' and property_id = $property and id != '$id'")->result_array();
			
			if($check_already_room){
				$error="Please enter another room number ".$roomno." is already in the ".$property.".";
				$senddata['message']=$error;
				return json_encode($senddata);
			}
			
			
			$user_data=array();
			$user_data['room_no']=$roomno;
			$user_data['seater']=$seater;
			$user_data['property_id']=$property;
			$user_data['amenity']=$amenities;
			$user_data['price']=$price;
		
			
			if(!empty($_FILES['photo_inp']['name'])){
				$this->load->helper('common_helper');
				$image = uploadimgfile("photo_inp","./assets/img","pre");
				if($image['status']==0){
					$senddata['message']	=	$image['message']; 
					return json_encode($senddata);
				}
			         
				if($image['status']==1){
					$user_data['image'] = $image['data']['name'];
					
				}						
			}
			
			
			$already_room=$this->db->query("SELECT * FROM `room` WHERE id = '$id' ")->result_array();
			if($already_room){
				$user_data['updated']=gettime4db();
				
				$this->db->where('id',$id);
				$this->db->update('room',$user_data);
				
				$this->db->where('room_id',$id);
				$this->db->delete('beds');
				
				$updated_at = gettime4db();
					$beds = array();
					for($i = 0;  $i<count($bed_no); $i++)
					{
					    $beds = array(
						'bed_no' => $bed_no[$i],
						'room_id' => $id,
						'property_id' => $property,
						'updated_at' => $updated_at,
						'price'      => $price,
						'seater'     =>  $seater,
						'status'      => 0,
						);

						$this->db->insert('beds',$beds);
								
					}
				
				$senddata['redurl']	=	site_url('administrator/room/view'); 
				$senddata['status']	=	2; 
				$senddata['message']	=	"Room is Updated Successfully.";
				
				return json_encode($senddata);
			}else{
				$user_data['added']=gettime4db();
				$user_data['status']=0;
				$this->db->insert('room',$user_data);
				$room_id = $this->db->insert_id();
				            $beds = array();
							$created_at = gettime4db();
							for($i = 0;  $i < count($bed_no); $i++)
							{
								$beds = array(
									'bed_no' => $bed_no[$i],
									'room_id' => $room_id,
									'property_id' => $property,
									'created_at' => $created_at,
									'price'      => $price,
						            'seater'     =>  $seater,
									'status'      => 0,
								);
								
								$this->db->insert('beds',$beds);
							}
				
				$senddata['redurl']	=	site_url('administrator/room/view'); 
				$senddata['status']	=	1; 
				$senddata['message']	=	"Room is Added Successfully.";
				
				return json_encode($senddata);
			}
		}
		
		
		public function GetRoom($id=0,$status=0)
		{
			if(!empty($id))
			{
				$this->db->select('*');
				$this->db->where('id',$id);
				$query = $this->db->get('room');
				$data  = $query->row_array();
				
				return $data;
				
				
			}
		}
		public function GetBeds($id=0)
		{
			if(!empty($id))
			{
				
				$this->db->select('*');
				$this->db->where('room_id',$id);
				$query = $this->db->get('beds');
				$data  = $query->result_array();
				
				return $data;
			}
		}
		
		public function GetRooms($pid=0)
		{
			if(!empty($pid))
			{
				$this->db->select('id,room_no');
				$this->db->where('property_id',$pid);
				$query = $this->db->get('room');
				$data  = $query->result_array();
				
				return $data;	
			}
		}
		
		public function property_room(){
			$propertyId=$this->input->post('propertyId');
			$id=$this->input->post('id');
			//print_r("I m getting called");
			
			$rooms=$this->GetRooms($propertyId);
			if(!empty($rooms)){
				 echo '<option value="">Select rooms..</option>';
				 $room_no="";
				 $selected="";
				 if($id){
					$temp	=	$this->db->query("SELECT id,room_no FROM `room` where id = $id")->result_array();
					$room_no=$temp[0]['room_no'];
				}
				foreach($rooms as $room){
					 if($room_no){
						 if($room_no==$room['room_no']){
							 $selected="selected='selected'";
						 }else{
							 $selected="";
						 }
					 }
					 echo '<option'. $selected.' value="'.$room['id'].'">'.$room['room_no'].'</option>';
				}
			}else{
				 echo '<option value="">room not available</option>';
			}
		}
		
		
		
			
		public function list_room(){
			//print_r($this->db->query("SELECT r.id,r.room_no,r.image,r.seater,p.pro_name,r.price,r.amenity,r.status,r.added,r.updated from room r join property p on r.property_id=p.property_id")->result_array());
			return  $this->db->query("SELECT r.id,r.room_no,r.image,r.seater,p.pro_name,r.price,r.amenity,r.status,r.added,r.updated from room r join property p on r.property_id=p.property_id")->result_array();
		}
		
		
		public function room_seater(){
			$property_id=$this->input->post('propertyId');
			$seater=$this->input->post('seater');
			
			$temp	=	$this->db->query("SELECT price FROM `packages` where property_id = $property_id and seater=$seater")->result_array();
			// echo "<option" value=$temp[0]['price'].">".$temp[0]['price']."</option>";
			//print_r($temp[0]['price']);
			//echo $temp[0]['price'];
			if($temp){
			echo $temp[0]['price'];
			}else{
			echo 0;
			}
		}
		
		

	}
?>