<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	require APPPATH.'views/razorpay/Razorpay.php';
	use  Razorpay\Api\Api;
	
	class ReserveProperty extends CI_Controller
		{
			
			function __construct()
				{
					    parent::__construct();
		
						$this->load->model('PropertyModel');
						$this->load->model('user/BookingModel');
						$this->load->model('CommonModel');
						$this->load->model('user/UserLoginModel');
					
				}
		    
            public function book_property()
			{
				
				    $this->UserLoginModel->userchecklogin();
					
				    $key_id = 'rzp_test_9A8rfV1h8SH2Yc'; 
				    $secret =  '70pHGZfp4zlLqQcxLIyHtqRa'; 
					
					$booking_id             =   $this->input->post('booking_id'); 
    		        $property_id            =	$this->input->post("property_id");					
					$user_id                =   $this->input->post('user_id');
				    $room_id                =	$this->input->post("room_id");
					$from_date              =	$this->input->post("from_date");
					$to_date		        =   $this->input->post("to_date");
					$months                 =   $this->input->post("total_months"); 
                    $amount                 =   $this->input->post("amount");
					$bed_id                 =   $this->input->post("bed_id");
					
					
					
				       
						$booking=array(); 
						$booking['property_id']=$property_id;
						$booking['user_id']=$user_id;
						$booking['room_id']=$room_id;
						$booking['from_date']= date('Y/m/d', strtotime($from_date));
						$booking['to_date']=   $to_date;
						$booking['months']=$months;
						$booking['amount']= $amount;
						$booking['bed_id']= $bed_id;
						$booking['created_at']=   date('Y/m/d H:i:s ');
						
						
						
						
						
						
						$api = new Api($key_id , $secret);
				        $bookings = $api->order->create([ 
							
					     'receipt' => 'booking_'.time(),
					     'amount' =>   $amount*100,
					     'currency' => 'INR'
                         					 
					    ]);
						
				         $order_id  =  $bookings['id'];
			             $booking['order_id']= $order_id;
						 
						 $this->BookingModel->create_booking($booking);	
						 $curuser          =   $this->UserLoginModel->getUserProfile();
					
						
						$this->load->view('razorpay-checkout',['booking'=> $bookings , 'key_id'=>$key_id ,'secret' => $secret,'curuser'=> $curuser ]); 
							
			}			
				
		}
