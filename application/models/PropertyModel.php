<?php

	Class PropertyModel extends CI_Model
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
			public function manageproperty()	
		    {
	               
			        $property_id            =	$this->input->post("property_id");
					$amenties               =  json_encode($this->input->post('amenties'));
				    $pro_name               =	$this->input->post("pro_name");
				    $pro_des                =	$this->input->post("pro_des");
				    $pro_video		        =  $this->input->post("pro_video");
					
				        $pro_city               =	$this->input->post("pro_city");
						$pro_category           =	$this->input->post("pro_category");
						$pro_area               =	$this->input->post("pro_area");
						$pro_type               =	$this->input->post("pro_type");
						$pro_total_room         =	$this->input->post("pro_total_room");
						
						$pro_address          =	$this->input->post("pro_address");
						//$pro_actprice           =	$this->input->post("pro_actprice");
						//$pro_sell_price           =	$this->input->post("pro_sell_price");
						$status           =	$this->input->post("status");
						
						$senddata	=	array();
						$senddata['status']		=	0;
						$senddata['message']	=	"Something Went wrong, Please try again later...";
					
					    //print_r("photo_inp");
					    //print_r($this->input->post($_FILES));
					
					if(isset($_FILES['pro_img']))
					{

					}else{
						print_r("not set");
													}
													
					$this->load->helper('common_helper');
						
							$image		   =    uploadimgfile("pro_img","./assets/img","pre");
					
					if($image['status']==0){
								$senddata['message']	=	$image['message'];
						return json_encode($senddata);
					}
					
					if($image['status']==1){
						$property=array();
						$property['pro_name']=$pro_name;
						$property['pro_des']=$pro_des;
						$property['pro_video']=$pro_video;
						$property['pro_city']=$pro_city;
						$property['pro_category']=$pro_category;
						$property['pro_area']=$pro_area;
						$property['pro_total_room']=$pro_total_room;
						$property['pro_type']=$pro_type;
						$property['pro_amenties']=  $amenties;
						$property['pro_address']=$pro_address;
						//$property['pro_actprice']=$pro_actprice;
						//$property['pro_sell_price']=$pro_sell_price;
						
						$property['pro_img']=$image['data']['name'];
						
						if(empty($property_id)){
						
							$property['status']=1;
							
							$this->db->insert('property',$property);
									$senddata['status']	=	1;
									$senddata['redurl']	=	site_url('administrator/property');
									$senddata['message']	=	"Property is Created Successfully.";
									return json_encode($senddata);
						} else {
					
							$this->db->where('property_id',$property_id);
							$this->db->update('property',$property);
						
							$senddata['redurl']	=	site_url('administrator/property');
							$senddata['status']	=	2;
							$senddata['message']	=	"Property is Updated Successfully.";
							return json_encode($senddata);
						}
											
					}
					
		}
		
		
		public function GetProperty($id=0,$status=0)
		{
		  
				$this->db->select('property.*,loc_city.name as loccity,loc_area.name as locarea');
	
                $this->db->from('property'); 
                $this->db->join('loc_city', 'loc_city.city_id=property.pro_city', 'left');
				$this->db->join('loc_area', 'loc_area.area_id=property.pro_area', 'left');
				$this->db->where('property.property_id',$id);
                $query = $this->db->get();
				$data = $query->row_array();
				
				return   $data;
		
		}
		
		
			public function list_property()
			{   
				$this->db->select('property.*,loc_city.name as loccity,loc_area.name as locarea, loc_city.city_id, loc_area.area_id');
	
                $this->db->from('property'); 
                $this->db->join('loc_city', 'loc_city.city_id=property.pro_city', 'left');
				$this->db->join('loc_area', 'loc_area.area_id=property.pro_area', 'left');
				//$this->db->join('room', 'room.property_id=property.property_id', 'left');
                $query = $this->db->get();
				$data = $query->result_array();
			
				return   $data;
			}
				
			public function list_property_name(){
				return ( $this->db->query("select pro_name,property_id as pid from property")->result_array());
			}
			
			public function get_sp($sp_keys)
			{
             
			 $city   =  $sp_keys['city'];
			 $area   =  $sp_keys['area'];
			 $for   =  $sp_keys['for'];
			
			 $move_from   =  $sp_keys['movefrom'];	
			 
			 if(!empty($city) && !empty($area))
             {
				    
				    $this->db->select('property.*,loc_city.name as loccity,loc_area.name as locarea');
                    $this->db->from('property'); 
                    $this->db->join('loc_city', 'loc_city.city_id=property.pro_city', 'left');
					$this->db->join('loc_area', 'loc_area.area_id=property.pro_area', 'left');
					//$this->db->join('room', 'room.property_id=property.property_id', 'left');
			        $array = array('loc_city.city_id' => $city, 'loc_area.area_id' => $area);
					$this->db->where($array);
                    $query = $this->db->get();
					
				   
			 }
			 elseif(!empty($city))
			 {
			        $this->db->select('property.*,loc_city.name as loccity' );
                    $this->db->from('property'); 
                    $this->db->join('loc_city', 'loc_city.city_id=property.pro_city', 'left');
					//$this->db->join('room', 'room.property_id=property.property_id', 'left');
					$this->db->where('loc_city.city_id',$city);
                    $query = $this->db->get(); 
                    				
			 }
			
			 elseif(!empty($area))
			 {
				    $this->db->select('property.*,loc_area.name as locarea' );
                    $this->db->from('property'); 
                    $this->db->join('loc_area', 'loc_area.area_id=property.pro_area', 'left');
					//$this->db->join('room', 'room.property_id=property.property_id', 'left');
					$this->db->where('loc_area.area_id',$area);
                    $query = $this->db->get(); 
			 }
			
             elseif(!empty($move_from))
			 {
			 }				 
					$data = $query->result_array();
					return $data;			 
			}
        
			public function left_room()
			{    
					 
				 $this->db->where('status', 0);  
				 $query = $this->db->get('room');
				 $total_room_left = $query->num_rows();	

				 return	 $total_room_left;		 
			}

			public function ex_list_property($property_id)
			{
				
				$pid =   json_decode($property_id);
			    $this->db->select('property.*,loc_city.name as loccity,loc_area.name as locarea, loc_city.city_id, loc_area.area_id');
	
                $this->db->from('property'); 
                $this->db->join('loc_city', 'loc_city.city_id=property.pro_city', 'left');
				$this->db->join('loc_area', 'loc_area.area_id=property.pro_area', 'left');
				$this->db->where_in('property.property_id', $pid);
                $query = $this->db->get();
				$data = $query->result_array();
			
				return   $data;	
			}
			
		}
?>