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
            
            <!-- Left Sidebar End -->
			 <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
						<?php echo $sidemenu; ?>
                    <!-- Sidebar -->
                </div>
            </div>
            

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
                                    <h4 class="mb-sm-0">Manage Course
									
									
									<?php 
										$course_title = $this->input->get('course_title');	
											if(!empty($course_title))
												{
													$course_title = urldecode($course_title);
													echo " of $course_title";	
												}
									?>
									
									</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Course</a></li>
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
							echo $addcourse;
				
			
				
				
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
											<input type="hidden" class="reseto2zero" name="course_id" value="<?php echo is_post_value("course_id",0); ?>" />				
										
										 	 	 			
										
										
											<div class="form-group">
												<label>Course Title</label>
													<input class="form-control reseto2blank" type="text" name="course_title" placeholder="Enter Course Title" maxlength="80" value="<?php echo is_post_value("course_title",""); ?> " required/>
											</div>
											
											<div class="form-group">
												<label>Course Category</label>

												<select class="form-control input-lg" id="category" name="category_id">
													<option value="">Course Category</option>
													
													
													<?php
														foreach($allcategory as $cat){
														$category_id	=	is_post_value("category_id",'');
															if(!empty($category_id)){
																if($category_id==$cat['id']){
																 $selected = "selected='selected'"; 
																}
																else
																{
																$selected = ""; 	
																}
															}
															echo '<option '.$selected.' value="'.$cat["id"].'">'.$cat["title"].'</option>';
														}


	 
															
															
															
															
															
													
															
															//echo '<option value="'.$cat["id"].'">'.$cat["title"].'</option>';
															
															//print_r(is_post_value("category_id","category_id"));
															//exit;
													
													?>
														
													</select>
													
													
												
												
											</div>
											
											
											
											
											<div class="form-group">
												<label>Course Duration</label>
													<input class="form-control reseto2blank" type="text" name="course_duration" placeholder="Enter Course Duration" maxlength="80" value="<?php echo is_post_value("course_duration",""); ?> " required/>
											</div>
											<div class="form-group">
												<label>Course Description</label>
													<textarea class="form-control reseto2blank" id="text_area" name="course_description" placeholder="Enter Course Description " maxlength="255" ><?php echo is_post_value("course_description",""); ?></textarea>
											</div>
											
											
											
											
											<div class="form-group mt-1">
												<button type="submit" class="btn btn-primary mr-8pt">Save</button>
												<button onclick="$('.addforms').toggle();" type="button" class="btn btn-outline-secondary ml-0">Cancel</button>
											</div>
											
											
											
										</div>
										
										
										
										
										<div class="col-md-4 text-center">
											<a style="font-size: 10px;font-weight: 900;" href="https://tinypng.com/" target="_BLANK">Click here to compress the image</a> <br>
											
											<?php
												$photourl = !empty($_POST['photo_inp'])?BASE_URL($_POST['photo_inp']):
												//$photourl=!empty($_POST['photo_inp'])?"/uploads/".$_POST['photo_inp']:
												"https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D";
							
												
											?>
											
											<!--img onclick="$('.photo_inp').trigger('click');" src="<?php echo $photourl ; ?>" class="preview_photo  img-responsive"> <br>
											<span style="font-size: 10px;font-weight: 900;">Image size should not exceed 5MB. And Upload PNG Image with transparent Background.</span> 
											
											<input type="file" id="photo_inp" accept="image/*" name="photo_inp" class="photo_inp upload5mbonly" preview="preview_photo" style="display:none;"-->
											
											<label for="finput" class="cUploadImages">
											<img id="blah" style="max-width:500px; max-height:500px;" src="<?php echo $photourl ; ?>" alt="upload Image" />
											<br/>Upload Photo</label>			
											<input type="file" name="banner[photo_inp]" multiple="true" accept="image/*" id="finput" onchange="readURL(this);" class="d-none"/>
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
						<table id="masterdata" class="display" style="width:100%">
							<thead>
								<tr>
									<th>Course ID</th>
									<th>Course Title</th>
									<th>Duration</th>
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
										//print_r($data);
										//exit;
									?>	
										<tr>
											<td><?php echo $data['course_id']; ?></td>
											
											<td><?php echo $data['course_title']; ?></td>
											<td><?php echo $data['course_duration']; ?></td>

											<td><?php echo showtime4db($data['added']); ?></td>
											<td><?php echo showtime4db($data['updated']); ?></td>
											<td>
												<?php echo !empty($data['status'])?"<button onclick='updatestatus(this);' t='course' i='course_id' v='$data[course_id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='course' i='course_id' v='$data[course_id]' s='0' type='button' class='btn btn-danger'>Inactive</button>";; ?>
											</td>


											<td>
												<form method="POST">
													<input type="hidden" name="showform" value="1" />
													<input type="hidden" name="category_id" value="<?php echo $data['category_id']; ?>" />
													<input type="hidden" name="course_id" value="<?php echo $data['course_id']; ?>" />
													<input type="hidden" name="course_title" value="<?php echo $data['course_title']; ?>" />
													<input type="hidden" name="course_description" value="<?php echo $data['course_description']; ?>" />
													<input type="hidden" name="course_duration" value="<?php echo $data['course_duration']; ?>" />
													<input type="hidden" name="photo_inp" value="<?php echo $data['image']; ?>" />
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
			var REL_BASE_URL	=	"<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/";
			 
					$(document).ready( function () {
					//	$('#tabeldatahere').DataTable({ pageLength:30 });
					} );
			
		</script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>
	    

		<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>		
		<script>
			CKEDITOR.replace('course_description');
		</script>
		

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



/*----------------------------------------------master model-----------------------------------------------------------------------------------------------------------------------------------*/
<?php
	Class MasterModel extends CI_Model
		{
			function __construct()
				{
				   parent::__construct();
					//$this->load->helper('cookie');
				}
				
			public function addmaster($table)
				{
					$id            =	$this->input->post("id");
					$issubmit      =	$this->input->post("issubmit");
					$title		   =	$this->input->post("title");
					$metatag	   =	$this->input->post("metatag");  
					$description   =	$this->input->post("description");
					$parent		   =	$this->input->post("parent"); 
					$image		   =    uploadimgfile("photo_inp","./assets/img","pre");
					
					$post=$this->input->post();
					print_r($post);
					exit;

				
					    if(empty($parent)) { $parent = 0; }
					
						if(!empty($issubmit) && !empty($title))
							{
								$uarray = array();
									$uarray['title'] 	    =	$title;
									$uarray['metatag']  	=	$metatag;
									$uarray['description'] 	=	$description;
									$uarray['parent']    	=	$parent;
									
									if(!empty($image['status'])){
									$uarray['image']    	=	$image['data']['name'];
									}else{
										print_r("image not found");
									}
									
									
										if(empty($id))
											{
												$uarray['status']   =	1;
												$uarray['added'] 	=	gettime4db();
												$uarray['updated'] 	=	0;
													$this->db->insert($table,$uarray);
							return	"
										<div class='alert alert-success'  role='alert'>
											<i class='material-icons icon-body mr-12pt'>check_circle</i>
											<div class='text-body'>$title is created successfully.</div>   
										</div>
									";		
											} else {
												$uarray['updated'] 	=	gettime4db();
													$this->db->where('id',$id);
													$this->db->update($table,$uarray);
							return	"
										<div class='alert alert-info'  role='alert'>
											<i class='material-icons icon-body mr-12pt'>check_circle</i>
											<div class='text-body'>$title is updated successfully.</div>   
										</div>
									";
											}
							}
					return "";		
				}
				
			public function getmaster($table,$id=0,$parent_id=0,$select="title,id",$status='na')
				{	
				//print_r("inside getmaster");
				//$post=$this->input->post();
							   //print_r($post);exit;
					//print_r($parent); exit;
					$this->db->select($select);	
							if(!empty($parent_id))
								{
									$this->db->where("parent",$parent_id);	
								} else {
									$this->db->where("parent",0);	
								}
								
							if($status!='na')	
								{
									$this->db->where("status",$status);	
								}
								
							if(!empty($id))
								{
									$this->db->where("id",$id);	
								}
								$this->db->from($table);
						$query	=	$this->db->get();
					$result =	$query->result();
						$sendresult = array();
							if(!empty($result))
								{
									foreach($result as $singi)
										{
											$singi	=	(array) $singi; 
											$singi['child'] =	$this->getmaster($table,0,$singi['id'],"title,id"); 
											$sendresult[]	=	$singi;
										}
								} else {
									$sendresult = $result;
								}
					//print_r($sendresult);
					//exit;
					return $sendresult;
				}
				
			
				
			public function get_states($select="name,id")
				{
					$this->db->select($select);
						$this->db->where("status",1);	 
							return $this->db->from("states")->get()->result_array();
				}
				
			public function get_cities($select="name,id")
				{
					$this->db->select($select);
						$this->db->where("status",1);	 
							return $this->db->from("cities")->get()->result_array();
				}
				
				
			public function get_category(){
				$cat=$this->db->select(['title','id'])
								->get('category');
				//print_r("inside get_category()");
				return ($cat->result_array());
				//exit;
			}	
				
				
				
				
				
				
			public function addcourse($table)
				{
					
					$course_id            =	$this->input->post("course_id");
					$issubmit      =	$this->input->post("issubmit");
					$course_title		   =	$this->input->post("course_title");
					$course_description	   =	$this->input->post("course_description");  
					$course_duration   =	$this->input->post("course_duration");
					//print_r($course_id);
					
					$category_id		   =	$this->input->post("category_id"); 
					$image		   =    uploadimgfile("photo_inp","./assets/img","pre");

					//$post=$this->input->post();
					//print_r($post);
					//print_r("category id added ");
					//print_r($category_id);
					//exit;
					
					if(empty($category_id)) { $category_id = 0; }
					
						if(!empty($issubmit) && !empty($course_title))
							{
								
								
								$uarray = array();
									$uarray['course_title'] =	$course_title;
									$uarray['course_description']  	=	$course_description	;
									$uarray['course_duration'] 	=	$course_duration;
									$uarray['category_id']    	=	$category_id;
									
									if(!empty($image['status'])){
									$uarray['image']    	=	$image['data']['name'];
									}
									
									//print_r("image found");
									//exit;
									// }else
										// print_r($image);
										// print_r("image not found");
										// exit;
										// //exit;
									// }
									
										if(empty($course_id ))
											{
												$uarray['status']    	=	1;
												$uarray['added'] 	=	gettime4db();
												$uarray['updated'] 	=	0;
												$this->db->insert($table,$uarray);
							return	"
										<div class='alert alert-success'  role='alert'>
											<i class='material-icons icon-body mr-12pt'>check_circle</i>
											<div class='text-body'>$course_title is created successfully.</div>   
										</div>
									";		
											} else {
												$uarray['updated'] 	=	gettime4db();
												$this->db->where('course_id',$course_id);
												$this->db->update($table,$uarray);
							return	"
										<div class='alert alert-info'  role='alert'>
											<i class='material-icons icon-body mr-12pt'>check_circle</i>
											<div class='text-body'>$course_title is updated successfully.</div>   
										</div>
									";
											}
							}												
					return "";		
				}
				
				public function getcourse($table,$course_id=0,$select="course_title,course_id",$status='na')
				{
					
					
					// print_r($course_id); exit;
					
					$this->db->select($select);	
					
					 // $post=$this->input->post();
					 // print_r($post); exit;
					
					
									
					if($status!='na')	
					{
							$this->db->where("status",$status);	
					}
					if(!empty($course_id))
					{
						$this->db->where("course_id",$course_id);	
					}
					$this->db->from($table);
					$query	=	$this->db->get();
					$result =	$query->result_array();
					/*$sendresult = array();
					if(!empty($result))
					{
						foreach($result as $singi)
							{
								$singi	=	(array) $singi; 
								$singi['child'] =	$this->getmaster($table,0,$singi['parent'],"course_title,course_id"); 
								$sendresult[]	=	$singi;
							}
					} else {
						$sendresult = $result;
					}*/
					return $result;
					//$sendresult = array();
					/*if(!empty($result))
					{
						foreach($result as $singi)
						{
							$singi	=	(array) $singi; 
							$singi['child'] =	$this->getmaster($table,0,$singi['id'],"title,id"); 
							$sendresult[]	=	$singi;
						}
					} else {
						$sendresult = $result;
					}*/	
					//$sendresult = $result;
					//return $result;
				}
			
		}
			
?>



/*-----------------------------------master.php----------------------------------------------------------------------------------------------------------------*/

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller
    {
		
		public function __construct()
			{
				parent::__construct();
					$this->load->helper("common_helper");
						$this->load->model(array('AuthenticationModel','CommonModel','MasterModel'));
			}
					
    	public function updatestatus()
			{
				$this->AuthenticationModel->checklogin();
					$table		=	$this->input->post("t"); 
					$index		=	$this->input->post("i");
					$status		=	$this->input->post("s");
					$value		=	$this->input->post("v");
					$array		=	array(); 
					$array['status']	=	$status;
					$this->db->where($index,$value); 
					$this->db->update($table,$array);
					echo "1";				
			}
				
    	public function status()
			{
				$this->MasterModel->status();
			}
			
    	public function master($table,$isparent)
				{
					// category board class subject chapter				
					// check login and redirect
					
					$this->AuthenticationModel->checklogin('admin');		
					// check login and redirect
					$data	=	array();
					$seo	=	array();
						switch($table)
							{
								case "category":
									$seo['title']		=	"Manage Category";
								break;
								
								default:
									redirect("/");
								break;
							}
					$data['addmaster']		=	$this->MasterModel->addmaster($table);  
					$parent					=	$this->input->get("parent"); 
					// $cat				=	$this->input->post(); 

					// print_r($cat);
					// exit;
					if(empty($parent)) { $parent = 0; }
					$data['alldata']		=	$this->MasterModel->getmaster($table,0,$parent,"*");
					
					$data['parentdata']		=	$this->MasterModel->getmaster($table,0,0,"id,title,status");
					
					$seo['canonical']		=	site_url("administrator/managecategories");
					$seo['favicon']   	    =	"";
					$seo['description']		=	"";
					$data['isparent']       =	$isparent;
					if(!empty($parent)) { $data['isparent']    =	0; }      
					$data['masterurl']      =	site_url("administrator/managecategories"); 
					$data['table']   		=	$table;
					$data['seo']   			=	$seo;
					$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
					$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
					$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
					$data['footer']			=	$this->load->view("admin/include/footer",$data,true); 
					
                $this->load->view('admin/master/masterdata', $data);
				
				
			}
			
			public function add_course($table){
					$this->AuthenticationModel->checklogin('admin');		
					// check login and redirect
					$data	=	array();
					$seo	=	array();
						switch($table)
							{
								
								
								case "course":
									$seo['title']		=	"Manage Course";
								break;
								
								
								default:
									redirect("/");
								break;
							}
							
					
					$data['allcategory']=		$this->MasterModel->get_category();
					
					$data['addcourse']		=	$this->MasterModel->addcourse($table);  
					//$course=$this->input->post();
					//if(!$course){
					//$course_id=0;}
					//else{
					//$course_id=$course['course_id'];}
					$data['alldata']		=	$this->MasterModel->getcourse($table,0,"*");
					
					$seo['favicon']   	    =	"";
					$seo['description']		=	"";
					      
					$data['masterurl']      =	site_url("administrator/managecategories"); 
					$data['table']   		=	$table;
					$data['seo']   			=	$seo;
					$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
					$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
					$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
					$data['footer']			=	$this->load->view("admin/include/footer",$data,true); 
					
                    $this->load->view('admin/master/coursedata', $data);
				
							
							
							/*
						$seo['title']		=	"Manage Course";

					//$data['addmaster']		=	$this->MasterModel->addcourse($table);  
					//$parent					=	$this->input->get("parent"); 
					//if(empty($parent)) { $parent = 0; }
					//$data['alldata']		=	$this->MasterModel->getmaster($table,0,$parent,"*");
					//$data['parentdata']		=	$this->MasterModel->getmaster($table,0,0,"id,title,status");
					//$seo['canonical']		=	site_url("administrator/managecategories");
					$seo['favicon']   	    =	"";
					$seo['description']		=	"";
				
					    
					//$data['masterurl']      =	site_url("administrator/managecategories"); 
					//$data['table']   		=	$table;
					$data['seo']   			=	$seo;
					$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
					$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
					$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
					$data['footer']			=	$this->load->view("admin/include/footer",$data,true); 
					
                $this->load->view('admin/master/coursedata', $data);
				*/
				
			}
				
				
			
	}

?>

/*------------------------------------------common helper---------------------------------------------------*/



/*-------------------------------------mastermodel---------------------------------*/
<?php
	Class MasterModel extends CI_Model
		{
			function __construct()
				{
				   parent::__construct();
					//$this->load->helper('cookie');
				}
				
			public function addmaster($table)
				{
					$id            =	$this->input->post("id");
					$issubmit      =	$this->input->post("issubmit");
					$title		   =	$this->input->post("title");
					$metatag	   =	$this->input->post("metatag");  
					$image		   =    uploadimgfile("photo_inp","./assets/img","pre");
					$description   =	$this->input->post("description");
					$parent		   =	$this->input->post("parent"); 
					
					$post=$this->input->post();
					print_r($post);
					exit;

				
					    if(empty($parent)) { $parent = 0; }
					
						if(!empty($issubmit) && !empty($title))
							{
								$uarray = array();
									$uarray['title'] 	    =	$title;
									$uarray['metatag']  	=	$metatag;
									$uarray['description'] 	=	$description;
									$uarray['parent']    	=	$parent;
									
									if(!empty($image['status'])){
									$uarray['image']    	=	$image['data']['name'];
									}else{
										print_r("image not found");
									}
									
									
										if(empty($id))
											{
												$uarray['status']   =	1;
												$uarray['added'] 	=	gettime4db();
												$uarray['updated'] 	=	0;
													$this->db->insert($table,$uarray);
							return	"
										<div class='alert alert-success'  role='alert'>
											<i class='material-icons icon-body mr-12pt'>check_circle</i>
											<div class='text-body'>$title is created successfully.</div>   
										</div>
									";		
											} else {
												$uarray['updated'] 	=	gettime4db();
													$this->db->where('id',$id);
													$this->db->update($table,$uarray);
							return	"
										<div class='alert alert-info'  role='alert'>
											<i class='material-icons icon-body mr-12pt'>check_circle</i>
											<div class='text-body'>$title is updated successfully.</div>   
										</div>
									";
											}
							}
					return "";		
				}
				
			public function getmaster($table,$id=0,$parent_id=0,$select="title,id",$status='na')
				{	
				//print_r("inside getmaster");
				//$post=$this->input->post();
							   //print_r($post);exit;
					//print_r($parent); exit;
					$this->db->select($select);	
							if(!empty($parent_id))
								{
									$this->db->where("parent",$parent_id);	
								} else {
									$this->db->where("parent",0);	
								}
								
							if($status!='na')	
								{
									$this->db->where("status",$status);	
								}
								
							if(!empty($id))
								{
									$this->db->where("id",$id);	
								}
								$this->db->from($table);
						$query	=	$this->db->get();
					$result =	$query->result();
						$sendresult = array();
							if(!empty($result))
								{
									foreach($result as $singi)
										{
											$singi	=	(array) $singi; 
											$singi['child'] =	$this->getmaster($table,0,$singi['id'],"title,id"); 
											$sendresult[]	=	$singi;
										}
								} else {
									$sendresult = $result;
								}
					//print_r($sendresult);
					//exit;
					return $sendresult;
				}
				
			
				
			public function get_states($select="name,id")
				{
					$this->db->select($select);
						$this->db->where("status",1);	 
							return $this->db->from("states")->get()->result_array();
				}
				
			public function get_cities($select="name,id")
				{
					$this->db->select($select);
						$this->db->where("status",1);	 
							return $this->db->from("cities")->get()->result_array();
				}
				
				
			public function get_category(){
				$cat=$this->db->select(['title','id'])
								->get('category');
				//print_r("inside get_category()");
				return ($cat->result_array());
				//exit;
			}	
				
				
				
				
				
				
			public function addcourse($table)
				{
					
					$course_id            =	$this->input->post("course_id");
					$issubmit      =	$this->input->post("issubmit");
					$course_title		   =	$this->input->post("course_title");
					$course_description	   =	$this->input->post("course_description");  
					$course_duration   =	$this->input->post("course_duration");
					//print_r($course_id);
					
					$category_id		   =	$this->input->post("category_id"); 
					$image		   =    uploadimgfile("photo_inp","./assets/img","pre");

					//$post=$this->input->post();
					//print_r($post);
					//print_r("category id added ");
					//print_r($category_id);
					//exit;
					
					if(empty($category_id)) { $category_id = 0; }
					
						if(!empty($issubmit) && !empty($course_title))
							{
								
								
								$uarray = array();
									$uarray['course_title'] =	$course_title;
									$uarray['course_description']  	=	$course_description	;
									$uarray['course_duration'] 	=	$course_duration;
									$uarray['category_id']    	=	$category_id;
									
									if(!empty($image['status'])){
									$uarray['image']    	=	$image['data']['name'];
									}
									
									//print_r("image found");
									//exit;
									// }else
										// print_r($image);
										// print_r("image not found");
										// exit;
										// //exit;
									// }
									
										if(empty($course_id ))
											{
												$uarray['status']    	=	1;
												$uarray['added'] 	=	gettime4db();
												$uarray['updated'] 	=	0;
												$this->db->insert($table,$uarray);
							return	"
										<div class='alert alert-success'  role='alert'>
											<i class='material-icons icon-body mr-12pt'>check_circle</i>
											<div class='text-body'>$course_title is created successfully.</div>   
										</div>
									";		
											} else {
												$uarray['updated'] 	=	gettime4db();
												$this->db->where('course_id',$course_id);
												$this->db->update($table,$uarray);
							return	"
										<div class='alert alert-info'  role='alert'>
											<i class='material-icons icon-body mr-12pt'>check_circle</i>
											<div class='text-body'>$course_title is updated successfully.</div>   
										</div>
									";
											}
							}												
					return "";		
				}
				
				public function getcourse($table,$course_id=0,$select="course_title,course_id",$status='na')
				{
					
					
					// print_r($course_id); exit;
					
					$this->db->select($select);	
					
					 // $post=$this->input->post();
					 // print_r($post); exit;
					
					
									
					if($status!='na')	
					{
							$this->db->where("status",$status);	
					}
					if(!empty($course_id))
					{
						$this->db->where("course_id",$course_id);	
					}
					$this->db->from($table);
					$query	=	$this->db->get();
					$result =	$query->result_array();
					/*$sendresult = array();
					if(!empty($result))
					{
						foreach($result as $singi)
							{
								$singi	=	(array) $singi; 
								$singi['child'] =	$this->getmaster($table,0,$singi['parent'],"course_title,course_id"); 
								$sendresult[]	=	$singi;
							}
					} else {
						$sendresult = $result;
					}*/
					return $result;
					//$sendresult = array();
					/*if(!empty($result))
					{
						foreach($result as $singi)
						{
							$singi	=	(array) $singi; 
							$singi['child'] =	$this->getmaster($table,0,$singi['id'],"title,id"); 
							$sendresult[]	=	$singi;
						}
					} else {
						$sendresult = $result;
					}*/	
					//$sendresult = $result;
					//return $result;
				}
			
		}
			
?>



