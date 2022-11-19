<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Email extends CI_Controller
		{	
		
			public function __construct()
				{
					parent::__construct();
					// 	$this->load->helper("common_helper");
							$this->load->model('AuthenticationModel');
							// $this->load->library('form_validation');
							$this->load->model('SubadminModel');
						
				}
	
			public function listemailtemplate()
				{
					$this->AuthenticationModel->checklogin();
					
					$data = array();
						$seo = array();
							$seo['title']		=	"Admin Dashboard - ".APP_NAME;
							$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
								$data['seo']	=	$seo;
						        $data['curuserdata']               =   $this->SubadminModel->getUserProfile();
								
									$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
									$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
									$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
									$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					$this->load->view("admin/emails/listemailtemplate",$data);
				} 
		}

?>