
<h3>Do not press back payment is processing ....</h3>
<button id="rzp-button1" style="display:none;">Pay</button>
<a href="<?php echo base_url('user/front'); ?>">Back</a>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

var options = {    

"key": "<?php echo $key_id; ?>",  
"amount": "<?php echo $booking['amount']; ?>",   
"currency": "INR",    
"name": "POPCORNSTAY",    
"description": "Test Transaction",    
"image": "https://example.com/your_logo",    
"order_id": "<?php echo $booking['id']; ?>",   
"callback_url": "<?php echo base_url('executive/paymeny/status');  ?>",    
"prefill": {        
	"name": "<?php echo $curuser['name']; ?>",        
	"email": "<?php echo $curuser['email']; ?>",        
	"contact": "<?php echo $curuser['mobile']; ?>"   
   },    

	"notes": 
	{        
		"address": "Razorpay Corporate Office"    
	},    
	"theme": 
	{       
	 "color": "#3399cc"    
	}
    };

    var rzp1 = new Razorpay(options);
	document.getElementById('rzp-button1').onclick = function(e){ 
	rzp1.open();    
	e.preventDefault();
    }
    document.getElementById('rzp-button1').click();
</script>