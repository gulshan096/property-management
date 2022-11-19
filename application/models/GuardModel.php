<?php
     
	 Class GuardModel extends CI_Model
	       
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
			
				public function list_guard()
						
				{	

				   $this->db->select('guard.*, property.pro_name');
				   $this->db->join('property','property.property_id = guard.property_id','left');
				   $query = $this->db->get('guard')->result_array();
				   
				   return $query;
							
				}
				
				
				 public  function ex_guard_list($id , $property_id)
		{
			    $pid =   json_decode($property_id);
				$this->db->select('guard.*,property.pro_name,loc_city.name');
				$this->db->join('property','property.property_id=guard.property_id','left');
                $this->db->join('loc_city','loc_city.city_id=guard.city_id','left');
				$this->db->where_in('property.property_id', $pid);
                if(!empty($id))
				{
				 $this->db->where('guard.guard_id', $id);	
				}
                				
				$query = $this->db->get('guard')->result_array();
				 
				return $query;
		}


           public function ex_guard_credentials($guard_id , $password)
		   {
			   $data = array('password' => $password);
			   $this->db->where('guard_id', $guard_id);
			   $this->db->update('guard', $data);
		   }		   
					

		}
?>