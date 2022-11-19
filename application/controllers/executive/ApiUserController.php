<?php 
    
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	require APPPATH . 'libraries/RestController.php';
	require APPPATH . 'libraries/Format.php';
	use chriskacerguis\RestServer\RestController;
	
	class ApiUserController extends RestController
	{
		function __construct()
				{
					parent::__construct();
					$this->load->helper("common_helper");
			        $this->load->model(array('AuthenticationModel','CommonModel','MasterModel','LocationModel','RoletypeModel'));
			        $this->load->model('UserModel');
			        $this->load->model('SubadminModel');
			     $this->load->model('AuthenticationModel');
					   
				   		
				}
				
				public function addtenant_post()
				{
				
                    
						$email=$this->input->post('email');
						$password=$this->input->post('password');
						$name=$this->input->post('name');
						$mobile=$this->input->post('mobile');
						
						if(!empty($email) && !empty($password)  && !empty($name) && !empty($mobile))
					    {
						
						 $email_exist=$this->db->query("select email from tenant where email= '$email' ")->result_array();
						 
						 $mobile_exist=$this->db->query("select mobile from tenant where mobile= '$mobile'")->result_array();
						 
						 if(!empty($email_exist))
						 {
							$this->response("Error! This email is already used by other user.", RestController::HTTP_BAD_REQUEST); 
						 }
                         elseif(!empty($mobile_exist))
                         {
							$this->response("Error! This mobile is already used by other user.", RestController::HTTP_BAD_REQUEST); 
						 }
                         else
						 {
							 $tenant   =  $this->UserModel->addtenant($email,$password,$name,$mobile);
							 if(!empty($tenant))
						     {
						       $this->response([
								'status' => TRUE,
								'message' => 'Success! Tenant added  successfully.',
								'data' => $tenant
								], 
								RestController::HTTP_OK
								);
                                
						     }	 
							 
						 }							 
					       				   
					    }
                        else
						{
							$this->response("Error! All Fields are required.", RestController::HTTP_BAD_REQUEST);
						}			
						
		
				}
				
				
			    public function f_exe_list_get($id)
		        {
			
				$this->AuthenticationModel->checklogin_executive();
				$data = array();
				$seo = array();
				$seo['title']		    =	"Admin Dashboard - ".APP_NAME;
				$seo['description']	    =	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']	        =	$seo;
				$data['users']			=	$this->UserModel->GetUser($id);
				$data['list_user']	    =	$this->UserModel->list_user();	
                $data['curuserdata']    =   $this->SubadminModel->getexecutiveProfile();		

				$this->response([
				'status' => TRUE,
				'message' => 'Success! You are logged in successfully.',
				'data' => $data
				
				],
				RestController::HTTP_OK
				);
			
		      }
	}

?>