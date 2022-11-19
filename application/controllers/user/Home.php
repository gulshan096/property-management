<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Home extends CI_Controller
		{
			
			function __construct()
				{
					    parent::__construct();
		
						$this->load->model('PropertyModel');
						$this->load->model('CommonModel');
						$this->load->model('user/UserLoginModel');
				}
		    
			public function home()
				{
					
					//$this->UserLoginModel->userchecklogin();
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
						 
						
						$this->load->view('user/include/header.php',$data);
						$this->load->view('user/home.php',$data);
						$this->load->view('user/include/footer.php',$data);
						
				}
				
		}
