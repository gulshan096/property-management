<?php 
    
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	require APPPATH . 'libraries/RestController.php';
	require APPPATH . 'libraries/Format.php';
	use chriskacerguis\RestServer\RestController;
	
	class ExecutiveLogin extends RestController
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('AuthenticationModel');				
		}
		
        public function logout_get()
		{
			$data = $this->session->sess_destroy();
			$this->response([
				'status' => TRUE,
				'message' => 'Success! you are loged out.',
				'data' => $data
				], 
				RestController::HTTP_OK
			);
				
		}		
		
        public function dologin_post()
		{
		       
		    $username	=	$this->input->post('username');	
			$password	=	$this->input->post('password');	
			if(!empty($username) && !empty($password))
			{
			    $logincheck   =  $this->AuthenticationModel->mobile_dologin($username ,$password);
                if(!empty($logincheck))
			    {
					if(!empty($logincheck['status']))
					{
						$this->session->set_userdata($logincheck);
						$lastlogin = date("Y-m-d H:i:s");
						$this->AuthenticationModel->update_lastlogin($lastlogin,$username, $password);
						$this->response([
							'status' => TRUE,
							'message' => 'Success! You are logged in successfully.',
							'data' => $logincheck
							], 
							RestController::HTTP_OK
							);
					}
					else
					{
						$this->response("Error! You are not allowed to login.", RestController::HTTP_BAD_REQUEST);
					}							 
			    }
                else
                {
				    $this->response("Error! Incorrect Login details.", RestController::HTTP_BAD_REQUEST);
			    }						   
			}
            else
			{
				$this->response("Error! All Fields are required.", RestController::HTTP_BAD_REQUEST);
			}					
			    
		}	    
	}

?>