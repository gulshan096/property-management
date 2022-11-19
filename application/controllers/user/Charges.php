<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Charges extends CI_Controller
		{
			
			function __construct()
				{
					    parent::__construct();
						$this->load->model('PropertyModel');
						$this->load->model('CommonModel');
						$this->load->model('user/UserLoginModel');
						$this->load->model('user/EntryModel');
						$this->load->model('ElectricityModel');
						$this->load->model('PenaltyModel');
				}
		    
			public function charges($key)
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
						if($key == 'electricity')
						{
							$tenant_id = $this->session->userdata('tenant_id');
							$data['list_electricity']=   $this->ElectricityModel->list_electricity($tenant_id);
							$this->load->view('user/charges/electricity.php',$data);
						}
						else
						{
							$tenant_id = $this->session->userdata('tenant_id');
							$data['list_penalty']	=	$this->PenaltyModel->list_penalty($tenant_id);
							$this->load->view('user/charges/penalty.php',$data);
						}
						
						$this->load->view('user/include/footer.php',$data);
						
				}
								
		}
