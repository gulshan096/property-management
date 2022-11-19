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

img{
	height:200px !important;
	width:200px !important;
	object-fit:cover;
}
 
</style>
<div class="container padding-bottom-3x my-5 shadow">
  <div class="row p-3">
    
     <?php $this->load->view($left_menu); ?>
	 
    <div class="col-lg-9"> 
	
    
      <form style="margin-top:-28px;" onsubmit="return dorequest('<?php echo base_url('user/UserLogin/Id_document'); ?>','.manageId_documentfrm','.manageId_documentres');" method="POST" class="row manageId_documentfrm">
	  
	  <?php
		if(!empty($user_doc)){
	?>
		<style>
			input,button,.cancel{
				display:none!important;
			}
					
		</style>
		
	<?php
		}
	?>
        <input value="<?php echo $curuser['tenant_id']; ?>" name="tenant_id" type="hidden" />

        <div class=" hidden-lg-up">
          <h3 style="color:#de9a35; font-size:20px;   font-family: serif;" class="mt-5">PROFILE PICTURE</h3>
  
          <div class="row right_sec p-4">
			<div class="col-md-6">
				<label class="font-weight-bold">
                  Profile Image
				  <span class="text-danger">*</span>
                </label><br>
				
				<?php
					$photourl = !empty($user_doc['profile_image'])?BASE_URL($user_doc['profile_image']):
			        //$photourl=!empty($_POST['photo_inp'])?"/uploads/".$_POST['photo_inp']:
					"https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D";
                 
				?>
				<label for="finput" class="cUploadImages">
				<img id="blah1" style="max-width:200px; max-height:200px;" name="photo" src="<?php echo $photourl ; ?>" alt="upload image" />
						
				<input type="file" style="padding:1px; height:30px; margin-top:10px;" value="<?php echo isset($user_doc['profile_image'])?$user_doc['profile_image']:""; ?>" name="profile_img" multiple="true" accept="image/*" id="finput1" onchange="readURL(this);" class="form-control border-0"/>
			</div>
          </div>
          
          <h3 style="color:#de9a35; font-size:20px;   font-family: serif; " class="mt-5">ID PROOF</h3>
          <div class="row right_sec p-4">
           <div class="col-md-6">
              <small>&nbsp;</small>
              <div class="mb-3">
                <label class="font-weight-bold">
                  ID Card Type
				  <span class="text-danger">*</span>

                </label>
                
                <select class="form-control" name="card_type">
                  <option value="">None</option>


				  <?php
                  $selected = "";
                  $card= ['Pan Card', 'Aadhaar Card'];
                  
                  
                  for($i=0;$i<2;$i++)
                  { 
                    if(isset($user_doc['card_type']) && $user_doc['card_type']==$card[$i]){
                      $selected = "selected='selected'"; 
                    }else{
                      $selected="";
                    }
                              
                  ?>
                  <option <?php echo $selected ?> value="<?php echo isset($user_doc['card_type'])&&($user_doc['card_type']==$card[$i])?$user_doc['card_type']:$card[$i]; ?>" ><?php echo $card[$i]; ?></option>
				  
                  <?php
                  }
                  ?>
                </select>          
              </div>
            </div>
			<div class="col-md-6">
			</div>
			
			<div class="col-md-6">
				<!--a style="font-size: 10px;font-weight: 900;" href="https://tinypng.com/" target="_BLANK">Click here to compress the image</a> <br-->
				<label class="font-weight-bold">
                  Front View Of ID
				  <span class="text-danger">*</span>

                </label><br>
				
				<?php
					$photourl = !empty($user_doc['ID_front_image'])?BASE_URL($user_doc['ID_front_image']):
			
					"https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D";

					
				?>
			
				<label for="finput" class="cUploadImages">
				<img id="blah2" name="photo" src="<?php echo $photourl ; ?>" alt="upload image" />
				<!--br/>Upload Your ID's Image/PDF/Doc File-->
				</label>			
				<input style="padding:1px; height:30px; margin-top:10px;" type="file" value="<?php echo isset($user_doc['ID_front_image'])?$user_doc['ID_front_image']:""; ?>" name="id_img1" multiple="true" accept="image/*" id="finput2" onchange="readURL(this);" class="form-control border-0"/>
			</div>
			
			<div class="col-md-6">
				<!--a style="font-size: 10px;font-weight: 900;" href="https://tinypng.com/" target="_BLANK">Click here to compress the image</a> <br-->
				
				<label class="font-weight-bold">
                  Back View Of ID
				  <span class="text-danger">*</span>

                </label><br>
				
				<?php
					$photourl = !empty($user_doc['ID_back_image'])?BASE_URL($user_doc['ID_back_image']):
					//$photourl=!empty($_POST['photo_inp'])?"/uploads/".$_POST['photo_inp']:
					"https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D";

					
				?>
			
				
				<label for="finput" class="cUploadImages">
				<img id="blah3" style="max-width:200px; max-height:200px;" name="photo" src="<?php echo $photourl ; ?>" alt="upload image" />
				<!--br/>Upload Your ID's Image/PDF/Doc File</label-->			
				<input style="padding:1px; height:30px; margin-top:10px;" type="file" value="<?php echo isset($user_doc['ID_back_image'])?$user_doc['ID_back_image']:""; ?>" name="id_img2" multiple="true" accept="image/*" id="finput3" onchange="readURL(this);" class="form-control border-0"/>
				
			</div>
		  </div>
	
          <div class="clearfix"></div>
          <div class="col-lg-12 mt-4">
            <div class="manageId_documentres" style="clear:both;"></div>
            <div style="clear:both;"></div>
            <div class="form-group mb-0 text-center">
              <!--<button type="submit" class="btn btn-success mr-8pt">Save</button>-->
              <!--<button class="btn btn-primary" type="submit"> submit</button>-->
              <button class="btn-sub" style="border:1px solid #C69024; color:#C69024; font-weight:bold; background:transparent; padding:12px 16px; font-size:14px; border-radius:3px;" type="submit">Submit</button>
              <a  style="padding:10px 16px; font-size:16px;" class="btn btn-outline-danger ml-0 cancel" href="<?php echo base_url('user/front/profile_verification'); ?>" >Cancel</a>
            </div>
            
          </div>
        </div>
      </form>
    </div>
    
  </div>
</div>

<script>
	$(function(){
		$('#finput1').change(function(event){
			var x=URL.createObjectURL(event.target.files[0]);
			$("#blah1").attr('src',x);
			console.log(event);
		});
	});
</script>

<script>
	$(function(){
		$('#finput2').change(function(event){
			var x=URL.createObjectURL(event.target.files[0]);
			$("#blah2").attr('src',x);
			console.log(event);
		});
	});
</script>

<script>
	$(function(){
		$('#finput3').change(function(event){
			var x=URL.createObjectURL(event.target.files[0]);
			$("#blah3").attr('src',x);
			console.log(event);
		});
	});
</script>






			
	
	