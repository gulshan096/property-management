
		<div class="ps-home ps-home--1">
			<div class="ps-home__content">
				<section class="ps-content-mobile">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<form action="<?php echo site_url("front/search"); ?>" class="advance_search_frm" method="GET">
									<div class="form-group">
										<select class="form-control sf_city_inp" name="city">
											<option value="">Select City</option>
											<option value="AnyCity">Any City</option>
											<option value="Bengaluru">Bengaluru</option>
											<option value="Chennai">Chennai</option>
											<option value="Coimbatore">Coimbatore</option>
											<option value="Delhi">Delhi</option>
											<option value="Mumbai">Mumbai</option>
											<option value="Hyderabad">Hyderabad</option>
											<option value="Indore">Indore</option>
											<option value="Greater Noida">Greater Noida</option>
											<option value="Pune">Pune</option>
											<option value="Ahmedabad">Ahmedabad</option>
											<option value="Gurgaon">Gurgaon</option>
											<option value="Jaipur">Jaipur</option>
										</select>
									</div>
									<div class="form-group">
										<select class="form-control sf_area_inp" name="area">
											<option value="">Select Area</option>
											<option value="AnyArea">Any Area</option>
											<option value="Bibvewadi">Bibvewadi</option>
											<option value="Shivajinagar">Shivaji Nagar</option>
											<option value="Hingne">Hingne Khurd</option>
											<option value="Karve">Karve Nagar</option>
										</select>
									</div>
									<div class="form-group">
										<select class="form-control sf_for_inp" name="for">
											<option value="">For</option>
											<option value="ForAny">Any</option>
											<option value="Girls">Girls</option>
											<option value="Boys">Boys</option>
											<option value="Employee">Employee</option>
											<option value="Family">Family</option>
										</select>
									</div>
									<div class="form-group">
										<input type="text" class="form-control datepicker-here" value="<?php echo $this->input->get("movefrom"); ?>" name="movefrom" autocomplete="off" placeholder="Move From" />
									</div>
									<div class="text-center">
										<button class="btn">Search</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</section>
				
				<section class="ps-content-mobile">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="ps-content__box">
									<div class="owl-carousel" data-owl-auto="true" data-owl-hover-pause="false" data-owl-loop="true" data-owl-speed="4000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
										<div class="ps-banner">
											<img class="ps-banner__image" src="<?php echo base_url("assets/front/"); ?>img/mobile-slide1.jpg" alt="" />
										</div>
										<div class="ps-banner">
											<img class="ps-banner__image" src="<?php echo base_url("assets/front/"); ?>img/mobile-slide2.jpg" alt="" />
										</div>
										<div class="ps-banner">
											<img class="ps-banner__image" src="<?php echo base_url("assets/front/"); ?>img/mobile-slide3.jpg" alt="" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<section class="ps-content-mobile">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="ps-content__box">
									<h3>Location</h3>
								</div>
								<div class="ps-block__product">
									<div class="row m-0">
										<div class="col-3 col-lg-3 p-0">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<a href="#">
														<img src="<?php echo base_url("assets/front/"); ?>img/cities/bengaluru.png" alt="" />
														<b>Bengaluru</b>
													</a>
												</div>
											</div>
										</div>
										<div class="col-3 col-lg-3 p-0">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<a href="#">
														<img src="<?php echo base_url("assets/front/"); ?>img/cities/chennai.png" alt="" />
														<b>Chennai</b>
													</a>
												</div>
											</div>
										</div>
										<div class="col-3 col-lg-3 p-0">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<a href="#">
														<img src="<?php echo base_url("assets/front/"); ?>img/cities/coimbatore.png" alt="" />
														<b>Coimbatore</b>
													</a>
												</div>
											</div>
										</div>
										<div class="col-3 col-lg-3 p-0">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<a href="#">
														<img src="<?php echo base_url("assets/front/"); ?>img/cities/delhi.png" alt="" />
														<b>Delhi</b>
													</a>
												</div>
											</div>
										</div>
										<div class="col-3 col-lg-3 p-0">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<a href="#">
														<img src="<?php echo base_url("assets/front/"); ?>img/cities/mumbai.png" alt="" />
														<b>Mumbai</b>
													</a>
												</div>
											</div>
										</div>
										<div class="col-3 col-lg-3 p-0">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<a href="#">
														<img src="<?php echo base_url("assets/front/"); ?>img/cities/hyderabad.png" alt="" />
														<b>Hyderabad</b>
													</a>
												</div>
											</div>
										</div>
										<div class="col-3 col-lg-3 p-0">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<a href="#">
														<img src="<?php echo base_url("assets/front/"); ?>img/cities/indore.png" alt="" />
														<b>Indore</b>
													</a>
												</div>
											</div>
										</div>
										<div class="col-3 col-lg-3 p-0">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<a href="#">
														<img src="<?php echo base_url("assets/front/"); ?>img/cities/noida.png" alt="" />
														<b>Noida</b>
													</a>
												</div>
											</div>
										</div>
										<div class="col-3 col-lg-3 p-0">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<a href="#">
														<img src="<?php echo base_url("assets/front/"); ?>img/cities/pune.png" alt="" />
														<b>Pune</b>
													</a>
												</div>
											</div>
										</div>
										<div class="col-3 col-lg-3 p-0">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<a href="#">
														<img src="<?php echo base_url("assets/front/"); ?>img/cities/ahmedabad.png" alt="" />
														<b>Ahmedabad</b>
													</a>
												</div>
											</div>
										</div>
										<div class="col-3 col-lg-3 p-0">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<a href="#">
														<img src="<?php echo base_url("assets/front/"); ?>img/cities/gurgaon.png" alt="" />
														<b>Gurgaon</b>
													</a>
												</div>
											</div>
										</div>
										<div class="col-3 col-lg-3 p-0">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<a href="#">
														<img src="<?php echo base_url("assets/front/"); ?>img/cities/jaipur.png" alt="" />
														<b>Jaipur</b>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<section class="ps-content-mobile">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="ps-content__box mb-5">
									<h3>Our Safety Measures</h3>
								</div>
								<div class="ps-content__box">
									<div class="owl-carousel" data-owl-auto="true" data-owl-hover-pause="false" data-owl-loop="true" data-owl-speed="4000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
										<div class="ps-banner">
											<img class="ps-banner__image" src="<?php echo base_url("assets/front/"); ?>img/mobile-slide1.jpg" alt="" />
										</div>
										<div class="ps-banner">
											<img class="ps-banner__image" src="<?php echo base_url("assets/front/"); ?>img/mobile-slide2.jpg" alt="" />
										</div>
										<div class="ps-banner">
											<img class="ps-banner__image" src="<?php echo base_url("assets/front/"); ?>img/mobile-slide3.jpg" alt="" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<section class="ps-content-mobile">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="ps-content__box mb-5">
									<h3>Featured</h3>
								</div>
								<div class="ps-content__box">
									<div class="owl-carousel" data-owl-auto="true" data-owl-hover-pause="false" data-owl-loop="true" data-owl-speed="4000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
										<div class="ps-banner">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<img src="<?php echo base_url("assets/front/"); ?>img/locations-img1.jpg" alt="" />
												</div>
												<div class="ps-product__content">
													<h5>Lisbon House <span>Pune</span></h5>
													<span class="ps-product__price"><i class="fa fa-rupee"></i> 12,500.00</span>
												</div>
											</div>
										</div>
										<div class="ps-banner">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<img src="<?php echo base_url("assets/front/"); ?>img/locations-img2.jpg" alt="" />
												</div>
												<div class="ps-product__content">
													<h5>Happy Suites <span>Bengaluru</span></h5>
													<span class="ps-product__price"><i class="fa fa-rupee"></i> 14,000.00</span>
												</div>
											</div>
										</div>
										<div class="ps-banner">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<img src="<?php echo base_url("assets/front/"); ?>img/locations-img3.jpg" alt="" />
												</div>
												<div class="ps-product__content">
													<h5>Corner House <span>Chennai</span></h5>
													<span class="ps-product__price"><i class="fa fa-rupee"></i> 10,500.00</span>
												</div>
											</div>
										</div>
										<div class="ps-banner">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<img src="<?php echo base_url("assets/front/"); ?>img/locations-img4.jpg" alt="" />
												</div>
												<div class="ps-product__content">
													<h5>Hope Valley <span>Delhi</span></h5>
													<span class="ps-product__price"><i class="fa fa-rupee"></i> 13,000.00</span>
												</div>
											</div>
										</div>
										<div class="ps-banner">
											<div class="ps-product">
												<div class="ps-product__thumbnail">
													<img src="<?php echo base_url("assets/front/"); ?>img/locations-img5.jpg" alt="" />
												</div>
												<div class="ps-product__content">
													<h5>Vaachi Homes <span>Indore</span></h5>
													<span class="ps-product__price"><i class="fa fa-rupee"></i> 11,500.00</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<section class="ps-content-mobile">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="ps-content__box mb-5">
									<h3>Frequently Asked Question</h3>
								</div>
								<div class="ps-content__box">
									<div class="accordion" id="accordionExample">
										<div class="card">
											<div class="card-header" id="headingOne">
												<h2>
													<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
														Lorem ipsum dolor sit amet
													</button>
												</h2>
											</div>

											<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
												<div class="card-body">
													Ut tincidunt a mauris nec semper. Proin id facilisis velit. Suspendisse varius purus et est tincidunt, vitae auctor sem tincidunt.
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="headingTwo">
												<h2>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
														Lorem ipsum dolor sit amet
													</button>
												</h2>
											</div>
											<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
												<div class="card-body">
													Ut tincidunt a mauris nec semper. Proin id facilisis velit. Suspendisse varius purus et est tincidunt, vitae auctor sem tincidunt.
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="headingThree">
												<h2>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
														Lorem ipsum dolor sit amet
													</button>
												</h2>
											</div>
											<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
												<div class="card-body">
													Ut tincidunt a mauris nec semper. Proin id facilisis velit. Suspendisse varius purus et est tincidunt, vitae auctor sem tincidunt.
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="headingFour">
												<h2>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
														Lorem ipsum dolor sit amet
													</button>
												</h2>
											</div>
											<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
												<div class="card-body">
													Ut tincidunt a mauris nec semper. Proin id facilisis velit. Suspendisse varius purus et est tincidunt, vitae auctor sem tincidunt.
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<section class="ps-content-mobile">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="ps-content__box">
									<div class="property-owner-box">
										<h3>Are you a Property Owner?</h3>
										<p>Find Verified Tenants | Get Rent On Time | Get House Maintenance</p>
										<button class="btn">Partner with us</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				
			</div>
		</div>