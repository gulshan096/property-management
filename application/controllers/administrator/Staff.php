<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class staff extends CI_Controller
    {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper("common_helper");
			$this->load->model(array('AuthenticationModel','CommonModel','MasterModel','LocationModel','RoletypeModel'));
			$this->load->model('StaffModel');
			$this->load->model('SubadminModel');
				
		}
			
		public function managestaff()
		{
			//print_r("getting managestaff1");

			$this->AuthenticationModel->checklogin();	
				//	print_r("getting managestaff2");
			echo $this->StaffModel->managestaff();
				//	print_r("getting managestaff3");
		}
			
		public function list($id)
		{
				$this->AuthenticationModel->checklogin();
				print_r("getting called");
				$data = array();
				$seo = array();
				$seo['title']		=	"Admin Dashboard - ".APP_NAME;
				$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']	=	$seo;
				$data['openform']		=	$id; 
				
				$data['staff']			=	$this->StaffModel->GetStaff($id);
                //$data['list_roletype']  =   $this->RoletypeModel->list_roleType();	
				$data['list_staff']	=	$this->StaffModel->list_staff();				
				$data['role_type']		=	$this->RoletypeModel->list_roleType();
				
				$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
				//print_r($data['list_offer']);exit;
				$data['country']=$this->StaffModel->all_country();

				$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
				$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
				$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
				//$this->load->view("admin/emails/listemailtemplate",$data);
				$this->load->view('admin/staff/staff',$data);
		}
	}
?>