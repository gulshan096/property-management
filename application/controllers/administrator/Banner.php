<?php

		defined('BASEPATH') OR exit('No direct script access allowed');

	class Banner extends CI_Controller
		{

			function __construct()
				{
					parent::__construct();
						$this->load->model('AuthenticationModel');
						
				
					$this->load->helper("common_helper");
						//$this->load->model(array('AuthenticationModel','CommonModel','MasterModel','LocationModel'));
						$this->load->model('BannerModel');
						$this->load->model('SubadminModel');
					    

				}
				
			public function managebanner()
			{
				$this->AuthenticationModel->checklogin();					
					echo $this->BannerModel->managebanner();
					
					
			}
				
				
			public function list($id){
			   // echo "<script>console.log('Debug Objects: ' );</script>";

			//exit;
						$this->AuthenticationModel->checklogin();
					
						$data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	=	$seo;
						if(!empty($id))
						$data['openform']		=	$id; 
					
						$data['list_banner']	=	$this->BannerModel->list_banner();	
						
						$data['banner']		=	$this->BannerModel->GetBanner($id);
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();

						
									$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
									$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
									$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
									$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					   
						$this->load->view('admin/banner/list_banner',$data);
			            
			

		
			}
			
			
			
			public function email()
			{
				$this->load->library('email');
				
				    $config['protocol']    = 'smtp';
					$config['smtp_host']    = 'ssl://smtp.gmail.com';
					$config['smtp_port']    = '465';
					$config['smtp_timeout'] = '60';

					$config['smtp_user']    = 'gulshanpatel587@gmail.com';   
					$config['smtp_pass']    = 'networking###1996';  

					$config['charset']    = 'utf-8';
					$config['newline']    = "\r\n";
					$config['mailtype'] = 'html';
					$config['validation'] = TRUE; 

					$this->email->initialize($config);
					$this->email->set_mailtype("html");
					

				
				
				$this->email->from("gullup55@gmail.com");
				$this->email->to("gulshanpatel587@gmail.com");
				$this->email->subject('Send Email Codeigniter');
				$this->email->message('The email send using codeigniter library');
				
				//Send mail
				if($this->email->send())
				{
					echo "Congragulation Email Send Successfully.";
				}	
				else
				{	
				    echo "You have encountered an error";
					print_r($this->email->print_debugger());
				}  
			}
			
			
		
	
		}
		
?>