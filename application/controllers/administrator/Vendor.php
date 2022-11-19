<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class vendor extends CI_Controller
    {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper("common_helper");
			$this->load->model(array('AuthenticationModel','CommonModel','MasterModel','LocationModel','RoletypeModel'));
			$this->load->model('VendorModel');
			$this->load->model('SubadminModel');
				
		}
			
		public function managevendor()
		{
			$this->AuthenticationModel->checklogin();	
			echo $this->VendorModel->managevendor();
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
				$data['vendor']			=	$this->VendorModel->GetVendor($id);
				$data['list_vendor']	    =	$this->VendorModel->list_vendor();
   				$data['list_category']	    =	$this->VendorModel->list_category();	
                
				$data['curuserdata']               =   $this->SubadminModel->getUserProfile(); 
				
				$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
				$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
				$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
				//$this->load->view("admin/emails/listemailtemplate",$data);
				$this->load->view('admin/vendor/list_vendor',$data);
		}
		
		public function managevendorcategory(){
			$this->AuthenticationModel->checklogin();	
			echo $this->VendorModel->managevendorcategory();
		}
		
		public function vendor_category($id)
		{
			
				$this->AuthenticationModel->checklogin();
				$data = array();
				$seo = array();
				$seo['title']		=	"Admin Dashboard - ".APP_NAME;
				$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']	=	$seo;
				$data['openform']		=	$id; 
				$data['category']			=	$this->VendorModel->GetVendorCategory($id);
				
				$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
				
				
				//$data['list_vendorcategory']	    =	$this->VendorModel->list_vendorcategory();
				$data['list_category']	    =	$this->VendorModel->list_category();				
				$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
				$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
				$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
				//$this->load->view("admin/emails/listemailtemplate",$data);
				$this->load->view('admin/vendor/vendor_category',$data);
		}
		
	}
?>