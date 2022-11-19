<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class roletype extends CI_Controller
    {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper("common_helper");
			$this->load->model(array('AuthenticationModel','CommonModel','MasterModel','LocationModel'));
			$this->load->model('RoletypeModel');
		}
			
		public function manageroletype()
		{
			$this->AuthenticationModel->checklogin();					
			echo $this->RoletypeModel->manageroletype();
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
				
				//$data['offer']			=	$this->OfferModel->GetOffer($id);
				$data['list_roletype']  =   $this->RoletypeModel->list_roleType();	
				//$data['list_role']	=	$this->RoleModel->list_role();				
				$data['role_type']		=	$this->RoletypeModel->GetRoletype($id);
				//print_r($data['list_offer']);exit;

				$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
				$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
				$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
				//$this->load->view("admin/emails/listemailtemplate",$data);
				$this->load->view('admin/role/list_roletype',$data);
		}
	}
?>