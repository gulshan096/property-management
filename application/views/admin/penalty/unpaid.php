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
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
		<style>
			::placeholder{
				opacity:.4 !important;
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
						<!-- start page title -->
						<div class="row container">
							<div class="d-flex">
								<div class="">
									<h2 class="mb-0">
									Penalty Management </h2>
									<ol class="breadcrumb p-0 m-0">
										<li class="breadcrumb-item"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
										<li class="breadcrumb-item active">
										Unpaid Penalty list </li>
									</ol>
								</div>
								<div class="ml-auto">
									<a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/penalty/add" class="btn btn-primary">Add Penalty</a>
								</div>
							</div>
						</div>
						
						<!-- end page title -->
						
						
						<div class="row">
							<div class="col-xl-12">
								
								
								<div class="card">
									<div class="card-body">
										
										
										<div style='clear:both;'></div>
										
										
										
										<div class="table-responsive">
											<table id="tabeldatahere" class="table table-striped">
												<thead>
													<tr>
														<th>Username</th>
														<th>Property</th>
														<th>Room No</th>
														<th>Charges</th>
														<th>additional charge </th>
														<th>status</th>
														<th>Added on</th>
														<th>Action</th>
								
													</tr>
												</thead>
												<tbody>
													
													<?php
																							
															if(!empty($list_penalty))
															{
																foreach($list_penalty as $penalty)
																{
													?>
													<tr>
														<td><?php echo $penalty['name'];?></td>
														
														<td><?php echo $penalty['pro_name'];?></td>
														<td><?php echo $penalty['room_no'];?></td>
														<td><?php echo $penalty['charge'];?></td>
														
														<td><?php echo $penalty['additional_charge'];?></td>
														
														<td>
															<?php  
															// 2 - in process, 3 booking confirm, 4 booking cancel
															switch($penalty['status'])
																{
																	
																	case 1:
																	?>
																	 <a class="badge badge-info" href="#" >unpaid</a>
																	<?php
															        break;
																	case 2:
																	?>
																	 <a class="badge badge-success" href="#" >paid</a>
																	<?php
															        break;
																	case 3:
																	?>
																	 <a class="badge badge-danger" href="#" >Cancel</a>
																	<?php
															        break;
															
															    }
															?>
															</td>
														
														<td><?php echo date('d-m-Y',strtotime($penalty['created_at'])); ?></td>
														
														
														<td><a class="fa fa-edit" href="<?php echo base_url("administrator/penalty/$penalty[penalty_id]"); ?>"></a></td>
													</td>
												</tr>
												<?php
														}
													}
												?>
												
											</tbody>
										</table>
									</div>
									
								</div>
								<!-- end card-body -->
								
								<!-- end card-body -->
							</div>
							<!-- end card -->
						</div>
						<div style='clear:both;'></div>
						<!-- end col -->
					</div>
					<!-- end row -->
					
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
	<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<script>
	var REL_BASE_URL	=	"<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/";
	$(document).ready( function () {
	$('#tabeldatahere').DataTable();
	} );
	</script>
	<script>
	$(".dropdown_filter").select2({
	placeholder: " -- Select  -- "
	});
	</script>
	<script>
		function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#blah').attr('src', e.target.result);
			};
			reader.readAsDataURL(input.files[0]);
		}
		}
		$(document).ready(function(){
		$('#upload_form').on('change', function(e){
			e.preventDefault();
			if($('#image_file').val() == '')
			{
					alert("Please Select the File");
			}
			else
			{
					$.ajax({
						url: base_url_value+"Customerajax/profile_picture",
						method:"POST",
						data:new FormData(this),
						contentType: false,
						cache: false,
						processData:false,
						dataType: "json",
						success:function(res)
						{
							console.log(res.success);
							if(res.success == true){
							$('#blah').attr('src','//www.tutsmake.com/ajax-image-upload-with-preview-in-codeigniter/');
							$('#msg').html(res.msg);
							$('#divMsg').show();
							}
							else if(res.success == false){
							$('#msg').html(res.msg);
							$('#divMsg').show();
							}
							setTimeout(function(){
							$('#msg').html('');
							$('#divMsg').hide();
							}, 3000);
						}
					});
			}
		});
		});
	</script>
	
	
	<script>
	 
	 function GetUserImage(user_id);
	 {
		if(user_id)
        {
           $.ajax({
          
          method:'POST',
          url: "<?php echo base_url('administrator/penalty/user/userImage')  ?>",
          data:{user_id:user_id},
		  dataType:"json",
          success:function(result){
              
			 $('#room_no').val(result.room_no);
			 
			     
          }
        }); 
        }  
	 }	 
	
	</script>
<script>
function GetUser(property_id)
    {
		$('#room_no').val('');
		$('#seater').val('');
		
        if(property_id)
        {
           $.ajax({
          
          method:'POST',
          url: "<?php echo base_url('administrator/penalty/user/getUser')  ?>",
          data:{propertyid:property_id},
          success:function(data){
              
             $('#user_id').html(data);
                
          }
        }); 
        }
      
    }
</script>
   	   
<script>
function GetBookingDetail(user_id)
   {
	  if(user_id)
        {
           $.ajax({
          
          method:'POST',
          url: "<?php echo base_url('administrator/penalty/user/bookingDetails')  ?>",
          data:{user_id:user_id},
		  dataType:"json",
          success:function(result){
              
			 $('#room_no').val(result.room_no);
			 $('#seater').val(result.seater);
			 $('#room_id').val(result.id);
			 $('#booking_id').val(result.booking_id);
			  $('#penalty_user_id').val(result.penalty_user_id);
			     
          }
        }); 
        } 
   }
</script>

	<script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>
	<?php
			$this->load->view('admin/include/eodcode');
	?>
</body>
</html>