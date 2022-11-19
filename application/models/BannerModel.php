<?php
     
	 Class BannerModel extends CI_Model
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
			/*public function GetBanner(){
				$this->db->select("*");
				$this->db->from("Banner");
				return $this->db->get()->result_array();
			}*/
			
			public function managebanner()
			{
					$banner_id            =	$this->input->post("id");
					//print_r($banner_id);exit;

					$name           =	$this->input->post("name");
					$start_date      =	$this->input->post("start_date");
					//print_r($start_date);exit;
					$end_date		 =  $this->input->post("end_date");
					$senddata	=	array(); 
					$senddata['status']		=	0; 
					$senddata['message']	=	"Something Went wrong, Please try again later..."; 
					if($start_date>$end_date){
						$senddata['message']	=	"end date must come after start date";
						return json_encode($senddata);
					}
								
					
					if(!empty($banner_id)){ 
						if(!empty($_FILES['photo_inp']['name'])){
							$this->load->helper('common_helper');
						
							$image		   =    uploadimgfile("photo_inp","./assets/img","pre");
							
							if($image['status']==0){
								$senddata['message']	=	$image['message']; 
								return json_encode($senddata);
							}
							
							if($image['status']==1){
								$banner=array();
								$banner['name']=$name;
								$banner['start_date']=$start_date;
								$banner['end_date']=$end_date;
								$banner['image']=$image['data']['name'];
								
								$banner['updated'] 	=	gettime4db();
								$this->db->where('banner_id',$banner_id);
								$this->db->update('banner',$banner);
								
							}
						}else{
							//print_r("inside it");
							$updatetime=gettime4db();
							$update_qry=$this->db->query("UPDATE banner 
										SET name = '$name',
										start_date= '$start_date',
										end_date= '$end_date',
										updated='$updatetime'
									
										WHERE banner_id = $banner_id");
						}
						$senddata['redurl']	=	site_url('administrator/banner'); 
						$senddata['status']	=	2; 
						$senddata['message']	=	"Banner is Updated Successfully.";
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
								$banner=array();
								$banner['name']=$name;
								$banner['start_date']=$start_date;
								$banner['end_date']=$end_date;
								$banner['image']=$image['data']['name'];
								if(empty($banner_id)){
									$banner['status']=1;
									$banner['added']=gettime4db();
									$banner['updated']=0;
									$this->db->insert('banner',$banner);
									$senddata['status']	=	1; 
									$senddata['redurl']	=	site_url('administrator/banner'); 
									$senddata['message']	=	"Banner is Created Successfully."; 
									return json_encode($senddata);	
								} 
							}
					}




					/*
					
					$this->load->helper('common_helper');
						
					$image		   =    uploadimgfile("photo_inp","./assets/img","pre");
					
					if($image['status']==0){
						$senddata['message']	=	$image['message']; 
						return json_encode($senddata);
					}
					
				
					if($image['status']==1){
						$banner=array();
						$banner['name']=$name;
						$banner['start_date']=$start_date;
						$banner['end_date']=$end_date;
						$banner['image']=$image['data']['name'];
						if(empty($banner_id)){
							$banner['status']=1;
							$banner['added']=gettime4db();
							$banner['updated']=0;
							$this->db->insert('banner',$banner);
							$senddata['status']	=	1; 
							$senddata['redurl']	=	site_url('administrator/banner'); 
							$senddata['message']	=	"Banner is Created Successfully."; 
							return json_encode($senddata);		
						} else {
							$banner['updated'] 	=	gettime4db();
							$this->db->where('banner_id',$banner_id);
							$this->db->update('banner',$banner);
							$senddata['redurl']	=	site_url('administrator/banner'); 
							$senddata['status']	=	2; 
							$senddata['message']	=	"Banner is Updated Successfully.";
							return json_encode($senddata);
						}
											
					}
					*/
					
			}
		
				
			public function GetBanner($id=0,$status=0)
				{
					
					//print_r($id);exit;
					//print_r("called");
					//exit;
					if(!empty($id))
						{
							$temp	=	$this->db->query("SELECT * FROM `banner` where banner_id = '$id'")->result_array();
								if(!empty($temp))
									{
										return $temp[0];
									}else{
										return array();
									}
									//return array();
						}
						/*
					
					$this->db->select("*");
						/*$keyword	=	$this->input->post('keyword');
							if(!empty($keyword))
								
									$this->db->where(" lower(name) like '%$keyword%' ");
								
							if(!empty($status))
								{
									$this->db->where("status",$status);
								}
						*/
								//$this->db->from("banner");
							//print_r($this->db->get()->result_array());
							//exit;
					//return $this->db->get()->result_array();
				}
				
				public function list_Banner(){
					return  $this->db->query("SELECT * FROM `banner`")->result_array();

				}
		}
?>