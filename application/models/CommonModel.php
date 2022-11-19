<?php
	Class CommonModel extends CI_Model
		{
	
			function __construct()
				{
				   parent::__construct();
					//$this->load->helper('cookie');
				}
			
            public function mytransaction()
			{
				$user_id = $this->session->userdata('tenant_id');
				$this->db->where('user_id',$user_id);
				$query = $this->db->get('transactions')->result_array();
				
				return $query;
				
			}
			
			public function mybooking()
			{
				$this->db->select('property.pro_name,room.room_no,beds.bed_no,booking.from_date,booking.status,booking.created_at,booking.booking_id');
				$user_id = $this->session->userdata('tenant_id');
				$this->db->join('property','property.property_id = booking.property_id');
                $this->db->join('room','room.id = booking.room_id');
                $this->db->join('beds','beds.bed_id = booking.bed_id');				
				$this->db->where('user_id',$user_id);
				$query = $this->db->get('booking')->result_array();
				   
				return $query;	
			}
			
			public function myBookingInvoice($booking_id)
			{
				$user_id = $this->session->userdata('tenant_id');
				
				$multiplewhere  =  array('booking.booking_id' =>$booking_id, 'booking.user_id'=> $user_id );
				
				$this->db->select('property.pro_name,
				                   room.room_no,
								   beds.bed_no,
								   booking.from_date,booking.status,booking.created_at,booking.booking_id,
								   transactions.transaction_id,transactions.order_id,transactions.payment_amount,
								   transactions.status');
				
				$this->db->join('property','property.property_id = booking.property_id');
                $this->db->join('room','room.id = booking.room_id');
                $this->db->join('beds','beds.bed_id = booking.bed_id');
                $this->db->join('transactions','transactions.booking_id = booking.booking_id');
                				
				$this->db->where($multiplewhere);
				$query = $this->db->get('booking')->row_array();
				
				return $query;
			}
			
            public function getRoomDetail($property_id, $seater_type)
			{
			   $multiplewhere  =  array('property_id' =>$property_id, 'seater'=> $seater_type);	
               $this->db->select('total_bed');
			   $this->db->where($multiplewhere);
			   $total_bed  = $this->db->get('room')->row()->total_bed;
			   
			  
			  
			   $this->db->select('room_no,id');
               $this->db->where('property_id',$property_id);
			   $this->db->where('status !=', $total_bed);
               $this->db->where('seater', $seater_type);
			   $query = $this->db->get('room');
			   
			  
			   
			   $output ='<option value=""> </option>'; 
			   
			   foreach($query->result_array() as $row)
			    {
				  $output .='<option value="'.$row['id'].'">'.$row['room_no'].'</option>'; 
			    } 

               return $output;		     
			}

			public function getBeds($property_id, $room_id, $seater)
			{
			   $multiplewhere  =  array('property_id' =>$property_id, 'room_id'=> $room_id,'seater'=> $seater ,'status' => 0);
			   $this->db->select('bed_no , bed_id');
               $this->db->where($multiplewhere);
			   $query = $this->db->get('beds');
			   
			   $output ='<option value=""> </option>';
			   
				foreach($query->result_array() as $item)
				{
				   $output .='<option value="'.$item['bed_id'].'">'.$item['bed_no'].'</option>';	
				}
				
				return $output;
			}
			
			public function getRoomPrice($property_id, $room_id, $bed_id)
			{
			   $multiplewhere  =  array('property_id' =>$property_id, 'room_id'=> $room_id ,'bed_id' => $bed_id );
			   $this->db->select('price, room_id');
               $this->db->where($multiplewhere);
			   $query = $this->db->get('beds');
			   
			    $price = $query->result_array();
				
				foreach($price as $item)
				{
					
				}
				
				return $item;
			}
			
			
			public function getArea($city_id)
			{   

      	
				$this->db->where('city_id',$city_id);
				$query = $this->db->get('loc_area');
				
				$output ='<option value=""> </option>'; 
				
				foreach($query->result_array() as $row)
			    {
				  $output .='<option value="'.$row['area_id'].'">'.$row['name'].'</option>'; 
			    } 
              return $output;				
				
            } 				
				
			public function completed()
			{
				$sql = "SELECT count(id) as completed FROM `booking`
						WHERE order_status = '4'";  
				$data = $this->db->query($sql);   
				return $data->result_array();
			}					
			public function cancelled()
			{
				$sql = "SELECT count(id) as cancelled FROM `booking`
						WHERE order_status = '6'";  
				$data = $this->db->query($sql);   
				return $data->result_array();
			}					
			public function today_booking()
			{
				$sql = "SELECT count(id) as total FROM `booking`
						WHERE date(added) = '".date('Y-m-d')."'";  
				$data = $this->db->query($sql);   
				return $data->result_array();
			}		
			public function total_booking()
			{
				$sql = "SELECT count(id) as total FROM `booking`";
				$data = $this->db->query($sql);   
				return $data->result_array();
			}			
			public function gettransaction_vendor($pid)
			{
				if(!empty($pid)){ 
					$sql  =	"SELECT t.id,transaction_id,b.name,b.email,b.mobile,u.name as user,payment_amount,payment_mode,t.status,t.added
						FROM `transaction` as t
						JOIN users as u  ON u.uid = t.user_id
						JOIN business_personal as b on b.pid = t.pid
						WHERE t.pid = '$pid'";         
				}else{
				$sql  =	"SELECT t.id,transaction_id,b.name,b.email,b.mobile,u.name as user,payment_amount,payment_mode,t.status,t.added
						FROM `transaction` as t
						JOIN users as u  ON u.uid = t.user_id
						JOIN business_personal as b on b.pid = t.pid"; 
				}						
				$data = $this->db->query($sql);   
				return $data->result_array();
			}				
			public function gettransaction_user()
			{
				$sql  =	"SELECT t.id,transaction_id,u.name,u.email,u.mobile,b.name as provider,payment_amount,payment_mode,t.status,t.added
						FROM `transaction` as t
						JOIN users as u  ON u.uid = t.user_id
						JOIN business_personal as b on b.pid = t.pid";          
				
				$data = $this->db->query($sql);   
				return $data->result_array();
			}				
			// public function booking_list()
			// {
				// $this->db->select('transaction.payment_amount as amount,users.name as username,users.mobile as userphone,booking.id,booking.odometer,booking.vehicle_no,booking.user_id as uid ,bike_make.name as make,bike_model.name as model,bike_varient.name as varient,appointment_date,appointment_time,booking.provider_id as provider_id,address,coupons,booking.image ,payment_status,order_status,booking.status as status,booking.added as added,booking.updated as updated');               
					// $this->db->from('booking'); 
					// $this->db->join('bike_make','bike_make.id = booking.make');  
					// $this->db->join('bike_model','bike_model.id = booking.model');   			
					// $this->db->join('bike_varient','bike_varient.id = booking.varient','left');           
					// $this->db->join('users','users.uid = booking.user_id');            
					// $this->db->join('transaction','transaction.booking_id = booking.id','left');              
					// $data = $this->db->get()->result_ar ray();        
				// return $data;  
			// }	   
			public function booking_list($uri,$pid)  
			{
				if(!empty($pid)){
					 $sql  =	"SELECT b.id,u.name as username,u.mobile as userphone,vehicle_no,appointment_date,appointment_time,p.name as provider,address,coupons,b.status,b.order_status,b.added
									FROM `booking` as b
									JOIN users as u on u.uid = b.user_id 
									JOIN business_personal as p on p.pid = b.provider_id 
									WHERE provider_id = '$pid'";       
				}else{
					if($uri=="today"){
						 $sql  =	"SELECT b.id,u.name as username,u.mobile as userphone,vehicle_no,appointment_date,appointment_time,p.name as provider,address,coupons,b.status,b.order_status,b.added
									FROM `booking` as b
									JOIN users as u on u.uid = b.user_id 
									JOIN business_personal as p on p.pid = b.provider_id 
									WHERE date(b.added) = '".date('Y-m-d')."'";       
					}else{
						$sql  =	"SELECT b.id,u.name as username,u.mobile as userphone,vehicle_no,appointment_date,appointment_time,p.name as provider,address,coupons,b.status,b.order_status,b.added
								FROM `booking` as b
								JOIN users as u on u.uid = b.user_id
								JOIN business_personal as p on p.pid = b.provider_id ";                    
					} 		
				}				
					$data = $this->db->query($sql);       
					return $data->result_array();    
			}
			public function getslider()  
			{
				$sql  =	"SELECT * FROM `slider`";           
				$data = $this->db->query($sql);    
				return $data->result_array();     
			}
			public function list_stock()   
			{
				$sql  =	"SELECT * FROM `spare_stock`";             
				$data = $this->db->query($sql);     
				return $data->result_array();   
			} 
			public function list_notification()   
			{  
				$sql  =	"SELECT * FROM `Notification`";        
				$data = $this->db->query($sql);      
				return $data->result_array();    
			} 
			public function list_package()  
			{
				$sql  =	"SELECT p.id as pid , c.id as cid , c.title as category ,p.package ,p.status,p.added,p.updated     
							FROM `package` as p   
							JOIN category as c
							ON c.id = p.category";        
				$data = $this->db->query($sql);  
				return $data->result_array();      
			}
			public function list_vendor()
			{
				$sql	=	"SELECT * FROM `business_personal`";     
				$data	= 	$this->db->query($sql);  
				return $data->result_array();   
			}		
			public function list_offer_promotion()
			{
				$sql	=	"SELECT * FROM `offers_promotions`";   
				$data 	= 	$this->db->query($sql); 
				return $data->result_array();    
			}		
			public function list_spare_gst()
			{
				$sql	=	"SELECT * FROM `spare_gst`";   
				$data   = 	$this->db->query($sql); 
				return $data->result_array(); 
			}			
			public function list_spare_unit()
			{
				$sql	=	"SELECT * FROM `spare_units`";    
				$data 	= 	$this->db->query($sql);
				return $data->result_array(); 
			}			
			public function list_spare_category()
			{
				$sql	=	"SELECT * FROM `spare_type`";    
				$data 	= 	$this->db->query($sql);  
				return $data->result_array(); 
			}	
			public function Category() 
			{
				$sql	=	"SELECT * FROM `category`";    
				$data 	=	 $this->db->query($sql); 
				return $data->result_array(); 
			}			
			public function list_spare_parts()
			{
				$sql	=	"SELECT c.id as cid,u.id as uid,g.id as gid,spare_parts.id as sid ,c.title as catname ,u.title as unit ,spare_parts.spare_part_name as parts , quantity , selling_price, spare_part_no,remark,gst_type,g.percentage as per,spare_parts.added as added,spare_parts.updated as updated ,spare_parts.status as status  
				FROM `spare_parts` 
				LEFT JOIN spare_type as c 
				ON c.id=spare_parts.type
				LEFT JOIN spare_units as u 
				ON u.id=spare_parts.unit 
				LEFT JOIN spare_gst as g
				ON g.id=spare_parts.gst_slab";    
				$data = $this->db->query($sql);   
				return $data->result_array(); 
			}			
			public function list_spare_parts_vendors()
			{
					$this->db->select('p.id,b.name,b.mobile,p.spare_part_name,p.spare_part_no,p.quantity,t.title,p.selling_price,p.added,p.updated,p.status');  
					$this->db->from('spare_parts as p');
					$this->db->join('spare_type as t','t.id = p.type');    
					$this->db->join('business` as b','b.bid = p.pid','left');                   
					$this->db->where('p.pid!=0');  
					$data = $this->db->get();    
					return $data->result_array();  
			}			
			public function list_make()
				{
					$sql	=	"SELECT * FROM `bike_make`"; 
					$data 	= 	$this->db->query($sql); 
					return $data->result_array();      
				}
			public function list_model() 
				{
					$sql	=	"SELECT * FROM `bike_model`"; 
					$data 	= 	$this->db->query($sql);
					return $data->result_array();
				}
			public function list_varient()
				{
					$sql	=	"SELECT * FROM `bike_varient`";  
					$data 	= 	$this->db->query($sql);
					return $data->result_array();
				}
					
			public function list_city()
				{
					$sql	=	"SELECT * FROM `loc_city`"; 
					$data 	= 	$this->db->query($sql)->result_array();
					return $data;
				
				}
				
			public function list_area()
				{
					$sql= "SELECT la.area_id,lc.name as cityname,la.city_id,la.name,la.image,la.status,la.added,la.updated FROM `loc_area` la join `loc_city` lc on la.city_id=lc.city_id";

					//$sql	=	"SELECT la.area_id,la.name,lc.name,la.image,la.status,la.added,la.updated FROM `loc_area` la join `loc_city` lc on la.city_id=lc.city_id";
					/*$sql	=	"SELECT loc_area.area_id,loc_area.name,loc_city.name,loc_area.image,loc_area.status,loc_area.added,loc_area.updated FROM `loc_area` join `loc_city` on loc_area.city_id=loc_city.city_id";*/
					$data	= 	$this->db->query($sql);
					return $data->result_array();
				}
				
			public function get5notifaction()
				{
					$sql  =	"SELECT * FROM `activitylog` order by autoid DESC LIMIT 5"; 
					$data = $this->db->query($sql);
					$data = $data->result_array();
					if(!empty($data))		
						{
							foreach($data as $sin)	
							{
					?>
						<div class="p-2 list-group-item-1 list-group-item-action">
                            <span class="d-flex align-items-center mb-1">
                                <small class="text-black-50">
									<?php echo timeago($sin['ontime']); ?>
								</small>
                            </span>
                            <span class="d-flex">
                                <span class="flex d-flex flex-column">
                                    <span class="text-black-70">
										<?php echo ($sin['message']); ?>
									</span>
                                </span>
                            </span>
                        </div>
					<?php	
							}
						} 							
				}
				
			public function add_activity($message,$userid=0,$usertype=0)
				{
					if(empty($userid))
						{
							$userid		=	$this->session->userdata('userid');	
							$utype 		=	$this->session->userdata('usertype');	
							$username 	=	$this->session->userdata('username');	
						}
						
							if(empty($username)) 	{	$username	=	"unknowkn"; 	}
							if(empty($utype))		{	$utype 		=	"unknowkn"; 	}
							if(empty($userid))  	{	$userid 	=	0;				} 

						$array	=	array();
							$array['usertype'] 		=	$utype;
							$array['userid'] 		=	$userid;
							$array['description']	=	$message;
							$array['status'] 		=	1;
							$array['added'] 		=	gettime4db();
							$array['ip'] 			=	get_client_ip(); 
					$this->db->insert("activity_log",$array);			
				}
				
			public function getmasterdata($table,$select="id,title")
				{
					$this->db->select($select);	
					
							$parentid	=	$this->input->post("parentid"); 
							$boardid	=	$this->input->post("boardid");
							$classid	=	$this->input->post("classid");
							$subjectid	=	$this->input->post("subjectid");
							
						if(WEBSITE_FOR=="talent")
						    {
    							switch($table)
    							    {
    							        case "board":
    							            {
    							                $this->db->where(" id in ( SELECT masterid FROM `schmod_master` WHERE master = 'board' ) ");
    							            }
    						            break;
    							        case "class":
    							            {
    							                $this->db->where(" id in ( SELECT masterid FROM `schmod_master` WHERE master = 'class' ) ");
    							            }
    						            break;
    							        case "subject":
    							            {
    							                $this->db->where(" id in ( SELECT masterid FROM `schmod_master` WHERE master = 'subject' ) "); 
    							            }
    						            break;
    							        default: case "":
    						            break;
    							    }
						    }
						    
						   
						if(WEBSITE_FOR=="livedoubt")
						    {
    							switch($table)
    							    {
    							        case "board":
    							            {
    							                $this->db->where(" id in ( SELECT masterid FROM `livedoubt_master` WHERE master = 'board' ) ");
    							            }
    						            break;
    							        case "class":
    							            {
    							                $this->db->where(" id in ( SELECT masterid FROM `livedoubt_master` WHERE master = 'class' ) ");
    							            }
    						            break;
    							        case "subject":
    							            {
    							                $this->db->where(" id in ( SELECT masterid FROM `livedoubt_master` WHERE master = 'subject' ) ");
    							            }
    						            break;
    							        default: case "":
    						            break;
    							    }
						    } 
						    
							
						if(!empty($subjectid))	
							{
								$this->db->where("subjectid",$subjectid);	
									if(!empty($boardid))	
										{
											$this->db->where("boardid",$boardid);
										}	
									if(!empty($classid))	
										{
											$this->db->where("classid",$classid);
										}
								$this->db->where("parent",0);	
							}
							
							
	$usertype = $this->session->userdata('usertype');

		if($usertype='trainer')
			{
				
				switch($table)
					{
						
					}
				
			}
		
						if(!empty($parentid))	
							{
								$this->db->where("parent",$parentid);	
							}
					
						$usertype = $this->session->userdata('usertype');
						
							if($usertype!="admin")	
								{
									$this->db->where("status","1");	
								}
					
					$this->db->from($table);
					$query	=	$this->db->get();
					return $result =	$query->result();
				}
				
			public function getcategory($parentid=0, $status=0)
				{
				//	echo "# $parentid #";
					if(!empty($parentid))
						{
							$this->db->select("id,title,image");	
						} else {
							$this->db->select("id,title,description,image");	
						}
					
						if(!empty($parentid))
							{
								$this->db->where("parent",$parentid);	
							} else {
								$this->db->where("parent",0);	
							}
						if(!empty($status))
							{
								$this->db->where("status",$status);	  
							}
					$this->db->from('category');
					$query	=	$this->db->get();
					return $result =	$query->result();  
				}
				
				
				
				
		 public function listcategory($table,$id=0,$parent_id=0,$select="title,id")
				{
					$this->db->select($select);	
					$usertype = $this->session->userdata('usertype');
					if($usertype!="admin")	
					{
						$this->db->where("status","1");	
					}
					if(!empty($id))
					{
						$this->db->where("id",$id);	
					} else {									
							if(!empty($parent_id))
							{
								$this->db->where("parent",$parent_id);	
							} else {
								$this->db->where("parent",0);	
							}
					}
					$this->db->from($table);
					$query	=	$this->db->get();
					$result =	$query->result_array();
					$sendresult = array();
					if(!empty($result))
					{
						foreach($result as $singi) 
						{
							$singi['child'] =	$this->listcategory($table,0,$singi['id'],"title,id"); 
							$sendresult[]	=	$singi;
						}
					} else {
						$sendresult = $result; 
					}	
					return $sendresult;
				}
				
			public function getcountries($id=0)
				{
					$this->db->select("id,sortname,name");	 
					$this->db->where("status","1");	
						if(!empty($id))
							{
								$this->db->where("id",$id);	 
							}
					$this->db->from('countries');
					$query	=	$this->db->get();
					return $result = $query->result();
				}

			public function getstates($country_id=0,$id=0)
				{
					$this->db->select("id,name");	
					$this->db->where("status","1");	
						if(!empty($country_id)) 
							{
								$this->db->where("country_id",$country_id);	   
							}
						if(!empty($id))
							{
								$this->db->where("id",$id);	
							}
					$this->db->from("states");
					$query	=	$this->db->get();
					return $result =	$query->result();
				}

			public function getcities($state_id=0,$id=0)
				{
					$this->db->select("id,name");	
					$this->db->where("status","1");	
						if(!empty($state_id))
							{
								$this->db->where("state_id",$state_id);	
							}
						if(!empty($id))
							{
								$this->db->where("id",$id);	
							}
					$this->db->from('cities');
					$query	=	$this->db->get();
					return $result =	$query->result();
				}
		}
?>