<style>

img{
	height:200px !important;
	width:200px !important;
	object-fit:cover;
}
</style>

<div class="ps-home ps-home--1">
	<div class="ps-home__content">
		<div class="container-fluid p-0">
			<div class="ps-delivery ps-delivery--info">
				<div class="ps-delivery__text">
					<h1>Registration</h1>
				</div>
			</div>
		</div>
		<div class="container">
			<section class="ps-section--featured inner">
				<div class="ps-section__content">
					<div class="row">
						<div class="col-12 col-md-8 mt-4">
							<!--h3 class="mb-5">For Any Query fill the Form below, We will get back to ASAP.</h3-->
							<form onsubmit="return dorequest("<?php echo base_url('user/Host/manageHostProperty'); ?>",'.managehostpropertyfrm','.managehostpropertyres');" method="POST" class="row managehostpropertyfrm">
								<div class="row">
									<div class="col-md-6">
										
										<div class="row">
										
											<div class="col-12">
												<div class="form-group">
													<label class="label_ry"><i class='fa fa-user'></i> Property Name</label>
													<input name="name" type="text" required class="form-control" placeholder="Entet Your Name" />
												</div>
											</div>
											
											<div class="col-12">
												<div class="form-group">
													<label class="label_ry"><i class='fa fa-envelope'></i> City</label>
													<input required type="text" class="form-control" placeholder="Entet City" name="city" />
												</div>
											</div>
											
											<div class="col-12">
												<div class="form-group">
													<label class="label_ry"><i class='fa fa-phone'></i> Area</label>
													<input required type="text" class="form-control" placeholder="Entet Area" name="area" />
												</div>
											</div>
										</div>
									</div>
										
									<div class="col-md-6">
	
									    <div class="row">
											<div class="col-12">
												<div class="form-group">
													<label class="label_ry"><i class='fa fa-phone'></i> Mobile</label>
													<input type="text" value="" name="mobile" maxlength="80"  class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required />
												</div>
											</div>
											
											<div class="col-12">
											
												<?php
													$photourl = 
													"https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D";
								
													
												?>
											
												<!--img onclick="$('.photo_inp').trigger('click');" src="<?php echo $photourl ; ?>" class="preview_photo  img-responsive"> <br>
												<span style="font-size: 10px;font-weight: 900;">Image size should not exceed 5MB. And Upload PNG Image with transparent Background.</span> 
												
												<input type="file" id="photo_inp" accept="image/*" name="photo_inp" class="photo_inp upload5mbonly" preview="preview_photo" style="display:none;"-->
												
												<label for="finput" class="cUploadImages">
												<img id="blah3" style="max-width:500px; max-height:500px;" name="photo" src="<?php echo $photourl ; ?>" alt="upload image" />
												<input type="file" value="" id="finput3" name="photo_inp" multiple="true" accept="image/*" onchange="readURL(this);" class=""/>
											</div>
										
										</div>
									</div>

									<div class="managehostpropertyres" style="clear:both;"></div>
	
									<div class="text-center mb-3 mt-4" style="width:100%;">
										<button class="btn btn-lg btn-success"><i class="fa fa-send"></i> Add Property </button>
									</div>
								</div>
							</form>
						</div>
						<div class="col-12 col-md-4">
							<style>
								.widgets_ry {
									padding: 15px 20px; 
									color: #fff; 
									border-radius: 5px; 
									margin-bottom: 25px;
									text-align:center;
								}
							</style>
							<div class="form-group">
								<p>&nbsp;</p>
								<p>&nbsp;</p>
								<div class="widgets_ry" style="background-color: #003631; ">
									<i class="fa fa-envelope"></i><br />
									<a href="tel:+91 8448448421">+91 8448448421</a>
								</div>
								<div class="widgets_ry" style="background-color: #C69024; ">
									<i class="fa fa-mobile"></i><br />
									<a href="tel:+91 8448448421">+91 8448448421</a>
								</div>
								<div class="widgets_ry" style="background-color: #181817; ">
									<i class="fa fa-map"></i><br />
									Kothrud Pune
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>



<script>
	$(function(){
		$('#finput3').change(function(event){
			var x=URL.createObjectURL(event.target.files[0]);
			$("#blah3").attr('src',x);
			console.log(event);
		});
	});
</script>
