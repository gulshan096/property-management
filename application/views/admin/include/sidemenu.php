                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>
							
							<?php
							
							if($curuserdata['role'] == "Admin")
							{
                             
                             ?>							 

                            <li>
                                <a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard" class="waves-effect">
                                    <i class="mdi mdi-home-variant-outline"></i><span
                                        class="badge rounded-pill bg-primary float-end">3</span>
                                    <span>Dashboard</span>
                                </a>
                            </li>
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                   
									 <i class="mdi mdi-account-circle-outline"></i>
                                    <span>Properties</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/property">Create & View</a></li>
                                    
                                </ul> 
                            </li>
							
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                   
									 <i class="mdi mdi-account-circle-outline"></i>
                                    <span>User/Students</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/tenants/view">View All</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/tenants/active"> View Active</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/tenants/inactive">View Inactive</a></li> 
                                </ul> 
                            </li>
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    <span>Executive</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/executive/view">View All</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/subadmin/active"> View Active</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/subadmin/inactive">View Inactive</a></li> 
                                </ul> 
                            </li>
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    <span>Guard</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/guard/viewall">View All</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/guard/viewall"> View Active</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/guard/viewall">View Inactive</a></li> 
                                </ul> 
                            </li>
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
									 <i class="mdi mdi-account-circle-outline"></i>
                                    <span>Host/Owner</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/all_list">view all</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/owner_list">Owner list</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/owner/inactive">View Inactive</a></li> 
                                </ul> 
                            </li>
							
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                   
									 <i class="mdi mdi-account-circle-outline"></i>
                                    <span>Vendors</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/vendors/view">View All</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/vendors/active"> View Active</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/vendors/inactive">View Inactive</a></li> 
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/vendors/category/view">Vendor's category</a></li> 
                                </ul> 
                            </li>
							
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                   
									 <i class="mdi mdi-account-circle-outline"></i>
                                    <span>Admin</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/subadmin/view">View All</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/subadmin/active"> View Active</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/subadmin/inactive">View Inactive</a></li> 
                                </ul> 
                            </li>
							
							
                             
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"> 
									<i class="mdi mdi-page-layout-header"></i> 
                                    <span>Transactions</span>
                                </a>
								
									<ul class="sub-menu" aria-expanded="false">
										<li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/transaction/student/viewall">Student</a></li>
										<li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/transaction/executive/viewall">Executive</a></li>          
										<li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/transaction/owner/viewall">Owner</a></li>          
									</ul>

                            </li>  
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"> 
									<i class="mdi mdi-briefcase-variant-outline"></i>
                                    <span>Bookings</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false"> 
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/booking/create"> All</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>"> In Process</a></li>     
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>"> Canceled</a></li> 
									<li><a href="<?php echo BASE_HTTP_REL_URL  ?>administrator/bookedroom/status">Status</a></li>
                                </ul>
                            </li>
							 
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"> 
									<i class="mdi mdi-briefcase-variant-outline"></i>
                                    <span>Inventory</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false"> 
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/room/view/add">Create new</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/room/view"> List All</a></li>
                                </ul>
                            </li>
							
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"> 
									<i class="mdi mdi-briefcase-variant-outline"></i>
                                    <span>Food/ Mess</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/food/opted/users"> opted Users </a></li>
                                    
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/food/viewall"> List All</a></li>
                                </ul>
                            </li>
							
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"> 
									<i class="mdi mdi-briefcase-variant-outline"></i>
                                    <span>Electricity Charges</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/electricity/bills/addnew"> Add New</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/electricity/bills/viewall"> List All</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/electricity/bills/paid/el"> Paid</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/electricity/bills/unpaid/el"> Unpaid</a></li>
                                </ul>
                            </li>
							
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"> 
									<i class="mdi mdi-briefcase-variant-outline"></i>
                                    <span>Penalty Charges</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/penalty/add"> Add New</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/Penalty/bills/viewall"> List All</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/Penalty/bills/paid"> Paid</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/Penalty/bills/unpaid"> Unpaid</a></li>
                                </ul>
                            </li>
							
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"> 
									<i class="mdi mdi-briefcase-variant-outline"></i>
                                    <span>Pricing/ Package</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/Package/viewall/add"> Add New</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/package-pricing/viewall"> List All</a></li>
                                </ul>
                            </li>
							
							
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-map-pin-line"></i>
                                    <span>Locations</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/location/city/viewall"> View All Cities</a></li>   
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/location/area/viewall"> View All Areas</a></li> 
                                </ul>
                            </li>
							
							
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"> 
									<i class="mdi mdi-briefcase-variant-outline"></i>
                                    <span>Ad Banner</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/banner/add"> Create New</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/banner"> List All</a></li>
                                </ul>
                            </li>
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"> 
									<i class="mdi mdi-briefcase-variant-outline"></i>
                                    <span>Maintenance</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                   
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/service_manage/housekeepings/work"> Housekeepings Works </a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/service_manage/housekeepings/work/upload"> Upload Housekeepings Works </a></li>
                                </ul>
                            </li>
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                 <i class="ri-eraser-fill"></i>
                                    <span>Offers and Promotion</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/offer">Create & View All </a></li>
                                </ul>
                            </li> 
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                  <i class="mdi mdi-email-outline"></i>
                                    <span>Push Notification</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/notifications/send">Send Notification</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/notifications/viewall">  View All  Notification</a></li>      
                                </ul> 
                            </li>
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-gradient"></i>
                                    <span>Reviews</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/reviews/viewall">Ratings</a></li>
                                </ul>
                            </li>
							
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                   
									 <i class="mdi mdi-car-cog"></i>
                                    <span>Masters</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/manageemailtemplate">Email Templates</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/managesmstemplate">SMS Templates</a></li>
                                </ul>
                            </li>
							<?php
							}
							else if($curuserdata['role'] == "hostowner")
							{
							?>
                               <li>
                                <a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard" class="waves-effect">
                                    <i class="mdi mdi-home-variant-outline"></i><span
                                        class="badge rounded-pill bg-primary float-end">3</span>
                                    <span>Dashboard</span>
                                </a>
                            </li>
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                   
									 <i class="mdi mdi-account-circle-outline"></i>
                                    <span>My Profile</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/myprofile/view">View All</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/myprofile/active"> View Active</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/myprofile/inactive">View Inactive</a></li> 
                                </ul> 
                            </li>

                            <?php							
							}
							else
							{
							 ?>
							 <li>
                                <a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard" class="waves-effect">
                                    <i class="mdi mdi-home-variant-outline"></i><span
                                        class="badge rounded-pill bg-primary float-end">3</span>
                                    <span>Dashboard</span>
                                </a>
                            </li>
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                   
									 <i class="mdi mdi-account-circle-outline"></i>
                                    <span>My Profile</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/myprofile/view">View All</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/myprofile/active"> View Active</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/myprofile/inactive">View Inactive</a></li> 
                                </ul> 
                            </li>
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                   
									 <i class="mdi mdi-account-circle-outline"></i>
                                    <span>Attendance</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/attendance/view">View All</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/attendance/active"> View Active</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/attendance/inactive">View Inactive</a></li>
                                       
                                </ul> 
                            </li>
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                   
									 <i class="mdi mdi-account-circle-outline"></i>
                                    <span>Tenant</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/tenants/view">View All</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/attendance/active"> View Active</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/attendance/inactive">View Inactive</a></li>
                                       
                                </ul> 
                            </li>
							
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                   
									 <i class="mdi mdi-account-circle-outline"></i>
                                    <span>Order </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/order/view">View All</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/order/active"> View Active</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/order/inactive">View Inactive</a></li> 
                                </ul> 
                            </li>
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                   
									<i class="mdi mdi-account-circle-outline"></i>
                                    <span>Complaint/Request</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
								    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/request/leave"> Leave</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/request/complaints"> Complaints </a></li>
                                    
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/request/rsolve_list">Work Alloted</a></li>
                                </ul> 
                            </li>      
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                   
									 <i class="mdi mdi-account-circle-outline"></i>
                                    <span>Property </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/property/view">View All</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/property/active"> View Active</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/property/inactive">View Inactive</a></li> 
                                </ul> 
                            </li>
							
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                   
									 <i class="mdi mdi-account-circle-outline"></i>
                                    <span>Manage Entry </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/entry/view">View All</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/entry/active"> View Active</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/entry/inactive">View Inactive</a></li> 
                                   
                                </ul> 
                            </li>
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                  <i class="mdi mdi-email-outline"></i>
                                    <span>Push Notification</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/notifications/send">Send Notification</a></li>
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/notifications/viewall">  View All  Notification</a></li>      
                                </ul> 
                            </li>
							
							<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-gradient"></i>
                                    <span>Reviews</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false"> 
                                    <li><a href="<?php echo BASE_HTTP_REL_URL; ?>executive/reviews/viewall">Ratings</a></li>
                                </ul>
                            </li>
							<li>
                                <a href="javascript: void(0);" class=""> 
									<i class="mdi mdi-page-layout-header"></i> 
                                    <span>Privacy Policy</span>
                                </a>
								
									
                            </li>  
							<li>
                                <a href="javascript: void(0);" class=""> 
									<i class="mdi mdi-briefcase-variant-outline"></i>
                                    <span>Terms & Conditions</span>
                                </a>
                                
                            </li>
							 
                          <?php							 
								
							}
                            ?>							
                        </ul>
                    </div>