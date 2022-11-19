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
                                    <h4 class="mb-sm-0">Vendor List</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Vendor List</a></li>
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
										<form onsubmit="return dorequest('<?php echo base_url('administrator/vendor/managevendor'); ?>','.managevendorfrm','.managevendorres');" method="POST" class="row managevendorfrm">
										<h4 class="heading">Create Vendor</h4>
				
											<input value="<?php echo !empty($vendor['id'])?$vendor['id']: "VID".rand().time(); ?>" name="vendorid" type="hidden" />
											<div class="row">
												<div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Full Name
															<span class="text-danger">*</span>
														</label>
														<input value="<?php echo isset($vendor['name'])?$vendor['name']:""; ?>" name="name" maxlength="80" type="text" class="form-control"  required/>
													</div>
												</div>
												
												<!--div class="form-group mt-4">
													<?php //print_r($role_type)?>
													<label>Category</label>
													<div class="row" style="margin-left:1rem;">

													<?php 
													if($list_category){
														$rt=array();
														if(!empty($vendor)){
															$rt=json_decode($vendor['category']);
														}
														$checked="";
														foreach($list_category as $single){
															if(!empty($rt)){
																if(in_array($single['id'],$rt)){
																	$checked="checked";
																}else{
																	$checked="";
																}
															}
													?>
														<div class="col-md-3">
															<input <?php echo $checked;?> type="checkbox" id="" name="cat[]" value="<?php echo $single['id']; ?>" />
															<label for="1"><?php echo $single['category']; ?></label><br>
														</div>
													<?php
													}}
													?>
														
													</div>
												</div-->

												
												<div class="col-md-6" style="margin-top:20px">
													 <label>
														Category
														<span class="text-danger">*</span>
													</label>						
													<select class="form-control"  name="category">
														<option value="">None</option>

														<?php 
														$selected = "";
														if($list_category){
															//echo '<pre>';
															//print_r($list_category);
															//echo '</pre>';
															foreach($list_category as $ls_cat){
														
																if(isset($vendor['category']) && $ls_cat['id']==$vendor['category']){
																	$selected = "selected='selected'"; 
																}else{
																	$selected="";
																}
														?>
															<option <?php echo $selected ?> value="<?php echo isset($vendor['category'])&&($ls_cat['id']==$vendor['category'])?$vendor['category']:$ls_cat['id']; ?>"><?php echo $ls_cat['category']; ?></option>
														<?php
															}
														}
														?>
													</select>

													
												</div>
												
											</div-->											
											<div class="row">
												<div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Mobile Number
															<span class="text-danger">*</span>
														</label>
														<input type="text" value="<?php echo isset($vendor['mobile'])?$vendor['mobile']:""; ?>" name="mobile" maxlength="80"  class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required />
														
													</div>
												</div>
												
												<div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Vehicle
															<span class="text-danger"></span>

														</label>
														<input value="<?php echo isset($vendor['vehicle'])?$vendor['vehicle']:""; ?>" name="vehicle" maxlength="80" type="text" class="form-control"/>
													</div>
												</div>
												
												<!--div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Email
															<span class="text-danger">*</span>

														</label>
														<input value="<?php echo isset($users['email'])?$users['email']:""; ?>" name="email" maxlength="80"  type="email" class="form-control" required/>
													</div>
												</div-->
											</div>
											<!--div class="row">
												<div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Password
															<?php 
																if(!isset($users['password'])){
															?>
																
	
															<span class="text-danger">*</span>
																<?php }else{ ?>
																
															<span class="opacity">(If You Want to Change Password You Can Change or leave it Blank.)</span>
																<?php } ?>

														</label>
														<input value="<?php echo ""; ?>" name="password" maxlength="80"  type="password" class="form-control"/>
													</div>
												</div>
												
												<div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Confirm Password
															<?php 
																if(!isset($users['password'])){
															?>
																
																
															<span class="text-danger">*</span>
																<?php } ?>
														</label>
														<input value="<?php echo ""; ?>" name="cnf_password" maxlength="80"  type="password" class="form-control"/>
													</div>
												</div>
											</div-->
											
																						
											
											<div class="col-md-6" style="margin-top:20px">
												 <label>
													ID Card
													<span class="text-danger">*</span>
												</label>						
												<select class="form-control"  name="cardtype">
													<option value="">None</option>

													<?php 
													$selected = "";
													
													$idcard=array('Pan card','Aadhar card');
													$i=0;
													while($i<2){
														if(isset($vendor['cardtype']) && $vendor['cardtype']==$idcard[$i]){
															$selected = "selected='selected'";
														}else{
															$selected="";
														}
													?>
														<option <?php echo $selected ?> value="<?php echo isset($vendor['cardtype'])&&($vendor['cardtype']==$idcard[$i])?$vendor['cardtype']:$idcard[$i]; ?>"><?php echo $idcard[$i]; ?></option>
													<?php
													$i++;
													}
													?>
												</select>
											</div>
											
											
											
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Identity Number
														<span class="text-danger">*</span>

													</label>
													<input value="<?php echo isset($vendor['id_no'])?$vendor['id_no']:""; ?>" name="id_no" maxlength="80" type="text" class="form-control" required/>
												</div>
											</div>
											
											
											
										
										
										<!--div class="col-md-6">
											<a style="font-size: 10px;font-weight: 900;" href="https://tinypng.com/" target="_BLANK">Click here to compress the image</a> <br>
											
											<?php
												$photourl = !empty($vendor['id_image'])?BASE_URL($vendor['id_image']):
												//$photourl=!empty($_POST['photo_inp'])?"/uploads/".$_POST['photo_inp']:
												"https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D";
							
												
											?>
										
											<!--img onclick="$('.photo_inp').trigger('click');" src="<?php echo $photourl ; ?>" class="preview_photo  img-responsive"> <br>
											<span style="font-size: 10px;font-weight: 900;">Image size should not exceed 5MB. And Upload PNG Image with transparent Background.</span> 
											
											<input type="file" id="photo_inp" accept="image/*" name="photo_inp" class="photo_inp upload5mbonly" preview="preview_photo" style="display:none;"-->
											
											<!--label for="finput" class="cUploadImages">
											<img id="blah" style="max-width:500px; max-height:500px;" name="photo" src="<?php echo $photourl ; ?>" alt="upload image" />
											<br/>Upload Your ID's Image/PDF/Doc File</label>			
											<input type="file" value="<?php echo isset($vendor['id_image'])?$vendor['id_image']:""; ?>" name="photo_inp" multiple="true" accept="image/*" id="finput" onchange="readURL(this);" class="d-none"/>
										</div-->
										
										

										
										<div class="managevendorres" style="clear:both;"></div>
										<div style="clear:both;"></div>
										<div class="col-md-12 mt-2">
											<button class="btn btn-primary" type="submit"><?php echo !empty($vendor['id'])?"Update vendor":"submit"; ?></button>
												<button class="btn btn-outline-danger btn-cancel" type="button"><a class="text-info" href="<?php echo BASE_HTTP_REL_URL; ?>administrator/vendors/view/">Cancel</a></button>

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
										<a class="btn btn-success" href="<?php echo base_url('administrator/vendors/view/add'); ?>" >Add New Vendor</a>
									</div>
									<div style='clear:both;'></div>
									<div class="table-responsive">
										<table id="tabeldatahere" class="table table-striped">
											<thead>
												<tr>
													<th>name</th>
													<!--th>Image</th-->
													<th>Category</th>
													<th>Mobile No.</th>
													<!--th>vehicle</th-->
													<th>Cardtype</th>
													<th>Id Card Number</th>
													<th>Status</th>
													<th>Added on</th>
													<th>Last Updated On</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
														
													if(!empty($list_vendor))
													{
														foreach($list_vendor as $stf)
														{
															//print_r($list_vendor);
															//exit;
												?>
															<tr>
																<td><?php echo $stf['name']; ?></td>
																<!--td><img style="width:100px; height:70px;"src="<?php echo BASE_HTTP_REL_URL; ?><?php echo $stf['id_image']; ?>"></td-->
																<!--td><img style="width:100px; height:70px;" src="<?php echo BASE_HTTP_REL_URL; ?><?php echo $stf['id_image']; ?>"onerror="this.onerror=null;this.src='<?php echo BASE_URL('assets/logo.png');?>'"></td-->


																<td><?php echo $stf['vcat'];?></td>
																<td><?php echo $stf['mobile']; ?></td>
																<!--td><?php echo $stf['vehicle']; ?></td-->
																<td><?php echo $stf['cardtype']; ?></td>
																<td><?php echo $stf['id_no']; ?></td>


																<td><?php echo !empty($stf['status'])?"<button onclick='status(this);' t='vendor'   i='id'  v='$stf[id]' s='1' type='button' class='btn btn-success'>Unblock</button>":"<button onclick='status(this);' t='vendor' i='id' v='$stf[id]' s='0' type='button' class='btn btn-danger'>Block</button>"; ?></td>
																<td><?php echo showtime4db($stf['added']); ?></td>
																<td><?php echo showtime4db($stf['updated']); ?></td>
																
																<td><a class="fa fa-edit" href="<?php echo base_url("administrator/vendors/view/$stf[id]"); ?>"></a></td>
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
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/custom.js?v=0.03"></script>
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