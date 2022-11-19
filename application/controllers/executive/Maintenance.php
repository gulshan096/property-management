<?php

		defined('BASEPATH') OR exit('No direct script access allowed');

	class Maintenance extends CI_Controller
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
						$this->load->model('user/RequestModel');
						
				}
				
			public function manage_complaints()
			{
			    
				$this->AuthenticationModel->checklogin_executive();	
               
				echo $this->MaintenanceModel->manage_complaints();
			}
			
			
			
			public function service_manage($complaint_id)
			{
			  
			            $this->AuthenticationModel->checklogin_executive();
						 
					    $data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	    =	$seo;
						// $data['openform']   =	$id; 
						
						$curuserdata               =   $this->SubadminModel->getexecutiveProfile();
						
						$data['curuserdata'] = $curuserdata;
					    $property_id = $curuserdata['property_id'];
						
						
						$data['list_maintenance']  =       $this->MaintenanceModel->list_maintenance();
						$data['complaint_detail']  =        $this->RequestModel->complaint_detail($complaint_id);
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('executive/maintenance/create_view_maintenance',$data);
		
		}
		
		public function allotwok($maintenance_id)
			{
				
			  
			            $this->AuthenticationModel->checklogin_executive();
						 
					    $data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	    =	$seo;
						// $data['openform']   =	$id; 
						
						$curuserdata               =   $this->SubadminModel->getexecutiveProfile();
						
						$data['curuserdata'] = $curuserdata;
					    $property_id = $curuserdata['property_id']; 
						
						$data['get_maintenance']         =       $this->MaintenanceModel->getMaintenance($maintenance_id);
						$data['list_maintenance']        =       $this->MaintenanceModel->list_maintenance();
						$data['maintenance_checkitems']  =       $this->MaintenanceModel->getMaintenanceChecklist($maintenance_id);
					
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('executive/maintenance/create_view_maintenance',$data);
		
		}
		
		
		public function complaints_list()
		{
			            $this->AuthenticationModel->checklogin_executive();
		                $data = array(); 
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	=	$seo;
						
						$curuserdata               =   $this->SubadminModel->getexecutiveProfile();
						
						$data['curuserdata'] = $curuserdata;
					    $property_id = $curuserdata['property_id'];
						
						$data['requeest_service']  =  $this->RequestModel->service_request($property_id);
						// $data['curuserdata']               =   $this->SubadminModel->getexecutiveProfile();
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
				
					    $this->load->view('executive/maintenance/user_complaint',$data);   
					  						   
			           	
		}
		
		
		public function rsolve_list()
		{
			
			
			            
			            $this->AuthenticationModel->checklogin_executive();
					    $data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	    =	$seo;
						// $data['openform']   =	$id; 
						
						$data['list_maintenance'] =       $this->MaintenanceModel->list_maintenance();
						$data['curuserdata']               =   $this->SubadminModel->getexecutiveProfile();
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('executive/maintenance/housekeeping_upload_work',$data);
			 
		}
		
		
		public function leave_list()
		{
			            $this->AuthenticationModel->checklogin_executive();
						
			            $data = array(); 
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	=	$seo;
						
						$curuserdata               =   $this->SubadminModel->getexecutiveProfile();
						
						$data['curuserdata'] = $curuserdata;
					    $property_id = $curuserdata['property_id'];
						
						$data['leave_list']     =  $this->MaintenanceModel->ex_leave_list($property_id);
						// $data['curuserdata']    =   $this->SubadminModel->getexecutiveProfile();
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
				
					    $this->load->view('executive/maintenance/user_leave',$data);   
		}
		
			
		}
		
?>