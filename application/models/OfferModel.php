<?php
     
	 Class OfferModel extends CI_Model
	       
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
			
		public function manageoffer()
				
		{		
					$offers	=	$this->input->post("offer");
					$offers['dis_type']= $this->input->post("group1");
					//echo "<pre>";
						//print_r($offers);
					//echo "</pre>";
					//exit;
					
					$senddata	=	array();
						$senddata['status']		=	0; 
						$senddata['message']	=	"Something Went wrong, Please try again later...";
						
						
						// return json_encode($senddata);
					
					
				
					
					
						$offers_code	=	$offers['code'];
						$offer_id	=	$offers['offer_id'];
						$dis_value=0;
						if($offers['dis_type']=='percent'){
							$dis_value=$this->input->post('dis_percent');
						}else if($offers['dis_type']=='flat'){
							$dis_value=$this->input->post('dis_flat');
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

						//=$this->input->post('group1');

						
						$check_already	=	$this->db->query("SELECT code FROM `offer` WHERE code = '$offers_code' AND offer_id != '$offer_id'")->result_array();
						
							if(!empty($check_already))
								{
									$senddata['message']	=	"Offer Code($offers_code) is already on the System, Please create the new Code."; 
										return json_encode($senddata);
								}
					
					
						if(!empty($offers))
							{
								$offers["start_date"]    =	date('Y-m-d',strtotime($offers["start_date"]));
								$offers["end_date"]		 =  date('Y-m-d',strtotime($offers["end_date"]));
								
								
									if($offers["end_date"]<$offers["start_date"])
										{
											$senddata['message']	=	"Please check End Date, Its should not be beofre Start Date."; 
												return json_encode($senddata);
										}
								


								if(!empty($offers['offer_id']))
									{
										$offers['updated']	=	gettime4db();
										$this->db->where('offer_id',$offers['offer_id']);	
										$this->db->update('offer',$offers);
										
                                         	
									$senddata['redurl']	=	site_url('administrator/offer'); 
									$senddata['status']	=	2; 
									$senddata['message']	=	"Offer Code($offers_code) is Updated Successfully."; 
										return json_encode($senddata);
										
									} else {
										
										//exit;
										
									$offers['status']=1;
									$offers['added']	=	gettime4db();
									$offers['updated']=0;

									$this->db->insert('offer',$offers);	
											
									$senddata['status']	=	1; 
									$senddata['redurl']	=	site_url('administrator/offer'); 
									$senddata['message']	=	"Offer Code($offers_code) is Created Successfully."; 
										return json_encode($senddata);
											
											
									
											
									}
							}
					
					
						
						
		}
				
		 public function GetOffer($id=0,$status=0)
				{
					
					//print_r($id);exit;
					//print_r("called");
					//exit;
					if(!empty($id))
						{
							$temp	=	$this->db->query("SELECT * FROM `offer` where offer_id = '$id'")->result_array();
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
								$this->db->from("offer");
							//print_r($this->db->get()->result_array());
							//exit;
					return $this->db->get()->result_array();
				}
				
				public function list_offer(){
					return  $this->db->query("SELECT * FROM `offer`")->result_array();

				}
		}
?>