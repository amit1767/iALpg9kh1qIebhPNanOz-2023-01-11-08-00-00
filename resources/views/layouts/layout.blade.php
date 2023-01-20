<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link href="https://fonts.cdnfonts.com/css/maison-neue" rel="stylesheet">

    <title>Arabians</title>
    @cloudinaryJS
  </head>

  <body>

  	<section id="admin_home" class="section-dashboard">

  	    <div class="container-fluid">

  	        <div class="row">

  	            <div class="col-lg-3 col-md-3 col-12 px-0">

              		<div class="admin-sidebar">
                        <div class="sidebar-header">
                            <div class="img-box">
                                <img src="{{asset('assets/images/BrandBlue-Logo.svg')}}" class="img-fluid" />
                            </div>
                            <div class="header-title">
                                <h2>Arabians at Home Dashboard</h2>
                            </div>
                        </div>
                        <div class="sidebar-nav">

                            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                           
							<!-- ADMIN MENU -->
								<li class="nav-item">
                                    <a href="{{route('users')}}" class="nav-link align-middle px-0">
                                        <span class="ms-1 d-none d-sm-inline">Users</span>
                                    </a>
                                </li>                    
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-0 align-middle">
                                        <span class="ms-1 d-none d-sm-inline">Stories</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('articles')}}" class="nav-link px-0 align-middle">
                                        <span class="ms-1 d-none d-sm-inline">Articles</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-0 align-middle">
                                        <span class="ms-1 d-none d-sm-inline">Forum entries</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-0 align-middle">
                                        <span class="ms-1 d-none d-sm-inline">Messages</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-0 align-middle">
                                        <span class="ms-1 d-none d-sm-inline">Requests</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-0 align-middle">
                                        <span class="ms-1 d-none d-sm-inline">App Configuration</span></a>
                                </li>


                            </ul>

                            <div class="session-out">
                                <a href="{{route('logout')}}">Log out</a>
                            </div>
                        </div>
                        <div class="site-title">
                            <img src="{{asset('assets/images/Arabians_at_Home-Logo-Text_Positive.svg')}}" class="img-fluid" />
                        </div>
                    </div>

              	</div>

				  @yield('content') 

      		</div>

  		</div>

  	</section>

  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	
    <script src="{{asset('assets/js/style.js')}}"></script>

    <script src="{{asset('assets/js/custom.js')}}"></script>
	
  </body>
</html>