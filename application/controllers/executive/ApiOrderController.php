<?php 
    
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	require APPPATH . 'libraries/RestController.php';
	require APPPATH . 'libraries/Format.php';
	use chriskacerguis\RestServer\RestController;
	
	class ApiOrderController extends RestController
	{
		function __construct()
				{
					parent::__construct();
					$this->load->helper("common_helper");
					$this->load->model('AuthenticationModel');
					$this->load->model('BookingModel');
					$this->load->model('PropertyModel');
					$this->load->model('RoomModel');
					$this->load->model('UserModel');
					$this->load->model('BookingModel');
					$this->load->model('SubadminModel');
					$this->load->model('CommonModel');
					$this->load->model('user/UserLoginModel');
					   
				   		
				}
				

             public function order_list_get($id)
			 {
				  $checklogin =  $this->AuthenticationModel->check_mob_exe();
					   
					    if(!empty($checklogin['ex_id']))
						{
						    $data = array();
							$seo = array();
							$seo['title']		=	"Admin Dashboard - ".APP_NAME;
							$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
							$data['seo']	    =	$seo;
							
							$curuserdata               =   $this->SubadminModel->getexecutiveProfile();
						
							$data['curuserdata'] = $curuserdata;
							$property_id = $curuserdata['property_id'];
						   
							$data['list_booking']	=	$this->BookingModel->ex_list_booking($property_id);
							
							$data['get_booking']	=	$this->BookingModel->getBooking($id);
							$data['get_property']   =   $this->BookingModel->ex_pro_list($property_id); 
							// $data['get_users']      =   $this->BookingModel->list_users();
							
							$this->response([
							'status' => TRUE,
							'message' => 'Success! booking lists .',
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
	}

?>