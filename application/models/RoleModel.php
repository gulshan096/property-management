<?php
     
	 Class RoleModel extends CI_Model
	       
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
			public function managerole()
			{		
					$roles = $array['role'] = json_encode($this->input->post("rolet"));
					$name=$this->input->post('name');
					$id=$this->input->post('roles_id');
					
					$senddata	=	array(); 
					$senddata['status']		=	0; 
					$senddata['message']	=	"Something Went wrong, Please try again later..."; 
						
					$check_already	=	$this->db->query("SELECT name FROM `roles` WHERE name = '$name' AND id != '$id'")->result_array();
						
					if(!empty($check_already))
						{
							$senddata['message']	=	"Name ($name) is already on the System, Please create new name."; 
								return json_encode($senddata);
						}
					
					
					if(!empty($array['role']))
						{		
							if(!empty($name))
								{
									if(!empty($id)){
										$updated=gettime4db();	
										
										$sql=$this->db->query("update roles
											set name='$name',rolet='$roles',updated='$updated' 
											where id=$id");
										$senddata['redurl']	=	site_url('administrator/role'); 
										$senddata['status']	=	2; 
										$senddata['message']	=	"Role assign is Updated Successfully."; 
										return json_encode($senddata);
									}else{
										$darray=array();
										$darray['name']=$name;
										$darray['rolet']=$roles;
										$darray['status']=1;
										$darray['added']=gettime4db();	
										$darray['updated']=0;
										$this->db->insert('roles',$darray);
										$senddata['redurl']	=	site_url('administrator/role'); 
										$senddata['status']	=	0; 
										$senddata['message']	=	"Role assigned successfully."; 
										return json_encode($senddata);
									}
								} else {
										$senddata['redurl']	=	site_url('administrator/role'); 
										$senddata['status']	=	0; 
										$senddata['message']	=	"Name can not be empty."; 
										return json_encode($senddata);
								}
						}else{
							$senddata['redurl']	=	site_url('administrator/role'); 
							$senddata['status']	=	0; 
							$senddata['message']	=	"Please assign roles."; 
							return json_encode($senddata);
						}
			}
				
			public function GetRole($id=0,$status=0)
				{
					if(!empty($id))
						{
							$temp	=	$this->db->query("SELECT * FROM `roles` where id = '$id'")->result_array();
								if(!empty($temp))
									{
										return $temp[0];
									}else{
										return array();
									}
						}
					
					
				}
				
				public function list_roleType(){
					return  $this->db->query("SELECT * FROM `role_types`")->result_array();
				}
				
				public function list_role(){
					return  $this->db->query("SELECT * FROM `roles`")->result_array();

				}
		}
?>