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
                                    <h4 class="mb-sm-0">Staff List</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Staff List</a></li>
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
										<form onsubmit="return dorequest('<?php echo base_url('administrator/staff/managestaff'); ?>','.managestafffrm','.managestaffres');" method="POST" class="row managestafffrm">
										<h4 class="heading">Create Staff</h4>
				
											<input value="<?php echo !empty($staff['employee_id'])?$staff['employee_id']: "EID".rand().time(); ?>" name="staff[employee_id]" type="hidden" />
											<div class="row">
												<div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															First name
															<span class="text-danger">*</span>
														</label>
														<input value="<?php echo isset($staff['firstname'])?$staff['firstname']:""; ?>" name="staff[firstname]" maxlength="80" type="text" class="form-control"  required/>
													</div>
												</div>
												<div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Last name
															<span class="text-danger">*</span>
														</label>
														<input value="<?php echo isset($staff['lastname'])?$staff['lastname']:""; ?>" name="staff[lastname]" maxlength="80" type="text" class="form-control"  required/>
													</div>
												</div>
											</div>											
											<div class="row">
												<div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Mobile Number
															<span class="text-danger">*</span>
														</label>
														<input type="text" value="<?php echo isset($staff['mobile_number'])?$staff['mobile_number']:""; ?>" name="staff[mobile_number]" maxlength="80"  class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required />
														<!--input value="<?php echo isset($staff['mobile_number'])?$staff['mobile_number']:""; ?>" name="staff[mobile_number]" maxlength="80" required type="text" class="form-control"  required/-->
													</div>
												</div>
												<div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Email
														</label>
														<input value="<?php echo isset($staff['email'])?$staff['email']:""; ?>" name="staff[email]" maxlength="80"  type="text" class="form-control" />
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
												<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Father's name
															<span class="text-danger">*</span>
														</label>
														<input value="<?php echo isset($staff['father_name'])?$staff['father_name']:""; ?>" name="staff[father_name]" maxlength="80" type="text" class="form-control" required/>
													</div>
												</div>
												<div class="col-md-6">
													<small>&nbsp;</small>
													<div class="mb-3">
														<label>
															Address
															<span class="text-danger">*</span>

														</label>
														  <textarea class="form-control" id="exampleFormControlTextarea1" name="staff[address]" rows="3" name="address" required></textarea>

														<!--input value="<?php echo isset($staff['code'])?$staff['code']:""; ?>" name="offer[code]" maxlength="80" required type="text" class="form-control"  /-->
													</div>
												</div>
												
											</div>
											
											
										
										<div class="row" >
											
											<div class="col-md-6">
												 
													<label>
														Role
														<span class="text-danger">*</span>
													</label>						
													<select class="form-control" id="exampleFormControlSelect1" name="staff[role]">
														<option value="">None</option>

														<?php 
														$selected = "";
														foreach($role_type as $rol)
														{
															if(isset($staff['role']) && $staff['role']==$rol['title'])
															{ 
																$selected = "selected='selected'"; 
															}else{
																$selected = "";

															}
														?>
														<option <?php echo $selected ?> value="<?php echo $rol['title']; ?>"><?php echo $rol['title']; ?></option>
														<?php
														}
														?>
													</select>
												 
												</div>
											
										</div>
										
										<div class="row mt-4">
											<div class="col-12">
												<div class="d-flex justify-content-between bg-white ml-2">
													<div class=""><h4 class="heading">Alternate Contacts</h4></div>
									  
													<div>
														<button class="btn btn-primary card-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
															<i class="fas fa-plus float-right "></i>

														</button>
													</div>
												</div>
											</div>
										</div>
										<div class="row" class="collapse" id="collapseExample">
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Alternate Mobile Number
													</label>
													<input type="text" value="<?php echo isset($staff['a_mobile'])?$staff['a_mobile']:""; ?>" name="staff[a_mobile]" maxlength="80"  class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
													<!--input value="<?php echo isset($staff['a_mobile'])?$staff['a_mobile']:""; ?>" name="staff[a_mobile]" maxlength="80" type="text" class="form-control"/-->
												</div>
											</div>
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Alternate Email
													</label>
													<input value="<?php echo isset($staff['a_email'])?$staff['a_email']:""; ?>" name="staff[a_email]" maxlength="80" type="text" class="form-control"  />
												</div>
											</div>
										</div>
										<div class="row mt-4">
											<div class="col-12">
												<div class="d-flex justify-content-between bg-white ml-2">
													<div class=""><h4 class="heading">Bank Details</h4></div>
									  
													<div>
														<button class="btn btn-primary card-btn2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBank" aria-expanded="false" aria-controls="collapseExample">
															<i class="fas fa-plus float-right "></i>

														</button>
													</div>
												</div>
											</div>
										</div>
										<div class="row" class="collapse" id="collapseBank">
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Pan Card
														<span class="text-danger">*</span>

													</label>
													<input value="<?php echo isset($staff['pancard'])?$staff['pancard']:""; ?>" name="staff[pancard]" maxlength="80" type="text" class="form-control" required/>
												</div>
											</div>
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														GSTIN 															
														<span class="text-danger"></span>
														<span class="opacity">(Enter valid ID, this will be visible on invoices and bills.)</span>

													</label>
													<input value="<?php echo isset($staff['gstin'])?$staff['gstin']:""; ?>" name="staff[gstin]" maxlength="80" type="text" class="form-control"  />
												</div>
											</div>
											
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Bank Account No.
														<span class="text-danger">*</span>

													</label>
													<input type="text" value="<?php echo isset($staff['bank_acc'])?$staff['bank_acc']:""; ?>" name="staff[bank_acc]" maxlength="80"  class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required/>
													<!--input value="<?php echo isset($staff['bank_acc'])?$staff['bank_acc']:""; ?>" name="staff[bank_acc]" maxlength="80" type="text" class="form-control" required/-->
												</div>
											</div>
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Account Holder Name  															
														<span class="text-danger">*</span>

													</label>
													<input value="<?php echo isset($staff['acc_holder'])?$staff['acc_holder']:""; ?>" name="staff[acc_holder]" maxlength="80" type="text" class="form-control"  required/>
												</div>
											</div>
											
											<div class="col-md-6">
												 <label>
													Bank Account Category
													<span class="text-danger">*</span>
												</label>						
												<select class="form-control" id="exampleFormControlSelect1" name="staff[acc_category]">
													<option value="">None</option>

													<?php 
													$selected = "";
													
													$acc_cat=array('NRO','NRE');
													$i=0;
													while($i<2){
														if(isset($staff['acc_category']) && $staff['acc_category']==$acc_cat[$i]){
															$selected = "selected='selected'"; 
														}else{
															$selected="";
														}
													?>
														<option <?php echo $selected ?> value="<?php echo isset($staff['acc_category'])?$staff['acc_category']:$acc_cat[$i]; ?>"><?php echo $acc_cat[$i]; ?></option>
													<?php
													$i++;
													}
													?>
												</select>
											</div>
											
											<div class="col-md-6">
												 <label>
													Bank Account Type
													<span class="text-danger">*</span>
												</label>						
												<select class="form-control" id="exampleFormControlSelect1" name="staff[acc_type]">
													<option value="">None</option>

													<?php 
													$selected = "";
													
													$acc_type=array('Saving','Current');
													$i=0;
													while($i<2){
														if(isset($staff['acc_type']) && $staff['acc_type']==$acc_type[$i]){
															$selected = "selected='selected'"; 
														}else{
															$selected="";
														}
													?>
														<option <?php echo $selected ?> value="<?php echo isset($staff['acc_type'])?$staff['acc_type']:$acc_type[$i]; ?>"><?php echo $acc_type[$i]; ?></option>
													<?php
													$i++;
													}
													?>
												</select>
											</div>
											
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														IFSC
														<span class="text-danger">*</span>

													</label>
													<input value="<?php echo isset($staff['ifsc'])?$staff['ifsc']:""; ?>" name="staff[ifsc]" maxlength="80" type="text" class="form-control" required/>
												</div>
											</div>
										</div>
										
										<div class="row mt-4">
											<div class="col-12">
												<div class="d-flex justify-content-between bg-white ml-2">
													<div class=""><h4 class="heading">User Category Information</h4></div>
									  
													<div>
														<button class="btn btn-primary card-btn3" type="button" data-bs-toggle="collapse" data-bs-target="#collapsecatinfo" aria-expanded="false" aria-controls="collapseExample">
															<i class="fas fa-plus float-right "></i>

														</button>
													</div>
												</div>
											</div>
										</div>
										<div class="row" class="collapse" id="collapsecatinfo">
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														DOB
														<span class="text-danger">*</span>
													</label>
													
													<div class="input-group date" class="datepicker">
														<input  readonly value="<?php echo isset($staff['DOB'])?$staff['DOB']:""; ?>" type="text" class="form-control datepicker_inp" name="staff[DOB]" placeholder="" required>
														
													</div>
												</div>
											</div>
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Gender
													</label>
													<select class="form-control" id="exampleFormControlSelect1" name="staff[gender]">
														<option value="">None</option>

														<?php 
														$selected = "";
														
														$gender=array('Female','Male','Other');
														$i=0;
														while($i<3){
															if(isset($staff['gender']) && $staff['gender']==$gender[$i]){
																$selected = "selected='selected'"; 
															}else{
																$selected="";
															}
														?>
															<option <?php echo $selected ?> value="<?php echo isset($staff['gender'])?$staff['gender']:$gender[$i]; ?>"><?php echo $gender[$i]; ?></option>
														<?php
														$i++;
														}
														?>
													</select>												
												</div>
											</div>
										</div>
										
										<div class="row mt-4">
											<div class="col-12">
												<div class="d-flex justify-content-between bg-white ml-2">
													<div class=""><h4 class="heading">Employee Information</h4></div>
									  
													<div>
														<button class="btn btn-primary card-btn3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseempinfo" aria-expanded="false" aria-controls="collapseExample">
															<i class="fas fa-plus float-right "></i>

														</button>
													</div>
												</div>
											</div>
										</div>
										<div class="row" class="collapse" id="collapseempinfo">
											
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Passport Id

													</label>
													<input value="<?php echo isset($staff['passport_id'])?$staff['passport_id']:""; ?>" name="staff[passport_id]" maxlength="80" type="text" class="form-control" />
												</div>
											</div>
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Passport Expiry Date
													</label>
													
													<div class="input-group date" class="datepicker">
														<input  readonly value="<?php echo isset($staff['passport_exp'])?$staff['passport_exp']:""; ?>" type="text" class="form-control datepicker_inp" name="staff[passport_exp]" placeholder="">
														
													</div>
												</div>
											</div>
											
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Employee Id
														<span class="text-danger">*</span>

													</label>
													<input value="<?php echo isset($staff['employee_id'])?$staff['employee_id']:'EID'.rand(100,999).time(); ?>" name="staff[employee_id]" maxlength="80" type="text" class="form-control" />
												</div>
											</div>
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Employee's Joining Date
														<span class="text-danger">*</span>
													</label>
													
													<div class="input-group date" class="datepicker">
														<input  readonly value="<?php echo isset($staff['joinning_date'])?$staff['joinning_date']:""; ?>" type="text" class="form-control datepicker_inp" name="staff[joinning_date]" placeholder="" required/>
														
													</div>
												</div>
											</div>
											
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Employee Designation

													</label>
													<input value="<?php echo isset($staff['designation'])?$staff['designation']:""; ?>" name="staff[designation]" maxlength="80" type="text" class="form-control" />
												</div>
											</div>
											
											
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Nationality
														<span class="text-danger">*</span>
													</label>
													
													<select class="form-control" id="exampleFormControlSelect1" name="staff[nationality]">
														<option value="">None</option>

														<?php 
														$selected = "";
														
														if(!empty($country)){
														foreach($country as $con){
															if(isset($staff['nationality']) && $staff['nationality']==$con['name']){
																$selected = "selected='selected'"; 
															}else{
																$selected="";
															}
														?>
															<option <?php echo $selected ?> value="<?php echo isset($staff['nationality'])?$staff['nationality']:$con['name']; ?>"><?php echo $con['name']; ?></option>
														<?php
														} }
														?>
													</select>
												</div>
												
												
											</div>
											
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Work Permit Id

													</label>
													<input value="<?php echo isset($staff['work_permit_id'])?$staff['work_permit_id']:""; ?>" name="staff[work_permit_id]" maxlength="80" type="text" class="form-control" />
												</div>
											</div>
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Work Permit Expiry Date
													</label>
													
													<div class="input-group date" class="datepicker">
														<input  readonly value="<?php echo isset($staff['work_exp_date'])?$staff['work_exp_date']:""; ?>" type="text" class="form-control datepicker_inp" name="staff[work_exp_date]" placeholder=""/>
														
													</div>
												</div>
											</div>
											
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Visa Id

													</label>
													<input value="<?php echo isset($staff['visa_id'])?$staff['visa_id']:""; ?>" name="staff[visa_id]" maxlength="80" type="text" class="form-control" />
												</div>
											</div>
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														Visa Expiry Date
													</label>
													
													<div class="input-group date" class="datepicker">
														<input  readonly value="<?php echo isset($staff['visa_exp_date'])?$staff['visa_exp_date']:""; ?>" type="text" class="form-control datepicker_inp" name="staff[visa_exp_date]" placeholder=""/>
														
													</div>
												</div>
											</div>
											
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														National Identification No.
														<span class="text-danger">*</span>

														<span class="opacity">(Aadhar Card Number,Emirates ID.)</span>
													</label>
													<input value="<?php echo isset($staff['national_id_no'])?$staff['national_id_no']:""; ?>" name="staff[national_id_no]" maxlength="80" type="text" class="form-control" />
												</div>
											</div>
											<div class="col-md-6">
											<small>&nbsp;</small>
												<div class="mb-3">
													<label>
														National Identification Date
														<span class="text-danger">*</span>

													</label>
													
													<div class="input-group date" class="datepicker">
														<input  readonly value="<?php echo isset($staff['national_id_date'])?$staff['national_id_date']:""; ?>" type="text" class="form-control datepicker_inp" name="staff[national_id_date]" placeholder="" required/>
													</div>
												</div>
											</div>
											
											
											
											
											
										</div>
										
										<!--div class="row mt-4">
											<div class="col-12">
												<div class="d-flex justify-content-between bg-white ml-2">
													<div class=""><h4 class="heading">Files and Documents</h4></div>
									  
													<div>
														<button class="btn btn-primary card-btn3" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefiledoc" aria-expanded="false" aria-controls="collapseExample">
															<i class="fas fa-plus float-right "></i>

														</button>
													</div>
												</div>
											</div>
										</div>
										<!--div class="row" class="collapse" id="collapsefiledoc">
											<div class="col-md-4 text-center">
												<a style="font-size: 10px;font-weight: 900;" href="https://tinypng.com/" target="_BLANK">Click here to compress the image</a> <br>
												
												<?php
													$photourl = !empty($staff['image'])?BASE_URL($staff['image']):
													//$photourl=!empty($_POST['photo_inp'])?"/uploads/".$_POST['photo_inp']:
													"https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D";
								
													
												?>
											
												<!--img onclick="$('.photo_inp').trigger('click');" src="<?php echo $photourl ; ?>" class="preview_photo  img-responsive"> <br>
												<span style="font-size: 10px;font-weight: 900;">Image size should not exceed 5MB. And Upload PNG Image with transparent Background.</span> 
												
												<input type="file" id="photo_inp" accept="image/*" name="photo_inp" class="photo_inp upload5mbonly" preview="preview_photo" style="display:none;"-->
												
												<!--label for="finput" class="cUploadImages">
												<img id="blah" style="max-width:500px; max-height:500px;" name="photo" src="<?php echo $photourl ; ?>" alt="upload Banner" />
												<br/>Upload Banner</label>			
												<input type="file" value="<?php echo isset($staff['image'])?$staff['image']:""; ?>" name="photo_inp" multiple="true" accept="image/*" id="finput" onchange="readURL(this);" class="d-none"/>
											</div>
										</div-->

										
										<div class="managestaffres" style="clear:both;"></div>
										<div style="clear:both;"></div>
										<div class="col-md-12 mt-2">
											<button class="btn btn-primary" type="submit"><?php echo !empty($staff['employee_id'])?"Update staff":"submit"; ?></button>
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
										<a class="btn btn-success" href="<?php echo base_url('administrator/staff/add'); ?>" >Add Staff</a>
									</div>
									<div style='clear:both;'></div>
									<div class="table-responsive">
										<table id="tabeldatahere" class="table table-striped">
											<thead>
												<tr>
													<th>name</th>
													<th>Role</th>
													<th>Mobile No.</th>
													<th>Status</th>
													<th>Added on</th>
													<th>Last Updated On</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
														
													if(!empty($list_staff))
													{
														foreach($list_staff as $stf)
														{
												?>
															<tr>
																<td><?php echo $stf['firstname']." ".$stf['lastname']; ?></td>
																<td><?php echo $stf['role'];?></td>
																<td><?php echo $stf['mobile_number']; ?></td>
																<td><?php echo !empty($stf['status'])?"<button onclick='updatestatus(this);' t='staff'   i='$stf[employee_id]'  v='$stf[firstname]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='staff' i='$stf[employee_id]' v='$stf[firstname]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
																<td><?php echo showtime4db($stf['added']); ?></td>
																<td><?php echo showtime4db($stf['updated']); ?></td>
																
																<td><a class="fa fa-edit" href="<?php echo base_url("administrator/staff/$stf[employee_id]"); ?>"></a></td>
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
		
		<script>
			$('.card-btn').click(function() {
				$(this).find('i').toggleClass('fas fa-plus fas fa-minus')
			});
		</script>
		
		<script>
			$('.card-btn2').click(function() {
				$(this).find('i').toggleClass('fas fa-plus fas fa-minus')
			});
		</script>
		
		<script>
			$(function(){
				//	$('.datepicker').datepicker(); 
			
			// $( ".datepicker_inp" ).datepicker({changeYear:true, changeMonth:true });
			$( ".datepicker_inp" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear:true, changeMonth:true,  yearRange: '-100:+0' });
			
			});
		</script>
		
		<script>
			$('.card-btn3').click(function() {
				$(this).find('i').toggleClass('fas fa-plus fas fa-minus')
			});
		</script>
		
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>
			<?php
					$this->load->view('admin/include/eodcode');
			?>
    </body>
</html>