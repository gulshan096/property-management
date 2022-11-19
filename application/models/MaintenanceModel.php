<?php

	Class MaintenanceModel extends CI_Model
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
			public function manage_complaints()
				
		    {
		
			            $maintenance_id           =	$this->input->post("maintenance_id");
			            
						$property           =	$this->input->post("property_id");
						$room_no            =  $this->input->post("room_id");
					    $ven_category        =   $this->input->post('ven_cat_id');
						$ven_id              =  $this->input->post("ven_id");
						$executive           =	$this->input->post("executive_id");
						$technician           =	$this->input->post("technician");
						$tenant_id           =	$this->input->post("tenant_id");
						$complaint_id           =	$this->input->post("complaint_id");
						
						$start_time           =	$this->input->post("start_time");
						$start_date           =	$this->input->post("start_date");
						$end_time           =	$this->input->post("end_time");
					
					
							$senddata	=	array();
							$senddata['status']		=	0;
							$senddata['message']	=	"Something Went wrong, Please try again later...";
					
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
						
						
						
						$maintenance_checkitems_id       =	$this->input->post("checklistitems_id");
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
            		
                    		$this->db->insert('checklist_items',$maintenance_checkitem);
                    		}
							
									$senddata['status']	=	1;
									$senddata['redurl']	=	site_url('executive/request/rsolve_list');
									$senddata['message']	=	"Maintenance is Created Successfully.";
									return json_encode($senddata);
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

								$this->db->insert('checklist_items',$maintenance_checkitem);
								
								}
								
										$senddata['redurl']	=	site_url('executive/request/rsolve_list');
										$senddata['status']	=	2;
										$senddata['message']	=	"Maintenance is Updated Successfully.";
										return json_encode($senddata);
						}
																	
			}
		
		
		public function getMaintenance($maintenance_id)
		{
		
		            
						
						
						 $this->db->select('maintenance.status,maintenance.maintenance_id,maintenance.property_id,maintenance.ven_cat_id, 
						 maintenance.technician,maintenance.end_time,maintenance.start_date, 
						 maintenance.created_at,maintenance.start_time,maintenance.executive_id,maintenance.room_id,
						 maintenance.tenant_id,maintenance.complaint_id,maintenance.executive_id,maintenance.start_date,
						 property.pro_name,
						 
						 administrator.role,administrator.name, 
						 room.room_no,
						 vendor_category.category ,vendor_category.id as vc_id,
						 vendor.id as vid,vendor.name as vendor_name' );
		
						$this->db->from('maintenance'); 
						$this->db->join('administrator ', 'administrator.aid=maintenance.executive_id', 'left');
						$this->db->join('property', 'property.property_id=maintenance.property_id', 'left');
						$this->db->join('room', 'room.id=maintenance.room_id', 'left');
						$this->db->join('vendor_category', 'vendor_category.id=maintenance.ven_cat_id', 'left');
						$this->db->join('vendor', 'vendor.id=maintenance.v_id','left');
						$this->db->where('maintenance_id', $maintenance_id);
			
						$query = $this->db->get(); 
						$data = $query->row_array();
						
						return $data;
						
                      
		}
		public function getMaintenanceChecklist($id=0,$status=0)
		{
		
		if(!empty($id))
				{
						
					$temp	=	$this->db->query("SELECT * FROM `checklist_items` where maintenance_id = '$id'")->result_array();
					if(!empty($temp))
				    {
						return $temp;
					}
					else
					{
						return array();
					}
							//return array();
				}
		
		}
		
			public function list_maintenance()
			{
				    
				     $this->db->select('maintenance.*,administrator.role,administrator.name,room.room_no,vendor_category.category,
					                    property.pro_name' );
	               
                    $this->db->from('maintenance'); 
                    $this->db->join('administrator ', 'administrator.aid=maintenance.executive_id', 'left');
					$this->db->join('property', 'property.property_id=maintenance.property_id', 'left');
					$this->db->join('room', 'room.id=maintenance.room_id', 'left');
					$this->db->join('vendor_category', 'vendor_category.id=maintenance.ven_cat_id', 'left');
					
                    $query = $this->db->get(); 
                    $data = $query->result_array();
                    
                    return $data;
				
					
				} 
				
		    // // public function leave_list()
			// // {
			    
				// // $this->db->select('leave_request.leave_id,leave_request.description,leave_request.status,leave_request.created_at,
				                   // // leave_request.from_date,leave_request.to_date,leave_request.checkin_date,leave_request.checkin_time,
				                   // // property.pro_name,room.room_no,beds.bed_no');
				// // $this->db->join('property', 'property.property_id=leave_request.property_id', 'left');
				// // $this->db->join('room', 'room.id=leave_request.room_id', 'left');
				// // $this->db->join('beds', 'beds.bed_id=leave_request.bed_id', 'left');
			
				// // $query = $this->db->get('leave_request')->result_array();        
				// // return $query;		
			// // }
            
			
			public function ex_leave_list($property_id)
			{
				$pid =   json_decode($property_id);
				$this->db->select('leave_request.leave_id,leave_request.description,leave_request.status,leave_request.created_at,
				                   leave_request.from_date,leave_request.to_date,leave_request.checkin_date,leave_request.checkin_time,
				                   property.pro_name,room.room_no,beds.bed_no,tenant.name');
				$this->db->join('property', 'property.property_id=leave_request.property_id', 'left');
				$this->db->join('room', 'room.id=leave_request.room_id', 'left');
				$this->db->join('beds', 'beds.bed_id=leave_request.bed_id', 'left');
				$this->db->join('tenant', 'tenant.tenant_id=leave_request.tenant_id', 'left');
			    $this->db->where_in('property.property_id', $pid);
				$query = $this->db->get('leave_request')->result_array();        
				return $query;		
			}
			
				
				public function list_executive()
				{
					 $this->db->select('aid,role,name');
					$this->db->where('role',"Executive");
					$query = $this->db->get('administrator');
					
					$data   = $query->result_array();
					
					return $data;	
				}
				
				public function getVendor($category_id)
				{
					
					$this->db->select('name');
					$this->db->where('category',$category_id);
				    $query = $this->db->get('vendor');
					
					$vendor =  $query->result_array(); 
				    
                    foreach($vendor as $row)
					{
					  
					}
		          return $row['name'];  
					
				}	
		}
?>