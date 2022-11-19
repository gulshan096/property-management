
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
							<div class="d-flex booking_top">
								<div class="left_sec">
									<h2 class="mb-0">
									Property/Room Booking</h2>
									<ol class="breadcrumb p-0 m-0 ">
										<li class="breadcrumb-item">
										    <a href="https://tutoratti.com/dashboard">Dashboard</a>
										</li>
										<li class="breadcrumb-item active">
										Booking list </li>
									</ol>
								</div>
								<div class=" right_sec">
									<a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/booking/add" class="btn btn-primary">Create Booking</a>
								</div>
							</div>
						</div>
						<!-- start page title -->
						<div class="col-lg-12 addform">
						    
						        <script>
									function create_digi_contract()
                                    {
                                                 
                                        return dorequest("<?php echo base_url('administrator/roombooking/booking_save'); ?>",".bookingfrm",".bookingres");
                                        return false;          
                                    }
                            	</script> 
						    
							<form onsubmit="return create_digi_contract();" method="POST" class="row bookingfrm" enctype="multipart/form-data">
							    <input value="<?php echo !empty($get_booking['booking_id'])?$get_booking['booking_id']:0; ?>" name="booking_id" type="hidden" >
							    <div class="page-separator container mt-5">
									<h5>Search User</h5>
									<div class="card ">
										<div class="card-body">
											<div class="row">
												<div class="form-group col-md-4">
													<label>User Name</label>
														<select class="form-control dropdown_filter"  id="user_id" name="user_id" required>
															     <option value="">select</option>
																 
																<?php
																	
																	foreach($get_users as $ar)
																	{
																			
																	if($ar['userid'] == $get_booking['userid']  && isset($get_booking['booking_id']))
																	{
																	?>
																			
																	<option selected value="<?php echo $ar['userid']; ?>"><?php echo $ar['name']; ?></option>
																	<?php
																	}
																	else
																	{
																	?>
																	<option value="<?php echo $ar['userid']; ?>"><?php echo $ar['name']; ?></option>
																	<?php
																	}
																			
																	}
																?>
															    
														</select>
												    </div>
												<div class="form-group col-lg-6  ">
													<label class="ml-5">if you can't find user you can create new user.</label><br>
													<a href="<?php echo base_url('administrator/tenants/view/add'); ?>" class="btn btn-primary btn-sm p-2 ml-5">
												     Create new user
											        </a>	
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="page-separator container">
								<h5>Booking Details</h5>
								<div class="card ">
									<div class="card-body">
										<!--<div class="col-lg-12 bg-success">-->
											<div class="row">
											    <div class="form-group col-md-4">
													<div id="propertyD">
													    <label>PROPERTY NAME</label>
														<select  class="form-control dropdown_filter"  id="fetch_property" name="property_id" required>
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
													<label class="label_ry">Room Type</label>
													<select class="form-control bg-white dropdown_filter" name="seater" id="seater" required>
														<option value="">Select</option>
														<option value="1">1 Bedded</option>
														<option value="2">2 Bedded</option>
														<option value="3">3 Bedded</option>
														<option value="4">4 Bedded</option>
													</select>
												</div>
												<div class="form-group col-md-4">
													<div id="propertyD">
													    <label>ROOM NO.</label>
													    <select onchange="return GetRoomPrice(this.value)" class="form-control dropdown_filter"  name="room_id" id="room_id" required >
													       <option selected value="">select </option>
													       <?php   
													       
													       if(isset($get_booking['room_id']))
													       {
													           ?>
													            <option selected value="<?php echo $get_booking['room_id']; ?>" selected><?php echo $get_booking['room_no']; ?></option>
													           <?php
													       }
													    
													    ?>
													       
													    </select> 
													    
													</div>
												</div>
												<div class="form-group col-md-4">
													<label>Price /Month</label>
													<input id="room_price" type="text" value="<?php echo isset($get_booking['price'])? $get_booking['price']:"";  ?>" class="form-control" name="price" readonly>
												</div>
											    <div class="form-group col-md-4">
													<div id="propertyD">
													    <label>START FROM<span class="text-danger">*</span> </label>
													    <input type="text" class="form-control datepicker_from_date" name="from_date" value="<?php echo isset($get_booking['from_date'])?date('Y/M/d',strtotime($get_booking['from_date'])):""; ?> " required>
													</div>
												</div>
												<div class="form-group col-md-4">
													<div id="propertyD">
													    <label>TO<span class="text-danger">*</span> </label>
													    <input type="text" class="form-control datepicker_to_date" name="to_date" value="<?php echo isset($get_booking['to_date'])?date('Y/M/d',strtotime($get_booking['to_date'])):""; ?> " required>
													</div>
												</div>
												<div class="form-group col-md-4">
													<label>Total Months</label>
													<input id="total_months" type="text" value="<?php echo isset($get_booking['months'])? $get_booking['months']:"";  ?>" class="form-control" name="total_months" readonly>
												</div>
											</div>
									    </div>
								    </div>
								</div>
								<div class="page-separator container">
									<div class="card">
										<div class="card-body">
										    <div class="bookingres" style="clear:both;"></div>
											<div style="clear:both;"></div>
											<center class="form-group  mb-0 text-center">
											<button type="submit" class="btn btn-primary mr-8pt"><?php echo !empty($get_booking['booking_id'])?"Update ":"Book Now"; ?></button>
											<a href="<?php echo base_url('administrator/booking/create'); ?>" class="btn btn-danger btn-sm p-2">
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
											    <th>Username</th>
												<th>Property Name</th>
												<th>Room No.</th>
												<th>Bed No.</th>
												<th>Created on</th> 
												<th>Status</th>
												<th>Invoice</th>
												<th>Action</th>
												
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
            												<td><?php  echo $booked['name']; ?></td>
            												
            												<td><?php  echo $booked['pro_name']; ?></td>
            												
            												<td><?php  echo $booked['room_no']; ?></td> 
															
															<td><?php  echo $booked['bed_no']; ?></td>
            												
            												<!--<td><?php  echo date('d-m-Y',strtotime($booked['from_date'])); ?></td>-->
            												<!--<td><?php  echo date('d-m-Y',strtotime($booked['to_date'])); ?></td>-->
            												<!--<td><?php  echo $booked['status']; ?></td>-->
            											
            												<td><?php  echo date('d-m-Y',strtotime($booked['created_at'])); ?></td>
            											    
															<td>
															<?php  
															// 2 - in process, 3 booking confirm, 4 booking cancel
															switch($booked['status'])
																{
																	
																	case 0:
																	?>
																	 <a class="badge badge-info" href="#" >process</a>
																	<?php
															        break;
																	case 1:
																	?>
																	 <a class="badge badge-success" href="#" >Booked</a>
																	<?php
															        break;
																	case 3:
																	?>
																	 <a class="badge badge-danger" href="#" >Cancel</a>
																	<?php
															        break;
															
															    }
															?>
															</td>
															<td>
            											        <a href="<?php echo base_url('administrator/booking-invoice/').$booked['booking_id']; ?>"><i class="fa fa-file" aria-hidden="true"></i></a>
            											    </td>
            												<td class="">
            												    <a class="fa fa-edit" href="<?php echo base_url('administrator/booking/').$booked['booking_id']; ?>" ></a>
            												    <a class="" href="<?php echo base_url('administrator/booking-view/').$booked['booking_id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
		
	$( ".datepicker_from_date" ).datepicker({ 
	 
	dateFormat: 'yy-mm-dd', 
	changeYear:true, 
	changeMonth:true,  
	minDate: 0 
	});			
});
$(function(){
		
	$( ".datepicker_to_date" ).datepicker({ 
	 
	dateFormat: 'yy-mm-dd', 
	changeYear:true, 
	changeMonth:true,  
	minDate: 0 
	});			
});
</script>
<script>
$(".datepicker_from_date").on("change",function(){

	var begin = new Date($('.datepicker_from_date').val());
	var d = begin.getDate();
    var m = begin.getMonth();
    var y = begin.getFullYear();
	
	$(".datepicker_to_date").datepicker('setDate', new Date(Y, M, d+31));	

     var d1 = new Date($(".datepicker_from_date").val()); 
	 var d2 = new Date($(".datepicker_to_date").val());
	 
	var months;
    months = (d2.getFullYear() - d1.getFullYear()) * 12;
    months -= d1.getMonth();
    months += d2.getMonth();
  
	$("#total_months").val(months);
    
});

</script>
<script>
 $(".datepicker_to_date").on("change",function(){

	
    var d1 = new Date($(".datepicker_from_date").val()); 
	var d2 = new Date($(".datepicker_to_date").val());
	 
	var months;
    months = (d2.getFullYear() - d1.getFullYear()) * 12;
    months -= d1.getMonth();
    months += d2.getMonth();
  
	$("#total_months").val(months);
    
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
    
$('.timepicker_inp').timepicker({

timeFormat: 'h:mm p',
interval: 60,
minTime: '10',
maxTime: '11:00pm',
defaultTime: '10',
startTime: '10',
dynamic: false,
dropdown: true,
scrollbar: true


});
</script>
 
 <script>
                $(document).on('change','#seater',function(){
					
					
					var seater = $('#seater').val();
					var propertyId = $('#fetch_property').val();
					
					 $.ajax({
          
					  method:'POST',
					  url: "<?php echo base_url('user/front/getRoomDetail')  ?>",
					  data:{property_id:propertyId,seater:seater},
					  //dataType:"json",
					  success:function(data){
						  
						 $('#room_id').html(data);
						 //$('#room_price').val(data.price);
						 
					  }
					}); 
				});
            </script> 
<script>
   $(document).on('change','#fetch_property',function(){
    
        $('#seater').val('');
		$('#room_price').val('');
		$('#room_id').val('');
        
      
    });
</script> 

<script>
    
    function GetRoomPrice(room_id)
    {
		
      if(room_id)
        {
           $.ajax({
          
          method:'POST',
          url: "<?php echo base_url('administrator/roombooking/getRoomDetail')  ?>",
          data:{room_id:room_id},
		  dataType:"json",
          success:function(data){
              
             $('#room_price').val(data.price);
          }
        }); 
        }  
    }
</script>

<script>

$(document).ready(function(){ 
	
	$.ajax({
          
          method:'POST',   
          url: "<?php echo base_url('administrator/roombooking/getUser')  ?>",
          success:function(data){
              
             $('#user_id').html(data);
          }
        });
		
});

$(document).ready(function(){
	
	$.ajax({
          
          method:'POST',
          url: "<?php echo base_url('administrator/roombooking/getProperty')  ?>",
          success:function(data){
              
             $('#fetch_property').html(data);
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