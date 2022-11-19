<?php

	Class PackageModel extends CI_Model
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
				public function list_location()
				{
				    $this->db->select('city_id,name');
			        $query = $this->db->get('loc_city');
					$data = $query->result_array();
                    return $data;
				}
				
				public function list_property($loc)
				{
				  
				   
				   $this->db->where('pro_city',$loc);
				   $query = $this->db->get('property');
				   
				   $output = '<option value="">select</option>';
				   
				   foreach($query->result_array() as $row)
				   {
					  $output .='<option value="'.$row['property_id'].'">'.$row['pro_name'].'</option>'; 
				   }
				   return $output;
				
				   
				}
				
				
				public function getProperty($pro_id)
				{
					  $this->db->select('pro_address');    
					  $this->db->where('property_id',$pro_id);
					  $query = $this->db->get('property');
					  
						
					   foreach($query->result_array() as $row) 
					   {
						
						
					   }
					  
					   return $row;  
				}
    			public function create_package()
    		    {
    		          
    		          
    		            $package_id             =   $this->input->post('package_id'); 
						
						
    		            $property_id            =	$this->input->post("property_id");
					    $location_id            =   $this->input->post('location');
						$seater                        =	$this->input->post("seater");
						$price                  =	$this->input->post("price");
						  
					
						$senddata	=	array();
						$senddata['status']		=	0;
						$senddata['message']	=	"Something Went wrong, Please try again later...";
							
						$package=array();
						$package['property_id']=$property_id;
						$package['location']=$location_id;
						$package['seater']=$seater;
						$package['price']=$price;
				
				         
						
						if(empty($package_id))
						   {
							   
						        $package['created_at']=gettime4db();
								$package['status']=  1;
								//status 2 for booking confirm
							
							    $this->db->insert('packages',$package);
								
									$senddata['status']	=	1;
									$senddata['redurl']	=	site_url('administrator/package-pricing/viewall');
									$senddata['message']	=	"Package is Created Successfully.";
									return json_encode($senddata);
						    } 
						    else 
						    {
						            $package['updated_at']=gettime4db();
							        $this->db->where('package_id',$package_id);
							        $this->db->update('packages',$package);
						
									$senddata['redurl']	=	site_url('administrator/package-pricing/viewall');
									$senddata['status']	=	2;
									$senddata['message']	=	"package  is Updated Successfully.";
			
							        return json_encode($senddata);
						    }
    		    }
    		    public function list_package()
        		{
        		
		            $this->db->select('packages.package_id , property.property_id , property.pro_name ,
					                 packages.seater,packages.price,packages.location,packages.status,loc_city.name,
									 packages.created_at,packages.updated_at' );
                    $this->db->from('packages'); 
                    $this->db->join('property', 'property.property_id=packages.property_id', 'left');
					$this->db->join('loc_city', 'loc_city.city_id=packages.location', 'left');
                    $query = $this->db->get(); 
                    $data = $query->result_array();
                    
                    return $data;
        		}
    				
        		public function getPackage($id)
        		{
        		    
        		    $this->db->select('packages.package_id , property.property_id , property.pro_name ,packages.seater,packages.price,packages.location,packages.status,packages.created_at,packages.updated_at' );
                    $this->db->from('packages'); 
                    $this->db->join('property', 'property.property_id=packages.property_id', 'left');
                    $this->db->where('package_id',$id);
                    $query = $this->db->get(); 
                    $data = $query->row_array();
                    
                    return $data;
        		
        		}
						
        }
?>