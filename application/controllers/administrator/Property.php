<?php

		defined('BASEPATH') OR exit('No direct script access allowed');

	class Property extends CI_Controller
		{

			function __construct()
				{
					    parent::__construct();
					    $this->load->helper("common_helper");
						$this->load->model('AuthenticationModel');
						$this->load->model('PropertyModel');
						$this->load->model('SubadminModel');
						$this->load->model('CommonModel');
				}
				
			public function manageproperty()
			{
			    
				$this->AuthenticationModel->checklogin();
			    
				echo $this->PropertyModel->manageproperty();
			}
				
				
			public function property_list($id){
			    
			   // echo "<script>console.log('Debug Objects: ' );</script>";

			//exit;
			$this->AuthenticationModel->checklogin();
					
					$data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	=	$seo;
						$data['openform']		=	$id; 
						
						$data['list_city']	      =	$this->CommonModel->list_city();
						$data['list_property']	=	$this->PropertyModel->list_property();
						$data['property']		=	$this->PropertyModel->GetProperty($id); 
						$data['curuserdata']    =   $this->SubadminModel->getUserProfile();
						
						//$data['property_description'] = $this->PropertyModel->GetPropertyDes($id);
						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					
			            $this->load->view('admin/property/view_property',$data);
		
		
		
		}
			
		}
		
?>