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
									Registered Property Owner List</h2>
									<ol class="breadcrumb p-0 m-0">
										<li class="breadcrumb-item"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
										
									</ol>
								</div>
								
							</div>
						</div>
						
						<!-- end page title -->
						
						
						<div class="row">
							
						
							<div class="card">
								<div class="card-body">
									<div style='clear:both;'></div>
									
									<div class="table-responsive">
										<table id="tabeldatahere" class="table table-striped">
											<thead>
												<tr>
													<th>Owner Name</th>
													<th>Email</th>
													<th>Mobile</th>
													<th>Address</th>
													
													<th>property</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												
												<?php
																						
														if(!empty($register_owner_list))
														{
															foreach($register_owner_list as $owner)
															{
												?>
												<tr>
													
													<td><?php echo $owner['name'];?></td>
													<td><?php echo $owner['email'];?></td>
													<td><?php echo $owner['mobile'];?></td>
													<td><?php echo $owner['perosnal_address'];?></td>
													
													<td>
														<button class="btn btn-primary property" data-id="<?php echo $owner['po_id'] ?>" role="button" data-bs-toggle="modal" data-bs-target="#propertyModal">view</button>
													</td>
													<td>
														
														<button class="btn btn-primary credential" data-id="<?php echo $owner['po_id'] ?>" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">credentials</button>
													</td>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form onsubmit="return dorequest('<?php echo base_url('administrator/subadmin/managesubadmin'); ?>','.managesubadminfrm','.managesubadminres');" method="POST" class="row managesubadminfrm">
					<div class="row">
						<div class="col-xl-12">
							<div class="card addform">
								<div class="card-body">
									
									<h4>Provide Credentials</h4>
									
									<div class="row">
									
										<div class="col-md-6">
											
											<div class="mb-3">
												<label>
													Name
													<span class="text-danger">*</span>
												</label>
												<input value="" name="name" id="owner_name" required type="text" class="form-control" readonly  required/>
											</div>
										</div>
										
										
										
										<div class="col-md-6">
											<div class="form-group mb-3">
												<div class="mb-3">
													<label>
														Email
														<span class="text-danger">*</span>
													</label>
													<input value="" name="email"  id="owner_email" required type="email" class="form-control" readonly  required/>
												</div>
											</div>
										</div>
										
										
										
										<div class="col-md-6">
											
											<div class="mb-3">
												<label>
													Mobile
													<span class="text-danger">*</span>
												</label>
												<input value="" name="mobile"  id="owner_mobile" required type="text" class="form-control" readonly  required/>
											</div>
										</div>
										<div class="col-md-6">
											
											<div class="mb-3">
												<label>
													Property Name
													<span class="text-danger">*</span>
												</label>
												<input value="" name="pro_name"  id="pro_name" required type="text" class="form-control"  readonly required/>
											</div>
										</div>
										
										
										<div class="col-md-6">
											<div class="form-group mb-3">
												<div class="mb-3">
													<label>
														Password
														<span class="text-danger">*</span>
													</label>
													<input value="" name="password" maxlength="80" type="password" class="form-control" />
												</div>
											</div>
										</div>
										
										
										
										<div class="col-md-6">
											<div class="form-group mb-3" >
												<label>Role<span class="text-danger">*</span></label>
												<input value="hostowner" name="role" type="text" class="form-control" readonly>
											</div>
											
										</div>
									</div>
									
									
									<div class="managesubadminres" style="clear:both;">
										
									</div>
									<div style="clear:both;">
										
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="propertyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				
					<div class="row">
						<div class="col-xl-12">
							<div class="card addform">
								<div class="card-body">
									
									<h4>Property Details</h4>
									
									<div class="row">
										
										<div class="col-md-6">
											
											<div class="mb-3">
												<label>
													Property Name
													<span class="text-danger">*</span>
												</label>
												<input value=""  id="opro_name" required type="text" class="form-control" readonly  required/>
											</div>
										</div>
										
										
										
										<div class="col-md-6">
											<div class="form-group mb-3">
												<div class="mb-3">
													<label>
														Card Type
														<span class="text-danger">*</span>
													</label>
													<input value=""   id="card_type" required type="text" class="form-control" readonly  required/>
												</div>
											</div>
										</div>
										
										
										
										<div class="col-md-12">
											
											<div class="mb-3">
												<label>
													Property Address
													<span class="text-danger">*</span>
												</label>
												<textarea class="form-control" id="pro_address"></textarea>
												
											</div>
										</div>
										<div class="col-md-12">
											
											<div class="mb-3">
												<label>
													Property Description
													<span class="text-danger">*</span>
												</label>
												<textarea class="form-control" id="pro_description"></textarea>
											</div>
										</div>
										
										
										<div class="col-md-6">
											<div class="form-group mb-3">
												<div class="mb-3">
													<label>
														ID Card
														<span class="text-danger">*</span>
													</label>
													<a href="#" class="form-control" >download</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							
						</div>
					</div>
				
			</div>
		</div>
	</div>
</div>
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
<script>
$('.credential').click(function(){
	
	var  po_id = $(this).data('id')
	if(po_id){
						$.ajax({
							type:'POST',
							url:baserelativepath+'administrator/host_owner_details',
							data:{po_id:po_id},
							dataType:"json",
							success:function(data){
							
								$('#owner_name').val(data.name);
								$('#owner_email').val(data.email);
								$('#owner_mobile').val(data.mobile);
								$('#pro_name').val(data.pro_name);
							}
						});
					}
	
	
	
});
</script>

<script>
$('.property').click(function(){
	
	var  po_id = $(this).data('id')
	if(po_id){
						$.ajax({
							type:'POST',
							url:baserelativepath+'administrator/host_owner_details',
							data:{po_id:po_id},
							dataType:"json",
							success:function(data){
								$('#opro_name').val(data.pro_name);
							    $('#id_card').val(data.id_card);
								$('#card_type').val(data.id_card_type);
								$('#pro_description').val(data.pro_description);
								$('#pro_address').val(data.pro_address);
								
							}
						});
					}
	
	
	
});
</script>

<script>
var REL_BASE_URL	=	"<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/";
$(document).ready( function () {
$('#tabeldatahere').DataTable();
} );
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
tinymce.init({
selector:"textarea.tinymce",
height : "200",
	});
</script>
<script>
$("#city_id").on('change', function(){
			
			var city_id    = $(this).val();
			
				$.ajax({
				
				method:'POST',
url: "<?php echo base_url('user/front/search/area')  ?>",
data:{city_id:city_id},
success:function(data){

$('#area_id').html(data);

}
});
});
</script>
<script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>
<?php
		$this->load->view('admin/include/eodcode');
?>
</body>
</html>