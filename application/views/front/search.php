
		
		<div class="ps-home ps-home--1">
			
			<div class="ps-home__content">
				
				<div class="container">
					<section class="ps-section--featured">
						<h3 class="ps-section__title">Search Property
						
							<small>
							
								<?php
										$get = $this->input->get();
											if(!empty($get))
												{
													$temp = "";
													foreach($get as $v)
														{
															if(!empty($v))
																{
																	$temp = $temp." $v,";
																}
														}
															echo rtrim($temp,",")." <a onclick='open_adv_search();' href='javascript:void(0);'><i class='fa fa-edit'></i></a> ";
												}
										
								?>
							
							</small>
						
						</h3>
						<div class="ps-section__content">
							<div class="row m-0">
								<div class="col-12 col-md-4 p-0">
									<div class="ps-section__product">
										<div class="ps-product ps-product--standard">
											<div class="ps-product__thumbnail">
												<figure class="ps-product__image"><img src="<?php echo base_url("assets/front/"); ?>img/locations-img1.jpg" alt="" /></figure>
												<div class="ps-product__badge">
													<div class="ps-badge ps-badge--sale">Unisex</div>
												</div>
											</div>
											<div class="ps-product__content">
												<h5 class="ps-product__title">Lisbon House <span>HSR Layout</span></h5>
												<div class="ps-product__meta">
													<span class="ps-product__price">Starting From <i class="fa fa-rupee"></i>9899 /mo</span>
												</div>
												<div class="ps-product__desc">
													<p>Rent Includes:</p>
												</div>
												<div class="ps-product__desc_icon">
													<span><i class="fa fa-television"></i>TV</span>
													<span><i class="fa fa-wifi"></i>WiFi</span>
													<span><i class="fa fa-trash"></i>Cleaning</span>
													<span><i class="fa fa-gamepad"></i>Gaming</span>
												</div>
												<div class="ps-product__desc">
													<p>- Single & Sharing Rooms</p>
													<p>- 1 Month Security Deposit</p>
												</div>
												<a href="<?php echo site_url('front/details'); ?>" class="ps-product__more">Know More</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-md-4 p-0">
									<div class="ps-section__product">
										<div class="ps-product ps-product--standard">
											<div class="ps-product__thumbnail">
												<figure class="ps-product__image"><img src="<?php echo base_url("assets/front/"); ?>img/locations-img2.jpg" alt="" /></figure>
												<div class="ps-product__badge">
													<div class="ps-badge ps-badge--sale">Boys</div>
												</div>
											</div>
											<div class="ps-product__content">
												<h5 class="ps-product__title">Happy Suites <span>Electronic City</span></h5>
												<div class="ps-product__meta">
													<span class="ps-product__price">Starting From <i class="fa fa-rupee"></i>6600 /mo</span>
												</div>
												<div class="ps-product__desc">
													<p>Rent Includes:</p>
												</div>
												<div class="ps-product__desc_icon">
													<span><i class="fa fa-television"></i>TV</span>
													<span><i class="fa fa-wifi"></i>WiFi</span>
													<span><i class="fa fa-trash"></i>Cleaning</span>
													<span><i class="fa fa-gamepad"></i>Gaming</span>
												</div>
												<div class="ps-product__desc">
													<p>- Single & Sharing Rooms</p>
													<p>- 1 Month Security Deposit</p>
												</div>
												<a href="<?php echo site_url('front/details'); ?>" class="ps-product__more">Know More</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-md-4 p-0">
									<div class="ps-section__product">
										<div class="ps-product ps-product--standard">
											<div class="ps-product__thumbnail">
												<figure class="ps-product__image"><img src="<?php echo base_url("assets/front/"); ?>img/locations-img3.jpg" alt="" /></figure>
												<div class="ps-product__badge">
													<div class="ps-badge ps-badge--sale">Girls</div>
												</div>
											</div>
											<div class="ps-product__content">
												<h5 class="ps-product__title">Corner House <span>BTM Layout</span></h5>
												<div class="ps-product__meta">
													<span class="ps-product__price">Starting From <i class="fa fa-rupee"></i>5800 /mo</span>
												</div>
												<div class="ps-product__desc">
													<p>Rent Includes:</p>
												</div>
												<div class="ps-product__desc_icon">
													<span><i class="fa fa-television"></i>TV</span>
													<span><i class="fa fa-wifi"></i>WiFi</span>
													<span><i class="fa fa-trash"></i>Cleaning</span>
													<span><i class="fa fa-gamepad"></i>Gaming</span>
												</div>
												<div class="ps-product__desc">
													<p>- Single & Sharing Rooms</p>
													<p>- 2 Month Security Deposit</p>
												</div>
												<a href="<?php echo site_url('front/details'); ?>" class="ps-product__more">Know More</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-md-4 p-0">
									<div class="ps-section__product">
										<div class="ps-product ps-product--standard">
											<div class="ps-product__thumbnail">
												<figure class="ps-product__image"><img src="<?php echo base_url("assets/front/"); ?>img/locations-img4.jpg" alt="" /></figure>
												<div class="ps-product__badge">
													<div class="ps-badge ps-badge--sale">Unisex</div>
												</div>
											</div>
											<div class="ps-product__content">
												<h5 class="ps-product__title">Hope Valley <span>HSR Layout</span></h5>
												<div class="ps-product__meta">
													<span class="ps-product__price">Starting From <i class="fa fa-rupee"></i>7500 /mo</span>
												</div>
												<div class="ps-product__desc">
													<p>Rent Includes:</p>
												</div>
												<div class="ps-product__desc_icon">
													<span><i class="fa fa-television"></i>TV</span>
													<span><i class="fa fa-wifi"></i>WiFi</span>
													<span><i class="fa fa-trash"></i>Cleaning</span>
													<span><i class="fa fa-gamepad"></i>Gaming</span>
												</div>
												<div class="ps-product__desc">
													<p>- Single & Sharing Rooms</p>
													<p>- 1 Month Security Deposit</p>
												</div>
												<a href="<?php echo site_url('front/details'); ?>" class="ps-product__more">Know More</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-md-4 p-0">
									<div class="ps-section__product">
										<div class="ps-product ps-product--standard">
											<div class="ps-product__thumbnail">
												<figure class="ps-product__image"><img src="<?php echo base_url("assets/front/"); ?>img/locations-img5.jpg" alt="" /></figure>
												<div class="ps-product__badge">
													<div class="ps-badge ps-badge--sale">Girls</div>
												</div>
											</div>
											<div class="ps-product__content">
												<h5 class="ps-product__title">Lisbon House <span>HSR Layout</span></h5>
												<div class="ps-product__meta">
													<span class="ps-product__price">Starting From <i class="fa fa-rupee"></i>4600 /mo</span>
												</div>
												<div class="ps-product__desc">
													<p>Rent Includes:</p>
												</div>
												<div class="ps-product__desc_icon">
													<span><i class="fa fa-television"></i>TV</span>
													<span><i class="fa fa-wifi"></i>WiFi</span>
													<span><i class="fa fa-trash"></i>Cleaning</span>
													<span><i class="fa fa-gamepad"></i>Gaming</span>
												</div>
												<div class="ps-product__desc">
													<p>- Single & Sharing Rooms</p>
													<p>- 2 Month Security Deposit</p>
												</div>
												<a href="<?php echo site_url('front/details'); ?>" class="ps-product__more">Know More</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-md-4 p-0">
									<div class="ps-section__product">
										<div class="ps-product ps-product--standard">
											<div class="ps-product__thumbnail">
												<figure class="ps-product__image"><img src="<?php echo base_url("assets/front/"); ?>img/locations-img6.jpg" alt="" /></figure>
												<div class="ps-product__badge">
													<div class="ps-badge ps-badge--sale">Boys</div>
												</div>
											</div>
											<div class="ps-product__content">
												<h5 class="ps-product__title">Lisbon House <span>HSR Layout</span></h5>
												<div class="ps-product__meta">
													<span class="ps-product__price">Starting From <i class="fa fa-rupee"></i>9800 /mo</span>
												</div>
												<div class="ps-product__desc">
													<p>Rent Includes:</p>
												</div>
												<div class="ps-product__desc_icon">
													<span><i class="fa fa-television"></i>TV</span>
													<span><i class="fa fa-wifi"></i>WiFi</span>
													<span><i class="fa fa-trash"></i>Cleaning</span>
													<span><i class="fa fa-gamepad"></i>Gaming</span>
												</div>
												<div class="ps-product__desc">
													<p>- Single & Sharing Rooms</p>
													<p>- 1 Month Security Deposit</p>
												</div>
												<a href="<?php echo site_url('front/details'); ?>" class="ps-product__more">Know More</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-md-4 p-0">
									<div class="ps-section__product">
										<div class="ps-product ps-product--standard">
											<div class="ps-product__thumbnail">
												<figure class="ps-product__image"><img src="<?php echo base_url("assets/front/"); ?>img/locations-img7.jpg" alt="" /></figure>
												<div class="ps-product__badge">
													<div class="ps-badge ps-badge--sale">Girls</div>
												</div>
											</div>
											<div class="ps-product__content">
												<h5 class="ps-product__title">Lisbon House <span>HSR Layout</span></h5>
												<div class="ps-product__meta">
													<span class="ps-product__price">Starting From <i class="fa fa-rupee"></i>10500 /mo</span>
												</div>
												<div class="ps-product__desc">
													<p>Rent Includes:</p>
												</div>
												<div class="ps-product__desc_icon">
													<span><i class="fa fa-television"></i>TV</span>
													<span><i class="fa fa-wifi"></i>WiFi</span>
													<span><i class="fa fa-trash"></i>Cleaning</span>
													<span><i class="fa fa-gamepad"></i>Gaming</span>
												</div>
												<div class="ps-product__desc">
													<p>- Single & Sharing Rooms</p>
													<p>- 1 Month Security Deposit</p>
												</div>
												<a href="<?php echo site_url('front/details'); ?>" class="ps-product__more">Know More</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-md-4 p-0">
									<div class="ps-section__product">
										<div class="ps-product ps-product--standard">
											<div class="ps-product__thumbnail">
												<figure class="ps-product__image"><img src="<?php echo base_url("assets/front/"); ?>img/locations-img8.jpg" alt="" /></figure>
												<div class="ps-product__badge">
													<div class="ps-badge ps-badge--sale">Boys</div>
												</div>
											</div>
											<div class="ps-product__content">
												<h5 class="ps-product__title">Lisbon House <span>HSR Layout</span></h5>
												<div class="ps-product__meta">
													<span class="ps-product__price">Starting From <i class="fa fa-rupee"></i>7500 /mo</span>
												</div>
												<div class="ps-product__desc">
													<p>Rent Includes:</p>
												</div>
												<div class="ps-product__desc_icon">
													<span><i class="fa fa-television"></i>TV</span>
													<span><i class="fa fa-wifi"></i>WiFi</span>
													<span><i class="fa fa-trash"></i>Cleaning</span>
													<span><i class="fa fa-gamepad"></i>Gaming</span>
												</div>
												<div class="ps-product__desc">
													<p>- Single & Sharing Rooms</p>
													<p>- 2 Month Security Deposit</p>
												</div>
												<a href="<?php echo site_url('front/details'); ?>" class="ps-product__more">Know More</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-md-4 p-0">
									<div class="ps-section__product">
										<div class="ps-product ps-product--standard">
											<div class="ps-product__thumbnail">
												<figure class="ps-product__image"><img src="<?php echo base_url("assets/front/"); ?>img/locations-img1.jpg" alt="" /></figure>
												<div class="ps-product__badge">
													<div class="ps-badge ps-badge--sale">Unisex</div>
												</div>
											</div>
											<div class="ps-product__content">
												<h5 class="ps-product__title">Lisbon House <span>HSR Layout</span></h5>
												<div class="ps-product__meta">
													<span class="ps-product__price">Starting From <i class="fa fa-rupee"></i>9899 /mo</span>
												</div>
												<div class="ps-product__desc">
													<p>Rent Includes:</p>
												</div>
												<div class="ps-product__desc_icon">
													<span><i class="fa fa-television"></i>TV</span>
													<span><i class="fa fa-wifi"></i>WiFi</span>
													<span><i class="fa fa-trash"></i>Cleaning</span>
													<span><i class="fa fa-gamepad"></i>Gaming</span>
												</div>
												<div class="ps-product__desc">
													<p>- Single & Sharing Rooms</p>
													<p>- 1 Month Security Deposit</p>
												</div>
												<a href="<?php echo site_url('front/details'); ?>" class="ps-product__more">Know More</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				
				
				
				
			</div>
		</div>