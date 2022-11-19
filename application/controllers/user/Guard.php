<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Guard extends CI_Controller
		{
			
			function __construct()
			{
					    parent::__construct();
		
						$this->load->model('PropertyModel');
						$this->load->model('user/HostModel');
						$this->load->model('CommonModel');
						$this->load->model('user/UserLoginModel');
						$this->load->model('SubadminModel');
						$this->load->model('AuthenticationModel');
						$this->load->model('SubadminModel');
						$this->load->model('PackageModel');
				    
			}
				
				
			public function	pro_owner_reg()
			{
				echo $this->HostModel->pro_owner_reg();
			}
			
			public function managehost()
			{
				$this->AuthenticationModel->checklogin();					
				echo $this->SubadminModel->managehost();
			}
				
			public function host()
				{
					
					
					$seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India.";
						
						$data	=	array(); 
						$data['seo']	=	$seo;
                        
                        $data['property_list']	  =	$this->PropertyModel->list_property();
						$data['list_city']	      =	$this->CommonModel->list_city();
						
						
						$get_sp_key               = $this->input->get();
						
						if(!empty($get_sp_key ))
						{
							$data['get_sp']           =  $this->PropertyModel->get_sp($get_sp_key);  
						}
				
						$data['curuser']          =   $this->UserLoginModel->getUserProfile();
						 
						
						$this->load->view('user/include/header',$data);
						$this->load->view('user/host/register_host',$data);
						$this->load->view('user/include/footer',$data);
						
				}
				
				
				public function reg_owner_list()
				{
					$this->AuthenticationModel->checklogin();
					
					$data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	=	$seo;
						
						
						$data['curuserdata']    =   $this->SubadminModel->getUserProfile();
						
						$data['register_owner_list'] = $this->HostModel->register_owner_list();
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('admin/owner/registered_owner',$data);
				}
				
				public function host_owner_details()
                {
					
				
				     $this->AuthenticationModel->checklogin();
					
					 $data =  $this->HostModel->host_owner_details();
                    
                     echo json_encode($data);					 
				
		        }
				
				public function owner_list($id)
		        {
					
					
					$this->AuthenticationModel->checklogin();
					
					$data = array();
					$seo = array();
					$seo['title']		=	"Admin Dashboard - ".APP_NAME;
					$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
					$data['seo']	=	$seo;
					$data['openform']		=	$id;
					
					$data['curuserdata']    =   $this->SubadminModel->getUserProfile();	
					$data['list_owner']	=	$this->SubadminModel->owner_list();
					$data['subadmin']			=	$this->SubadminModel->GetAdmin($id);
					
					$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
				    $data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
					$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
					$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					$this->load->view('admin/owner/owner_list',$data);
				}
				
				
				
				
			public function add_guard()
				{
				
				
					
					$seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India.";
						
						$data	=	array(); 
						$data['seo']	=	$seo;
                        
                        $data['property_list']	  =	$this->PropertyModel->list_property();
						$data['list_city']	      =	$this->CommonModel->list_city();
					
						$get_sp_key               = $this->input->get(); 
						
						if(!empty($get_sp_key ))
						{
							$data['get_sp']           =  $this->PropertyModel->get_sp($get_sp_key);  
						}
				
						$data['curuser']          =   $this->UserLoginModel->getUserProfile();
						 
						
						$this->load->view('user/include/header',$data);
						$this->load->view('user/guard/register_guard',$data);
						$this->load->view('user/include/footer',$data);
						
				}
				
				public function getProperty()
				{
					
				  $city_id =  $this->input->post('city_id'); 
				  echo $this->PackageModel->list_property($city_id);   
				}
				
				public function proAddress()
				{
				     $pro_id =  $this->input->post('pro_id'); 
				     $data =  $this->PackageModel->getProperty($pro_id);	
					 
					 echo json_encode($data);
				}
				
				
				public function register_guard()
				{
			
				    echo $this->SubadminModel->register_guard();	  
				}
				
				
						
		}
