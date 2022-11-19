<?php

		defined('BASEPATH') OR exit('No direct script access allowed');

	class Penalty extends CI_Controller
		{

			function __construct()
				{
					    parent::__construct();
					    $this->load->helper("common_helper");
						$this->load->model('AuthenticationModel');
						$this->load->model('PropertyModel');
						//$this->load->model('RoomModel');
						$this->load->model('UserModel');
						$this->load->model('BookingModel');
						$this->load->model('PenaltyModel');
						$this->load->model('SubadminModel');
						
					
				}
				
		    public function manage_panalty()
			{
			   
				$this->AuthenticationModel->checklogin();
				echo $this->PenaltyModel->create_penalty();
			}
			
			public function getUser()
			{
			     $property_id  =  $this->input->post('propertyid');
                 $userid       =  $this->PenaltyModel->getUser($property_id);
                 
				 echo $this->PenaltyModel->getUserDetails($userid); 			  
			}
   
            public function getBookingDetails()
			{
				  $user_id  =         $this->input->post('user_id');
				  $room_id  =         $this->PenaltyModel->getBookingDetails($user_id); 
				  
				  $booking_id = $this->PenaltyModel->Booking_id($room_id);
				 
				  $data = $this->PenaltyModel->roomDetails($room_id, $booking_id, $user_id);
				  
				  echo json_encode($data);
				   			
            }
            
              				
			public function  CreatePenalty($id)
			{
			$this->AuthenticationModel->checklogin();
					$data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	=	$seo;
						$data['openform']		=	$id; 
						
						
						$data['list_penalty']	=	$this->PenaltyModel->list_penalty();
						$data['get_penalty']	=	$this->PenaltyModel->get_penalty($id);
						$data['get_property']   =   $this->BookingModel->list_property(); 
						$data['get_users']       =   $this->BookingModel->list_users();
                       
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();						
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('admin/penalty/penalty_create',$data);
		
		}
		
		public function billPaidUnpaid($check)
		{
		
		$this->AuthenticationModel->checklogin();
					$data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	=	$seo;
						
						
						
						
						//$data['get_penalty']	=	$this->PenaltyModel->get_penalty($id);
						$data['get_property']   =   $this->BookingModel->list_property(); 
						$data['get_users']       =   $this->BookingModel->list_users();  
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
						
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
						
						if($check == "paid")
						{
							 $status = 2 ;
							 $data['list_penalty']	=	$this->PenaltyModel->paid_unpaid_penalty($status);
							 $this->load->view('admin/penalty/paid',$data);
						}
						else
						{
							 $status = 1 ;
							 $data['list_penalty']	=	$this->PenaltyModel->paid_unpaid_penalty($status);
							 $this->load->view('admin/penalty/unpaid',$data);
						} 	
					
						
					    
				
		}
		
		
		

	}		
		
?>