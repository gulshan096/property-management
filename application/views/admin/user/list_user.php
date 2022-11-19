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
			::placeholder{
				opacity:.4 !important; 
			}
			
																						
			.opacity{
				opacity:.4;
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
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">User List</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">User List</a></li>
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
								
								.heading{
									color:#0bb197!important;
								}
                        </style>
                        

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card addform">
                                    <div class="card-body">
									
									<script>
									  function create_digi_contract()
                                    {
                                             
                                        return dorequest("<?php echo base_url('executive/User/addtenant'); ?>",".managesignupfrm",".managesignupres");
                                                
                                    }
									</script>
										<form onsubmit="return create_digi_contract();" method="POST" class=" managesignupfrm">
										<h4 class="heading">Create User</h4>
				
											<input value="<?php echo !empty($users['tenant_id'])?$users['tenant_id']: ""; ?>" name="tenant_id" type="hidden" />
											<div class="row">
												<div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Full Name
															<span class="text-danger">*</span>
														</label>
														<input value="<?php echo isset($users['name'])?$users['name']:""; ?>" class="form-control col-12 mb-2" type="text"  placeholder="Enter Name" name="name" required/>
													</div>
												</div>
																				
											
												<div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Mobile Number
															<span class="text-danger">*</span>
														</label>
														<input value="<?php echo isset($users['mobile'])?$users['mobile']:""; ?>" type="text" name="mobile" maxlength="80"  class="form-control col-12 mb-2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  placeholder="Mobile Number"required />
														
													</div>
												</div>
												<div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Email
															<span class="text-danger">*</span>

														</label>
														<input value="<?php echo isset($users['email'])?$users['email']:""; ?>"  class="form-control col-12 mb-2" type="email" placeholder="Enter E-mail" name="email" required/>
													</div>
												</div>
										
										
												<div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Password
															<?php 
																if(!isset($users['password']))
																{
															?>
																
															<span class="text-danger">*</span>
																<?php 
																}
																else
																{ 
															?>
																
															<span class="opacity">(If You Want to Change Password You Can Change or leave it Blank.)</span>
																<?php 
																} 
																?>

														</label>
														<input value="<?php echo isset($users['password'])?$users['password']:""; ?>" name="password" maxlength="80"  type="password" class="form-control"/>
													</div>
												</div>
											</div>
										<div class="managesignupres" style="clear:both;"></div>
										<div style="clear:both;"></div>
										<div class="col-md-12 mt-2">
											<button class="btn btn-primary" type="submit"><?php echo !empty($users['tenant_id'])?"Update user":"submit"; ?></button>
										</div>
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
									<div style='float: right; margin-bottom: 10px;'>
										<a class="btn btn-success" href="<?php echo base_url('executive/tenants/view/add'); ?>" >Add New User</a>
									</div>
									<div style='clear:both;'></div>
									<div class="table-responsive">
										<table id="tabeldatahere" class="table table-striped">
											<thead>
												<tr>
													<th>name</th>
													
													<th>Mobile No.</th>
													<th>Email</th>
													<th>Status</th>
													<th>Lastlogin</th>
												
												</tr>
											</thead>
											<tbody>
												<?php
														
													if(!empty($list_user))
													{
														foreach($list_user as $stf)
														{
												?>
															<tr>
																<td><?php echo $stf['name']; ?></td>
																<!--td><img style="width:100px; height:70px;"src="<?php echo BASE_HTTP_REL_URL; ?><?php echo $stf['id_image']; ?>"></td-->
																


																
																<td><?php echo $stf['mobile']; ?></td>
																<td><?php echo $stf['email']; ?></td>

																<td><?php echo !empty($stf['status'])?"<button onclick='status(this);' t='tenant'   i='tenant_id'  v='$stf[tenant_id]' s='1' type='button' class='btn btn-success'>Unblock</button>":"<button onclick='status(this);' t='tenant' i='tenant_id' v='$stf[tenant_id]' s='0' type='button' class='btn btn-danger'>Block</button>"; ?></td>
																<td><?php echo showtime4db($stf['lastlogin']); ?></td>
															
																
																
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
        
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/node-waves/waves.min.js"></script>



<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css" />

<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js" integrity="sha256-hlKLmzaRlE8SCJC1Kw8zoUbU8BxA+8kR3gseuKfMjxA=" crossorigin="anonymous"></script>
		
		
		<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->

		
        <!-- apexcharts js -->
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- jquery.vectormap map -->
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>
         <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/custom.js?v=0.03"></script>
        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
		<script>
			var REL_BASE_URL	=	"<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/";
			 
					$(document).ready( function () {
						$('#tabeldatahere').DataTable();
					} );
			
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
			$('.card-btn').click(function() {
				$(this).find('i').toggleClass('fas fa-plus fas fa-minus')
			});
		</script>
		
		<script>
			$('.card-btn2').click(function() {
				$(this).find('i').toggleClass('fas fa-plus fas fa-minus')
			});
		</script>
		
		<script>
			$(function(){
				//	$('.datepicker').datepicker(); 
			
			// $( ".datepicker_inp" ).datepicker({changeYear:true, changeMonth:true });
			$( ".datepicker_inp" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear:true, changeMonth:true,  yearRange: '-100:+0' });
			
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
			function status(selector) 
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
						$(selector).html('Block');
						$(selector).attr('s',s);
					} else {
						s=1;
						$(selector).addClass('btn-success');
						$(selector).removeClass('btn-danger');
						$(selector).html('Unblock');
						$(selector).attr('s',s);
					}
						$.ajax({
							type: "POST",
							async: true,
							url: baserelativepath+'administrator/status/updatestatus',
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
			$('.card-btn3').click(function() {
				$(this).find('i').toggleClass('fas fa-plus fas fa-minus')
			});
		</script>
		
		
		
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>
		
		
		
			<?php
					$this->load->view('admin/include/eodcode');
			?>
    </body>
</html>