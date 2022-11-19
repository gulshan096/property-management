<?php 

$booking_detail = $this->input->post();
$tenant_id =   $this->input->post('user_id');
$sql = "select * From tenant where tenant_id = $tenant_id";
$curuser = $this->db->query($sql)->row_array();
$property_id = $this->input->post('property_id');

$sql = "select pro_name,pro_address,pro_img,property_id From property where property_id = $property_id";

$property_detail  = $this->db->query($sql)->row_array();
					

?>
<?php
		$price = $booking_detail['price'];
		$oneper = $price/100;
		$tax    = 18*$oneper;
												
	?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php echo $seo['title']; ?></title>
		<meta content="<?php echo $seo['description']; ?>" name="description" />
		<!-- App favicon -->
		<link rel="shortcut icon" href="<?php echo BASE_HTTP_REL_URL; ?>/favicon.ico" />
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" >
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
		<!-- jvectormap -->
		<link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />
		
		<link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/ckeditor/ckeditor.js" rel="stylesheet" />
		<!-- Bootstrap Css -->
		<link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
		<!-- Icons Css -->
		<link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
		<!-- App Css-->
		<link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
		<link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" type="text/css" />
		<Link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" type="text/css" />
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
		
		<style>
			::placeholder{
				opacity:.4 !important;
			}
			
			#unitD{
			display:none;
			}
			
			.dropdown_filter > .select2-container {
		width: 100% !important;
		}
		
		@media (max-width:360px){
		
		.booking_top .left_sec {
		width:100%;
		}
		.booking_top .left_sec h2{
		font-size:20px;
		
		}
		.booking_top .right_sec a{
		position:absolute;
		left:0;
		top:95%;
		}
		
		}
		.booking_top .right_sec a{
		position:absolute;
		right:0;
		
		}
		</style>
		<style>
		<?php
				if(empty($openform))
					{
							echo " .addform { display:none; } ";
					}
		?>
		</style>
	</head>
	<body data-sidebar="dark">
		
		
		<!-- <body data-layout="horizontal" data-topbar="dark"> -->
		<!-- Begin page -->
		<div id="layout-wrapper">
			
			<header id="page-topbar">
				<?php echo $sidebarleft; ?>
			</header>
			<!-- ========== Left Sidebar Start ========== -->
			<div class="vertical-menu">
				<div data-simplebar class="h-100">
					<!--- Sidemenu -->
					<?php echo $sidemenu; ?>
					<!-- Sidebar -->
				</div>
			</div>
			<!-- Left Sidebar End -->
			
			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="main-content">
				
				<div class="page-content">
					<div class="container-fluid">
						<div class="row container">
							<div class="d-flex booking_top">
								<div class="left_sec">
									<h2 class="mb-0">
									Property/Room Booking</h2>
									<ol class="breadcrumb p-0 m-0 ">
										<li class="breadcrumb-item">
											<a href="https://tutoratti.com/dashboard">Dashboard</a>
										</li>
										<li class="breadcrumb-item active">
										Booking list </li>
									</ol>
								</div>
								<div class=" right_sec">
									<a href="<?php echo BASE_HTTP_REL_URL; ?>executive/order/add" class="btn btn-primary">Create Booking</a>
								</div>
							</div>
						</div>
						<form action="<?php echo base_url('executive/room/booking_save'); ?>" method="POST">
						
						<input type="hidden" name="bed_id" value="<?php echo $booking_detail['bed_id']; ?>">
					    <input type="hidden" name="property_id" value="<?php echo $booking_detail['property_id']; ?>">
					    <input type="hidden" name="room_id" value="<?php echo $booking_detail['room_id']; ?>">
					    <input type="hidden" name="from_date" value="<?php echo $booking_detail['from_date']; ?>">
						<input type="hidden" name="user_id" value="<?php echo $curuser['tenant_id']; ?>">
						<input type="hidden" name="amount" value="<?php echo !empty($booking_detail)?$price + $tax:""; ?>">
						<input type="hidden" name="total_months" value="<?php echo $booking_detail['total_months']; ?>">
						
						<div class="row">
							<div class="col-md-9">
								<div class="m-3">
									<div class="card mb-3">
										<div class="row no-gutters">
											<div class="col-md-4">
												<img src="<?php echo base_url(""); ?><?php echo $property_detail['pro_img'];  ?>" class="img-fluid rounded-start" alt="...">
											</div>
											<div class="col-md-8">
												<div class="card-body">
													<h4 class="card-title"><?php echo !empty($property_detail)?$property_detail['pro_name']:""; ?></h4>
													<p class="card-text"><?php echo !empty($property_detail)?$property_detail['pro_address']:""; ?></p>
													<p class="card-text"><small class="text-muted font-weight-bold">Deluxe <?php echo !empty($booking_detail)?$booking_detail['seater']:""; ?>  Beded Room</small></p>
												</div>
											</div>
										</div>
										
									</div>
									<div>
										<p class="text-justify">
											Experience an age-old era redolent of Goan-Portuguese hues, encompassed by a coastal aura right here at The Figueiredo House. The Figueiredo House, built in the 1590s, predates the Taj Mahal by decades, making it a one-of-a-kind heritage treasure. The original architects of this regal house; The Jesuit Priests have designed this house intricately with each nook and crevice exuding comfort, luxury, and bliss. The house's extravagant interiors stand in studied contrast to the natural beauty of the paddy fields and coconut trees that surround it. The furniture has been made using teak wood by Goan artisans and carvers, the porcelain in the dining hall is intricately designed and the tiles used are from Italy.
										</p>
									</div>
									<style>
									.ps-product__desc_icon {
									  margin-bottom: 10px;
									  display: flex;
									  justify-content: space-between;
									}

									.ps-product__desc_icon span {
									  display: flex;
									  flex-direction: column;
									  align-items: center;
									  color: #000000;
									  font-size: 12px;
									  font-weight: 600;
									}

									.ps-product__desc_icon span i {
									  background: #f0f2f5;
									  width: 40px;
									  height: 40px;
									  border-radius: 50%;
									  text-align: center;
									  line-height: 40px;
									  font-size: 16px;
									  
									}
									</style>
									<div class="ps-product__desc_icon">
										<span><i class="fa fa-television"></i>TV</span>
										<span><i class="fa fa-wifi"></i>WiFi</span>
										<span><i class="fa fa-trash"></i>Cleaning</span>
										<span><i class="fa fa-gamepad"></i>Gaming</span>
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
											     <button class="btn btn-outline-success p-3 sb" type="submit" style="font-size:18px;"> Complete Booking Request </button>
										      </center>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								
								
								<div>
									<h3>Your Booking Details</h3>
									<input type="hidden" name="to_date" value="<?php echo $booking_detail['to_date']; ?>">
									<div class="row bg-white">
										<div class="col-md-12">
											<div class="form-group">
												<label class="label_ry font-weight-bold"><i class="fa fa-calendar"></i> Check-in Date</label>
												<p class="bdp"><?php echo date('d-M-Y  D',strtotime($booking_detail['from_date'])); ?></p>
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
						</div>
						</form>
					</div>
				</div>
				<!-- container-fluid -->
			</div>
			
			<!-- End Page-content -->
			<footer class="footer">
				<?php echo $footer; ?>
			</footer>
		</div>
		<!-- end main content-->
	</div>
	<!-- END layout-wrapper -->
	<!-- Right Sidebar -->
	<div class="right-bar">
		<?php echo $sidebarright; ?>
		<!-- end slimscroll-menu-->
	</div>
	<!-- /Right-bar -->
	<!-- Right bar overlay-->
	<div class="rightbar-overlay"></div>
	<!-- JAVASCRIPT -->
	<script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jquery/jquery.min.js"></script>
	<script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/custom.js?v=0.02"></script>
	<script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/metismenu/metisMenu.min.js"></script>
	<script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/simplebar/simplebar.min.js"></script>
	<script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/node-waves/waves.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.2/tinymce.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css" />
	<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js" ></script>
	<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->
	<!-- apexcharts js -->
	<script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/apexcharts/apexcharts.min.js"></script>
	<!-- jquery.vectormap map -->
	<script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>
	<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
	<script src="//cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="//cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
	<script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>
	<?php
			$this->load->view('admin/include/eodcode');
	?>
</body>
</html>