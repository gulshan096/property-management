<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $seo['title']; ?></title>
        <meta content="<?php echo $seo['description']; ?>" name="description" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo BASE_HTTP_REL_URL; ?>favicon.ico" />

        <!-- Bootstrap Css -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
			
		<style>	
			.logohere { height: 110px ; max-width: 100%; object-fit: contain; }
		</style>	
		
    </head>

    <body class="bg-pattern">
        <div class="bg-overlay"></div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="">
                                    <div class="text-center">
                                        <a href="<?php echo BASE_HTTP_REL_URL; ?>" class="">
                                            <img src="<?php echo BASE_HTTP_REL_URL; ?>assets/logo.png" alt="" class="auth-logo logo-dark mx-auto logohere" />
                                            <img src="<?php echo BASE_HTTP_REL_URL; ?>assets/logo.png" alt="" height="24" class="auth-logo logo-light mx-auto logohere" />
                                        </a>
                                    </div>
                                    <!-- end row -->
                                    <h4 class="font-size-18 text-muted mt-2 text-center">Welcome Back !</h4>
                                    <p class="mb-5 text-center">Executive Sign in to continue</p>
                                    <form class="form-horizontal ex_dologinfrm" method="POST" onsubmit="return executive_dologin();">
                                                  
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label" for="username">Email or Mobile</label>
                                                    <input required name="username" type="text" class="form-control" id="username" placeholder="Enter Email or Mobile" />
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label" for="userpassword">Password or OTP</label>
                                                    <input required name="password" type="password" class="form-control" id="userpassword" placeholder="Enter Password or OTP" />
                                                </div>

                                                <div class="ex_dologinres"></div>
												
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="keepmelogin" class="form-check-input" id="customControlInline" />
                                                            <label class="form-label" class="form-check-label" for="customControlInline">Remember me</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-md-end mt-3 mt-md-0">
                                                            <a href="javascript:void()" onclick=" $('#RequestOTPModal').modal('show'); " name='phoneno' class="text-muted"><i class="mdi mdi-lock"></i>Request OTP?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-grid mt-4">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p class="text-white-50">&copy;<script>document.write(new Date().getFullYear())</script> <a href="<?php echo BASE_HTTP_REL_URL; ?>"><?php echo APP_NAME; ?></a>. Developed  by <a href="https://sjain.io/" target="_BLANK">Sjain</a></p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->
<script>
	var baserelativepath = "<?php echo BASE_HTTP_REL_URL; ?>";
</script>

        <!-- JAVASCRIPT -->
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/node-waves/waves.min.js"></script>

        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js"></script> 
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/sjain.js?v=<?php echo CACHE_VERSION; ?>"></script> 
		
		<script>
		
		function executive_dologin()	
		{
		 
			$(".ex_dologinres").html("<center><img src='"+baserelativepath+"loader.gif' style='max-width:32px;margin:3px auto;' /></center>");
				
			var data = $(".ex_dologinfrm").serializeArray();
			$.ajax({
				type: "POST",
				async: true,
				url: baserelativepath+'Authentication/executive_dologin',
				data: data,
				success: function(tempdata) 
					{
						$(".ex_dologinres").html(tempdata); 
					}
			});
			return false;
		}
		</script>

    </body>
</html>



<!-- Modal -->
<div class="modal fade" id="RequestOTPModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="modal-content" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Request OTP</h5>
        <button type="button" class="close" onclick=" $('#RequestOTPModal').modal('hide');" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		<div class="mb-4">
			<label class="form-label" for="username">Email or Mobile</label>
			<input required="" name="username" type="text" class="form-control" id="username" placeholder="Enter Email or Mobile" />
		</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick=" $('#RequestOTPModal').modal('hide');">Close</button>
        <button type="submit" class="btn btn-primary">Send Login OTP</button>
      </div>
    </form>
  </div>
</div>