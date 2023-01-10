<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','Authentication\LoginController@login')->name('mainpage');
Route::get('/clear','Authentication\LoginController@clear')->name('clear');
Route::post('/signin','Authentication\LoginController@signin')->name('signin');
Route::get('/logout','Authentication\LoginController@logout')->name('logout');
Route::get('/dashboard','Dashboard\DashboardController@dashboard')->name('dashboard');

/****CUSTOMER*****/
Route::get('dashboard/customers/','Customer\CustomerController@customers')->name('customers');
Route::get('dashboard/customers/{page}','Customer\CustomerController@customers')->name('customers');
Route::get('dashboard/loadmorecustomers/{page}','Customer\CustomerController@loadmorecustomers')->name('loadmorecustomers');
Route::get('dashboard/viewcustomer','Customer\CustomerController@viewcustomer')->name('viewcustomer');
Route::get('dashboard/viewcustomer/{id}','Customer\CustomerController@viewcustomer')->name('viewcustomer');
Route::post('dashboard/addcustomer','Customer\CustomerController@addcustomer')->name('addcustomer');
Route::post('dashboard/updatecolumnsetting','Customer\CustomerController@updatecolumnsetting')->name('updatecolumnsetting');
Route::get('dashboard/customer/order/{id}/{ot_id}/{ot_type}','Customer\CustomerController@customerorder')->name('customerorder');
Route::post('dashboard/customer/order/checkuncheck','Customer\CustomerController@checkuncheck')->name('checkuncheck');
Route::get('dashboard/customer/addcar','Customer\CustomerController@addcar')->name('customeraddcar');
Route::post('dashboard/updatecustomer','Customer\CustomerController@updatecustomer')->name('updatecustomer');
Route::post('dashboard/customer/order/timeavailable','Customer\CustomerController@timeavailable')->name('timeavailable');
Route::post('dashboard/customer/viewroute','Customer\CustomerController@viewroute')->name('customerviewroute');
Route::post('dashboard/customer/order/servicecalculation','Customer\CustomerController@servicecalculation')->name('servicecalculation');
Route::post('dashboard/searchcustomer/','Customer\CustomerController@searchcustomer')->name('searchcustomer');
Route::post('dashboard/customer/createorder','Customer\CustomerController@createorder')->name('customercreateorder');
Route::get('dashboard/customer/editorder/{order_id}/{ot_id}/{ot_type}','Customer\CustomerController@editorder')->name('customereditorder');
Route::post('dashboard/customer/editorder/checkuncheck','Customer\CustomerController@checkuncheck')->name('editordercheckuncheck');
Route::post('dashboard/customer/editorder/servicecalculation','Customer\CustomerController@servicecalculation')->name('editorderservicecalculation');
Route::post('dashboard/customer/editorder/timeavailable','Customer\CustomerController@timeavailable')->name('editordertimeavailable');
Route::post('dashboard/customer/submiteditorder','Customer\CustomerController@submiteditorder')->name('customersubmiteditorder');
/****STAFF*****/
Route::get('dashboard/trackstaff','Staff\StaffController@trackstaff')->name('trackstaff');
Route::get('dashboard/singlestaff/{staff_id}','Staff\StaffController@singlestaff')->name('singlestaff');
Route::post('dashboard/filterstaff','Staff\StaffController@filterstaff')->name('filterstaff');
Route::post('dashboard/searchstaff','Staff\StaffController@searchstaff')->name('searchstaff');
Route::get('dashboard/staff','Staff\StaffController@staff')->name('staff');
/****END-STAFF*****/

/*******Attendance*******/
Route::get('dashboard/attendance','Attendance\AttendanceController@attendance')->name('attendance');
Route::post('dashboard/attendance/zone-filter','Attendance\AttendanceController@attendanceByZoneCluster')->name('attendance-by-zone-cluster');
Route::post('dashboard/attendance/form','Attendance\AttendanceController@attendanceform')->name('attendance-model');
Route::post('dashboard/attendance/zonebycity','Attendance\AttendanceController@zonebycity')->name('zone-cluster-by-city');
Route::post('dashboard/attendance/present_form','Attendance\AttendanceController@updateAttendanceCasePresent')->name('present_form');
Route::post('dashboard/attendance/absent_form','Attendance\AttendanceController@updateAttendanceCaseAbsentFullday')->name('absent_fullday');
Route::post('dashboard/attendance/absent_form-halfday','Attendance\AttendanceController@updateAttendanceCaseAbsentHalfday')->name('absent-halfday');
Route::post('dashboard/attendance/city-filter','Attendance\AttendanceController@attendanceByCity')->name('attendance-by-city');
Route::post('dashboard/attendance/search-ninja','Attendance\AttendanceController@searchninja')->name('search-ninja');
Route::post('attendancemonth','Attendance\AttendanceController@attendanceMonth')->name('attendancemonth');
Route::post('attendanceweek','Attendance\AttendanceController@attendanceWeek')->name('attendanceweek');
Route::post('exportfile','Attendance\AttendanceController@exportfile')->name('exportfile');
Route::post('importfile','Attendance\AttendanceController@importfile')->name('importfile');


/********ORDERS**********/
//Route::get('dashboard/orders','Dashboard\DashboardController@orders')->name('orders');
Route::get('dashboard/orders','Orders\OrderController@view')->name('orderview');
Route::post('dashboard/orders/updatecolumnsetting','Orders\OrderController@updatecolumnsetting')->name('ordercolumnsetting');
Route::post('dashboard/orders/search','Orders\OrderController@ordersearch')->name('ordersearch');
Route::post('dashboard/orders/change-periode','Orders\OrderController@changeperiode')->name('changeperiode');
/********END-ORDERS**********/

/*******COMMAND-CENTER*******/
Route::get('dashboard/commandcenter','Commandcenter\CommandcenterController@view')->name('commandcenterview');
Route::post('dashboard/viewroute','Commandcenter\CommandcenterController@viewroute')->name('viewroute');
Route::post('dashboard/assignNinjaList','Commandcenter\CommandcenterController@assignNinjaList')->name('assignNinjaList');
Route::post('dashboard/assign_task','Commandcenter\CommandcenterController@assign_task')->name('assign_task');
Route::post('dashboard/approving_cleaner','Commandcenter\CommandcenterController@approving_cleaner')->name('approving_cleaner');
Route::post('dashboard/cancle_approving_cleaner','Commandcenter\CommandcenterController@cancle_approving_cleaner')->name('cancle_approving_cleaner');
Route::post('dashboard/start_task','Commandcenter\CommandcenterController@start_task')->name('start_task');
Route::post('dashboard/pendingTaskSection','Commandcenter\CommandcenterController@pendingTaskSection')->name('pendingTaskSection');
Route::post('dashboard/assignedtasksection','Commandcenter\CommandcenterController@assignedTaskSection')->name('assignedTaskSection');
Route::post('dashboard/completedtasksection','Commandcenter\CommandcenterController@completedTaskSection')->name('completedTaskSection');
Route::post('dashboard/unpaidtasksection','Commandcenter\CommandcenterController@unpaidTaskSection')->name('unpaidTaskSection');
Route::post('dashboard/orderrequestsection','Commandcenter\CommandcenterController@orderrequestsection')->name('orderRequestSection');
Route::post('dashboard/startedsection','Commandcenter\CommandcenterController@startedsection')->name('startedSection');
Route::post('dashboard/selectcity','Commandcenter\CommandcenterController@selectcity')->name('selectcity');
Route::get('dashboard/commandcenter/editorder/{order_id}/{ot_id}/{ot_type}','Commandcenter\CommandcenterController@editorder')->name('commandcentereditorder');
Route::get('dashboard/commandcenter/addorder/{order_id}/{ot_id}/{ot_type}','Commandcenter\CommandcenterController@addorder')->name('commandcenter_addorder');
Route::post('dashboard/commandcenter/addorder/checkuncheck','Commandcenter\CommandcenterController@checkuncheck')->name('selectvehicle_add_order');
Route::post('dashboard/commandcenter/addorder/servicecalculation','Commandcenter\CommandcenterController@servicecalculation')->name('servicecalculation_add_order');
Route::post('dashboard/commandcenter/addorder/timeavailable','Commandcenter\CommandcenterController@timeavailable')->name('timeavailable_add_order');
Route::post('dashboard/commandcenter/addorder/createorder','Commandcenter\CommandcenterController@createorder')->name('commandcentercreateorder');
Route::get('dashboard/commandcenter/{page}/{increment}','Commandcenter\CommandcenterController@pendingtask')->name('pendingtask');
Route::get('dashboard/commandcenter/assigned/{page}/{increment}','Commandcenter\CommandcenterController@assignedtask')->name('assignedtask');
Route::get('dashboard/commandcenter/started/{page}/{increment}','Commandcenter\CommandcenterController@startedtask')->name('startedtask');
Route::get('dashboard/commandcenter/completed/{page}/{increment}','Commandcenter\CommandcenterController@completedtask')->name('completedtask');
Route::get('dashboard/commandcenter/unpaid/{page}/{increment}','Commandcenter\CommandcenterController@unpaidtask')->name('unpaidtask');
Route::get('dashboard/commandcenter/orderrequest/{page}/{increment}','Commandcenter\CommandcenterController@orderrequest')->name('orderrequest');
Route::POST('dashboard/commandcenter/categorymodel','Commandcenter\CommandcenterController@categorymodel')->name('categorymodel');
Route::POST('trackingdetails','Commandcenter\CommandcenterController@trackingDetails')->name('trackingdetails');

/****END-COMMAND-CENTER*****/



Route::get('dashboard/notification','Notification\NotificationController@view')->name('viewnotifications');
Route::get('dashboard/menusetting','Menusetting\MenusettingController@view')->name('menusettingview');
Route::get('dashboard/staffreport','Staffreport\StaffreportController@view')->name('staffreportview');
Route::get('dashboard/siteadmin','Siteadmin\SiteadminController@view')->name('siteadminview');
Route::get('dashboard/popupmessage','Popupmessage\PopupmessageController@view')->name('popupmessageview');
Route::get('dashboard/servicesetting','Servicesetting\ServicesettingController@view')->name('servicesettingview');


/****END-STAFF*****/

//Route::get('dashboard/commandcenter','Dashboard\DashboardController@commandcenter')->name('commandcenter');
Route::get('/dashboard/buckets','Dashboard\DashboardController@buckets')->name('buckets');
Route::get('/dashboard/subscription','Dashboard\DashboardController@subscription')->name('subscription');
Route::get('/map','Attendance\CommandcenterController@assign_task')->name('map');

/*******ZONE*****/
Route::get('dashboard/zones','Zone\ZoneController@zones')->name('zones');
Route::get('dashboard/zones/polygon','Zone\ZoneController@polygon')->name('polygon');

/*******PROMOTION*****/
Route::get('/dashboard/promotions','Promotion\PromotionController@promotions')->name('promotions');

/*******SUBSCRIPTIONS*****/
Route::get('/dashboard/subscriptions','Subscription\SubscriptionController@subscriptions')->name('subscriptions');

/*******REVENUE*****/
Route::get('/dashboard/revenue','Revenue\RevenueController@revenue')->name('revenue');

/*******PERMISSIONS*****/
Route::get('/dashboard/permissions','Permissions\PermissionsController@view')->name('permissions');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


/*********** ********/
Route::get('/dashboard/extrapage','Dashboard\DashboardController@extrapage')->name('extrapage');
Route::get('/dashboard/dev','Dashboard\DashboardController@dev')->name('dev');

Route::get('page', function() { return view('page'); } );