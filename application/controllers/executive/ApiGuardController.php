<?php 
    
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	require APPPATH . 'libraries/RestController.php';
	require APPPATH . 'libraries/Format.php';
	use chriskacerguis\RestServer\RestController;
	
	class ApiGuardController extends RestController
	{
		function __construct()
				{
					parent::__construct();
					$this->load->helper("common_helper");
					$this->load->model('AuthenticationModel');
		            $this->load->model('GuardModel');
					$this->load->model('SubadminModel'); 		
				}
				

             public function guard_list_get($id)
			 {
				  $checklogin =  $this->AuthenticationModel->check_mob_exe();
					   
					    if(!empty($checklogin['ex_id']))
						{
						    $data = array();
							$seo = array();
							$seo['title']		=	"Regisster Guard List - ".APP_NAME;
							$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
							$data['seo']	    =	$seo;
							
							$curuserdata               =   $this->SubadminModel->getexecutiveProfile();
						
							$data['curuserdata'] = $curuserdata;
							$property_id = $curuserdata['property_id'];
						    
							
					        
							$data['reegister_guard']   =   $this->GuardModel->ex_guard_list($id , $property_id); 
							
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
			 
			 public function ex_manage_entry_post()
				{
					
				$checklogin =  $this->AuthenticationModel->check_mob_exe();
					   
				if(!empty($checklogin['ex_id']))
				{
					
					$check  = $this->input->post();
					$guard_id = $this->input->post('guard_id');
					$password = $this->input->post('password');
					
					
					if(!empty($check))   
					{
						 $guest =   $this->GuardModel->ex_guard_credentials($guard_id,$password);
						
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