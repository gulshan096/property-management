<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class UserLogin extends CI_Controller
		{
			function __construct()
				{
					    parent::__construct();
		
						$this->load->model('user/UserLoginModel');
						//$this->load->model('CommonModel');
				}
				
			public function	manageuserlogin()
			{
				echo $this->UserLoginModel->manageuserlogin();
			}
			
			public function	manageusersignup()
			{
				echo $this->UserLoginModel->manageusersignup();
			}
			
			
			
			public function logout()
			{
				$this->session->sess_destroy();
				redirect("user/front");
			}
			
			public function profile_update()
			{
				echo $this->UserLoginModel->manageUpdateProfile();
			}
			
			public function manageChangePassword(){
				echo $this->UserLoginModel->manageChangePassword();
			}
			
			public function Id_document(){
				echo $this->UserLoginModel->manageId_document();
			}
			
			
		    
		}
