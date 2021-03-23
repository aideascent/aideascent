<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>

    @include('admin.includes.styles')

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700&display=swap" rel="stylesheet">

    @include('admin.includes.scripts')
<style>
.dungdt-upload-box { max-width: 250px; position: relative;
}
.dungdt-upload-box .upload-box {background: #fafbfc; text-align: center; border: 1px solid rgba(195,207,216,.3); padding: 30px 20px; transition: all .2s;}
.dungdt-upload-box .attach-demo, .dungdt-upload-box .upload-actions { display: none;}
.dungdt-upload-box .attach-demo { background: #fafbfc;text-align: center; border: 1px solid rgba(195,207,216,.3); transition: all .2s; cursor: pointer;overflow: hidden; position: relative;}
.cdn-browser {background: #f4f5f9; height: 100%;
}
.flex-column {flex-direction: column!important;}
.d-flex {display: flex!important;}
.cdn-browser .files-nav {padding: 9px 13px; border-bottom: 1px solid #dadee0; background: #fff;}
.flex-shrink-0 {flex-shrink: 0!important;}
.justify-content-between {justify-content: space-between!important;}
.cdn-browser .icon-loading {top: 4px; font-size: 20px;margin-right: 10px;position: relative; display: none;}
.cdn-browser .files-nav .btn, .cdn-browser .files-nav .form-control {height: 34px;font-size: 14px; line-height: normal; padding: 3px 12px;}
.cdn-browser {
    background: #f4f5f9;
    height: 100%;
}
#cdn-browser-modal .modal-dialog {
    height: 100%;
    padding-bottom: 55px;
    margin-left: auto;
    margin-right: auto;
}
.cdn-browser .btn-pick-files { position: relative;}
.cdn-browser .btn-pick-files input {opacity: 0; position: absolute;  top: 0;  left: 0; right: 0;  bottom: 0;}
.cdn-browser .files-list {flex-grow: 1;overflow: auto; padding: 15px;}
.cdn-browser .files-list .view-grid {display: flex;flex-wrap: wrap;margin: 0 -10px;}
.cdn-browser .files-list .view-grid .file-item {flex-shrink: 0;width: 12.5%; padding: 0 10px; margin-bottom: 20px;}
.cdn-browser .files-list .view-grid .file-item .inner {position: relative; border: 1px solid #dadee0; cursor: pointer; height: 100%; border-radius: 2px;-moz-user-select: none; -ms-user-select: none; user-select: none; -webkit-user-select: none;}
.cdn-browser .files-list .view-grid .file-item .inner .file-thumb { text-align: center;}
.cdn-browser .files-list .view-grid .file-item.is-image .inner .file-thumb img { -o-object-fit: cover; object-fit: cover; height: 170px;}
.cdn-browser .files-list .view-grid .file-item .inner .file-thumb img { max-width: 100%;}
.cdn-browser .files-list .view-grid .file-item .file-name { padding: 7px;position: absolute;bottom: 0;   left: 0;right: 0; background: rgba(0,0,0,.6);font-size: 14px;height: 54px;overflow: hidden;text-overflow: ellipsis;color: #fff;}
.cdn-browser .files-list .view-grid .file-item .inner.active .file-checked-status { position: absolute; top: 3px;right: 3px;border-radius: 50%; background: #007bff;  height: 24px; width: 24px; display: flex;align-content: center; justify-content: center;}
.cdn-browser .files-list .view-grid .file-item .inner.active:before { content: ""; position: absolute; top: -4px; left: -4px; right: -4px; bottom: -4px; border: 4px solid #007bff; border-radius: 2px;}
.cdn-browser .browser-actions {background: #fff; border-top: 1px solid #dadee0;  padding: 10px;}
.cdn-browser .browser-actions .col-left {
    display: flex;
}
.cdn-browser .browser-actions .col-left .control-remove {
    margin-right: 15px;
    padding-top: 3px;
}
.cdn-browser .count-selected {
    color: #007bff;
    font-weight: 700;
    font-size: 14px;
}
.cdn-browser .clear-selected {
    color: red;
    font-size: 14px;
    cursor: pointer;
}
.cdn-browser .browser-actions .col-right .btn {
    margin-top: 3px;
}
.dungdt-upload-box.active .attach-demo {
    display: block;
}
.dungdt-upload-box .delete i {
    color: #fff;
}
.dungdt-upload-box:hover .delete {
    display: block;
}
.dungdt-upload-box.active .upload-actions {
    display: flex;
}
.dungdt-upload-box .delete {
    color: #fff;
    position: absolute;
    top: 15px;
    right: 15px;
    cursor: pointer;
    display: none;
}
.dungdt-upload-box .attach-demo img {
    max-width: 100%;
}
.cdn-browser.is_loading:before {
    display: block!important;
    right: 0;
    position: absolute;
    background: #fff;
    left: 0;
    top: 52px;
    z-index: 11;
    opacity: .8;
    content: "";
    bottom: 0;
}
.cdn-browser.is_loading:after {
    content: "Loading";
    display: block!important;
    font: normal normal normal 14px/1 FontAwesome;
    right: 0;
    position: absolute;
    left: 0;
    top: 50%;
    z-index: 15;
    text-align: center;
    color: #131d29;
    font-size: 50px;
    margin-top: -20px;
}
.cdn-browser .files-list {
    flex-grow: 1;
    overflow: auto;
    padding: 15px;
}
</style>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        @php
        $url = Request::path();
        $conName = explode('/',$url);
        if(!isset($conName[3]))
        {
            $conName[3] = '';
        }
        if(!isset($conName[2]))
        {
            $conName[2] = '';
        }
        @endphp

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
            <div class="sidebar-brand-text mx-3">Admin Panel</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">


        <!-- Dashboard -->
        <li class="nav-item @if($conName[1] == 'dashboard') active @endif">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>


        <!-- General Settings -->
        <li class="nav-item @if($conName[1] == 'setting' && $conName[2] == 'general') active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true" aria-controls="collapseSetting">
                <i class="fas fa-cog"></i>
                <span>General Settings</span>
            </a>
            <div id="collapseSetting" class="collapse @if($conName[1] == 'setting' && $conName[2] == 'general' && $conName[3] != 'academysettings' && $conName[3] != 'servicesettings'&& $conName[3] != 'shopsettings'&& $conName[3] != 'videosettings'&& $conName[3] != 'photosettings') show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item @if($conName[3] == 'logo') active @endif" href="{{ route('admin.general_setting.logo') }}">Logo</a>
                    <a class="collapse-item @if($conName[3] == 'favicon') active @endif" href="{{ route('admin.general_setting.favicon') }}">Favicon</a>
                    <a class="collapse-item @if($conName[3] == 'loginbg') active @endif" href="{{ route('admin.general_setting.loginbg') }}">Login Background</a>
                    <a class="collapse-item @if($conName[3] == 'topbar') active @endif" href="{{ route('admin.general_setting.topbar') }}">Top Bar</a>
                    <a class="collapse-item @if($conName[3] == 'banner') active @endif" href="{{ route('admin.general_setting.banner') }}">Banner</a>
                    <a class="collapse-item @if($conName[3] == 'footer') active @endif" href="{{ route('admin.general_setting.footer') }}">Footer</a>
                    <a class="collapse-item @if($conName[3] == 'sidebar') active @endif" href="{{ route('admin.general_setting.sidebar') }}">Sidebar</a>
                    <a class="collapse-item @if($conName[3] == 'color') active @endif" href="{{ route('admin.general_setting.color') }}">Color</a>
                    <a class="collapse-item @if($conName[3] == 'preloader') active @endif" href="{{ route('admin.general_setting.preloader') }}">Preloader</a>
                    <a class="collapse-item @if($conName[3] == 'stickyheader') active @endif" href="{{ route('admin.general_setting.stickyheader') }}">Sticky Header</a>
                    <a class="collapse-item @if($conName[3] == 'googleanalytic') active @endif" href="{{ route('admin.general_setting.googleanalytic') }}">Google Analytic</a>
                    <a class="collapse-item @if($conName[3] == 'googlerecaptcha') active @endif" href="{{ route('admin.general_setting.googlerecaptcha') }}">Google Recaptcha</a>
                    <a class="collapse-item @if($conName[3] == 'tawklivechat') active @endif" href="{{ route('admin.general_setting.tawklivechat') }}">Tawk Live Chat</a>
                    <a class="collapse-item @if($conName[3] == 'cookieconsent') active @endif" href="{{ route('admin.general_setting.cookieconsent') }}">Cookie Consent</a>
                    <a class="collapse-item @if($conName[3] == 'googleaddsense') active @endif" href="{{ route('admin.general_setting.googleaddsense') }}">Google Adsense</a>
					 <a class="collapse-item @if($conName[3] == 'headercode') active @endif" href="{{ route('admin.general_setting.headercode') }}">Others</a>
                </div>
            </div>
        </li>


        <!-- Page Settings -->
        <li class="nav-item @if($conName[1] == 'page') active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePageSettings" aria-expanded="true" aria-controls="collapsePageSettings">
                <i class="fas fa-paste"></i>
                <span>Page Settings</span>
            </a>
            <div id="collapsePageSettings" class="collapse @if($conName[1] == 'page') show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item @if($conName[2] == 'home') active @endif" href="{{ route('admin.page_home.edit') }}">Home</a>
                    <a class="collapse-item @if($conName[2] == 'about') active @endif" href="{{ route('admin.page_about.edit') }}">About</a>
                    <a class="collapse-item @if($conName[2] == 'service') active @endif" href="{{ route('admin.page_service.edit') }}">Service</a>
                    <a class="collapse-item @if($conName[2] == 'shop') active @endif" href="{{ route('admin.page_shop.edit') }}">Shop</a>
                    <a class="collapse-item @if($conName[2] == 'blog') active @endif" href="{{ route('admin.page_blog.edit') }}">Academy</a>
                    <a class="collapse-item @if($conName[2] == 'project') active @endif" href="{{ route('admin.page_project.edit') }}">Project</a>
                    <a class="collapse-item @if($conName[2] == 'faq') active @endif" href="{{ route('admin.page_faq.edit') }}">FAQ</a>
                    <a class="collapse-item @if($conName[2] == 'team') active @endif" href="{{ route('admin.page_team.edit') }}">Team Member</a>
                    <a class="collapse-item @if($conName[2] == 'photo-gallery') active @endif" href="{{ route('admin.page_photo_gallery.edit') }}">Photo Gallery</a>
                    <a class="collapse-item @if($conName[2] == 'video-gallery') active @endif" href="{{ route('admin.page_video_gallery.edit') }}">Video Gallery</a>
                    <a class="collapse-item @if($conName[2] == 'contact') active @endif" href="{{ route('admin.page_contact.edit') }}">Contact</a>
                    <a class="collapse-item @if($conName[2] == 'career') active @endif" href="{{ route('admin.page_career.edit') }}">Career</a>
                    <a class="collapse-item @if($conName[2] == 'term') active @endif" href="{{ route('admin.page_term.edit') }}">Term</a>
                    <a class="collapse-item @if($conName[2] == 'privacy') active @endif" href="{{ route('admin.page_privacy.edit') }}">Privacy</a>
                    <a class="collapse-item @if($conName[2] == 'other') active @endif" href="{{ route('admin.page_other.edit') }}">Other</a>
                </div>
            </div>
        </li>


        <!-- Footer Columns -->
        <li class="nav-item @if($conName[1] == 'footer') active @endif">
            <a class="nav-link" href="{{ route('admin.footer.index') }}">
                <i class="fas fa-fw fa-list-alt"></i>
                <span>Footer Columns</span>
            </a>
        </li>
		<li class="nav-item @if($conName[1] == 'partners') active @endif">
            <a class="nav-link" href="{{ route('admin.partners.index') }}">
                <i class="fas fa-sliders-h"></i>
                <span>Partners</span>
            </a>
        </li>
		<li class="nav-item @if($conName[1] == 'feature') active @endif">
            <a class="nav-link" href="{{ route('admin.feature.index') }}">
                <i class="fas fa-sliders-h"></i>
                <span>Features</span>
            </a>
        </li>
        <!-- Sliders -->
        <li class="nav-item @if($conName[1] == 'slider') active @endif">
            <a class="nav-link" href="{{ route('admin.slider.index') }}">
                <i class="fas fa-sliders-h"></i>
                <span>Sliders</span>
            </a>
        </li>

        <!-- Blog Section -->
        <li class="nav-item @if($conName[1] == 'category' || $conName[1] == 'blog' || $conName[1] == 'comment') active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlog" aria-expanded="true" aria-controls="collapseBlog">
                <i class="fas fa-cubes"></i>
                <span>Academy Section</span>
            </a>
            <div id="collapseBlog" class="collapse @if($conName[1] == 'category' || $conName[1] == 'blog' || $conName[1] == 'comment' || $conName[3] == 'academysettings') show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.category.index') }}">Categories</a>
					
					<a class="collapse-item" href="{{ route('admin.subcategory.index') }}">Sub Categories</a>
                    <a class="collapse-item" href="{{ route('admin.blog.index') }}">Academy</a>
                    <a class="collapse-item" href="{{ route('admin.comment.approved') }}">Approved Comments</a>
                    <a class="collapse-item" href="{{ route('admin.comment.pending') }}">Pending Comments</a>
					<a class="collapse-item @if($conName[3] == 'academysettings') active @endif" href="{{ route('admin.general_setting.academysettings') }}">Academy Settings</a>
                </div>
            </div>
        </li>

        <!-- Dynamic Pages -->
        <li class="nav-item @if($conName[1] == 'dynamic-page') active @endif">
            <a class="nav-link" href="{{ route('admin.dynamic_page.index') }}">
                <i class="fas fa-cube"></i>
                <span>Dynamic Pages</span>
            </a>
        </li>

        <!-- Menu Manage -->
        <li class="nav-item @if($conName[1] == 'menu') active @endif">
            <a class="nav-link" href="{{ route('admin.menu.index') }}">
                <i class="fas fa-bars"></i>
                <span>Menu Manage</span>
            </a>
        </li>

        <!-- Project -->
        <li class="nav-item @if($conName[1] == 'project') active @endif">
            <a class="nav-link" href="{{ route('admin.project.index') }}">
                <i class="fas fa-umbrella"></i>
                <span>Project</span>
            </a>
        </li>

        <!-- Career Section -->
        <li class="nav-item @if($conName[1] == 'job' || $conName[1] == 'job-application') active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCareer" aria-expanded="true" aria-controls="collapseCareer">
                <i class="fas fa-user-secret"></i>
                <span>Career Section</span>
            </a>
            <div id="collapseCareer" class="collapse @if($conName[1] == 'job' || $conName[1] == 'job-application') show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.job.index') }}">Jobs</a>
                    <a class="collapse-item" href="{{ route('admin.job.view_application') }}">Job Applications</a>
                </div>
            </div>
        </li>


        <!-- Photo Gallery -->
        
		<li class="nav-item @if($conName[1] == 'photo-gallery' || $conName[3] == 'photosettings') active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePhoto" aria-expanded="true" aria-controls="collapsePhoto">
                <i class="fas fa-video"></i>
                <span>Photo Gallery</span>
            </a>
            <div id="collapsePhoto" class="collapse @if($conName[1] == 'photo-gallery' ) show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.photo.index') }}">Photo Gallery</a>
                    
					 <a class="collapse-item @if($conName[3] == 'photosettings') active @endif" href="{{ route('admin.general_setting.photosettings') }}">Photo Settings</a>
                </div>
            </div>
        </li>
        <!-- Video Gallery -->
        
		<li class="nav-item @if($conName[1] == 'video-gallery' || $conName[3] == 'videosettings') active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVideo" aria-expanded="true" aria-controls="collapseVideo">
                <i class="fas fa-camera"></i>
                <span>Video Gallery</span>
            </a>
            <div id="collapseVideo" class="collapse @if($conName[1] == 'video-gallery' ) show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.video.index') }}">Video Gallery</a>
                    
					 <a class="collapse-item @if($conName[3] == 'videosettings') active @endif" href="{{ route('admin.general_setting.videosettings') }}">Settings</a>
                </div>
            </div>
        </li>

        <!-- Product Section -->
        <li class="nav-item @if($conName[1] == 'product' || $conName[1] == 'shipping' || $conName[1] == 'coupon') active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">
                <i class="fas fa-shopping-cart"></i>
                <span>Product Section</span>
            </a>
            <div id="collapseProduct" class="collapse @if($conName[1] == 'product' || $conName[1] == 'shipping' || $conName[1] == 'coupon') show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.product.index') }}">Product</a>
                    <a class="collapse-item" href="{{ route('admin.productcategory.index') }}">Category</a>
					<a class="collapse-item" href="{{ route('admin.productsubcategory.index') }}">Sub Category</a>
                    <a class="collapse-item" href="{{ route('admin.shipping.index') }}">Shipping</a>
                    <a class="collapse-item" href="{{ route('admin.coupon.index') }}">coupon</a>
					 <a class="collapse-item @if($conName[3] == 'shopsettings') active @endif" href="{{ route('admin.general_setting.shopsettings') }}">Shop Settings</a>
                </div>
            </div>
        </li>

        <!-- Order -->
        <li class="nav-item @if($conName[1] == 'order') active @endif">
            <a class="nav-link" href="{{ route('admin.order.index') }}">
                <i class="fas fa-bookmark"></i>
                <span>Order Section</span>
            </a>
        </li>

        <!-- Customer -->
        <li class="nav-item @if($conName[1] == 'customer') active @endif">
            <a class="nav-link" href="{{ route('admin.customer.index') }}">
                <i class="fas fa-users"></i>
                <span>Customer Section</span>
            </a>
        </li>

        <!-- Why Choose Us -->
        <li class="nav-item @if($conName[1] == 'why-choose') active @endif">
            <a class="nav-link" href="{{ route('admin.why_choose.index') }}">
                <i class="fas fa-arrows-alt"></i>
                <span>Why Choose Us</span>
            </a>
        </li>

        <!-- Services -->
       
		 <li class="nav-item @if($conName[1] == 'service') active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseService" aria-expanded="true" aria-controls="collapseService">
                 <i class="fas fa-certificate"></i>
                <span>Service</span>
            </a>
            <div id="collapseService" class="collapse @if($conName[1] == 'service') show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.service.index') }}">Service</a>
                    <a class="collapse-item" href="{{ route('admin.servicecategory.index') }}">Category</a>
					<a class="collapse-item" href="{{ route('admin.servicesubcategory.index') }}">Sub Category</a>
                   <a class="collapse-item @if($conName[3] == 'servicesettings') active @endif" href="{{ route('admin.general_setting.servicesettings') }}">Service Settings</a>
                </div>
            </div>
        </li>

        <!-- Services -->
        <li class="nav-item @if($conName[1] == 'testimonial') active @endif">
            <a class="nav-link" href="{{ route('admin.testimonial.index') }}">
                <i class="fas fa-award"></i>
                <span>Testimonial</span>
            </a>
        </li>

        <!-- Team Members -->
        <li class="nav-item @if($conName[1] == 'team-member') active @endif">
            <a class="nav-link" href="{{ route('admin.team_member.index') }}">
                <i class="fas fa-user-plus"></i>
                <span>Team Member</span>
            </a>
        </li>

        <!-- FAQ -->
        <li class="nav-item @if($conName[1] == 'faq') active @endif">
            <a class="nav-link" href="{{ route('admin.faq.index') }}">
                <i class="fas fa-question-circle"></i>
                <span>FAQ</span>
            </a>
        </li>

        <!-- Email Template -->
        <li class="nav-item @if($conName[1] == 'email-template') active @endif">
            <a class="nav-link" href="{{ route('admin.email_template.index') }}">
                <i class="fas fa-envelope"></i>
                <span>Email Template</span>
            </a>
        </li>

        <!-- Subscriber -->
        <li class="nav-item @if($conName[1] == 'subscriber') active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubscriber" aria-expanded="true" aria-controls="collapseSubscriber">
                <i class="fas fa-share-alt-square"></i>
                <span>Subscriber Section</span>
            </a>
            <div id="collapseSubscriber" class="collapse @if($conName[1] == 'subscriber') show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.subscriber.index') }}">All Subscribers</a>
                    <a class="collapse-item" href="{{ route('admin.subscriber.send_email') }}">Send Email to Subscribers</a>
					 <a class="collapse-item" href="{{ route('admin.subscribercategory.index') }}">Category</a>
					<a class="collapse-item" href="{{ route('admin.subscribersubcategory.index') }}">Sub Category</a>
                </div>
            </div>
        </li>

        <!-- Social Media -->
        <li class="nav-item @if($conName[1] == 'social-media') active @endif">
            <a class="nav-link" href="{{ route('admin.social_media.index') }}">
                <i class="fas fa-basketball-ball"></i>
                <span>Social Media</span>
            </a>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="btn btn-info btn-sm mt-3" href="{{ url('/') }}" target="_blank">
                            Visit Website
                        </a>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ session('name') }}</span>
                            <img class="img-profile rounded-circle" src="{{ asset('public/uploads/'.session('photo')) }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('admin.profile_change') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Change Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('admin.password_change') }}">
                                <i class="fas fa-unlock-alt fa-sm fa-fw mr-2 text-gray-400"></i> Change Password
                            </a>
                            <a class="dropdown-item" href="{{ route('admin.photo_change') }}">
                                <i class="fas fa-image fa-sm fa-fw mr-2 text-gray-400"></i> Change Photo
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">

                @yield('admin_content')

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@include('admin.includes.scripts-footer')
<div id="cdn-browser-modal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="height: 100%;">
            <div id="cdn-browser" class="cdn-browser d-flex flex-column" >
                <div class="files-nav flex-shrink-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-left d-flex align-items-center">
                            <div class="filter-item">
                               
                            </div>
                            
                           
                        </div>
                        <div class="col-right">
                            <i class="fa-spin fa fa-spinner icon-loading active" ></i>
                            <button class="btn btn-success btn-pick-files">
                                <span><i class="fa fa-upload"></i> {{__("Upload")}}</span>
                                <input multiple type="file" id="files" name="files[]" ref="files">
                            </button>
                        </div>
                    </div>
                </div>
               
                <div class="files-list">
					<div class="my-list">
                   <p class="no-files-text text-center"  >{{__("No file found")}}</p>
                    </div>
                    
                     
                </div>
               <div style="display:none;" class="browser-actions justify-content-between flex-shrink-0" v-if="selected.length">
						<div style="float: left;" class="col-left" v-show="selected.length">
							<div class="control-remove" v-if="selected && selected.length">
								
							</div>
							<div class="control-info" v-if="selected && selected.length">
								
							</div>
						</div>
						<div style="float: right;" class="col-right" v-show="selected.length">
							<button class="btn btn-primary usefile" imgsrc="">{{__("Use file")}}</button>
						</div>
						<div class="clearfix"></div>
					</div>
            </div>
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function($){
	$('#openUploader').on('click', function(){
		$('#cdn-browser-modal').modal('show');
		$('#cdn-browser').addClass('is_loading');
		$.ajax({
			 url:'https://aideascent.com/admin/photo-gallery/getlist',
             type:'get',
			 data:{page:1},
			success:function(res){
					$('#cdn-browser').removeClass('is_loading');
				$('.my-list').html(res);
			}
		});
	});
	
	$(document).delegate('#cdn-browser-modal nav a', 'click', function(e){
		e.preventDefault();
		v = $(this).attr('href');
		$('#cdn-browser').addClass('is_loading');
		$.ajax({
			 url:v,
             type:'get',
			success:function(res){
				$('#cdn-browser').removeClass('is_loading');
				$('.my-list').html(res);
			}
		});
	});
	$(document).delegate('.file-item', 'click', function(){
		 if ( $(this).find('.inner').hasClass('active') ) {
			$(this).find('.inner').removeClass('active');
			 $(this).find('.file-checked-status').hide();
			 $('.browser-actions').hide();
			 	$('.usefile').attr('imgsrc', '');
			 	$('.usefile').attr('vfileid', '');
			 	$('.usefile').attr('vfile_name', '');
    } else {
        $('.file-item .inner.active').removeClass('active');
		$('.file-checked-status').hide();	
		$('.browser-actions').hide();
			$('.usefile').attr('imgsrc', '');
			$('.usefile').attr('vfileid', '');
			$('.usefile').attr('vfile_name', '');
        $(this).find('.inner').addClass('active');
        $(this).find('.file-checked-status').show();
		$('.browser-actions').show();
		var v = $(this).find('.file-thumb img').attr('src');
		var vf = $(this).find('.file-thumb img').attr('vfileid');
		var vs = $(this).find('.file-thumb img').attr('vfile_name');
		$('.usefile').attr('imgsrc', v);
		$('.usefile').attr('vfileid', vf);
		$('.usefile').attr('vfile_name', vs);
    }
		
			
	});
	
	$(document).delegate('.usefile', 'click', function(){
		$('.upload-box').hide();
		$('.dungdt-upload-box').addClass('active');
		
		$('.attach-demo').html('<img src="'+$(this).attr('imgsrc')+'">');
		$('#fileid').val($(this).attr('vfileid'));
		$('#file_name').val($(this).attr('vfile_name'));
		$('#cdn-browser-modal').modal('hide');
	});
	$(document).delegate('.delete', 'click', function(){
		$('.upload-box').show();
		$('.dungdt-upload-box').removeClass('active');
			$('#fileid').val('');
		$('#file_name').val('');
		$('.attach-demo').html('');
	});
	
	$('#files').change(function(){
   var files = $('#files')[0].files;
   var error = '';
   var form_data = new FormData();

   for(var count = 0; count<files.length; count++)
   {
      var name = files[count].name;
      var extension = name.split('.').pop().toLowerCase();

      if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
      {
          error += "Invalid " + count + " Image File"
      }
      else
     {
        form_data.append("files[]", files[count]);
     }
   }
   if(error == '')
   {
	    $('#cdn-browser').addClass('is_loading');
       $.ajax({
           url:'https://aideascent.com/admin/photo-gallery/uploadlist',
		   headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
          method:"POST",
          data:form_data,
          contentType:false,
          cache:false,
          processData:false,
         
         success:function(data)
         {
             $('#cdn-browser').removeClass('is_loading');
				$('.my-list').html(data);
         }
     })
  }
  else
  {
      alert(error);
  }
});

//Change Status Start
		$(document).on('click', '.change-status', function(){
			var id = $.trim($(this).attr('data-id'));
			var current_status = $.trim($(this).attr('data-status'));
			var table = $.trim($(this).attr('data-table'));
			
			if(id != "" && current_status != "" && table != ""){
				updateStatus(id, current_status, table);
			}
		});
	//Change Status End
	
	//Update Status Start
	function updateStatus( id, current_status, table ) {
		$(".server-error").html(''); //remove server error.	
		$(".custom-error-msg").html(''); //remove custom error.
		$.ajax({
			type:'post',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url:'https://aideascent.com/admin/photo-gallery/update_action',
			data:{'id': id, 'current_status' : current_status, 'table': table},
			success:function(resp) {
				var obj = $.parseJSON(resp);
				if(obj.status == 1) {
					//show success msg 
						var html = successMessage(obj.message);
						$(".custom-error-msg").html(html);
					
					//change status
						if(current_status == 1){
							var updated_status = 0;
						} else {
							var updated_status = 1;
						}
					
						$(".change-status[data-id="+id+"]").attr('data-status', updated_status);
					
				} else{
					var html = errorMessage(obj.message);
					$(".custom-error-msg").html(html);
					
					//not change status
						if(current_status == 1){
							$(".change-status[data-id="+id+"]").prop('checked', true);
						} else {
							$(".change-status[data-id="+id+"]").prop('checked', false);
						}
				}
				$("#loader").hide();
			},
			beforeSend: function() {
				$("#loader").show();
			}
		});
		$('html, body').animate({scrollTop:0}, 'slow');
	}
	
	//General Function Start
	function successMessage(msg){
		var html = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
		html +=	'<button type="button" class="close" data-dismiss="alert" aria-label="Close">☓</button>';
		html += '<strong>'+msg+'</strong>';
		html += '</div>';
		
		return html;
	}
	function errorMessage(msg){
		var html = '<div class="alert alert-danger alert-dismissible fade show">';
		html += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">☓</button>'+msg;	
		html += '</div>';
		
		return html;	
	}	
//General Function End
});


</script>
@yield('scripts')
</body>
</html>
