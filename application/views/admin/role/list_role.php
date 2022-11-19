<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $seo['title']; ?></title>
        <meta content="<?php echo $seo['description']; ?>" name="description" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo BASE_HTTP_REL_URL; ?>/favicon.ico" />
        
        <!-- jvectormap -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />

        <!-- Bootstrap Css -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<style>
			.btn-cancel a:hover{
				color:white!important;
			}
		</style>
    </head>

    <body data-sidebar="dark">
		<div id="layout-wrapper">
			<header id="page-topbar">
                <?php echo $sidebarleft; ?>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">
				<div data-simplebar class="h-100">
					<?php echo $sidemenu; ?>
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
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Manage Roles</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Area List</a></li>
                                            <li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <style>
								<?php
									if(empty($openform))
									{
										echo " .addform { display:none; } ";		
									}
								?>
                        </style>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card addform "  style='margin-bottom: 24px;'>
                                    <div class="card-body">
										
										<form onsubmit="return dorequest('<?php echo base_url("administrator/role/managerole"); ?>','.managerolefrm','.manageroleres');" method="POST" class="row managerolefrm">
											<input value="<?php echo !empty($role['id'])?$role['id']:0; ?>" name="roles_id" type="hidden" />
											
											
																												
											<div class="col-md-12">
												
												
												<div class="row">
													<div class="form-group col-md-6">
														<label>Name</label>
														<input class="form-control reseto2blank" type="text" name="name" placeholder="Enter Name" maxlength="80" value="<?php echo isset($role['name'])?$role['name']:""; ?>" />
													</div>
												
												</div>
												<div class="form-group mt-4">
													<?php //print_r($role_type)?>
													<label>Role Type</label>
													<div class="row" style="margin-left:1rem;">

													<?php 
													if($role_type){
														$rt=array();
														if(!empty($role)){
															$rt=json_decode($role['rolet']);
														}
														$checked="";
														foreach($role_type as $single){
															if(!empty($rt)){
																if(in_array($single['id'],$rt)){
																	$checked="checked";
																}else{
																	$checked="";
																}
															}
													?>
														<div class="col-md-3">
															<input <?php echo $checked;?> type="checkbox" id="" name="rolet[]" value="<?php echo $single['id']; ?>" />
															<label for="1"><?php echo $single['title']; ?></label><br>
														</div>
													<?php
													}}
													?>
														
													</div>
												</div>
												<div class="manageroleres" style="clear:both;"></div>

												<div style="clear:both;"></div>
											
												<div class="row mt-4">
													<div class="col-md-12 text-center">
														<button class="btn btn-primary" type="submit"><?php echo !empty($role['id'])?"Update Role":"Add Role"; ?></button>
														<button class="btn btn-outline-danger btn-cancel" type="button"><a class="text-info" href="<?php echo BASE_HTTP_REL_URL; ?>administrator/role">Cancel</a></button>
													</div>
												</div>
											</div>
											
												<div style="clear:both;"></div>
										</form>	
									</div>  <!---- card body end ---->
								</div>  <!---- card end ---->
								
                                <div class="card">
                                    <div class="card-body">
											
						
							<div style='float: right; margin-bottom: 10px;'>
									<a class="btn btn-success" href="<?php echo base_url('administrator/role/add'); ?>" >Add Role</a>
							</div>
							<div style='clear:both;'></div>
								 <div class="table-responsive">
								<table id="tabeldatahere" class="table table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<!--th>Rolet</th-->
											<th>Status</th>
											<th>Added on</th>
											<th>Last Updated on</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									
										<?php
												if(!empty($list_role))
													{
														//print_r($list_area);

														
														foreach($list_role as $sing)
															{
																?>
																	<tr>
																		<td><?php echo $sing['id']; ?></td>
																		<td><?php echo $sing['name']; ?></td>
																		<!--td><?php echo $sing['rolet']; ?></td-->
																		<td><?php echo !empty($sing['status'])?"<button onclick='updatestatus(this);' t='roles' i='id' v='$sing[id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='roles' i='id' v='$sing[id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
																		<td><?php echo showtime4db($sing['added']); ?></td>
																		<td><?php echo showtime4db($sing['updated']); ?></td>
																		<td>
																			<a href="<?php echo base_url("administrator/role/$sing[id]"); ?>" target="_manage">
																				<i class="fa fa-edit"></i>
																			</a>
																		</td>
																	</tr>
													<?php } } ?>
									</tbody>
								</table>
							</div>		

					</div>
					<!-- end card-body -->
				   
					<!-- end card-body -->
				</div>
				<!-- end card -->
			</div>
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

        <!-- apexcharts js -->
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- jquery.vectormap map -->
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>

        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
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
		
		
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>
			<?php
					$this->load->view('admin/include/eodcode');
			?>
    </body>
</html>