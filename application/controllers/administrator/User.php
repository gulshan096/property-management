<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class user extends CI_Controller
    {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper("common_helper");
			$this->load->model(array('AuthenticationModel','CommonModel','MasterModel','LocationModel','RoletypeModel'));
			$this->load->model('UserModel');
			$this->load->model('SubadminModel');
			$this->load->model('AuthenticationModel');
			
		}
			
		public function manageuser()
		{
			
			$this->AuthenticationModel->checklogin();	
			echo $this->UserModel->manageuser();
		}
		
		
			
		public function list_active_only()
			{
				$_GET['statussort'] = 'active';
				$this->list(0);
			}
			
		public function list_inactive_only()
			{
				$_GET['statussort'] = "inactive";
				$this->list(0);
			}
			
		public function list($id)
		{
			
				$this->AuthenticationModel->checklogin();
			     
				$data = array();
				$seo = array();
				$seo['title']		=	"Admin Dashboard - ".APP_NAME;
				$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']	=	$seo;
				$data['openform']		=	$id; 
				$data['users']			=	$this->UserModel->GetUser($id);
				$data['list_user']	    =	$this->UserModel->list_user();	
                $data['curuserdata']               =   $this->SubadminModel->getUserProfile();		

				
				$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
				$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
				$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
				//$this->load->view("admin/emails/listemailtemplate",$data);
				$this->load->view('admin/user/list_user',$data);
		}
		
		public function f_exe_list($id)
		{
			
				$this->AuthenticationModel->checklogin_executive();
				$data = array();
				$seo = array();
				$seo['title']		=	"Admin Dashboard - ".APP_NAME;
				$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']	=	$seo;
				$data['openform']		=	$id; 
				$data['users']			=	$this->UserModel->GetUser($id);
				$data['list_user']	    =	$this->UserModel->list_user();	
                $data['curuserdata']               =   $this->SubadminModel->getexecutiveProfile();		

				
				$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
				$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
				$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
				//$this->load->view("admin/emails/listemailtemplate",$data);
				$this->load->view('admin/user/list_user',$data);
		}
		
		
		
	}
?>