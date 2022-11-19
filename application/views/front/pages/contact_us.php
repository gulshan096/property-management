<div class="ps-home ps-home--1">
	<div class="ps-home__content">
		<div class="container-fluid p-0">
			<div class="ps-delivery ps-delivery--info">
				<div class="ps-delivery__text">
					<h1>Contact Us</h1>
				</div>
			</div>
		</div>
		<div class="container">
			<section class="ps-section--featured inner">
				<div class="ps-section__content">
					<div class="row">
						<div class="col-12 col-md-8">
							<h3 class="mb-5">For Any Query fill the Form below, We will get back to ASAP.</h3>
							<form action="<?php echo site_url("front/search"); ?>" class="advance_search_frm" method="post">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="label_ry"><i class='fa fa-user'></i> Your Name</label>
											<input type="text" required class="form-control" placeholder="Entet Your Name" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="label_ry"><i class='fa fa-envelope'></i> Email</label>
											<input required type="email" class="form-control" placeholder="Entet Your Name" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="label_ry"><i class='fa fa-phone'></i> Mobile</label>
											<input required type="email" class="form-control" placeholder="Entet Your Name" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="label_ry">Inquiry For</label>
											<select class="form-control" name="for">
												<option value="Aundh">General</option>
												<option value="Bibvewadi">Hostel</option>
												<option value="Shivajinagar">Career</option>
												<option value="Shivajinagar">Booking</option>
												<option value="Shivajinagar">Other</option>
											</select>
										</div>	
									</div>	
									<div class="col-md-6">
										<div class="form-group">
											<label class="label_ry">Move From</label>
											<input type="text" class="form-control datepicker-here" name="movefrom" />
										</div>	
									</div>	
									<div class="text-center mb-3" style="width:100%;">
										<button class="btn btn-lg btn-success"><i class="fa fa-send"></i> Send Request</button>
									</div>
								</div>
							</form>
						</div>
						<div class="col-12 col-md-4">
							<style>
								.widgets_ry {
									padding: 15px 20px; 
									color: #fff; 
									border-radius: 5px; 
									margin-bottom: 25px;
									text-align:center;
								}
							</style>
							<div class="form-group">
								<p>&nbsp;</p>
								<p>&nbsp;</p>
								<div class="widgets_ry" style="background-color: #003631; ">
									<i class="fa fa-envelope"></i><br />
									<a href="tel:+91 8448448421">+91 8448448421</a>
								</div>
								<div class="widgets_ry" style="background-color: #C69024; ">
									<i class="fa fa-mobile"></i><br />
									<a href="tel:+91 8448448421">+91 8448448421</a>
								</div>
								<div class="widgets_ry" style="background-color: #181817; ">
									<i class="fa fa-map"></i><br />
									Kothrud Pune
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>