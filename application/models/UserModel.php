<?php
     
	 Class UserModel extends CI_Model
	 {
			
		function __construct()
		{
			parent::__construct();
		}
		
		
		
		public function addtenant(){
					$senddata	=	array(); 
					$senddata['status']		=	0; 
					$senddata['message']	=	"Something Went wrong, Please try again later...";
		
					
					$email=$this->input->post('email');
					$password=$this->input->post('password');
					$name=$this->input->post('name');
					$mobile=$this->input->post('mobile');
					
					$email_exist=$this->db->query("select email from tenant where email='$email'")->result_array();
					if(!empty($email_exist)){
						$senddata['message']= $email." email is already used by other user";
						return json_encode($senddata);
					}
					
					$mobile_exist=$this->db->query("select mobile from tenant where mobile='$mobile'")->result_array();
					if(!empty($mobile_exist)){
						$senddata['message']= $mobile." is already used by other user";
						return json_encode($senddata);
					}
					
					$userdata=array();
					$userdata['name']=$name;
					$userdata['mobile']=$mobile; 
					$userdata['email']=$email;
					$userdata['password']=$password;
					$userdata['otp']=0;
					
					$this->db->insert("tenant",$userdata);
					$senddata['status']		=	1; 
					$senddata['redurl']	=	site_url('executive/tenants/view/add'); 

					$senddata['message']= "You are Registered Successfully. Please Sign In";
					return json_encode($senddata);
					
				}
			
	
		public function GetUser($id=0,$status=0)
		{
			if(!empty($id))
			{
				$temp	=	$this->db->query("SELECT * FROM `tenant` where tenant_id = '$id'")->result_array();
				if(!empty($temp))
				{
					return $temp[0];
				}else{
					return array();
				}
			}
		}
			
			
			
		public function list_user(){
			
			
			$statussort = $this->input->get("statussort");
			
			
			switch($statussort)
			{
				case "active":
					return  $this->db->query("SELECT * FROM `tenant` WHERE status = '1'")->result_array();
				break;
				case "inactive":
					return  $this->db->query("SELECT * FROM `tenant` WHERE status = '0'")->result_array();
				break;
				default:
					return  $this->db->query("SELECT * FROM `tenant`")->result_array();
				break;
			}
			
			
		}
		
		public function list_users(){
			return  $this->db->query("SELECT * FROM `tenant` where userrole='user'")->result_array();
		}
		
		public function list_active_user(){
			return  $this->db->query("SELECT * FROM `tenant` where status=1")->result_array();
		}
		
		public function list_inactive_user(){
			return  $this->db->query("SELECT * FROM `tenant` where status=0")->result_array();
		}

	}
?>