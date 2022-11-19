<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MyGuest extends CI_Controller
		{
			
			function __construct()
				{
					    parent::__construct();
						
						$this->load->model('user/UserLoginModel');
						$this->load->model('user/EntryModel');
				}
		    
			public function myguest($key)
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
						if($key == 'guest')
						{
							$this->load->view('user/entry/myguest.php',$data);
						}
						else
						{
							$data['guest_list']          =   $this->EntryModel->getGuestList();
							$this->load->view('user/entry/view_guest.php',$data);
						}
						
						$this->load->view('user/include/footer.php',$data);
						
				}
				
				public function manage_entry()
				{
					$this->UserLoginModel->userchecklogin();
					
					 echo  $this->EntryModel->manage_entry();
					
				}
				
				
				
				
				
		}
