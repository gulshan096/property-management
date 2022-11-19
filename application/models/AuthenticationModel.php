<?php
     
	
	
	 Class AuthenticationModel extends CI_Model
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
			public function checklogin()
				{
					$checklogin = $this->session->userdata();
					
						if(!empty($checklogin['aid'])  && !empty($checklogin['mobile']) && !empty($checklogin['status']))
							{
								return true;	
							}
								redirect("administrator?login=no&token=".md5(time()));
					exit(0);
								return false;	
				}
			public function checklogin_executive()
			{
			     $checklogin = $this->session->userdata();
					
						if(!empty($checklogin['ex_id']) && !empty($checklogin['mobile']) && !empty($checklogin['status']))
							{
								return true;	
							}
								redirect("executive?login=no&token=".md5(time()));
					exit(0);
								return false;		
			}
			
			public function check_mob_exe()
			{
				   $checklogin = $this->session->userdata();
				   
				   if( !empty($checklogin['ex_id']))
				   {
					   return $checklogin;
				   }
				   return   $checklogin;
				   
			}
				
			public function dologin()
				{
					
                   
					$username	=	$this->input->post('username');	
					$password	=	$this->input->post('password');	
	
	
						if(!empty($username) && !empty($password))
							{
								
								
						$password = md5($password);
											
					    $logincheck	=	$this->db->query("SELECT `aid`,`name`,`email`,`mobile`,`status`FROM `administrator`
														 WHERE(`password`	=	'$password' OR `otp` =	'$password' )
														 AND(email = '$username' OR mobile = '$username' )")->result_array();
																				
									if(!empty($logincheck))
										{
									      
											
											$logincheck = $logincheck[0];
												if(!empty($logincheck['status']))
													{
														$this->session->set_userdata($logincheck);
														
														$lastlogin = date("Y-m-d H:i:s");
														
						                               $this->db->query("UPDATE administrator SET lastlogin = '$lastlogin' ,  otp = '0' WHERE ( `password`	=	'$password' OR `otp` 		=	'$password' ) AND ( email = '$username' OR mobile = '$username' )  ");
														
														echo "<div class='alert alert-success'>Success! You are logged in successfully.</div>";
														
														?>
															<script>
															
																setTimeout(function(){
																	window.location.href="<?php echo base_url('administrator/dashboard'); ?>";
																},786);
															
															</script>
														<?php
													} else {
													
														echo "<div class='alert alert-danger'>Error! You are not allowed to login.</div>";
													}
										} else {	
											echo "<div class='alert alert-danger'>Error! Incorrect Login details.</div>";
										}
								
							} else {
								echo "<div class='alert alert-danger'>Error! All Fields are required.</div>";
							}
				}
				
				public function executive_dologin()
				{
					$username	=	$this->input->post('username');	
					$password	=	$this->input->post('password');	
					
					if(!empty($username) && !empty($password))
					{
						$password = md5($password);
						
						$sql = "SELECT `ex_id`,`name`,`email`,`mobile`,`status`FROM `executive`
														 WHERE(`password`	=	'$password' OR `otp` =	'$password' )
														 AND(email = '$username' OR mobile = '$username' )";
						
						
						$logincheck = $this->db->query($sql)->row_array();
						
						if(!empty($logincheck))
										{
									      
											
											
												if(!empty($logincheck['status']))
													{
														$this->session->set_userdata($logincheck);
														
														$lastlogin = date("Y-m-d H:i:s");
														
						                               $this->db->query("UPDATE executive SET lastlogin = '$lastlogin' ,  otp = '0' WHERE ( `password`	=	'$password' OR `otp` 		=	'$password' ) AND ( email = '$username' OR mobile = '$username' )  ");
														
														echo "<div class='alert alert-success'>Success! You are logged in successfully.</div>";
														
														?>
															<script>
															
																setTimeout(function(){
																	window.location.href="<?php echo base_url('executive/dashboard'); ?>";
																},786);
															
															</script>
														<?php
													} else {
													
														echo "<div class='alert alert-danger'>Error! You are not allowed to login.</div>";
													}
										} else {	
											echo "<div class='alert alert-danger'>Error! Incorrect Login details.</div>";
										}
						
						
														 
						
						
					}
					
					
				}
				
				public function mobile_dologin($username ,$password)
				{
					 $password  = md5($password);   
					 $sql = "SELECT * FROM `executive` WHERE(`password` =	'$password' OR `otp` =	'$password' )
										AND(email = '$username' OR mobile = '$username' )";
			            
					$query = $this->db->query($sql)->row_array();


			         return $query;
                    
		
				}
				public function update_lastlogin($lastlogin,$username, $password)
				{
					
					$password  = md5($password);
					$sql = "UPDATE executive SET lastlogin = '$lastlogin' ,  otp = '0' WHERE ( `password`	=	'$password' OR 
							`otp` =	'$password' ) AND ( email = '$username' OR mobile = '$username' ) ";
					$query = $this->db->query($sql);
					
					return $query;
				}
				
				
				
			
		}

?>