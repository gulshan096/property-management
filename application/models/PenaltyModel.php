<?php

	Class PenaltyModel extends CI_Model
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
				
    			public function create_penalty()

    		    {
					    
    		            $penalty_id             =   $this->input->post('penalty_id');
						$property_id            =	$this->input->post("property_id");
						$room_id                =	$this->input->post("room_id");
					    $bed_id                 =   $this->input->post('bed_id');
    		           
    		            
					    $tenant_id              =   $this->input->post('tenant_id');
						$charge                 =	$this->input->post("charge");
						$additional_charge		=   $this->input->post("additional_charge");
						$description            =   $this->input->post("description"); 
                        $bill_date              =	$this->input->post("bill_date");						
					    $due_date               =	$this->input->post("due_date");
						
						$senddata	=	array();
						$senddata['status']		=	0;
						$senddata['message']	=	"Something Went wrong, Please try again later...";
							
						$penalty=array();
						$penalty['property_id']=$property_id;
						$penalty['tenant_id']=$tenant_id;
						$penalty['bed_id']=$bed_id;
						$penalty['bill_date']=$bill_date;
						$penalty['due_date']=$due_date;
						$penalty['room_id']=$room_id;
						$penalty['charge']=$charge;
						$penalty['additional_charge']=$additional_charge;
						$penalty['description']=$description;
						
						if(empty($penalty_id))
						   {
							   
						        $penalty['created_at']=gettime4db();
								$penalty['status']=  1;
								//status 2 for booking confirm
							
							    $this->db->insert('penalty',$penalty);
		
									$senddata['status']	=	1;
									$senddata['redurl']	=	site_url('administrator/Penalty/bills/viewall');
									$senddata['message']	=	"Penalty created Successfully.";
									return json_encode($senddata);
						    } 
						    else 
						    {
						            $penalty['updated_at']=gettime4db();
							        $this->db->where('penalty_id',$penalty_id);
							        $this->db->update('penalty',$penalty);
						
									$senddata['redurl']	=	site_url('administrator/Penalty/bills/viewall');
									$senddata['status']	=	2;
									$senddata['message']	=	"Penalty Updated Successfully.";
							        return json_encode($senddata);
						    }
    		    }
    		    public function list_penalty($tenant_id  = 0)
        		{
					
					
					if(!empty($tenant_id))
					{
				    $this->db->select('penalty.* ,property.property_id,property.pro_name,room.room_no, tenant.name,beds.bed_no');
                    $this->db->join('room ', 'room.id=penalty.room_id', 'left');
                    $this->db->join('property ', 'property.property_id=penalty.property_id', 'left');
                    $this->db->join('tenant ', 'tenant.tenant_id =penalty.tenant_id', 'left');
					$this->db->join('beds', 'beds.bed_id = penalty.bed_id', 'left');
					$this->db->where('penalty.tenant_id', $tenant_id);
                    $query = $this->db->get('penalty'); 
                    $data = $query->result_array();
					}
					else
					{
					 $this->db->select('penalty.* ,property.property_id,property.pro_name,room.room_no, tenant.name,beds.bed_no');
					
                    $this->db->join('room ', 'room.id=penalty.room_id', 'left');
                    $this->db->join('property ', 'property.property_id=penalty.property_id', 'left');
                    $this->db->join('tenant ', 'tenant.tenant_id =penalty.tenant_id', 'left');
					$this->db->join('beds', 'beds.bed_id = penalty.bed_id', 'left');
                    $query = $this->db->get('penalty'); 
                    $data = $query->result_array();	
					}
        	
                    return $data;
        		}
				
				public function paid_unpaid_penalty($status)
				{
				    $this->db->select('penalty.*, property.property_id ,property.pro_name,room.room_no,tenant.name,beds.bed_no');
	          
                   
                    $this->db->join('room ', 'room.id=penalty.room_id', 'left');
                    $this->db->join('property ', 'property.property_id=penalty.property_id', 'left');
                    $this->db->join('tenant ', 'tenant.tenant_id = penalty.tenant_id', 'left');
					$this->db->join('beds', 'beds.bed_id = penalty.bed_id', 'left');
					$this->db->where('penalty.status',$status);
                     $query = $this->db->get('penalty');
                    $data = $query->result_array();

                    return $data;
				}				
    				
        		public function get_penalty($id)
        		{
        		    
        		    $this->db->select('penalty.*, property.property_id,beds.bed_no,property.pro_name, room.room_no,tenant.name');
	
                     
                    $this->db->join('room ', 'room.id=penalty.room_id', 'left');
                    $this->db->join('property ', 'property.property_id=penalty.property_id', 'left');
                    $this->db->join('tenant ', 'tenant.tenant_id =penalty.tenant_id', 'left');
					$this->db->join('beds', 'beds.bed_id = penalty.bed_id', 'left');
                    $this->db->where('penalty_id',$id);
                     $query = $this->db->get('penalty'); 
                    $data = $query->row_array();
                    
                    return $data;
        		
        		}
				
				
		public function getUser($property_id)
		{
		   
		   $this->db->select('user_id');
		   $this->db->where('property_id',$property_id);
		   $query = $this->db->get('booking');
		   
		   $output = $query->result_array();
		  
		   return $output;
		 
		}
		
		public function getUserDetails($userid)
		{
			
		   $output = '<option value="">select</option>';
		   foreach($userid as $item)
		   {
			  $this->db->select('userid,name');    
			  $this->db->where('userid',$item['user_id']);
		      $query = $this->db->get('user');
		      $query->result_array();
			  
			  
			  foreach($query->result_array() as $row)
			   {
				  $output .='<option value="'.$row['userid'].'">'.$row['name'].'</option>'; 
			   }     
           }	
          return $output;
		}
		
		public function getBookingDetails($user_id)
		{
		
              $this->db->select('room_id');    
			  $this->db->where('user_id',$user_id);
		      $query = $this->db->get('booking');
		      
			  $output =  $query->row()->room_id;
              
              return $output;			  
		}
		
		public function roomDetails($room_id, $booking_id , $user_id)
		{
		   	  $this->db->select('id,room_no,seater');    
			  $this->db->where('id',$room_id);
		      $query = $this->db->get('room');
			  
			    
			   foreach($query->result_array() as $row) 
			   {
			    $row['booking_id']   = $booking_id;
				$row['penalty_user_id']   = $user_id;
				
			   }
			  
			   return $row;  
				  
		}
		
		public function Booking_id($room_id)
		{
		      $this->db->select('booking_id');    
			  $this->db->where('room_id',$room_id);
		      $query = $this->db->get('booking');  
			  
			  $output =  $query->row()->booking_id;
			  
			  return $output;
        }
		  		   		
    }
?>