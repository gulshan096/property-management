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
                                    <h4 class="mb-sm-0">Dashboard  Host Owner</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-xl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex text-muted">
                                           <div class="flex-shrink-0  me-3 align-self-center">
                                                <div class="avatar-sm">
                                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                        <i class="ri-group-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="mb-1">Users</p>   
                                                <h5 class="mb-3">33,900</h5>
                                            </div>  
                                        </div>
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0  me-3 align-self-center">
                                                <div class="avatar-sm">
                                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                        <i class="ri-group-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden"> 
                                                <p class="mb-1">Properties/ Rooms</p>
                                                <h5 class="mb-3">2,500</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex text-muted">
                                            <div class="flex-shrink-0  me-3 align-self-center">
                                                <div class="avatar-sm">
                                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                        <i class="ri-group-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="mb-1">Bookings</p>
                                                <h5 class="mb-3">15,000</h5>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex text-muted">
                                            <div class="flex-shrink-0  me-3 align-self-center">
                                                <div class="avatar-sm">
                                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                        <i class="ri-group-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="mb-1">New Visitors</p>
                                                <h5 class="mb-3">435</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">  
                                            <div class="flex-grow-1">
                                                <h5 class="card-title">Overview</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div>
                                                    <button type="button" class="btn btn-soft-secondary btn-sm">
                                                        ALL
                                                    </button>
                                                    <button type="button" class="btn btn-soft-primary btn-sm">
                                                        1M
                                                    </button>
                                                    <button type="button" class="btn btn-soft-secondary btn-sm">
                                                        6M 
                                                    </button>
                                                    <button type="button" class="btn btn-soft-secondary btn-sm active">
                                                        1Y
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div id="mixed-chart" class="apex-charts" dir="ltr"></div>
                                        </div>
                                    </div>
                                    <!-- end card-body -->

                                    <div class="card-body border-top">
                                        <div class="text-muted text-center">
                                            <div class="row">
                                                <div class="col-4 border-end">
                                                    <div>
                                                        <p class="mb-2"><i class="mdi mdi-circle font-size-12 text-primary me-1"></i> Bookings</p>
                                                        <h5 class="font-size-16 mb-0">8,524 <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i>1.2 %</span></h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 border-end">
                                                    <div>
                                                        <p class="mb-2"><i class="mdi mdi-circle font-size-12 text-light me-1"></i> Request</p>
                                                        <h5 class="font-size-16 mb-0">8,524 <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i>2.0 %</span></h5>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="mb-2"><i class="mdi mdi-circle font-size-12 text-danger me-1"></i> Complaint</p>
                                                        <h5 class="font-size-16 mb-0">8,524 <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i>0.4 %</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-4 d-none">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex  align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="card-title">Social Source</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <select class="form-select form-select-sm mb-0 my-n1">
                                                    <option value="MAY" selected="">May</option>
                                                    <option value="AP">April</option>
                                                    <option value="MA">March</option>
                                                    <option value="FE">February</option>
                                                    <option value="JA">January</option>
                                                    <option value="DE">December</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div>
                                            <div id="radialBar-chart" class="apex-charts" dir="ltr"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="social-source text-center mt-3">
                                                    <div class="avatar-xs mx-auto mb-3">
                                                        <span class="avatar-title rounded-circle bg-primary font-size-18">
                                                            <i class="ri  ri-facebook-circle-fill text-white"></i>
                                                        </span>
                                                    </div>
                                                    <h5 class="font-size-15">Facebook</h5>
                                                    <p class="text-muted mb-0">125 sales</p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="social-source text-center mt-3">
                                                    <div class="avatar-xs mx-auto mb-3">
                                                        <span class="avatar-title rounded-circle bg-info font-size-18">
                                                            <i class="ri  ri-twitter-fill text-white"></i>
                                                        </span>
                                                    </div>
                                                    <h5 class="font-size-15">Twitter</h5>
                                                    <p class="text-muted mb-0">112 sales</p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="social-source text-center mt-3">
                                                    <div class="avatar-xs mx-auto mb-3">
                                                        <span class="avatar-title rounded-circle bg-danger font-size-18">
                                                            <i class="ri ri-instagram-line text-white"></i>
                                                        </span>
                                                    </div>
                                                    <h5 class="font-size-15">Instagram</h5>
                                                    <p class="text-muted mb-0">104 sales</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Booking Stats</h5>
                                        <div>
                                            <ul class="list-unstyled">
                                                <li class="py-3">
                                                    <div class="d-flex">
                                                        <div class="avatar-xs align-self-center me-3">
                                                            <div class="avatar-title rounded-circle bg-light text-primary font-size-18">
                                                                <i class="ri-checkbox-circle-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted mb-2">In Process</p>
                                                            <div class="progress progress-sm animated-progess">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="py-3">
                                                    <div class="d-flex">
                                                        <div class="avatar-xs align-self-center me-3">
                                                            <div class="avatar-title rounded-circle bg-light text-primary font-size-18">
                                                                <i class="ri-calendar-2-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted mb-2">Pending</p>
                                                            <div class="progress progress-sm animated-progess">
                                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="py-3">
                                                    <div class="d-flex">
                                                        <div class="avatar-xs align-self-center me-3">
                                                            <div class="avatar-title rounded-circle bg-light text-primary font-size-18">
                                                                <i class="ri-close-circle-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted mb-2">Cancel</p>
                                                            <div class="progress progress-sm animated-progess">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 19%" aria-valuenow="19" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <hr>
                                        
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="mt-2">
                                                        <p class="text-muted mb-2">In Process</p>
                                                        <h5 class="font-size-16 mb-0">70</h5>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mt-2">
                                                        <p class="text-muted mb-2">Pending</p>
                                                        <h5 class="font-size-16 mb-0">45</h5>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mt-2">
                                                        <p class="text-muted mb-2">Cancel</p>
                                                        <h5 class="font-size-16 mb-0">19</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Notifications</h4>

                                        <div class="pe-3" data-simplebar style="max-height: 287px;">
                                            <a href="#" class="text-body d-block">
                                                <div class="d-flex py-3">
                                                    <div class="flex-shrink-0 me-3 align-self-center">
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title bg-soft-primary rounded-circle text-primary">
                                                                <i class="mdi mdi-account-supervisor"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                        
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="font-size-14 mb-1">Pooja Sharma</h5>
                                                        <p class="text-truncate mb-0">
                                                            Request a Service.
                                                        </p>
                                                    </div>
                                                    <div class="flex-shrink-0 font-size-13">
                                                        20 min ago
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="text-body d-block">
                                                <div class="d-flex py-3">
                                                    <div class="flex-shrink-0 me-3 align-self-center">
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title bg-soft-primary rounded-circle text-primary">
                                                                <i class="mdi mdi-account-supervisor"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="font-size-14 mb-1">Ananya Tiwari</h5>
                                                        <p class="text-truncate mb-0">
                                                            Raise a Complaint
                                                        </p>
                                                    </div>
                                                    <div class="flex-shrink-0 font-size-13">
                                                        9:00 am
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="text-body d-block">
                                                <div class="d-flex py-3">
                                                    <div class="flex-shrink-0 me-3 align-self-center">
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title bg-soft-primary rounded-circle text-primary">
                                                                <i class="mdi mdi-account-supervisor"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="font-size-14 mb-1">Aishwarya</h5>
                                                        <p class="text-truncate mb-0">
                                                            Paid the Fee
                                                        </p>
                                                    </div>
                                                    <div class="flex-shrink-0 font-size-13">
                                                        8:54 am
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="text-body d-block">
                                                <div class="d-flex py-3">
                                                    <div class="flex-shrink-0 me-3 align-self-center">
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title bg-soft-primary rounded-circle text-primary">
                                                                <i class="mdi mdi-account-supervisor"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                        
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="font-size-14 mb-1">Pooja Sharma</h5>
                                                        <p class="text-truncate mb-0">
                                                            Request a Service.
                                                        </p>
                                                    </div>
                                                    <div class="flex-shrink-0 font-size-13">
                                                        20 min ago
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="text-body d-block">
                                                <div class="d-flex py-3">
                                                    <div class="flex-shrink-0 me-3 align-self-center">
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title bg-soft-primary rounded-circle text-primary">
                                                                <i class="mdi mdi-account-supervisor"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="font-size-14 mb-1">Ananya Tiwari</h5>
                                                        <p class="text-truncate mb-0">
                                                            Raise a Complaint
                                                        </p>
                                                    </div>
                                                    <div class="flex-shrink-0 font-size-13">
                                                        9:00 am
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="text-body d-block">
                                                <div class="d-flex py-3">
                                                    <div class="flex-shrink-0 me-3 align-self-center">
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title bg-soft-primary rounded-circle text-primary">
                                                                <i class="mdi mdi-account-supervisor"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="font-size-14 mb-1">Aishwarya</h5>
                                                        <p class="text-truncate mb-0">
                                                            Paid the Fee
                                                        </p>
                                                    </div>
                                                    <div class="flex-shrink-0 font-size-13">
                                                        8:54 am
                                                    </div>
                                                </div>
                                            </a>
                                           
                        
                                        </div>
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Revenue by Location</h5>
                        
                                        <div>
                                            <div id="usa" style="height: 226px"></div>
                                        </div>
                        
                                        <div class="text-center mt-4">
                                            <a href="#" class="btn btn-primary btn-sm">View More</a>
                                        </div>
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Latest Transaction</h4>

                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                       
                                                        <th scope="col"  style="width: 60px;"></th>
                                                        <th scope="col">ID & Name</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">For</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												
												
                                                    <tr>
                                                       
                                                        <td>
                                                           
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-soft-primary text-success">
                                                                    RY
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="mb-1 font-size-12">#AP1234</p>
                                                            <h5 class="font-size-15 mb-0">Rahul Yadav</h5>
                                                        </td>
                                                        <td>02 May, 2022</td>
                                                        <td>INR 1,234</td>
                                                        <td>Room ABC</td>
                                                        
                                                        <td>
                                                            <i class="mdi mdi-checkbox-blank-circle text-success me-1"></i> Confirm
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                       
                                                        <td>
                                                           
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-soft-primary text-success">
                                                                    PR
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="mb-1 font-size-12">#AP1234</p>
                                                            <h5 class="font-size-15 mb-0">Panjaj Rawat</h5>
                                                        </td>
                                                        <td>29 April, 2022</td>
                                                        <td>INR 2,334</td>
                                                        <td>Room ZXY</td>
                                                        
                                                        <td>
                                                            <i class="mdi mdi-checkbox-blank-circle text-success me-1"></i> Confirm
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td>
                                                           
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-soft-primary text-success">
                                                                    PS
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="mb-1 font-size-12">#AP1234</p>
                                                            <h5 class="font-size-15 mb-0">Pooja Sharma</h5>
                                                        </td>
                                                        <td>28 April, 2022</td>
                                                        <td>INR 798</td>
                                                        <td>Room ZXY</td>
                                                        
                                                        <td>
                                                            <i class="mdi mdi-checkbox-blank-circle text-danger me-1"></i> Cancel
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                       
                                                        <td>
                                                           
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-soft-primary text-success">
                                                                    RK
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="mb-1 font-size-12">#AP1234</p>
                                                            <h5 class="font-size-15 mb-0">Ragini Kaul</h5>
                                                        </td>
                                                        <td>02 May, 2022</td>
                                                        <td>INR 1,234</td>
                                                        <td>1</td>
                                                        
                                                        <td>
                                                            <i class="mdi mdi-checkbox-blank-circle text-success me-1"></i> Confirm
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td>
                                                           
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-soft-primary text-success">
                                                                    RY
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="mb-1 font-size-12">#AP1234</p>
                                                            <h5 class="font-size-15 mb-0">Priyanka Gupta</h5>
                                                        </td>
                                                        <td>02 May, 2022</td>
                                                        <td>INR 1,234</td>
                                                        <td>1</td>
                                                        
                                                        <td>
                                                            <i class="mdi mdi-checkbox-blank-circle text-success me-1"></i> Confirm
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                        </td>
                                                    </tr>
													
													
													
													
													
													
													
													
													
													
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
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
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts js -->
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- jquery.vectormap map -->
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>

        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/pages/dashboard.init.js?v=5"></script>
		<script>
			var REL_BASE_URL	=	"<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/";
		</script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>

    </body>
</html>
