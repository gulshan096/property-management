<?php
	Class MasterModel extends CI_Model
		{
			function __construct()
				{
				   parent::__construct();
					//$this->load->helper('cookie');
				}
				
			public function addmaster($table)
				{
					$id            =	$this->input->post("id");
					$issubmit      =	$this->input->post("issubmit");
					$title		   =	$this->input->post("title");
					$metatag	   =	$this->input->post("metatag");  
					$description   =	$this->input->post("description");
					$parent		   =	$this->input->post("parent"); 
					
					
					    if(empty($parent)) { $parent = 0; }
					
						if(!empty($issubmit) && !empty($title))
							{
								$uarray = array();
									$uarray['title'] 	    =	$title;
									$uarray['metatag']  	=	$metatag;
									$uarray['description'] 	=	$description;
									$uarray['parent']    	=	$parent;
									
										if(empty($id))
											{
												$uarray['status']    	=	1;
												$uarray['added'] 	=	gettime4db();
												$uarray['updated'] 	=	0;
													$this->db->insert($table,$uarray);
							return	"
										<div class='alert alert-success'  role='alert'>
											<i class='material-icons icon-body mr-12pt'>check_circle</i>
											<div class='text-body'>$title is created successfully.</div>   
										</div>
									";		
											} else {
												$uarray['updated'] 	=	gettime4db();
													$this->db->where('id',$id);
													$this->db->update($table,$uarray);
							return	"
										<div class='alert alert-info'  role='alert'>
											<i class='material-icons icon-body mr-12pt'>check_circle</i>
											<div class='text-body'>$title is updated successfully.</div>   
										</div>
									";
											}
							}
					return "";		
				}
				
			public function getmaster($table,$id=0,$parent_id=0,$select="title,id",$status='na')
				{
					$this->db->select($select);	
							if(!empty($parent_id))
								{
									$this->db->where("parent",$parent_id);	
								} else {
									$this->db->where("parent",0);	
								}
								
							if($status!='na')	
								{
									$this->db->where("status",$status);	
								}
								
							if(!empty($id))
								{
									$this->db->where("id",$id);	
								}
								$this->db->from($table);
						$query	=	$this->db->get();
					$result =	$query->result();
						$sendresult = array();
							if(!empty($result))
								{
									foreach($result as $singi)
										{
											$singi	=	(array) $singi; 
											$singi['child'] =	$this->getmaster($table,0,$singi['id'],"title,id"); 
											$sendresult[]	=	$singi;
										}
								} else {
									$sendresult = $result;
								}	
					return $sendresult;
				}
				
			public function get_states($select="name,id")
				{
					$this->db->select($select);
						$this->db->where("status",1);	 
							return $this->db->from("states")->get()->result_array();
				}
				
			public function get_cities($select="name,id")
				{
					$this->db->select($select);
						$this->db->where("status",1);	 
							return $this->db->from("cities")->get()->result_array();
				}
		}			
?>