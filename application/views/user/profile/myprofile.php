<style>
thead tr th , tbody tr td{
  font-size: 12px !important;
}
.right_sec{
  border: 1px solid #de9a35;
  margin:0 10px 0 10px;
  
}
.opacity{
  opacity:.4;
}

.btn-sub:hover{
  color:white!important;
  background:#C69024!important;
}

      
</style>
<div class="container padding-bottom-3x my-5 shadow">
  <div class="row p-3">
    
     <?php $this->load->view($left_menu); ?>
     
    
    
    <div class="col-lg-9"> 
    
      <form style="margin-top:-28px;" onsubmit="return dorequest('<?php echo base_url('user/UserLogin/profile_update'); ?>','.manageTenantfrm','.manageTenantres');" method="POST" class="row manageTenantfrm">
        <input value="<?php echo $curuser['tenant_id']; ?>" name="tenant_id" type="hidden" />

        <div class="container">
          <h3 style="color:#de9a35; font-size:20px;   font-family: serif;" class="mt-5">ACCOUNT DETAILS</h3>
  
          <div class="row right_sec p-4">
            <div class="col-md-6 ">
            <small>&nbsp;</small>
              <div class="mb-3">
                <label>
                  Mobile Number
                  <span class="text-danger">*</span>
                </label>
                <input type="text" value="<?php echo isset($curuser['mobile'])?$curuser['mobile']:""; ?>" name="mobile" maxlength="80"  class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required />
                
              </div>
            </div>
            <div class="col-md-6">
            <small>&nbsp;</small>
              <div class="mb-3">
                <label>
                  Email
                  <span class="text-danger">*</span>

                </label>
                <input value="<?php echo isset($curuser['email'])?$curuser['email']:""; ?>" name="email" maxlength="80"  type="email" class="form-control" required/>
              </div>
            </div>
          </div>
          
          <h3 style="color:#de9a35; font-size:20px;   font-family: serif; " class="mt-5">PERSONAL DETAILS</h3>
          <div class="row right_sec p-4">
            <div class="col-md-6">
              <small>&nbsp;</small>
              <div class="mb-3">
                <label>
                  Date Of Birth
                  <span class="text-danger">*</span>
                </label>
                
                <div class="input-group date" class="datepicker">
                  <input readonly value="<?php echo isset($curuser['DOB'])?$curuser['DOB']:""; ?>" type="text" class="form-control datepicker_inp" name="birth_date" placeholder="" required>
                  
                </div>
              </div>
            </div>
            
            
            <div class="col-md-6">
              <small>&nbsp;</small>
              <div class="mb-3">
                <label>
                  Gender
                </label>
                
                <select required class="form-control" name="gender">
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
            </div>
          
            
            <div class="col-md-12">
              <small>&nbsp;</small>
			  
              <div class="mb-3">
                <label>
                  Password
                </label>
				<br><a class="ps-dropdown-value text-primary " style="text-decoration:underline;" href="javascript:void(0);" data-toggle="modal" data-target="#changePassword">Change Password</a>
              </div>
            </div>
          </div>
		  
		  <div class="modal fade" id="changePassword" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered ps-popup--select">
				<div class="modal-content">
					<div class="modal-body">
						<div class="wrap-modal-slider container-fluid">
							<button class="close ps-popup__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<div class="">
								<h2 class="ps-popup__title text-center">Change Password</h2>
								
								
								<form  onsubmit="return dorequest('<?php echo base_url('user/UserLogin/manageChangePassword'); ?>','.managechangepassfrm','.managechangepassres');" method="POST" class="row managechangepassfrm">
									<div class="container">
										<div class="row">
											<style>
												::placeholder{
													opacity:.4!important;
												}
											</style>
											<label style="font-family:san-serif; font-weight:bold; font-size:18px;">
												Enter New Password
												<span class="text-danger">*</span>
											</label>
											<input style="border-radius:5px;" class="form-control col-12 mb-2" type="password" placeholder="Password"  name="new_password" required/>
											
											
											<label style="font-family:san-serif; font-weight:bold; font-size:18px;">
												Confirm New Password
												<span class="text-danger">*</span>
											</label>
											<input style="border-radius:5px;" class="form-control col-12 mb-2" type="password" placeholder="Password"  name="cnf_password" required/><br><br><br>
											<hr>
											<span style="font-size:12px; border-top:1px solid #010789; padding-top:5px; color:#C69024; font-weight:bold">Please Enter Your Current Password To Confirm Your Changes</span><br>
											
											
											<label style="font-family:san-serif; font-weight:bold; font-size:18px;">
												Current Password
												<span class="text-danger">*</span>
											</label>
											<input style="border-radius:5px;" class="form-control col-12 mb-2" type="password" placeholder="Password"  name="curr_password" required/>
											

											<!--input class="form-control mb-2" style="opacity:.7" type="text" placeholder="Mobile Number"-->
											<!--input class="form-control mb-3" style="opacity:.7" type="text" placeholder="Email"-->
											<div class="managechangepassres col-12" style="clear:both;"></div>
											<div class="form-group mb-0 text-center">
											  <!--<button type="submit" class="btn btn-success mr-8pt">Save</button>-->
											  <!--<button class="btn btn-primary" type="submit"> submit</button>-->
											  <button class="btn-sub" style="border:1px solid #C69024; color:#C69024; font-weight:bold; background:transparent; padding:12px 16px; font-size:14px; border-radius:3px;" type="submit"><?php echo !empty($property['property_id'])?"Update Property":"Submit"; ?></button>
											</div>
										</div>
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		   </div>
	
            
          <h3 style="color:#de9a35; font-size:20px;   font-family: serif; " class="mt-5">ADDRESS DETAILS</h3>
          <div class="row right_sec p-4">  
            
            <div class="col-lg-12">
              <div class="form-group mb-0">
                <div class="form-group">
                  <label>Address</label>
                  <textarea  class="form-control " type="text"  name="address" style='min-height: 115px;' required><?php echo isset($curuser['address'])?$curuser['address']:"";?></textarea>
                </div>
              </div>
            </div>
          </div>
          
          <div class="clearfix"></div>
          <div class="col-lg-12 mt-4">
            <div class="manageTenantres" style="clear:both;"></div>
            <div style="clear:both;"></div>
            <div class="form-group mb-0 text-center">
              <!--<button type="submit" class="btn btn-success mr-8pt">Save</button>-->
              <!--<button class="btn btn-primary" type="submit"> submit</button>-->
              <button class="btn-sub" style="border:1px solid #C69024; color:#C69024; font-weight:bold; background:transparent; padding:12px 16px; font-size:14px; border-radius:3px;" type="submit"><?php echo !empty($property['property_id'])?"Update Property":"Submit"; ?></button>
              <a style="padding:10px 16px; font-size:16px;" class="btn btn-outline-danger ml-0" href="<?php echo base_url('administrator/property'); ?>" >Cancel</a>
            </div>
            
          </div>
        </div>
      </form>
    </div>
    
  </div>
</div>
</div>