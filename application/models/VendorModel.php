<?php
     
	 Class VendorModel extends CI_Model
	 {
			
		function __construct()
		{
			parent::__construct();
		}
			
		
		
		public function managevendor()
		{		
			$id=$this->input->post('vendorid');
			$name=$this->input->post('name');
			//$userrole="user";
			$mobile=$this->input->post('mobile');
			//$category=$this->input->post('category');
			$category = $this->input->post('category');



			$vehicle=$this->input->post('vehicle');
			$cardtype=$this->input->post('cardtype');
			$id_no=$this->input->post('id_no');
			
			$senddata	=	array(); 
			$senddata['status']		=	0; 
			$senddata['message']	=	"Something Went wrong, Please try again later...";
			
			// Insertion conditions				
			$new_record	=	$this->db->query("SELECT * FROM `vendor` WHERE id = '$id'")->result_array();
			$error="";
			
			if(!($new_record)){
				if(!$category){
					$error="Please select a Category";
				}else if(!$cardtype){
					$error="Please select a Id card type";
				
				}/*else if(empty($_FILES['photo_inp']['name'])){
					$error=	"Please Select a Image.";
				}*/
				
				if($error){
					$senddata['message']=$error;
					return json_encode($senddata);
				}
			}
			
			$check_already_mobile = $this->db->query("SELECT mobile FROM `vendor` WHERE mobile='$mobile' and id != '$id'")->result_array();
			
			if($check_already_mobile){
				$error="Please enter another mobile number ".$mobile." has been used by another vendor. ";
				$senddata['message']=$error;
				return json_encode($senddata);
			}
			
			$check_already_Id_no = 	$this->db->query("SELECT id_no FROM `vendor` WHERE id_no='$id_no' and id != '$id'")->result_array();
			
			if($check_already_Id_no){
				$error="Please enter another Id Number ".$id_no." has been used by another vendor. ";
				$senddata['message']=$error;
				return json_encode($senddata);
			}
			
			$user_data=array();
			$user_data['name']=$name;
			$user_data['category']=$category;
			$user_data['mobile']=$mobile;
			$user_data['cardtype']=$cardtype;
			//$user_data['national_id_type']=$card;
			$user_data['id_no']=$id_no;
			//$user_data['price']=$price;

			
			if($vehicle){
				$user_data['vehicle']=$vehicle;
			}
			/*if(!empty($_FILES['photo_inp']['name'])){
				$this->load->helper('common_helper');
				$image = uploadimgfile("photo_inp","./assets/img","pre");
				if($image['status']==0){
					$senddata['message']	=	$image['message']; 
					return json_encode($senddata);
				}

				if($image['status']==1){
					$user_data['id_image'] = $image['data']['name'];
				}						
			}*/
			
			
			$already_user=$this->db->query("SELECT id FROM `vendor` WHERE id = '$id' ")->result_array();
			if($already_user){
				$user_data['updated']=gettime4db();
				//print_r($user_data);
				//exit;
				$this->db->where('id',$id);
				$this->db->update('vendor',$user_data);
				
				$senddata['redurl']	=	site_url('administrator/vendors/view/'); 
				$senddata['status']	=	2; 
				$senddata['message']	=	"Vendor is Updated Successfully.";
				
				return json_encode($senddata);
			}else{
				$user_data['added']=gettime4db();
				$user_data['status']=1;
				$user_data['id']=$id;
				//exit;
				$this->db->insert('vendor',$user_data);
				
				$senddata['redurl']	=	site_url('administrator/vendors/view/');
				$senddata['status']	=	1; 
				$senddata['message']	=	"Vendor is Added Successfully.";
				
				return json_encode($senddata);
			}
		}
		
		
		
		public function managevendorcategory()
		{		
			$id=$this->input->post('cat_id');
			$category=$this->input->post('category');

			$senddata	=	array(); 
			$senddata['status']		=	0; 
			$senddata['message']	=	"Something Went wrong, Please try again later...";
					
			$check_already_category = $this->db->query("SELECT category FROM `vendor_category` WHERE category='$category' and id!=$id")->result_array();
			
			if($check_already_category){
				$error="Please enter another category ".$category." is already in the system. ";
				$senddata['message']=$error;
				return json_encode($senddata);
			}
					
			$user_data=array();
			//$user_data['name']=$name;
			$user_data['category']=$category;
			
			//$already_category=$this->db->query("SELECT category FROM `vendor_category` WHERE category = '$category' ")->result_array();
			if($id){
				//$user_data['updated']=gettime4db();
				//print_r($user_data);
				//exit;
				$this->db->where('id',$id);
				$this->db->update('vendor_category',$user_data);
				
				$senddata['redurl']	=	site_url('administrator/vendors/category/view/');
				$senddata['status']	=	2; 
				$senddata['message']	=	"Vendor category is Updated Successfully.";
				
				return json_encode($senddata);
			}else{
				//$user_data['added']=gettime4db();
				$user_data['status']=1;
				//$user_data['id']=$id;
				//exit;
				$this->db->insert('vendor_category',$user_data);
				
				$senddata['redurl']	=	site_url('administrator/vendors/category/view/');
				$senddata['status']	=	1; 
				$senddata['message']	=	"Vendor category is Added Successfully.";
				
				return json_encode($senddata);
			}
		}
		
		
		
		
		public function GetVendor($id=0,$status=0)
		{
			if(!empty($id))
			{
				$temp	=	$this->db->query("SELECT * FROM `vendor` where id = '$id'")->result_array();
				if(!empty($temp))
				{
					return $temp[0];
				}else{
					return array();
				}
			}
		}
		
		public function GetVendorCategory($id=0,$status=0){
			if(!empty($id))
			{
				$temp	=	$this->db->query("SELECT * FROM `vendor_category` where id = '$id'")->result_array();
				if(!empty($temp))
				{
					return $temp[0];
				}else{
					return array();
				}
			}
		}
			
			
			
		public function list_vendor(){
			
			
			$statussort = $this->input->get("statussort");
			
			
			switch($statussort)
			{
				case "active":
					return $this->db->query("SELECT v.id,v.name,v.mobile,v.category,v.cardtype,v.id_no,v.status,v.added,v.updated,vc.category as vcat,vc.id as vid FROM `vendor` v join vendor_category vc on v.category=vc.id and v.status=1")->result_array();
					break;
				case "inactive":
					return $this->db->query("SELECT v.id,v.name,v.mobile,v.category,v.cardtype,v.id_no,v.status,v.added,v.updated,vc.category as vcat,vc.id as vid FROM `vendor` v join vendor_category vc on v.category=vc.id and v.status=0")->result_array();
					break;
				default:
					 return $this->db->query("SELECT v.id,v.name,v.mobile,v.category,v.cardtype,v.id_no,v.status,v.added,v.updated,vc.category as vcat,vc.id as vid FROM `vendor` v join vendor_category vc on v.category=vc.id")->result_array();
				// print_r($this->db->last_query());
					 //print_r($res);
					 //exit;
					 //return $res;
					
				break;
			}
		}
		
	
		
		
		
		public function list_category(){
			return  $this->db->query("SELECT id,category FROM `vendor_category`")->result_array();
		}
		/*
		public function list_active_user(){
			return  $this->db->query("SELECT * FROM `user` where status=1")->result_array();
		}
		
		public function list_inactive_user(){
			return  $this->db->query("SELECT * FROM `user` where status=0")->result_array();
		}
		*/

	}
?>