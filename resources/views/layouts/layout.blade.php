<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" siteurl="{{env('APP_URL')}}" />
    <title>Keno Admin  </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="#">
    <link href="{{ asset('public/assets/css/jqvmap.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('public/assets/css/chartist.min.css')}}">
    <link href="{{ asset('public/assets/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/style.css')}}?{{ rand() }}" rel="stylesheet">
	<link href="{{ asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	 <link href="{{ asset('public/assets/css/nav-style.css')}}" rel="stylesheet">
	 <link href="{{ asset('public/assets/css/responsive.css')}}" rel="stylesheet">
	<!-- Data Table Nav -->
    <link href="{{ asset('public/assets/css/jquery.dataTables.min.css')}}" rel="stylesheet">
	<!--<link href="https://cdn.jsdelivr.net/npm/intl-tel-input@16.0.3/build/css/intlTelInput.css" rel="stylesheet"> -->	
	<link href="{{ asset('public/assets/css/jquery-ui.css')}}" rel="stylesheet">
	<link href="{{ asset('public/assets/css/select2.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
		<!--Font awesome  CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
	<script type="text/javascript">var BASEURL="{{route('mainpage')}}";</script>

	<style>
	div#map_wrapper {
    height: 100%;
}
.tracking-ninja-mapp {
    border: 15px solid #fff;
    border-radius: 20px;
    overflow: hidden;
    height: 100%;
}
.map-overlay-boxed {
    position: absolute;
    width: 100%;
    padding: 25px;
    z-index: 1;
}
.form-control {
    background: #fff;
    border: 0;
    border-bottom: 1px solid #ddd;
    height: 50px;
	font-size:15px;
	border-radius:0;
}

.service-color{
	font-weight: bold;
}

</style>

	
</head>
<body class="{{ Request::segment(2) }}">
  <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
	
    <div id="main-wrapper" class="@if(url()->current()==url('/dashboard')) show @else show menu-toggle @endif" >

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ url('/dashboard')}}" class="brand-logo">
                <img class="logo-image" src="{{ asset('public/assets/image/logo.png')}}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span>
					<span class="line"></span>
					<span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		
        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search here" aria-label="Search">
                                        <img class="search_icon_img" src="{{asset('public/assets/image/search_icon.png')}}" alt="">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-fullscreen" href="#">
                                    <svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
                                    <svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path></svg>
                                </a>
							</li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell ai-icon" href="#" role="button" data-toggle="dropdown">
                                    <svg id="icon-user" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
										<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
										<path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
									</svg>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll">
									  <h5> Notification  </h5>
										<ul class="timeline p-3">
											<li>
												<div class="timeline-panel active">
												<div class="media mr-2">
												 
												</div>
													<div class="media-body">
														<h6 class="mb-1">New order received</h6>
														<small class="d-block">5 minute Ago</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
												<div class="media mr-2">
												 
												</div>
													<div class="media-body">
														<h6 class="mb-1">Ninja complete the task</h6>
														<small class="d-block">6 hours ago</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
												<div class="media mr-2">
												 
												</div>
													<div class="media-body">
														<h6 class="mb-1">Ninja start the task</h6>
														<small class="d-block">1 days ago</small>
													</div>
												</div>
											</li>
											 <li>
												<div class="timeline-panel">
												<div class="media mr-2">
												 
												</div>
													<div class="media-body">
														<h6 class="mb-1">Ninja end the task</h6>
														<small class="d-block">1 month ago</small>
													</div>
												</div>
											</li>
										
										</ul>
									</div>

                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    
									<div class="header-info">
									@php $UserDetails= Session::get('UserDetails'); @endphp
										<span>Hey, <strong>{{ $UserDetails['name'] }}</strong></span>
										<small>Admin</small>
									</div>
									<img src="{{ asset('public/assets/image/user.png')}}" width="20" alt=""/>
									<i class="fas fa-chevron-down ml-3"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- <a href="{{ url('/inbox')}}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="{{ url('/inbox')}}" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ml-2">Inbox </span>
                                    </a> -->
                                    <a href="{{ url('/logout')}}" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Sign out </span>
                                    </a>
                                </div>
                            </li>
							<li class="nav-item command-dropdown">
							  <a class="nav-link bell ai-icon" href="#" role="button" data-toggle="dropdown">
                                    <svg id="icon-menu" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                </a>                               	                               		                              
								<div class="dropdown-menu dropdown-menu-right quick_action">
									<i class="fas fa-caret-up"></i>
                                    <div id="command-center-id" class="widget-media dz-scroll">
									  <h5> Quick Action  </h5>
										<ul class="timeline p-3">
											<li>
												<div class="command-center-box">
												 <!-- <i class="fas fa-arrows-alt"></i> -->
												 <span class="ti-move"></span>
												<p> Command Center </p>
												</div>
											</li>
											<li>
												<div class="command-center-box">
												<!-- <i class="fas fa-bacon"></i> -->
												<span class="ti-pulse"></span>
												<p> Track Staff </p>
												</div>
											</li>
											<li>
												<div class="command-center-box">
												 <!-- <i class="fas fa-cog"></i> -->
												 <span class="ti-settings"></span>
												<p> Service Settings </p>
												</div>
											</li>
											<li>
												<div class="command-center-box">
												<i class="fas fa-tv"></i>
												<p> Site Admins </p>
												</div>
											</li>
										</ul>
									</div>
                                </div>                               
							</li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                  	<li class="nav-item">
						<a class="nav-link active" data-toggle="tooltip" data-placement="right" title="Dashboard" href="{{url('/dashboard')}}">
							<!-- <i class="fas fa-chart-pie"></i>  -->
							<img class="menu_icons" src="{{asset('public/assets/image/dashbaord_Icon.png')}}" alt="">
							<span class="nav-text"> Dashboard </span>
						</a>
					</li>
		{{--				
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Customers"  href="{{url('/dashboard/customers')}}">
							<!-- <i class="far fa-user"></i> -->
							<img class="menu_icons" src="{{asset('public/assets/image/customers_icon.png')}}" alt="">
							<span class="nav-text"> Customers </span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Orders" href="{{url('/dashboard/orders')}}">
							<!-- <i class="far fa-clipboard"></i>  -->
							<img class="menu_icons" src="{{asset('public/assets/image/order_icon.png')}}" alt="">
							<span class="nav-text"> Orders </span>
						</a> 
					</li>
		--}}
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Command Center" href="{{url('/dashboard/commandcenter')}}">
							<!-- <i class="fas fa-expand-arrows-alt"></i>  -->
							<img class="menu_icons" src="{{asset('public/assets/image/comand_center_icon.png')}}" alt="">
							<span class="nav-text"> Command Center </span>
						</a> 
					</li>
		{{--			
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Zones" href="{{url('/dashboard/zones')}}">
							<!-- <i class="far fa-map"></i> -->
							<img class="menu_icons" src="{{asset('public/assets/image/zones_icon.png')}}" alt="">
							<span class="nav-text"> Zones </span>
						</a> 
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Promotion" href="{{url('/dashboard/promotions')}}">
							<!-- <i class="fas fa-ad"></i>  -->
							<img class="menu_icons" src="{{asset('public/assets/image/promotions_icon.png')}}" alt="">
							<span class="nav-text"> Promotion </span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Subscription" href="{{url('/dashboard/subscriptions')}}">
							<!-- <i class="far fa-envelope"></i>  -->
							<img class="menu_icons" src="{{asset('public/assets/image/subscription_icon.png')}}" alt="">
							<span class="nav-text"> Subscription </span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Revenue"  href="{{url('/dashboard/revenue')}}">
							<!-- <i class="fas fa-dollar-sign"></i>  -->
							<img class="menu_icons" src="{{asset('public/assets/image/revenue_icon.png')}}" alt="">
							<span class="nav-text"> Revenue </span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Notifications" href="{{url('/dashboard/notification')}}">
							<!-- <i class="far fa-bell"></i>  -->
							<img class="menu_icons" src="{{asset('public/assets/image/notifications_icon.png')}}" alt="">
							<span class="nav-text"> Notifications </span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Menu Setting" href="{{url('/dashboard/menusetting')}}">
							<!-- <i class="fas fa-cog"></i>  -->
							<img class="menu_icons" src="{{asset('public/assets/image/menu_icon.png')}}" alt="">
							<span class="nav-text"> Menu Setting </span>
						</a> 
					</li>
		--}}
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Track Staff" href="{{url('dashboard/trackstaff')}}">
							<!-- <i class="fas fa-bacon"></i> -->
							<img class="menu_icons" src="{{asset('public/assets/image/track_staff_icon.png')}}" alt="">
							<span class="nav-text">  Track Staff </span>
						</a>
					</li>
		{{--
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Staff Report" href="{{url('dashboard/staffreport')}}">
							<!-- <i class="fas fa-chart-line"></i>  -->
							<img class="menu_icons" src="{{asset('public/assets/image/staff_report_icon.png')}}" alt="">
							<span class="nav-text"> Staff Report </span>
						</a>
					</li>  
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Staff" href="{{url('dashboard/staff')}}">
							<!-- <i class="fas fa-chart-line"></i> -->
							<img class="menu_icons" src="{{asset('public/assets/image/staff_icon.png')}}" alt=""> 
							<span class="nav-text"> Staff  </span>
						</a>
					</li> 
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Site Admin" href="{{url('dashboard/siteadmin')}}">
							<!-- <i class="fas fa-chart-line"></i>  -->
							<img class="menu_icons" src="{{asset('public/assets/image/site_admin_icon.png')}}" alt="">
							<span class="nav-text"> Site Admin </span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Popup Message" href="{{url('dashboard/popupmessage')}}">
							<!-- <i class="fas fa-chart-line"></i> -->
							<img class="menu_icons" src="{{asset('public/assets/image/popup_msg_icon.png')}}" alt=""> 
							<span class="nav-text"> Popup Message </span>
						</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Service Setting" href="{{url('dashboard/servicesetting')}}">
							<!-- <i class="fas fa-chart-line"></i>  -->
							<img class="menu_icons" src="{{asset('public/assets/image/staff_report_icon.png')}}" alt="">
							<span class="nav-text"> Service Setting </span>
						</a>
					</li>
				
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Permissions"  href="{{url('/dashboard/permissions')}}">
							<!-- <span class="ti-lock mr-3 text-dark">  -->
							<img class="menu_icons" src="{{asset('public/assets/image/padlock.png')}}" alt="">	
							</span> <span class="nav-text"> Permissions </span>
						</a>
					</li>
		--}}
					<li class="nav-item">
						<a class="nav-link" data-toggle="tooltip" data-placement="right" title="Attendance" href="{{route('attendance')}}">
							<!-- <span class="ti-lock mr-3 text-dark"> </span> -->
							<img class="menu_icons" src="{{asset('public/assets/image/shopping-list.png')}}" alt="">
							<span class="nav-text"> Attendance </span>
						</a>
					</li>
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
       

        @yield('content')

   <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © 2021</p>
            </div>
        </div>


    </div>

    <!-- Required vendors -->
    <script src="{{ asset('public/assets/js/global.min.js')}}"></script>
	<script src="{{ asset('public/assets/js/bootstrap-select.min.js')}}"></script>
	<script src="{{ asset('public/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/custom.min.js')}}"></script>
	<script href="{{ asset('public/js/sr.js')}}" type="text/javascript"></script>
	<script src="{{ asset('public/assets/js/deznav-init.js')}}"></script>
	<!-- Apex Chart -->

	<script src="{{ asset('public/assets/js/apexchart.js')}}"></script>
	<script src="{{ asset('public/assets/js/jquery-ui.js')}}"></script>
    <!-- Vectormap -->
	
	<script src="{{ asset('public/assets/js/select2.min.js')}}"></script>
	
	<!-- Chart piety plugin files -->
    <script src="{{ asset('public/assets/js/jquery.peity.min.js')}}"></script>

	<!-- Dashboard 1 -->
	<script src="{{ asset('public/assets/js/dashboard-1.js')}}"></script>
	
	<!-- sparkline Chart Js -->
    <script src="{{ asset('public/assets/js/jquery.sparkline.min.js')}}"></script>
	<script src="{{ asset('public/assets/js/sparkline-init.js')}}"></script> 
	
    <script src="{{ asset('public/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/datatables.init.js')}}"></script>

	<script src="{{ asset('public/assets/js/jquery.validate.js')}}"></script>

	<script src="{{ asset('public/assets/js/custom/custom.js')}}"></script>

	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	

	<!-- Form Validation -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>   -->

<script>
	/************DATATABLE*************/
	if($('#example').length>0){
					 $('#example').DataTable({ 
                      "destroy": true, //use for reinitialize datatable
					  "paging":   false,
					  "ordering": true,
					  "info":     false,
					  "order":[]
					  });
	}
/******************/
if($('#pageId').length > 0){
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            var page = $("#pageId").val();
            var targetUrl = $("#targetUrl").val();
			var totalPages = $("#totalPages").val();
		
			if(totalPages>=page && page!=""){
				loadMoreData(page,targetUrl);
			}else{
				// alert("No Data Available");
			}
            
        }
    });
}
function loadMoreData(page,targetUrl){
      $.ajax(
            {
                url: targetUrl+'/'+ page,
                type: "get",
                beforeSend: function()
                {
                    $('#preloader').show();
                }
            })
            .done(function(data)
            {
                $('#preloader').hide();
				if(data.html!='No more data available'){
                $("#post-data").append(data.html);
					if($('#example').length>0){
						// $('#example').DataTable({
						// 	'destroy':true,
						// 	"paging":   false,
						// 	"ordering": true,
						// 	"info":     false,
						// 	"order":[]
						// });
					}
                $("#pageId").val(data.page_id);
				}else{
					alert('No more data available');
				}
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                  alert('Server not responding...');
            });
    }
/******************/

/******************/
$('body').on('click', '.table-row', function(){
var m_url=$(this).attr('data-href');
location.href = m_url;
});
/******************/
// $('body').on('click', '.vertical-tab .nav-tabs li a', function(){
// $("html, body").animate({ scrollTop: 0 }, "fast");
// return false;
// });
/******************/

/******************/
// if($('#pending_pageId').length > 0){
//     $(window).scroll(function() {
//         if($(window).scrollTop() + $(window).height() >= $(document).height()) {
//             	var page = $("#pending_pageId").val();
//             	var targetUrl = $("#pending_targetUrl").val();
// 				var increment = $("#pending_increment").val();
			
//             loadMoreData_command(page,targetUrl,increment);
//         }
//     });
// }

// $(".nav-tabs").on( 'scroll', function(){
   
// 	       var currentActivePage = $('#currentActiveTab').val();
// 			if(currentActivePage=="Pending Task"){
// 				var page = $("#pending_pageId").val();
//             	var targetUrl = $("#pending_targetUrl").val();
// 				var increment = $("#pending_increment").val();
// 			}else if(currentActivePage=="Assigned Tasks"){
// 				var page = $("#assigned_pageId").val();
//             	var targetUrl = $("#assigned_targetUrl").val();
// 				var increment = $("#assigned_increment").val();
// 			}else if(currentActivePage=="Started"){
// 				var page = $("#started_pageId").val();
//             	var targetUrl = $("#started_targetUrl").val();
// 				var increment = $("#started_increment").val();
// 			}else if(currentActivePage=="Completed Tasks"){
// 				var page = $("#completed_pageId").val();
//             	var targetUrl = $("#completed_targetUrl").val();
// 				var increment = $("#completed_increment").val();
// 			}else if(currentActivePage=="Unpaid Tasks"){
// 				var page = $("#unpaid_pageId").val();
//             	var targetUrl = $("#unpaid_targetUrl").val();
// 				var increment = $("#unpaid_increment").val();
// 			}else{
// 				var page = $("#orderrequest_pageId").val();
//             	var targetUrl = $("#orderrequest_targetUrl").val();
// 				var increment = $("#orderrequest_increment").val();
// 			}

// 			if(page!=""){
// 				loadMoreData_command(page,targetUrl,increment);
// 			}else{
// 				alert("No Data Available");
// 			} 
 
// });


if($('#currentActiveTab').length > 0){
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {

		var currentActivePage = $('#currentActiveTab').val();
			if(currentActivePage=="Pending Task"){
				var page = $("#pending_pageId").val();
            	var targetUrl = $("#pending_targetUrl").val();
				var increment = $("#pending_increment").val();
			}else if(currentActivePage=="Assigned Tasks"){
				var page = $("#assigned_pageId").val();
            	var targetUrl = $("#assigned_targetUrl").val();
				var increment = $("#assigned_increment").val();
			}else if(currentActivePage=="Started"){
				var page = $("#started_pageId").val();
            	var targetUrl = $("#started_targetUrl").val();
				var increment = $("#started_increment").val();
			}else if(currentActivePage=="Completed Tasks"){
				var page = $("#completed_pageId").val();
            	var targetUrl = $("#completed_targetUrl").val();
				var increment = $("#completed_increment").val();
			}else if(currentActivePage=="Unpaid Tasks"){
				var page = $("#unpaid_pageId").val();
            	var targetUrl = $("#unpaid_targetUrl").val();
				var increment = $("#unpaid_increment").val();
			}else{
				var page = $("#orderrequest_pageId").val();
            	var targetUrl = $("#orderrequest_targetUrl").val();
				var increment = $("#orderrequest_increment").val();
			}

			if(page!=""){
				loadMoreData_command(page,targetUrl,increment);
			}else{
				alert("No Data Available");
			} 
         }
    });
}


function loadMoreData_command(page,targetUrl,increment){
	
      $.ajax(
            {
                url: targetUrl+'/'+ page+'/'+ increment,
                type: "get",
                beforeSend: function()
                {
                    $('#preloader').show();
                }
            })
            .done(function(data)
            {
                $('#preloader').hide();
				if(data.html!='No more data available'){
					var currentActivePage = $('#currentActiveTab').val();
						if(currentActivePage=="Pending Task"){
							if(data.total!=0){
								$("#pending-task-data").append(data.html);
								$("#pending-task-data1").append(data.html1);
                				$("#pending_pageId").val(data.page_id);
								$("#pending_increment").val(data.increment);
							}else{
								alert('No more data available');
							}
						}else if(currentActivePage=="Assigned Tasks"){
							if(data.total!=0){
								$("#assigned-task-data").append(data.html);
								$("#assigned-task-data1").append(data.html1);
                				$("#assigned_pageId").val(data.page_id);
								$("#assigned_increment").val(data.increment);
							}else{
								alert('No more data available');		
							}	
						}else if(currentActivePage=="Started"){
							if(data.total!=0){
								$("#started-task-data").append(data.html);
								$("#started-task-data1").append(data.html1);
                				$("#started_pageId").val(data.page_id);
								$("#started_increment").val(data.increment);
							}else{
								alert('No more data available');
							}
						}else if(currentActivePage=="Completed Tasks"){
							if(data.total!=0){
								$("#completed-task-data").append(data.html);
								$("#completed-task-data1").append(data.html1);
                				$("#completed_pageId").val(data.page_id);
								$("#completed_increment").val(data.increment);
							}else{
								alert('No more data available');
							}
						}else if(currentActivePage=="Unpaid Tasks"){
							if(data.total!=0){
								$("#unpaid-task-data").append(data.html);
								$("#unpaid-task-data1").append(data.html1);
                				$("#unpaid_pageId").val(data.page_id);
								$("#unpaid_increment").val(data.increment);
							}else{
								alert('No more data available');
							}
						}else{
							$("#orderrequest-data").append(data.html);
							$("#orderrequest-data1").append(data.html1);
                			$("#orderrequest_pageId").val(data.page_id);
							$("#orderrequest_increment").val(data.increment);
						}
				}else{
					alert('No more data available');
				}
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                  alert('server not responding...');
            });
}
/******************/

	/************ASSIGN-NINJA*************/
	function assign_ninja(bucket_id,action_url){
	 if(bucket_id==''){
		 alert('bucket id Missing');
		 return false;
	 }
$.ajax({
      url: action_url,
      data: {'bucket_id':bucket_id},
	  headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      dataType: "json",
      type: 'POST',
      success: function (res) {
        if(res.status == 'success'){
			$('#AssignNinjaList').html(res.htm);
			$('.assignNinjaPopuop').modal('show');
			
        }else if(res.status=='loggedout'){
			window.location.href = BASEURL;
        }else{
			alert(res.msg);
		}
		},
		error:function(){
		  alert('An error has occurred');
		}
	});
} 


/************| approving_cancle_cleaner |*************/

	function approving_cancle_cleaner(bucket_id,approving_cleaner_id,action_url){
	 if(bucket_id==''){
		 alert('bucket id Missing');
		 return false;
	 }
	 if(approving_cleaner_id==''){
		 alert('approving cleaner_id Missing');
		 return false;
	 }
	 alert(action_url);
	$.ajax({
      	url: action_url,
      	data: {'bucket_id':bucket_id},
	  	headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      	dataType: "json",
      	type: 'POST',
      	success: function (res) {
        	if(res.status == 'success'){
				$('#AssignNinjaList').html(res.htm);
				$('.assignNinjaPopuop').modal('show');
			
        	}else if(res.status=='loggedout'){
				window.location.href = BASEURL;
        	}else{
				alert(res.msg);
			}
			},
			error:function(){
		  	alert('An error has occurred');
			}
		});
	} 

/************PENDING_TASK_SECTION*************/

	function pendingTaskSection(action_url,idget='')
		{ 
					$.ajax({
						url: action_url,	
						headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
						dataType: "json",
						type: 'POST',
						success: function (res) {
							if(res.status == 'success'){
								$('#PendingTask').html(res.htm);
								// $('.assignedtasks').modal('show');

								$(document).find('.tab_content').hide();
								$(document).find(''+idget).show();
								$('#currentActiveTab').val('Pending Task');
								$('#pending_increment').val(10);
								$('#pending_pageId').val(1);
								$(document).find('#pending-task-data a.active').click();
							}else if(res.status=='loggedout'){
								window.location.href = BASEURL;
							}else{
								alert(res.msg);
							}
							},
							error:function(){
							alert('An error has occurred');
							}
						});
	 	} 


	/************ASSIGNED_TASK_SECTION*************/

	function assignedTaskSection(action_url,idget='')
	{
	
					$.ajax({
						url: action_url,	
						headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
						dataType: "json",
						type: 'POST',
						success: function (res) {
							if(res.status == 'success'){
								$('#AssignedTasks').html(res.htm);
								// $('.assignedtasks').modal('show');

								$(document).find('.tab_content').hide();
								$(document).find(''+idget).show();
								$('#currentActiveTab').val('Assigned Tasks');
								$('#assigned_increment').val(10);
								$('#assigned_pageId').val(1);
								$(document).find('#assigned-task-data a.active').click();
							}else if(res.status=='loggedout'){
								window.location.href = BASEURL;
							}else{
								alert(res.msg);
							}
							},
							error:function(){
							alert('An error has occurred');
							}
						});
	 } 

	 	/************STARTED_SECTION*************/

	function startedSection(action_url,idget='')
	{
	
					$.ajax({
						url: action_url,	
						headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
						dataType: "json",
						type: 'POST',
						success: function (res) {
							if(res.status == 'success'){
								$('#Started').html(res.htm);
								$('.started').modal('show');

								$(document).find('.tab_content').hide();
								$(document).find(''+idget).show();
								$('#currentActiveTab').val('Started');
								$('#started_increment').val(10);
								$('#started_pageId').val(1);
								$(document).find('#started-task-data a.active').click();
							}else if(res.status=='loggedout'){
								window.location.href = BASEURL;
							}else{
								alert(res.msg);
							}
							},
							error:function(){
							alert('An error has occurred');
							}
						});
	 } 

	 /************COMPLETED_TASK_SECTION*************/

	function completedTaskSection(action_url,idget='')
	{
	
					$.ajax({
						url: action_url,	
						headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
						dataType: "json",
						type: 'POST',
						success: function (res) {
							if(res.status == 'success'){
								$('#CompletedTasks').html(res.htm);
								$('.completedtasks').modal('show');

								$(document).find('.tab_content').hide();
								$(document).find(''+idget).show();
								$('#currentActiveTab').val('Completed Tasks');
								$('#completed_increment').val(10);
								$('#completed_pageId').val(1);
								$(document).find('#completed-task-data a.active').click();
							}else if(res.status=='loggedout'){
								window.location.href = BASEURL;
							}else{
								alert(res.msg);
							}
							},
							error:function(){
							alert('An error has occurred');
							}
						});
	 } 

	  /************UNPAID_TASK_SECTION*************/

	function unpaidTaskSection(action_url,idget='')
	{
	
					$.ajax({
						url: action_url,	
						headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
						dataType: "json",
						type: 'POST',
						success: function (res) {
							if(res.status == 'success'){
								$('#UnpaidTasks').html(res.htm);
								$('.unpaidtasks').modal('show');

								$(document).find('.tab_content').hide();
								$(document).find(''+idget).show();
								$('#currentActiveTab').val('Unpaid Tasks');
								$('#unpaid_increment').val(10);
								$('#unpaid_pageId').val(1);
								$(document).find('#unpaid-task-data a.active').click();
							}else if(res.status=='loggedout'){
								window.location.href = BASEURL;
							}else{
								alert(res.msg);
							}
							},
							error:function(){
							alert('An error has occurred');
							}
						});
	 } 

  /************ORDER_REQUEST_SECTION*************/

  function orderRequestSection(action_url,idget='')
	{
	
					$.ajax({
						url: action_url,	
						headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
						dataType: "json",
						type: 'POST',
						success: function (res) {
							if(res.status == 'success'){
								$('#OrderRequest').html(res.htm);
								$('.orderrequest').modal('show');

								$(document).find('.tab_content').hide();
								$(document).find(''+idget).show();
								$('#currentActiveTab').val('Order Request');
								$('#orderrequest_increment').val(10);
								$('#orderrequest_pageId').val(2);
							}else if(res.status=='loggedout'){
								window.location.href = BASEURL;
							}else{
								alert(res.msg);
							}
							},
							error:function(){
							alert('An error has occurred');
							}
						});
	 } 
 
/************VIEW-ROUTE-COMMANDCENTER*************/
 function viewroute(action_url,order_id){
	 if(order_id==''){
		 alert('order id Missing');
		 return false;
	 }
$.ajax({
      url: action_url,
      data: {'order_id':order_id},
	  headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      dataType: "json",
      type: 'POST',
      success: function (res) {
        if(res.status == 'success'){
			$('#viewRouteResponse').html(res.htm);
			$('.viewRoute').modal('show');
			
        }else if(res.status=='loggedout'){
			window.location.href = BASEURL;
        }else{
			alert(res.msg);
		}
		},
		error:function(){
		  alert('An error has occurred');
		}
	});
}
/*************************/

/************VIEW-ROUTE-CUSTOMER*************/
function viewroutecustomer(action_url,order_id){
	 if(order_id==''){
		 alert('order id Missing');
		 return false;
	 }
$.ajax({
      url: action_url,
      data: {'order_id':order_id},
	  headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      dataType: "json",
      type: 'POST',
      success: function (res) {
        if(res.status == 'success'){
			$('#CustomerViewRoute').html(res.htm);
			$('.viewRoute').modal('show');
			
        }else if(res.status=='loggedout'){
			window.location.href = BASEURL;
        }else{
			alert(res.msg);
		}
		},
		error:function(){
		  alert('An error has occurred');
		}
	});
}
/*************************/

/************************/
 function getIndividualNinja(customer_id,action_url){
$.ajax({
      url: action_url,
      data: {'customer_id':customer_id},
	  headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      dataType: "json",
      type: 'POST',
      success: function (res) {
        if(res.status == 'success'){
			
			
        }else if(res.status=='loggedout'){
			window.location.href = BASEURL;
        }else{
			alert(res.msg);
		}
		},
		error:function(){
		  alert('An error has occurred');
		}
	});
}
/*************************/
 function changecity(city_id,action_url){
$.ajax({
      url: action_url,
      data: {'city_id':city_id},
	  headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      dataType: "json",
      type: 'POST',
      success: function (res) {
        if(res.status == 'success'){
			$('#MainResponseId').html(res.htm);
			 $('#staffTable').DataTable({ 
                      "destroy": true, //use for reinitialize datatable
					  "paging":   false,
					  "ordering": true,
					  "info":     false
                   });
        }else if(res.status=='loggedout'){
			window.location.href = BASEURL;
        }else{
			alert(res.msg);
		}
		},
		error:function(){
		  alert('An error has occurred');
		}
	});
}
/*************************/
	$('body').on('submit', '#mapSearchForm', function(e){
	 e.preventDefault();
	 var form = $(this);
     var url = form.attr('action');
	 $.ajax({
           type: "POST",
           url: url,
		   headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
           data: form.serialize(), // serializes the form's elements.
		   dataType: "json",
           success: function(res)
           {
               if(res.status == 'success'){
			$('#MainResponseId').html(res.htm);
			 $('#staffTable').DataTable({ 
                      "destroy": true, //use for reinitialize datatable
					  "paging":   false,
					  "ordering": true,
					  "info":     false
                   });
				}else if(res.status=='loggedout'){
					window.location.href = BASEURL;
				}else{
					alert(res.msg);
				}
		// show response from the php script.
           }
         });
	
});

/**************************/

function selectcity(city_id,action_url){

$.ajax({
      url: action_url,
      data: {'city_id':city_id},
	  headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      dataType: "json",
      type: 'POST',
      success: function (res) {
        if(res.status == 'success'){
			$('#LiveninjaList').html(res.htm);
			
        }else if(res.status=='loggedout'){
			window.location.href = BASEURL;
        }else{
			alert(res.msg);
		}
		},
		error:function(){
		  alert('An error has occurred');
		}
	});
}

/*************** CUSTOMER AND COMMANDCENTER ADD NEW ORDER CAR CHECK_UNCHECK ***********/

		$('body').on('click', '.select-cars', function() {
				
			// var Checked = $('input:checkbox:checked').length;
   			// var numberOfChecked = parseInt(Checked);

			var Checked = $('.select-cars:checked').length
   			var numberOfChecked = parseInt(Checked);

			var did = $(this).attr("data-car_id");
			$(document).find('.vichle_details_box'+did).remove();
			// $(document).find('.'+did).remove();

			var ot_id= $(this).attr("data-ot_id");
			var ot_type= $(this).attr("data-ot_type");
			var car_type= $(this).attr("data-car_type");
			var subscription_id= $(this).attr("data-subscription_id");
			var action_url= $(this).attr("data-action_url");
						
			$("body").find(".select-cars").each(function(){
				if($(this).attr('data-car_type')!=car_type){
					$(this).attr("disabled", true); 
				}
				if($(this).attr('data-subscription_id')!=subscription_id){
					$(this).attr("disabled", true); 
				}
			});
			
			if(numberOfChecked==0){
				$('.select-cars').removeAttr("disabled");
			}
		
				$('#c_service_selected').empty();
				$('#c_service_selected1').empty();
				$('.subtotal').html("00");
				$('.vat').html("00");
				$('.order_charges').html("00");
				$('.total_service').html("0");
			
			var car_image = $(this).attr("data-car_image");
			var car_color = $(this).attr("data-car_color");
			var car_year  = $(this).attr("data-car_year");
			var car_model = $(this).attr("data-car_model");
			var car_name  = $(this).attr("data-car_name");
			
			var cars = [];
			$("body").find(".select-cars:checkbox:checked").each(function(){
					cars.push($(this).attr("data-car_id"))
			});
			$('#cars').val(cars);

            if ($(this).is(":checked")) 
			{
				$.ajax({
      						url: action_url,
      						data: {'ot_type':ot_type,'ot_id':ot_id,'numberOfChecked':numberOfChecked,'car_id':did,'car_type':car_type,'subscription_id':subscription_id,'car_image':car_image,'car_color':car_color,'car_year':car_year,'car_model':car_model,'car_name':car_name,},
	  						headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      						dataType: "json",
      						type: 'POST',
      						success: function (res) {
        					if(res.status == 'success'){
								$('.body_wash_aed').html(res.htm);
								$('#selected-cars').append(res.cars);

        					}else if(res.status=='loggedout'){
								window.location.href = BASEURL;
        					}else{
									alert(res.msg);
							}
							},
							error:function(){
		  						alert('An error has occurred');
							}
						});
            } 
			else 
			{
				$.ajax({
      						url: action_url,
      						data: {'ot_id':ot_id,'numberOfChecked':numberOfChecked,'car_id':did,'car_type':car_type,'subscription_id':subscription_id,'car_image':car_image,'car_color':car_color,'car_year':car_year,'car_model':car_model,'car_name':car_name,},
	  						headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      						dataType: "json",
      						type: 'POST',
      						success: function (res) {
        					if(res.status == 'success'){
								if(numberOfChecked==0){
									$('.body_wash_aed').empty(res.htm);
								}else{
									$('.body_wash_aed').html(res.htm);
								}
        					}else if(res.status=='loggedout'){
								window.location.href = BASEURL;
        					}else{
									alert(res.msg);
							}
							},
							error:function(){
		  						alert('An error has occurred');
							}
						});
            }
        });

/*************** CUSTOMER AND COMMANDCENTER ADD NEW ORDER ADDSERVICE ***********/

		$('body').on('click', '.select-services-customer', function() {
			
			var Checked = $('.select-services-customer:checked').length
   			var numberOfChecked = parseInt(Checked);

			var cars = [];
			$("body").find(".select-cars:checkbox:checked").each(function(){
					cars.push($(this).attr("data-car_id"))
			});
			
			var slug = [];
			$("body").find(".select-services-customer:checkbox:checked").each(function(){
				slug.push($(this).attr("data-slug"))
			});

			// $('#cars').val(cars);
			$('#slug').val(slug);

			var slugs = $(this).attr("data-slug");
			$(document).find('.added_service'+slugs).remove();

			var action_url = $(this).attr("data-action_url");
			var service_name = $(this).attr("data-service_name");
			var car_id = $(this).attr("data-car_id");
			var ot_type = $(this).attr("data-ot_type");
			var ot_id = $(this).attr("data-ot_id");

			$('.total_service').html(numberOfChecked);

			if ($(this).is(":checked")) 
			{	
				$(document).find('.service'+slugs).css("font-weight", "bold");

				$.ajax({
      						url: action_url,
      						data: {'ot_id':ot_id,'numberOfChecked':numberOfChecked,'service_name':service_name,'car_id':car_id,'ot_type':ot_type,'cars':cars,'slug':slug,},
	  						headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      						dataType: "json",
      						type: 'POST',
      						success: function (res) {
        					if(res.status == 'success'){
								$('#c_service_selected').html(res.services);
								$('#c_service_selected1').html(res.services);
								$('.subtotal').html(res.subtotal);
								$('.vat').html(res.vat);
								$('.order_charges').html(res.total);
        					}else if(res.status=='loggedout'){
								window.location.href = BASEURL;
        					}else{
									alert(res.msg);
							}
							},
							error:function(){
		  						alert('An error has occurred');
							}
						});
            } 
			else 
			{ 
				$(document).find('.service'+slugs).css("font-weight", "");
				if(numberOfChecked==0)
				{
					$('#c_service_selected').empty();
					$('#c_service_selected1').empty();
					$('.subtotal').html("00");
					$('.vat').html("00");
					$('.order_charges').html("00");
				}
				else
				{
					$.ajax({
      						url: action_url,
      						data: {'ot_id':ot_id,'numberOfChecked':numberOfChecked,'service_name':service_name,'car_id':car_id,'ot_type':ot_type,'cars':cars,'slug':slug,},
	  						headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      						dataType: "json",
      						type: 'POST',
      						success: function (res) {
        					if(res.status == 'success'){
									$('#c_service_selected').html(res.services);
									$('#c_service_selected1').html(res.services);
									$('.subtotal').html(res.subtotal);
									$('.vat').html(res.vat);
									$('.order_charges').html(res.total);
        					}else if(res.status=='loggedout'){
								window.location.href = BASEURL;
        					}else{
									alert(res.msg);
							}
							},
							error:function(){
		  						alert('An error has occurred');
							}
						});
				}	
            }

		});


/************ CUSTOMER AND COMMANDCENTER ADD ORDER TIME **************/

function addordertime(ot_id,s_date,lat,long,action_url){

$.ajax({
		  url: action_url,
		  data: {'ot_id':ot_id,'s_date':s_date,'lat':lat,'long':long,},
		  headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
		  dataType: "json",
		  type: 'POST',
		  success: function (res) {
		if(res.status == 'success'){
			$('#available-time').html(res.avl_time);
		}else if(res.status=='loggedout'){
			window.location.href = BASEURL;
		}else{
			alert(res.msg);
		}
		},
		error:function(){
			  alert('An error has occurred');
		}
});
}

/*************** CUSTOMER AND COMMANDCENTER ADD ORDER DATE-TIME ***********/

	$('body').on('click', '.booking-time', function() {

		var book_time= $(this).attr("data-book_time");
		var book_date= $(this).attr("data-book_date");
		var date_time = book_date +' '+',' +' '+ book_time;
		var htm = '<i class="fas fa-calendar-alt"></i> <span> <b> Date & Time </b> <br> <small> '+date_time+' </small></span>';
		$('#date-time-selected').html(htm);

		var datetime = $(this).attr("data-datetime")
		$('#time_book_order').val(datetime);
		$('#time_book_type').val("datetime");
	});

/*************** CUSTOMER AND COMMANDCENTER ADD ORDER FLEXI BEFORE-TIME ***********/

$('body').on('click', '.flexi_before', function() {

	var before = $(this).attr("data-flexi_before");
	// var label =  $("#labelabc").val();

	$('#time_book_order').val("");
	$('#time_book_type').val("flexi-before");

	var book_date = $("#flexi_date").val();
	var date_time = book_date +' '+',' +' Before '+ before;
	var htm = '<i class="fas fa-calendar-alt"></i> <span> <b> Date & Time </b> <br> <small> '+date_time+' </small></span>';
	$('#date-time-selected').html(htm);
	});

/*************** CUSTOMER AND COMMANDCENTER ADD ORDER FLEXI AFTER-TIME ***********/

	$('body').on('click', '.flexi_after', function() {

	var after = $(this).attr("data-flexi_after");

	$('#time_book_order').val("");
	$('#time_book_type').val("flexi-after");

	var book_date = $("#flexi_date").val();
	var date_time = book_date +' '+',' +' After '+ after;
	var htm = '<i class="fas fa-calendar-alt"></i> <span> <b> Date & Time </b> <br> <small> '+date_time+' </small></span>';
	$('#date-time-selected').html(htm);
	});

/*************** CUSTOMER AND COMMANDCENTER ADD NEW ORDER VALIDATION ***********/

	function ValidationForm(){
		// $("#errorMSG").show().delay(1000).queue(function(n) {
		  // 	$(this).hide(); n();
		// });
		var customer_id = document.getElementById("customer_id").value;
		var address_lat = document.getElementById("address_lat").value;
		var address_long = document.getElementById("address_long").value;
		var address_type = document.getElementById("address_type").value;
		var cars = document.getElementById("cars").value;
		var slug = document.getElementById("slug").value;
		var order_type_id = document.getElementById("order_type_id").value;
		var ot_type = document.getElementById("ot_type").value;
		var payment_method = document.getElementById("payment_method").value;
		var time_book_order = document.getElementById("time_book_order").value;
		var time_book_type = document.getElementById("time_book_type").value;

		if(customer_id==""){
			document.getElementById("error_message").innerHTML = "Customer id is missing";
			$("#errorMSG").show("fast").delay(1000).hide("fast");
			return false;
		}else if(cars==""){
			document.getElementById("error_message").innerHTML = "Select cars";
			$("#errorMSG").show("fast").delay(1000).hide("fast");
			return false;
		}else if(slug==""){
			document.getElementById("error_message").innerHTML = "Select services";
			$("#errorMSG").show("fast").delay(1000).hide("fast");
			return false;
		}else if(address_lat==""){
			document.getElementById("error_message").innerHTML = "Select address";
			$("#errorMSG").show("fast").delay(1000).hide("fast");
			return false;
		}else if(address_long==""){
			document.getElementById("error_message").innerHTML = "Select address";
			$("#errorMSG").show("fast").delay(1000).hide("fast");
			return false;
		}else if(address_type==""){
			document.getElementById("error_message").innerHTML = "Select another address , address type is missing";
			$("#errorMSG").show("fast").delay(1000).hide("fast");
			return false;
		}else if(order_type_id==""){
			document.getElementById("error_message").innerHTML = "Order type id is missing";
			$("#errorMSG").show("fast").delay(1000).hide("fast");
			return false;
		}else if(ot_type==""){
			document.getElementById("error_message").innerHTML = "Category type is missing";
			$("#errorMSG").show("fast").delay(1000).hide("fast");
			return false;
		}else if(time_book_type==""){
				document.getElementById("error_message").innerHTML = "Select date and time or flexi time";
				$("#errorMSG").show("fast").delay(1000).hide("fast");
				return false;
		}else if(payment_method==""){
			document.getElementById("error_message").innerHTML = "Select payment method";
			$("#errorMSG").show("fast").delay(1000).hide("fast");
			return false;
		}else{
			return true;
		}
	}

/*************** Order Validation *********/

// 		$('body').on('click','.ordervalidation', function(){

// 			var customer_id = $("#customer_id").val();
// alert();
// 			if(customer_id==''){
// 				$('document').find('#error_message').text('Customer id is missing');
// 				return false;
// 			}
				
// 		});

/******************/
	//jQuery time
	var current_fs, next_fs, previous_fs; //fieldsets
	var left, opacity, scale; //fieldset properties which we will animate
	var animating; //flag to prevent quick multi-click glitches
	
	$(".next").click(function(){
		if(animating) return false;
			animating = true;
	
			current_fs = $(this).parent();
			next_fs = $(this).parent().next();
			$("#progressbar li").removeClass("active");
			//activate next step on progressbar using the index of next_fs
			$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
			//show the next fieldset
			next_fs.show(); 
			//hide the current fieldset with style
			current_fs.animate({opacity: 0}, {
				step: function(now, mx) {
					//as the opacity of current_fs reduces to 0 - stored in "now"
					//1. scale current_fs down to 80%
					scale = 1 - (1 - now) * 0.2;
					//2. bring next_fs from the right(50%)
					left = (now * 50)+"%";
					//3. increase opacity of next_fs to 1 as it moves in
					opacity = 1 - now;
					current_fs.css({
        		'transform': 'scale('+scale+')',
        		'position': 'absolute'
      		});
					next_fs.css({'left': left, 'opacity': opacity});
				}, 
				duration: 0, 
				complete: function(){
					current_fs.hide();
					animating = false;
				}, 
				//this comes from the custom easing plugin
				easing: 'easeInOutBack'
			});
	});
/******************/

/***************** COMMANDCENTER ADD ORDER SHOW CATEGORIES *****************/

			$('body').on('click', '.commandcenteraddorder', function(){
				var customer_order_id = $(this).attr("data-customer_order_id");
				$.ajax({
		  			url: '{{route("categorymodel")}}',
		  			data: {'customer_order_id':customer_order_id,},
		  			headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
		  			dataType: "json",
		  			type: 'POST',
		  			success: function (res) {
						if(res.status == 'success'){
							$('#commandcenteraddorder').html(res.htm);
						}else if(res.status=='loggedout'){
							window.location.href = BASEURL;
						}else{
							alert(res.msg);
						}
					},
					error:function(){
			  			alert('An error has occurred');
					}
				});
					
			});

/***********************/
	var car_type_customereditorder = $('.select-cars-customereditorder:checkbox:checked').attr('data-car_type');
	var subscription_id_customereditorder = $('.select-cars-customereditorder:checkbox:checked').attr('data-subscription_id');
	$("body").find(".select-cars-customereditorder").each(function(){ 	
		if($(this).attr('data-car_type')!=car_type_customereditorder){
			$(this).attr("disabled", true); 
		}
		if($(this).attr('data-subscription_id')!=subscription_id_customereditorder){
			$(this).attr("disabled", true); 
		}
	});	
/***********************/

/***********************/
	var customer_editorder_cars = [];
	var customer_editorder_slug = [];
	$("body").find(".select-cars-customereditorder:checkbox:checked").each(function(){
		customer_editorder_cars.push($(this).attr("data-car_id"))
	});
	$("body").find(".select-services-customereditorder:checkbox:checked").each(function(){
		customer_editorder_slug.push($(this).attr("data-slug"));
		$(document).find('.service'+$(this).attr("data-slug")).css("font-weight", "bold");
	});
	$('#cars').val(customer_editorder_cars);
	$('#slug').val(customer_editorder_slug);
/***********************/

/***************** Ninja Attendance Model *****************/

			$('body').on('click', '#ninja-attendance', function(){ 
	
				var cleaner_id = $(this).attr("data-cleaner_id");
				var cleaner_name = $(this).attr("data-cleaner_name");
				var date = $(this).attr("data-date");
				var todaydate = $(this).attr("data-today_date");
				var zone_name = $(this).attr("data-zone_name");
				var zone_id = $(this).attr("data-zone_id");
				var city_name = $(this).attr("data-city_name");
				var city_id = $(this).attr("data-city_id");
				var cleaner_pic = $(this).attr("data-cleaner_pic");
				var default_zone_id = $(this).attr("data-default_zone_id");
				var absent_reason = $(this).attr("data-absent_reason");
				var approve_by = $(this).attr("data-approve_by");
				var comment = $(this).attr("data-comment");	
				var halfday_f = $(this).attr("data-halfDay-f");
				var halfday_t = $(this).attr("data-halfDay-t");
				var present = $(this).attr("data-present");
				var is_active = $(this).attr("data-is_active");
				var celldate = $(this).attr("data-celldate");
				var startdate = $(this).attr("data-startdate");
				var enddate = $(this).attr("data-enddate");
	
				var month = $("#current_month").val();
				var current_week = $("#current_week").val();

				if (typeof present !== typeof undefined && present !== false){
				    present=present.trim();
				}else{
					present='';
				}
				fullday = $(this).attr("data-absent_fullday");
				if (typeof fullday !== typeof undefined && fullday !== false){
				    fullday=fullday.trim();
				}else{
					fullday='';
				}
				halfday = $(this).attr("data-absent_halfday");
				if (typeof halfday !== typeof undefined && halfday !== false){
				    halfday=halfday.trim();
				}else{
					halfday='';
				}
			
				$.ajax({
		  			url: '{{route("attendance-model")}}',
		  			data: {'cleaner_id':cleaner_id,'cleaner_name':cleaner_name,'date':date,'zone_name':zone_name,'zone_id':zone_id,'city_name':city_name,
						'current_week':current_week,'month':month,'city_id':city_id,'cleaner_pic':cleaner_pic,'default_zone_id':default_zone_id,'absent_reason':absent_reason,
							'is_active':is_active,'comment':comment,'present':present,'fullday':fullday,'halfday':halfday,'approve_by':approve_by,'halfday_f':halfday_f,'halfday_t':halfday_t},
		  			headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
		  			dataType: "json",
		  			type: 'POST',
		  			success: function (res) {
						if(res.status == 'success'){
							$('#attendancemodel').html(res.htm);
							$(document).find( "#present-date" ).datepicker({dateFormat: 'M dd, yy', minDate: 0 }  );
							$(document).find( "#absent_daterange" ).daterangepicker({  locale: {format: 'DD-MM-YYYY',separator: " - "}, minDate:new Date(), startDate: celldate, endDate: celldate, });
							
							if(present=='P'){
								if(date < todaydate){
									document.getElementById("pills-absent-tab").classList.add("disabled");
								}
							}
							if(present=='' && fullday=='' && halfday==''){
								if(date < todaydate){
									document.getElementById("pills-absent-tab").classList.add("disabled");
								}
							}
							if(present==''){
								if(fullday=='A'){
									$('#pills-absent-tab').click();
									$('#pills-full-day-tab').click();
									if(date < todaydate){
										document.getElementById("pills-present-tab").classList.add("disabled");
										document.getElementById("pills-half-day-tab").classList.add("disabled");
									}
								}
								if(halfday=='H'){
									$('#pills-absent-tab').click();
									$('#pills-half-day-tab').click();
									if(date < todaydate){
										document.getElementById("pills-present-tab").classList.add("disabled");
										document.getElementById("pills-full-day-tab").classList.add("disabled");
									}
								}
							}
 
						}else if(res.status=='loggedout'){
							window.location.href = BASEURL;
						}else{
							alert(res.msg);
						}
					},
					error:function(){
			  			alert('An error has occurred');
					}
				});

			});

/***************** set default div show *****************/

	$('body').on('click', '#zoneclusterdiv', function(){ 
		var div = document.getElementById("setdefault");  
    	if (div.style.display == "none") {  
			div.style.display = "flex"; 
        }  
	});

/***************** Zone Cluster by city *****************/

		function select_city(city_id){
			$.ajax({
		  			url: '{{route("zone-cluster-by-city")}}',
		  			data: {'city_id':city_id,},
		  			headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
		  			dataType: "json",
		  			type: 'POST',
		  			success: function (res) {
						if(res.status == 'success'){
							$('#zonecluster').html(res.htm);
						}else if(res.status=='loggedout'){
							window.location.href = BASEURL;
						}else{
							alert(res.msg);
						}
					},
					error:function(){
			  			alert('An error has occurred');
					}
				});
		}


/*************************/
if($('.alert-success').length>0){
	setTimeout(function() {$('.alert-success').fadeOut('fast');}, 2000); 
}
if($('.alert-danger').length>0){
	setTimeout(function() {$('.alert-danger').fadeOut('fast');}, 2000); 
}
/*************************/
function fillvalue(mthis){
	var _this=$(mthis);
	if(_this.prop('checked') == true){
		_this.closest(".draggable-item").find("input[name='column_checked[]']").val(1);
	}else{
		_this.closest(".draggable-item").find("input[name='column_checked[]']").val(0);
	}
}
/*************************/
		function format (option) {
			console.log(option);
			if (!option.id) { return option.text; }
			var ob = option.text + '<img src="{{ asset('public/assets/image/Rectangle2175.png')}}" />';	// replace image source with option.img (available in JSON)
			return ob;
		};
/*************************/
  $("#myval").select2({
  		placeholder: "Select something!!",
	    width: "50%",
      allowClear: true,
	    templateResult: format,
	    templateSelection: function (option) {
	        if (option.id.length > 0 ) {
	            return option.text + " ";
	        } else {
	            return option.text;
	        }
	    },
      escapeMarkup: function (m) {
				return m;
			}
	});
/*************************/
function format (option) {
			console.log(option);
			if (!option.id) { return option.text; }
			var ob = option.text + '';	// replace image source with option.img (available in JSON)
			return ob;
		};
/*************************/
  $(".myval").select2({
  		placeholder: "Select something!!",
	    width: "50%",
      allowClear: true,
	    templateResult: format,
	    templateSelection: function (option) {
	        if (option.id.length > 0 ) {
	            return option.text + " ";
	        } else {
	            return option.text;
	        }
	    },
      escapeMarkup: function (m) {
				return m;
			}
	});
/*************************/
		$( init );

	function init() {
	  $( ".droppable-area1, .droppable-area2" ).sortable({
		  connectWith: ".connected-sortable",
		  stack: '.connected-sortable ul'
		}).disableSelection();
	}
	</script>
	<script>
	$(document).ready(function(){ 
    $('.tab-a').click(function(){  
      $(".tab").removeClass('tab-active');
      $(".tab[data-id='"+$(this).attr('data-id')+"']").addClass("tab-active");
      $(".tab-a").removeClass('active-a');
      $(this).parent().find(".tab-a").addClass('active-a');
     });
});
/*************************/
		$(".toggle-sidebar-nav").click(function(){
		  $(".left-side-navv").toggleClass("increase-width");
		});
/*************************/
		$(".toggle-sidebar-nav").click(function(){
		  $(".show").toggleClass("wrapper-nav");
		});
/*************************/
$("#toggle-form").click(function(){
		  $(".form-toggle-box").toggleClass("form-showw");
		});
$("#toggle-form-1").click(function(){
		  $(".form-toggle-box01").toggleClass("form-showw01");
		});
/*************************/
	function getUrlParams(dParam) {
		var dPageURL = window.location.search.substring(1),
			dURLVariables = dPageURL.split('&'),
			dParameterName,
			i;

		for (i = 0; i < dURLVariables.length; i++) {
			dParameterName = dURLVariables[i].split('=');

			if (dParameterName[0] === dParam) {
				return dParameterName[1] === undefined ? true : decodeURIComponent(dParameterName[1]);
			}
		}
	}
	(function($) {
		"use strict"
		var direction =  getUrlParams('dir');
		if(direction != 'rtl')
		{direction = 'ltr'; }
		
		new dezSettings({
			typography: "roboto",
			version: "light",
			layout: "vertical",
			headerBg: "color_1",
			navheaderBg: "color_3",
			sidebarBg: "color_1",
			sidebarStyle: "full",
			sidebarPosition: "fixed",
			headerPosition: "fixed",
			containerLayout: "wide",
			direction: direction
		}); 

	})(jQuery);
/*************************/
$(document).ready(function($) {
    $(".table-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
/*************************/
    $(".tab_content").hide();
    $(".tab_content:first").show();

  /* if in tab mode */
    $("ul.tabs li").click(function() {
		
      $(".tab_content").hide();
      var activeTab = $(this).attr("rel"); 
      $("#"+activeTab).fadeIn();		
		
      $("ul.tabs li").removeClass("active");
      $(this).addClass("active");

	  $(".tab_drawer_heading").removeClass("d_active");
	  $(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");

    });
    $(".tab_container").css("min-height", function(){ 
      return $(".tabs").outerHeight() + 50;
    });
	/* if in drawer mode */
	$(".tab_drawer_heading").click(function() {
      
      $(".tab_content").hide();
      var d_activeTab = $(this).attr("rel"); 
      $("#"+d_activeTab).fadeIn();
	  
	  $(".tab_drawer_heading").removeClass("d_active");
      $(this).addClass("d_active");
	  
	  $("ul.tabs li").removeClass("active");
	  $("ul.tabs li[rel^='"+d_activeTab+"']").addClass("active");
    });
/*************************/
$(".image-box").click(function(event) {
	var previewImg = $(this).children("img");
	$(this)
		.siblings()
		.children("input")
		.trigger("click");
	$(this)
		.siblings()
		.children("input")
		.change(function() {
			var reader = new FileReader();
			reader.onload = function(e) {
				var urll = e.target.result;
				$(previewImg).attr("src", urll);
				previewImg.parent().css("background", "transparent");
				previewImg.show();
				previewImg.siblings("p").hide();
			};
			reader.readAsDataURL(this.files[0]);
		});
});
/*************************/
/*************************/

/************************/
 function addcustomervalid(){
	document.getElementById("addcustomerbtn").disabled = true;
	var firstname=document.getElementById('firstname').value;
	var lastname=document.getElementById('lastname').value;
	var email=document.getElementById('email').value;
	var phone=document.getElementById('phone').value;
	var inputCity=document.getElementById('inputCity').value;
	var address=document.getElementById('address').value;
	var emailtrue=0;
	if(email){
		var value1 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  			if(email.match(value1)){
					emailtrue=1;
  			} 
	}
	 if(firstname && lastname && emailtrue && phone && inputCity && address){
		document.getElementById('addcustomerbtn').style.backgroundColor='black';
		document.getElementById("addcustomerbtn").disabled = false;
	 }else{
		document.getElementById('addcustomerbtn').style.backgroundColor='#00000043';
	 }
 }
/************************/

/**************************/
// $(document).ready (function () {  
//   $("#search-order").validate ();  
// }); 
/**************************/


</script>
</body>
</html>