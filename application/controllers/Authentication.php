<?php

		defined('BASEPATH') OR exit('No direct script access allowed');

	class Authentication extends CI_Controller
		{

			function __construct()
				{
					parent::__construct();
						$this->load->model('AuthenticationModel');
						$this->load->model('SubadminModel');
				}
				
			public function logout()
				{
					$this->session->sess_destroy();
					redirect("administrator?logout=yes&token=".md5(time()));
				}
				
				
			public function dologin()
				{
							
					$this->AuthenticationModel->dologin();
				}
				
			public function executive_dologin()
			{
                
				
				$this->AuthenticationModel->executive_dologin();
			}			
					
			public function login()
				{
					$data = array();
					$seo = array();
					$seo['title']		=	"Admin Login - ".APP_NAME;
					$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
					$data['seo']		=	$seo;
					$this->load->view("admin/authentication/login",$data);
				}
				
			public function executive_login()
			{
				$data = array();
					$seo = array();
					$seo['title']		=	"Executive Login - ".APP_NAME;
					$seo['description']	=	"Login here to access Executive Panel of ".APP_NAME;
					$data['seo']		=	$seo;
					$this->load->view("executive/authentication/login",$data);
			}
				
			public function dashboard() 
				{
					    $this->AuthenticationModel->checklogin();
					
						$data = array();
						$seo = array();
						$seo['title']		    =	"Admin Dashboard - ".APP_NAME;
						$seo['description']  	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']        	=	$seo;
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
						
						if($data['curuserdata']['role'] == "Admin")
						{
							$this->load->view("admin/dashboard",$data);
						}
						else
						{
							
						$this->load->view("hostowner/dashboard",$data);
						}
                        						
					
				}
				public function ex_dashboard() 
				{
					    $this->AuthenticationModel->checklogin_executive();
					
						$data = array();
						$seo = array();
						$seo['title']		    =	"Admin Dashboard - ".APP_NAME;
						$seo['description']  	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']        	=	$seo;
						$data['curuserdata']               =   $this->SubadminModel->getexecutiveProfile();
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
						
						$this->load->view("executive/dashboard",$data);
					
				}
				
			public function blank()
				{
						$this->AuthenticationModel->checklogin();
						$data = array();
						$seo = array();
						$seo['title']			=	"UC Admin - ".APP_NAME;
						$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']			=	$seo;
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
						$this->load->view("admin/blank",$data);
				}
			
		}	
?>