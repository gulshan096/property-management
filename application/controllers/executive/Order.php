<?php

		defined('BASEPATH') OR exit('No direct script access allowed');

	class Order extends CI_Controller
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
						$this->load->model('CommonModel');
						$this->load->model('user/UserLoginModel');
						
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
			
				
			public function  order_list($id){
			         $this->AuthenticationModel->checklogin_executive();
					$data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	=	$seo;
						$data['openform']		=	$id; 
						$curuserdata               =   $this->SubadminModel->getexecutiveProfile();
						
						$data['curuserdata'] = $curuserdata;
					    $property_id = $curuserdata['property_id'];
					   
						$data['list_booking']	=	$this->BookingModel->ex_list_booking($property_id);
						
						$data['get_booking']	=	$this->BookingModel->getBooking($id);
						$data['get_property']   =   $this->BookingModel->ex_pro_list($property_id); 
						$data['get_users']       =   $this->BookingModel->list_users();
                       						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('executive/order/orders',$data);
		
		}
		
		public function invoiceView($booking_id)
		{
		            $this->AuthenticationModel->checklogin_executive();
					$data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	=	$seo;
				
						$data['get_booking']	=	$this->BookingModel->getBooking($booking_id);
						$data['curuserdata']               =   $this->SubadminModel->getexecutiveProfile();	
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('admin/booking/invoice',$data);   
		}
		
		public function orderView($booking_id)
		{
		            $this->AuthenticationModel->checklogin_executive();
					$data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['curuserdata']               =   $this->SubadminModel->getexecutiveProfile();	
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
			        $this->AuthenticationModel->checklogin_executive();
					$data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['curuserdata']               =   $this->SubadminModel->getexecutiveProfile();	
						$data['seo']	=	$seo;
				
						$data['get_student_transaction']	=	$this->BookingModel->getStudentTransaction();
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('admin/transaction/student_transaction',$data);   

		}
		
		
		
		public function boookroomdetail()
				{
					    
				        
					    $this->AuthenticationModel->checklogin_executive();
						
					    $seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
						$data['seo']	=	$seo;
                           						
						//$data['property_detail']	  =	$this->PropertyModel->GetProperty($property_id);
						$data['list_city']	      =	$this->CommonModel->list_city();
						$data['selected_room_detail']  =  $this->input->post();
						$curuserdata               =   $this->SubadminModel->getexecutiveProfile();
						
						$data['curuserdata'] = $curuserdata;
						
					
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('executive/order/booking_summary.php',$data);
					    	
				}
		
		
		
		

	}		
		
?>