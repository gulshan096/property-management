<?php

	Class BookingModel extends CI_Model
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
				public function list_users()
				{
				    $this->db->select('tenant_id,name');
			        $query = $this->db->get('tenant');
					$data = $query->result_array();
                    return $data;
				}
				
				public function list_property()
				{
				
				    $this->db->select('property_id,pro_name');
			        $query = $this->db->get('property');
				    $data = $query->result_array();
                    
                    return $data;
				}
				
				public function  ex_pro_list($property_id)
				{
					$pid =   json_decode($property_id);
					$this->db->select('property_id,pro_name');
					$this->db->where_in('property.property_id', $pid);
					$query = $this->db->get('property');
                    $data = $query->result_array();
                    
                    return $data;
				}
    			public function create_booking()
    		    {
    		          
    		            $booking_id             =   $this->input->post('booking_id'); 
    		            $property_id            =	$this->input->post("property_id");
					    $user_id                =   $this->input->post('user_id');
						$room_id                =	$this->input->post("room_id");
						$from_date              =	$this->input->post("from_date");
						$to_date		        =   $this->input->post("to_date");
						$months                 =   $this->input->post("total_months");  
					
						$senddata	=	array();
						$senddata['status']		=	0;
						$senddata['message']	=	"Something Went wrong, Please try again later...";
							
						$booking=array();
						$booking['property_id']=$property_id;
						$booking['user_id']=$user_id;
						$booking['room_id']=$room_id;
						$booking['from_date']=$from_date;
						$booking['to_date']=$to_date;
						$booking['months']=$months;
					
						if(empty($booking_id))
						   {
							   
						        $booking['created_at']=gettime4db();
								$booking['status']=  2;
								//status 2 for booking confirm
							
							    $this->db->insert('booking',$booking);
								
								$data = array('status'=>  2 );
								$this->db->where('id', $room_id);
								$this->db->update('room',$data);

							       
									$senddata['status']	=	1;
									$senddata['redurl']	=	site_url('administrator/booking/add');
									$senddata['message']	=	"Property/Room  is booked Successfully.";
									return json_encode($senddata);
						    } 
						    else 
						    {
						            $booking['updated_at']=gettime4db();
							        $this->db->where('booking_id',$booking_id);
							        $this->db->update('booking',$booking);
						
									$senddata['redurl']	=	site_url('administrator/booking/add');
									$senddata['status']	=	2;
									$senddata['message']	=	"Property/Room  is Updated Successfully.";
			
							        return json_encode($senddata);
						    }
    		    }
    		    public function list_booking()
        		{
        		
		            $this->db->select('booking.booking_id , property.property_id , room.id ,
		            room.room_no , property.pro_name , room.price , booking.status,booking.from_date,
		            booking.to_date,booking.created_at,booking.updated_at, beds.bed_no , beds.bed_id, tenant.name' );
	
                    $this->db->from('booking '); 
                    $this->db->join('room ', 'room.id=booking.room_id', 'left');
                    $this->db->join('property ', 'property.property_id=booking.property_id', 'left');
                    $this->db->join('tenant ', 'tenant.tenant_id=booking.user_id', 'left');
					$this->db->join('beds', 'beds.bed_id=booking.bed_id', 'left');
				
                    $query = $this->db->get(); 
                    $data = $query->result_array();
                    
                    return $data;
        		}
				public function ex_list_booking($property_id)
        		{
        		    $pid =   json_decode($property_id);
					
		            $this->db->select('booking.booking_id , property.property_id , room.id ,
		            room.room_no , property.pro_name , room.price , booking.status,booking.from_date,
		            booking.to_date,booking.created_at,booking.updated_at, beds.bed_no , beds.bed_id, tenant.name' );
	
                    $this->db->from('booking '); 
                    $this->db->join('room ', 'room.id=booking.room_id', 'left');
                   
                    $this->db->join('tenant ', 'tenant.tenant_id=booking.user_id', 'left');
					$this->db->join('beds', 'beds.bed_id=booking.bed_id', 'left');
					$this->db->join('property ', 'property.property_id=booking.property_id', 'left');
					// $pg  = $this->db->group_by('property.property_id'); 
					$this->db->where_in('property.property_id', $pid);

                    $query = $this->db->get(); 
                    $data = $query->result_array();
                    
                    return $data;
        		}
    				
        		public function getBooking($id)
        		{
        		    
        		    $this->db->select('booking.*, property.property_id,property.pro_img,tenant.*, 
					,property.pro_city,property.pro_area,property.pro_address, room.id ,
		            room.room_no , property.pro_name , room.price , 
					loc_area.name as area_name, loc_city.name as city_name, tenant.name' );
	
                    $this->db->from('booking '); 
                    $this->db->join('room ', 'room.id=booking.room_id', 'left');
                    $this->db->join('property ', 'property.property_id=booking.property_id', 'left');
                    $this->db->join('tenant ', 'tenant.tenant_id=booking.user_id', 'left');
					$this->db->join('loc_city ', 'loc_city.city_id=property.pro_city', 'left');
					$this->db->join('loc_area ', 'loc_area.area_id=property.pro_area', 'left');
                    $this->db->where('booking_id',$id);
                    $query = $this->db->get(); 
                    $data = $query->row_array();
                    
                    return $data;
        		
        		}
				
				
		public function property_room_list($property_id)
		{
		   
		   $multiplewhere = ['property_id ' => $property_id, 'status' => 1];
		   $this->db->where($multiplewhere);
		   $query = $this->db->get('room');
		   
		   $output = '<option value="">select</option>';
		   
		   foreach($query->result_array() as $row)
		   {
		      $output .='<option value="'.$row['id'].'">'.$row['room_no'].'</option>'; 
		   }
		   return $output;
		 
		}
		
		public function property_room_price($room_id)
		{
		   $this->db->select('*');	
		   $this->db->where('id',$room_id);
		   $query = $this->db->get('room');
		   $query->result_array();
		   
		   foreach($query->result_array() as $row)
		   {
		  
		   }
		   return $row;  
 
		}
		
		public function getStudentTransaction()
		{
	            
			
				$this->db->select('tenant.name,property.pro_name,room.room_no,beds.bed_no,transactions.transaction_id,
				                   transactions.order_id,transactions.payment_amount,transactions.created_at,transactions.status');
				$this->db->join('property','property.property_id = transactions.property_id');
				$this->db->join('room','room.id = transactions.room_id');
				$this->db->join('beds','beds.bed_id = transactions.bed_id');
				$this->db->join('tenant','tenant.tenant_id = transactions.user_id');
				$query = $this->db->get('transactions')->result_array();
				return $query;
			
		}
			
    }
?>