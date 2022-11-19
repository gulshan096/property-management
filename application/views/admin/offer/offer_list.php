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
                                    <h4 class="mb-sm-0">Offer List</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Offer List</a></li>
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
										<form onsubmit="return dorequest('<?php echo base_url('administrator/offer/manageoffer'); ?>','.manageofferfrm','.manageofferres');" method="POST" class="row manageofferfrm">
										<h4>Special Coupon</h4>
				
											<input value="<?php echo !empty($offer['offer_id'])?$offer['offer_id']:0; ?>" name="offer[offer_id]" type="hidden" />
											<div class="row">
												<div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Coupon Code 
															<span class="text-danger">*</span>
														</label>
														<input value="<?php echo isset($offer['code'])?$offer['code']:""; ?>" name="offer[code]" maxlength="80" required type="text" class="form-control"  required/>
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-6">
													<div class="form-group mb-3">
														<div>
															
															
															
															<?php 
															$offer['dis_type']=isset($offer['dis_type'])?$offer['dis_type']:"percent";
															?>
															
															<label><input <?php if($offer['dis_type']=='flat') {echo "checked='checked'";}   ?> type="radio" name="group1" value="flat"> Flat</label>
															<label><input  <?php if($offer['dis_type']=="percent"){echo "checked='checked'";}  ?> type="radio" name="group1" value="percent"> Percent</label>
														</div>  
													</div>
												</div>
											</div>
										
										<div class="row discount_class"  id="percent" style="<?php if($offer['dis_type']=="flat") { echo "display:none";  } ?>">
											<div class="col-md-6">
												 <div class="form-group mb-3" >
													<label>
														Percent Discount Value 
														<span class="text-danger">*</span>
													</label>						
													<select class="form-control" id="exampleFormControlSelect1" name="dis_percent">
														<option value="">None</option>

														<?php $i=1;
														$selected = "";
														while($i<=50)
														{
															if(isset($offer['discount']) && $offer['discount']==$i)
															{ 
																$selected = "selected='selected'"; 
															}else{
																$selected = "";

															}
														?>
														<option <?php echo $selected ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
														<?php
															$i++;
														}
														?>
													</select>
												 </div>
											</div>
										</div>
										
										<div class="row discount_class"  id="flat" style="<?php if($offer['dis_type']=="percent") { echo "display:none";  } ?>"> 
											<div class="col-md-6">
												<div class="mb-3">
													<label>
														Flat Discount Value
														<span class="text-danger">*</span>
													</label>
													<input value="<?php if(isset($offer['discount']) && $offer['dis_type']=='flat'){ echo $offer['discount']; }else {echo "";} ?>" name="dis_flat" maxlength="80" type="text" class="form-control" />
												</div>
											</div>
										</div>
										
										
										<div class="row">
											<div class="col-md-6">
												<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Offer Start Date
														<span class="text-danger">*</span>
													</label>
													
													<div class="input-group date">
														<input readonly value="<?php echo isset($offer['start_date'])?$offer['start_date']:""; ?>" type="text" class="form-control datepicker_inp" name="offer[start_date]" placeholder="mm/dd/yyyy" required>
													</div>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Offer End Date
														<span class="text-danger">*</span>
													</label>
													
													<div class="input-group date">
														<input readonly value="<?php echo isset($offer['end_date'])?$offer['end_date']:""; ?>" type="text" class="form-control datepicker_inp" name="offer[end_date]" placeholder="" required />
													</div>
												</div>
											</div>
										</div>
					
										<div class="manageofferres" style="clear:both;"></div>
										<div style="clear:both;"></div>
										<div class="col-md-12">
											<button class="btn btn-primary" type="submit"><?php echo !empty($offer['offer_id'])?"Update offer":"submit"; ?></button>
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
										<a class="btn btn-success" href="<?php echo base_url('administrator/offer/add'); ?>" >Add Offer</a>
									</div>
									<div style='clear:both;'></div>
									<div class="table-responsive">
										<table id="tabeldatahere" class="table table-striped">
											<thead>
												<tr>
													<th>Code</th>
													<th>Discount type</th>
													<th>Discount</th>
													<th>Status</th>
													<th>Added on</th>
													<th>Last Updated On</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
														
													if(!empty($list_offer))
													{
														foreach($list_offer as $ofr)
														{
												?>
															<tr>
																<td><?php echo $ofr['code']; ?></td>
																<td><?php echo $ofr['dis_type'];?></td>
																<td><?php echo $ofr['discount']; ?></td>
																<td><?php echo !empty($ofr['status'])?"<button onclick='updatestatus(this);' t='offer'   i='$ofr[offer_id]'  v='$ofr[discount]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='offer' i='$ofr[offer_id]' v='$ofr[discount]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
																<td><?php echo showtime4db($ofr['added']); ?></td>
																<td><?php echo showtime4db($ofr['updated']); ?></td>
																
																<td><a class="fa fa-edit" href="<?php echo base_url("administrator/offer/$ofr[offer_id]"); ?>"></a></td>
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
        <script src="assets/admin/themes/assets/js/app.js?v=0.2"></script>
			<?php
					$this->load->view('admin/include/eodcode');
			?>
    </body>
</html>