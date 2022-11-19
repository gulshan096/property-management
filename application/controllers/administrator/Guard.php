<?php

		defined('BASEPATH') OR exit('No direct script access allowed');

	class Guard extends CI_Controller
		{

			function __construct()
				{
					    parent::__construct();
					    $this->load->helper("common_helper");
						$this->load->model('AuthenticationModel');
                         $this->load->model('GuardModel');						
                         $this->load->model('SubadminModel');
											
				}
				
				
			public function  guard_list(){
				
			$this->AuthenticationModel->checklogin();
					$data = array();
						$seo = array();
						$seo['title']		=	"Guard List - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	    =	$seo;
					
						
						$data['list_guard']	=	$this->GuardModel->list_guard();
						$data['curuserdata']    =   $this->SubadminModel->getUserProfile(); 
			
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('admin/guard/view_guard',$data);
		
		}
			
		}
		
?>