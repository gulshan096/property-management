   <style>
    .list-group ul li a:hover{
		
		color: red;
		
	}
	.list-group a.active{
		background:#de9a35!important;
		border:none!important;
	}
	
	.list-group ul li.active>a,
	 a[aria-expanded="true"]{
		 
	 }

       
        nav>a:hover {
            color: #de9a35;
        }
 
        /*code to change background color*/
        nav>a>.active {
            background-color: #de9a35!important;
            color: #ffffff!important;
        }
	 
	
   </style>    
	<div class="col-lg-3  sidebar ">
			<aside class="user-info-wrapper">
				<div class="user-cover" style="background-image: url(https://bootdey.com/img/Content/bg1.jpg);">
					<center>
					<div class="">
					    <button class="btn btn-white text-dark px-3 mt-5" style="font-size:18px; border-radius:10px !important;">My Account</button>
					</div>
					</center>
				</div>
				<div class="user-info">
					
					<div class="user-data">
						<h3><?php echo isset($curuser)?$curuser['name']:""; ?></h3>
						<span class="text-primary"><?php echo isset($curuser)?$curuser['mobile']:""; ?></span>
						<span class="text-danger"><?php echo isset($curuser)?$curuser['email']:""; ?></span>
					</div>
				</div>
			</aside>
	<!--		
  <script>
        $(document).ready(function () {
			<?php  
//$protocol = ((!emptyempty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
//$CurPageURL // $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$last_name='#'.basename($actual_link); 
     
?>
 
            $('nav.list-group>a')
                    .click(function (e) {
                $('nav.list-group>a')
                    .removeClass('active');
                $($last_name).addClass('active');
            });
        });
    </script> 
	-->
	
	<!--a class="<?php if($this->uri->segment(3)=="myaccount"){echo "active text-danger";}?>" href="<?php echo base_url("doctors/account/myaccount") ?>">My Profile</a-->


			<nav class="list-group menu">
				<a  class="<?php if($this->uri->segment(3)=="myprofile"){echo "active text-white";}?>  list-group-item" href="<?php echo base_url('user/front/myprofile'); ?>"><i class="fa fa-user"></i>Profile</a>
				<a class="<?php if($this->uri->segment(3)=="profile_verification"){echo "active text-white";}?> list-group-item" href="<?php echo base_url('user/front/profile_verification'); ?>"><i class="fa fa-heart"></i>Profile Verification</a>
				<a class="list-group-item" href="#requestSubmenu" aria-expanded="false"  data-toggle="collapse" class="dropdown-toggle"><i class="fa fa-heart"></i>My Request <span style="position:absolute; right:0;"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
				<ul class="<?php if($this->uri->segment(3)=="complaints"||$this->uri->segment(3)=="leave"){echo "active text-white";}?> collapse list-unstyled" id="requestSubmenu">
				    
					
					<li class="list-group-item">
				        <a class=" <?php if($this->uri->segment(3)=="complaints"){echo "active text-white";}?> ml-5" href="<?php echo base_url('user/front/myrequest/complaints'); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i>Services</a>
					</li>
					 <li class="list-group-item">
				        <a class="<?php if($this->uri->segment(3)=="leave"){echo "active text-white";}?> ml-5" href="<?php echo base_url('user/front/myrequest/leave'); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i>Leave</a>
					</li> 
				</ul>
				<a class="list-group-item" href="#chargesSubmenu" aria-expanded="false"  data-toggle="collapse" class="dropdown-toggle"><i class="fa fa-heart"></i>Charges <span style="position:absolute; right:0;"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
				<ul class="<?php if($this->uri->segment(3)=="electricity"||$this->uri->segment(3)=="penalty"){echo "active text-white";}?> collapse list-unstyled" id="chargesSubmenu">
				    
					<li class="list-group-item">
				        <a class="<?php if($this->uri->segment(3)=="electricity"){echo "active text-white";}?> ml-5" href="<?php echo base_url('user/front/charges/electricity'); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i>Electricity</a>
					</li>
					<li class="list-group-item">
				        <a class="<?php if($this->uri->segment(3)=="penalty"){echo "active text-white";}?> ml-5" href="<?php echo base_url('user/front/charges/penalty'); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i>Penalty</a>
					</li>
				</ul>
				
				<a class="list-group-item" href="#entrySubmenu" aria-expanded="false"  data-toggle="collapse" class="dropdown-toggle"><i class="fa fa-heart"></i>Manage Entry<span style="position:absolute; right:0;"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
				<ul class="<?php if($this->uri->segment(3)=="guest"||$this->uri->segment(3)=="guest_history"){echo "active text-white";}?> collapse list-unstyled" id="entrySubmenu"> 
					<li class="list-group-item">
				        <a class="<?php if($this->uri->segment(3)=="guest"){echo "active text-white";}?> ml-5" href="<?php echo base_url('user/front/entry/guest'); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i>Guest</a>
					</li>
					<li class="list-group-item">
				        <a class="<?php if($this->uri->segment(3)=="guest_history"){echo "active text-white";}?> ml-5" href="<?php echo base_url('user/front/entry/guest_history'); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i>View All</a>
					</li>
				</ul>
				<a class="<?php if($this->uri->segment(3)=="mybooking"){echo "active text-white";}?>list-group-item" href="<?php echo base_url('user/front/mybooking'); ?>"><i class="fa fa-heart"></i>My Booking</a>
				<a class="<?php if($this->uri->segment(3)=="mytransaction"){echo "active text-white";}?> list-group-item" href="<?php echo base_url('user/front/mytransaction'); ?>"><i class="fa fa-user"></i>Transaction</a>
			    <a class="<?php if($this->uri->segment(3)=="mytransaction"){echo "active text-white";}?> list-group-item" href="<?php echo base_url('user/front/mytransaction'); ?>"><i class="fa fa-user"></i>Terms & Conditions</a>
			    <a class="<?php if($this->uri->segment(3)=="mytransaction"){echo "active text-white";}?> list-group-item" href="<?php echo base_url('user/front/mytransaction'); ?>"><i class="fa fa-user"></i>Privacy & Policy</a>
			</nav>
		</div>