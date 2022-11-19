<?php

	Class LocationModel extends CI_Model
		{
			function __construct()
				{
				   parent::__construct();
				}
				
			
			
				
				
		/*	For Admnin Function will be here	*/	

		/*	public function AddState()
				{
					$states	=	$this->input->post("state");
					
						if(!empty($states))
							{
								if(!empty($states['id']))
									{
										$states['updated']	=	gettime4db();
										$this->db->where('id',$states['id']);	
										$this->db->update('states',$states);
										
                                         										
											return "<div class='alert alert-info'>State $states[name] Updated successfully.</div>";
											
									} else {
										$states['added']	=	gettime4db();
										$this->db->insert('states',$states);	
											return "<div class='alert alert-info'>State $states[name] Added successfully.</div>";
											
									}
							}
					
						return "";
				}
				
			*/
			
			/*
			public function GetState($id=0,$status=0)
				{
					if(!empty($id))
						{
							$temp	=	$this->db->query("SELECT * FROM `states` where id = '$id'")->result_array();
								if(!empty($temp))
									{
										return $temp[0];
									}
									return array();
						}
						$this->db->select("*");
						$keyword	=	$this->input->post('keyword');
							if(!empty($keyword))
								{
									$this->db->where(" lower(name) like '%$keyword%' ");
								}
							if(!empty($status))
								{
									$this->db->where("status",$status);
								}
								$this->db->from("states");
					return $this->db->get()->result_array();
					
					
				}
				
			*/
				
			/**/
				
			public function managecity()
				{
					$city           =	$this->input->post("city");
					//print_r($banner_id);exit;

					$name           =	$this->input->post("city[name]");
					$city_id      =	$this->input->post("city[city_id]");
					//print_r($start_date);exit;
					//$end_date		 =  $this->input->post("end_date");
					$senddata	=	array(); 
					$senddata['status']		=	0; 
					$senddata['message']	=	"Something Went wrong, Please try again later..."; 
					
					
					$check_already	=	$this->db->query("SELECT name FROM `loc_city` WHERE name = '$name' AND city_id != '$city_id'")->result_array();
				
					if(!empty($check_already))
						{
							$senddata['message']	=	"City name ($name) is already on the System, Please create new City."; 
								return json_encode($senddata);
						}

					if(!empty($city_id)){
						if(!empty($_FILES['photo_inp']['name'])){
							$this->load->helper('common_helper');
						
							$image		   =    uploadimgfile("photo_inp","./assets/img","pre");
							
							if($image['status']==0){
								$senddata['message']	=	$image['message']; 
								return json_encode($senddata);
							}
							
							if($image['status']==1){
								$city=array();
								$city['name']=$name;
								//$banner['start_date']=$start_date;
								//$banner['end_date']=$end_date;
								$city['image']=$image['data']['name'];
								
								$city['updated'] 	=	gettime4db();
								$this->db->where('city_id',$city_id);
								$this->db->update('loc_city',$city);
								
							}
						}else{
							//print_r("inside it");
							$updatetime=gettime4db();
							$update_qry=$this->db->query("UPDATE loc_city 
										SET name = '$name',
										
										updated='$updatetime'
									
										WHERE city_id = $city_id");
						}
						$senddata['redurl']	=	site_url('administrator/location/city/viewall'); 
						$senddata['status']	=	2; 
						$senddata['message']	=	"City is Updated Successfully.";
						return json_encode($senddata);
					}else{
						if(empty($_FILES['photo_inp']['name'])){
							//$senddata['status']	=	1; 
							//$senddata['redurl']	=	site_url('administrator/banner'); 
							$senddata['message']	=	"Please Select a Image."; 	
							return json_encode($senddata);

						}

						$this->load->helper('common_helper');
						
							$image		   =    uploadimgfile("photo_inp","./assets/img","pre");
							
							if($image['status']==0){
								$senddata['message']	=	$image['message']; 
								return json_encode($senddata);
							}
							
							if($image['status']==1){
								$city=array();
								$city['name']=$name;
								//$banner['start_date']=$start_date;
								//$banner['end_date']=$end_date;
								$city['image']=$image['data']['name'];
								if(empty($city_id)){
									$city['status']=1;
									$city['added']= gettime4db();
									$city['updated']=0;
									$this->db->insert('loc_city',$city);
									$senddata['status']	=	1; 
									$senddata['redurl']	=	site_url('administrator/location/city/viewall'); 
									$senddata['message']	=	"City is Created Successfully."; 
									return json_encode($senddata);	
								} 
							}
					}

				}
				
				
				
				
				
				
			public function managearea()
				{
					$area           =	$this->input->post("area");
					//print_r("area ............");
					//print_r($area);
					//exit;

					$name         =	$this->input->post("area[name]");
					$area_id      =	$this->input->post("area[area_id]");
					$city_id      = $this->input->post("area[city_id]");
					//print_r($start_date);exit;
					//$end_date		 =  $this->input->post("end_date");
					$senddata	=	array(); 
					$senddata['status']		=	0; 
					$senddata['message']	=	"Something Went wrong, Please try again later..."; 
					
					
					$check_already	=	$this->db->query("SELECT name FROM `loc_area` WHERE name = '$name' AND area_id != '$area_id'")->result_array();
				
					if(!empty($check_already))
						{
							$senddata['message']	=	"Area name ($name) is already on the System, Please create new Area."; 
								return json_encode($senddata);
						}
						
					$this->load->helper('common_helper');
					$image		   =    uploadimgfile("photo_inp","./assets/img","pre");

					
					if(!empty($area_id)){
						if($image['status']==0){
							$sql=$this->db->query("update loc_area
							set name='$name',city_id=$city_id,status=1,updated='gettime4db()' 
							where area_id=$area_id");
						}else{
							$image_path=$image['data']['name'];
							$sql=$this->db->query("update loc_area
							set name='$name',image='$image_path',city_id=$city_id,status=1,updated='gettime4db()' 
							where area_id=$area_id");
						}
						if($sql){
							
							$senddata['status']		=	2; 
							$senddata['message']	=	"Area name ($name) is update successfully..."; 
							$senddata['redurl']	=	site_url('administrator/location/area/viewall'); 
							return json_encode($senddata);
						}
					}else{
						if($image['status']==0){
							$added=gettime4db();
							$sql=$this->db->query("insert into loc_area(name,city_id,status,added,updated)
								values('$name','$city_id',1,'$added',0)");
						}else{
							$image_path=$image['data']['name'];
							$added=gettime4db();
							$sql=$this->db->query("insert into loc_area(name,image,city_id,status,added,updated)
								values('$name','$image_path',$city_id,1,'$added',0)");
						}
						if($sql){
							
							$senddata['status']		=	1; 
							$senddata['message']	=	"Area name ($name) is added successfully..."; 
							$senddata['redurl']	=	site_url('administrator/location/area/viewall'); 
							return json_encode($senddata);
						}

					}
			

	
		}


				
		/*	public function AddCity()
				{
					$cities	=	$this->input->post("city");
					
						if(!empty($cities))
							{
								if(!empty($cities['city_id']))
									{
										$cities['updated']	=	gettime4db();
										$this->db->where('city_id',$cities['id']);	
										$this->db->update('loc_city',$cities);
										
                                         										
											return "<div class='alert alert-info'>City $cities[name] Updated successfully.</div>";
											
									} else {
										$cities['added']	=	gettime4db();
										$this->db->insert('loc_city',$cities);	
											return "<div class='alert alert-info'>City $cities[name] Added successfully.</div>";
											
									}
							}
					
						return "";
				}*/
				
				
			public function GetArea($id=0,$status=0)
				{
						if(!empty($id))
						{
							$temp	=	$this->db->query("SELECT * FROM `loc_area` where area_id = '$id'")->result_array();
							print_r($temp);
								if(!empty($temp))
									{
										return $temp[0];
									}
										return array();
										
						}
						
							$this->db->select("*");
							
						//$keyword	=	$this->input->post('keyword');
						
						/*	if(!empty($keyword))
								{
									$this->db->where(" lower(name) like '%$keyword%' ");
								}
							*/
						
							if(!empty($status))
								{
									$this->db->where("status",$status);
								}
						
								$this->db->from("loc_area");
								
						
					return $this->db->get()->result_array();
				}
			
			public function GetCity($id=0, $status=0)
				{
						if(!empty($id))
						{
							$temp	=	$this->db->query("SELECT * FROM `loc_city` where city_id = '$id'")->result_array();
							print_r($temp);
								if(!empty($temp))
									{
										return $temp[0];
									}
										return array();
										
						}
						
							$this->db->select("*");
							
						//$keyword	=	$this->input->post('keyword');
						
						/*	if(!empty($keyword))
								{
									$this->db->where(" lower(name) like '%$keyword%' ");
								}
							*/
						
							if(!empty($status))
								{
									$this->db->where("status",$status);
								}
						
								$this->db->from("loc_city");
								
						
					return $this->db->get()->result_array();
				}
				
		
		}
		
		
?>