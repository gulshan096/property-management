<?php
     
	 Class RoletypeModel extends CI_Model
	 {
			
		function __construct()
		{
			parent::__construct();
		}
						
		public function manageroletype()
		{		
			//print_r("i m getting called");
			$title=$this->input->post('title');
			$id=$this->input->post('roletype_id');
//print_r($title);
			//exit;

			$senddata	=	array(); 
			$senddata['status']		=	0;
			$senddata['message']	=	"Something Went wrong, Please try again later..."; 
				
			$check_already	=	$this->db->query("SELECT title FROM `role_types` WHERE title = '$title' AND id != '$id'")->result_array();
				
			if(!empty($check_already))
			{
				$senddata['message']	=	"Role Type ($title) is already on the System, Please create new Role Type."; 
				return json_encode($senddata);
			}
			

			if(!empty($id)){
				$darray=array();

				$darray['title']=$title;
				$darray['updated']=gettime4db();	
				$this->db->where('id',$id);
				$this->db->update('role_types',$darray);
				$senddata['redurl']	=	site_url('administrator/roletype'); 
				$senddata['status']	=	2; 
				$senddata['message']	=	"Role Type ($title) is Updated Successfully."; 
				return json_encode($senddata);
			}else{
				$darray=array();

				$darray['title']=$title;
				//$darray['rolet']=$roles;
				$darray['status']=1;
				$darray['added']=gettime4db();	
				$darray['updated']=0;
				$this->db->insert('role_types',$darray);
				$senddata['redurl']	=	site_url('administrator/roletype'); 
				$senddata['status']	=	1; 
				$senddata['message']	=	"Roletype ($title) added successfully."; 
				return json_encode($senddata);
			}

		}
				
		public function GetRoletype($id=0,$status=0)
		{
			if(!empty($id))
			{
				$temp	=	$this->db->query("SELECT * FROM `role_types` where id = '$id'")->result_array();
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
	}
?>