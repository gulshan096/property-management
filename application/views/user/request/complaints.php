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
			
			<form style="margin-top:-28px;" onsubmit="return dorequest('<?php echo base_url('user/front/request/manage_complaints'); ?>','.manageComplaintsfrm','.manageComplaintsres');" method="POST" class="row manageComplaintsfrm">
				<input value="<?php echo $curuser['tenant_id']; ?>" name="tenant_id" type="hidden" />
				<div class="container mt-5">
				  <div class="card-header row">
				   <div class="col-lg-8 col-12">
				     <h4 class="text-success ">COMPLAINTS REQUEST</h4>
				   </div>
				    <div class="col-lg-4 col-12  text-center">
					   <a class="bg-dark px-5 py-1  rounded-pill text-white" href="<?php echo base_url('user/front/myrequest/complaints_list');?>" >View all request</a>
				   </div>
				     
				  </div>
					<div class="row right_sec p-4 mt-5">
						<div class="col-md-6 ">
							<small>&nbsp;</small>
							<div class="mb-3">
								<label>Complaints Category</label>
								<select  class="form-control dropdown_filter uppercase"  name="category" required >
									<option value="">select</option>
									
									<?php
								
										foreach($list_category as $vcategory)
										{
										if($vcategory['category'] == $get_maintenance['category'])
										{
									?>
									<option  selected value="<?php echo $vcategory['id']; ?>" selected ><?php echo $vcategory['category']; ?></option>
									<?php
									}
									else
									{
									?>
									<option value="<?php echo $vcategory['id']; ?>" "><?php echo $vcategory['category']; ?></option>
									<?php
									}
																			
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
						<small>&nbsp;</small>
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
						<div class="manageComplaintsres" style="clear:both;"></div>
						<div style="clear:both;"></div>
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