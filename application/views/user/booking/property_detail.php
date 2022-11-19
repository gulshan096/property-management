<div class="ps-home ps-home--1">
	
	<div class="ps-home__content">
		
		<div class="container">
			<section class="ps-section--featured">
				<h3 class="ps-section__title"> <?php  echo $property_detail['pro_name']; ?>
				<p><?php  echo $property_detail['pro_address']; ?></p>
				</h3>
				<div class="ps-section__content">
					<div class="row m-0">
						<div class="col-12 col-md-8 p-0">
							<div class="ps-section__product">
								<div class="ps-product ps-product--standard">
								
									<div class="ps-product__thumbnail">
									<figure class="ps-product__image">
									  <img src="<?php echo base_url(""); ?><?php echo $property_detail['pro_img']  ?>" alt="" />
									</figure>
									<div class="ps-product__badge">
										<div class="ps-badge ps-badge--sale">Unisex</div>
									</div>
								</div>
								<div class="ps-product__content">
									<div class="ps-product__desc_icon">
										<span><i class="fa fa-television"></i>TV</span>
										<span><i class="fa fa-wifi"></i>WiFi</span>
										<span><i class="fa fa-trash"></i>Cleaning</span>
										<span><i class="fa fa-gamepad"></i>Gaming</span>
									</div>
									<div class="ps-product__desc">
										<br />
										<p style=" text-align: justify;">
											Experience an age-old era redolent of Goan-Portuguese hues, encompassed by a coastal aura right here at The Figueiredo House. The Figueiredo House, built in the 1590s, predates the Taj Mahal by decades, making it a one-of-a-kind heritage treasure. The original architects of this regal house; The Jesuit Priests have designed this house intricately with each nook and crevice exuding comfort, luxury, and bliss. The house's extravagant interiors stand in studied contrast to the natural beauty of the paddy fields and coconut trees that surround it. The furniture has been made using teak wood by Goan artisans and carvers, the porcelain in the dining hall is intricately designed and the tiles used are from Italy.
										</p>
										<br />
										<br />
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4 p-0">
						<style>
							.widgets_ry {
								padding: 15px 20px;
								color: #fff;
								border-radius: 5px;
								margin-bottom: 25px;
								text-align:center;
							}
						</style>
						
						<div style="padding: 20px 20px; background: #f5f5f5; margin: 20px; margin-top: 30px;">
							<h3>
							Pleace Select Room Type
							</h3>
							
							<form class="advance_search_frm" method="post" action="<?php echo base_url('user/front/your-detail'); ?>">
							
							
							<input type="hidden" " name="property_id"  value="<?php echo $property_detail['property_id']; ?>">
							<input type="hidden" name="pro_img"   value="<?php base_url(""); ?><?php echo $property_detail['pro_img']; ?>">
							
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="label_ry">Property</label>
											<input type="text" value="<?php echo $property_detail['pro_name']; ?>" name="pro_name" class="form-control bg-white" readonly>
											<input type="hidden" value="<?php echo $property_detail['pro_address']; ?>" name="pro_address" class="form-control">
										</div>
									</div>
									<div style="clear:both;"></div>
				                    <div class="col-md-12">
										<div class="form-group">
											<label class="label_ry">Room Type</label>
											<select class="form-control bg-white dropdown_filter" name="seater" id="seater" required>
												<option value="">Select</option>
												<option value="1">1 Bedded</option>
												<option value="2">2 Bedded</option>
												<option value="3">3 Bedded</option>
												<option value="4">4 Bedded</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group"> 
											<label class="label_ry">Rooms(available)</label>
											<select class="form-control bg-white dropdown_filter" name="room_id" id="rooms" required>
												<option value="">Select</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group"> 
											<label class="label_ry">Beds(available)</label>
											<select class="form-control bg-white dropdown_filter" name="bed_id" id="bed_no" required>
												<option value="">Select</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="label_ry">Price</label>
											<input name="price" required type="text" class="form-control bg-white"  id="room_price" readonly>
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label class="label_ry">Start Date </label>
											<input type="text" class="form-control datepicker-here bg-white" name="movefrom" required readonly>
										</div>
									</div>
									
									<div class="text-center mb-3" style="width:100%;">
										<button class="btn btn-lg btn-success" type="submit"><i class="fa fa-send"></i>Reserve</button>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="label_ry"> &nbsp; </label>
								
								<div class="widgets_ry" style="background-color: #003631; ">
									<i class="fa fa-shopping-cart"></i>
									<a href="#">Book Single Sharing @20,000 INR </a>
								</div>
								
								<div class="widgets_ry" style="background-color: #C69024; ">
									<i class="fa fa-shopping-cart"></i>
									<a href="#">Book Double Sharing @14,000 INR </a>
								</div>
								<div class="widgets_ry" style="background-color: #181817; ">
									<i class="fa fa-shopping-cart"></i>
									<a href="#">Book Triple Sharing @10,000 INR </a>
								</div>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>	
				</div>
			</div>
		</section>
	</div>
</div>


            <script>
			   $(document).ready(function(){
				  
				 $(document).on('change','#seater',function(){
					
					
					var seater = $('#seater').val();
					
					
					var propertyId = <?php echo $property_detail['property_id']  ?>;
					
					 $.ajax({
          
					  method:'POST',
					  url: "<?php echo base_url('user/front/getRoomDetail')  ?>",
					  data:{property_id:propertyId,seater:seater},
					  //dataType:"json",
					  success:function(data){
						  
						 $('#rooms').html(data);
						 //$('#room_price').val(data.price);
						 
					  }
					}); 
				}); 

               $(document).on('change','#rooms',function(){
					
					var room_id = $('#rooms').val();
					var propertyId = <?php echo $property_detail['property_id']  ?>;
					var seater = $('#seater').val();
					
					 $.ajax({
          
					  method:'POST',
					  url: "<?php echo base_url('user/front/getBeds')  ?>",
					  data:{property_id:propertyId,room_id:room_id,seater:seater},
					  dataType:"json",
					  success:function(data){
						  
						  //$('#book_room_id').val(data.id);
						  $('#bed_no').html(data);
						 
					  }
					}); 
				});


                $(document).on('change','#bed_no',function(){
					
					
					var bed_id = $('#bed_no').val();
					var propertyId = <?php echo $property_detail['property_id']  ?>;
					var room_id = $('#rooms').val();
					
					 $.ajax({
          
					  method:'POST',
					  url: "<?php echo base_url('user/front/getRoomPrice')  ?>",
					  data:{property_id:propertyId,room_id:room_id,bed_id:bed_id},
					  dataType:"json",
					  success:function(data){
						  
						  //$('#book_room_id').val(data.room_id);
						  $('#room_price').val(data.price);
						 
					  }
					}); 
				});

				
			   });
                
            </script>
			
			






