<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class offer extends CI_Controller
    {
		
		public function __construct()
			{
				parent::__construct();
					$this->load->helper("common_helper");
						$this->load->model(array('AuthenticationModel','CommonModel','MasterModel','LocationModel'));
							$this->load->model('OfferModel');
							$this->load->model('SubadminModel');
						
			}
			
		public function manageoffer()
			{
				$this->AuthenticationModel->checklogin();					
					echo $this->OfferModel->manageoffer();
			}
		
		public function offer_list($id){
			   // echo "<script>console.log('Debug Objects: ' );</script>";

			//exit;
		 	$this->AuthenticationModel->checklogin();
					
					$data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	=	$seo;
						$data['openform']		=	$id; 
						
						//$data['offer']			=	$this->OfferModel->GetOffer($id);
						$data['list_offer']	=	$this->OfferModel->list_offer();				
						$data['offer']		=	$this->OfferModel->GetOffer($id);
					
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
						//print_r($data['list_offer']);exit;

									$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
									$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
									$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
									$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					//$this->load->view("admin/emails/listemailtemplate",$data);
			$this->load->view('admin/offer/offer_list',$data);
			//$this->load->view('admin/offer/offer_list');
			
			
			/*
			$this->AuthenticationModel->checklogin();
						$data = array();
						$seo = array();
						$seo['title']			=	"States List - ".APP_NAME;
						$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']			=	$seo;
					    $data['openform']		=	$id; 
						$data['state']			=	$this->LocationModel->GetState($id);
						$data['AddState']		=   $this->LocationModel->AddState();
						$data['list_states']	=	$this->CommonModel->list_states(); 				
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
						$this->load->view("admin/location/list_state",$data);
		
			*/
		
		}
		
	

	}