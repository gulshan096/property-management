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
										Booking View </li>
									</ol>
								</div>
								
							</div>
						</div>
						<!-- start page title -->
						<div class="col-lg-12 addform">
							
							
							
							<!--<form onsubmit="return create_digi_contract();" method="POST" class="row bookingfrm" enctype="multipart/form-data">-->
							<input value="<?php echo !empty($get_booking['booking_id'])?$get_booking['booking_id']:0; ?>" name="booking_id" type="hidden" >
							<div class="page-separator container mt-5">
								<h5>User Details</h5>
								<div class="card ">
									<div class="card-body">
										<div class="row">
											<div class="form-group col-lg-4">
												<label>User Name</label>
												<input type="text" class="form-control" value="<?php echo !empty($get_booking['booking_id'])?$get_booking['name']:''; ?>" readonly>
											</div>
											<div class="form-group col-lg-4">
												<label>Email</label>
												<input type="text" class="form-control" value="<?php echo !empty($get_booking['booking_id'])?$get_booking['email']:''; ?>" readonly>
											</div>
											
											<div class="form-group col-lg-4">
												<label>Phone</label>
												<input type="text" class="form-control" value="<?php echo !empty($get_booking['booking_id'])?$get_booking['mobile']:''; ?>" readonly>
											</div>
											<div class="form-group col-lg-4">
												<label>National ID Type</label>
												<input type="text" class="form-control" value="" readonly>
											</div>
											<div class="form-group col-lg-4">
												<label>National ID No.</label>
												<input type="text" class="form-control" value="" readonly>
											</div>
											
											<div class="form-group col-lg-4">
												<label>User ID</label>
												<input type="text" class="form-control" value="<?php echo !empty($get_booking['booking_id'])?$get_booking['tenant_id']:''; ?>" readonly>
											</div>
											<div class="form-group col-lg-4">
												<?php
													//$photourl = !empty($get_booking['booking_id'])?BASE_URL($get_booking['id_image']):
																										
													"https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D";
												?>
												
												
												<img id="blah" style="max-width:150px; max-height:150px;" name="photo" src="" alt="upload" />
												
												
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
													<input type="text" class="form-control" value="<?php echo isset($get_booking['booking_id'])?$get_booking['pro_name']:''; ?>" readonly>
												</div>
											</div>
											<div class="form-group col-md-4">
												<div id="propertyD">
													<label>ROOM NO.</label>
													<input type="text" class="form-control" value="<?php echo isset($get_booking['booking_id'])?$get_booking['room_no']:''; ?>" readonly>
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>Price /Month</label>
												<input id="room_price" type="text" value="<?php echo isset($get_booking['booking_id'])? $get_booking['price']:"";  ?>" class="form-control" name="price" readonly>
											</div>
											<div class="form-group col-md-4">
												<div id="propertyD">
													<label>START FROM<span class="text-danger">*</span> </label>
													<input type="text" class="form-control " readonly name="from_date" value="<?php echo isset($get_booking['booking_id'])?date('d-m-Y',strtotime($get_booking['from_date'])):""; ?> " required>
												</div>
											</div>
											<div class="form-group col-md-4">
												<div id="propertyD">
													<label>TO<span class="text-danger">*</span> </label>
													<input type="text" class="form-control " readonly name="to_date" value="<?php echo isset($get_booking['to_date'])?date('d-m-Y',strtotime($get_booking['to_date'])):""; ?> " required>
												</div>
											</div>
											<div class="form-group col-md-4">
												<div id="propertyD">
													<label>Property Area<span class="text-danger">*</span> </label>
													<input type="text" class="form-control " readonly name="to_date" value="<?php echo isset($get_booking['booking_id'])?$get_booking['area_name'] :""; ?> " required>
												</div>
											</div>
											
											<div class="form-group col-md-8">
												<div id="propertyD">
													<label>Property Address<span class="text-danger">*</span> </label>
													<textarea class="form-control" cols="5" rows="5" readonly>
													<?php echo isset($get_booking['booking_id'])?$get_booking['pro_address']:""; ?>
													</textarea>
													
												</div>
											</div>
											<div class="form-group col-lg-4">
												<?php
													$photourl = !empty($get_booking['booking_id'])?BASE_URL($get_booking['pro_img']):
																										
													"https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D";
												?>
												
												
												<img id="blah" style="max-width:210px; max-height:210px; margin-top:25px;" name="photo" src="<?php echo $photourl ; ?>" alt="upload Banner" />
												
												
											</div>
											<div class="form-group col-md-4">
												<div id="propertyD">
													<label>Property City<span class="text-danger">*</span> </label>
													<input type="text" class="form-control " readonly name="to_date" value="<?php echo isset($get_booking['booking_id'])?$get_booking['city_name']:""; ?> " required>
												</div>
											</div>
											
										</div>
										<!--</div>-->
										
										
										
									</div>
									
								</div>
							</div>
							
							
							
							<div class="page-separator container">
								<div class="card">
									<div class="card-body">
										<div class="bookingres" style="clear:both;"></div>
										<div style="clear:both;"></div>
										<center class="form-group  mb-0 text-center">
										<a href="<?php echo base_url('administrator/booking/').$get_booking['booking_id']; ?>"  class="btn btn-primary mr-8pt"><?php echo !empty($get_booking['booking_id'])?"Edit Booking ":"Book Now"; ?></a>
										<a href="<?php echo base_url('administrator/booking/create'); ?>" class="btn btn-danger btn-sm p-2">
											Cancel
										</a>
										</center>
									</div>
								</div>
							</div>
							<!--</form>-->
						</div>
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
	if (input.files && input.files) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#blah').attr('src', e.target.result);
		};
		reader.readAsDataURL(input.files);
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
<script>

function GetRoomPrice(room_id)
{
if(room_id)
{
$.ajax({

method:'POST',
url: "<?php echo base_url('administrator/roombooking/getRoomDetail')  ?>",
data:{room_id:room_id},
success:function(data){

$('#room_price').val(data);
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