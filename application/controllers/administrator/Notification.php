<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller  
    {
		
		public function __construct() 
			{
				parent::__construct();
					$this->load->helper("common_helper");
				    $this->load->model(array('AuthenticationModel','CommonModel','NotificationModel'));    
			}
			
			
			public function sendnotification($id)  
				{
						$this->AuthenticationModel->checklogin(); 
						$data = array();
						$seo  = array();
						$seo['title']			=	"Category - ".APP_NAME;
						$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;  
						$data['seo']			=	$seo; 
						$data['openform']		=	$id;  
						$data['addmsg']			=   $this->NotificationModel->addmsg();
						$data['msg']			=   $this->NotificationModel->getmsg($id);   
						$data['msg_list']		=   $this->CommonModel->list_notification();                 
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);   
						$data['sidebarleft'] 	=	$this->load->view("admin/include/sidebar-left",$data,true);   
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);     
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);           
						$this->load->view("admin/notification/sendnotification",$data);                 
				}
	}
?>