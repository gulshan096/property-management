<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class subadmin extends CI_Controller
    {
		
		public function __construct()
			{
				parent::__construct();
					$this->load->helper("common_helper");
						$this->load->model(array('AuthenticationModel','CommonModel','MasterModel','LocationModel'));
							$this->load->model('SubadminModel');
							$this->load->model('RoleModel');
							$this->load->model('RoomModel');
                            $this->load->model('PropertyModel');
							$this->load->library('email');
							
			}
			
		public function manageexecutive()
		{
		            $this->AuthenticationModel->checklogin();					
					echo $this->SubadminModel->manageexecutive();	
		}		
        		
		public function managesubadmin()
			{
				$this->AuthenticationModel->checklogin();					
				echo $this->SubadminModel->managesubadmin();
				
			
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
						
						$data['subadmin']			=	$this->SubadminModel->GetAdmin($id);
						$data['list_subadmin']	=	$this->SubadminModel->list_subadmin();	
						$data['role_type']  =	$this->RoleModel->list_roleType();
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
						

									$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
									$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
									$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
									$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			        $this->load->view('admin/subadmin/list_subadmin',$data);
			}
			
		public function executive_list($id)
		{
			
		
			     $this->AuthenticationModel->checklogin();
				 $data = array();
						$seo = array();
						$seo['title']		    =	"Admin Dashboard - ".APP_NAME;
						$seo['description']	    =	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	        =	$seo;
						$data['openform']		=	$id; 
						
						$data['get_executive']	    =	$this->SubadminModel->GetExecutive($id);
						$data['list_executive']	=	$this->SubadminModel->list_executive();
                     					
						$data['role_type']      =	$this->RoleModel->list_roleType();
						$data['property']		=	$this->PropertyModel->list_property_name();
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
						//$data['subadmin']		=	$this->RoleModel->GetRole($id);
						//print_r($data['list_offer']);exit;

							$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
							$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
							$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
							$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					//$this->load->view("admin/emails/listemailtemplate",$data);
			        $this->load->view('admin/executive/list_executive',$data);
		}
	}
?>