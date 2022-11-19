<style>
.right{
	border: 1px solid #de9a35;
}
</style>
<div class="ps-home ps-home--1">
	<div class="ps-home__content">
		<div class="container-fluid p-0">
			<div class="ps-delivery ps-delivery--info">
				<div class="ps-delivery__text">
					<h2 class="text-uppercase" style="color:#de9a35;">Executive Registration</h2>
				</div>
			</div>
		</div>
		<div class="container">
			<section class="py-5">
			
				<form  onsubmit="return dorequest('<?php echo base_url('user/front/executive/registerSave'); ?>','.managesignupfrm','.managesignupres');"  class="managesignupfrm" enctype="multipart/form-data">
					<div class="py-3">
						<h3>BASIC DETAILS</h3>
						<div class="row right py-3">
							
							<div class="col-md-4">
								<div class="form-group">
									<label>Name<span class="text-danger">*</span></label>
									<input type="text" value="" name="name"   class="form-control"  required />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Email<span class="text-danger">*</span></label>
									<input type="email" value="" name="email"  class="form-control"  required />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Mobile<span class="text-danger">*</span></label>
									<input type="text" value="" name="mobile" maxlength="80"  class="form-control" required />
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Address<span class="text-danger">*</span></label>
									<textarea  class="form-control " type="text"  name="address" style='min-height: 115px;' required></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="py-3">
						<h3>DOCUMENTS</h3>
						<div class="row right py-3">
							
							
							<div class="col-md-4">
								<div class="form-group">
									<label>Address Proof Type<span class="text-danger">*</span></label>
									<select class="form-control" name="id_type">
										<option value="">Select</option>
										<option value="PAN Card">PAN Card</option>
										<option value="Aadhar Card">Aadhar Card</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Attach Selected ID Proof <span class="text-danger">*</span></label>
									<input value="" type="file" class="form-control" accept="image/jpeg, application/pdf " name="id_card"required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Resume<span class="text-danger">*</span></label>
									<input value="" type="file" class="form-control"  accept="application/pdf" name="resume"required>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<label>Description<span class="text-danger">*</span></label>
									<textarea  class="form-control " type="text"  name="description" style='min-height: 115px;' required></textarea>
								</div>
							</div>
							
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-lg-12 mt-4">
						<div class="managesignupres" style="clear:both;"></div>
						<div style="clear:both;"></div>
						<div class="form-group mb-0 text-center">
							
							<button class="btn-sub" style="border:1px solid #C69024; color:#C69024; font-weight:bold; background:transparent; padding:12px 16px; font-size:14px; border-radius:3px;" type="submit">Apply Now</button>
							<a style="padding:10px 16px; font-size:16px;" class="btn btn-outline-danger ml-0" href="<?php echo base_url('administrator/property'); ?>" >Cancel</a>
						</div>
					</div>
				</form>
			</section>
		</div>
	</div>
</div>

