
<!doctype html> 
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php echo $seo['title']; ?></title>
		<meta content="<?php echo $seo['description']; ?>" name="description" />
		<!-- App favicon -->
		<link rel="shortcut icon" href="<?php echo BASE_HTTP_REL_URL; ?>/favicon.ico" />
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" >
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
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
			
			.dropdown_filter > .select2-container {
              width: 100% !important;
               }
               
               @media (max-width:360px){
                 
                 .booking_top .left_sec {
                    width:100%; 
                 }  
                 .booking_top .left_sec h2{
                    font-size:20px; 
                    
                 }
                 .booking_top .right_sec a{
                  position:absolute;
                  left:0;
                  top:95%;
                 }
                
               }
                .booking_top .right_sec a{
                    position:absolute;
                    right:0;
                    
                 }
		</style>
		<style>
		
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
							<div class="d-flex booking_top">
								<div class="left_sec">
									<h2 class="mb-0">
									Pricing/Package Management  </h2>
									<ol class="breadcrumb p-0 m-0 ">
										<li class="breadcrumb-item">
										    <a href="https://tutoratti.com/dashboard">Dashboard</a>
										</li>
										<li class="breadcrumb-item active">
										Pricing/Package list </li>
									</ol>
								</div>
								<div class=" right_sec">
									<a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/Package/viewall/add" class="btn btn-primary">Create Package</a>
								</div>
							</div>
						</div>
						<!-- start page title -->
						<div class="col-lg-12 addform">
						    
						        <script>
									function create_digi_contract()
                                    {
                                                 
                                        return dorequest("<?php echo base_url('administrator/Package/manage_package'); ?>",".packagefrm",".packageres");
                                        return false;          
                                    }
                            	</script> 
						    
							<form onsubmit="return create_digi_contract();" method="POST" class="row packagefrm" enctype="multipart/form-data">
							    <input value="<?php echo !empty($get_package['package_id'])?$get_package['package_id']:0; ?>" name="package_id" type="hidden" >
							    
								<div class="page-separator container mt-5">
							
								<div class="card ">
									<div class="card-body">
										<!--<div class="col-lg-12 bg-success">-->
											<div class="row">
											    <div class="form-group col-md-4 col-lg-3">
													<div id="propertyD">
													    <label>Property</label>
														<select onchange="return GetProperty(this.value)" class="form-control dropdown_filter"  id="location" name="location" required>
														<option value="">select</option>	

                                                            <?php
																	
																	foreach($get_property as $ar)
																	{
																			
																	if($ar['property_id'] == $get_booking['property_id']  && isset($get_booking['property_id']))
																	{
																	?>
																			
																	<option selected value="<?php echo $ar['property_id']; ?>"><?php echo $ar['pro_name']; ?></option>
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
													    <label>From Date<span class="text-danger">*</span> </label>
													    <input type="text" class="form-control datepicker_from_date" name="from_date" value="<?php echo isset($get_booking['from_date'])?date('d-m-Y',strtotime($get_booking['from_date'])):""; ?> " required>
													</div>
												</div>
												<div class="form-group col-md-4">
													<div id="propertyD">
													    <label>To Date<span class="text-danger">*</span> </label>
													    <input type="text" class="form-control datepicker_to_date" name="to_date" value="<?php echo isset($get_booking['to_date'])?date('d-m-Y',strtotime($get_booking['to_date'])):""; ?> " required>
													</div>
												</div>
												<div class="form-group col-md-4 col-lg-3"> 
													<label>Status</label>
													<select class="form-control" name="status">
													  <option value=""></option>
													  <option value="2">Process</option>
													  <option value="3" >Success</option>
													  <option value="4">Cancel</option>
													</select>
												</div>
											</div>
									    </div>
								    </div>
								</div>
								
								<div class="page-separator container">
									<div class="card">
										<div class="card-body">
										    <div class="packageres" style="clear:both;"></div>
											<div style="clear:both;"></div>
											<center class="form-group  mb-0 text-center">
											<button type="submit" class="btn btn-primary mr-8pt"><?php echo !empty($get_package['package_id'])?"Update ":"Create Now"; ?></button>
											<a href="<?php echo base_url('administrator/package-pricing/viewall'); ?>" class="btn btn-danger btn-sm p-2">
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
											    <th>#</th>
												<th>Property Name</th>
												<th>Room No.</th>
												<th>Price</th>
												<th>Status</th>
												
											</tr>
										</thead>
										<tbody>
										    <?php    
                                                if(!empty($list_booking))
                                                {
                                                    $i = 0;
                                                    
                                                    foreach($list_booking as $booked)
                                                    {
                                                      $i++;  
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
            												<td><?php echo $booked['pro_name']; ?></td>
															<td><?php echo $booked['room_no']; ?></td>
            												
            												<td><?php echo $booked['price']; ?></td>
															<td>
															<?php  
															// 2 - in process, 3 booking confirm, 4 booking cancel
															switch($booked['status'])
																{
																	
																	case 2:
																	?>
																	 <a class="badge badge-info" href="#" >process</a>
																	<?php
															        break;
																	case 3:
																	?>
																	 <a class="badge badge-success" href="#" >Booked</a>
																	<?php
															        break;
																	case 4:
																	?>
																	 <a class="badge badge-danger" href="#" >Cancel</a>
																	<?php
															        break;
															
															    }
															?>
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
    
function GetProperty(location)
    {
        {
           $.ajax({
          
          method:'POST',
          url: "<?php echo base_url('administrator/Package/getProperty')  ?>",
          data:{location:location},
          success:function(data){
              
             $('#fetch_property').html(data);
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