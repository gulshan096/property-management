<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Request extends CI_Controller
		{
			
			    function __construct()
				{
					    parent::__construct();
						$this->load->model('PropertyModel');
						$this->load->model('CommonModel');
						$this->load->model('user/UserLoginModel');
						$this->load->model('VendorModel');
						$this->load->model('user/RequestModel');
				}
				
				public function manage_complaints()
				{
					
					 $this->UserLoginModel->userchecklogin();
					 
					echo $this->RequestModel->manage_complaints();
				}
		    
			    public function complaints()
				{
					
					
					$this->UserLoginModel->userchecklogin();
					$seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
						$data['seo']	=	$seo;
                           						
						$data['list_category']	           =	$this->VendorModel->list_category();
						$data['curuser']          =   $this->UserLoginModel->getUserProfile();
					    $data['left_menu']             =  'user/include/left-menu';

						$this->load->view('user/include/header.php',$data);
						//$tenant_id = $this->session->userdata('tenant_id');
						//$data['list_penalty']	=	$this->PenaltyModel->list_penalty($tenant_id);
						$this->load->view('user/request/complaints.php',$data);
						$this->load->view('user/include/footer.php',$data);
						
				}
				public function complaints_list()
				{
					
					
					$this->UserLoginModel->userchecklogin();
					$seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
						$data['seo']	=	$seo;
                           						
						$data['complaints_list']	           =	$this->RequestModel->complaints_list();
						$data['curuser']          =   $this->UserLoginModel->getUserProfile();
					    $data['left_menu']             =  'user/include/left-menu';

						$this->load->view('user/include/header.php',$data);
						$this->load->view('user/request/complaints_list.php',$data);
						$this->load->view('user/include/footer.php',$data);
						
				}
				
				
				public function manage_leave()
				{
					
					 $this->UserLoginModel->userchecklogin();
					 
					echo $this->RequestModel->manage_leave();
				}
				
			    public function leave()
				{
					
					$this->UserLoginModel->userchecklogin();
					$seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
						$data['seo']	=	$seo;
                           						
						
						$data['curuser']          =   $this->UserLoginModel->getUserProfile();
					    $data['left_menu']             =  'user/include/left-menu';

						$this->load->view('user/include/header.php',$data);
						$this->load->view('user/request/leave.php',$data);
						$this->load->view('user/include/footer.php',$data);
						
				}
				
				public function leave_list()
				{
				    $this->UserLoginModel->userchecklogin();
					$seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
						$data['seo']	=	$seo;
                           						
						$data['leave_list']	           =	$this->RequestModel->leave_list();
						$data['curuser']          =   $this->UserLoginModel->getUserProfile();
					    $data['left_menu']             =  'user/include/left-menu';

						$this->load->view('user/include/header.php',$data);
						$this->load->view('user/request/leave_list.php',$data);
						$this->load->view('user/include/footer.php',$data);	
				}
								
		}
