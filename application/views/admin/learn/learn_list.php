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
                                    <h4 class="mb-sm-0">List</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
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
										<form onsubmit="return dorequest('<?php echo base_url('administrator/learn/managelearn'); ?>','.managelearnlrn','.managelearnres');" method="POST" class="row managelearnlrn">
										<h4>Special Coupon</h4>
				
											<input value="<?php echo !empty($learn['id'])?$learn['id']:0; ?>" name="learn[id]" type="hidden" />
											<div class="row">
												<div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															name
															<span class="text-danger">*</span>
														</label>
														<input value="<?php echo isset($learn['name'])?$learn['name']:""; ?>" name="learn[name]" maxlength="80" required type="text" class="form-control"  required/>
													</div>
												</div>
											</div>
											
									
										
										
							
											<div class="col-md-6">
												<div class="mb-3">
													<label>
														password
														<span class="text-danger">*</span>
													</label>
													<input value="<?php echo isset($learn['password'])?$learn['password']:""; ?>" name="learn[password]" maxlength="80" required type="password" class="form-control"  required/>
												</div>
											</div>
										</div>
										
										
										<div class="row">
											<div class="col-md-6">
												<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Start Date
														<span class="text-danger">*</span>
													</label>
													
													<div class="input-group date">
														<input readonly value="<?php echo isset($learn['start_date'])?$learn['start_date']:""; ?>" type="text" class="form-control datepicker_inp" name="learn[start_date]" placeholder="mm/dd/yyyy" required>
													</div>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<small>&nbsp;</small>
												<div class="mb-3">
													<label>
													End Date
														<span class="text-danger">*</span>
													</label>
													
													<div class="input-group date">
															<input readonly value="<?php echo isset($learn['end_date'])?$learn['end_date']:""; ?>" type="text" class="form-control datepicker_inp" name="learn[end_date]" placeholder="" required />
													</div>
												</div>
											</div>
										</div>
					
										<div class="managelearnres" style="clear:both;"></div>
										<div style="clear:both;"></div>
										<div class="col-md-12">
											<button class="btn btn-primary" type="submit"><?php echo !empty($learn['id'])?"Update learn":"submit"; ?></button>
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
										<a class="btn btn-success" href="<?php echo base_url('administrator/learn/add'); ?>" >Add learn</a>
									</div>
									<div style='clear:both;'></div>
									<div class="table-responsive">
										<table id="tabeldatahere" class="table table-striped">
											<thead>
												<tr>
													<th>Id</th>
													<th>Name</th>
													<th>Password</th>
													<th>Status</th>
													<th>Added </th>
													<th>Updated </th>

												</tr>
											</thead>
											<tbody>
												<?php
													if(!empty($list_learn))
													{
														foreach($list_learn as $lrn)
														{
												?>
															<tr>
																<td><?php echo $lrn['id']; ?></td>
																<td><?php echo $lrn['name'];?></td>
																<td><?php echo $lrn['password']; ?></td>
																<td><?php echo !empty($lrn['status'])?"<button onclick='updatestatus(this);' t='learn'   i='id'  v='$lrn[id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='learn' i='id' v='$lrn[id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
																<td><?php echo showtime4db($lrn['added']); ?></td>
																<td><?php echo showtime4db($lrn['update']); ?></td>
																
																<td><a class="fa fa-edit" href="<?php echo base_url("administrator/learn/$lrn[id]"); ?>"></a></td>
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