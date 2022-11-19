<?php 
    
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	require APPPATH . 'libraries/RestController.php';
	require APPPATH . 'libraries/Format.php';
	use chriskacerguis\RestServer\RestController;
	
	class ApiPropertyController extends RestController
	{
		function __construct()
				{
					parent::__construct();
					$this->load->helper("common_helper");
					$this->load->model('AuthenticationModel');
					$this->load->model('BookingModel');
					$this->load->model('PropertyModel');
					$this->load->model('BookingModel');
					$this->load->model('SubadminModel'); 		
				}
				

             public function property_list_get()
			 {
				  $checklogin =  $this->AuthenticationModel->check_mob_exe();
					   
					    if(!empty($checklogin['ex_id']))
						{
						    $data = array();
							$seo = array();
							$seo['title']		=	"Executive Property List - ".APP_NAME;
							$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
							$data['seo']	    =	$seo;
							
							$curuserdata               =   $this->SubadminModel->getexecutiveProfile();
						
							$data['curuserdata'] = $curuserdata;
							$property_id = $curuserdata['property_id'];
						   
					
							$data['get_property']   =   $this->PropertyModel->ex_list_property($property_id); 
							
							$this->response([
							'status' => TRUE,
							'message' => 'Success! Property lists .',
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