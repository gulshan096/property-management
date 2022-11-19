<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php echo $seo['title']; ?></title>
		<meta content="<?php echo $seo['description']; ?>" name="description" />
		<!-- App favicon -->
		<link rel="shortcut icon" href="<?php echo BASE_HTTP_REL_URL; ?>/favicon.ico" />
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" >
		
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
							<div class="d-flex">
								<div class="">
									<h2 class="mb-0">
									User/ Studen Request </h2>
									<ol class="breadcrumb p-0 m-0">
										<li class="breadcrumb-item"><a href="https://tutoratti.com/dashboard">Dashboard</a></li>
										<li class="breadcrumb-item active">
										Request list </li>
									</ol>
								</div>
								
							</div>
						</div>
					
						</div>
						<div class="col-lg-2"></div>
						<div class="clearfix"></div>
						<div class="card my-3">
							<div class="card-body">
								<div style='clear:both;'></div>
								<div class="table-responsive">
									<table id="tabeldatahere" class="table table-striped text-center display nowrap">
										<thead>
											<tr>
												<th>Property</th>
												<th>tenant</th>
												<th>Room no.</th>
												<th>Bed no.</th>
												<th>From date</th>
												<th>To date</th>
												<th>CheckIn date</th>
												<th>CheckIn Time</th>
												<th>Description</th>
												<th>Status</th>
												<th>Created </th>
												
											</tr>
										</thead>
										<tbody>
										
										<?php
											foreach($leave_list as $leave)
										 {
											?>
											<tr>
												<td><?php echo $leave['pro_name']; ?></td>
												<td><?php echo $leave['name']; ?></td>
												<td><?php echo $leave['room_no']; ?></td>
												<td><?php echo $leave['bed_no']; ?></td>
												<td><?php echo date('d-m-Y',strtotime($leave['from_date'])); ?></td>
												<td><?php echo date('d-m-Y',strtotime($leave['to_date'])); ?></td>
												<td><?php echo date('d-m-Y',strtotime($leave['checkin_date'])); ?></td>
												<td><?php echo date('h:m:a',strtotime($leave['checkin_time'])); ?></td>
												<td><?php echo $leave['description']; ?></td>
												
												<td><?php echo !empty($leave['status'])?"<button onclick='updates(this);' t='leave_request'   i='leave_id'  v='$leave[leave_id]' s='1' type='button' class='btn btn-success'>Approve</button>":"<button onclick='updates(this);' t='leave_request' i='leave_id' v='$leave[leave_id]' s='0' type='button' class='btn btn-danger'>Reject</button>"; ?></td>
													
												
												<td><?php echo date('d-m-Y',strtotime($leave['created_at'])); ?></td>
												
											</tr>
											<?php
											}
											?>
										
									</tbody>
								</table>
							</div>
						</div>
						<!-- end card-body -->
						
						<!-- end card-body -->
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
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js" integrity="sha256-hlKLmzaRlE8SCJC1Kw8zoUbU8BxA+8kR3gseuKfMjxA=" crossorigin="anonymous"></script>
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

<script>
function updates(selector) 
		{	
		
		
			//alert($b);
			var t = $(selector).attr('t');
			var i = $(selector).attr('i');
			var v = $(selector).attr('v');
			var s = $(selector).attr('s');
				if(s==1)
					{
						s=0;
						$(selector).removeClass('btn-success');
						$(selector).addClass('btn-danger');
						$(selector).html('Reject');
						$(selector).attr('s',s);
					} else {
						s=1;
						$(selector).addClass('btn-success');
						$(selector).removeClass('btn-danger');
						$(selector).html('Approve');
						$(selector).attr('s',s);
					}
						$.ajax({
							type: "POST",
							async: true,
							url: baserelativepath+'executive/updatestatus',
							data: {
								t:t,
								i:i,
								s:s,
								v:v
							},
							success: function(tempdata) 
								{
									$(".dologinres").html(tempdata); 
								}
						});
						return false;
		}
</script>



<script>
    
$('.timepicker_inp_start').timepicker({

timeFormat: 'h:mm p',
interval: 60,
minTime: "",
maxTime: '11:00pm',
defaultTime: '10',
startTime: "10",
dynamic: false,
dropdown: true,
scrollbar: true


});


$('.timepicker_inp_end').timepicker({

timeFormat: 'h:mm p',
interval: 60,
minTime: "",
maxTime: '11:00pm',
defaultTime: '10',
startTime: "10",
dynamic: false,
dropdown: true,
scrollbar: true


});
</script>
    


<script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>

<?php
		$this->load->view('admin/include/eodcode');
?>
</body>
</html>