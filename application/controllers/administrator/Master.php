<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller
    {
		
		public function __construct()
			{
				parent::__construct();
					$this->load->helper("common_helper");
					$this->load->model('SubadminModel');
					$this->load->model(array('AuthenticationModel','CommonModel','MasterModel','LocationModel'));
			}
					
    	public function updatestatus()
			{
				$this->AuthenticationModel->checklogin();
					$table		=	$this->input->post("t"); 
					$index		=	$this->input->post("i");
					$status		=	$this->input->post("s");
					$value		=	$this->input->post("v");
					$array		=	array(); 
					$array['status']	=	$status;
					$this->db->where($index,$value); 
					$this->db->update($table,$array);
					echo "1";				
			}
		public function ex_updatestatus()
		{
			 $this->AuthenticationModel->checklogin_executive();
			$table		=	$this->input->post("t"); 
					$index		=	$this->input->post("i");
					$status		=	$this->input->post("s");
					$value		=	$this->input->post("v");
					$array		=	array(); 
					$array['status']	=	$status;
					$this->db->where($index,$value); 
					$this->db->update($table,$array);
					echo "1";	
		}
			
		public function managearea()
			{
				$this->AuthenticationModel->checklogin();					
					echo $this->LocationModel->managearea();
			}
		
			
    	public function list_area($id)
			{
				$this->AuthenticationModel->checklogin();   
					
				$data = array();
				$seo = array();
				$seo['title']			=	"Cities List - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME; 
				$data['seo']			=	$seo;
				$data['openform']		=	$id; 
				$data['area']			=	$this->LocationModel->GetArea($id);
				$data['list_area']	=	$this->CommonModel->list_area();
				$data['list_city']	=	$this->CommonModel->list_city();	
				$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
				$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);   
				$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);   
				$data['footer']			=	$this->load->view("admin/include/footer",$data,true);    
				$this->load->view("admin/location/list_area",$data);
			}

		public function managecity()
			{
			   
			    
				
				$this->AuthenticationModel->checklogin();					
				echo $this->LocationModel->managecity();
			}
			
		public function list_city($id)
				{
						$this->AuthenticationModel->checklogin();
						$data = array();
						$seo = array();
						$seo['title']			=	"States List - ".APP_NAME;
						$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']			=	$seo;
					    $data['openform']		=	$id; 
						$data['city']			=	$this->LocationModel->GetCity($id);
						//$data['AddCity']		=   $this->LocationModel->AddCity();
						$data['list_city']	=	$this->CommonModel->list_city(); 
                        $data['curuserdata']    =   $this->SubadminModel->getUserProfile();						
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
						$this->load->view("admin/location/list_city",$data);
				}
			
		public function vehicel_make($id)
				{
						$this->AuthenticationModel->checklogin();
						$data = array();
						$seo  = array();
						$seo['title']			=	"Make - ".APP_NAME;
						$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']			=	$seo;
						$data['openform']		=	$id; 
						$data['make']			=	$this->MasterVehicelModel->Getmake($id);
						$data['Addmake']		=   $this->MasterVehicelModel->Addmake();
						$data['list_make']		=	$this->CommonModel->list_make($id);
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft'] 	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
						$this->load->view("admin/mastervehicle/make",$data);
				}	
		public function vehicel_model($id)
				{
						$this->AuthenticationModel->checklogin();
						$data = array();
						$seo  = array();
						$seo['title']			=	"Model - ".APP_NAME;
						$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']			=	$seo;
						$data['openform']		=	$id; 
						$data['model']			=	$this->MasterVehicelModel->Getmodel($id);
						$data['Addmodel']		=   $this->MasterVehicelModel->Addmodel();
						$data['list_model']		=	$this->CommonModel->list_model($id);
						$data['list_make']		=	$this->CommonModel->list_make($id);
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
						$this->load->view("admin/mastervehicle/model",$data);
				}	
		public function vehicel_varient($id)
				{
						$this->AuthenticationModel->checklogin();
						$data = array();
						$seo  = array();
						$seo['title']			=	"Varient - ".APP_NAME;
						$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']			=	$seo;
					    $data['openform']		=	$id;
						$data['varient']		=	$this->MasterVehicelModel->Getvarient($id);
						$data['Addvarient']		=   $this->MasterVehicelModel->Addvarient();
						$data['list_varient']	=	$this->CommonModel->list_varient($id);
						$data['list_model']		=	$this->CommonModel->list_model($id);
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
						$this->load->view("admin/mastervehicle/varient",$data); 
				}	
				
    	public function status()
			{
				$this->MasterModel->status();
			}
			
    	public function master($table,$isparent)
				{
					// category board class subject chapter				
					// check login and redirect
						$this->AuthenticationModel->checklogin('admin');		
					// check login and redirect
					$data	=	array();
					$seo	=	array();
						switch($table)
							{
								case "category":
									$seo['title']		=	"Manage Category";
								break;
								
								default:
									redirect("/");
								break;
							}
					$data['addmaster']		=	$this->MasterModel->addmaster($table);  
					$parent					=	$this->input->get("parent"); 
					if(empty($parent)) { $parent = 0; }
					$data['alldata']		=	$this->MasterModel->getmaster($table,0,$parent,"*");
					$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
					$data['parentdata']		=	$this->MasterModel->getmaster($table,0,0,"id,title,status");
					$seo['canonical']		=	site_url("administrator/managecategories");
					$seo['favicon']   	    =	"";
					$seo['description']		=	"";
					$data['isparent']       =	$isparent;
					if(!empty($parent)) { $data['isparent']    =	0; }      
					$data['masterurl']      =	site_url("administrator/managecategories"); 
					$data['table']   		=	$table;
					$data['seo']   			=	$seo;
					$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
					$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
					$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
					$data['footer']			=	$this->load->view("admin/include/footer",$data,true); 
					
                $this->load->view('admin/master/masterdata', $data);
				
				
			}
			public function users_company($cid)
				{
					$this->AuthenticationModel->checklogin();
					$data = array();
						$seo = array();
						$seo['title']			=	"Company For Corporate Users - ".APP_NAME;
						$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
						$data['curuserdata']               =   $this->SubadminModel->getUserProfile();
						$data['seo']			=	$seo; 
						$data['openform']		=	$cid; 
						$data['company']		=	$this->UsersModel->GetUsersCompany($cid);
						$data['AddUsersCompany']=	$this->UsersModel->AddUsersCompany();
						$data['GetUsersCompany']=	$this->UsersModel->GetUsersCompany();
						$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
						$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
						$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
						$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					$this->load->view("admin/users/users_company",$data);
				}
				
				
			
	}

?>