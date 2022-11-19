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
		
		<style>
			::placeholder{
				opacity:.4 !important;
			}
			
			#unitD{
			    display:none;
			}
		</style>
		<style>
		<?php
				if(empty($openform))
					{
							echo " .addform { display:none; } ";
					}
		?>
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
						<div class="row container">
							<div class="d-flex">
								<div class="">
									<h2 class="mb-0">
									Facility Maintenance </h2>
									<ol class="breadcrumb p-0 m-0">
										<li class="breadcrumb-item"><a href="https://tutoratti.com/dashboard">Dashboard</a></li>
										<li class="breadcrumb-item active">
										Maintenance list </li>
									</ol>
								</div>
								<div class="ml-auto">
									<a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/service_manage/add" class="btn btn-primary">Add New</a>
								</div>
							</div>
						</div>
						<!-- start page title -->
						<div class="col-lg-12 addform">
						    
						    <script>
									function create_digi_contract()
                                    {
                                                 
                                        return dorequest("<?php echo base_url('administrator/maintenance/service_manage'); ?>",".maintenancefrm",".maintenanceres");
                                        return false;          
                                    }
                            	</script> 
						    
							<form onsubmit="return create_digi_contract();" method="POST" class="row maintenancefrm" enctype="multipart/form-data">
								<div class="card ">
									<div class="card-body">
										<!--<div class="col-lg-12 bg-success">-->
											<input value="<?php echo !empty($get_maintenance['maintenance_id'])?$get_maintenance['maintenance_id']:0; ?>" name="maintenance_id" type="hidden" >
											<div class="row">
												<div class="form-group col-md-6">
													<label>MAINTENANCE IS RAISED FOR</label><br>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-4">
													<div id="propertyD">
													    <label>PROPERTY NAME</label>
														<select onchange="return GetRoomDetail(this.value)" class="form-control dropdown_filter" name="property" id="fetch_property" required>
															     <option value="">select</option>
															    <?php
																	
																	foreach($list_property as $ar)
																	{
																			
																	if($ar['pro_name'] == $get_maintenance['pro_name']  && isset($get_maintenance['maintenance_id']))
																	{
																	?>
																			
																	<option selected value="<?php echo $ar['property_id']; ?>" selected><?php echo $ar['pro_name']; ?></option>
																	<?php
																	}
																	else
																	{
																	?>
																	<option value="<?php echo $ar['property_id']; ?>"><?php echo $ar['pro_name']; ?></option>
																	<?php
																	}
																			
																	}
																?>
														</select>
													</div>
												</div>
												<div class="form-group col-md-4">
													<div id="propertyD">
													    <label>ROOM NO.</label>
													    <select class="form-control dropdown_filter" name="room_id" id="room_id" required>
													    <option value="">select</option>
															    <?php   
													       
													       if(isset($get_maintenance['room_id']))
													       {
													           ?>
													            <option selected value="<?php echo $get_maintenance['room_id']; ?>" selected><?php echo $get_maintenance['room_no']; ?></option>
													           <?php
													       }
													    
													    ?>
													       
													    </select> 
													</div>
													
												</div>
												<div class="form-group col-md-4">
													<label>ASSET</label>
													<select class="form-control dropdown_filter" name="asset" required>
													    <option value="">select</option>
													    	<?php											    
															   $main_frequency = ['asset 1', 'asset 2','asset 3'];
															   foreach($main_frequency as $frequency)
															   {
															   if($frequency == $get_maintenance['asset'])
															   {
															   ?>
														             <option value="<?php echo $frequency; ?>" selected><?php echo $frequency; ?></option>
															   <?php
															   }
															   else
															   {
															   ?>
															   <option value="<?php echo $frequency; ?>"><?php echo $frequency; ?></option>
															   <?php
															   }
																		
															   }
															 ?>
														
													</select>
												</div>
											</div>
										<!--</div>-->
										
										<div class="row">
											<div class="form-group col-md-4">
												<label>SERVICE</label>
												<select class="form-control dropdown_filter" name="servicecategory" required>
												    <option value="">select</option>
												
												    <?php
															   $main_frequency = ['housekeeping', 'furniture','security'];
															   foreach($main_frequency as $frequency)
															   {
															   if($frequency == $get_maintenance['servicecategory'])
															   {
															   ?>
														             <option  selected value="<?php echo $frequency; ?>" selected><?php echo $frequency; ?></option>
															   <?php
															   }
															   else
															   {
															   ?>
																	<option value="<?php echo $frequency; ?>"><?php echo $frequency; ?></option>
															   <?php
															   }
																		
															   }
															 ?>
												</select>
											</div>
											<div class="form-group col-md-4">
												<label>EXECUTIVE</label>
												<select class="form-control dropdown_filter" name="employee" required>
												    <option value="">select</option>
												    
															   <?php
															  
															   foreach($list_executive as $executive)
															   {
															   if($executive['name'] == $get_maintenance['name'] && isset($get_maintenance['maintenance_id']))
															   {
															   ?>
														             <option selected value="<?php echo $executive['aid']; ?>" selected><?php echo $executive['name']; ?></option>
															   <?php
															   }
															   else
															   {
															   ?>
																	<option value="<?php echo $executive['aid']; ?>"><?php echo $executive['name']; ?></option>
															   <?php
															   }
																		
															   }
															 ?>
													
												</select>
											</div>
										</div>
										<div class="form-group ">
											<label>TAG TECHNICIAN</label>
											<textarea class="form-control" name="technician" required><?php echo isset($get_maintenance['technician'])?$get_maintenance['technician']:""; ?> </textarea>
										</div>
										<div class="form-group ">
											<label>DESCRIPTIONS</label>
											<textarea class="form-control" name="description" required>
											    <?php echo isset($get_maintenance['description'])?$get_maintenance['description']:""; ?>
											</textarea>
										</div>
									</div>
									
								</div>
								
								
								<div class="page-separator container">
									<h5>JOB DATE & TIME</h5>
									<div class="card ">
										<div class="card-body">
											<div class="row">
												<div class="form-group col-md-6">
													<label>Run From  <span class="text-danger">*</span> </label>
													<input type="text" class="form-control datepicker_inp" name="from_date" value="<?php echo isset($get_maintenance['from_date'])?date('d-m-Y',strtotime($get_maintenance['from_date'])):""; ?> " required>
												</div>
												<div class="form-group col-md-6">
													
													<label>Run Till <span class="text-danger">*</span> </label>
													<input type="text" value="<?php echo isset($get_maintenance['to_date'])?date('d-m-Y',strtotime($get_maintenance['to_date'])):""; ?>" class="form-control datepicker_inp" name="to_date" required>
												</div>
												
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label>Job Start Time <span class="text-danger">*</span> </label>
													<input type="text" value="<?php echo isset($get_maintenance['maintenance_id'])?date('h:s:a',strtotime($get_maintenance['start_time'])):""; ?>" class="form-control timepicker_start" name="start_time" required>
												</div>
												<div class="form-group col-md-6">
													
													<label>Job End Time <span class="text-danger">*</span> </label>
													<input type="text" value="<?php echo isset($get_maintenance['end_time'])?date('h:s:a',strtotime($get_maintenance['end_time'])):"";?>" class="form-control timepicker_inp_end" name="end_time" required>
												</div>
											</div>
											<div class="row">
											    <div class="form-group">
											        <label>Frequency <span class="text-danger">*</span> </label>
											        <select class="form-control dropdown_filter"  name="frequency" required>
											            <option value="">select</option>
											            	<?php
															   $main_frequency = ['Daily', 'Weekly','Monthly','Yearly'];
															   foreach($main_frequency as $frequency)
															   {
															   if($frequency == $get_maintenance['frequency'])
															   {
															   ?>
														             <option value="<?php echo $frequency; ?>" selected><?php echo $frequency; ?></option>
															   <?php
															   }
															   else
															   {
															   ?>
															   <option value="<?php echo $frequency; ?>"><?php echo $frequency; ?></option>
															   <?php
															   }
																		
															   }
															 ?>
													</select>
											    </div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="page-separator container">
									<h5>CHECK POINTS</h5>
									<div class="card">
										<div class="card-body">
											
											<table class="table py-5 ">
												<thead >
													<tr class="text-center">
														<th class="text-left " colspan="">Check Items<span class="text-danger">*</span></th>
														<th><a href="javascript:void(0)" class=""  id="add"><i class="fa text-success fa-plus-circle fa-2x"></i></a></th>
													</tr>
												</thead>
												<tbody id="mr">
												    <?php
														if(isset($maintenance_checkitems))
														{
																		
														foreach($maintenance_checkitems as $item)
														{
														?>
													<tr class="">
														<td class="" colspan="">
															<input value="<?php echo $item['checkitem']  ?>" type="text" class="form-control" name="checkitem[]" required>
														</td>
														<td><a href="javascript:void(0)" class=""  id=""><i class="fa text-danger fa-times-circle fa-2x"></i></a></td>
													</tr>
										
													  <?php
														}
														}
														else
														{
														?>
														<tr class="">
														<td class="" colspan="">
														    <input type="text" class="form-control" name="checkitem[]" required>
														</td>
														<td><a href="javascript:void(0)" class=""  id=""><i class="fa text-danger fa-times-circle fa-2x"></i></a></td>
													</tr>
														<?php
														}
														?>
												</tbody>
											</table>
											
											<div class="maintenanceres" style="clear:both;"></div>
										    <div style="clear:both;"></div>
											
											<center class="form-group  mb-0 text-center">
											<button type="submit" class="btn btn-primary mr-8pt"><?php echo !empty($get_maintenance['maintenance_id'])?"Update ":"submit"; ?></button>
											<a href="<?php echo base_url('administrator/service_manage'); ?>" class="btn btn-danger btn-sm p-2">
												Cancel
											</a>
											</center>
										</div>
									</div>
								</div>
							</form>
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
												<th>Category</th>
												<th>Executive</th>
												<th>Job Time</th>
												<th>Property</th>
												<th>Room No.</th>
												<th>Pattern</th>
												<th>Created</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
										    
										    	<?php
																					
													if(!empty($list_maintenance))
													{
														foreach($list_maintenance as $maintenance)
														{
											?>
											<tr>
												<td><?php echo $maintenance['servicecategory']; ?></td>
												
												
												<td><?php echo $maintenance['name']; ?></td>
												
												<td><?php echo date('h:i:a',strtotime($maintenance['start_time']))."-".date('h:i:a',strtotime($maintenance['end_time'])); ?></td>
												<td><?php echo $maintenance['pro_name']; ?></td>
												<td><?php echo $maintenance['room_no']; ?></td>
												<td><?php echo $maintenance['frequency']; ?></td>
											
												<td><?php echo date('d-m-Y',strtotime($maintenance['created_at'])); ?></td>
												<td class="">
												    <a class="fa fa-edit" href="<?php echo base_url("administrator/service_manage/$maintenance[maintenance_id]"); ?>"></a>
												    <a class="" href="<?php echo base_url("administrator/service_manage/$maintenance[maintenance_id]"); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js" ></script>
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

$(document).ready(function() {
    $('#tabeldatahere').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script>
			$(function(){
		
				$( ".datepicker_inp" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear:true, changeMonth:true,  minDate: 0 });
				
			});
		</script>
<script>

$(document).ready(function(){
$("#add").click(function(){
var tr = '<tr class="">'+
					'<td  class="" colspan="">'+
										'<input type="text" class="form-control" name="checkitem[]" required>'+
										
					'</td>'+
					
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
	function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#blah').attr('src', e.target.result);
		};
		reader.readAsDataURL(input.files[0]);
	}
	}
	
</script>
<script>
    $(".dropdown_filter").select2({
            placeholder: " -- Select  -- "
    });
</script>

<script>
    
$('.timepicker_inp_start').timepicker({

timeFormat: 'h:mm p',
interval: 60,
minTime: "",
maxTime: '11:00pm',
defaultTime: '10',
startTime: "<?php echo isset($get_maintenance['maintenance_id'])?$get_maintenance['start_time']: ''; ?>",
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
startTime: "<?php echo isset($get_maintenance['maintenance_id'])?$get_maintenance['end_time']: ''; ?>",
dynamic: false,
dropdown: true,
scrollbar: true


});
</script>
    
<script>
  function GetRoomDetail(property_id)
    {
	
        
        if(property_id)
        {
           $.ajax({
          
          method:'POST',
          url: "<?php echo base_url('administrator/roombooking/getRoom')  ?>",
          data:{propertyid:property_id},
          success:function(data){
              
             $('#room_id').html(data);
             $('#room_price').val('');    
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