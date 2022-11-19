<?php
     
	 Class LearnModel extends CI_Model
	       
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
			/*public function GetOffer(){
				$this->db->select("*");
				$this->db->from("offer");
				return $this->db->get()->result_array();
			}*/
		public function managelearn()
				
		{		
		
					$learns	=$this->input->post("learn");
					$senddata	=	array(); 
						$senddata['status']		=	0; 
						$senddata['message']	=	"Something Went wrong, Please try again later..."; 
					
						// return json_encode($senddata);
					/*
						$offers_code	=	$offers['code'];
						$offer_id	=	$offers['offer_id'];
						$dis_value=0;
						if($offer['dis_type']=='percent'){
							$dis_value=$offers['dis_percent'];
						}else if($offer['dis_type']=='flat'){
							$dis_value=$offers['dis_flat'];
						}
						$offers['discount']=$dis_value;
                            /*if(!empty($this->input->post('dis_percent'))){
							$offers['discount']=$this->input->post('dis_percent');

							$offers['dis_type']="percent";
						}else{
							$offers['discount']=$this->input->post('dis_flat');
							$offers['dis_type']="flat";

						*/
						 //   echo "<script>console.log('Debug Objects: " . $offers['dis_type'] . "' );</script>";

						//=$this->input->post('group1');*/

					/*	
						$check_already	=	$this->db->query("SELECT code FROM `learn` WHERE code = ''")->result_array();
						
							if(!empty($check_already))
								{
									$senddata['message']	=	"Offer Code($offers_code) is already on the System, Please create the new Code."; 
										return json_encode($senddata);
								}
					*/
					//print_r($learns);
					//exit;
						if(!empty($learns))
							{
							$learns["password"]		 =  md5($learns["password"]);
								
								/*$learns["start_date"]    =	date('Y-m-d',strtotime($learns["start_date"]));
								$learns["password"]		 =  md5$learns["password"]	);
								

									if($learns["end_date"]<$learns["start_date"])
										{
											$senddata['message']	=	"Please check End Date, Its should not be beofre Start Date."; 
												return json_encode($senddata);
										}*/


								if(!empty($learns['id']))
									{
										$learns['update']	=	gettime4db();
										$this->db->where('id',$learns['id']);	
										$this->db->update('learn',$learns);


									$senddata['redurl']	=	site_url('administrator/learn'); 
									$senddata['status']	=	2; 
									$senddata['message']	=	"learn  is Updated Successfully."; 
										return json_encode($senddata);

									} else {
										//exit;
									$learns['status']=1;
									$learns['added']	=	gettime4db();
									$learns['update']=0;
									
									$this->db->insert('learn',$learns);	
											
									$senddata['status']	=	1; 
									$senddata['redurl']	=	site_url('administrator/learn'); 
									$senddata['message']	=	"learn id is Created Successfully.";
										return json_encode($senddata);
									}
							}
		}
			public function GetLearn($id=0,$status=0)
				{
					//print_r($id);exit;
					//print_r("called");
					//exit;
					if(!empty($id))
						{
							$temp	=	$this->db->query("SELECT * FROM `learn` where id = '$id'")->result_array();
								if(!empty($temp))
									{
										return $temp[0];
									}else{
										return array();
									}
									//return array();
						}
					$this->db->select("*");
						/*$keyword	=	$this->input->post('keyword');
							if(!empty($keyword))
								{
									$this->db->where(" lower(name) like '%$keyword%' ");
								}*/
							if(!empty($status))
								{
									$this->db->where("status",$status);
								}
								$this->db->from("learn");
							//print_r($this->db->get()->result_array());
							//exit;
					return $this->db->get()->result_array();
				}
				public function list_learn(){
					return  $this->db->query("SELECT * FROM `learn`")->result_array();

				}
		}
?>