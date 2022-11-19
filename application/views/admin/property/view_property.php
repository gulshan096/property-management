
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
								    Property Management </h2>
									<ol class="breadcrumb p-0 m-0">
										<li class="breadcrumb-item"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
										<li class="breadcrumb-item active">
									    Property list </li>
									</ol>
								</div>
								<div class="ml-auto">
									<a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/property/add" class="btn btn-primary">Add Property</a>
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
									   
									   
								<script>
									function create_digi_contract()
                                    {
                                                 
                                        return dorequest("<?php echo base_url('administrator/property/manageproperty'); ?>",".managepropertyfrm",".managepropertyres");
                                        return false;          
                                    }
                            	</script> 
										
										<form onsubmit="return create_digi_contract();" method="POST" class="row managepropertyfrm" enctype="multipart/form-data">
											<input value="<?php echo !empty($property['property_id'])?$property['property_id']:0; ?>" name="property_id" type="hidden" >
											<div class="row mb-lg-8pt">
												
												
												<div class="col-lg-12">
													<div class="page-separator">
														<div class="page-separator__text font-weight-bold">Property/Room Details</div>
													</div>
													<div class="card bg-light shadow">
														<div class="card-body">
															<div class="row">
																<div class="col-lg-4">
																	<div class="form-group">
																		<label>Property Name*</label>
																		<input  class="form-control"  type="text" value="<?php echo isset($property['pro_name'])?$property['pro_name']:""; ?>" name="pro_name"  required>
																	</div>
																	<div class="form-group">
																	    <label>Property/Room Type</label>
    																	<select required class="form-control" name="pro_type">
    																		<?php
    																		$protype = ['Apartment', 'Managed House','Co-Living','Gated Society','Co-Working'];
    																		foreach($protype as $ptype)
    																		{
    																		if($ptype == $property['pro_type'])
    																		{
    																		?>
    																		<option value="<?php echo $ptype; ?>" selected><?php echo $ptype; ?></option>
    																		<?php
    																		}
    																		else
    																		{
    																		?>
    																		<option value="<?php echo $ptype; ?>"><?php echo $ptype; ?></option>
    																		<?php
    																		}
    																		
    																		}
    																		?>
    																	</select>
																	</div>
																</div>
																<div class="col-lg-4">
																	<div class="form-group">
																		<label>Total Rooms</label>
																		<input  class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  type="text" value="<?php echo isset($property['pro_total_room'])?$property['pro_total_room']:""; ?>" name="pro_total_room"  required>
																	</div>
																	<div class="form-group">
																		<label>Video URL (<a href="https://www.youtube.com/" target="_BLANK">Youtube</a>)</label>
																		<input class="form-control " type="text" value="<?php echo isset($property['pro_video'])?$property['pro_video']:""; ?>" name="pro_video" placeholder="Enter SEO Title" maxlength="80" value=""  required>
																	</div>
																</div>
																<div class="col-md-4 text-center">
																	<a style="font-size: 10px;font-weight: 900;" href="https://tinypng.com/" target="_BLANK">Click here to compress the image</a> <br>
																	
																	<?php
																		$photourl = !empty($property['pro_img'])?BASE_URL($property['pro_img']):
																											
																		"https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D";
																	?>
																	
																	<label for="finput" class="cUploadImages">
																		<img id="blah" style="max-width:200px; max-height:200px;" name="photo" src="<?php echo $photourl ; ?>" alt="upload Banner" />
																	<br/>Upload Property Image</label>
																	<input type="file" value="<?php echo isset($property['pro_img'])?$property['pro_img']:""; ?>" name="pro_img" multiple="true" accept="image/*" id="finput" onchange="readURL(this);" class="d-none"/ required>
																	
																</div>
																
																<div class="clearfix"></div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-12">
													<div class="page-separator">
														<div class="page-separator__text font-weight-bold">Complete Address of Property</div>
													</div>
													<div class="card bg-light shadow">
														<div class="card-body">
															<div class="row">
															    <div class="col-lg-4">
																	<div class="form-group">
																		<label>Property Status*</label>
																		<select required class="form-control" name="pro_category">
																			<?php
																			$category = ['Completed', 'Ongoing', 'Upcoming',];
																			foreach($category as $cat)
																			{
																			if($cat == $property['pro_category'])
																			{
																			?>
																			<option value="<?php echo $cat; ?>" selected><?php echo $cat; ?></option>
																			<?php
																			}
																			else
																			{
																			?>
																			<option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
																			<?php
																			}
																			
																			}
																			?>
																		</select>
																	</div>
																</div>
																<div class="col-lg-4">
																	<div class="form-group">
																		<label>City</label>
																		
																		<select  class="form-control dropdown_filter" name="pro_city" id="city_id">
														                   <option value="Any City">Any City</option>
                                                                            <?php 
														   
														                     foreach($list_city as $city)
															                 {
																		      if($city['city_id'] == $property['pro_city'] && isset($property['property_id']))
																			  {
																				?>

                                                                                 <option selected value="<?php echo $property['pro_city']; ?>"><?php echo $property['loccity']; ?></option>
                                                                            <?php  
																			  }
																			  else
																			  {
																				?>

                                                                            <option value="<?php echo $city['city_id']; ?>"><?php echo $city['name']; ?></option>
                                                                            <?php  
																			  }
															                 															
																
															                 }
														                    ?>
													                    </select>
																	</div>
																</div>
																
																<div class="col-lg-4">
																	<div class="form-group">
																		<label>Area</label>
																		<select required class="form-control" name="pro_area" id="area_id" >
																		
																		   <option value=""></option>
																		   <?php 
                                                                               if(isset($property['property_id']))
																			   {
																				?>
																				  <option selected value="<?php echo $property['pro_area']; ?>"> <?php echo $property['locarea']; ?> </option>
                                                                                <?php  
																			   }
																		   ?>
																		   
																			
																		</select>
																	</div>
																</div>
																<div class="col-lg-12">
																    <div class="form-group mb-0">
																		<div class="form-group">
																			<label>Address *</label>
																			<textarea  class="form-control " type="text"  name="pro_address" style='min-height: 115px' required>
																			<?php echo isset($property['pro_address'])?$property['pro_address']:""; ?>
																			</textarea>
																		</div>
																	</div>
																</div>
																<div class="clearfix"></div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="col-md-12">
													<div class="page-separator">
														<div class="page-separator__text font-weight-bold">Property Amenities  </div>
													</div>
													<div class="card bg-light shadow">
														<div class="card-body">
														    
															<div class="">
																<?php  $amenties_list = ['Lift', 'Security Guard','Parking','Swimming Pool','Gym','Badminton Court','ClubHouse', 'Play Area','Indoor Games','Wifi','DTH','Tennis Court','Daily Housekeeping','Broadband','Cafeteria','Garden','Health Facilities','Co working Space','Chefs Kitchen','Event Room','Gaming Room']; 
														      foreach($amenties_list as $amenties)
															   {
															   if(isset($property)  && isset($property['property_id']))
															   {
															     $damenties = json_decode($property['pro_amenties']);
															     
															     
															   ?>
															   <label class="checkbox-inline  px-2">
                                                                     <input type="checkbox" <?php echo in_array($amenties,$damenties) ? 'checked' : '' ;  ?>  name="amenties[]" value="<?php echo $amenties; ?>" >  <?php echo $amenties; ?>
                                                                </label>
                                                                    
															   <?php
															   
															   }
															   else
															   {
															   ?>
															   
															   <label class="checkbox-inline px-2">
                                                                     <input type="checkbox" name="amenties[]" value="<?php echo $amenties; ?>" >  <?php echo $amenties; ?>
                                                                </label>
                                                                    
															   <?php
															   }
																		
															   }
														    
														    ?>
                                                                    
                                                                
																<div class="clearfix"></div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="page-separator">
														<div class="page-separator__text font-weight-bold">Property Description</div>
													</div>
													<div class="card bg-light shadow">
														<div class="card-body">
															<div class="row">
																<div class="form-group">
														            <textarea  class="form-control " type="text"  name="pro_des" style='min-height: 115px' required>
														                 <?php   if(isset($property['property_id'])){ echo  $property['pro_des']; } ?>
														            </textarea>
													             </div>
																<div class="clearfix"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="col-lg-12">
												<div class="card mb-0">
													<div class="card-body">
														<div class="managepropertyres" style="clear:both;"></div>
														<div style="clear:both;"></div>
														<div class="form-group mb-0">
															<!--<button type="submit" class="btn btn-success mr-8pt">Save</button>-->
															<!--<button class="btn btn-primary" type="submit"> submit</button>-->
															<button class="btn btn-primary" type="submit"><?php echo !empty($property['property_id'])?"Update Property":"submit"; ?></button>
															<a class="btn btn-outline-danger ml-0" href="<?php echo base_url('administrator/property'); ?>" >Cancel</a>
														</div>
													</div>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
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
									<table id="tabeldatahere" class="table table-striped">
										<thead>
											<tr>
												<th>Name</th>
												<th>Image</th>
												<th>Total Rooms</th>
												<th>City</th>
												<th>Area </th>
												<th>Added on</th>
												
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
											
											<?php
																					
													if(!empty($list_property))
													{
														foreach($list_property as $property)
														{
											?>
											<tr>
												<td><?php echo $property['pro_name'];?></td>
												
												<td><img style="width:100px; height:70px;"src="<?php echo BASE_HTTP_REL_URL; ?><?php echo $property['pro_img']; ?>"></td>
												<td><?php echo $property['pro_total_room'];?></td>
												<td><?php echo $property['loccity'];?></td>
												
												<td><?php echo $property['locarea'];?></td>
												
												<td><?php echo date('d-m-Y',strtotime($property['created_at'])); ?></td>
												
												
												<td><a class="fa fa-edit" href="<?php echo base_url("administrator/property/$property[property_id]"); ?>"></a></td>
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