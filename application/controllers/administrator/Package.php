<?php

		defined('BASEPATH') OR exit('No direct script access allowed');

	class Package extends CI_Controller
		{

			function __construct()
				{
					    parent::__construct();
					    $this->load->helper("common_helper");
						$this->load->model('AuthenticationModel');
						$this->load->model('PropertyModel');
						$this->load->model('RoomModel');
						$this->load->model('UserModel');
                        $this->load->model('BookingModel');	
                        $this->load->model('PackageModel');	
                         $this->load->model('SubadminModel');
											
				}
				
			public function manage_package()
			{
			   
				$this->AuthenticationModel->checklogin();
				echo $this->PackageModel->create_package();
			}
			

			
			public function getProperty()
			{
				
			  $loc =  $this->input->post('location');			  
			  echo $this->PackageModel->list_property($loc);   
			}
			
			
				
			public function  viewpackage($id){
			$this->AuthenticationModel->checklogin();
					$data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	=	$seo;
						$data['openform']		=	$id; 
						
						
						$data['list_package']	=	$this->PackageModel->list_package();
						$data['get_package']	=	$this->PackageModel->getPackage($id);
					
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
						   
						  $data['get_location']       =   $this->PackageModel->list_location();  
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('admin/package/view_package',$data);
		
		}
		
		
		
		public function bookingView($booking_id)
		{
		            $this->AuthenticationModel->checklogin();
					$data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	=	$seo;
				
						$data['get_booking']	=	$this->BookingModel->getBooking($booking_id);
						
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('admin/booking/booking_view',$data);   
		}
		
			
		}
		
?>