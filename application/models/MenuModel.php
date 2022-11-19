<?php

	Class MenuModel extends CI_Model
	{
			
		function __construct()
		{
			parent::__construct();
		}
			
		        public function managemenu()
				{
					
			       $meal_id        =    $this->input->post('meal_id');
			       $property_id    =    $this->input->post('property_id');
			       $mealtype       =    $this->input->post('mealtype');
			       $mealitem       =    $this->input->post('mealitem');
			       $price          =    $this->input->post('price');
				   $status = 1;
			
					$senddata	=	array();
					$senddata['status']		=	0;
					$senddata['message']	=	"Something Went wrong, Please try again later...";
			
						if(empty($meal_id))
						{
							$foodmenu = array();
							for($i = 0;  $i < count($mealitem); $i++)
							{
								$foodmenu = array(
									'mealitem' => $mealitem[$i],
									'price' => $price[$i],
									'mealtype' => $mealtype,
									'property_id' => $property_id,
									'status'      => $status,
								);
								
								$this->db->insert('menu',$foodmenu);
							}
					
								$senddata['status']	=	1;
								$senddata['redurl']	=	site_url('administrator/food/viewall');
								$senddata['message']	=	"Food is Added Successfully.";
								return json_encode($senddata);
						} 
						else 
						{
					            $foodmenu = array();
								$foodmenu = array(
									'mealitem' => $mealitem,
									'price' => $price,
									'mealtype' => $mealtype,
									'property_id' => $property_id,
									'status'      => $status,
								);
								
								$this->db->where('meal_id',$meal_id);
								$this->db->update('menu',$foodmenu);
								
								$senddata['redurl']	=	site_url('administrator/food/viewall');
								$senddata['status']	=	2;
								$senddata['message']	=	"Food Updated is Updated Successfully.";
								return json_encode($senddata);
						}
											
				}
		public function GetMeal($id=0,$status=0)
		{
			if(!empty($id && $id!='add'))
			{
				$this->db->select(' property.pro_name , menu.* ' );
		
			    $this->db->from('menu');
				$this->db->join('property', 'property.property_id=menu.property_id', 'left');
				$this->db->where('menu.meal_id',$id);
				$query = $this->db->get(); 
				$data = $query->row_array();
                    
                return $data;
				
			}
		}
		
		public function managemenucard()
		{
				$card_id           =	$this->input->post("card_id");
			//print_r($banner_id);exit;
				$property_id       =	$this->input->post("property_id");
			
					$senddata	=	array();
						$senddata['status']		=	0;
					$senddata['message']	=	"Something Went wrong, Please try again later...";
				
					$exist_record	=	$this->db->query("SELECT * FROM `menu_card` WHERE card_id = $card_id")->result_array();
			$error="";
	
			if(!($exist_record)){
				if(!$property_id){
					$error="Please select Property";
				}else if(empty($_FILES['photo_inp']['name'])){
					$error="Please select image";
				}
				
				if($error){
					$senddata['message']=$error;
					return json_encode($senddata);
				}
			}
			
			$card=array();
			if(!empty($_FILES['photo_inp']['name'])){
					$this->load->helper('common_helper');
				
							$image		   =    uploadimgfile("photo_inp","./assets/img","pre");
					
					if($image['status']==0){
								$senddata['message']	=	$image['message'];
						return json_encode($senddata);
					}
					
					if($image['status']==1){
												$card['image']=$image['data']['name'];
					}
				}
			
			$card['property_id']=$property_id;
			
			if($exist_record){
				
				$exist_property	=	$this->db->query("SELECT * FROM `menu_card` WHERE property_id = $property_id and card_id != $card_id")->result_array();
				
				if(!empty($exist_property)){
						$senddata['message']	= "menu card for this property is already exist in the system.";
					return json_encode($senddata);
				}
				$this->db->where('card_id',$card_id);
				$this->db->update('menu_card',$card);
				$senddata['status']=2;
					$senddata['message']	= "menu card is updated successfully";
						$senddata['redurl']	=	site_url('administrator/food/card/viewall');
				return json_encode($senddata);
			}else{
						$exist_property	=	$this->db->query("SELECT * FROM `menu_card` WHERE property_id = $property_id")->result_array();
				
				if(!empty($exist_property)){
						$senddata['message']	= "menu card for this property is already exist in the system.";
					return json_encode($senddata);
				}
				$card['status']=1;
				$this->db->insert('menu_card',$card);
				$senddata['status']=2;
					$senddata['message']	= "menu card is added successfully";
						$senddata['redurl']	=	site_url('administrator/food/card/viewall');
				return json_encode($senddata);
			}
			
		}
				
		public function list_menuitem()
					{
			return  $this->db->query("SELECT p.pro_name,m.mealtype,m.meal_id,m.mealitem,m.price,m.tax,m.status FROM `menu` m join property p on m.property_id=p.property_id")->result_array();
		}
		
		public function list_menu_card(){
			return  $this->db->query("SELECT p.pro_name,m.image,m.status,m.card_id FROM `menu_card` m join property p on m.property_id=p.property_id")->result_array();
		}
		
		public function GetMenuCard($id){
			if(!empty($id) && $id!='add')
			{
						$temp	=	$this->db->query("SELECT * FROM `menu_card` where card_id = $id")->result_array();
				if(!empty($temp))
				{
					return $temp[0];
				}else{
					return array();
				}
				}
		}
		
	
	}
?>