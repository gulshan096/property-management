<?php

		defined('BASEPATH') OR exit('No direct script access allowed');

	class menu extends CI_Controller
		{

			function __construct()
				{
					parent::__construct();
						$this->load->model('AuthenticationModel');
						
				
					$this->load->helper("common_helper");
						//$this->load->model(array('AuthenticationModel','CommonModel','MasterModel','LocationModel'));
						$this->load->model('MenuModel');
						$this->load->model('PropertyModel');
						$this->load->model('SubadminModel');
				}
				
			public function managemenu()
			{
				$this->AuthenticationModel->checklogin();
			
					echo $this->MenuModel->managemenu();
					
					
			}
			
			public function managemenucard()
			{
				$this->AuthenticationModel->checklogin();					
					echo $this->MenuModel->managemenucard();
					
					
			}
				
				
			public function list($id){
						$this->AuthenticationModel->checklogin();
					
						$data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	=	$seo;
						if(!empty($id))
						$data['openform']		=	$id; 
				
						$data['list_menuitem']	=	$this->MenuModel->list_menuitem();
						$data['menu']	=	$this->MenuModel->GetMeal($id);
						$data['property']		=	$this->PropertyModel->list_property_name();						
						$data['curuserdata']  =   $this->SubadminModel->getUserProfile();
			
									
									$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
									$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
									$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
									$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
						$this->load->view('admin/menu/menu',$data);
				}
			
			public function list_menucard($id)
				{
						$this->AuthenticationModel->checklogin();
						$data = array();
						$seo = array();
						$seo['title']			=	"States List - ".APP_NAME;
						$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']			=	$seo;
					    $data['openform']		=	$id; 
						$data['menucard']			=	$this->MenuModel->GetMenuCard($id);
						$data['property']		=	$this->PropertyModel->list_property_name();	
						//$data['AddCity']		=   $this->LocationModel->AddCity();
						$data['list_card']	=	$this->MenuModel->list_menu_card(); 				
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
						$this->load->view("admin/menu/menucard",$data);
				}
		
		
	
		}
		
?>