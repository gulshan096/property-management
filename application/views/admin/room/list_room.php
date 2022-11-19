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
									<h4 class="mb-sm-0">Room List</h4>
									<div class="page-title-right">
										<ol class="breadcrumb m-0">
											<li class="breadcrumb-item"><a href="javascript: void(0);">Room List</a></li>
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
										<form onsubmit="return dorequest('<?php echo base_url('administrator/room/manageroom'); ?>','.manageroomfrm','.manageroomres');" method="POST" class="row manageroomfrm">
											<h4 class="heading">Create Room</h4>
											
											<input value="<?php echo !empty($room['id'])?$room['id']: 0; ?>" name="id" type="hidden" />
											
											<div class="row">
												<div class="col-md-3" style="margin-top:20px">
													<label>
														Property
														<span class="text-danger">*</span>
													</label>
													<select class="form-control"  name="property_id" id="property_id">
														<option value="">None</option>
														<?php
														$selected = "";
														
														if($property){
															foreach($property as $prop){
																if($room){
																	if(isset($prop['pid']) && $prop['pid']==$room['property_id'])
																	{
																		$selected = "selected='selected'";
																	}
																	else
																	{
																		$selected="";
																	}
														?>
														<option <?php echo $selected ?> value="<?php echo isset($room['property_id'])&&($room['property_id']==$prop['pid'])?$room['property_id']:$prop['pid']; ?>"><?php echo $prop['pro_name']; ?></option>
														
														<?php
																}else{
														?>
														<option value="<?php echo $prop['pid'] ?>"><?php echo $prop['pro_name']; ?></option>
														
														<?php
																}
															}
														}
														?>
														
													</select>
												</div>
												
												<div class="col-md-3">
													<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Room No.
															<span class="text-danger">*</span>
														</label>
														<!--select class="form-control"  id="room" name="room_no">
														<option value="">None</option>
														<?php
															if($rooms_avail){
																$selected="";
																foreach($rooms_avail as $rm){
																	if($rm['id']==$room['id']){
																		$selected="selected='selected'";
																	}else{
																		$selected="";
																	}
														?>
														<option <?php echo $selected ?> value="<?php echo $rm['room_no']; ?>"><?php echo $rm['room_no']; ?></option>
														<?php
																}
															}
														?>
													</select-->
													<input value="<?php echo isset($room['id'])?$room['room_no']:""; ?>" name="room_no" type="text" class="form-control" required/>
												</div>
											</div>
											
											<div class="col-md-3" style="margin-top:20px">
												<label>
													Sharing
													<span class="text-danger">*</span>
												</label>
												<select class="form-control"  name="seater" id="seater">
													<option value="">None</option>
													<?php
													$selected = "";
													
													$seater=array(1,2,3,4);
													$i=0;
													while($i<4){
														if(isset($room['seater']) && $room['seater']==$seater[$i]){
															$selected = "selected='selected'";
														}else{
															$selected="";
														}
													?>
													<option <?php echo $selected ?> value="<?php echo isset($room['seater'])&&($room['seater']==$seater[$i])?$room['seater']:$seater[$i]; ?>"><?php echo $seater[$i]; ?></option>
													<?php
													$i++;
													}
													?>
												</select>
											</div>
											<div class="col-md-3">
												<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Price /bed
														<span class="text-danger">*</span>
													</label>
													<input value="<?php echo isset($room['id'])?$room['price']:""; ?>" readonly name="price" id="price" maxlength="80" type="text" class="form-control" />
												</div>
											</div>
											
											<div class="col-md-6">
												<small>&nbsp;</small>
												<div class="mb-3">
													<table class="table ">
														<thead >
															
															<tr class="">
																<th class="text-left " colspan="">Bed Number<span class="text-danger">*</span></th>
																<th><a href="javascript:void(0)" class=""  id="add"><i class="fa text-success fa-plus-circle fa-2x"></i></a></th>
															</tr>
														</thead>
														<tbody id="mr">
															
															<?php 
															   if(!isset($beds))
															   {
																?>
																<tr class="">
																<td class="">
																	<input  type="text"  class="form-control" name="bed_no[]" required>
																</td>
																<td>
																	<a href="javascript:void(0)" class=""  id="rm"><i class="fa text-danger fa-times-circle fa-2x"></i></a>
																</td>
																</tr>
															   <?php 
															   }
															   else 
															   {  
																foreach($beds as $item)
														        {
														        ?>
																<tr class="">
																<td class="">
																	<input  type="text"  class="form-control" value="<?php echo $item['bed_no'];  ?>" name="bed_no[]" required>
																</td>
																<td>
																	<a href="javascript:void(0)" class=""  id="rm"><i class="fa text-danger fa-times-circle fa-2x"></i></a>
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
											<div class="col-md-6  " style="margin-top:40px;">
												<a style="font-size: 10px;font-weight: 900;" href="https://tinypng.com/" target="_BLANK">Click here to compress the image</a> <br>
												
												<?php
													$photourl = !empty($room['image'])?BASE_URL($room['image']):
													//$photourl=!empty($_POST['photo_inp'])?"/uploads/".$_POST['photo_inp']:
													"https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D";
												
												?>
												
												<label for="finput" class="cUploadImages">
													<img id="blah" style="max-width:500px; max-height:500px;" name="photo" src="<?php echo $photourl ; ?>" alt="upload image" />
												<br/>Upload Your ID's Image/PDF/Doc File</label>
												<input type="file" value="<?php echo isset($room['image'])?$room['image']:""; ?>" name="photo_inp" multiple="true" accept="image/*" id="finput" onchange="readURL(this);" class="d-none"/>
											</div>
											<div class="col-md-12" style="margin-top:20px">
												<div class="form-group mt-4">
													<?php //print_r($role_type)?>
													<label>Amenities</label>
													<span class="text-danger">*</span>
													<div class="row" style="margin-left:1rem;">
														<?php
														if($amenity_dt){
															$rt=array();
															if(!empty($room)){
																$rt=json_decode($room['amenity']);
															}
															$checked = "";
															foreach($amenity_dt as $single)
															{
																if(!empty($rt))
																{
																	if(in_array($single['id'],$rt))
																	{
																		$checked="checked";
													
																	}
																	else
																	{
																		$checked="";
																	}
																}
														?>
														<div class="col-md-3">
															<input <?php echo $checked;?> type="checkbox" id=""  name="amenity[]" value="<?php echo $single['id']; ?>" />
															<label for="1"><?php echo $single['amenity']; ?></label><br>
														</div>
														<?php
														}}
														?>
						
													</div>
												</div>
											</div>
										</div>
										<div class="manageroomres" style="clear:both;"></div>
										<div style="clear:both;"></div>
										<div class="col-md-12 mt-2">
											<button class="btn btn-primary" type="submit"><?php echo !empty($room['id'])?"Update room":"submit"; ?></button>
										</div>
									</div>
									<div style="clear:both;"></div>
								</form>
							</div>
						</div>
						
						<div class="card">
							<div class="card-body">
								
								<div style='float: right; margin-bottom: 10px;'>
									<a class="btn btn-success" href="<?php echo base_url('administrator/room/view/add'); ?>" >Add Room</a>
								</div>
								<div style='clear:both;'></div>
								<div class="table-responsive">
									<table id="tabeldatahere" class="table table-striped">
										<thead>
											<tr>
												<th>S No.</th>
												<th>Room No.</th> 
												<th>Image</th>
												<th>Price</th>
												<th>Seater</th>
												<th>Property</th>
												<th>Status</th>
												<th>Added on</th>
												<th>Last Updated On</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
													
												if(!empty($list_room))
															{	$i=1;
													//print_r($list_room);
													foreach($list_room as $stf)
													{
											?>
											<tr>
												<td><?php echo $i;?></td>
												<td><?php echo $stf['room_no']; ?></td>
												<!--td><img style="width:100px; height:70px;"src="<?php echo BASE_HTTP_REL_URL; ?><?php echo $stf['image']; ?>"></td-->
												<td><img style="width:100px; height:70px;" src="<?php echo BASE_HTTP_REL_URL; ?><?php echo $stf['image']; ?>"onerror="this.onerror=null;this.src='<?php echo BASE_URL('assets/logo.png');?>'"></td>
												<td><?php echo $stf['price'];?></td>
												<td><?php echo $stf['seater'];?></td>
												<td><?php echo $stf['pro_name']; ?></td>
												<!--td><?php echo $stf['email']; ?></td-->
												<td><?php echo !empty($stf['status'])?"<button onclick='updatestatus(this);' t='room'   i='id'  v='$stf[id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='room' i='id'  v='$stf[id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
												<td><?php echo showtime4db($stf['added']); ?></td>
												<td><?php echo showtime4db($stf['updated']); ?></td>
												
												<td><a class="fa fa-edit" href="<?php echo base_url("administrator/room/view/$stf[id]"); ?>"></a></td>
											</td>
										</tr>
										<?php
												$i++;
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
		$('#tabeldatahere').DataTable({
		order: [[0, 'desc']],
		});
		} );
		</script>
		<script>
			$(function(){
						
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
    	$(document).on('change','#seater',function(){
    				//	alert('Change seater Happened');
    		var seater = $('#seater').val();
    		var propertyId = $('#property_id').val();
    		$.ajax({
    									url: baserelativepath+'administrator/Room/room_seater',
    			type:"POST",
    			//cache:false,
    			data:{propertyId:propertyId,seater:seater},
    			success:function(data){
    			$("#price").val(data);
    			
    			}
    		});
    	});
    	
    </script>
    <script>
    				$(document).ready(function(){
    				$("#add").click(function(){
    				var tr = '<tr class="">'+
    					
    					'<td class="" colspan=""><input type="text" class="form-control" name="bed_no[]" required></td>'+
    					'<td><a href="javascript:void(0)" class="" id="rm"><i class="fa text-danger fa-times-circle fa-2x"></i></a></td>'+
    				'</tr>'
    				$("#mr").append(tr);
    				});
    				$('#mr').on('click','#rm', function(){
    					
    				$(this).parent().parent().remove();
    				});
    				});
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