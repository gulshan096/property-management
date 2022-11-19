<?php
     
	 Class StaffModel extends CI_Model
	       
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
			/*public function GetOffer(){
				$this->db->select("*");
				$this->db->from("offer");
				return $this->db->get()->result_array();
			}*/
			
		public function managestaff()
			{		
				$staff_data=$this->input->post('staff');
				//print_r($staff_data);	
				$id=$this->input->post('staff[employee_id]');
				
				$senddata	=	array(); 
				$senddata['status']		=	0; 
				$senddata['message']	=	"Something Went wrong, Please try again later...";

				
				$check_already	=	$this->db->query("SELECT employee_id FROM `staff` WHERE employee_id = '$id'")->result_array();
					
				//if(!empty($check_already))
				//
					//$senddata['message']	=	"Employee is already on the System, Please use different Employee Id."; 
					//return json_encode($senddata);
				//
					
				if(!empty($check_already)){
					$updated=gettime4db();	
					$this->db->where('employee_id',$id);
					$this->db->update('staff',$staff_data);
					$senddata['redurl']	=	site_url('administrator/staff'); 
					$senddata['status']	=	2; 
					$senddata['message']	=	"Staff is Updated Successfully."; 
					return json_encode($senddata);						
				}else{
					$staff_data['added']=gettime4db();
					$staff_data['updated']=0;
					$staff_data['status']=1;

					$this->db->insert('staff',$staff_data);
					$senddata['redurl']	=	site_url('administrator/staff'); 
					$senddata['status']	=	1; 
					$senddata['message']	=	"Staff is Added Successfully.";
					return json_encode($senddata);
				}
			}
				
			public function GetStaff($id=0,$status=0)
			{
				if(!empty($id))
				{
					$temp	=	$this->db->query("SELECT * FROM `staff` where employee_id = '$id'")->result_array();
						if(!empty($temp))
							{
								return $temp[0];
							}else{
								return array();
							}
							//return array();
				}
			}
				
				public function all_country(){
					return  $this->db->query("SELECT * FROM `countries`")->result_array();
				}
				
				public function list_staff(){
					return  $this->db->query("SELECT * FROM `staff`")->result_array();

				}
		}
?>