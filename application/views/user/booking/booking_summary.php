    <?php
       $booking_detail  =  $this->input->post();
       
    ?>

   <?php
		$price = $booking_detail['price'];
		$oneper = $price/100;
		$tax    = 18*$oneper;
												
	?>
<div class="ps-home ps-home--1">
	<div class="ps-home__content">
		<div class="container">
			<section class="ps-section--featured">
				<h3 class="ps-section__title">Booking Summary</h3>
				<div class="ps-section__content">
				
				                
					<form action="<?php echo base_url('user/front/booking_save'); ?>" method="POST">
					   
					   
					    <input type="hidden" name="bed_id" value="<?php echo $booking_detail['bed_id']; ?>">
					    <input type="hidden" name="property_id" value="<?php echo $booking_detail['property_id']; ?>">
					    <input type="hidden" name="room_id" value="<?php echo $booking_detail['room_id']; ?>">
					    <input type="hidden" name="from_date" value="<?php echo $booking_detail['movefrom']; ?>">
						<input type="hidden" name="user_id" value="<?php echo $curuser['tenant_id']; ?>">
						<input type="hidden" name="amount" value="<?php echo !empty($booking_detail)?$price + $tax:""; ?>">
					   
						<div class="row m-0">
							<div class="col-12 col-md-8 p-0">
								
								<div class="ps-section__product">
									
									<div class="ps-product ps-product--standard">
										<div class="card mt-5" style="">
											<div class="row g-0">
												<div class="col-md-4">
													<img src="<?php echo base_url(""); ?><?php echo $booking_detail['pro_img'];  ?>" class="img-fluid rounded-start" alt="...">
												</div>
												<div class="col-md-8">
													<div class="card-body">
														<h4 class="card-title"><?php echo !empty($booking_detail)?$booking_detail['pro_name']:""; ?></h4>
														<p class="card-text"><?php echo !empty($booking_detail)?$booking_detail['pro_address']:""; ?></p>
														<p class="card-text"><small class="text-muted font-weight-bold">Deluxe <?php echo !empty($booking_detail)?$booking_detail['seater']:""; ?>  Beded Room</small></p>
													</div>
												</div>
											</div>
										</div>
										
										<div class="ps-product__content mt-5">
											<div class="ps-product__desc">
												<br />
												<p style=" text-align: justify;">
													Experience an age-old era redolent of Goan-Portuguese hues, encompassed by a coastal aura right here at The Figueiredo House. The Figueiredo House, built in the 1590s, predates the Taj Mahal by decades, making it a one-of-a-kind heritage treasure. The original architects of this regal house; The Jesuit Priests have designed this house intricately with each nook and crevice exuding comfort, luxury, and bliss. The house's extravagant interiors stand in studied contrast to the natural beauty of the paddy fields and coconut trees that surround it. The furniture has been made using teak wood by Goan artisans and carvers, the porcelain in the dining hall is intricately designed and the tiles used are from Italy.
												</p>
												
												<br />
											</div>
											
											<div class="ps-product__desc_icon">
												<span><i class="fa fa-television"></i>TV</span>
												<span><i class="fa fa-wifi"></i>WiFi</span>
												<span><i class="fa fa-trash"></i>Cleaning</span>
												<span><i class="fa fa-gamepad"></i>Gaming</span>
											</div>
											
										</div>
										<style>
										.yd, .sb{
											
											border-radius:10px;
											
										}
										</style>
									</div>
									<div class="ps-product ps-product--standard">
										<h3 class="text-center py-2 card-header">Enter Your Details</h3>
										<div class="row container p-5">
											<div class="col-md-4">
												<div class="form-group">
													<label class="label_ry">Full Name</label>
													<input type="text"  name="user_name" value="<?php echo $curuser['name']; ?>" class="form-control yd" readonly>
												</div>
											</div>
											
											<div class="col-md-4">
												<div class="form-group">
													<label class="label_ry">E-mail</label>
													<input type="email" value="<?php echo $curuser['email']; ?>" name="user_email" class="form-control yd " readonly>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="label_ry">Phone</label>
													<input type="text" value="<?php echo $curuser['mobile']; ?>" name="user_phone" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control yd"  readonly>
												</div>
											</div>
											   
										      <center>
											     <div class="propertybookingres" style="clear:both;"></div>
											     <div style="clear:both;"></div>
											     <button class="btn btn-primary btn-outline-primary p-3 sb" type="submit" style="font-size:18px;"> Complete Booking Request </button>
										      </center>
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
									.bdp{
										font-size:14px;
									}
								</style>
								
								<div style="padding: 20px 20px; background: #f5f5f5; margin: 20px; margin-top: 30px;">
									<h3>Your Booking Details</h3>
									
									<div class="row bg-white">
										<div class="col-md-12">
											<div class="form-group">
												<label class="label_ry font-weight-bold"><i class="fa fa-calendar"></i> Check-in Date</label>
												<p class="bdp"><?php  echo !empty($booking_detail)? date('d-M-Y  D',strtotime($booking_detail['movefrom'])): ""; ?></p>
											</div>
										</div>
										<div style="clear:both;"></div>
									</div>
									<div class="row bg-white my-3">
										<div class="col-md-12">
											<div class="form-group">
												<label class="label_ry font-weight-bold"><i class="fa fa-inr"></i> Price</label>
												<p class="bdp"><?php echo !empty($booking_detail)? $booking_detail['price']:""; ?></p>
											</div>
										</div>
										<div style="clear:both;"></div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="label_ry font-weight-bold"><i class="fa fa-inr"></i> Excluded charges</label>
												<p class="bdp">Goods & services tax</p>
												
												<span class="bdp">+ <?php echo !empty($booking_detail)?$tax:""; ?></span>
											</div>
										</div>
									</div>
									<div class="row bg-white my-3">
										<div class="col-md-12">
											<div class="form-group">
												<label class="label_ry font-weight-bold"><i class="fa fa-inr"></i>Payment Schedule</label>
												<p class="bdp">Before you stay you'll pay </p>
												<p class="bdp"><?php echo !empty($booking_detail)?$price."+".$tax:""; ?></p>
												<p class="bdp">INR <?echo !empty($booking_detail)?$price + $tax:""; ?></p>
											</div>
										</div>
										<div style="clear:both;"></div>
									</div>
									<div class="row bg-white my-3">
										<div class="col-md-12">
											<div class="form-group">
												<label class="label_ry font-weight-bold"><i class="fa fa-inr"></i>Description</label>
												<p class="bdp">
												In accordance with government guidelines to minimize transmission of the coronavirus (COVID-19), this property currently isn't accepting guests from certain countries on dates where such guidelines exist.
													In response to the coronavirus (COVID-19),  of guests and staff. Certain services and amenities may be reduced or unavailable as a result. </p>
											</div>
										</div>
										<div style="clear:both;"></div>
									</div>
								</div>
							</div>
							<div style="clear:both;"></div>
						</div>
					</form>
				</div>
			</section>
		</div>
	</div>