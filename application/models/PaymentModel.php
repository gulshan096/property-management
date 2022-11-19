<?php

Class PaymentModel extends CI_Model
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
			

			public function bookingDetail($razorpay_order_id)
			{
				
				$this->db->select('booking.amount,
				booking.user_id,
				booking.property_id,
				booking.room_id,
				booking.booking_id,
				booking.bed_id,
				room.status');
			
				$this->db->join('room','room.id = booking.room_id','left');
				$this->db->where('order_id',$razorpay_order_id);
			    $query = $this->db->get('booking');
			    $data = $query->row_array();
	
				return $data;
			}			
				
			public function transaction($transaction)
			{
				$data  = $this->db->insert('transactions', $transaction);
				
				return $data;
			}
			
			
			
		}
?>