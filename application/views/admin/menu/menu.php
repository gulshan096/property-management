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
                                    <h4 class="mb-sm-0">Menu items List</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Menu items List</a></li>
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
									<script>
									function create_digi_contract()
                                    {
                                                 
                                        return dorequest("<?php echo base_url('administrator/food/managemenu'); ?>",".foodfrm",".foodres");
                                        return false;          
                                    }
                            	</script> 
										<form onsubmit="return create_digi_contract();" method="POST" class="row foodfrm" enctype="multipart/form-data">
								         <input value="<?php echo !empty($get_menu['meal_id'])?$get_menu['meal_id']:0; ?>" name="meal_id" type="hidden" >
								<div class="card ">
									<div class="card-body">
										<!--<div class="col-lg-12 bg-success">-->
											<input value="<?php echo !empty($menu['meal_id'])?$menu['meal_id']:0; ?>" name="meal_id" type="hidden" >
											
											<div class="row">
												<div class="form-group col-md-5">
													<div id="propertyD">
													    <label>PROPERTY NAME</label>
														<select class="form-control dropdown_filter" name="property_id" required>
															     <option value="">select</option>
															    <?php
																	
																	foreach($property as $ar)
																	{
																			
																	if($ar['pro_name'] == $menu['pro_name']  && isset($menu['meal_id']))
																	{
																	?>
																			
																	<option selected value="<?php echo $ar['pid']; ?>"><?php echo $ar['pro_name']; ?></option>
																	<?php
																	}
																	else
																	{
																	?>
																	<option value="<?php echo $ar['pid']; ?>"><?php echo $ar['pro_name']; ?></option>
																	<?php
																	}
																			
																	}
																?>
														</select>
													</div>
												</div>
												<div class="form-group col-md-5">
													<div id="propertyD">
													    <label>Meal Type</label>
														<select class="form-control dropdown_filter"  name="mealtype" required>
											            <option value="">select</option>
											            	<?php
															   $mealtype = ['Breakfast', 'Lunch','Dinner'];
															   foreach($mealtype as $meal_arr)
															   {
															   if($meal_arr == $menu['mealtype'])
															   {
															   ?>
														             <option selected value="<?php echo $meal_arr; ?>"><?php echo $meal_arr; ?></option>
															   <?php
															   }
															   else
															   {
															   ?>
															   <option value="<?php echo $meal_arr; ?>"><?php echo $meal_arr; ?></option>
															   <?php
															   }
																		
															   }
															 ?>
													</select>
													</div>
												</div>
											</div>	
											
											<table class="table ">
												<thead >
												
													<tr class="">
														
														<th class="text-left " colspan="">Meal Item<span class="text-danger">*</span></th>
														<th class="text-left " colspan="">Price<span class="text-danger">*</span></th>
														<?php 
															   if(!isset($menu))
															   {
																?>
																<th><a href="javascript:void(0)" class=""  id="add"><i class="fa text-success fa-plus-circle fa-2x"></i></a></th>
																
																<?php  
															   }   
															?>
														
													</tr>
												</thead>
												<tbody id="mr">
														<tr class="">     
															
															
															<?php 
															   if(!isset($menu))
															   {
																?>
																<td class="">
																     <input type="text"  class="form-control" name="mealitem[]" required>
															    </td>
															    <td class="">
																     <input  type="text"  class="form-control" name="price[]" required>
															    </td>
																<td>
															        <a href="javascript:void(0)" class=""  id=""><i class="fa text-danger fa-times-circle fa-2x"></i></a>
															    </td>  
																
																<?php  
															   }
															   else
															   {
																   ?>
																   
																   <td class="">
																<input type="text" value="<?php echo isset($menu['meal_id'])?$menu['mealitem']:"" ;  ?>" class="form-control" name="mealitem" required>
															</td>
															<td class="">
																<input  type="text" value="<?php echo isset($menu['meal_id'])?$menu['price']:"" ;  ?>" class="form-control" name="price" required>
															</td>
																  <?php
															   }
															   
															?>
															
													    </tr>
												</tbody>
											</table>	
										</div>
									</div>
								</div>
								<div class=" container">
										<div class="card-body">
											<div class="foodres" style="clear:both;"></div>
										    <div style="clear:both;"></div>
											
											
											<button type="submit" class="btn btn-primary mr-8pt"><?php echo !empty($menu['meal_id'])?"Update ":"submit"; ?></button>
											<a href="<?php echo base_url('administrator/service_manage'); ?>" class="btn btn-danger btn-sm p-2">
												Cancel
											</a>
										
										</div>
						
								</div>
							</form>
								</div>
							</div>
							
                            <div class="card">
								<div class="card-body">
						
									<div style='float: right; margin-bottom: 10px;'>
										<a class="btn btn-success" href="<?php echo base_url('administrator/food/viewall/add'); ?>" >Add Menu Items</a>
									</div>
									<div style='clear:both;'></div>
									<div class="table-responsive">
										<table id="tabeldatahere" class="table table-striped">
											<thead>
												<tr>
													<th>Property Name</th>
													<th>Meal Type</th>
													<th>Meal Item</th>
													<th>Price</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													
													if(!empty($list_menuitem))
													{
														foreach($list_menuitem as $stf)
														{
												?>
															<tr>
																<td><?php echo $stf['pro_name']; ?></td>
																<td><?php echo $stf['mealtype'];?></td>
																<td><?php echo $stf['mealitem']; ?></td>
																<td><?php echo $stf['price']; ?></td>
															

																<td><?php echo !empty($stf['status'])?"<button onclick='updatestatus(this);' t='menu'   i='meal_id'  v='$stf[meal_id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='menu' i='meal_id' v='$stf[meal_id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
																
																<td><a class="fa fa-edit" href="<?php echo base_url("administrator/food/viewall/$stf[meal_id]"); ?>"></a></td>
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
			 
					$(document).ready( function () {
						$('#tabeldatahere').DataTable();
					} );
			
		</script>
		
		<script>

				$(document).ready(function(){
				$("#add").click(function(){
					
				var tr = '<tr class="">'+
					
					'<td class="" colspan=""><input type="text" class="form-control" name="mealitem[]" required></td>'+
					'<td class="" colspan=""><input  type="text" class="form-control" name="price[]" required></td>'+
					
					'<td><a href="javascript:void(0)" class="" id="rm"><i class="fa text-danger fa-times-circle fa-2x"></i></a></td>'+
				'</tr>'
				$("#mr").append(tr);
				});
				$('#mr').on('click','#rm', function(){
					
				$(this).parent().parent().remove();
				});
				});
        </script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.3"></script>
			<?php
					$this->load->view('admin/include/eodcode');
			?>
    </body>
</html>