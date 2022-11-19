<?php

	Class HostModel extends CI_Model
		{
			
			function __construct()
				{
					parent::__construct();
					$this->load->helper("common_helper");
					
				}
				
	
				public function pro_owner_reg(){
					$senddata	=	array(); 
					$senddata['status']		=	0; 
					$senddata['message']	=	"Something Went wrong, Please try again later...";
		
					$name=$this->input->post('name');
					$email=$this->input->post('email');
					$perosnal_address=$this->input->post('perosnal_address');
					$mobile=$this->input->post('mobile');
					
					$host_pro_name = $this->input->post('pro_name');
					$host_pro_address = $this->input->post('pro_address');
					$host_pro_description = $this->input->post('pro_description');
					$host_id_type   =  $this->input->post('id_type');   
					
					$email_exist=$this->db->query("select email from pro_ownner_registration where email='$email'")->result_array();
					if(!empty($email_exist)){
						$senddata['message']= $email." email is already used by other user";
						return json_encode($senddata);
					}
					
					$mobile_exist=$this->db->query("select mobile from pro_ownner_registration where mobile='$mobile'")->result_array();
					if(!empty($mobile_exist)){
						$senddata['message']= $mobile." is already used by other user";
						return json_encode($senddata);
					}
					
					if(isset($_FILES['pro_img']))
					{

					}else
					{
						print_r("not set");
					}
													
					$this->load->helper('common_helper');
						
							$image		   =    uploadimgfile("pro_img","./assets/img","pre");
					
					if($image['status']==0)
					{
					    $senddata['message']	=	$image['message'];
						return json_encode($senddata);
					}
					if($image['status']==1)
					{
					  $owner_detail=array();
					  $owner_detail['name']=$name;
					  $owner_detail['mobile']=$mobile;
					  $owner_detail['email']=$email;
					  $owner_detail['perosnal_address']= $perosnal_address;
					  $owner_detail['added']= date('Y-m-d H:i:s');
					  $owner_detail['status']=0;
					  
					  $this->db->insert("pro_ownner_registration",$owner_detail);
					  $po_id = $this->db->insert_id();
					  
					  $property_detail=array();
					  $property_detail['po_id'] = $po_id;
					  $property_detail['pro_name'] = $host_pro_name;
					  $property_detail['pro_address'] = $host_pro_address;
					  $property_detail['pro_description'] = $host_pro_description;
					  $property_detail['id_card_type'] = $host_id_type;
					  $property_detail['id_card']=$image['data']['name'];
					  $property_detail['added']= date('Y-m-d H:i:s');
					
					
					
					$this->db->insert("host_property",$property_detail);
					$senddata['status']		=	1; 
					$senddata['redurl']	=	site_url('user/front'); 

					$senddata['message']= "You are Registered Successfully. Please Sign In";
					return json_encode($senddata);		
					}
					
					
					
				}
			
			
			public function register_owner_list()
			{
				
		
				return $this->db->get('pro_ownner_registration')->result_array();
			}
			
			
			
			
			public function host_owner_details()
			{
				
				$po_id = $this->input->post('po_id');
				
				$this->db->select('pro_ownner_registration.*,host_property.*');
				$this->db->join('host_property','host_property.po_id = pro_ownner_registration.po_id');
				$this->db->where('pro_ownner_registration.po_id',$po_id);
				$query = $this->db->get('pro_ownner_registration');
				
				foreach($query->result_array() as $row) 
			     {
			     
				
			     }  
			   return $row; 
				
				
			}
			
        }
?>