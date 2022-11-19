<?php

	Class EntryModel extends CI_Model
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
			

            public function manage_entry()
			{
				
				$tenant_id = $this->input->post('tenant_id');
				
				$this->db->select('property_id');
				$this->db->where('user_id',$tenant_id);
				$query = $this->db->get('booking')->row_array();
				
				$property_id  = $query['property_id'];
				
				$guest_name = $this->input->post('guest_name');
				$guest_mobile = $this->input->post('guest_mobile');
				$visiting_date = $this->input->post('visiting_date');
				$guest_gender = $this->input->post('guest_gender');
				$description = $this->input->post('description');
				$otp = $this->input->post('otp');
			
			    $senddata	=	array();
			    $senddata['status']		=	0;
			    $senddata['message']	=	"Something Went wrong, Please try again later...";
				        
				$entry = array();
				$entry['tenant_id']=$tenant_id;
				$entry['created_by']= "Tenant";		
				$entry['property_id']=$property_id;
				$entry['guest_name']=$guest_name;
			    $entry['visiting_date']=$visiting_date;
			    $entry['guest_mobile']=$guest_mobile;
				$entry['guest_gender']=$guest_gender;
				$entry['guest_description']=$description;
				$entry['otp']=  $guest_name.rand(1,9999).$tenant_id;
				$entry['created_at']= date("Y-m-d h:i:sa");
				
				$entry['status']=0;  		
				$this->db->insert('manage_entry',$entry);
				//$maintenanceId =  $this->db->insert_id();
				
				$senddata['status']	    =	1;
				$senddata['redurl']	    =	site_url('user/front/entry/guest_history');
				$senddata['message']	=	"Guest Created Successfully.";
				return json_encode($senddata);
				
			}
             public function ex_manage_entry($ex_id,$property_id,$guest_name,$guest_mobile,$visiting_date,$guest_gender,$description)
			{
				
				$entry = array();
				$entry['ex_id']=$ex_id;		
				$entry['property_id']=$property_id;
				$entry['created_by']= "Executive";
				$entry['guest_name']=$guest_name;
			    $entry['visiting_date']=$visiting_date;
			    $entry['guest_mobile']=$guest_mobile;
				$entry['guest_gender']=$guest_gender;
				$entry['guest_description']=$description;     
				$entry['otp']=  rand(1000,9999);
				$entry['created_at']= date("Y-m-d h:i:sa");
				
				$entry['status']=0;  		
				$query = $this->db->insert('manage_entry',$entry);
				
				return $query;
			
				
			}				

            public function getGuestList()
			{
				$tenant_id =  $this->session->userdata('tenant_id');
				$this->db->select('manage_entry.*,property.pro_name');
				$this->db->join('property ', 'property.property_id=manage_entry.property_id', 'left');
				$this->db->where('tenant_id', $tenant_id);
				$query = $this->db->get('manage_entry')->result_array();
				return $query;
				
			}

            public function exGuestList($property_id)
			{
				
				$ex_id =  $this->session->userdata('ex_id');
				$pid =   json_decode($property_id);
				$this->db->select('manage_entry.*,property.pro_name');
				$this->db->join('property ', 'property.property_id=manage_entry.property_id', 'left');
				$this->db->where('manage_entry.ex_id', $ex_id);
				$this->db->where_in('property.property_id', $pid);
				$query = $this->db->get('manage_entry')->result_array();
				return $query;
				
			}			
  		
        }
?>