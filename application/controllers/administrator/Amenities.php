<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class amenities extends CI_Controller
    {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper("common_helper");
			$this->load->model(array('AuthenticationModel','CommonModel','MasterModel','LocationModel','RoletypeModel'));
			$this->load->model('AmenityModel');
			$this->load->model('SubadminModel');
						
		}
			
		public function manageamenity()
		{
			$this->AuthenticationModel->checklogin();	
			echo $this->AmenityModel->manageamenity();
		}
			
		public function list($id)
		{
				//print_r("amenity ii m getting called");
				//exit;
				$this->AuthenticationModel->checklogin();
				$data = array();
				$seo = array();
				$seo['title']		=	"Admin Dashboard - ".APP_NAME;
				$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']	=	$seo;
				$data['openform']		=	$id; 
				$data['amenity']			=	$this->AmenityModel->GetAmenity($id);
				$data['list_amenity']	    =	$this->AmenityModel->list_amenity();
                $data['curuserdata']               =   $this->SubadminModel->getUserProfile();

				
				$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
				$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
				$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
				//$this->load->view("admin/emails/listemailtemplate",$data);
				$this->load->view('admin/amenity/amenities',$data);
		}
		
		
		
	}
?>