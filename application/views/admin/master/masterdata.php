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
                                    <h4 class="mb-sm-0">Manage Category
									
									
									<?php 
										$title = $this->input->get('title');	
											if(!empty($title))
												{
													$title = urldecode($title);
													echo " of $title";	
												}
									?>
									
									</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Category</a></li>
                                            <li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <a onclick="$('.addforms').toggle(); $('.reseto2zero').val(0); $('.reseto2blank').val('');" class="btn btn-success" style="float:right;margin-bottom:7px;" ><i class='material-icons icon-body mr-1' >Add</i> New</a>
							<div style="clear:both;"></div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body" >
											
							
            				
			

            <div class="page__container">
                <div class="page-section">
				
				
				<?php
							echo $addmaster;
				
			
				
				
					$showform = $this->input->post('showform');
					
						if(!empty($showform))
							{
								$showform = "";
							} else {
								$showform = "display:none;";
							}
				
				?>
				
                    
                    <div class="row mb-lg-8pt addforms" style="<?php echo $showform; ?>">
                        <div class="col-md-12">
                            <div class="page-separator">
                               <!-- <div class="page-separator__text">Form</div>-->
                            </div>
                            <div class="card">
                                <div class="card-body p-24pt">
								
									<form method="POST" enctype="multipart/form-data" class="row">
										<div class="col-md-8">
									
<input type="hidden" name="issubmit" value="<?php echo md5(time()); ?>" />				
<input type="hidden" class="reseto2zero" name="id" value="<?php echo is_post_value("id",0); ?>" />				
										
										 	 	 			
										
										
											<div class="form-group">
												<label>Title</label>
													<input class="form-control reseto2blank" type="text" name="title" placeholder="Enter Title" maxlength="80" value="<?php echo is_post_value("title",""); ?>" />
											</div>
											<div class="form-group">
												<label>Show Title</label>
													<input class="form-control reseto2blank" type="text" name="metatag" placeholder="Enter Meta Tag" maxlength="80" value="<?php echo is_post_value("metatag",""); ?>" />
											</div>
											<div class="form-group">
												<label> Description</label>
													<textarea class="form-control reseto2blank" name="description" placeholder="Enter Description" maxlength="255"><?php echo is_post_value("description",""); ?></textarea>
											</div>
											
											
								<?php
											//if(!empty($isparent) && $table!='chapter')
												{
								?>
											<div class="form-group">
												<label>Parent</label>
													<select class="form-control reseto2zero" name="parent">
														<option value="0">Parent</option>
														
														<?php
														
	$parent = is_post_value("parent",0);
	
		if(empty($parent))
			{
				$parent	=	$this->input->get('parent');
			}
														
	if(!empty($parentdata))
		{
			foreach($parentdata as $single)
				{
					$v 	=	 $single['id'];
					$s 	=	 $single['title'];	
					$show 	=	 $single['status'];	
						$selected = "";
							if($parent==$v) { $selected = "selected='selected'"; }
								if(!empty($show))
									{
										echo "<option $selected value='$v'>$s</option>";
									}
				}
		}
														?>
														
													</select>
											</div>
								<?php	
												} 
								?>			
					
										
										
					<div class="form-group">
						<button type="submit" class="btn btn-primary mr-8pt">Save</button>
						<button onclick="$('.addforms').toggle();" type="button" class="btn btn-outline-secondary ml-0">Cancel</button>
					</div>
											
											
											
										</div>
										
										<div class="col-md-4 text-center">
											<a style="font-size: 10px;font-weight: 900;" href="https://tinypng.com/" target="_BLANK">Click here to compress the image</a> <br>
											
											<?php
												
												$photourl = !empty($_POST['icon'])?"/uploads/".$_POST['icon']:"https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D";
												
												
											?>
											
											<img onclick="$('.photo_inp').trigger('click');" src="<?php echo $photourl ; ?>" class="preview_photo  img-responsive"> <br>
											<span style="font-size: 10px;font-weight: 900;">Image size should not exceed 5MB. And Upload PNG Image with transparent Background.</span> 
											
											<input type="file" id="photo_inp" accept="image/*" name="photo_inp" class="photo_inp upload5mbonly" preview="preview_photo" style="display:none;">
										</div>
										
										
												<div class="clearfix"></div>
									</form>
                                    
                                </div>
                            </div>
                        </div>
								<div class="clearfix"></div>
                    </div>
				
                    
                    <div class="row mb-lg-8pt">
                        <div class="col-lg-12">
                            <div class="page-separator">
                                <div class="page-separator__text">List</div>
                            </div>
                            <div class="card">
                                <div class="card-body p-24pt">
                           
	<?php											
			if(!empty($alldata))
				{
					?>	
						 <div class="table-responsive">
						<table id="masterdata" class="display" style="width:100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>Title</th>
												
								<?php
											if(!empty($isparent))
												{
													echo "<th>Child</th>";		
												}
								?>
									<th>Added</th>
									<th>Updated</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
					
							<?php
								$btnclass = array();
								
									$btnclass[0]['class']	=	"danger";
									$btnclass[0]['text']	=	"Inactive";
									
									$btnclass[1]['class']	=	"success";
									$btnclass[1]['text']	=	"Active";
							?>		
							
					<?php
							foreach($alldata as $data)
								{
									?>	
										<tr>
											<td><?php echo $data['id']; ?></td>
											<td class="title<?php echo $data['id']; ?>"><?php echo $data['title']; ?></td>
			


	<?php $status = $data['status']; ?>			
					
		<?php
					$tmp = urlencode($data['title']);
			if(!empty($isparent))
				{
					?>
						<td>
					<?php
									if(!empty($status))
										{
							
						$childurl = "$masterurl?parent=$data[id]&title=$tmp";
							
					?>
							
							
<a href="<?php echo $childurl; ?>" class="btn btn-outline-warning">
	<?php
			switch($table)
				{
					case "category":
						echo "Child Category";
					break;
					
					default:
						echo "Child";
					break;
				}
	?>
							</a>
							<?php							
										} else {
							?>
							<a class="btn btn-outline-secondary" style="cursor:not-allowed;">
								N/A
							</a>
							<?php	
										}
							?>
						</td>
					<?php	
				}
		?>
								
		<?php
					if($table=='subject')
						{
							?>
								<td>
									<a href="javascript:void(0);" data-toggle="modal" onclick="chaprer4subject(<?php echo $data['id']; ?>);" data-target="#forChapterModal" class="btn btn-outline-primary">
										Chapters
									</a>
								</td>
							<?php	
						}
		?>						
											
			<td><?php echo showtime4db($data['added']); ?></td>
			<td><?php echo showtime4db($data['updated']); ?></td>
			<td>
					
											
					<?php echo !empty($data['status'])?"<button onclick='updatestatus(this);' t='category' i='id' v='$data[id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='category' i='id' v='$data[id]' s='0' type='button' class='btn btn-danger'>Inactive</button>";; ?>
											
													
													
											</td>
											<td>
			<form method="POST">
				<input type="hidden" name="showform" value="1" />
				<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
				<input type="hidden" name="icon" value="<?php echo $data['icon']; ?>" />
				<input type="hidden" name="title" value="<?php echo $data['title']; ?>" />
				<input type="hidden" name="metatag" value="<?php echo $data['metatag']; ?>" />
				<input type="hidden" name="description" value="<?php echo $data['description']; ?>" />
				<input type="hidden" name="parent" value="<?php echo $data['parent']; ?>" />
				<input type="hidden" name="status" value="<?php echo $data['status']; ?>" />
					<button type="submit" name="submit" class="btn btn-outline-secondary">
						<i class='material-icons icon-body'>edit</i>
					</button>
			</form>		
											</td>
										</tr>
									<?php
								}
					?>
							</tbody>
						<!--	<tfoot>
								<tr>
									<th>ID</th>
									<th>Title</th>
									<th>Added</th>
									<th>Updated</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</tfoot> -->
						</table>
						</div>
					<?php
				} else {
					echo	"
								<div class='alert lead alert-warning'>
									Oops! There is no data here now.
								</div>
							";
				}
	?>
							
							
								
								
						
									
									
                                </div>
                            </div>
                        </div>
                        
								<div class="clearfix"></div>
                    </div>
					
					
                </div>
            </div>
							
									
										
	
									
						
                                    <!-- new code content here -->
											
											

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
					//	$('#tabeldatahere').DataTable({ pageLength:30 });
					} );
			
		</script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>

	<script>
		
	
			$(document).ready(function()
				{
						
					if($( "#masterdata" ).length)
						{
							$('#masterdata').DataTable({
								
				"pageLength": 100,
				"order": [[ 0, "desc" ]],
				dom: 'Bfrtip',
				buttons: [
						// 'copy', 'csv', 'excel', 'pdf', 'print',
						{ extend: 'copy', orientation: 'landscape', pageSize: 'LEGAL', className:'btn btn-sm btn-outline-secondary' },
						{ extend: 'csv', orientation: 'landscape', pageSize: 'LEGAL', className:'btn btn-sm btn-warning' },
						{ extend: 'excel', orientation: 'landscape', pageSize: 'LEGAL', className:'btn btn-sm btn-success' },
						{ extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'LEGAL', className:'btn btn-sm btn-primary' },
						{ extend: 'print', orientation: 'landscape', pageSize: 'LEGAL', className:'btn btn-sm btn-danger' }
					],
									"order": [[ 0, "desc" ]]
								});
						}
				});
	</script>

			<?php
					$this->load->view('admin/include/eodcode');
			?>

    </body>
</html>


