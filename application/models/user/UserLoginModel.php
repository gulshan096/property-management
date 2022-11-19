<?php

	Class UserLoginModel extends CI_Model
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
				
    			public function manageuserlogin()
    		    {
    		       
    		  
					$senddata	=	array(); 
					$senddata['status']		=	0; 
					$senddata['message']	=	"Something Went wrong, Please try again later...";
		
					
					$email=$this->input->post('email');
					$password=$this->input->post('password');
					
					if(empty($email)){
						$senddata['message']="E-mail can not be empty";
						return json_encode($senddata);
					}
					
					
					if(empty($password)){
						$senddata['message']="Password can not be empty";
						return json_encode($senddata);
					}

					$login_query=$this->db->query("select * from tenant where email='$email'")->row_array();
					   
					
					
					if(!empty($login_query)){
						
						
							
						if($login_query['password'] != $password){
							$senddata['message']="Password is incorrect.";
							return json_encode($senddata);
						}else{
							$this->session->set_userdata($login_query);
							$senddata['status']		=	1; 
							$senddata['message']="You are logged In Successfully";
							$senddata['redurl']	=	site_url('user/front/myprofile');
							return json_encode($senddata);
						}
					}else{
						$senddata['message']= $email." is not in the system. Please enter valid email ID";
						return json_encode($senddata);
					}
    		    }
				
				public function manageusersignup(){
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
					$senddata['redurl']	=	site_url('user/front'); 

					$senddata['message']= "You are Registered Successfully. Please Sign In";
					return json_encode($senddata);
					
				}
				
				
				public function userchecklogin()
				{
				
					$userchecklogin = $this->session->userdata();
					
					
						if(!empty($userchecklogin['tenant_id']) && !empty($userchecklogin['email']) )
							{
								return true;	
							}
							redirect("user/front");
							exit(0);
							return false;	
				}
				
				
				
				
				
				public function getUserProfile()
				{
					$id		=	$this->session->userdata("tenant_id");
			        $this->db->select('*' );
                    $this->db->from('tenant'); 
                    $this->db->where('tenant_id',$id);
                    $query = $this->db->get(); 
                    $data = $query->row_array();
                    
                    return $data;
			  
 
			 //return $curuser;
				}
				
				public function manageUpdateProfile()
				{
					$id		=	$this->input->post("tenant_id");
					$post=$this->input->post();
					//$post['id']=$id;
					//print_r($post);
					//exit;

					$senddata	=	array(); 
					$senddata['status']		=	0; 
					$senddata['message']	=	"Something Went wrong, Please try again later...";
					//$id		=	$this->session->userdata("tenant_id");
					
					
					
					$tenant_info=array();
					$mobile = $this->input->post('mobile');
					
					$tenant_info['mobile']=$mobile;
					
					$email = $this->input->post('email');
					$tenant_info['email']=$email;
					
					$birth_date= $this->input->post('birth_date');
					$tenant_info['DOB']=$birth_date;
					
					$gender=$this->input->post('gender');
					$tenant_info['gender']=$gender;
					
					$address=$this->input->post('address');
					$tenant_info['address']=$address;
					
					if(empty($gender))
					{
						$senddata['message']= "Please select gender";
						return json_encode($senddata);
					}

					$mobile_exist=$this->db->query("select * from tenant where mobile='$mobile' and tenant_id != $id")->result_array();
					//print_r($mobile_exist);
					if(!empty($mobile_exist)){
						$senddata['message']= $mobile." is already used by other user";
						return json_encode($senddata);
					}
					
					$email_exist=$this->db->query("select * from tenant where email='$email' and tenant_id != $id")->result_array();
					if(!empty($email_exist)){
						$senddata['message']= $email." is already used by other user";
						return json_encode($senddata);
					}
					
					
					$this->db->where('tenant_id',$id);
					$this->db->update('tenant',$tenant_info);
					
					$senddata['status']		=	1; 
					$senddata['message']	=	"Tenant Details Updated Successfully...";
					return json_encode($senddata);
				}
				
				public function manageChangePassword(){
					
					$senddata	=	array(); 
					$senddata['status']		=	0; 
					$senddata['message']	=	"Something Went wrong, Please try again later...";
					
					$prev_password= $this->input->post('prev_password');
					$new_password= $this->input->post('new_password');
					$cnf_password= $this->input->post('cnf_password');
					$curr_password= $this->input->post('curr_password');
					$id= $this->input->post('tenant_id');
					
					if($new_password != $cnf_password){
						$senddata['message']	=	"New Password and Confirm Password are not same";
						return json_encode($senddata);
					}
					
					if($prev_password != $curr_password){
						$senddata['message']	=	"Password and Current Password are not same";
						return json_encode($senddata);
					}
					
					$password_arr=array();
					$password_arr['password']=$new_password;
					$this->db->where('tenant_id',$id);
					$this->db->update('tenant',$password_arr);
					
					$senddata['status']		=	1; 
					$senddata['message']	=	"Password has been Changed Successfully...";
					$senddata['redurl']	=	site_url('user/front/myprofile'); 
					return json_encode($senddata);
					
				}
				
				public function manageId_document(){
					
					$senddata	=	array(); 
					$senddata['status']		=	0; 
					$senddata['message']	=	"Something Went wrong, Please try again later...";
					
					$id=$this->input->post('tenant_id');
					
					$already_exist=$this->db->query("select * from tenant_document where tenant_ID=$id")->result_array();
					
					if(!empty($already_exist)){
						$senddata['status']		=	1; 
						$senddata['message']	=	"Your Details Already in the System";
						return json_encode($senddata);
					}
					
					
					$card_type=$this->input->post('card_type');
					//$id_img1=$this->input->post('id_img1');
					//$profile_image=$this->input->post('profile_img');
					//print_r('$profile_img');
					//print_r($_FILES['profile_img']['name']);
					//print_r($profile_image);
					//return $id_img1;
					//exit;
					$error='';
					if(empty($card_type)){
						$error=	"Please Select Card Type.";
						if($error){
							$senddata['message']=$error;
							return json_encode($senddata);
						}
					}
					
					
					if(empty($_FILES['profile_img']['name'])){
						$error=	"Please Select Your Profile Image.";
						if($error){
							$senddata['message']=$error;
							return json_encode($senddata);
						}
					}
					
						
					if(empty($_FILES['id_img1']['name'])){
						$error=	"Please Select Your ID's Front Image.";
						if($error){
							$senddata['message']=$error;
							return json_encode($senddata);
						}
					}
					
						
					if(empty($_FILES['id_img2']['name'])){
						$error=	"Please Select Your ID's Back Image.";
						if($error){
							$senddata['message']=$error;
							return json_encode($senddata);
						}
					}
					
					$upload_image=array();
					$upload_image['card_type']=$card_type;
					
					if(!empty($_FILES['profile_img']['name'])){
						$this->load->helper('common_helper');
						$image = uploadimgfile("profile_img","./assets/img","pre");
						if($image['status']==0){
							$senddata['message']	=	$image['message']; 
							return json_encode($senddata);
						}
							 
						if($image['status']==1){
							$upload_image['profile_image'] = $image['data']['name'];
							
						}						
					}
					
					if(!empty($_FILES['id_img1']['name'])){
						$this->load->helper('common_helper');
						$image = uploadimgfile("id_img1","./assets/img","pre");
						if($image['status']==0){
							$senddata['message']	=	$image['message']; 
							return json_encode($senddata);
						}
							 
						if($image['status']==1){
							$upload_image['ID_front_image'] = $image['data']['name'];
							
						}						
					}
					
					if(!empty($_FILES['id_img2']['name'])){
						$this->load->helper('common_helper');
						$image = uploadimgfile("id_img2","./assets/img","pre");
						if($image['status']==0){
							$senddata['message']	=	$image['message']; 
							return json_encode($senddata);
						}
							 
						if($image['status']==1){
							$upload_image['ID_back_image'] = $image['data']['name'];
							
						}						
					}
					$upload_image['tenant_ID'] = $id;
					
					//$this->db->where('tenant_id',$id);
					$this->db->insert('tenant_document',$upload_image);
					
					$senddata['status']		=	1; 
					$senddata['message']	=	"Images Uploaded Successfully...";
					//$senddata['redurl']	=	site_url('user/front/profile_verification');
					return json_encode($senddata);
					
					
					
				}
				
				public function getUserDoc($id){
					$result=$this->db->query("select * from tenant_document where tenant_ID=$id")->row_array();
					return $result;
				}
				
				
				
				
				
				// -----mobile login---------
				
				public function user_mobile_dologin($username ,$password)
				{
					
					$sql = "SELECT * FROM `tenant` WHERE(`password` =	'$password') AND (email = '$username' )";
					
					$query = $this->db->query($sql)->row_array();
					
					
				    return $query;  
			       
				}
				
				public function update_lastlogin($lastlogin,$username, $password)
				{
					$sql = "UPDATE tenant SET lastlogin = '$lastlogin' ,  otp = '0' WHERE ( `password`	=	'$password'  ) AND ( email = '$username' ) ";
					$query = $this->db->query($sql);
					
					return $query;
				}
				
				
				    
		}

?>