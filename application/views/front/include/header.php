<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $seo['title']; ?></title>
	<meta name="description" content="<?php echo $seo['description']; ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link href="<?php echo base_url("assets/front/"); ?>img/favicon.png" rel="apple-touch-icon-precomposed" />
	<link href="<?php echo base_url("assets/front/"); ?>img/favicon.png" rel="shortcut icon" type="image/png" />
	
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css" />
	<link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>plugins/font-awesome-5/css/fontAwesome5Pro.css" />
	<link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>plugins/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>fonts/Linearicons/Font/demo-files/demo.css" />
	<link rel="preconnect" href="https://fonts.gstatic.com/" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:400,500,600,700&amp;display=swap&amp;ver=1607580870" />
	<link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>plugins/bootstrap4/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>plugins/owl-carousel/assets/owl.carousel.css" />
	<link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>plugins/slick/slick/slick.css" />
	<link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>plugins/lightGallery/dist/css/lightgallery.min.css" />
	<link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>plugins/fancybox/jquery.fancybox.min.css">
	<link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css" />
	<link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>plugins/select2/dist/css/select2.min.css" />
	<link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>plugins/noUiSlider/nouislider.css" />


	
	<?php $v	=  time(); ?>
	
	<link rel="stylesheet" href="<?php echo base_url('assets/front/'); ?>css/style.css?ver=1.1.1.<?php echo $v; ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>css/home-1.css?ver=1.1.4">
	<link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>fonts/butler/butler.css?ver=20220607.<?php echo $v; ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>fonts/poppins/poppins.css?ver=20220607.<?php echo $v; ?>" />
	
	<script src="<?php echo base_url("assets/front/"); ?>plugins/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
	
</head>

<body>
	<div class="ps-preloader" id="preloader">
		<div class="ps-preloader-section ps-preloader-left"></div>
		<div class="ps-preloader-section ps-preloader-right"></div>
	</div> 

	<div class="ps-page">   <!-- this div is closed on footer.php -->
	
	
	
		<header class="ps-header ps-header--1">
			<div class="ps-noti d-none">
				<div class="container">
					<p class="m-0">All Our Residences Are Safe. <a href="#" target="_blank">Learn More</a> About Our <strong>COVID19</strong> Measures.</p> 
				</div>
				<a class="ps-noti__close"><i class="icon-cross"></i></a>
			</div> 
			
			<div class="ps-header__top">
				<div class="container">
					<div class="ps-header__text">Need Help? <strong><a href="tel:+918448448421">+91 8448448421</a></strong></div>
					<div class="ps-top__right">
						<div class="ps-language-currency">
							<a class="ps-dropdown-value d-none" href="javascript:void(0);" data-toggle="modal" data-target="#popupSignin">Sign In</a>
							<a class="ps-dropdown-value" href="<?php echo base_url("front/contact_us"); ?>" targeta="_blank"><i class="icon-home2"></i> List Your Property</a>
						</div>
						<div class="ps-top__social">
							<ul class="ps-social">
								<li><a class="ps-social__link facebook" href="https://www.facebook.com/popcornstay/" target="_blank"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
								<li><a class="ps-social__link twitter" href="https://twitter.com/popcornstay" target="_blank"><i class="fa fa-twitter"></i><span class="ps-tooltip">Twitter</span></a></li>
								<li><a class="ps-social__link instagram" href="https://www.instagram.com/popcornstay_official/" target="_blank"><i class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span></a></li>
								<li><a class="ps-social__link linkedin" href="https://www.linkedin.com/company/popcornstay/" target="_blank"><i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a></li>
								<li><a class="ps-social__link whatsapp" href="https://api.whatsapp.com/send?phone=919022594749&text=Hello%20I%20am%20Sending%20you%20message%20from%20https://www.popcornstay.com/" target="_blank"><i class="fa fa-whatsapp"></i><span class="ps-tooltip">WhatsApp</span></a></li>
							</ul>
						</div>
						<ul class="menu-top">
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url("front/about_us"); ?>">About Us</a></li>
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url("front/contact_us"); ?>">Contact Us</a></li>
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url("front/gallery"); ?>">Gallery</a></li>
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url("front/house_rules"); ?>">House Rules</a></li>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="ps-header__middle">
				<div class="container">
					<div class="ps-logo">
						<a href="<?php echo base_url("/"); ?>"><img src="<?php echo base_url("assets/front/"); ?>img/logo-new.png" alt=""><img class="sticky-logo" src="<?php echo base_url("assets/front/"); ?>img/logo-new.png" alt=""></a>
						<!--div class="ps-header__extranav">
							<p>Millennials Accommodation</p>
							<p>Corporate Stay</p>
							<p>Serviced Apartment</p>
						</div-->
						
						<div class="ps-header__extranav">
							<p style="
								border-bottom: 1px solid #C69024;
								padding-bottom: 5px;
							">Millennials Accommodation</p>
							<p style="
								border-bottom: 1px solid #003631;
								padding-bottom: 5px;
							">Co Liv</p>
							<p>Serviced Apartment</p>
						</div>
					</div>
					<div class="ps-header__right">
						
						<div class="ps-header__nav d-none">
							<ul class="menu">
								<li class="has-mega-menu"><a href="#"><i class="fa fa-bars"></i>Popular</a>
									<div class="mega-menu">
										<div class="container">
											<div class="row">
												<div class="col-12 col-lg-5">
													<h4>&nbsp;</h4>
												</div>
												<div class="col-12 col-lg-7">
													<h3 class="mb-5">Millennials Accommodation in Pune</h3>
												</div>
											</div>
											<div class="mega-menu__row">
												<div class="mega-menu__column">
													<h4>Top Searches</h4>
													<ul class="sub-menu--mega">
														<li><a href="#">Boys PG in Pune</a></li>
														<li><a href="#">Girls PG in Pune</a></li>
														<li><a href="#">Unisex PG in Pune</a></li>
													</ul>
												</div>
												<div class="mega-menu__column">
													<ul class="sub-menu--mega">
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Vijay Nagar</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Marathahalli</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Balewadi</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>North Campus</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Ahmedabad</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Whitefield</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Hinjewadi</a></li>
													</ul>
												</div>
												<div class="mega-menu__column">
													<ul class="sub-menu--mega">
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Vijay Nagar</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Marathahalli</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Balewadi</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>North Campus</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Ahmedabad</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Whitefield</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Hinjewadi</a></li>
													</ul>
												</div>
												<div class="mega-menu__column">
													<ul class="sub-menu--mega">
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Vijay Nagar</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Marathahalli</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Balewadi</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>North Campus</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Ahmedabad</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Whitefield</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Hinjewadi</a></li>
													</ul>
												</div>
												<div class="mega-menu__column">
													<ul class="sub-menu--mega">
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Vijay Nagar</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Marathahalli</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Balewadi</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>North Campus</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Ahmedabad</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Whitefield</a></li>
														<li><a href="#"><i class="fa fa-long-arrow-right"></i>Hinjewadi</a></li>
													</ul>
												</div>
											</div>
											<div class="ps-branch">
												<h3 class="ps-branch__title">Sponsored</h3>
												<div class="ps-branch__box">
													<div class="ps-branch__item"><a href="#"><img src="<?php echo base_url("assets/front/"); ?>img/partners-img1.png" alt="" /></a></div>
													<div class="ps-branch__item"><a href="#"><img src="<?php echo base_url("assets/front/"); ?>img/partners-img2.png" alt="" /></a></div>
													<div class="ps-branch__item"><a href="#"><img src="<?php echo base_url("assets/front/"); ?>img/partners-img3.png" alt="" /></a></div>
													<div class="ps-branch__item"><a href="#"><img src="<?php echo base_url("assets/front/"); ?>img/partners-img4.png" alt="" /></a></div>
													<div class="ps-branch__item"><a href="#"><img src="<?php echo base_url("assets/front/"); ?>img/partners-img5.png" alt="" /></a></div>
												</div>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div class="ps-language-currency">
							<a class="ps-dropdown-value" href="javascript:void(0);" data-toggle="modal" data-target="#popupCity">Pune</a>
						</div>
						
						
						<style>
								.advance_search_frm .advance_search_frm_div
									{
										position:absolute;
										top:0px;
										right:0px;
										left:0px;
										background: #fff;
										z-index: 99; 
										padding: 10px 25px; padding-bottom: 0px;
									}
									
								.advance_search_frm_div
									{
										-webkit-transition: display 0.5s linear;
									   -moz-transition: display 0.5s linear;
										-ms-transition: display 0.5s linear;
										 -o-transition: display 0.5s linear;
											transition: display 0.5s linear;
									}
								.label_ry {
									color: #c69024; font-weight: bolder; letter-spacing: 1px;
								}	
						</style>
						
						<div class="ps-header__search">
							<form action="<?php echo site_url("front/contact_us"); ?>" OLDaction="front/search" class="advance_search_frm" method="GET">
								<div class="ps-search-table">
									<div class="input-group">
										<input class="form-control search_inp_keyword ps-input" name="keyword" type="text" placeholder="Find Your Home Near You" value="<?php echo $this->input->get("keyword"); ?>" />
										<div class="input-group-append"><a href="javascript:void(0);" onclick="$('.advance_search_frm').submit();"><i class="icon-magnifier"></i></a></div>
									</div>
								</div>
								
								<div style="position:relative;">
									<div class="advance_search_frm_div" style="display:none;">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label_ry">City</label>
													<select class="form-control sf_city_inp" name="city">
														<option value="Pune">Pune</option>
														<option value="Bengaluru">Bengaluru</option>
														<option value="Mumbai">Mumbai</option>

														<option value="Delhi">Delhi</option>
														
														<!--option value="Chennai">Chennai</option>
														<option value="Coimbatore">Coimbatore</option>
														<option value="Hyderabad">Hyderabad</option>
														<option value="Indore">Indore</option>
														<option value="Greater Noida">Greater Noida</option>
														<option value="Ahmedabad">Ahmedabad</option>
														<option value="Gurgaon">Gurgaon</option>
														<option value="Jaipur">Jaipur</option>
														<option value="Any City">Any City</option-->
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="label_ry">Area</label>
													<select class="form-control sf_area_inp" name="area">
													
													
														<option>Kothrud</option>
														<option>Marathahalli</option>
														<option>MIT road</option>
														<option>Viman Nagar</option>
													
														<!--option value="Any Area">Any Area</option-->
													</select>
												</div>
											</div>
												<div style="clear:both;"></div>
												
												
											<div class="col-md-6">
												<div class="form-group">
													<label class="label_ry">For</label>
													
													<select class="form-control sf_for_inp" name="for">
														<option value="">Any</option>
														<option value="Girls">Girls</option>
														<option value="Boys">Boys</option>
														<option value="Employee">Employee</option>
														<option value="Family">Family</option>
													</select>
												</div>	
											</div>	
											
											<div class="col-md-6">
												<div class="form-group">
													<label class="label_ry">Move From</label>
													
													<input type="text" class="form-control datepicker-here" value="<?php echo $this->input->get("movefrom"); ?>" name="movefrom" autocomplete="off" />
												</div>	
											</div>	
												
											<div class="text-center mb-3" style="width:100%;">
												<button class="btn btn-lg btn-success"><i class="fa fa-search"></i> Search</button>
												<button type="button" onclick="close_adv_search();" class="btn btn-outline-danger"><i class="fa fa-close"></i> Cancel</button>
											</div>
												
												
										</div>
										
									</div>
								</div>
								
								
							</form>
							
							
						<script>
								
								$("Document").ready(function()
									{
										<?php
												$for = $this->input->get("for");
													if(!empty($for)) { echo " $('.sf_for_inp').val('$for'); "; }
												$area = $this->input->get("area");
													if(!empty($area)) { echo " $('.sf_area_inp').val('$area'); "; }
												$city = $this->input->get("city");
													if(!empty($city)) { echo " $('.sf_city_inp').val('$city'); "; }
										?>
									});
						
									function open_adv_search()
										{
											$(".advance_search_frm_div").slideDown();
										}
									function close_adv_search()
										{
											$(".advance_search_frm_div").slideUp();
										}
										
										$( ".search_inp_keyword" ).mouseover(function() {
											open_adv_search(); 
										});
										
										
									$( function()
										{
											$( ".datepicker-here" ).datepicker();
										});	
										
						</script>
							
							
							
							<div class="ps-search--result">
								<div class="ps-result__content">
									<div class="row m-0">
										<div class="col-12 col-lg-3">
											<div class="ps-product ps-product--horizontal">
												<div class="ps-product__content">
													<h5 class="ps-product__title"><a href="#">PG in HSR Layout</a></h5>
													<h5 class="ps-product__title"><a href="#">PG in Bellandur</a></h5>
													<h5 class="ps-product__title"><a href="#">PG in Electronic City</a></h5>
													<h5 class="ps-product__title"><a href="#">PG in BTM Layout</a></h5>
												</div>
											</div>
										</div>
										<div class="col-12 col-lg-3">
											<div class="ps-product ps-product--horizontal">
												<div class="ps-product__content">
													<h5 class="ps-product__title"><a href="#">Hostels in Kundalahalli</a></h5>
													<h5 class="ps-product__title"><a href="#">Hostels in Nagawara</a></h5>
													<h5 class="ps-product__title"><a href="#">Hostels in Tavarekere</a></h5>
													<h5 class="ps-product__title"><a href="#">Hostels in Maruthi Nagar</a></h5>
												</div>
											</div>
										</div>
										<div class="col-12 col-lg-3">
											<div class="ps-product ps-product--horizontal">
												<div class="ps-product__content">
													<h5 class="ps-product__title"><a href="#">Room for Rent in Koramangala</a></h5>
													<h5 class="ps-product__title"><a href="#">Room for Rent in Munnekolala</a></h5>
													<h5 class="ps-product__title"><a href="#">Room for Rent in RT Nagar</a></h5>
													<h5 class="ps-product__title"><a href="#">Room for Rent in Sarjapur</a></h5>
												</div>
											</div>
										</div>
										<div class="col-12 col-lg-3">
											<div class="ps-product ps-product--horizontal">
												<div class="ps-product__content">
													<h5 class="ps-product__title"><a href="#">Flats for Rent in Marathahalli</a></h5>
													<h5 class="ps-product__title"><a href="#">Flats for Rent in JP Nagar</a></h5>
													<h5 class="ps-product__title"><a href="#">Flats for Rent in Kattigenahalli</a></h5>
													<h5 class="ps-product__title"><a href="#">Flats for Rent in SG Palya</a></h5>
												</div>
											</div>
										</div>
									</div>
									<div class="ps-result__viewall"><a href="#">View All</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		
		<header class="ps-header ps-header--1 ps-header--mobile">
			<div class="ps-header__top">
				<div class="ps-header__box"></div>
			</div>
			<div class="ps-header__middle">
				<div class="container">
					<div class="ps-header__right">
						<div class="ps-location">
						<small>
							Millennials Accommodation <br />
							Corporate Stay <br />
							Serviced Apartment
						</small>
						
							<!--p>Hi <b>Sibu</b>, you're at</p>
							<h3><i class="icon-map-marker"></i> Majiwada Thane, Pune</h3-->
						</div>
					</div>
					<div class="ps-logo"><a href="https://demo3.sjainventures.com/popcorn-stay/admin/front/mobile"><img src="<?php echo base_url("assets/front/"); ?>img/logo-new.png" alt=""></a></div>
				</div>
			</div>
		</header>
		
		<style>
			.ps-banner  { position:relative; }
			.ps-banner h1 {
				padding: 20px 30px; background: #181817; position: absolute; bottom: 0px; right: 10px; color: #D7CFCD;
				
				animation-name: example;
  animation-duration: 4s;
				
			}
			
			
			@keyframes example {
  from {color: red;}
  to {color: yellow;}
}
		</style>