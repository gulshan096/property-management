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
        <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
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
                                <div class="card addform mt-4">
								<!--div class="row">
									<div class="col-12">
										<div class="page-title-box d-sm-flex align-items-center justify-content-between">
											<h4 class="mb-sm-0">City List</h4>
											<div class="page-title-right">
												<ol class="breadcrumb m-0">
													<li class="breadcrumb-item"><a href="javascript: void(0);">City List</a></li>
													<li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
												</ol>
											</div>
										</div>
									</div>
								</div-->
                        
                                    <div class="card-body">
									
									<form onsubmit="return dorequest('<?php echo base_url("administrator/Master/managecity"); ?>','.managecityfrm','.managecityres');" method="POST" class="row managecityfrm">
			
										<input value="<?php echo !empty($city['city_id'])?$city['city_id']:0; ?>" name="city[city_id]" type="hidden" />
										<div class="row">
											<div class="col-md-6">
												<small>&nbsp;</small>
												<div class="form-floating mb-3">
													<input value="<?php echo isset($city['name'])?$city['name']:""; ?>" name="city[name]" maxlength="80" required type="text" class="form-control"  />
													
													<label>City*</label>
												</div>
											</div>
										</div>
										
										
											<div class="col-md-6 text-center">
												<a style="font-size: 10px;font-weight: 900;" href="https://tinypng.com/" target="_BLANK">Click here to compress the image</a> <br>
												
												<?php
													$photourl = !empty($city['image'])?BASE_URL($city['image']):
													//$photourl=!empty($_POST['photo_inp'])?"/uploads/".$_POST['photo_inp']:
													"https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D";
								
													
												?>
											
												<!--img onclick="$('.photo_inp').trigger('click');" src="<?php echo $photourl ; ?>" class="preview_photo  img-responsive"> <br>
												<span style="font-size: 10px;font-weight: 900;">Image size should not exceed 5MB. And Upload PNG Image with transparent Background.</span> 
												
												<input type="file" id="photo_inp" accept="image/*" name="photo_inp" class="photo_inp upload5mbonly" preview="preview_photo" style="display:none;"-->
												
												<label for="finput" class="cUploadImages">
												<img id="blah" style="max-width:500px; max-height:500px;" name="photo" src="<?php echo $photourl ; ?>" alt="upload City" />
												<br/>Upload City</label>			
												<input type="file" value="<?php echo isset($city['image'])?$city['image']:""; ?>" name="photo_inp" multiple="true" accept="image/*" id="finput" onchange="readURL(this);" class="d-none"/>
											
										</div>
	
										<div style="clear:both;"></div>
										<div class="row">
											<div class="col-md-6 text-center">
													<button class="btn btn-primary" type="submit"><?php echo !empty($city['city_id'])?"Update City":"Add City"; ?></button>
													<button class="btn btn-outline-danger btn-cancel" type="button"><a class="text-info" href="<?php echo BASE_HTTP_REL_URL; ?>administrator/location/city/viewall">Cancel</a></button>
											</div>
										</div>
										<div class="managecityres" style="clear:both;"></div>
										
										<div style="clear:both;"></div>
										</form>
											
										
                                    </div>
								</div>
							
								<div class="row">
									<div class="col-12">
										<div class="page-title-box d-sm-flex align-items-center justify-content-between">
											<h4 class="mb-sm-0">City List</h4>
											<div class="page-title-right">
												<ol class="breadcrumb m-0">
													<li class="breadcrumb-item"><a href="javascript: void(0);">City List</a></li>
													<li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
												</ol>
											</div>
										</div>
									</div>
								</div>
                        
							
                                <div class="card">
                                    <div class="card-body">
											
						<?php 
								// bid	state	city	name	email	mobile	gst	taxno	startdate	address	map	otherinfo	status	added	updated
							//	echo "<pre>"; print_r($list_cities); echo "</pre>";
						
						?>
										<div style='float: right; margin-bottom: 10px;'>
											<a class="btn btn-success" href="<?php echo base_url('administrator/location/city/viewall/new'); ?>" >Add City</a>
										</div>
										<div style='clear:both;'></div>
										<div class="table-responsive">
											<table id="tabeldatahere" class="table table-striped">
												<thead>
													<tr>
														<th>City ID</th>
														<th>City Name</th>
														<th>Image</th>

														<th>Status</th>
														<th>Added on</th>
														<th>Last Updated on</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
		
												<?php
													if(!empty($list_city))
														{
															foreach($list_city as $sing)
																{
																	?>
																		<tr>
																			<td><?php echo $sing['city_id']; ?></td>
																			<td><?php echo $sing['name']; ?></td>
																			<!--td><img style="width:100px; height:70px;"src="<?php echo BASE_HTTP_REL_URL; ?><?php echo $sing['image']; ?>"></td-->
																			<td><img style="width:100px; height:70px;" src="<?php echo BASE_HTTP_REL_URL; ?><?php echo $sing['image']; ?>"onerror="this.onerror=null;this.src='<?php echo BASE_URL('assets/logo.png');?>'"></td>


																			<td><?php echo !empty($sing['status'])?"<button onclick='updatestatus(this);' t='loc_city' i='city_id' v='$sing[city_id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='loc_city' i='city_id' v='$sing[city_id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
																			<td><?php echo showtime4db($sing['added']); ?></td>
																			<td><?php echo showtime4db($sing['updated']); ?></td>
																			
																			<td><a class="fa fa-edit" href="<?php echo base_url("administrator/location/city/viewall/$sing[city_id]"); ?>"></a></td>
																			
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
		<script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/custom.js?v=0.03"></script>

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