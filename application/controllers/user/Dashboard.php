<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller
		{
			
			function __construct()
				{
					    parent::__construct();
						$this->load->model('PropertyModel');
						$this->load->model('CommonModel');
						$this->load->model('user/UserLoginModel');
				}
		    
			public function dashboard()
				{
					
					$this->UserLoginModel->userchecklogin();
					$seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
						$data['seo']	=	$seo;
                           						
						$data['property_list']	  =	$this->PropertyModel->list_property();
						$data['list_city']	      =	$this->CommonModel->list_city();
						$data['curuser']          =   $this->UserLoginModel->getUserProfile();
					    $data['left_menu']        =  'user/include/left-menu';

						$this->load->view('user/include/header.php',$data);
						$this->load->view('user/profile/myprofile.php',$data);
						$this->load->view('user/include/footer.php',$data);
						
				}
				
			public function document(){
				
					$this->UserLoginModel->userchecklogin();
					$seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
						$data['seo']	=	$seo;
                           						
						//$data['property_list']	  =	$this->PropertyModel->list_property();
						//$data['list_city']	      =	$this->CommonModel->list_city();
						$data['curuser']          =   $this->UserLoginModel->getUserProfile();
					    $data['left_menu']        =  'user/include/left-menu';
						
						$data['user_doc']  = $this->UserLoginModel->getUserDoc($data['curuser']['tenant_id']);

						$this->load->view('user/include/header.php',$data);
						$this->load->view('user/profile/id_document.php',$data);
						$this->load->view('user/include/footer.php',$data);
				
			}
				
				public function mytransaction()
				{
					
					$this->UserLoginModel->userchecklogin();
					$seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
						$data['seo']	=	$seo;
                           						
						$data['property_list']	  =	$this->PropertyModel->list_property();
						$data['list_city']	      =	$this->CommonModel->list_city();
						//$get_sp_key               = $this->input->get();
					
						$data['transaction']	  =	$this->CommonModel->mytransaction();
						$data['curuser']          =  $this->UserLoginModel->getUserProfile();
						
					    $data['left_menu']             =  'user/include/left-menu';

						$this->load->view('user/include/header.php',$data);
						$this->load->view('user/transaction/mytransaction.php',$data);
						$this->load->view('user/include/footer.php',$data);
						
				}
				
				public function mybooking()
				{
					
					$this->UserLoginModel->userchecklogin();
					$seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
						$data['seo']	=	$seo;
                           						
						$data['property_list']	  =	$this->PropertyModel->list_property();
						$data['list_city']	      =	$this->CommonModel->list_city();
						$data['mybooking']	      =	$this->CommonModel->mybooking();
						$data['curuser']          =   $this->UserLoginModel->getUserProfile();
						
					    $data['left_menu']        =  'user/include/left-menu';
               
						$this->load->view('user/include/header.php',$data);
						$this->load->view('user/booking/mybooking.php',$data);
						$this->load->view('user/include/footer.php',$data);
						
				}
				
				public function myBookingInvoice($booking_id)
				{
					
					$this->UserLoginModel->userchecklogin();
					$seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
						$data['seo']	=	$seo;
                           						
						//$data['property_list']	=	$this->PropertyModel->list_property();
						$data['property_list']	  =	$this->PropertyModel->list_property();
						$data['list_city']	      =	$this->CommonModel->list_city();
						$data['my_booking_invoice']	      =	  $this->CommonModel->myBookingInvoice($booking_id);
						$data['curuser']          =   $this->UserLoginModel->getUserProfile();
					
                        
						$this->load->view('user/include/header.php',$data);
						$this->load->view('user/booking/booking_invoice.php',$data);
						$this->load->view('user/include/footer.php',$data);
						
				}
				
		}
