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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"   />
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
                                    <h4 class="mb-sm-0">Manage Entry</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Entry List</a></li>
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
										<form onsubmit="return dorequest('<?php echo base_url('executive/guest/manage_entry'); ?>','.manageEntryfrm','.manageEntryres');" method="POST" class="row manageEntryfrm">
													
												
												<div class="col-md-4" style="margin-top:20px">
													 <label>
														Property
														<span class="text-danger">*</span>
													</label>						
													<select  class="form-control dropdown_filter"  name="property_id" required>
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
												<div class="col-md-4" style="margin-top:20px">
												     <label>
														 Guest Name 
														<span class="text-danger">*</span>
													</label>
													<input value="" name="guest_name" maxlength="80"  type="text" class="form-control" required/>
												</div>
												<div class="col-md-4" style="margin-top:20px">
													 <label>
														Mobile Number 
														<span class="text-danger">*</span>
													</label>
                                                     <input type="text" value="" name="guest_mobile" maxlength="80"  class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required />
													
												</div>
												<div class="col-md-4" style="margin-top:20px">
													 <label>
														Gender 
														<span class="text-danger">*</span>
													</label>
                                                    <select required class="form-control" name="guest_gender">
														<option value="">None</option>
															<?php
															  $selected = "";
															  $gender= ['Male', 'Female', 'Other',];
															  
															  
															  for($i=0;$i<3;$i++)
															  { 
																if(isset($curuser['gender']) && $curuser['gender']==$gender[$i]){
																  $selected = "selected='selected'"; 
																}else{
																  $selected="";
																}
																		  
															  ?>
															  <option <?php echo $selected ?> value="<?php echo isset($curuser['gender'])&&($curuser['gender']==$gender[$i])?$curuser['gender']:$gender[$i]; ?>" ><?php echo $gender[$i]; ?></option>
															  <?php
															  }
															  ?>
													</select>	
												</div>
													
												<div class="col-md-4">
												<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Visiting Date 
														<span class="text-danger">*</span>
													</label>
													
													<div class="input-group date" class="datepicker">
														<input readonly value="" type="text" class="form-control datepicker_inp" name="visiting_date" placeholder="" required>
														
													</div>
												</div>
											</div>
											
											<div class="mb-5">	
												
												<div class="col-lg-12">
													<div class="form-group mb-0">
														<div class="form-group">
															<label>Description</label>
															<textarea  class="form-control " type="text"  name="description" style='min-height: 115px;' required></textarea>
														</div>
													</div>
												</div>
											</div>	
												
											<div style="clear:both;"></div>
											<div class="manageEntryres" style="clear:both;"></div>
											<div class="row">
												<div class="col-12 text-center">
													<button class="btn btn-primary" type="submit">Submit</button>
													<button class="btn btn-outline-danger btn-cancel" type="button"><a class="text-info" href="<?php echo BASE_HTTP_REL_URL; ?>executive/entry/view">Cancel</a></button>
												</div>
											</div>

											
											<div style="clear:both;"></div>
										</form>	
                                    </div>
								</div>
                                <div class="card">
                                    <div class="card-body">
						
							<div style='float: right; margin-bottom: 10px;'>
									<a class="btn btn-success" href="<?php echo base_url('executive/entry/view/add'); ?>" >+ New</a>
							</div>
							<div style='clear:both;'></div>
								 <div class="table-responsive">
								<table id="tabeldatahere" class="table table-striped">
									<thead class="text-center">
										<tr>
											
											<th>Property name</th>
												<th>Guest name</th>
												<th>Mobile</th>
												<th>Created By</th>
												<th>Visiting Date</th>
												<th>Status</th>
												<th>OTP</th>
												<th>Share OTP</th>
										</tr>
									</thead>
									<tbody class="text-center">
										
									
										<?php 
										if(!empty($guest_list))
										{
											
										
											
										foreach($guest_list as $myguest)
										 {
											?>
											<tr>
											    <td><?php echo $myguest['pro_name']; ?></td>
												<td><?php echo $myguest['guest_name']; ?></td>
												<td><?php echo $myguest['guest_mobile']; ?></td>
												<td><?php echo $myguest['created_by']; ?></td>
												<td>
												<?php echo date('d-m-Y',strtotime($myguest['visiting_date']))."<br>"; ?>
												 <?php
												  $today = date('Y-m-d');
												  
												  if($today > $myguest['visiting_date'])
												  {
													?>  
													   <span class="text-danger">Expired</span>
													<?php
												  }
												  else
												  {
													  ?> 
													 <span class="text-info">coming soon</span>
													  
													 <?php  
												  }
												 
												 ?>
												</td>
												<td>
													<?php
													// 2 - in process, 3 booking confirm, 4 booking cancel
													switch($myguest['status'])
													{
													
													case 0:
													?>
													<a class="btn btn-info badge-info" href="#" >not visited</a>
													<?php
													break;
													case 1:
													?>
													<a class="btn btn-success" href="#" >visited</a>
													<?php
													break;
													
													
													}
													?>
												</td>
												<td><?php echo $myguest['otp']; ?></td>
												<td>
												    <a class="btn-success  btn" target="_blank" href="<?php echo 'https://api.whatsapp.com/send?phone='.$myguest['guest_mobile'].'&text='.$myguest['otp'].'<br>'. 'This is your Check in and Check out OTP'; ?>">
												       <i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i>
												    </a>
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
				$(function(){
					
					$( ".datepicker_inp" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear:true, changeMonth:true });
				
				});
		</script>
		
		
		
	
		
		
	
		
		
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>
			<?php
					$this->load->view('admin/include/eodcode');
			?>
    </body>
</html>