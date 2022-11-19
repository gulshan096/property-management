<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	
	class Payment extends CI_Controller
		{
			
			function __construct()
				{
					    parent::__construct();
						$this->load->model('PaymentModel');
						$this->load->model('user/BookingModel');
						$this->load->model('user/UserLoginModel');
						$this->load->model('AuthenticationModel');
			
				}
		    
            public function paymentStatus()
			{
				  
                    $this->AuthenticationModel->checklogin_executive();
					
					$secret =  '70pHGZfp4zlLqQcxLIyHtqRa'; 
					$razorpay_payment_id  = $this->input->post('razorpay_payment_id');
					$razorpay_order_id  = $this->input->post('razorpay_order_id');
					$razorpay_signature  = $this->input->post('razorpay_signature');
					$secret = $secret; 
					
					$booking_detail =    $this->PaymentModel->bookingDetail($razorpay_order_id);
					
					$payment_amount =    $booking_detail['amount'];
                    $user_id        =    $booking_detail['user_id'];	
                    $property_id    =    $booking_detail['property_id'];
                    $room_id        =    $booking_detail['room_id'];
                    $booking_id     =    $booking_detail['booking_id'];
                    $bed_id         =    $booking_detail['bed_id'];	
                    $roomstatus     =    $booking_detail['status'];						

					$data = $razorpay_order_id . "|" . $razorpay_payment_id;
					$genrated_signature   =   hash_hmac("sha256", $data, $secret);
					
					if($genrated_signature == $razorpay_signature)
					{
						$transaction = ([
						  
						  'transaction_id' => $razorpay_payment_id,
						  'order_id' => $razorpay_order_id,
						  'status'   =>  1,
						  'payment_amount'   => $payment_amount,
						  'payment_mode'   =>  "razorpay",
						  'user_id'   =>      $user_id,
						  'property_id'   =>  $property_id,
						  'room_id'   =>  $room_id,
						  'booking_id'   =>  $booking_id,
						  'bed_id'   =>  $bed_id,
						 
						]);
						
						$tr = $this->PaymentModel->transaction($transaction);
						if($tr)
						{   
					        $room_status  =  $roomstatus;
							$this->BookingModel->bookingstatusupdate(1, $razorpay_order_id);
							$this->BookingModel->bedsStatusupdate($bed_id);
							$this->BookingModel->roomStatusupdate($room_status, $room_id);
						}
						else
						{
							
						}
						
						return redirect('executive/Payment/paymentNotification');;
						
					}
					else
					{
						echo "payment is failed";
					}	
					
					
			}	

            public function paymentNotification()
			{
				$this->load->view('payment-notify');
			}			
				
		}
