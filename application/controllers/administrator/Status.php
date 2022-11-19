<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class status extends CI_Controller
    {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper("common_helper");
			$this->load->model(array('AuthenticationModel','CommonModel','MasterModel','LocationModel','RoletypeModel','StatusModel'));
			$this->load->model('UserModel');
		}
		
		public function updatestatus(){
			$this->StatusModel->status();
		}
	}
?>