<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class SearchProperty extends CI_Controller
		{
			
			function __construct()
				{
					    parent::__construct();
		
						$this->load->model('PropertyModel');
						$this->load->model('CommonModel');
						$this->load->model('user/UserLoginModel');
						$this->load->model('AuthenticationModel');
						
					
				}
		    
            public function search()
			{
				$city_id  =    $this->input->post('city_id');
				echo $this->CommonModel->getArea($city_id);
			}			
			
			public function search_property()
				{
					// $this->UserLoginModel->userchecklogin();
					$seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
						$data['seo']	=	$seo;
                           						
						$data['property_list']	  =	$this->PropertyModel->list_property();
						$data['list_city']	      =	$this->CommonModel->list_city();
						$get_sp_key               = $this->input->get();
						$data['get_sp']           =  $this->PropertyModel->get_sp($get_sp_key);
						
						$data['curuser']          =   $this->UserLoginModel->getUserProfile();
						$data['left_room']        =   $this->PropertyModel->left_room();
						
						$this->load->view('user/include/header.php',$data);
						$this->load->view('user/booking/search_property.php',$data);
						$this->load->view('user/include/footer.php',$data);
						
				}
				public function property_room_details($property_id)
				{
					$this->UserLoginModel->userchecklogin();
					$seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
						$data['seo']	=	$seo;
                           						
						$data['property_detail']	  =	$this->PropertyModel->GetProperty($property_id);
						$data['list_city']	          =	$this->CommonModel->list_city();
						$data['curuser']              =   $this->UserLoginModel->getUserProfile();
						//$get_sp_key               = $this->input->get();
						//$data['get_sp']           =  $this->PropertyModel->get_sp($get_sp_key );
						
						$this->load->view('user/include/header.php',$data);
						$this->load->view('user/booking/property_detail.php',$data);
						$this->load->view('user/include/footer.php',$data);
						
				}
				
				public function getRoomdetail()
				{
					
					$property_id  =    $this->input->post('property_id');
					$seater_type  =    $this->input->post('seater');
					
				    echo $this->CommonModel->getRoomDetail($property_id, $seater_type);
					
				}
				public function getBeds()
				{
					$property_id  =    $this->input->post('property_id');
					$room_id      =    $this->input->post('room_id');
					$seater       =    $this->input->post('seater');
					 
				    $data =  $this->CommonModel->getBeds($property_id, $room_id, $seater);
					echo json_encode($data);
				}
				
				public function getRoomPrice()
				{
					$property_id  =    $this->input->post('property_id');
					$bed_id      =    $this->input->post('bed_id');
					$room_id      =    $this->input->post('room_id');
				
					 
				    $data =  $this->CommonModel->getRoomPrice($property_id, $room_id, $bed_id);
					echo json_encode($data);
				}
				
				public function yourDetail()
				{
					$this->UserLoginModel->userchecklogin();
					$seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
						$data['seo']	=	$seo;
                           						
						//$data['property_detail']	  =	$this->PropertyModel->GetProperty($property_id);
						$data['list_city']	      =	$this->CommonModel->list_city();
						$data['selected_room_detail']  =  $this->input->post();
						$data['curuser']          =   $this->UserLoginModel->getUserProfile();
						
						$this->load->view('user/include/header.php',$data);
						$this->load->view('user/booking/booking_summary.php',$data);
						$this->load->view('user/include/footer.php',$data);
					    	
				}
				
				
				
				
		}
