<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

     //User or frontend 

        $route['user/front/search']                      =      'user/SearchProperty/search_property';
        $route['user/front/search/area']                 =      'user/SearchProperty/search';
        $route['user/front/details/(:any)']              =      'user/SearchProperty/property_room_details/$1';
		
		$route['user/front/getRoomDetail']               =       'user/SearchProperty/getRoomDetail';
        $route['user/front/getBeds']                     =       'user/SearchProperty/getBeds';	
        $route['user/front/booking_save']                =       'user/ReserveProperty/book_property';		
		$route['user/front/getRoomPrice']                =       'user/SearchProperty/getRoomPrice';
		$route['user/front/your-detail']                 =       'user/SearchProperty/yourDetail';
        $route['user/front']                             =       'user/Home/home';
	
 // Executive Registration
       $route['user/front/executive/registration']       =       'user/Host/executive';
	   $route['user/front/executive/registerSave']       =       'user/Host/register_executive';
	   
	   
	//Security Guard Registration
	   
       $route['user/front/guard/registration']           =       'user/guard/add_guard';
	   $route['user/front/guard/registerSave']           =       'user/guard/register_guard';
 
	// Host/Owner
		$route['user/front/Owner/registerSave']          =       'user/Host/pro_owner_reg';
		$route['user/front/host/registration']           =       'user/Host/host';
		
		$route['administrator/all_list']                 =       'user/Host/reg_owner_list';
        $route['administrator/owner_list']               =      	'user/Host/owner_list/0';	
		$route['administrator/host_owner_details']       =       'user/Host/host_owner_details';
	    $route['administrator/hostowner/managehost']     =       'user/Host/managehost';
		$route['administrator/owner/view/(:any)']		 =	    'user/Host/owner_list/$1';
		

    //Payment	
        
         $route['paymeny/status']                        =       'Payment/paymentStatus';
         $route['payment/notification']                  =       'Payment/paymentNotification';		 
         $route['default_controller'] 					 =	    'Front/index';
		 	 
    //User Dashboard
         $route['user/front/myprofile']                  =      'user/Dashboard/dashboard';
		 $route['user/front/mytransaction']              =      'user/Dashboard/mytransaction';
		 $route['user/front/profile_verification']       =      'user/Dashboard/document';
		 $route['user/front/mybooking']                  =      'user/Dashboard/mybooking';
		 $route['user/front/entry']                      =      'user/Dashboard/dashboard';
		
		 $route['user/front/myrequest']                  =      'user/Dashboard/dashboard';
		 $route['user/front/setting']                    =      'user/Dashboard/dashboard';
		 $route['user/front/booking/invoice/(:any)']     =      'user/Dashboard/myBookingInvoice/$1';
		
  
	//User Manage Entry	 
	
	     $route['user/front/entry/(:any)']               =      'user/MyGuest/myguest/$1';
		 $route['user/front/manage_entry']               =      'user/MyGuest/manage_entry';
		 
	//User Manage Charges
	     $route['user/front/charges/(:any)']             =      'user/Charges/charges/$1';
		 
		 
		 
	//User Request/Complaints
	
	    $route['user/front/myrequest/complaints']      =    'user/Request/complaints';
		$route['user/front/myrequest/complaints_list'] =    'user/Request/complaints_list';
		$route['user/front/request/manage_complaints'] =    'user/Request/manage_complaints';
		
		$route['user/front/myrequest/leave']           =    'user/Request/leave';
		$route['user/front/myrequest/leave_list']      =    'user/Request/leave_list';
		$route['user/front/request/manage_leave']      =    'user/Request/manage_leave';
		

 //for mobile API
		
		
		
		$route['user/doregistration']			=	'mobileapi/Users/DoRegistration';
		$route['user/verifyotp']				=	'mobileapi/Users/verifyOTP';
		$route['user/company']					=	'mobileapi/Users/GetUsersCompany';
		$route['user/page/content']				=	'mobileapi/Users/GetMobilePage';
		$route['user/GetCities']				=	'mobileapi/Users/GetCities';
		$route['user/GetStates']				=	'mobileapi/Users/GetStates'; 
		$route['user/GetMobileFlyer']			=	'mobileapi/Users/GetMobileFlyer'; 
		$route['user/MyActivity']				=	'mobileapi/Users/MyActivity'; 
		$route['user/profile/ManageBikes']		=	'mobileapi/Users/ManageBikes';
		$route['user/profile/GetMyBikes']		=	'mobileapi/Users/GetMyBikes';
		$route['vendor/dologin']				=	'mobileapi/Vendors/dologin';
		$route['vendor/verifyotp']				=	'mobileapi/Vendors/verifyOTP';
		$route['user/getcategory']				=	'mobileapi/Users/getCat';
		
 //for admin panel
		$route['administrator']									 =	'Authentication/login';
		$route['administrator/updatestatus']					 =	'administrator/Master/updatestatus';
		$route['administrator/dashboard']						 =	'Authentication/dashboard';
		$route['administrator/manageemailtemplate']   	    	 =	'administrator/Email/listemailtemplate';
		$route['administrator/managesmstemplate']     			 =	'administrator/Sms/listsmstemplate'; 

/*-------------------*/



		$route['administrator/executive/manageexecutive']        =   'administrator/subadmin/manageexecutive';
		$route['administrator/executive/view']                   =   'administrator/subadmin/executive_list/0';
		$route['administrator/executive/view/(:any)']			 =	'administrator/subadmin/executive_list/$1';

		//$route['administrator/offers/viewall']   			     =	   'administrator/OffersPromotion/offers/0';            
		//$route['administrator/offers/viewall/(:any)']   	     =	   'administrator/OffersPromotion/offers/$1'; 

//Transaction

		$route['administrator/transaction/student/viewall']    =      'administrator/Booking/student_transaction';
		
// Offer
		$route['administrator/offer/manageoffer']    =	'administrator/Offer/manageoffer';
		$route['administrator/offer']     	 		 =	'administrator/Offer/offer_list/0';
		$route['administrator/offer/(:any)']     	 =	'administrator/Offer/offer_list/$1';

// Banner
		$route['administrator/banner/managebanner']  =	'administrator/Banner/managebanner';
		$route['administrator/banner']     			 =	'administrator/Banner/list/0';
		$route['administrator/banner/(:any)']     	 =	'administrator/Banner/list/$1';


// Property
		$route['administrator/property/manageproperty']    =	'administrator/property/manageproperty';
		$route['administrator/property']                   =    'administrator/property/property_list/0';
		$route['administrator/property/(:any)']     	   =	'administrator/property/property_list/$1';


// Maintenance

		$route['administrator/maintenance/service_manage'] =  'administrator/Maintenance/manage_maintenance';
		$route['administrator/service_manage/housekeepings/work']             =  'administrator/Maintenance/service_manage/0';
		$route['administrator/service_manage/(:any)']      =  'administrator/Maintenance/service_manage/$1';
		$route['administrator/service_manage/user/(:any)']        =  'administrator/Maintenance/user_request_complaint/$1';  


		$route['administrator/food/managemenu']          =  'administrator/menu/managemenu';
		$route['administrator/food/viewall/(:any)']      =  'administrator/menu/list/$1';
		$route['administrator/food/viewall']             =  'administrator/menu/list/0';

		$route['administrator/food/card/managemenucard']      =  'administrator/menu/managemenucard';
		$route['administrator/food/card/viewall/(:any)']      =  'administrator/menu/list_menucard/$1';
		$route['administrator/food/card/viewall']             =  'administrator/menu/list_menucard/0';


/*-------------------*/ 

		$route['administrator/masterdata']			 =	'administrator/offer/masterdata';

		$route['administrator/role/managerole']      =	'administrator/role/managerole';
		$route['administrator/role']     			 =	'administrator/role/list/0';
		$route['administrator/role/(:any)']     	 =	'administrator/role/list/$1';


		$route['administrator/roletype/manageroletype']  =	'administrator/roletype/manageroletype';
		$route['administrator/roletype']     			 =	'administrator/roletype/list/0';
		$route['administrator/roletype/(:any)']     	 =	'administrator/roletype/list/$1';


		$route['administrator/staff/managestaff']  =	'administrator/staff/managestaff';
		$route['administrator/staff']     			 =	'administrator/staff/list/0';
		$route['administrator/staff/(:any)']     	 =	'administrator/staff/list/$1';



/*  -------------tenant-----------  */

        $route['administrator/tenants/manageuser']      =	'administrator/user/manageuser';
		$route['administrator/tenants/view']     		=	'administrator/user/list/0';
		$route['administrator/tenants/view/(:any)'] 	=	'administrator/user/list/$1';

		 $route['administrator/tenants/active']     	=	'administrator/user/list_active_only';
		 $route['administrator/tenants/inactive']     	=	'administrator/user/list_inactive_only';
		 
		 
		$route['administrator/vendors/managevendor']      =	'administrator/vendor/managevendor';
		$route['administrator/vendors/view']     		=	'administrator/vendor/list/0';
		$route['administrator/vendors/view/(:any)'] 	=	'administrator/vendor/list/$1';

		$route['administrator/vendors/active']     	=	'administrator/vendor/list_active_only';
		$route['administrator/vendors/inactive']     	=	'administrator/vendor/list_inactive_only';



		$route['administrator/vendors/managevendorcategory']      =	'administrator/vendor/managevendorcategory';
		$route['administrator/vendors/category/view']     		=	'administrator/vendor/vendor_category/0';
		$route['administrator/vendors/category/view/(:any)'] 	=	'administrator/vendor/vendor_category/$1';



// $route['administrator/tenants/active']     	=	'administrator/user/list_active/0';
// $route['administrator/tenants/inactive']     =	'administrator/user/list_inactive/0';

		$route['administrator/amenity/manageamenity']   =	'administrator/amenities/manageamenity';
		$route['administrator/amenity/view']            =	'administrator/amenities/list/0';
		$route['administrator/amenity/view/(:any)']     =	'administrator/amenities/list/$1';


		$route['administrator/room/manageroom']   =	'administrator/room/manageroom';
		$route['administrator/room/view']            =	'administrator/room/list/0';
		$route['administrator/room/view/(:any)']     =	'administrator/room/list/$1';

// Electricity bill



		$route['administrator/electricity/bills//managebill'] =	'administrator/Electricity/manageElBill';
		$route['administrator/electricity/bills/viewall']     =	'administrator/Electricity/list/0';  
		$route['administrator/electricity/bills/(:any)']     =	'administrator/Electricity/list/$1';

		$route['administrator/electricity/bills/paid/el']     =	'administrator/Electricity/list_paid_only';  
		$route['administrator/electricity/bills/unpaid/el']     =	'administrator/Electricity/list_unpaid_only';
        //$route['administrator/electricity/bills/property/room/(:any)'] ='administrator/Electricity/roomlist/$1';

/*-----------sub admin----------*/
//subadmin/view
		$route['administrator/subadmin/managesubadmin']			 =	'administrator/subadmin/managesubadmin';
		$route['administrator/subadmin/view']					 =	'administrator/subadmin/list/0';
		$route['administrator/subadmin/view/(:any)']			 =	'administrator/subadmin/list/$1';




/*
$route['administrator/vendors/add']     				 =	'administrator/Vendors/add/0';
$route['administrator/vendors/add/(:any)']     			 =	'administrator/Vendors/add/$1';
$route['administrator/vendors/view']     				 =	'administrator/Vendors/list/0';
$route['administrator/vendors/view/(:any)']    		 	 =	'administrator/Vendors/list/$1';
*/

		$route['administrator/users/company']     				 =	'administrator/Users/users_company/0';   
		$route['administrator/users/company/(:any)']    		 =	'administrator/Users/users_company/$1';
		$route['administrator/users/Active_user']     			 =	'administrator/Users/active_user/0';   
		$route['administrator/users/Inactive_user']     		 =	'administrator/Users/inactive_user/0';   

		$route['administrator/managecategories']     			 =	'administrator/Master/master/category/1';


		$route['administrator/location/city/viewall/managecity'] =  'administrator/Master/managecity';
		$route['administrator/location/city/viewall']           =	'administrator/Master/list_city/0';
		$route['administrator/location/city/viewall/(:any)']    =	'administrator/Master/list_city/$1';

		$route['administrator/location/city/viewall/managearea'] =  'administrator/Master/managearea';
		$route['administrator/location/area/viewall']            =	'administrator/Master/list_area/0';
		$route['administrator/location/area/viewall/(:any)']     =	'administrator/Master/list_area/$1';

		$route['administrator/MasterVehicel/make/viewall']    		    =	'administrator/Master/vehicel_make/0';
		$route['administrator/MasterVehicel/make/viewall/(:any)']       =	'administrator/Master/vehicel_make/$1';
		$route['administrator/MasterVehicel/model/viewall']    		    =	'administrator/Master/vehicel_model/0';
		$route['administrator/MasterVehicel/model/viewall/(:any)']      =	'administrator/Master/vehicel_model/$1';
		$route['administrator/MasterVehicel/varient/viewall']   	    =	'administrator/Master/vehicel_varient/0';
		$route['administrator/MasterVehicel/varient/viewall/(:any)']    =	'administrator/Master/vehicel_varient/$1';
		 
		$route['administrator/sparepart/vendor']   	    	=	   'administrator/sparepart/sparepartvendor/0';  
		$route['administrator/sparepart/vendor/(:any)']     =	   'administrator/sparepart/sparepartvendor/$1'; 
		$route['administrator/sparepart/viewall']   	    =	   'administrator/sparepart/sparepartview/0'; 
		$route['administrator/sparepart/viewall/(:any)']    =	   'administrator/sparepart/sparepartview/$1';      
		$route['administrator/sparepart/Units']   	  	    =	   'administrator/sparepart/units/0';       
		$route['administrator/sparepart/Units/(:any)']      =	   'administrator/sparepart/units/$1';       
		$route['administrator/sparepart/GST']   	  	    =	   'administrator/sparepart/GST/0';       
		$route['administrator/sparepart/GST/(:any)']   	    =	   'administrator/sparepart/GST/$1';         
		$route['administrator/sparepart/Category']   	    =	   'administrator/sparepart/category/0';             
		$route['administrator/sparepart/Category/(:any)']   =	   'administrator/sparepart/category/$1'; 
		$route['administrator/sparepart/stock']         	=	   'administrator/sparepart/stock/0'; 
		$route['administrator/sparepart/stock/(:any)']      =	   'administrator/sparepart/stock/$1';  
		$route['administrator/sparepart/Purchase']          =	   'administrator/sparepart/Purchase/0';  
		$route['administrator/sparepart/Purchase/(:any)']   =	   'administrator/sparepart/Purchase/$1';     
        
//Pricing/Package Management

		$route['administrator/package-pricing/viewall']   	=	   'administrator/Package/viewpackage/0';            
		$route['administrator/Package/viewall/(:any)']   	=	   'administrator/Package/viewpackage/$1';  
		$route['administrator/Package/getProperty']         =      'administrator/Package/getProperty';  


//end-------- 
      
		$route['administrator/Booking/viewall']   			=	   'administrator/Booking/viewbooking/0';                 
		$route['administrator/Booking/today']   			=	   'administrator/Booking/viewbooking/0';                 
		$route['administrator/Booking/cancelled'] 		    =	   'administrator/Booking/viewbooking/0';                 
		$route['administrator/Booking/completed']  		    =	   'administrator/Booking/viewbooking/0';                  
		$route['administrator/Booking/viewall/(:any)']   	=	   'administrator/Booking/viewbooking/$1'; 
		$route['administrator/Booking/JobCards']   			=	   'administrator/Booking/jobcards/0';                 
		$route['administrator/Booking/JobCards/(:any)']   	=	   'administrator/Booking/jobcards/$1';      
				   
		$route['administrator/notification/send']   		=	   'administrator/Notification/sendnotification/0';                     
		$route['administrator/notification/send/(:any)']   	=	   'administrator/Notification/sendnotification/$1';   
						  
		$route['administrator/feedback/viewall']   			=	   'administrator/Feedback/feedback/0';                       
		$route['administrator/feedback/viewall/(:any)']   	=	   'administrator/Feedback/feedback/$1';   

		$route['administrator/Slider/viewall']   			=	   'administrator/Slider/view/0';                           
		$route['administrator/Slider/viewall/(:any)']   	=	   'administrator/Slider/view/$1'; 

		$route['administrator/Transaction/viewall']   			=	   'administrator/Transaction/view/0';                            
		$route['administrator/Vendor_Transaction/viewall']   	=	   'administrator/Transaction/vendors/0';    

// $route['administrator/property/view']                    =      'administrator/Property/viewProperty';
// $route['administrator/property/add']                     =      'administrator/Property/addProperty';

		$route['Customer/Jobcard_bill']  		 	=	  'administrator/Users/bill/0';                             
		$route['Customer/Jobcard_bill/(:any)']   	=	  'administrator/Users/bill/$1';                               

		$route['privacy-policy']  		 			=	  'administrator/Users/privacy_policy/0';                               

 //for admin panel 
 
//$route['404_override'] 						=	'Authentication/blank'; 
		$route['404_override'] 						=	''; 
		$route['translate_uri_dashes'] = FALSE;

		$route['administrator/roombooking/booking_save']   =         'administrator/booking/manage_booking';
		$route['administrator/booking/create']             =         'administrator/booking/booking_create/0';
		$route['administrator/booking/(:any)']             =         'administrator/booking/booking_create/$1';
		 
		$route['administrator/roombooking/getRoom']        =         'administrator/booking/getRoom';
		$route['administrator/roombooking/getRoomDetail']  =         'administrator/booking/getRoomDetail';
		$route['administrator/booking-invoice/(:any)']     =         'administrator/booking/invoiceView/$1';
		$route['administrator/roombooking/getUser']        =         'administrator/booking/getUser'; 
		$route['administrator/roombooking/getProperty']    =         'administrator/booking/getProperty';
		$route['administrator/booking-view/(:any)']        =         'administrator/booking/bookingView/$1';

		//
		$route['administrator/learn/managelearn']          =         'administrator/learn/managelearn';
		$route['administrator/learn']                      =         'administrator/learn/learn_list/0';
		$route['administrator/learn/(:any)']               =         'administrator/learn/learn_list/$1';


		$route['administrator/penalty/savebill']             =           'administrator/Penalty/manage_panalty';
		$route['administrator/Penalty/bills/viewall']        =           'administrator/Penalty/CreatePenalty/0';
		$route['administrator/penalty/(:any)']               =           'administrator/Penalty/CreatePenalty/$1';
		$route['administrator/penalty/user/getUser']         =           'administrator/Penalty/getUser';
		$route['administrator/penalty/user/bookingDetails']  =           'administrator/Penalty/getBookingDetails';

		$route['administrator/Penalty/bills/(:any)']         =           'administrator/Penalty/billPaidUnpaid/$1';

 // guard

        $route['administrator/guard/viewall']               =           'administrator/guard/guard_list/0';



//-------------------Executive---desktop--------------------


// login
		$route['executive']									     =	'Authentication/executive_login';
		$route['executive/dashboard']						     =	'Authentication/ex_dashboard';

// complaints request
		$route['executive/request/complaints']                       =  'executive/Maintenance/complaints_list';
		$route['executive/request/complaints/resolve/(:any)']        =  'executive/Maintenance/service_manage/$1';
		$route['executive/request/manage_complaints']                =  'executive/Maintenance/manage_complaints';
		$route['executive/service_manage/(:any)']                    =  'executive/Maintenance/allotwok/$1';

		$route['executive/request/rsolve_list']                      =  'executive/Maintenance/rsolve_list';
		$route['executive/request/leave']                            =  'executive/Maintenance/leave_list';

		$route['executive/updatestatus']                             =  'administrator/Master/ex_updatestatus';
		$route['administrator/email']                                =  'administrator/Banner/email';
		$route['administrator/email']                                =  'administrator/Banner/email';

// Order

		$route['executive/order/view']                               =         'executive/Order/order_list/0';
		$route['executive/order/(:any)']                             =         'executive/order/order_list/$1';   
		$route['executive/order-view/(:any)']                        =         'executive/order/orderView/$1';


//tenant
		$route['executive/user/manageuser']                          =	'execuutive/User/addtenant';
		$route['executive/tenants/view/(:any)'] 	                 =	'executive/user/f_exe_list/$1';
		$route['executive/tenants/view'] 	                         =	'executive/user/f_exe_list/0';


//booking by executive
       $route['executive/room/booking_save']                        =       'executive/ReserveProperty/book_property';


// Executtive payment
		$route['executive/paymeny/status']                           =       'executive/Payment/paymentStatus';


//Executive Manage Entry	 
		$route['executive/entry/view']                               =      'executive/MyGuest/myguest/0';
		$route['executive/entry/view/(:any)']                        =      'executive/MyGuest/myguest/$1';
		$route['executive/guest/manage_entry']                       =      'executive/MyGuest/ex_manage_entry';


//Attendance
		$route['executive/attendance/view']                          =  'executive/Attendance/attendance_manage/0';


//Property Management 
		$route['executive/property/view']                            =  'executive/Property/property_manage/0';






//=====================Mobile Api==Executive section =============================

// login
		$route['api/executive/dologin']			                  =	   'executive/ExecutiveLogin/dologin';

// logout
		$route['api/executive/logout']			                  =	   'executive/ExecutiveLogin/logout';
	
//tenant
		$route['api/executive/user/manageuser']                   =	   'executive/ApiUserController/addtenant';
		$route['api/executive/tenants/view/(:any)'] 	          =	   'executive/ApiUserController/f_exe_list/$1';
		$route['api/executive/tenants/view'] 	                  =	   'executive/ApiUserController/f_exe_list/0';

//Executive Manage Entry	 
		$route['api/executive/entry/view']                        =   'executive/ApiMyGuestController/myguest/0';
		$route['api/executive/guest/manage_entry']                =   'executive/ApiMyGuestController/ex_manage_entry';  
	
//executive leave 
		$route['api/executive/Request/leave']                         =   'executive/ApiRequestController/leave_request';


//Executive complaints and solve 
		$route['api/executive/request/services']                      =   'executive/ApiRequestController/services_request';
		$route['api/executive/request/service/(:any)']                =   'executive/ApiRequestController/service_manage/$1';
		$route['api/executive/request/manage_complaints']             =   'executive/ApiRequestController/manage_complaints';
 
		$route['api/executive/request/rsolve_list']                   =   'executive/ApiRequestController/rsolve_list';


// Order
		$route['api/executive/order/view']                            =   'executive/ApiOrderController/order_list/0';
		$route['api/executive/order/(:any)']                          =   'executive/ApiOrderController/order_list/$1';   
		$route['api/executive/order-view/(:any)']                     =   'executive/ApiOrderController/orderView/$1';


// Properrty
		$route['api/executive/property']                             =   'executive/ApiPropertyController/property_list';   

// Guard
		$route['api/executive/guard']                                =   "executive/ApiGuardController/guard_list/0";
        $route['api/executive/guard/(:any)']                         =   "executive/ApiGuardController/guard_list/$1";
		$route['api/executive/guard/manaage_credential']             =   "executive/ApiGuardController/ex_manage_entry";


//=====================Mobile=Api==Guaard=section=============================


