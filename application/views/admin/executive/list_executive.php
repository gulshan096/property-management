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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.1/css/bootstrap-multiselect.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
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
								     Executive Management </h2>
									<ol class="breadcrumb p-0 m-0">
										<li class="breadcrumb-item"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
										<li class="breadcrumb-item active">
									    Executive list </li>
									</ol>
								</div>
								<div class="" style="position:absolute; right:0;">
									<a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/executive/view/add" class="btn btn-primary">Add Executive</a>
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
                                <div class="card addform">
                                    <div class="card-body">
										<form onsubmit="return dorequest('<?php echo base_url('administrator/executive/manageexecutive'); ?>','.manageexecutivefrm','.manageexecutiveres');" method="POST" class="row manageexecutivefrm">
										<h4>Manage Executive</h4>
				
											<input value="<?php echo !empty($get_executive['ex_id'])?$get_executive['ex_id']:0; ?>" name="ex_id" type="hidden" />
											<div class="row">
												<div class="col-md-6">
												
													<div class="mb-3">
														<label>
															Name 
															<span class="text-danger">*</span>
														</label>
														<input value="<?php echo isset($get_executive['name'])?$get_executive['name']:""; ?>" name="name" maxlength="80" required type="text" class="form-control"  required/>
													</div>
												</div>
											
											
										
												<div class="col-md-6">
													<div class="form-group mb-3">
														<div class="mb-3">
															<label>
																Email
																<span class="text-danger">*</span>
															</label>
															<input value="<?php echo isset($get_executive['email'])?$get_executive['email']:""; ?>" name="email" maxlength="80" required type="email" class="form-control"  required/>
														</div>
													</div>
												</div>
									
											
											
												<div class="col-md-6">
											
													<div class="mb-3">
														<label>
															Mobile 
															<span class="text-danger">*</span>
														</label>
														<input value="<?php echo isset($get_executive['mobile'])?$get_executive['mobile']:""; ?>" name="mobile" maxlength="80" required type="text" class="form-control"  required/>
													</div>
												</div>
										

											
											
												<div class="col-md-6">
													<div class="form-group mb-3">
														<div class="mb-3">
															<label>
																Password
																<span class="text-danger">*</span>
															</label>
															<input value="<?php echo isset($get_executive['password'])?$get_executive['password']:""; ?>" name="password" maxlength="80" type="password" class="form-control" />
														</div>
													</div>
												</div>
										
										
									
											<div class="col-md-6">
												 <div class="form-group mb-3"  >
													<label>
														Property
														<span class="text-danger">*</span>
													</label><br>						
													<select style="width: 400px !important; background: gray !important;"  class=""  name="property_id[]" id="selectoption" multiple="multiple">
														
															    <?php
																	
																	foreach($property as $ar)
																	{
																			
																	if(isset($get_executive['ex_id'])  && $get_executive['status'] == 0 )
																	{
																		
																		
																	?>
																	<option value="<?php echo $ar['pid']; ?>"><?php echo $ar['pro_name']; ?></option>		
																	
																	<?php
																	}
																	else
																	{
																		 $dproperty_id = json_decode($get_executive['property_id']);
																		?>
																		   
																		
																	       <option value="<?php echo $ar['pid']; ?>"><?php echo $ar['pro_name']; ?></option>		
																	
																	    <?php
																	}
																	 
																			
																	}
																?>
                                                           
														
													</select>
												 </div>
											</div>
										</div>	
										
										<div class="manageexecutiveres" style="clear:both;"></div>
										<div style="clear:both;"></div>
										<div class="col-md-12">
											<button class="btn btn-primary" type="submit"><?php echo !empty($subadmin['aid'])?"Update Admin":"submit"; ?></button>
										</div>
										<div style="clear:both;"></div>
									</form>
								</div>
							</div>
							
                            <div class="card">
								<div class="card-body">
											
						<?php 
								// bid	state	city	name	email	mobile	gst	taxno	startdate	address	map	otherinfo	status	added	updated
							//	echo "<pre>"; print_r($list_cities); echo "</pre>";
						
						?>
									
									<div style='clear:both;'></div>
									<div class="table-responsive">
										<table id="tabeldatahere  text-center" class="table table-striped">
											<thead>
												<tr>
													<th>Name</th>
													<th>Email</th>
													<th>Mobile</th>
													<th>Resume</th>
													<th>Id type</th>
													<th>Id card</th>
													<th>Role</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
														
													if(!empty($list_executive))
													{
														foreach($list_executive as $executive) 
														{
												?>
															<tr>
																<td><?php echo $executive['name']; ?></td>
																<td><?php echo $executive['email'];?></td>
																<td><?php echo $executive['mobile'];?></td>
																<td><a href="../../<?php echo $executive['resume'];?>" target="_blank"><i class="fa fa-file-pdf-o text-danger" aria-hidden="true"></i></a></td>
																<td><?php echo $executive['id_type'];?></td>
																<td><a href="../../<?php echo $executive['id_card'];?>" target="_blank"><i class="fa fa-file-pdf-o text-danger" aria-hidden="true"></i></a></td>
																<td><?php echo $executive['role']; ?></td>
																<td><?php echo !empty($executive['status'])?"<button onclick='updatestatus(this);' t='executive'   i='ex_id'  v='$executive[ex_id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='executive' i='ex_id' v='$executive[ex_id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
																<td><a class="btn btn-info" href="<?php echo base_url("administrator/executive/view/$executive[ex_id]"); ?>">update</a></td>
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
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
        // <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
		
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/custom.js?v=0.02"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/node-waves/waves.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.1/js/bootstrap-multiselect.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css" />
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js" ></script>
		
		
		<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->

		
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
		 $(document).ready(function(){
			$("#selectoption").multiselect({     
			   buttonClass:'btn btn-warning',
               buttonWidth:'360px',  
			   enableFiltering: true, 
			   includeSelectAllOption:true

		  });  
		 });
		  
	
		</script>
		<script>
			$(function(){
			//	$('.datepicker').datepicker(); 
				
				// $( ".datepicker_inp" ).datepicker({changeYear:true, changeMonth:true });
				$( ".datepicker_inp" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear:true, changeMonth:true,  minDate: 0 });
				
			});
		</script>
		<script>
			$(function(){ 
				$("input[name$='group1']").click(function() {
				var test = $(this).val();
				$("div.discount_class").hide();

				$("#"+test).show();
				}); 
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
		
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>
			<?php
					$this->load->view('admin/include/eodcode');
			?>
    </body>
</html>