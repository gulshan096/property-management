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
			.btn-cancel a:hover{
				color:white!important;
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
                                    <h4 class="mb-sm-0">Lectricity Bill List</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Electricity Bill List</a></li>
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
                        </style>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card addform">
                                    <div class="card-body">
										<form onsubmit="return dorequest('<?php echo base_url("administrator/Electricity/manageElBill"); ?>','.manageElBillfrm','.manageElBillres');" method="POST" class="row manageElBillfrm">
												<input value="<?php echo isset($electricity['id'])?$electricity['id']: "El".rand().time(); ?>" name="id"  id="elid" type="hidden" />	
												<input type="hidden" value="<?php  echo $electricity['room_id'];  ?>"  name="room_id" id="room_id">
												<input type="hidden" value="<?php  echo $electricity['bed_id'];  ?>"  name="bed_id"  id="bed_id">
												<div class="col-md-4" style="margin-top:20px">
													 <label>
														Property
														<span class="text-danger">*</span>
													</label>						
													<select class="form-control"  name="property_id"  id="property_id">
														<option value="">None</option>

														<?php 
														$selected = "";
														
														if($property){
															foreach($property as $prop){
																if(isset($prop['property_id']) && $prop['property_id']==$electricity['property_id']){
																	$selected = "selected='selected'";
																}else{
																	$selected="";
																}
														?>
																<option <?php echo $selected; ?> value="<?php echo isset($electricity['property_id'])&&$electricity['property_id']==$prop['property_id']?$electricity['property_id']:$prop['property_id']; ?>"><?php echo $prop['pro_name']; ?></option>
																
														<?php
															}
														}
														?>
														
													</select>
												</div>
												<div class="col-md-4" style="margin-top:20px">
												     <label>
														 Username
														<span class="text-danger">*</span>
													</label>
													<select class="form-control"  name="tenant_id"  id="tenant_id">
														<option value="">None</option>		
                                                            <?php 
                                                                if(isset($electricity))
																{
																 ?>
																	  <option selected value="<?php echo $electricity['tenant_id']; ?>"> <?php echo $electricity['name']; ?> </option>
                                                                 <?php  
															    }
															?>														
													</select>
												</div>
												<div class="col-md-4" style="margin-top:20px">
													 <label>
														Room No. 
														<span class="text-danger">*</span>
													</label>
                                                     <input class="form-control" type="text" value="<?php echo isset($electricity)?$electricity['room_no']:'';  ?>" id="room_no" readonly required>
													
												</div>
												<div class="col-md-4" style="margin-top:20px">
													 <label>
														Bed No. 
														<span class="text-danger">*</span>
													</label>
                                                     <input class="form-control" type="text" value="<?php echo isset($electricity)?$electricity['bed_no']:'';  ?>"  id="bed_no" readonly required>
													
												</div>
													
												<div class="col-md-4">
												<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Bill Date
														<span class="text-danger">*</span>
													</label>
													
													<div class="input-group date" class="datepicker">
														<input readonly value="<?php echo isset($electricity['bill_date'])?$electricity['bill_date']:""; ?>" type="text" class="form-control datepicker_inp" name="bill_date" placeholder="" required>
														
													</div>
												</div>
											</div>
												
												
											<div class="col-md-4">
												<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Due Date
														<span class="text-danger">*</span>
													</label>
													
													<div class="input-group date" class="datepicker">
														<input readonly value="<?php echo isset($electricity['due_date'])?$electricity['due_date']:""; ?>" type="text" class="form-control datepicker_inp" name="due_date" placeholder="" required>
														
													</div>
												</div>
											</div>
												
												
						
												<div class="form-group col-md-4">
													<label>Amount</label>
													<input class="form-control reseto2blank" type="text" name="bill_amount" maxlength="80" value="<?php echo isset($electricity['bill_amount'])?$electricity['bill_amount']:""; ?>" />
												</div>
												
												
												<div class="col-md-6 text-center">
													<a style="font-size: 10px;font-weight: 900;" href="https://tinypng.com/" target="_BLANK">Click here to compress the image</a> <br>
													
													<?php
														
														
														
														if(!empty($electricity['id'])  &&  empty($electricity['image'])){
															$photourl=BASE_URL('assets/logo.png');
														}
														else{
															$photourl = !empty($electricity['image'])?BASE_URL($electricity['image']):
														
														"https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D";
														}
													?>
												
													
													
													<label for="finput" class="cUploadImages">
													<img id="blah" style="max-width:500px; max-height:500px;" name="photo" src="<?php echo $photourl ; ?>" alt="upload Area" />
													<br/>Upload Bill</label>			
													<input type="file" value="<?php echo isset($electricity['image'])?$electricity['image']:""; ?>" name="photo_inp" multiple="true" accept="image/*" id="finput" onchange="readURL(this);" class="d-none"/>
												</div>
												
											
												
											
											<div style="clear:both;"></div>
											<div class="manageElBillres" style="clear:both;"></div>
											<div class="row">
												<div class="col-12 text-center">
													<button class="btn btn-primary" type="submit"><?php echo isset($electricity['id'])?"Update Electricity Bill":"Submit"; ?></button>
													<button class="btn btn-outline-danger btn-cancel" type="button"><a class="text-info" href="<?php echo BASE_HTTP_REL_URL; ?>administrator/electricity/bills/viewall">Cancel</a></button>
												</div>
											</div>

											
											<div style="clear:both;"></div>
										</form>	
                                    </div>
								</div>
                                <div class="card">
                                    <div class="card-body">
						
							<div style='float: right; margin-bottom: 10px;'>
									<a class="btn btn-success" href="<?php echo base_url('administrator/electricity/bills/addnew'); ?>" >Add Electricity Bill</a>
							</div>
							<div style='clear:both;'></div>
								 <div class="table-responsive">
								<table id="tabeldatahere" class="table table-striped">
									<thead>
										<tr>
											
											<th>Property</th>
											<th>Room</th>
											<th>Amount</th>
											<th>Bill Date</th>
											<th>Due Date</th>
											<th>Status</th>
											<th>Added on</th>
		
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										
									
										<?php
												if(!empty($list_electricity))
													{
													
														foreach($list_electricity as $sing)
															{
																?>
																	<tr>
																		
																		<td><?php echo $sing['pro_name']; ?></td>
																		<td><?php echo $sing['room_no']; ?></td>
																		<td><?php echo $sing['bill_amount']; ?></td>
																		<td><?php echo $sing['bill_date']; ?></td>
																		<td><?php echo $sing['due_date']; ?></td>
																		
																		<td>
																		   <?php 
																			switch($sing['status'])
																			{
																			
																			case 1:
																			
																			?>
																			
																			<a class="btn btn-info" href="#" >Pending</a>
																			<?php
																			break;
																			case 2:
																			?>
																			<a class="badge badge-success" href="#" >Paid</a>
																			<?php
																			break;
																			case 3:
																			?>
																			<a class="badge badge-danger" href="#" >failed</a>
																			<?php
																			break;
																			
																			}

																	    ?>
																		
																		</td>
																		<td><?php echo showtime4db($sing['added']); ?></td>
																		
																		<td>
																			<a id="<?php echo $sing['eid']; ?>" class="edit-btn" href="<?php echo base_url("administrator/electricity/bills/$sing[eid]"); ?>" target="_manage">
																				<i class="fa fa-edit" ></i>
																			</a>
																		</td>
																	</tr>
													<?php } } ?>
									</tbody>
								</table>
								 </div>		

                               </div>
                                    <!-- end card-body -->
                                   
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
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



        <!-- apexcharts js -->
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- jquery.vectormap map -->
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


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
				  var reader = new FileReader();s

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
				$(function(){
					
					$( ".datepicker_inp" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear:true, changeMonth:true });
				
				});
		</script>
		
		
		<script>
			$(document).ready(function(){
				$('#property_id').on('change', function(){
					var property_id = $(this).val();
			
					if(property_id){
						$.ajax({
							type:'POST',
							url:baserelativepath+'administrator/Electricity/list_electricity_room',
							data:{property_id:property_id},
							success:function(html){
								$('#tenant_id').html(html);
								$('#room_no').val('');
								$('#bed_no').val('');
								$('#room_id').val('');
								$('#bed_id').val('');
							}
						});
					}
					
				});
			});
		</script>
		<script>
			$(document).ready(function(){
				$('#tenant_id').on('change', function(){
					var tenant_id = $(this).val();
			
					if(tenant_id){
						$.ajax({
							type:'POST',
							url:baserelativepath+'administrator/Electricity/tenant_room',
							data:{tenant_id:tenant_id},
							dataType:"json",
							success:function(data){
								$('#room_no').val(data.room_no);
								$('#bed_no').val(data.bed_no);
								$('#room_id').val(data.id);
								$('#bed_id').val(data.bed_id);
							}
						});
					}
					
				});
			});
		</script>
	
		<script>
			function status(selector) 
			{	
			//alert($(selector).attr('t'));
			var t = $(selector).attr('t');
			var i = $(selector).attr('i');
			var v = $(selector).attr('v');
			var s = $(selector).attr('s');
				if(s==1)
					{
						s=0;
						$(selector).removeClass('btn-success');
						$(selector).addClass('btn-danger');
						$(selector).html('Unpaid');
						$(selector).attr('s',s);
					} else {
						s=1;
						$(selector).addClass('btn-success');
						$(selector).removeClass('btn-danger');
						$(selector).html('Paid');
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
		
	
		
		
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>
			<?php
					$this->load->view('admin/include/eodcode');
			?>
    </body>
</html>