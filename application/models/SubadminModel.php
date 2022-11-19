<?php
     
	 Class SubadminModel extends CI_Model
	 {
			
		function __construct()
		{
			parent::__construct();
		}
			
						
		/*   add/update Admin  */
		
		
		public function register_guard()
		{
			$name   	=	$this->input->post("name");	
			$email   	=	$this->input->post("email");
			$mobile   	=	$this->input->post("mobile");
			$address   	=	$this->input->post("address");
			$id_type   	=	$this->input->post("id_type");
			$description   	=	$this->input->post("description");
			$city_id   	=	$this->input->post("city_id");
			$pro_id   	=	$this->input->post("property_id");
			$role  		=	"guard";
			$otp=0;	
			
			$senddata				=	array(); 
			$senddata['status']		=	0; 
			$senddata['message']	=	"Something Went wrong, Please try again later..."; 
			
			$this->load->helper('common_helper');
			
			$id_card  =    uploadimgfile("id_card","./assets/img","pre");
			
			$resume  =    uploadimgfile("resume","./assets/img","pre");
			
			$check_already	=	$this->db->query("SELECT email,mobile FROM `guard` WHERE(email = '$email' OR mobile = '$mobile') ")->result_array();
			if(!empty($check_already))
			{
				$senddata['message']	=	"Email ($email) or Mobile ($mobile) is already on the System."; 
				return json_encode($senddata);
			}
			
			
			$guard=array();
			$guard['name']=$name;
			$guard['email']=$email;
			$guard['mobile']=$mobile;
			$guard['role']=$role;
			$guard['address']=$address;
			$guard['id_type']=$id_type;
			$guard['description']=$description;
			$guard['city_id']=$city_id;
			$guard['property_id']=$pro_id;
			$guard['created_at']= date();
			
			if($id_card['status']!=0)
			{
				$guard['id_card']=$id_card['data']['name'];
			}
			else
			{
				$senddata['message']	=	"id card field can not be empty."; 
				return json_encode($senddata);
            }				
			if($resume['status']!=0 )
			{
				$guard['resume']=$resume['data']['name'];
			}
			else
			{
				$senddata['message']	=	"resume field can not be empty."; 
				return json_encode($senddata);
            }
               
			
			 
            $this->db->insert('guard',$guard);
				$senddata['status']		=	1; 
				$senddata['message']	=	"Registered  successfully."; 
				$senddata['redurl']	=	site_url('user/front/guard/registration');
				return json_encode($senddata);	
		}

        public function register_executive()
		{
			
			$name   	=	$this->input->post("name");	
			$email   	=	$this->input->post("email");
			$mobile   	=	$this->input->post("mobile");
			$address   	=	$this->input->post("address");
			$id_type   	=	$this->input->post("id_type");
			$description   	=	$this->input->post("description");
			$role  		=	"executive";
			$otp=0;	
			
			$senddata				=	array(); 
			$senddata['status']		=	0; 
			$senddata['message']	=	"Something Went wrong, Please try again later..."; 
			
			$this->load->helper('common_helper');
			
			$id_card  =    uploadimgfile("id_card","./assets/img","pre");
			
			$resume  =    uploadimgfile("resume","./assets/img","pre");
			
			$check_already	=	$this->db->query("SELECT email,mobile FROM `executive` WHERE(email = '$email' OR mobile = '$mobile') ")->result_array();
			if(!empty($check_already))
			{
				$senddata['message']	=	"Email ($email) or Mobile ($mobile) is already on the System."; 
				return json_encode($senddata);
			}
			
			
			$executive=array();
			$executive['name']=$name;
			$executive['email']=$email;
			$executive['mobile']=$mobile;
			$executive['role']=$role;
			$executive['address']=$address;
			$executive['id_type']=$id_type;
			$executive['description']=$description;
			
			if($id_card['status']!=0)
			{
				$executive['id_card']=$id_card['data']['name'];
			}
			else
			{
				$senddata['message']	=	"id card field can not be empty."; 
				return json_encode($senddata);
            }				
			if($resume['status']!=0 )
			{
				$executive['resume']=$resume['data']['name'];
			}
			else
			{
				$senddata['message']	=	"resume field can not be empty."; 
				return json_encode($senddata);
            }
               
			
			 
            $this->db->insert('executive',$executive);
				$senddata['status']		=	1; 
				$senddata['message']	=	"Registered  successfully."; 
				$senddata['redurl']	=	site_url('user/front/executive/registration');
				return json_encode($senddata);			
			
		}
       
		
		public function manageexecutive()
		{
		
		    $ex_id     	=	$this->input->post("ex_id");
			$name   	=	$this->input->post("name");	
			$email   	=	$this->input->post("email");
			$mobile   	=	$this->input->post("mobile");
			$property_id =  json_encode($this->input->post('property_id'));
			$role  		=	"executive";
			$password 	=   $this->input->post("password");
			$otp=0;	

			$senddata				=	array(); 
			$senddata['status']		=	0; 
			$senddata['message']	=	"Something Went wrong, Please try again later..."; 
			
			$check_already	=	$this->db->query("SELECT email,mobile FROM `executive` WHERE(email = '$email' OR mobile = '$mobile') and ex_id != '$ex_id'")->result_array();
			if(!empty($check_already))
			{
				$senddata['message']	=	"Email ($email) or Mobile ($mobile) is already on the System."; 
				return json_encode($senddata);
			}
			
			    $executive=array();
				$executive['name']=$name;
				$executive['email']=$email;
				$executive['mobile']=$mobile;
				$executive['role']=$role;
				$executive['otp']=$otp;
				$executive['property_id']= $property_id;
				
			if(!empty($ex_id))
			{
				//update
				if(!empty($password))
				{
					$executive['password']= md5($password);
				}
				
				$this->db->where('ex_id',$ex_id);
				$this->db->update('executive',$executive);
				$senddata['status']		=	2; 
				$senddata['message']	=	"Executive is updated successfully."; 
				$senddata['redurl']	=	site_url('administrator/executive/view');
				return json_encode($senddata);

			}
			else
			{
				//insert
				if(empty($password))
				{
					$senddata['message']	=	"Password field can not be empty."; 
					return json_encode($senddata);						
				}
				else
				{
					   $executive['password']= md5($password);
					   $executive['created_at']= gettime4db();
		               $executive['status']=1;
					   $this->db->insert('executive',$executive);	
						
						$senddata['status']		=	1; 
						$senddata['message']	=	"Executive ($name) is added successfully..."; 
						$senddata['redurl']	=	site_url('administrator/executive/view');
						return json_encode($senddata);
				}
			}	
		}
		
		public function managehost()
		{
			$aid     	=	$this->input->post("aid");
			$name   	=	$this->input->post("name");	
			$email   	=	$this->input->post("email");
			$mobile   	=	$this->input->post("mobile");
			$role  		=	"executive";
			$password 	=   md5($this->input->post("password"));
			$otp=0;	

			$senddata				=	array(); 
			$senddata['status']		=	0; 
			$senddata['message']	=	"Something Went wrong, Please try again later..."; 
				
			
			$this->load->helper('common_helper');
			$image  =    uploadimgfile("photo_inp","./assets/img","pre");
				
			$check_already	=	$this->db->query("SELECT email,mobile FROM `administrator` WHERE(email = '$email' OR mobile = '$mobile') and aid != '$aid'")->result_array();
			if(!empty($check_already))
			{
				$senddata['message']	=	"Email ($email) or Mobile ($mobile) is already on the System."; 
				return json_encode($senddata);
			}
			
			if(!empty($aid)){
				//update
				$admin=array();
				$admin['name']=$name;
				$admin['email']=$email;
				$admin['mobile']=$mobile;
				$admin['role']=$role;
				$admin['otp']=$otp;
				if(!empty($password)){
					$admin['password']=$password;
				}
				if($image['status']!=0){
					$admin['image']=$image['data']['name'];
				}				
				$this->db->where('aid',$aid);
				$this->db->update('administrator',$admin);
				$senddata['status']		=	2; 
				$senddata['message']	=	"Admin is updated successfully."; 
				$senddata['redurl']	=	site_url('administrator/owner_list');
				return json_encode($senddata);

			}else{
				//insert
				if(empty($password)){
					$senddata['message']	=	"Password field can not be empty."; 
					return json_encode($senddata);						
				}else{
					$added=gettime4db();
					if($image['status']==0){
						$sql=$this->db->query("insert into administrator(name,email,mobile,role,otp,password,status)
						values('$name','$email','$mobile','$role','$otp','$password',1)");
					}else{
						$image_path=$image['data']['name'];
						$sql=$this->db->query("insert into administrator(name,email,mobile,role,image,otp,password,status)
						values('$name','$email','$mobile','$role','$image_path','$otp','$password',1)");
					}
					
					if($sql){
						$senddata['status']		=	1; 
						$senddata['message']	=	"Host  Owner ($name) is added successfully..."; 
						$senddata['redurl']	=	site_url('administrator/subadmin/view');
						return json_encode($senddata);
					}
				}
			}
		}
		
		
		public function managesubadmin()
		{		
			$aid     	=	$this->input->post("aid");
			$name   	=	$this->input->post("name");	
			$email   	=	$this->input->post("email");
			$mobile   	=	$this->input->post("mobile");
			$role  		=	$this->input->post("role");
			$password 	=   md5($this->input->post("password"));
			$otp=0;	

			$senddata				=	array(); 
			$senddata['status']		=	0; 
			$senddata['message']	=	"Something Went wrong, Please try again later..."; 
				
			
			$this->load->helper('common_helper');
			$image  =    uploadimgfile("photo_inp","./assets/img","pre");
				
			$check_already	=	$this->db->query("SELECT email,mobile FROM `administrator` WHERE(email = '$email' OR mobile = '$mobile') and aid != '$aid'")->result_array();
			if(!empty($check_already))
			{
				$senddata['message']	=	"Email ($email) or Mobile ($mobile) is already on the System."; 
				return json_encode($senddata);
			}
			
			if(!empty($aid)){
				//update
				$admin=array();
				$admin['name']=$name;
				$admin['email']=$email;
				$admin['mobile']=$mobile;
				$admin['role']=$role;
				$admin['otp']=$otp;
				if(!empty($password)){
					$admin['password']=$password;
				}
				if($image['status']!=0){
					$admin['image']=$image['data']['name'];
				}				
				$this->db->where('aid',$aid);
				$this->db->update('administrator',$admin);
				$senddata['status']		=	2; 
				$senddata['message']	=	"Admin is updated successfully."; 
				$senddata['redurl']	=	site_url('administrator/subadmin/view');
				return json_encode($senddata);

			}else{
				//insert
				if(empty($password)){
					$senddata['message']	=	"Password field can not be empty."; 
					return json_encode($senddata);						
				}else{
					$added=gettime4db();
					if($image['status']==0){
						$sql=$this->db->query("insert into administrator(name,email,mobile,role,otp,password,status)
						values('$name','$email','$mobile','$role','$otp','$password',1)");
					}else{
						$image_path=$image['data']['name'];
						$sql=$this->db->query("insert into administrator(name,email,mobile,role,image,otp,password,status)
						values('$name','$email','$mobile','$role','$image_path','$otp','$password',1)");
					}
					
					if($sql){
						$senddata['status']		=	1; 
						$senddata['message']	=	"Admin ($name) is added successfully..."; 
						$senddata['redurl']	    =	site_url('administrator/subadmin/view');
						return json_encode($senddata);
					}
				}
			}

		}
			
		/* get role  */	

        public function GetExecutive($ex_id=0,$status=0)
		{
			
		   $this->db->where('ex_id', $ex_id);
           return $this->db->get('executive')->row_array();	

            		
		}
		
		public function GetAdmin($id=0,$status=0)
		{
			
			if(!empty($id))
			{
				$temp	=	$this->db->query("SELECT * FROM `administrator` where aid = '$id'")->result_array();
				if(!empty($temp))
				{
					
					return $temp[0];
				}else{
					return array();
				}
			}
		}
		
		/*	list all admin	*/
		public function list_subadmin()
		{
			$this->db->where('role','Admin');
			return $this->db->get('administrator')->result_array();
		}
		
		public function owner_list()
		{
			$this->db->select('*');
		    $this->db->where('role','hostowner');
			$data = $this->db->get('administrator')->result_array();
			
			return $data;
		}
		
		
		
		public function getUserProfile()
		{
		
		            $id		=	$this->session->userdata("aid");
			        $this->db->select('*' );
                    $this->db->from('administrator '); 
                    $this->db->where('aid',$id);
                    $query = $this->db->get(); 
                    $data = $query->row_array();
                    
                    return $data;
			  
 
			 
		}
		public function getexecutiveProfile()
		{
		            $id		=	$this->session->userdata("ex_id");
			        $this->db->select('*' );
                    $this->db->from('executive'); 
                    $this->db->where('ex_id',$id);
                    $query = $this->db->get(); 
                    $data = $query->row_array();
                    
                    return $data;	
		}

        public function list_executive()
		{

			return $this->db->query("SELECT * FROM `executive`")->result_array();
		}

       
				
	}
?>