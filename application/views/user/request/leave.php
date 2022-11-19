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
    
      <form style="margin-top:-28px;" onsubmit="return dorequest('<?php echo base_url('user/front/request/manage_leave'); ?>','.manageLeavefrm','.manageLeaveres');" method="POST" class="row manageLeavefrm">
        <input value="<?php echo $curuser['tenant_id']; ?>" name="tenant_id" type="hidden" />

        <div class="container">
          <div class="card-header row mt-5">
		    <div class="col-lg-8 col-12">
				<h4 class="text-success ">Leave Request</h4>
		    </div>
			<div class="col-lg-4 col-12  text-center">
			    <a class="bg-dark px-5 py-1  rounded-pill text-white" href="<?php echo base_url('user/front/myrequest/leave_list');?>" >View all request</a>
		    </div>     
		  </div>
  
          <div class="row right_sec p-4 mt-5">
            <div class="col-md-6 ">
            <small>&nbsp;</small>
              <div class="mb-3">
                <label>
                  From Date
                  <span class="text-danger">*</span>
                </label>
                 <div class="input-group date" class="datepicker">
                  <input readonly value="" type="text" class="form-control datepicker_inp" name="from_date" placeholder="" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
            <small>&nbsp;</small>
              <div class="mb-3">
                <label>
                  To Date
                  <span class="text-danger">*</span>
                </label>
                 <div class="input-group date" class="datepicker">
                  <input readonly value="" type="text" class="form-control datepicker_inp" name="to_date" placeholder="" required>
                </div>
              </div>
            </div>
          </div>
          
          <h3 style="color:#de9a35; font-size:20px;   font-family: serif; " class="mt-5">Check In Date & Time</h3>
          <div class="row right_sec p-4">
            <div class="col-md-6">
              <small>&nbsp;</small>
              <div class="mb-3">
                <label>
                  Date
                  <span class="text-danger">*</span>
                </label>
                
                <div class="input-group date" class="datepicker">
                  <input readonly value="" type="text" class="form-control datepicker_inp" name="checkin_date" placeholder="" required>
                  
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <small>&nbsp;</small>
              <div class="mb-3">
                <label>
                  Time
                  <span class="text-danger">*</span>
                </label>
                
                <div class="input-group date" class="">
                  <input readonly value="" type="text" class="form-control timepicker" name="checkin_time" placeholder="" required>
                  
                </div>         
              </div>
            </div>
          </div>
		   
          <h3 style="color:#de9a35; font-size:20px;   font-family: serif; " class="mt-5">Description</h3>
          <div class="row right_sec p-4">  
            
            <div class="col-lg-12">
              <div class="form-group mb-0">
                <div class="form-group">
                  
                  <textarea  class="form-control " type="text"  name="description" style='min-height: 115px;' required></textarea>
                </div>
              </div>
            </div>
          </div>
          
          <div class="clearfix"></div>
          <div class="col-lg-12 mt-4">
            <div class="manageLeaveres" style="clear:both;"></div>
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


<script>
$(document).ready(function(){
    $('.timepicker').timepicker({
		
    dropdown: true,
    scrollbar: true
	});
});

</script>