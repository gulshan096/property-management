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
		
			<form style="margin-top:-28px;" onsubmit="return dorequest('<?php echo base_url('user/front/manage_entry'); ?>','.manageEntryfrm','.manageEntryres');" method="POST" class="row manageEntryfrm">
				<input value="<?php echo $curuser['tenant_id']; ?>" name="tenant_id" type="hidden" />
				<?php  ?>

				<div class=" hidden-lg-up">
					<h3 style="color:#de9a35; font-size:20px;   font-family: serif;" class="mt-5">GUEST DETAILS</h3>
	
					<div class="row right_sec p-4">
					    <div class="col-md-6">
						<small>&nbsp;</small>
							<div class="mb-3">
								<label>
									Guest Name
									<span class="text-danger">*</span>

								</label>
								<input value="" name="guest_name" maxlength="80"  type="text" class="form-control" required/>
							</div>
						</div>
						<div class="col-md-6 ">
						<small>&nbsp;</small>
							<div class="mb-3">
								<label>
									Mobile Number
									<span class="text-danger">*</span>
								</label>
								<input type="text" value="" name="guest_mobile" maxlength="80"  class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required />
								
							</div>
						</div>
						<div class="col-md-6">
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
						
						<div class="col-md-6">
						<small>&nbsp;</small>
							<div class="mb-3">
								<label>
									Gender
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
						</div>
					</div>
					
					
						
					<h3 style="color:#de9a35; font-size:20px;   font-family: serif; " class="mt-5">	DESCRIBED WHY THEY ARE VISITING</h3>
					<div class="row right_sec p-4">	
						
						<div class="col-lg-12">
							<div class="form-group mb-0">
								<div class="form-group">
									<label>Description</label>
									<textarea  class="form-control " type="text"  name="description" style='min-height: 115px;' required></textarea>
								</div>
							</div>
						</div>
					</div>
					
					<div class="clearfix"></div>
					<div class="col-lg-12 mt-4">
						<div class="manageEntryres" style="clear:both;"></div>
						<div style="clear:both;"></div>
						<div class="form-group mb-0 text-center">
							<!--<button type="submit" class="btn btn-success mr-8pt">Save</button>-->
							<!--<button class="btn btn-primary" type="submit"> submit</button>-->
							<button class="btn-sub" style="border:1px solid #C69024; color:#C69024; font-weight:bold; background:transparent; padding:12px 16px; font-size:14px; border-radius:3px;" type="submit"><?php echo !empty($property['property_id'])?"Update Property":"Submit"; ?></button>
							<a style="padding:10px 16px; font-size:16px;" class="btn btn-outline-danger ml-0" href="<?php echo base_url('user/front/entry/guest_history)'); ?>" >Cancel</a>
						</div>
						
					</div>
				</div>
			</form>
		</div>
		
	</div>
</div>
</div>