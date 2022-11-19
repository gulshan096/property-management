<?php 
    
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	require APPPATH . 'libraries/RestController.php';
	require APPPATH . 'libraries/Format.php';
	use chriskacerguis\RestServer\RestController;
	
	class ApiMyGuestController extends RestController
	{
		function __construct()
				{
					parent::__construct();
					$this->load->model('user/UserLoginModel');
					$this->load->model('user/EntryModel');
					$this->load->model('AuthenticationModel');
					$this->load->model('SubadminModel');
					$this->load->model('BookingModel');  
				   		
				}
				
				
		public function myguest_get($id)
				{
					    $checklogin =  $this->AuthenticationModel->check_mob_exe();
					   
					    if(!empty($checklogin['ex_id']))
						{
						    $data = array();
							$seo = array();
							$seo['title']		=	"Admin Dashboard - ".APP_NAME;
							$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
							$data['seo']	    =	$seo;
							$data['openform']   =	$id; 
							
							$curuserdata               =   $this->SubadminModel->getexecutiveProfile();
							
							$data['curuserdata'] = $curuserdata;
							$property_id = $curuserdata['property_id'];
							$data['get_property']   =   $this->BookingModel->ex_pro_list($property_id);
							$data['guest_list']               =   $this->EntryModel->exGuestList($property_id);
							
							$this->response([
							'status' => TRUE,
							'message' => 'Success! all guest record.',
							'data' => $data
							
							],
							RestController::HTTP_OK
							);
						}
						else
						{
						    $this->response("Error! login are required.", RestController::HTTP_BAD_REQUEST);	
						}	
						
				}
				
				
				public function ex_manage_entry_post()
				{
					
				$checklogin =  $this->AuthenticationModel->check_mob_exe();
					   
				if(!empty($checklogin['ex_id']))
				{
					
					$check  = $this->input->post();
					
					$ex_id = $this->session->userdata('ex_id');
					$property_id  = $this->input->post('property_id');
					
					$guest_name = $this->input->post('guest_name');
					$guest_mobile = $this->input->post('guest_mobile');
					$visiting_date = $this->input->post('visiting_date');
					$guest_gender = $this->input->post('guest_gender');
					$description = $this->input->post('description');
					
					if(!empty($check))   
					{
						 $guest =   $this->EntryModel->ex_manage_entry($ex_id,$property_id,$guest_name,$guest_mobile,$visiting_date,$guest_gender,$description);
						
						 $this->response([
						    'status' => TRUE,
							'message' => 'Success! Guest created  successfully.',
							'data' => $guest
							], 
							RestController::HTTP_OK
							);
						
					}
					else    
					{
					   $this->response("Error! All Fields are required.", RestController::HTTP_BAD_REQUEST);	
					}
					
				}
                else
                {
					 $this->response("Error! login are required.", RestController::HTTP_BAD_REQUEST);
				}					
					
		 	
				}
				
	}

?>