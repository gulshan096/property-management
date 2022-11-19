<?php

		defined('BASEPATH') OR exit('No direct script access allowed');

	class Booking extends CI_Controller
		{

			function __construct()
				{
					    parent::__construct();
					    $this->load->helper("common_helper");
						$this->load->model('AuthenticationModel');
						$this->load->model('BookingModel');
						$this->load->model('PropertyModel');
						$this->load->model('RoomModel');
						$this->load->model('UserModel');
						$this->load->model('BookingModel');
						$this->load->model('SubadminModel');
						
				}
				
			public function manage_booking()
			{
			   
				$this->AuthenticationModel->checklogin();
				  echo $this->BookingModel->create_booking();
			}
			
			public function getRoom()
			{
			 
			 $property_id = $this->input->post('propertyid');
                 echo $this->BookingModel->property_room_list($property_id); 
			
			}
			
			public function getRoomDetail()
			{
			  $room_id = $this->input->post('room_id');
			  $data =  $this->BookingModel->property_room_price($room_id); 

              echo json_encode($data);			  
			}
			
				
			public function  booking_create($id){
			$this->AuthenticationModel->checklogin();
					$data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	=	$seo;
						$data['openform']		=	$id; 
						
						
						$data['list_booking']	=	$this->BookingModel->list_booking();
						$data['get_booking']	=	$this->BookingModel->getBooking($id);
						$data['get_property']   =   $this->BookingModel->list_property(); 
						$data['get_users']       =   $this->BookingModel->list_users();
                        $data['curuserdata']               =   $this->SubadminModel->getUserProfile();						
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('admin/booking/admin_booking_create',$data);
		
		}
		
		public function invoiceView($booking_id)
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
					
			            $this->load->view('admin/booking/invoice',$data);   
		}
		
		public function bookingView($booking_id)
		{
		            $this->AuthenticationModel->checklogin();
					$data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();	
						$data['seo']	=	$seo;
				
						$data['get_booking']	=	$this->BookingModel->getBooking($booking_id);
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('admin/booking/booking_view',$data);   
		}
		
		
		
		public function student_transaction()
		{
			$this->AuthenticationModel->checklogin();
					$data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();	
						$data['seo']	=	$seo;
				
						$data['get_student_transaction']	=	$this->BookingModel->getStudentTransaction();
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('admin/transaction/student_transaction',$data);   

		}
		
		
		
		

	}		
		
?>