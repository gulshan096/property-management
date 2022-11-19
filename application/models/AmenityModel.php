<?php
     
	 Class AmenityModel extends CI_Model
	 {
			
		function __construct()
		{
			parent::__construct();
		}
			
		
		
		public function manageamenity()
		{		
			$id=$this->input->post('id');
			$name=$this->input->post('amenity');
				
			$senddata	=	array(); 
			$senddata['status']		=	0; 
			$senddata['message']	=	"Something Went wrong, Please try again later...";
			
			// Insertion conditions				
			$new_record	=	$this->db->query("SELECT * FROM `amenities` WHERE id = '$id'")->result_array();
			//if($check_already){echo "1";}else{echo "0";}
			//exit;
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
			
			$check_already_Id_no = 	$this->db->query("SELECT * FROM `amenities` WHERE amenity='$name' and id !='$id'")->result_array();
			
			if($check_already_Id_no){
				$error="Please enter another amenity ".$name." is already in the system. ";
				$senddata['message']=$error;
				return json_encode($senddata);
			}
			
			$user_data=array();
			$user_data['amenity']=$name;
			
			if(!empty($_FILES['photo_inp']['name'])){
				$this->load->helper('common_helper');
				$image = uploadimgfile("photo_inp","./assets/img","pre");
				if($image['status']==0){
					$senddata['message']	=	$image['message']; 
					return json_encode($senddata);
				}

				if($image['status']==1){
					$user_data['image'] = $image['data']['name'];
					//$this->db->query("update user set password=$password where userid=$users['id_image']")->result_array();
				}						
			}
			
			
			$already_user=$this->db->query("SELECT * FROM `amenities` WHERE id = '$id' ")->result_array();
			if($already_user){
				//$user_data['updated']=gettime4db();
				//print_r($user_data);
				//exit;
				$this->db->where('id',$id);
				$this->db->update('amenities',$user_data);
				
				$senddata['redurl']	=	site_url('administrator/amenity/view'); 
				$senddata['status']	=	2; 
				$senddata['message']	=	"Amenity is Updated Successfully.";
				
				return json_encode($senddata);
			}else{
				//$user_data['added']=gettime4db();
				$user_data['status']=1;
				//$user_data['id']=$id;
				//exit;
				$this->db->insert('amenities',$user_data);
				
				$senddata['redurl']	=	site_url('administrator/amenity/view'); 
				$senddata['status']	=	1; 
				$senddata['message']	=	"Amenity is Added Successfully.";
				
				return json_encode($senddata);
			}
		}
		
		
		public function GetAmenity($id=0,$status=0)
		{
			if(!empty($id))
			{
				$temp	=	$this->db->query("SELECT * FROM `amenities` where id = '$id'")->result_array();
				if(!empty($temp))
				{
					return $temp[0];
				}else{
					return array();
				}
			}
		}
		
		public function list_amenity(){
			return  $this->db->query("SELECT * FROM `amenities` ")->result_array();
		}

	}
?>