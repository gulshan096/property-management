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
                                    <h4 class="mb-sm-0">Notification</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Notification</a></li>
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
                        <?php echo $addmsg ; ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card addform">
                                    <div class="card-body">
										<form action="<?php echo base_url('administrator/notification/send'); ?>" method="POST" class="row">  
											<input value="<?php echo !empty($msg['id'])?$msg['id']:""; ?>" name="msg[id]" type="hidden" />  
											<div class="col-md-6">
												<small>&nbsp;</small>
												<div class="form-floating mb-3">
													<select name="msg[type]" class="form-control"> 
													<option>Select Notification Type</option> 
													<option>1</option>
													<option>2</option> 
													</select>
													<label>Notification*</label>     
												</div>
											</div>
											<div class="col-md-6">
												<small>&nbsp;</small> 
												<div class="form-floating mb-3">
													<textarea name="msg[message]" maxlength="80" required type="text" class="form-control"><?php echo !empty($msg['message'])?$msg['message']:""; ?> </textarea>
													<label>Message*</label>    
												</div>
											</div>
											<div style="clear:both;"></div>
											<div class="col-md-12 text-center">
												<button class="btn btn-primary" type="submit"><?php echo !empty($msg['id'])?"Update":"Add"; ?></button>  
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
									<a class="btn btn-success" href="<?php echo base_url('administrator/notification/send/new'); ?>" >Add Notification</a>    
							</div>
							<div style='clear:both;'></div>
								<div class="table-responsive">
								<table id="tabeldatahere" class="table table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>Type</th>
											<th>Message</th>
											<th>Status</th>
											<th>Added on</th>
											<th>Last Updated on</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($msg_list))
													{
														foreach($msg_list as $sing)
															{ ?>
												<tr>
														<td><?php echo $sing['id']; ?></td>   
														<td><?php echo $sing['type']; ?></td>
														<td><?php echo $sing['message']; ?></td>
														<td><?php echo !empty($sing['status'])?"<button onclick='updatestatus(this);' t='Notification' i='id' v='$sing[id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='Notification' i='id' v='$sing[id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td> 
														<td><?php echo $sing['added']; ?></td>  
														<td><?php echo $sing['updated']; ?></td> 
														<td>
														<a href="<?php echo base_url("administrator/notification/send/$sing[id]"); ?>" target="_manage"> 
														<i class="fa fa-edit"></i>
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
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/node-waves/waves.min.js"></script>

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
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>
			<?php
					$this->load->view('admin/include/eodcode');
			?>
    </body>
</html>