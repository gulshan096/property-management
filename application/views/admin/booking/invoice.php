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
		
		<style>
		#invoice{
			padding: 0px;
		}
		.invoice {
			position: relative;
			background-color: #FFF;
			min-height: 680px;
			padding: 5px
		}
		.invoice header {
			padding: 10px 0;
			margin-bottom: 20px;
			border-bottom: 1px solid #3989c6
		}
		.invoice .company-details {
			text-align: right
		}
		.invoice .company-details .name {
			margin-top: 0;
			margin-bottom: 0;
			color: #d51e4b;
		}
		.invoice .contacts {
			margin-bottom: 20px
		}
		.invoice .invoice-to {
			text-align: left
		}
		.invoice .invoice-to .to {
			margin-top: 0;
			margin-bottom: 0
		}
		.invoice .invoice-details {
			text-align: right
		}
		.invoice .invoice-details .invoice-id {
			margin-top: 0;
						color: #3989c6;
			color: #e16383;
		}
		.invoice main {
			padding-bottom: 50px
		}
		.invoice main .thanks {
			margin-top: -115px;
			font-size: 2em;
			margin-bottom: 50px
		}
		.invoice main .notices {
			padding-left: 6px;
			border-left: 6px solid #3989c6
		}
		.invoice main .notices .notice {
			font-size: 1.2em
		}
		.invoice table {
			width: 100%;
			border-collapse: collapse;
			border-spacing: 0;
			margin-bottom: 20px
		}
		.invoice table td,.invoice table th {
			padding: 15px;
			background: #eee;
			border-bottom: 1px solid #fff
		}
		.invoice table th {
			white-space: nowrap;
			font-weight: 400;
			font-size: 16px
		}
		.invoice table td h3 {
			margin: 0;
			font-weight: 400;
			color: #3989c6;
			font-size: 1.2em
		}
		.invoice table .qty,.invoice table .total,.invoice table .unit {
			text-align: right;
			font-size: 1.2em
		}
		.invoice table .no {
			color: #fff;
			font-size: 1.6em;
			background: #3989c6
		}
		.invoice table .unit {
			background: #ddd
		}
		.invoice table .total {
			background: #3989c6;
			color: #fff
		}
		.invoice table tbody tr:last-child td {
			border: none
		}
		.invoice table tfoot td {
			background: 0 0;
			border-bottom: none;
			white-space: nowrap;
			text-align: right;
			padding: 10px 20px;
			font-size: 1.2em;
			border-top: 1px solid #aaa
		}
		.invoice table tfoot tr:first-child td {
			border-top: none
		}
		.invoice table tfoot tr:last-child td {
			color: #3989c6;
			font-size: 1.4em;
			border-top: 1px solid #3989c6
		}
		.invoice table tfoot tr td:first-child {
			border: none
		}
		.invoice footer {
			width: 100%;
			text-align: center;
			color: #777;
			border-top: 1px solid #aaa;
			padding: 8px 0
		}
		@media  print {
			.invoice {
				font-size: 11px!important;
				overflow: hidden!important
			}
			.invoice footer {
				position: absolute;
				bottom: 10px;
				page-break-after: always
			}
			.invoice>div:last-child {
				page-break-before: always
			}
		}
		.carttable { margin-top:10px; width:auto !important; }
		.carttable td { padding:3px !important; padding-right:10px !important; }
		
		
		@media  print {
			.hidden-print { display:none; }
		}
		
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
									Property/Room  Invoice</h2>
									<ol class="breadcrumb p-0 m-0 ">
										<li class="breadcrumb-item">
											<a href="https://tutoratti.com/dashboard">Dashboard</a>
										</li>
										<li class="breadcrumb-item active">Booking list </li>
										<li class="breadcrumb-item active">Invoice</li>
									</ol>
								</div>
								<div class=" right_sec">
									<a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/booking/add" class="btn btn-primary">Go back</a>
								</div>
							</div>
						</div>
						<div style="" class="toolbar hidden-print">
							<div class="text-center">
								<button onclick="window.print();" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
								<button onclick="CreatePDFfromHTML();" class="btn btn-success exportpdf"><i class="fa fa-file-pdf-o"></i> PDF</button>
				
							</div>
							<hr>
						</div>
						<div class="container bodycontainer">
							<div id="invoice">
								<div class="invoice overflow-auto">
									<div style="min-width: 600px">
										<header>
											<div class="row">
												<div class="col">
													<a target="_blank" href="https://www.parekhtube.in">
														<img src="<?php echo BASE_HTTP_REL_URL; ?>assets/logo.png" data-holder-rendered="true" style="max-width:250px;" />
													</a>
												</div>
												<div class="col company-details">
													<h4 class="name">
													POPCORN Property Management LLP
													</h4>
													<div>Opp. Meghana Bidi, Near Deshbandhu school, Station road, Raipur (CG) - 492009</div>
													<div>+91-771-2888288</div>
													<div><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4e272028210e3e2f3c2b25263a3b2c2b602720">[email&#160;protected]</a></div>
												</div>
											</div>
										</header>
										<main>
											<div class="row contacts">
												<div class="col invoice-to">
													<div class="text-gray-light">For:</div>
													<h2 class="to"><?php echo $get_booking['name'];  ?></h2>
						
													<div class="address"><span>Address:</span> Raipur 492001</div>
													<div class="email"><i class='fa fa-envelope'></i> <a href="<?php echo $get_booking['email'];  ?>"><span class="__cf_email__" data-cfemail=""><?php echo $get_booking['email'];  ?></span></a></div>
													<div class="mobile"> <i class='fa fa-phone'></i> <?php echo $get_booking['mobile'];  ?></div>
													<!--<div class="transport"><b>Transporter: </b>Check </div>-->
												</div>
												<div class="col invoice-details">
													<h4 class="invoice-id">PCN-<?php echo date('d-m-y',strtotime($get_booking['created_at'])).'-'.time();  ?></h4>
													<div class="date">Order Confirmation on: <?php echo date('d-m-y',strtotime($get_booking['created_at'])); ?></div>
												</div>
											</div>
											<div class='table-responsive'>
												<input type="hidden" name="newbuilty" value="newbuilty" />
												<h3>
												Booked Property/Room
												</h3>
												<table class="table table-striped table-bordered view_order">
													<thead>
														<tr>
															<th>
																<b>Property Name</b>
															</th>
															<th>
																<b>Room No.</b>
															</th>
															<th>
																<b>Amount /month</b>
															</th>
															
															<th>
																<b>JOin Date</b>
															</th>
															<th>
																<b>Leave Date</b>
															</th>
															<th>
																<b>Total Months</b>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
														       <?php  echo $get_booking['pro_name']; ?></td>
															<td>
																<?php  echo $get_booking['room_no']; ?>
															</td>
															<td>
																<?php  echo $get_booking['price']; ?>
														    </td>
															<td>
															    <?php  echo date("d-m-Y", strtotime($get_booking['from_date'])); ?>
															</td>
															<td>
																<?php  echo date("d-m-Y", strtotime($get_booking['to_date'])); ?>
															</td>
															<td>
																<?php  echo $get_booking['months']; ?>
														    </td>
														</tr>
													</tbody>
												</table>
											</div>
											<table border="0" cellspacing="0" cellpadding="0">
												<thead>
													<tr>
														<th class="text-left">Title</th>
														<th class="text-right">Rate</th>
														<th class="text-right">GST</th>
														<th class="text-right" colspan="2">Cash Discount</th>
														<!--<th class="text-right"></th>-->
														<th class="text-right">Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-left">
															<h3>
															<a>
															<?php  echo $get_booking['pro_name']; ?> </a>
															</h3>
															
														</td>
														<td class="unit">
														 ₹ <?php  echo $get_booking['price']*$get_booking['months']; ?>	
														</td>
														<td class="unit">
														    
														 <?php 
														 
														 $price =  $get_booking['price']*$get_booking['months'];
														 $oneper =  $price/100;
														 
														 $gst = $oneper*18;
														 
														 $oneperdis = ($price + $gst)/100;
														 
														 $dis =  $oneperdis * 10;
														 
														 $total =  ($price + $gst) - $dis ;
														 ?>   
														₹ <?php echo $gst;  ?><br />(18%) </td>
														<td class="unit" colspan="2">
														  <?php  echo $dis; ?><br />(5%) </td>
														<!--<td class="qty">-->
														<!--</td>-->
														<td class="total"> ₹ <?php echo $total; ?></td>
													</tr>
												</tbody>
												<tfoot>
												<tr>
													<td colspan="3"></td>
													<td colspan="2"></td>
													<td>
													<small style='display: block; font-size: 50%; text-transform: capitalize;'>two thousand four hundred and thirty five Rupees .six one Paise</small> </td>
												</tr>
											
												<tr>
													<td colspan="3"></td>
													<td colspan="2">GRAND TOTAL</td>
													<td>
												    ₹ <?php echo $total; ?> <small style='display: block; font-size: 50%; text-transform: capitalize;'>three thousand one hundred and thirty one Rupees .two Paise</small> </td>
												</tr>
												</tfoot>
											</table>
											<div class="thanks">Thank you!</div>
											
											<div class="notices">
												<div>Note:</div>
												<div class="notice">
													You can view our Term & Condition on <a target="_BLANK" href="<?php echo base_url(); ?>">https://demo3.sjainventures.com/popcorn-stay</a>
												</div>
											</div>
										</main>
										<footer>
											Order Confirmation was created on a computer on 06 Jun, 2022 01:31 PM.
										</footer>
									</div>
									<div></div>
								</div>
							</div>
						</div>
					</div>
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
<script>
var REL_BASE_URL	=	"<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/";
</script>
<script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>
<?php
		$this->load->view('admin/include/eodcode');
?>

<script>
    
</script>
</body>
</html>