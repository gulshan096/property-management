<?php
     
	 Class ElectricityModel extends CI_Model
	 {
			
		function __construct()
		{
			parent::__construct();
		}
			
		
		
		public function manageElBill()
		{	
			$id=$this->input->post('id');
			
			$tenant_id=$this->input->post('tenant_id');
			$property_id=$this->input->post('property_id');
			$room_id= $this->input->post('room_id');
			$bed_id=$this->input->post('bed_id');

			$bill_amount=$this->input->post('bill_amount');
			$bill_date=$this->input->post('bill_date');
			$due_date=$this->input->post('due_date');
			$property=$this->input->post('property');
			
			
			
								
			if($bill_date > $due_date)
				{
					$senddata['message']	=	"Please check Due Date, Its should not be before Bill Date.";
					return json_encode($senddata);
				}
		
			
			$senddata	=	array(); 
			$senddata['status']		=	0; 
			$senddata['message']	=	"Something Went wrong, Please try again later...";
			
			// Insertion conditions				
			$new_record	=	$this->db->query("SELECT * FROM `electricity_bill` WHERE id = '$id'")->result_array();
			
			$error="";
			
			
			$user_data=array();
			$user_data['tenant_id'] = $tenant_id;
			$user_data['property_id']=$property_id;
			$user_data['room_id']=$room_id;
			$user_data['bed_id']=$bed_id;
			$user_data['bill_amount']=$bill_amount;
			$user_data['bill_date']=$bill_date;
			
			$user_data['due_date']=$due_date;
		
			
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
			
			$this->db->select('electricity_bill.bill_date,room.room_no');
			$mwhere = array('electricity_bill.room_id'=>$room_id,'electricity_bill.property_id'=>$property_id);
			$this->db->join('room','room.id = electricity_bill.room_id');
			$this->db->join('property','property.property_id = electricity_bill.property_id');
			$this->db->where($mwhere);
			$room_bill_has = $this->db->get('electricity_bill')->result_array();
			
			
		
			if($room_bill_has){
				if(date('M',strtotime($bill_date))==date('M',strtotime($room_bill_has[0]['bill_date']))){
						$month=date('M',strtotime($bill_date));
						$senddata['message']="Bill for room no ".$room_bill_has[0]['room_no']." is already created for the month ".$month;
						return json_encode($senddata);
				}
			}
			
			
			$already_bill = $this->db->query("SELECT * FROM `electricity_bill` WHERE id = '$id' ")->result_array();
			if($already_bill){
				$user_data['updated']=gettime4db();
				//print_r($user_data);
				//exit;
				$this->db->where('id',$id);
				$this->db->update('electricity_bill',$user_data);
				
				$senddata['redurl']	=	site_url('administrator/electricity/bills/viewall'); 
				$senddata['status']	=	2; 
				$senddata['message']=	"Bill is Updated Successfully.";
				
				return json_encode($senddata);
			}
			else
			{
				$user_data['added']=gettime4db();
				$user_data['status']= 1;
				$user_data['id']=$id;
				//exit;
				$this->db->insert('electricity_bill',$user_data);
				
				$senddata['redurl']	=	site_url('administrator/electricity/bills/viewall'); 
				$senddata['status']	=	1; 
				$senddata['message']	=	"Bill is Added Successfully.";
				
				return json_encode($senddata);
			}
		}
		
		
		public function GetElBill($id=0,$status=0)
		{
			
			
			
		
			$this->db->select('property.property_id, property.pro_name, tenant.tenant_id,tenant.name,room.id as room_id,room.room_no,beds.bed_id,beds.bed_no,
			electricity_bill.id,electricity_bill.bill_date,electricity_bill.bill_amount,electricity_bill.status,electricity_bill.added,
			electricity_bill.updated, electricity_bill.due_date');
			$this->db->join('room','room.id = electricity_bill.room_id');
			$this->db->join('property','property.property_id = electricity_bill.property_id');
			$this->db->join('tenant','tenant.tenant_id = electricity_bill.tenant_id');
			$this->db->join('beds','beds.bed_id = electricity_bill.bed_id');
			$this->db->where('electricity_bill.id',$id);
			$output = $this->db->get('electricity_bill')->row_array();
			
			return $output;
			
		}
			
			
		public function list_electricity_room(){
			  $property_id	=	$this->input->post('property_id');	
			
			  $this->db->select('tenant.tenant_id,tenant.name'); 
              $this->db->join('tenant','tenant.tenant_id = booking.user_id');			  
			  $this->db->where('booking.property_id',$property_id);
		      $query = $this->db->get('booking')->result_array();

              echo "<pre>";
		      print_r($query);
		      
		      die();
		     
			  $output = '<option value="">select</option>'; 
			  
			  foreach($query as $row)
			   {
				  
				  $output .='<option value="'.$row['tenant_id'].'">'.$row['name'].'</option>'; 
			   }     
			  return $output;		
		}	
		
		public function tenant_room()
		{
			$tenant_id	=	$this->input->post('tenant_id');
			$this->db->select('room.id,room.room_no,beds.bed_no,beds.bed_id');
			$this->db->join('room','room.id = booking.room_id');
			$this->db->join('beds','beds.bed_id = booking.bed_id');
			$this->db->where('booking.user_id',$tenant_id);
			$query = $this->db->get('booking');
			
			foreach($query->result_array() as $row) 
			   {
			     
				
			   }  
			return $row;  
		}
		
		public function list_electricity($tenent_id = 0){	
		
		
		
		  if(!empty($tenent_id))
		   {
			   
			 $this->db->select('electricity_bill.*, room.room_no,beds.bed_no,tenant.name');
			 $this->db->join('room','room.id = electricity_bill.room_id');
             $this->db->join('tenant','tenant.tenant_id = electricity_bill.tenant_id');
             $this->db->join('beds','beds.bed_id = electricity_bill.bed_id');
             $this->db->where('electricity_bill.tenant_id', $tenent_id);
             $output  = $this->db->get('electricity_bill')->result_array();

             return $output;			 
		   }
		   else
		   {
			$statussort = $this->input->get("statussort");
			
			switch($statussort)
			{
				case "paid":
					return $this->db->query("SELECT e.id as eid,e.property_id,e.room_id,e.bill_amount,e.bill_date,e.due_date,e.image,e.status,e.added,e.updated,r.id,r.room_no,p.property_id,p.pro_name FROM ((`electricity_bill` e join room r on e.room_id=r.id)  join property p on e.property_id = p.property_id ) where e.status=1")->result_array();				
				break;
				case "unpaid":
					return $this->db->query("SELECT e.id as eid,e.property_id,e.room_id,e.bill_amount,e.bill_date,e.due_date,e.image,e.status,e.added,e.updated,r.id,r.room_no,p.property_id,p.pro_name FROM ((`electricity_bill` e join room r on e.room_id=r.id)  join property p on e.property_id = p.property_id ) where e.status=0")->result_array();				
				break;
				default:
					return $this->db->query("SELECT e.id as eid,e.property_id,e.room_id,e.bill_amount,e.bill_date,e.due_date,e.image,e.status,e.added,e.updated,r.id,r.room_no,p.property_id,p.pro_name FROM ((`electricity_bill` e join room r on e.room_id=r.id)  join property p on e.property_id = p.property_id ) ")->result_array();
				break;
			}  
            			
		   }
		
		}
			
	}
?>