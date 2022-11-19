<?php

	Class BookingModel extends CI_Model
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
				
    			public function create_booking($booking)
    		    {
    		       
    		           $data =  $this->db->insert('booking',$booking);
						
						return $data;
    		    }
				
				public function bookingstatusupdate($status, $razorpay_order_id)
				{
					$updatestatus = array('status' =>  $status);
					$this->db->where('order_id',$razorpay_order_id);
					$data = $this->db->update('booking',$updatestatus);
					return $data;				
				
				}
				
				public function bedsStatusupdate($bed_id)
				{
					$updatestatus = array('status' =>  1);
					$this->db->where('bed_id',$bed_id);
					$data = $this->db->update('beds',$updatestatus);
					return $data;
				}
				public function roomStatusupdate($room_status, $room_id)
				{
					$updatedstatus = $room_status + 1 ;
					
					$updatestatus = array('status' =>  $updatedstatus);
					$this->db->where('id',$room_id);
					$data = $this->db->update('room',$updatestatus);
					return $data;
				}
				
				
			
    		    
    			
        }
?>