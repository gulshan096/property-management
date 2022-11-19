<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class room extends CI_Controller
    {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper("common_helper");
			$this->load->model(array('AuthenticationModel','CommonModel','MasterModel','LocationModel','RoletypeModel'));
			$this->load->model('RoomModel');
			$this->load->model('PropertyModel');
			$this->load->model('AmenityModel');
			$this->load->model('SubadminModel');
		}
			
		public function manageroom()
		{
			//print_r("I m getting called "); exit;
			$this->AuthenticationModel->checklogin();
            		
			echo $this->RoomModel->manageroom();
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
				$data['room']			=	$this->RoomModel->GetRoom($id);
				$data['beds']			=	$this->RoomModel->GetBeds($id);
				$data['property']		=	$this->PropertyModel->list_property_name();
				$data['curuserdata']    =   $this->SubadminModel->getUserProfile();
				
				
				$data['amenity_dt']		=   $this->AmenityModel->list_amenity();
				$data['list_room']	    =	$this->RoomModel->list_room();				
				$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
				$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
				$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
				//$this->load->view("admin/emails/listemailtemplate",$data);
				$this->load->view('admin/room/list_room',$data);
		}
		
		public function property_room(){
			//print_r("I m getting called");

			$this->RoomModel->property_room();
		}
		
		public function room_seater(){
			$this->RoomModel->room_seater();
		}
		
		//public function GetRooms($pid=0)
		
		
		
	}
?>