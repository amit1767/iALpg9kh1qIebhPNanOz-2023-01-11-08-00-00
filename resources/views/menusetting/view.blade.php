@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->

<div class="content-body">
    <!-- row -->

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="heading-content-nav">
                    <h3> Menu Setting </h3>
                    <p> <small> <img class="common_dash_top_icon" src="{{asset('public/assets/image/dashbaord_Icon.png')}}" alt=""> </small> > <small> Menu Setting </small> </p>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="menu-setting-main-boxx">
                <ul id="accordion" class="accordion">
                    <li class="open">

                        <div class="link"> Home Page <span class="float-end"><i class="fas fa-angle-down"></i></span> </div>
                        <ul class="submenu">
                            <li> <a href="javascript:void(0)" class="tab-a active-a" data-id="applogo"> App Logo </a>
                            </li>
                            <li> <a href="javascript:void(0)" class="tab-a" data-id="banner"> Banner </a> </li>
                            <li> <a href="javascript:void(0)" class="tab-a" data-id="Categories"> Categories </a> </li>
                            <li> <a href="javascript:void(0)" class="tab-a" data-id="Reorder"> Reorder </a> </li>
                            <li> <a href="javascript:void(0)" class="tab-a" data-id="bookcarwash"> Book A Car Wash </a>
                            </li>
                            <li> <a href="javascript:void(0)" class="tab-a" data-id="todaybestdeal"> Today’s best deals
                                </a> </li>
                        </ul>
                    </li>

                    <li>

                    <li>
                        <div class="link"> <a href="javascript:void(0)" class="tab-a" data-id="Tutorials"> Tutorials </a> </div>
                    </li>

                    <li>
                        <div class="link"> <a href="javascript:void(0)" class="tab-a" data-id="tab1"> Side Menu  </a></div>
                    </li>

                    <li>
                        <div class="link"> Service Categories <span class="float-end"><i class="fas fa-angle-down"></i></span> </div>
                        <ul class="submenu" style="display: none;">
                            <li> <a href="javascript:void(0)" class="tab-a" data-id="Carwash"> Car Wash </a></li>
                            <li> <a href="javascript:void(0)"> Banner </a> </li>
                            <li> <a href="javascript:void(0)"> Categories </a> </li>
                            <li> <a href="javascript:void(0)"> Reorder </a> </li>
                            <li> <a href="javascript:void(0)"> Book A Car Wash </a> </li>
                            <li> <a href="javascript:void(0)"> Today’s best deals </a> </li>
                        </ul>
                    </li>

                    <li class="menu-setting-buttonn"> <a href="#"> Package Setting </a> </li>
                </ul>

                <div class="tab-content-custom-main">

                    <div class="tab tab-active" data-id="applogo">

                     <!--    <div class="h">
                            <h2>App Logo</h2>
                            <p>Content of tab one</p>
                        </div> -->

                        <div class="row">
                            <div class="col-lg-7 col-md-12">
                                <div class="attach_applogo_box menusetting_sub_bg">
                                    <div class="control_box_content d-flex align-items-center justify-content-between">
                                        <h6>App Logo</h6>
                                        <button type="submit" class="apply-button">Publish</button>
                                    </div>
                                    <div class="control-group file-upload" id="file-upload1">
                                        <div class="image-box text-center menu_seting_img_box">
                                            <p> <span>+</span> <br> <small> Attach App Logo </small></p>
                                            <img src="" alt="">
                                        </div>
                                        <div class="controls" style="display: none;">
                                            <input type="file" name="contact_image_1">
                                        </div>
                                        <p class="mt-3">NOTE: App Logo should be at least 512 X 200 pixels.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-12">
                                <img class="img-fluid meunu_seting_right_img" src="{{asset('public/assets/image/Group_10385.png')}}">
                            </div>
                        </div>  

                    </div>
                    <!--end of tab App Logo-->

                    <div class="tab" data-id="banner">

                        <!-- <div class="h">
                            <h2>Banner </h2>
                            <p>Content of tab one</p>
                        </div> -->

                        <div class="row">
                            <div class="col-lg-7 col-md-12">
                                <div class="attach_banner_box menusetting_sub_bg">
                                    <div class="control_box_content d-flex align-items-center justify-content-between">
                                        <h6>Banners</h6>
                                        <button type="submit" class="apply-button">Publish</button>
                                    </div>

                                    <div class="menu_setting_banner_accordion">
                                        <div class="accordion accordion-flush" id="accordionFlushExample-1">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-heading-Banners-One">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapse-Banners-One"
                                                        aria-expanded="false" aria-controls="flush-collapse-Banners-One">
                                                        <span class="me-3"><i
                                                                class="fas fa-expand-arrows-alt"></i></span>Shine
                                                        Subscription
                                                    </button>
                                                </h2>
                                                <div id="flush-collapse-Banners-One" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-heading-Banners-One"
                                                    data-bs-parent="#accordionFlushExample">

                                                    <div class="shine_subscription_content">                                                        
                                                        <div class="form-group">
                                                          <label> Banner Title </label>
                                                          <input type="text" class="form-control" for="" name="" value="" placeholder="Shine Subcription">
                                                        </div>

                                                        <div class="subs_banner">
                                                            <div class="control-group file-upload" id="file-upload1">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6">
                                                                        <div class="control-group file-upload"
                                                                            id="file-upload1">
                                                                            <p class="mb-0 subs_banner_head">English
                                                                                Banner</p>
                                                                            <div
                                                                                class="image-box text-center menu_seting_img_box">
                                                                                <p> <span>+</span> <br> <small> Add New
                                                                                        Banner </small></p>
                                                                                <img src="" alt="">
                                                                            </div>
                                                                            <div class="controls"
                                                                                style="display: none;">
                                                                                <input type="file"
                                                                                    name="contact_image_1">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-6 col-md-6">
                                                                        <div class="control-group file-upload"
                                                                            id="file-upload1">
                                                                            <p class="mb-0 subs_banner_head">Arabic
                                                                                Banner</p>
                                                                            <div
                                                                                class="image-box text-center menu_seting_img_box">
                                                                                <p> <span>+</span> <br> <small> Add New
                                                                                        Banner </small></p>
                                                                                <img src="" alt="">
                                                                            </div>
                                                                            <div class="controls"
                                                                                style="display: none;">
                                                                                <input type="file"
                                                                                    name="contact_image_1">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="controls" style="display: none;">
                                                                    <input type="file" name="contact_image_1">
                                                                </div>

                                                                <p class="mt-3 sabs_banner_note">NOTE: App Logo should
                                                                    be at least 512 X 200 pixels.</p>

                                                                <div
                                                                    class="accordion-item d-flex align-items-center justify-content-between">
                                                                    <h2 class="accordion-head mb-0">
                                                                        Active/Inactive
                                                                    </h2>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input"
                                                                                type="checkbox"
                                                                                id="flexSwitchCheckChecked" checked>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-heading-Banners-Two">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapse-Banners-Two"
                                                        aria-expanded="false" aria-controls="flush-collapse-Banners-Two">
                                                        <span class="me-3"><i
                                                                class="fas fa-expand-arrows-alt"></i></span>VIP Member
                                                        Banner
                                                    </button>
                                                </h2>
                                                <div id="flush-collapse-Banners-Two" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-heading-Banners-Two"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">Placeholder content for this accordion,
                                                        which is intended to demonstrate the <code>.accordion-flush</code>
                                                        class. This is the second item's accordion body. Let's imagine this
                                                        being filled with some actual content.</div>
                                                </div>
                                            </div>

                                        </div>                                       
                                    </div>
                                    <div class="control-group file-upload" id="file-upload1">
                                    <div class="image-box text-center menu_seting_img_box">
                                        <p> <span>+</span> <br> <small> Add New Banner </small></p>
                                        <img src="" alt="">
                                    </div>
                                    <div class="controls" style="display: none;">
                                        <input type="file" name="contact_image_1">
                                    </div>
                                </div>
                                </div>                                
                            </div>

                            <div class="col-lg-5 col-md-12">
                                <img class="img-fluid meunu_seting_right_img" src="{{asset('public/assets/image/Group_10385.png')}}">
                            </div>

                        </div>
                    </div><!--end of tab banner-->

                
	                <div class="tab" data-id="Categories">

	                   <!--  <div class="h">
	                        <h2>Categories</h2>
	                        <p>Content of tab one</p>
	                    </div> -->

	                    <div class="row">
	                        <div class="col-lg-7 col-md-12">
	                            <div class="attach_categories_box menusetting_sub_bg">
	                                <div class="control_box_content d-flex align-items-center justify-content-between">
	                                    <h6>Categories</h6>
	                                    <button type="submit" class="apply-button">Save</button>
	                                </div>

	                                <div class="menu_setting_banner_accordion">
	                                    <div class="accordion accordion-flush" id="accordionFlushExample-2">

	                                        <div class="accordion-item">
	                                            <h2 class="accordion-header" id="flush-heading-categories-One">
	                                                <button class="accordion-button collapsed" type="button"
	                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse-categories-One"
	                                                    aria-expanded="false" aria-controls="flush-collapse-categories-One">
	                                                    <span class="me-3"><i
	                                                            class="fas fa-expand-arrows-alt"></i></span>Car Wash
	                                                </button>
	                                            </h2>

	                                            <div id="flush-collapse-categories-One" class="accordion-collapse collapse"
	                                                aria-labelledby="flush-heading-categories-One"
	                                                data-bs-parent="#accordionFlushExample">

	                                                <div class="menusetting_accordion_inner_content">

	                                                   <div class="form-group">
                                                          <label> Title En </label>
                                                          <input type="text" class="form-control" for="" name="" value="" placeholder="Car Wash">
                                                         </div>
                                                         <div class="form-group ariban-input">
                                                          <label> Title Ar </label>
                                                          <input type="text" class="form-control" for="" name="" value="" placeholder="غسيل سيارة">
                                                        </div>

	                                                    <div class="subs_banner">

	                                                        <div class="row">
	                                                            <div class="col-lg-6 col-md-6">
	                                                                <div class="control-group file-upload"
	                                                                    id="file-upload1">
	                                                                    <p class="mb-0 subs_banner_head">Category Icon</p>
	                                                                    
                                                                        <div class="image-box text-center menu_seting_img_box">
	                                                                        <p> <span>+</span> <br> <small> Add New Banner
	                                                                            </small></p>
	                                                                        <img src="" alt="">
	                                                                    </div>
	                                                                    <div class="controls" style="display: none;">
	                                                                        <input type="file" name="contact_image_1">
	                                                                    </div>
	                                                                </div>
	                                                            </div>
	                                                        </div>

	                                                        <div class="controls" style="display: none;">
	                                                            <input type="file" name="contact_image_1">
	                                                        </div>

	                                                        <p class="mt-3 sabs_banner_note">NOTE: App Logo should be at least 512 X 200 pixels.</p>

	                                                        <div class="accordion-item d-flex align-items-center justify-content-between">
	                                                            <h2 class="accordion-head mb-0">
	                                                                Active/Inactive
	                                                            </h2>
	                                                            <div class="d-flex align-items-center">
	                                                                <div class="form-check form-switch">
	                                                                    <input class="form-check-input" type="checkbox"
	                                                                        id="flexSwitchCheckChecked" checked>
	                                                                </div>
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                </div>

	                                            </div>
	                                        </div>

	                                        <div class="accordion-item">
	                                            <h2 class="accordion-header" id="flush-heading-categories-Two">
	                                                <button class="accordion-button collapsed" type="button"
	                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse-categories-Two"
	                                                    aria-expanded="false" aria-controls="flush-collapse-categories-Two">
	                                                    <span class="me-3"><i
	                                                            class="fas fa-expand-arrows-alt"></i></span>Detailing
	                                                </button>
	                                            </h2>
	                                            <div id="flush-collapse-categories-Two" class="accordion-collapse collapse"
	                                                aria-labelledby="flush-heading-categories-Two"
	                                                data-bs-parent="#accordionFlushExample">
	                                                <div class="accordion-body">Placeholder content for this accordion,
	                                                    which is intended to
	                                                    demonstrate the <code>.accordion-flush</code> class. This is the
	                                                    second item's
	                                                    accordion body. Let's imagine this being filled with some actual
	                                                    content.</div>
	                                            </div>
	                                        </div>

	                                        <div class="accordion-item">
	                                            <h2 class="accordion-header" id="flush-heading-categories-Three">
	                                                <button class="accordion-button collapsed" type="button"
	                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse-categories-Three"
	                                                    aria-expanded="false" aria-controls="flush-collapse-categories-Three">
	                                                    <span class="me-3"><i
	                                                            class="fas fa-expand-arrows-alt"></i></span>Maintenance
	                                                </button>
	                                            </h2>
	                                            <div id="flush-collapse-categories-Three" class="accordion-collapse collapse"
	                                                aria-labelledby="flush-heading-categories-Three"
	                                                data-bs-parent="#accordionFlushExample">
	                                                <div class="accordion-body">Placeholder content for this accordion,
	                                                    which is intended to
	                                                    demonstrate the <code>.accordion-flush</code> class. This is the
	                                                    second item's
	                                                    accordion body. Let's imagine this being filled with some actual
	                                                    content.</div>
	                                            </div>
	                                        </div>

	                                        <div class="accordion-item">
	                                            <h2 class="accordion-header" id="flush-heading-categories-Four">
	                                                <button class="accordion-button collapsed" type="button"
	                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse-categories-Four"
	                                                    aria-expanded="false" aria-controls="flush-collapse-categories-Four">
	                                                    <span class="me-3"><i
	                                                            class="fas fa-expand-arrows-alt"></i></span>Tinting
	                                                </button>
	                                            </h2>
	                                            <div id="flush-collapse-categories-Four" class="accordion-collapse collapse"
	                                                aria-labelledby="flush-heading-categories-Four"
	                                                data-bs-parent="#accordionFlushExample">
	                                                <div class="accordion-body">Placeholder content for this accordion,
	                                                    which is intended to
	                                                    demonstrate the <code>.accordion-flush</code> class. This is the
	                                                    second item's
	                                                    accordion body. Let's imagine this being filled with some actual
	                                                    content.</div>
	                                            </div>
	                                        </div>

	                                        <div class="accordion-item">
	                                            <h2 class="accordion-header" id="flush-heading-categories-Five">
	                                                <button class="accordion-button collapsed" type="button"
	                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse-categories-Five"
	                                                    aria-expanded="false" aria-controls="flush-collapse-categories-Five">
	                                                    <span class="me-3"><i
	                                                            class="fas fa-expand-arrows-alt"></i></span>Recovery
	                                                </button>
	                                            </h2>
	                                            <div id="flush-collapse-categories-Five" class="accordion-collapse collapse"
	                                                aria-labelledby="flush-heading-categories-Five"
	                                                data-bs-parent="#accordionFlushExample">
	                                                <div class="accordion-body">Placeholder content for this accordion,
	                                                    which is intended to
	                                                    demonstrate the <code>.accordion-flush</code> class. This is the
	                                                    second item's
	                                                    accordion body. Let's imagine this being filled with some actual
	                                                    content.</div>
	                                            </div>
	                                        </div>

	                                        <div class="accordion-item">
	                                            <h2 class="accordion-header" id="flush-heading-categories-Six">
	                                                <button class="accordion-button collapsed" type="button"
	                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse-categories-Six"
	                                                    aria-expanded="false" aria-controls="flush-collapse-categories-Six">
	                                                    <span class="me-3"><i
	                                                            class="fas fa-expand-arrows-alt"></i></span>Donate
	                                                </button>
	                                            </h2>
	                                            <div id="flush-collapse-categories-Six" class="accordion-collapse collapse"
	                                                aria-labelledby="flush-heading-categories-Six"
	                                                data-bs-parent="#accordionFlushExample">
	                                                <div class="accordion-body">Placeholder content for this accordion,
	                                                    which is intended to
	                                                    demonstrate the <code>.accordion-flush</code> class. This is the
	                                                    second item's
	                                                    accordion body. Let's imagine this being filled with some actual
	                                                    content.</div>
	                                            </div>
	                                        </div>

	                                    </div>
	                                </div>
	                            </div>
	                        </div>

                            <div class="col-lg-5 col-md-12">
                                <img class="img-fluid meunu_seting_right_img" src="{{asset('public/assets/image/Group_10385.png')}}">
                            </div>

	                    </div>

	                </div>
	                <!--end of tab Categories-->

	                <div class="tab" data-id="Reorder">
	                   <!--  <div class="h">
	                        <h2>Reorder</h2>
	                        <p>Content of tab one</p>
	                    </div> -->

	                    <div class="row">
	                        <div class="col-lg-7 col-md-12">
	                            <div class="attach_recoder_box menusetting_sub_bg">
	                                <div class="control_box_content d-flex align-items-center justify-content-between">
	                                    <h6>Reorder</h6>
	                                    <button type="submit" class="apply-button">Publish</button>
	                                </div>

	                                <div class="menu_setting_banner_accordion">

	                                    <div class="accordion accordion-flush" id="accordionFlushExample">

	                                        <div class="accordion-item">
	                                            <h2 class="accordion-header d-flex" id="flush-heading-reorder-One">
	                                                <button class="accordion-button collapsed d-flex align-items-center justify-content-between" type="button"
	                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse-reorder-One"
	                                                    aria-expanded="false" aria-controls="flush-collapse-reorder-One">
	                                                    Display Quantity <h6 class="me-2 mb-0">3</h6>   
	                                                </button>    
                                                                                                 
	                                            </h2>

	                                            <div id="flush-collapse-reorder-One" class="accordion-collapse collapse"
	                                                aria-labelledby="flush-heading-reorder-One"
	                                                data-bs-parent="#accordionFlushExample">
	                                                <div class="accordion-body">Placeholder content for this accordion,
	                                                    which is intended to demonstrate the <code>.accordion-flush</code>
	                                                    class. This is the first item's accordion body.</div>
	                                            </div>
	                                        </div>

	                                    </div>

	                                    <div class="accordion-item d-flex align-items-center justify-content-between">
	                                        <h2 class="accordion-head mb-0">
	                                            Active/Inactive
	                                        </h2>
	                                        <div class="d-flex align-items-center">
	                                            
	                                            <div class="form-check form-switch">
	                                                <input class="form-check-input" type="checkbox"
	                                                    id="flexSwitchCheckChecked" checked>
	                                            </div>
	                                        </div>
	                                    </div>

	                                </div>
	                            </div>
	                        </div>

                            <div class="col-lg-5 col-md-12">
                                <img class="img-fluid meunu_seting_right_img" src="{{asset('public/assets/image/Group_10385.png')}}">
                            </div>

	                    </div>

	                </div>
	                <!--end of tab Reorder-->

	                <div class="tab" data-id="bookcarwash">
	                    <div class="h">
	                        <h2>Book Car wash</h2>
	                        <p>Content of tab one</p>
	                    </div>

	                    <div class="row">
	                        <div class="col-lg-7 col-md-12">
	                            <div class="attach_bookcarwash_box menusetting_sub_bg">
	                                <div class="control_box_content d-flex align-items-center justify-content-between">
	                                    <h6>Book a Car Wash</h6>
	                                    <button type="submit" class="apply-button">Publish</button>
	                                </div>

	                                <div class="menu_setting_banner_accordion">


	                                    <div class="accordion-item d-flex align-items-center justify-content-between">
	                                        <h2 class="accordion-head mb-0">
	                                            Active/Inactive
	                                        </h2>
	                                        <div class="d-flex align-items-center">
	                                            <div class="form-check form-switch">
	                                                <input class="form-check-input" type="checkbox"
	                                                    id="flexSwitchCheckChecked" checked>
	                                            </div>
	                                        </div>
	                                    </div>

	                                </div>
	                            </div>
	                        </div>

                            <div class="col-lg-5 col-md-12">
                                <img class="img-fluid meunu_seting_right_img" src="{{asset('public/assets/image/Group_10385.png')}}">
                            </div>

	                    </div>

	                </div>
	                <!--end of tab bookcarwash-->

	                <div class="tab" data-id="todaybestdeal">
	                    <!-- <div class="h">
	                        <h2>Today Best Deal</h2>
	                        <p>Content of tab one</p>
	                    </div> -->

	                    <div class="row">
	                        <div class="col-lg-7 col-md-12">
	                            <div class="attach_todaybestdeal_box menusetting_sub_bg">
	                                <div class="control_box_content d-flex align-items-center justify-content-between">
	                                    <h6>Today's best deals</h6>
	                                    <button type="submit" class="apply-button">Publish</button>
	                                </div>

	                                <div class="menu_setting_banner_accordion">
	                                    <div class="accordion accordion-flush" id="accordionFlushExample">
	                                        <div class="accordion-item">
	                                            <h2 class="accordion-header" id="flush-heading-todaybestdeal-One">
	                                                <button class="accordion-button collapsed" type="button"
	                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse-todaybestdeal-One"
	                                                    aria-expanded="false" aria-controls="flush-collapse-todaybestdeal-One">
	                                                    <span class="me-3"><i
	                                                            class="fas fa-expand-arrows-alt"></i></span>Today's best
	                                                    Deals
	                                                </button>
	                                            </h2>
	                                            <div id="flush-collapse-todaybestdeal-One" class="accordion-collapse collapse"
	                                                aria-labelledby="flush-heading-todaybestdeal-One"
	                                                data-bs-parent="#accordionFlushExample">

	                                                <div class="menusetting_accordion_inner_content">

                                                        <div class="form-group">
                                                          <label> Title En </label>
                                                          <input type="text" class="form-control" for="" name="" value="" placeholder="Today's Best Deals">
                                                        </div>
                                                        <div class="form-group ariban-input">
                                                          <label>Title Er</label>
                                                            <input type="text" class="form-control" for="" name="" value="" placeholder="أفضل عروض اليوم">
                                                        </div>

                                                        <div class="form-group">
                                                          <label> Message En </label>
                                                          <input type="text" class="form-control" for="" name="" value="" placeholder="Get up to 70% discount">
                                                        </div>
                                                        <div class="form-group ariban-input">
                                                          <label>Title Er</label>
                                                            <input type="text" class="form-control" for="" name="" value="" placeholder="احصل على خصم يصل إلى 70٪">
                                                        </div>
	                                                    

	                                                    <div class="subs_banner">

	                                                        <p class="mb-0 subs_banner_head">Item Added (2)</p>
	                                                        <div class="row">
	                                                            <div class="col-lg-4 col-md-4">
	                                                                <div class="control-group file-upload"
	                                                                    id="file-upload1">

	                                                                    <div
	                                                                        class="image-box text-center menu_seting_img_box">
	                                                                        <p> <span>+</span> <br> <small> Add New Banner
	                                                                            </small></p>
	                                                                        <img src="" alt="">
	                                                                    </div>
	                                                                    <div class="controls" style="display: none;">
	                                                                        <input type="file" name="contact_image_1">
	                                                                    </div>
	                                                                </div>
	                                                            </div>

	                                                            <div class="col-lg-4 col-md-4">
	                                                                <div class="control-group file-upload"
	                                                                    id="file-upload1">
	                                                                    <div
	                                                                        class="image-box text-center menu_seting_img_box">
	                                                                        <p> <span>+</span> <br> <small> Add New Banner
	                                                                            </small></p>
	                                                                        <img src="" alt="">
	                                                                    </div>
	                                                                    <div class="controls" style="display: none;">
	                                                                        <input type="file" name="contact_image_1">
	                                                                    </div>
	                                                                </div>
	                                                            </div>

	                                                            <div class="col-lg-4 col-md-4">

	                                                            </div>
	                                                        </div>

	                                                        <div class="controls" style="display: none;">
	                                                            <input type="file" name="contact_image_1">
	                                                        </div>

	                                                        <p class="mt-3 sabs_banner_note">NOTE: App Logo should be at
	                                                            least 512 X 200 pixels.</p>

	                                                        <div
	                                                            class="accordion-item d-flex align-items-center justify-content-between">
	                                                            <h2 class="accordion-head mb-0">
	                                                                Active/Inactive
	                                                            </h2>
	                                                            <div class="d-flex align-items-center">
	                                                                <div class="form-check form-switch">
	                                                                    <input class="form-check-input" type="checkbox"
	                                                                        id="flexSwitchCheckChecked" checked>
	                                                                </div>
	                                                            </div>
	                                                        </div>

	                                                        <div class="control-group file-upload add_item_box"
	                                                            id="file-upload1">
	                                                            <div
	                                                                class="text-center image-box d-flex align-items-center justify-content-center">
	                                                                <p> <span>+</span> <small class="mb-2"> Add New Deals
	                                                                    </small></p>
	                                                                <img src="" alt="">
	                                                            </div>
	                                                            <div class="controls" style="display: none;">
	                                                                <input type="file" name="contact_image_1">
	                                                            </div>
	                                                        </div>

	                                                    </div>
	                                                </div>



	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>

	                                <div class="control-group file-upload" id="file-upload1">
	                                    <div class="image-box text-center menu_seting_img_box">
	                                        <p> <span>+</span> <br> <small>Attach App Logo  </small></p>
	                                        <img src="" alt="">
	                                    </div>
	                                    <div class="controls" style="display: none;">
	                                        <input type="file" name="contact_image_1">
	                                    </div>
	                                </div>
	                            </div>
	                        </div>

                            <div class="col-lg-5 col-md-12">
                                <img class="img-fluid meunu_seting_right_img" src="{{asset('public/assets/image/Group_10385.png')}}">
                            </div>

	                    </div>

	                </div>
	                <!--end of tab todaybestdeal-->

	                <div class="tab" data-id="Tutorials">

	                    <div class="row">
	                        <div class="col-lg-7 col-md-12">
	                            <div class="attach_tutorials_box menusetting_sub_bg">
	                                <div class="control_box_content d-flex align-items-center justify-content-between">
	                                    <h6>Tutorials</h6>
	                                    <button type="submit" class="apply-button">Publish</button>
	                                </div>

	                                <div class="menu_setting_banner_accordion">
	                                    <div class="accordion accordion-flush" id="accordionFlushExample">
	                                        <div class="accordion-item">
	                                            <h2 class="accordion-header" id="flush-heading-Tutorials-One">
	                                                <button class="accordion-button collapsed" type="button"
	                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse-Tutorials-One"
	                                                    aria-expanded="false" aria-controls="flush-collapse-Tutorials-One">
	                                                    <span class="me-3"><i
	                                                            class="fas fa-expand-arrows-alt"></i></span>Body Wash
	                                                </button>
	                                            </h2>
	                                            <div id="flush-collapse-Tutorials-One" class="accordion-collapse collapse"
	                                                aria-labelledby="flush-heading-Tutorials-One"
	                                                data-bs-parent="#accordionFlushExample">

	                                                <div class="menusetting_accordion_inner_content">

	                                                    <div class="menu_seting_banner_title-1">
	                                                        <h5>Car Wash</h5>
	                                                    </div>

	                                                    <p class="mb-0 subs_banner_head">Title Ar</p>
	                                                    <div class="menu_seting_banner_title-1">
	                                                        <h5>غسيل سيارة</h5>
	                                                    </div>

	                                                    <p class="mb-0 subs_banner_head">Description En</p>
	                                                    <div class="menu_seting_banner_desc">
	                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
	                                                            Etiam gravida libero
	                                                            eros, eu gravida est vehicula non. Maecenas eu egestas sem.
	                                                            Vestibulum vel
	                                                            eleifend augue.</p>
	                                                    </div>

	                                                    <p class="mb-0 subs_banner_head">Description Er</p>
	                                                    <div class="menu_seting_banner_desc">
	                                                        <p>الألم بحد ذاته هو الحب ، الزبون الرئيسي حتى ركوب الحامل
	                                                            المجاني ، فإن
	                                                            المركبات ليست متفائلة. Maecenas الاتحاد الأوروبي ووزارة شؤون
	                                                            المرأة egestas
	                                                            الغاز أو المراهقين</p>
	                                                    </div>

	                                                    <div class="subs_banner">

	                                                        <p class="mb-0 subs_banner_head">Tutorial image</p>
	                                                        <div class="row">
	                                                            <div class="col-lg-4 col-md-4">
	                                                                <div class="control-group file-upload"
	                                                                    id="file-upload1">

	                                                                    <div
	                                                                        class="image-box text-center menu_seting_img_box">
	                                                                        <p> <span>+</span> <br> <small> Add New Banner
	                                                                            </small></p>
	                                                                        <img src="" alt="">
	                                                                    </div>
	                                                                    <div class="controls" style="display: none;">
	                                                                        <input type="file" name="contact_image_1">
	                                                                    </div>
	                                                                </div>
	                                                            </div>

	                                                            <div class="col-lg-4 col-md-4">

	                                                            </div>

	                                                            <div class="col-lg-4 col-md-4">

	                                                            </div>
	                                                        </div>

	                                                        <div class="controls" style="display: none;">
	                                                            <input type="file" name="contact_image_1">
	                                                        </div>

	                                                        <p class="mt-3 sabs_banner_note">NOTE: App Logo should be at
	                                                            least 512 X 200
	                                                            pixels.</p>

	                                                        <div
	                                                            class="accordion-item d-flex align-items-center justify-content-between">
	                                                            <h2 class="accordion-head mb-0">
	                                                                Active/Inactive
	                                                            </h2>
	                                                            <div class="d-flex align-items-center">
	                                                                <div class="form-check form-switch">
	                                                                    <input class="form-check-input" type="checkbox"
	                                                                        id="flexSwitchCheckChecked" checked>
	                                                                </div>
	                                                            </div>
	                                                        </div>

	                                                    </div>
	                                                </div>
	                                            </div>

	                                        </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-heading-Tutorials-Two">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapse-Tutorials-Two"
                                                        aria-expanded="false" aria-controls="flush-collapse-Tutorials-Two">
                                                        <span class="me-3"><i
                                                                class="fas fa-expand-arrows-alt"></i></span>Tutorials 2
                                                    </button>
                                                </h2>
                                                <div id="flush-collapse-Tutorials-Two" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-heading-Tutorials-Two" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">Placeholder content for this accordion, which is
                                                        intended to
                                                        demonstrate the <code>.accordion-flush</code> class. This is the second
                                                        item's accordion
                                                        body. Let's imagine this being filled with some actual content.</div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-heading-Tutorials-Three">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapse-Tutorials-Three"
                                                        aria-expanded="false" aria-controls="flush-collapse-Tutorials-Three">
                                                        <span class="me-3"><i
                                                                class="fas fa-expand-arrows-alt"></i></span>Tutorials 3
                                                    </button>
                                                </h2>
                                                <div id="flush-collapse-Tutorials-Three" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-heading-Tutorials-Three"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">Placeholder content for this accordion, which is
                                                        intended to
                                                        demonstrate the <code>.accordion-flush</code> class. This is the second
                                                        item's accordion
                                                        body. Let's imagine this being filled with some actual content.</div>
                                             </div>
                                        </div>
	                                    </div>	                                                                      
	                                </div>
	                            </div>

	                            <div class="control-group file-upload" id="file-upload1">
	                                <div class="image-box text-center menu_seting_img_box">
	                                    <p> <span>+</span> <br> <small> Add New Banner </small></p>
	                                    <img src="" alt="">
	                                </div>
	                                <div class="controls" style="display: none;">
	                                    <input type="file" name="contact_image_1">
	                                </div>
	                            </div>
	                        </div>

                            <div class="col-lg-5 col-md-12">
                                <img class="img-fluid meunu_seting_right_img" src="{{asset('public/assets/image/Group_10168.png')}}">
                            </div>

	                    </div>
	                </div><!--end of tab Tutorial-->

	                <div class="tab" data-id="Carwash">	                   
	                    <div class="row">
	                        <div class="col-lg-7 col-md-12">
	                            <div class="attach_carwash_box menusetting_sub_bg">
	                                <div class="control_box_content d-flex align-items-center justify-content-between">	                                    
	                                    <div class="d-flex align-items-center justify-content-between">
	                                        <h2 class="accordion-head mb-0 me-2">
	                                            Active/Inactive
	                                        </h2>
	                                        <div class="">	                                           
	                                            <div class="form-check form-switch">
	                                                <input class="form-check-input" type="checkbox"
	                                                    id="flexSwitchCheckChecked" checked>
	                                            </div>
	                                        </div>
	                                    </div>

	                                    <button type="submit" class="apply-button">Publish</button>
	                                </div>

	                            <div class="menu_setting_banner_accordion">

	                               <div class="accordion accordion-flush" id="accordionFlushExample">
	                                    <div class="accordion-item">
	                                            <h2 class="accordion-header" id="flush-heading-Carwash-One">
	                                                <button class="accordion-button collapsed" type="button"
	                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse-Carwash-One"
	                                                    aria-expanded="false" aria-controls="flush-collapse-Carwash-One">
	                                                    Car Wash
	                                                </button>
	                                            </h2>
	                                            <div id="flush-collapse-Carwash-One" class="accordion-collapse collapse"
	                                                aria-labelledby="flush-heading-Carwash-One"
	                                                data-bs-parent="#accordionFlushExample">
	                                                
	                                                <div class="menusetting_accordion_inner_content">

	                                                	<div class="d-flex align-items-center">
						                                        <h2 class="accordion-head mb-2 me-2 p-0">
						                                            Active/Inactive
						                                        </h2>
						                                        <div class="">	                                           
						                                            <div class="form-check form-switch">
						                                                <input class="form-check-input" type="checkbox"
						                                                    id="flexSwitchCheckChecked" checked>
						                                            </div>
						                                        </div>
						                                    </div>
	                                                		

	                                                    <p class="mb-0 subs_banner_head">Category name En</p>
	                                                    <div class="menu_seting_banner_title-2">
	                                                        <h5>Car Wash</h5>
	                                                    </div>

	                                                    <p class="mb-0 subs_banner_head">Category name Er</p>
	                                                    <div class="menu_seting_banner_title-1">
	                                                        <h5>غسيل سيارة</h5>
	                                                    </div>

	                                                    <div class="update_btn mt-3">
	                                                    	<a href="#">UPDATE</a>
	                                                    </div>
	                                                	                                                   
	                                                </div>

	                                            </div>
	                                       	 </div>

	                                         	<div class="accordion-item">
	                                            <h2 class="accordion-header" id="flush-headingTwo">
	                                                <button class="accordion-button collapsed" type="button"
	                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
	                                                    aria-expanded="false" aria-controls="flush-collapseTwo">
	                                                    Subscribe & Save Up To 50%
	                                                </button>
	                                            </h2>
	                                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
	                                                aria-labelledby="flush-headingTwo"
	                                                data-bs-parent="#accordionFlushExample">
	                                                
	                                                <div class="menusetting_accordion_inner_content">

	                                                	<div class="d-flex align-items-center">
						                                        <h2 class="accordion-head mb-2 me-2 p-0">
						                                            Active/Inactive
						                                        </h2>
						                                        <div class="">	                                           
						                                            <div class="form-check form-switch">
						                                                <input class="form-check-input" type="checkbox"
						                                                    id="flexSwitchCheckChecked" checked>
						                                            </div>
						                                        </div>
						                                    </div>

						                                    <p class="mb-0 subs_banner_head">Category name Er</p>
	                                                    <div class="menu_seting_banner_title-1">
	                                                    	<h5>Subscribe & Save Up To 50%</h5>	                                                        
	                                                    </div>	                                                                                           

	                                                    <p class="mb-0 subs_banner_head">Category name Er</p>
	                                                    <div class="menu_seting_banner_title-1">
	                                                        <h5>%غاشترك ووفر ما يصل إلى  50</h5>
	                                                    </div>

	                                                    <div class="update_btn mt-3">
	                                                    	<a href="#">UPDATE</a>
	                                                    </div>
	                                                	                                                   
	                                                </div>
	                                            </div>
	                                        	</div>

	                                        	<div class="servie_list">
	                                        		<h5>Servie List</h5>

	                                        		<div class="accordion-item">
				                                        <h2 class="accordion-header" id="flush-headingThree">
				                                            <button class="accordion-button collapsed" type="button"
				                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
				                                                aria-expanded="false" aria-controls="flush-collapseThree">
				                                                <span class="me-3"><i
				                                                        class="fas fa-expand-arrows-alt"></i></span>Covid Killer Wash
				                                            </button>
				                                        </h2>
				                                        <div id="flush-collapseThree" class="accordion-collapse collapse"
				                                            aria-labelledby="flush-headingThree"
				                                            data-bs-parent="#accordionFlushExample">

				                                            <div class="menusetting_accordion_inner_content">

	                                                    <div class="menu_seting_banner_title-1">
	                                                        <h5>Car Wash</h5>
	                                                    </div>

	                                                    <p class="mb-0 subs_banner_head">Title Ar</p>
	                                                    <div class="menu_seting_banner_title-1">
	                                                        <h5>غسيل سيارة</h5>
	                                                    </div>

	                                                    <p class="mb-0 subs_banner_head">Description En</p>
	                                                    <div class="menu_seting_banner_desc">
	                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
	                                                            Etiam gravida libero
	                                                            eros, eu gravida est vehicula non. Maecenas eu egestas sem.
	                                                            Vestibulum vel
	                                                            eleifend augue.</p>
	                                                    </div>

	                                                    <p class="mb-0 subs_banner_head">Description Er</p>
	                                                    <div class="menu_seting_banner_desc">
	                                                        <p>الألم بحد ذاته هو الحب ، الزبون الرئيسي حتى ركوب الحامل
	                                                            المجاني ، فإن
	                                                            المركبات ليست متفائلة. Maecenas الاتحاد الأوروبي ووزارة شؤون
	                                                            المرأة egestas
	                                                            الغاز أو المراهقين</p>
	                                                    </div>

	                                                    <div class="subs_banner">

	                                                        <p class="mb-0 subs_banner_head">Tutorial image</p>
	                                                        <div class="row">
	                                                            <div class="col-lg-12 col-md-12">
	                                                                <div class="control-group file-upload"
	                                                                    id="file-upload1">

	                                                                    <div
	                                                                        class="image-box text-center menu_seting_img_box">
	                                                                        <p> <span>+</span> <br> <small> Attach image/Vedio
	                                                                            </small></p>
	                                                                        <img src="" alt="">
	                                                                    </div>
	                                                                    <div class="controls" style="display: none;">
	                                                                        <input type="file" name="contact_image_1">
	                                                                    </div>
	                                                                </div>
	                                                            </div>

	                                                            <div class="col-lg-6 col-md-6">
	                                                            	<p class="mb-0 subs_banner_head">Active Icon</p>
	                                                                <div class="control-group file-upload"
	                                                                    id="file-upload1">

	                                                                    <div
	                                                                        class="image-box text-center menu_seting_img_box">
	                                                                        <p> <span>+</span> <br> <small> Attach image/Vedio
	                                                                            </small></p>
	                                                                        <img src="" alt="">
	                                                                    </div>
	                                                                    <div class="controls" style="display: none;">
	                                                                        <input type="file" name="contact_image_1">
	                                                                    </div>
	                                                                </div>
	                                                            </div>

	                                                            <div class="col-lg-6 col-md-6">
	                                                            <p class="mb-0 subs_banner_head">De-active Icon</p>	                                                            
	                                                                <div class="control-group file-upload"
	                                                                    id="file-upload1">

	                                                                    <div
	                                                                        class="image-box text-center menu_seting_img_box">
	                                                                        <p> <span>+</span> <br> <small> Attach image/Vedio
	                                                                            </small></p>
	                                                                        <img src="" alt="">
	                                                                    </div>
	                                                                    <div class="controls" style="display: none;">
	                                                                        <input type="file" name="contact_image_1">
	                                                                    </div>
	                                                                </div>
	                                                            </div>

	                                                        </div>	                                                     

	                                                        <p class="mt-3 sabs_banner_note">NOTE: App Logo should be at
	                                                            least 512 X 200
	                                                            pixels.</p>
	                                                        

	                                                    </div>
	                                                </div>
				                                           

				                                        </div>
				                                    </div>

				                                    <div class="accordion-item">
				                                        <h2 class="accordion-header" id="flush-headingfour">
				                                            <button class="accordion-button collapsed" type="button"
				                                                data-bs-toggle="collapse" data-bs-target="#flush-collapsefour"
				                                                aria-expanded="false" aria-controls="flush-collapsefour">
				                                                <span class="me-3"><i
				                                                        class="fas fa-expand-arrows-alt"></i></span>Body Wash
				                                            </button>
				                                        </h2>
				                                        <div id="flush-collapsefour" class="accordion-collapse collapse"
				                                            aria-labelledby="flush-headingfour"
				                                            data-bs-parent="#accordionFlushExample">
				                                            <div class="accordion-body">Placeholder content for this accordion, which is
				                                                intended to
				                                                demonstrate the <code>.accordion-flush</code> class. This is the second
				                                                item's accordion
				                                                body. Let's imagine this being filled with some actual content.</div>
				                                        </div>
				                                    </div>

				                                    <div class="accordion-item">
				                                        <h2 class="accordion-header" id="flush-headingfive">
				                                            <button class="accordion-button collapsed" type="button"
				                                                data-bs-toggle="collapse" data-bs-target="#flush-collapsefive"
				                                                aria-expanded="false" aria-controls="flush-collapsefive">
				                                                <span class="me-3"><i
				                                                        class="fas fa-expand-arrows-alt"></i></span>InteriorSafe Cleaning
				                                            </button>
				                                        </h2>
				                                        <div id="flush-collapsefive" class="accordion-collapse collapse"
				                                            aria-labelledby="flush-headingfive"
				                                            data-bs-parent="#accordionFlushExample">
				                                            <div class="accordion-body">Placeholder content for this accordion, which is
				                                                intended to
				                                                demonstrate the <code>.accordion-flush</code> class. This is the second
				                                                item's accordion
				                                                body. Let's imagine this being filled with some actual content.</div>
				                                        </div>
				                                    </div>

				                                    <div class="accordion-item">
				                                        <h2 class="accordion-header" id="flush-headingsix">
				                                            <button class="accordion-button collapsed" type="button"
				                                                data-bs-toggle="collapse" data-bs-target="#flush-collapsesix"
				                                                aria-expanded="false" aria-controls="flush-collapsesix">
				                                                <span class="me-3"><i
				                                                        class="fas fa-expand-arrows-alt"></i></span>Super Keno Shine
				                                            </button>
				                                        </h2>
				                                        <div id="flush-collapsesix" class="accordion-collapse collapse"
				                                            aria-labelledby="flush-headingsix"
				                                            data-bs-parent="#accordionFlushExample">
				                                            <div class="accordion-body">Placeholder content for this accordion, which is
				                                                intended to
				                                                demonstrate the <code>.accordion-flush</code> class. This is the second
				                                                item's accordion
				                                                body. Let's imagine this being filled with some actual content.</div>
				                                        </div>
				                                    </div>
	                                        	</div>
	                                       </div>	                                    
	                               </div>

	                            </div>
	                        </div>

                            <div class="col-lg-5 col-md-12">
                                <img class="img-fluid meunu_seting_right_img mx-auto d-block" src="{{asset('public/assets/image/Group_10384.png')}}">
                            </div>
	               </div>
	               	</div><!--end of tab Reorder-->                
               </div>
            </div>
        </div>
    </div>

</div>

<!--**********************************
            Content body end
        ***********************************-->

<!----END-YOUR-CODE-HERE----->
@endsection