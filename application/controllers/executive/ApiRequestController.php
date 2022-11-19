<?php 
    
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	require APPPATH . 'libraries/RestController.php';
	require APPPATH . 'libraries/Format.php';
	use chriskacerguis\RestServer\RestController;
	
	class ApiRequestController extends RestController
	{
		function __construct()
				{
					parent::__construct();
					   
				    $this->load->model('AuthenticationModel');
					$this->load->model('user/RequestModel');
					$this->load->model('SubadminModel');
					$this->load->model('BookingModel');
						
				}
		
          public function services_request_get()
		  {
			   
			             $checklogin =  $this->AuthenticationModel->check_mob_exe();
					   
					    if(!empty($checklogin['ex_id']))
						{
						    $data = array();
							$seo = array();
							$seo['title']		=	"Admin Dashboard - ".APP_NAME;
							$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
							$data['seo']	    =	$seo;
							// $data['openform']   =	$id; 
							
							$curuserdata               =   $this->SubadminModel->getexecutiveProfile();
							
							$data['curuserdata'] = $curuserdata;
							$property_id = $curuserdata['property_id'];
							$data['get_property']   =   $this->BookingModel->ex_pro_list($property_id);
							$data['service_request_list ']               =   $this->RequestModel->service_request($property_id);
							
							$this->response([
							'status' => TRUE,
							'message' => 'Success! all complaint list .',
							'data' => $data
							
							],
							RestController::HTTP_OK
							);
						}
						else
						{
						    $this->response("Error! login are required.", RestController::HTTP_BAD_REQUEST);	
						}	
				   
		  }


          public function leave_request_get()
		  {
			   
			             $checklogin =  $this->AuthenticationModel->check_mob_exe();
					   
					    if(!empty($checklogin['ex_id']))
						{
						    $data = array();
							$seo = array();
							$seo['title']		=	"Admin Dashboard - ".APP_NAME;
							$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
							$data['seo']	    =	$seo;
							// $data['openform']   =	$id; 
							
							$curuserdata               =   $this->SubadminModel->getexecutiveProfile();
							
							$data['curuserdata'] = $curuserdata;
							$property_id = $curuserdata['property_id'];
							$data['get_property']   =   $this->BookingModel->ex_pro_list($property_id);
							$data['leave_request_list ']               =   $this->RequestModel->service_request($property_id);
							
							$this->response([
							'status' => TRUE,
							'message' => 'Success! all leave request list .',
							'data' => $data
							
							],
							RestController::HTTP_OK
							);
						}
						else
						{
						    $this->response("Error! login are required.", RestController::HTTP_BAD_REQUEST);	
						}	
				   
		  }			  

          public function service_manage_get($complaint_id)
          {
			            $checklogin =  $this->AuthenticationModel->check_mob_exe();
					   
					    if(!empty($checklogin['ex_id']))
						{
						 
					    $data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	    =	$seo;
						
						$curuserdata               =   $this->SubadminModel->getexecutiveProfile();
						
						$data['curuserdata'] = $curuserdata;
					    $property_id = $curuserdata['property_id'];
						
						
						$data['complaint_detail']  =        $this->RequestModel->complaint_detail($complaint_id);
						
						
						$this->response([
							'status' => TRUE,
							'message' => 'Success! complaints resolve  .',
							'data' => $data
							
							],
							RestController::HTTP_OK
							);
						
						}
						else
						{
						    $this->response("Error! login are required.", RestController::HTTP_BAD_REQUEST);	
						}	
						
					
		  }	

          public function manage_complaints_post()
		  {
			           
			   $checklogin =  $this->AuthenticationModel->check_mob_exe();	
			   
			   $check =   $this->input->post();
                if(!empty($checklogin['ex_id']))
				{
					if(!empty($check))  
					{
						 $maintenance_id      =	$this->input->post("maintenance_id"); 
			            
						$property            =	$this->input->post("property_id");
						$room_no             =  $this->input->post("room_id");
					    $ven_category        =  $this->input->post('ven_cat_id');
						$ven_id              =  $this->input->post("ven_id");
						$executive           =	$checklogin['ex_id'];
						$technician          =	$this->input->post("technician");
						$tenant_id           =	$this->input->post("tenant_id");
						$complaint_id        =	$this->input->post("complaint_id");
						
						$start_time          =	$this->input->post("start_time");
						$start_date          =	$this->input->post("start_date");
						$end_time            =	$this->input->post("end_time");
						
					   $data['complaint_accept'] = 	$this->RequestModel->manage_complaints_mob($maintenance_id,$property,$room_no,$ven_category, $executive,$technician,$tenant_id,$complaint_id,$start_time,$start_date,$end_time); 
                       $this->response([
							'status' => TRUE,
							'message' => 'Success! complaints accepted .',
							'data' => $data
							
							],
							RestController::HTTP_OK
							);      
					   
					}
					else
					{
						 $this->response("Error! all field are  required.", RestController::HTTP_BAD_REQUEST);
					}
					
				   
				}
				else
				{
					$this->response("Error! login are required.", RestController::HTTP_BAD_REQUEST);
				}
				   
		  }


          public function rsolve_list_get()
          {
			$checklogin =  $this->AuthenticationModel->check_mob_exe();
					   
					    if(!empty($checklogin['ex_id']))
						{
						 
					    $data = array();
						$seo = array();
						$seo['title']		=	"Admin Dashboard - ".APP_NAME;
						$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
						$data['seo']	    =	$seo;
						
						$curuserdata               =   $this->SubadminModel->getexecutiveProfile();
						
						$data['curuserdata'] = $curuserdata;
					    $property_id = $curuserdata['property_id'];
						
						
						$data['list_maintenance']  =        $this->RequestModel->list_maintenance($property_id);
						
						
						$this->response([
							'status' => TRUE,
							'message' => 'Success! maintenance list  .',
							'data' => $data
							
							],
							RestController::HTTP_OK
							);
						
						}
						else
						{
						    $this->response("Error! login are required.", RestController::HTTP_BAD_REQUEST);	
						}	  
			  
		  }		  
	}

?>