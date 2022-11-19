<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MyGuest extends CI_Controller
		{
			
			function __construct()
				{
					    parent::__construct();
						
						$this->load->model('user/UserLoginModel');
						$this->load->model('user/EntryModel');
						$this->load->model('AuthenticationModel');
						$this->load->model('SubadminModel');
						$this->load->model('BookingModel');
				}
		    
			public function myguest($id)
				{
					
					
					$this->AuthenticationModel->checklogin_executive(); 
					
					
						 
					    $data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	    =	$seo;
						$data['openform']   =	$id; 
						
						$curuserdata               =   $this->SubadminModel->getexecutiveProfile();
						
						$data['curuserdata'] = $curuserdata;
					    $property_id = $curuserdata['property_id'];
						$data['get_property']   =   $this->BookingModel->ex_pro_list($property_id);
						$data['guest_list']               =   $this->EntryModel->exGuestList($property_id);
						
						// $data['curuserdata'] = $curuserdata;
					    // $property_id = $curuserdata['property_id'];
				
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('executive/entry/myguest',$data);
						
				}
				
				public function ex_manage_entry()
				{
					
					$this->AuthenticationModel->checklogin_executive();
					
					 echo  $this->EntryModel->ex_manage_entry();
					
				}
				
				
				
				
				
		}
