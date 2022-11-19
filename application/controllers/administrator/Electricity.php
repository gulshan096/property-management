<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Electricity extends CI_Controller
    {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper("common_helper");
			$this->load->model(array('AuthenticationModel','CommonModel','MasterModel','LocationModel','RoletypeModel'));
			$this->load->model('RoomModel');
			$this->load->model('PropertyModel');
			$this->load->model('ElectricityModel');
			$this->load->model('SubadminModel');
				
		}
			
		public function manageElBill()
		{
			$this->AuthenticationModel->checklogin();	
			echo $this->ElectricityModel->manageElBill();
		}
		
		public function list_paid_only()
			{
				//print_r("paid only called");
				//echo "<script>console.log('paid' );</script>";
				$_GET['statussort'] = 'paid';
				$this->list(0);
			}
			
		public function list_unpaid_only()
			{
				    //echo "<script>console.log('unpaid' );</script>";
				$_GET['statussort'] = "unpaid";
				$this->list(0);
			}
			
			
		
		public function list($id)
		{		
				//$this->list_paid_only();
				$this->AuthenticationModel->checklogin();
				$data = array();
				$seo = array();
				$seo['title']		=	"Admin Dashboard - ".APP_NAME;
				$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']	=	$seo;
				
			    $data['curuserdata']               =   $this->SubadminModel->getUserProfile();
				$data['openform']		=	$id; 
				$data['electricity']	=	$this->ElectricityModel->GetElBill($id);
				if(!empty($data['electricity'])){
					$p_id = $data['electricity']['property_id'];
					$data['rooms']=$this->RoomModel->getRooms($p_id);
					
				}
				
				$data['property']		=	$this->PropertyModel->list_property();
				$data['list_electricity']=   $this->ElectricityModel->list_electricity();
				$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
				$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
				$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
				$this->load->view('admin/electricity_bill/list_electricity_bill',$data);
		}
		
		public function list_electricity_room(){
			
			echo $this->ElectricityModel->list_electricity_room();
		}
		public function tenant_room(){
			
			$data = $this->ElectricityModel->tenant_room();
			
			echo json_encode($data);
		}
		
		
		public function list_ele_prop_room(){
			return  $this->ElectricityModel->list_ele_prop_room();
		}
	}
?>