<?php
	Class StatusModel extends CI_Model
		{
			function __construct()
				{
				   parent::__construct();
					//$this->load->helper('cookie');
				}
				
			public function status(){
				//print_r("I m getting called++++++++++++++++++++++++++++++++++++++");
				$t	=	$this->input->post('t');	
				$i	=	$this->input->post('i');	
				$s	=	$this->input->post('s');	
				$v	=	$this->input->post('v');
				$array=array();
				$array['status']=$s;
				$this->db->where($i,$v);
				$this->db->update($t,$array);

				//$this->db->query("update $t set status=$s where $i='$v'")->result_array();
			}
		}
?>