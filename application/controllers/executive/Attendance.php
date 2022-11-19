<?php

		defined('BASEPATH') OR exit('No direct script access allowed');

	class Attendance extends CI_Controller
		{

			function __construct()
				{
					    parent::__construct();
					    $this->load->helper("common_helper");
						$this->load->model('AuthenticationModel');
						$this->load->model('MaintenanceModel');
						$this->load->model('PropertyModel');
						$this->load->model('RoomModel');
						$this->load->model('SubadminModel'); 
						$this->load->model('VendorModel');
						
				}
				
			public function manage_attendance()
			{
			    
				$this->AuthenticationModel->checklogin();
				echo $this->MaintenanceModel->manage_facility();
			}
				
				
			public function attendance_manage($id){
			  
			        $this->AuthenticationModel->checklogin();
			
					    $data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	    =	$seo; 
						$data['openform']   =	$id; 
						
						//$data['list_maintenance']	=	$this->MaintenanceModel->list_maintenance();
						//$data['get_maintenance']		=	$this->MaintenanceModel->getMaintenance($id); 
						//$data['maintenance_checkitems'] = $this->MaintenanceModel->getMaintenanceChecklist($id);
						//$data['list_property']	=	$this->PropertyModel->list_property();
						//$data['list_room']	    =	$this->RoomModel->list_room();
					
						//$data['list_category']	           =	$this->VendorModel->list_category();
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('executive/attendance/create_view_attendance',$data);
		
		    }	
		}
		
?>