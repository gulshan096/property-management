<?php

	Class RequestModel extends CI_Model
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
            public function manage_complaints()
			{
				
				$tenant_id = $this->input->post('tenant_id');
				$this->db->select('property_id,room_id');
				$this->db->where('user_id',$tenant_id );
				$booking = $this->db->get('booking')->row_array();
				
				$category_id = $this->input->post('category');
				$this->db->select('vendor.id as vid');
				$this->db->where('category',$category_id );
				$vendor = $this->db->get('vendor')->row_array();
				
				$property_id = $booking['property_id'];
				$room_id     = $booking['room_id'];
				$vendor_id     = $vendor['vid'];
				
				$description = $this->input->post('description');
				
			
			    $senddata	=	array();
			    $senddata['status']		=	0;
			    $senddata['message']	=	"Something Went wrong, Please try again later...";
				
				$complaints = array();
				
				$complaints['tenant_id']=$tenant_id;	
				$complaints['property_id']=$property_id;
				$complaints['room_id']=$room_id;
				$complaints['vendor_id']=$vendor_id;
			    $complaints['category']=$category_id;
				$complaints['description']=$description;
				$complaints['created_at']= date("Y-m-d h:i:sa");
				$complaints['status']=0;  	
				
				$this->db->insert('complaints_request',$complaints);
			
				$senddata['status']	    =	1;
				$senddata['redurl']	    =	site_url('user/front/myrequest/complaints');
				$senddata['message']	=	"Complaints sended Successfully.";
				return json_encode($senddata);
				
			}	

            public function complaints_list()
			{
			    $tenant_id =  $this->session->userdata('tenant_id');
				$this->db->select('complaints_request.complaint_id,complaints_request.description,complaints_request.status,complaints_request.created_at,
				                   property.pro_name,room.room_no,vendor_category.category');
				$this->db->join('property', 'property.property_id=complaints_request.property_id', 'left');
				$this->db->join('room', 'room.id=complaints_request.room_id', 'left');
				$this->db->join('vendor_category', 'vendor_category.id=complaints_request.category', 'left');
				$this->db->where('complaints_request.tenant_id', $tenant_id);
				$query = $this->db->get('complaints_request')->result_array();
				return $query;
				
			}	


             public function manage_leave()
			 {
				
				$tenant_id = $this->input->post('tenant_id');
				$this->db->select('property_id,room_id,bed_id');
				$this->db->where('user_id',$tenant_id );
				$output = $this->db->get('booking')->row_array();
				
				$property_id  = $output['property_id'];
				$room_id      = $output['room_id'];
				$bed_id       = $output['bed_id'];
				$from_date    = $this->input->post('from_date');
				$to_date      = $this->input->post('to_date');
				$checkin_date = $this->input->post('checkin_date');
				$checkin_time = $this->input->post('checkin_time');
				$description  = $this->input->post('description');
				
			
			    $senddata	=	array();
			    $senddata['status']		=	0;
			    $senddata['message']	=	"Something Went wrong, Please try again later...";
				
				$leave = array();
				
				$leave['tenant_id']=$tenant_id;	
				$leave['property_id']=$property_id;
				$leave['room_id']=$room_id;
			    $leave['bed_id']=$bed_id;
				$leave['from_date']=$from_date;
				$leave['to_date']=$to_date;
				$leave['checkin_date']=$checkin_date;
				$leave['checkin_time']=$checkin_time;
				$leave['description']=$description;
				$leave['created_at']= date("Y-m-d h:i:sa");
				$leave['status']=0;  	
				
				$this->db->insert('leave_request',$leave);
			
				$senddata['status']	    =	1;
				$senddata['redurl']	    =	site_url('user/front/myrequest/leave');
				$senddata['message']	=	"Complaints sended Successfully.";
				return json_encode($senddata);
			
				
				
			}
			
			public function leave_list()
			{
			    $tenant_id =  $this->session->userdata('tenant_id');
				$this->db->select('leave_request.leave_id,leave_request.description,leave_request.status,leave_request.created_at,
				                   leave_request.from_date,leave_request.to_date,leave_request.checkin_date,leave_request.checkin_time,
				                   property.pro_name,room.room_no,beds.bed_no');
				$this->db->join('property', 'property.property_id=leave_request.property_id', 'left');
				$this->db->join('room', 'room.id=leave_request.room_id', 'left');
				$this->db->join('beds', 'beds.bed_id=leave_request.bed_id', 'left');
				$this->db->where('leave_request.tenant_id', $tenant_id);
				$query = $this->db->get('leave_request')->result_array();
				return $query;
				
			}
            
			
			
			//--------------api-------------
			
			public function service_request($property_id)
			{
				$pid =   json_decode($property_id);
				$this->db->select('complaints_request.*,tenant.name,property.pro_name,room.room_no,vendor_category.id,
				vendor_category.category as complaints_type');
				$this->db->join('property','property.property_id=complaints_request.property_id','left');
                $this->db->join('room','room.id=complaints_request.room_id','left');
                $this->db->join('vendor_category','vendor_category.id=complaints_request.category','left'); 
                $this->db->join('tenant','tenant.tenant_id=complaints_request.tenant_id','left');  
				$this->db->where_in('property.property_id', $pid);
               
                				
				$query = $this->db->get('complaints_request')->result_array();
				
				return $query;
			}
			
			
			public function leaave_request($property_id)
			{
				$pid =   json_decode($property_id);
				$this->db->select('leaave_request.*,tenant.name,property.pro_name,room.room_no');
				$this->db->join('property','property.property_id=leave_request.property_id','left');
                $this->db->join('room','room.id=leave_request.room_id','left');
     
                $this->db->join('tenant','tenant.tenant_id=leave_request.tenant_id','left');  
				$this->db->where_in('property.property_id', $pid);
				
				$query = $this->db->get('leave_request')->result_array();
				
				return $query;
			}
			
			public function complaint_detail($complaint_id)
			{
			   
			   $this->db->select('complaints_request.complaint_id,complaints_request.tenant_id,property.pro_name,property.property_id,room.room_no,room.id as room_id,
			   vendor_category.category,vendor_category.id as vc_id,vendor.id as vid,vendor.name as vendor_name');
			   $this->db->join('property','property.property_id=complaints_request.property_id','left');
               $this->db->join('room','room.id=complaints_request.room_id','left');
               $this->db->join('vendor_category','vendor_category.id=complaints_request.category','left'); 
			   $this->db->join('vendor','vendor.id=complaints_request.vendor_id','left');
			   
			   $this->db->where('complaints_request.complaint_id',$complaint_id);
			   $query = $this->db->get('complaints_request')->row_array();
			   
			   return $query;
			   
			}
			
			
			public function manage_complaints_mob($maintenance_id,$property,$room_no,$ven_category, $executive,$technician,$tenant_id,$complaint_id,$start_time,$start_date,$end_time)
				
		    {
		
			           
						$maintenance=array();
						$maintenance['property_id']=$property;
						$maintenance['complaint_id']=$complaint_id;
						$maintenance['tenant_id']=$tenant_id;
						$maintenance['ven_cat_id']=$ven_category;
						$maintenance['executive_id']=$executive;
						$maintenance['technician']=$technician;
			            $maintenance['v_id']=$ven_id;
						$maintenance['start_time']=$start_time;
						$maintenance['end_time']=$end_time;
						$maintenance['start_date']=$start_date; 
						$maintenance['room_id']=$room_no;
						
						
						
						// $maintenance_checkitems_id       =	$this->input->post("checklistitems_id");
						$checkitems       =	$this->input->post("checkitem");
					
						if(empty($maintenance_id)){
						
							$maintenance['status']=1;
							
							$this->db->insert('maintenance',$maintenance);
							$maintenanceId =  $this->db->insert_id();
							
							$maintenance_checkitem = array();
							for($i = 0;  $i<count($checkitems); $i++)
		                    {
                    		$maintenance_checkitem = array(
                    		'checkitem' => $checkitems[$i],
                    		'maintenance_id' => $maintenanceId
                    		);
            		
                    		$query =  $this->db->insert('checklist_items',$maintenance_checkitem);
                    		}
							
							return $query;		
						} 
						else
						{
					
							$this->db->where('maintenance_id',$maintenance_id);
							$this->db->update('maintenance',$maintenance);
							
							
							$this->db->where('maintenance_id',$maintenance_id);
							$this->db->delete('checklist_items');
							$maintenance_checkitem = array();
								for($i = 0;  $i<count($checkitems); $i++)
								{
								$maintenance_checkitem = array(
								'checkitem' => $checkitems[$i],
								'maintenance_id' => $maintenance_id
								);

								$query = $this->db->insert('checklist_items',$maintenance_checkitem);
								
								}
										
								return $query;
						}
																	
			}
			
			public function list_maintenance($property_id)
			{
				    $pid =   json_decode($property_id);
				    $this->db->select('maintenance.*,executive.role,executive.name,room.room_no,vendor_category.category,property.pro_name');
	               
                    $this->db->from('maintenance'); 
                    $this->db->join('executive ', 'executive.ex_id=maintenance.executive_id', 'left');
					$this->db->join('property', 'property.property_id=maintenance.property_id', 'left');
					$this->db->join('room', 'room.id=maintenance.room_id', 'left');
					$this->db->join('vendor_category', 'vendor_category.id=maintenance.ven_cat_id', 'left');
					$this->db->where_in('property.property_id', $pid);
                    $query = $this->db->get(); 
                    $data = $query->result_array();
                    
                    return $data;
				
					
				} 
			
			

			
  		
        }
?>