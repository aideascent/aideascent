@php
$g_setting = DB::table('general_settings')->where('id', 1)->first();
$s_media = DB::table('social_media_items')->orderBy('social_order', 'asc')->get();
$footer_col_1 = DB::table('footer_columns')->orderBy('column_item_order', 'asc')->where('column_name', 'Column 1')->get();
$footer_col_2 = DB::table('footer_columns')->orderBy('column_item_order', 'asc')->where('column_name', 'Column 2')->get();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @php
    $url = Request::path();
    $conName = explode('/',$url);
    if(!isset($conName[1]))
    {
        $conName[1] = '';
    }
    if(!isset($conName[2]))
    {
        $conName[2] = '';
    }
    if(!isset($conName[3]))
    {
        $conName[3] = '';
    }
    @endphp

    @if($conName[0] == '')
        @php
            $item_row = DB::table('page_home_items')->where('id',1)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'about')
        @php
            $item_row = DB::table('page_about_items')->where('id',1)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'services')
        @php
            $item_row = DB::table('page_service_items')->where('id',1)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'service')
        @php
            $item_row = DB::table('services')->where('slug',$conName[1])->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'shop')
        @php
            $item_row = DB::table('page_shop_items')->where('id',1)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'cart')
        @php
            $item_row = DB::table('page_other_items')->where('id',2)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'checkout')
        @php
            $item_row = DB::table('page_other_items')->where('id',3)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'product')
        @php
            $item_row = DB::table('products')->where('product_slug',$conName[1])->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'category')
        @php
            $item_row = DB::table('categories')->where('category_slug',$conName[1])->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'blog' && $conName[1]=='')
        @php
            $item_row = DB::table('page_blog_items')->where('id',1)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'blog' && $conName[1]!='')
        @php
            $item_row = DB::table('blogs')->where('blog_slug',$conName[1])->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'career')
        @php
            $item_row = DB::table('page_career_items')->where('id',1)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'job' && $conName[2] == '')
        @php
            $item_row = DB::table('jobs')->where('job_slug',$conName[1])->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'job' && $conName[2] != '')
        @php
            $item_row = DB::table('jobs')->where('job_slug',$conName[2])->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'projects')
        @php
            $item_row = DB::table('page_project_items')->where('id',1)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'project')
        @php
            $item_row = DB::table('projects')->where('project_slug',$conName[1])->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'photo-gallery')
        @php
            $item_row = DB::table('page_photo_gallery_items')->where('id',1)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'video-gallery')
        @php
            $item_row = DB::table('page_video_gallery_items')->where('id',1)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'faq')
        @php
            $item_row = DB::table('page_faq_items')->where('id',1)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'team-members')
        @php
            $item_row = DB::table('page_team_items')->where('id',1)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'team-member')
        @php
            $item_row = DB::table('team_members')->where('slug',$conName[1])->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'contact')
        @php
            $item_row = DB::table('page_contact_items')->where('id',1)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'terms-and-conditions')
        @php
            $item_row = DB::table('page_term_items')->where('id',1)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'privacy-policy')
        @php
            $item_row = DB::table('page_privacy_items')->where('id',1)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'page')
        @php
            $item_row = DB::table('dynamic_pages')->where('dynamic_page_slug',$conName[1])->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'customer' && $conName[1] == 'payment')
        @php
            $item_row = DB::table('page_other_items')->where('id',8)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'customer' && $conName[1] == 'login')
        @php
            $item_row = DB::table('page_other_items')->where('id',4)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'customer' && $conName[1] == 'register')
        @php
            $item_row = DB::table('page_other_items')->where('id',5)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'customer' && $conName[1] == 'forget-password')
        @php
            $item_row = DB::table('page_other_items')->where('id',6)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'customer' && ($conName[1] == 'dashboard' || $conName[1] == 'order' || $conName[1] == 'profile-change' || $conName[1] == 'password-change') )
        @php
            $item_row = DB::table('page_other_items')->where('id',7)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif

    @if($conName[0] == 'search')
        @php
            $item_row = DB::table('page_other_items')->where('id',1)->first();
        @endphp
        <meta name="description" content="{{ @$item_row->seo_meta_description }}">
        <title>{{ @$item_row->seo_title }}</title>
    @endif


    @include('layouts.styles')

    <!-- Favicon -->
    <link href="{{ asset('public/uploads/'.$g_setting->favicon) }}" rel="shortcut icon" type="image/png">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700&display=swap" rel="stylesheet">

    @include('layouts.scripts')

    <style>
        .top,
        .main-nav nav .navbar-nav .nav-item .dropdown-menu,
        .video-button:before,
        .video-button:after,
        .special .read-more a,
        .service .read-more a,
        .testimonial-bg,
        .project .read-more a,
        .team-text,
        .cta .overlay,
        .blog-area .blog-image .date,
        .blog-area .read-more a,
        .newsletter-area .overlay,
        .footer-social-link ul li a,
        .scroll-top,
        .single-section .read-more a,
        .sidebar .widget .search button,
        .comment button,
        .contact-item:hover .contact-icon,
        .product-item .text button,
        .btn-arf,
        .project-photo-carousel .owl-nav .owl-prev,
        .project-photo-carousel .owl-nav .owl-next,
        .faq h4.panel-title a,
        .team-social li a:hover,
        .doc_detail_social li i,
        .nav-doctor .nav-link.active,
        .product-detail button,
        .product-detail .nav-pills .nav-link.active,
        .contact-form .btn,
        .career-sidebar .widget button {
            background: #{{ $g_setting->theme_color }}!important;
        }
        .main-nav nav .navbar-nav .nav-item a:hover,
        .main-nav nav .navbar-nav .nav-item:hover a,
        .service .service-item .text h3 a:hover,
        .project .project-item .text h3 a:hover,
        .blog-area .blog-item h3 a:hover,
        .footer-item ul li a:hover,
        .sidebar .widget .type-2 ul li a:hover,
        .sidebar .widget .type-1 ul li:before,
        .sidebar .widget .type-1 ul li a:hover,
        .single-section h3,
        .contact-icon,
        .product-item .text h3 a:hover,
        .career-main-item h3,
        .reg-login-form .new-user a,
        .product-detail .nav-pills .nav-link {
            color: #{{ $g_setting->theme_color }}!important;
        }
        .text-animated li a:hover,
        .feature .feature-item {
            background-color: #{{ $g_setting->theme_color }}!important;
        }
        .text-animated li a:hover,
        .special .read-more a,
        .footer-social-link ul li a,
        .contact-item:hover .contact-icon,
        .faq h4.panel-title,
        .team-social li a:hover,
        .contact-form .btn {
            border-color: #{{ $g_setting->theme_color }}!important;
        }



        .main-nav nav .navbar-nav .nav-item .dropdown-menu li a,
        .contact-item:hover .contact-icon,
        .product-detail .nav-pills .nav-link.active {
            color: #fff!important;
        }
        .feature .feature-item:hover,
        .service .read-more a:hover,
        .project .read-more a:hover,
        .blog-area .read-more a:hover,
        .single-section .read-more a:hover,
        .comment button:hover,
        .doc_detail_social li:hover i,
        .product-detail button:hover,
        .contact-form .btn:hover {
            background: #333!important;
        }
        .footer-social-link ul li a:hover {
            background: transparent!important;
        }
        .special .read-more a:hover {
            background: transparent!important;
            border-color: #fff!important;
        }
		
		.header-banner{clear: both;position: relative;max-width: 1110px;margin: 0 auto;    padding: 0px 15px;}
.header-banner .bg-page{background: #{{ $g_setting->theme_color }};opacity:1;}
.header-banner .text{padding-top: 8px;padding-bottom: 8px;text-align: left;} 
 .header-banner .text h1{color: #fff;font-size: 20px;font-weight: 700;margin: 0!important;}
 .page-banner{display:none;}
 .header-banner{display:block;}
 /* .mean-container .mean-bar{float: none; position: static; height: auto;} */
 @media(max-width:991px){
	  .header-banner.videobanner{margin: 0px;margin-bottom: 5px;}
	 .header-banner{margin: 0px 15px;}
	 
	
 }
 .owl-nav{text-align: center;}
 .owl-nav div.owl-prev, .owl-nav div.owl-next{color: #fff;font-size: 26px;}
 .owl-carousel.common-carousel .owl-nav div.owl-prev {
    float: left;
    margin-left: -20px;
    transition: .5s;
}.owl-carousel.common-carousel .owl-nav div.owl-next {
    float: right;
    margin-right: -20px;
    transition: .5s;
}
 .scroll-top {
    cursor: pointer;
    text-align: center;
    font-size: 22px;
    position: fixed;
    width: 50px;
    height: 50px;
    line-height: 46px;
    bottom: 10px;
    left: 20px;
    background: #3867D6;
    color: #fff;
    opacity: 0.7;
    z-index: 9999;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
}
.read-more a, .btn, button, a{border-radius: 0px!important;}
.service-item .text, .blog-item .blog-text{min-height: 240px;}
.product-item .text	h3{min-height: 50px;}
.service-item .read-more, .blog-item  .read-more{text-align: center;display: block;}
.contentlink a{border: 0;padding: 10px 30px;display: inline-block;color: #fff;text-transform: uppercase;font-weight: 600;}
.contentlink a{background: #B71312!important;}
.u-inlineList {
  display: inline;
}

.u-inlineList-item {
  display: inline;
  list-style: none;
}

/* .u-inlineList-item:after {
  content: ", ";
}

.u-inlineList-item:last-child:after {
  content: "";
} */
.page-content ul.u-inlineList li{padding-left:2px;background-image:none;}
.product-item .productbtn button, .product-item .productbtn a{width: auto;padding: 10px 14px!important;font-size: 13px!important;}
.viewbtn{background: #B71312!important;}
.blogwidget{padding: 20px;
    background: #f1f5f9;
    margin-bottom: 30px;}
.topsearchbar button{background: #B71312!important;border: 0;width: 36px;}
.topsearchbar button i{color: #fff;}
.search-content{padding-top: 20px; padding-bottom: 20px;}
.page-link{color: #b71312;}
.page-link:hover{color: #b71312;}
.page-item.active .page-link {
    background-color: #b71312;
    border-color: #b71312;
}
.service .service-item .photo img , .product-item .photo img, .blog-area .blog-image img{height: auto;}
    </style>

{!! $g_setting->header_code !!}
</head>
<body> 
{!! $g_setting->body_code !!}
@if($g_setting->preloader_status == 'Show')
<div id="preloader">
    <div id="status" style="background-image: url({{ asset('public/uploads/'.$g_setting->preloader_photo) }})"></div>
</div>
@endif

<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="top-contact">
                    <ul>
                        <li>
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <span>{{ $g_setting->top_bar_email }}</span>
                        </li>
                        <li>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>{{ $g_setting->top_bar_phone }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="top-right">
                    <div class="top-social">
                        <ul>
                            @foreach($s_media as $row)
                                <li><a href="{{ $row->social_url }}" target="_blank"><i class="{{ $row->social_icon }}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="top-profile">
                        <ul>

                            @if(!session()->get('customer_id'))
                            <li class="login_top_menu">
                                <a href="{{ route('customer.login') }}">Login</a>
                            </li>
                            <li class="registration_top_menu">
                                <a href="{{ route('customer.registration') }}">Registration</a>
                            </li>
                            @endif

                            @if(session()->get('customer_id'))
                            <li class="registration_top_menu">
                                <a href="{{ route('customer.dashboard') }}">Dashboard</a>
                            </li>
                            @endif

                            <li class="cart">
                                <a href="{{ route('front.cart') }}">Cart </a>
                                @if(session()->get('cart_product_id'))
                                <div class="number number_cart">{{ count(session()->get('cart_product_id')) }}</div>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.nav')

@yield('content')

<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item footer-service">
                    <h2>{{ $g_setting->footer_column1_heading }}</h2>
                    <ul class="fmain">
                        @foreach($footer_col_1 as $row)
                            <li><a href="{{ $row->column_item_url }}">{{ $row->column_item_text }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item footer-service">
                    <h2>{{ $g_setting->footer_column2_heading }}</h2>
                    <ul class="fmain">
                        @foreach($footer_col_2 as $row)
                            <li><a href="{{ $row->column_item_url }}">{{ $row->column_item_text }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item footer-contact">
                    <h2>{{ $g_setting->footer_column3_heading }}</h2>
                    <ul>
                        <li>{{ $g_setting->footer_address }}</li>
                        <li>{{ $g_setting->footer_email }}</li>
                        <li>{{ $g_setting->footer_phone }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item footer-service">
                    <h2>{{ $g_setting->footer_column4_heading }}</h2>
                    <div class="footer-social-link">
                        <ul>
                            @foreach($s_media as $row)
                                <li><a href="{{ $row->social_url }}" target="_blank"><i class="{{ $row->social_icon }}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer-end">
            <div class="col-md-6">
                <div class="copyright">
                    <p>{{ $g_setting->footer_copyright }}</p>
                </div>
            </div>
            <div class="col-md-6">
			
                <div class="footer-pages">
                    <ul>
                        <li><a href="{{ route('front.term') }}">Terms and Conditions</a></li>
                        <li><a href="{{ route('front.privacy') }}">Privacy Policy</a></li> 
                        <li><a href="{{ url('page/earnings-disclaimer') }}">Earnings Disclaimer</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="scroll-top">
    <i class="fa fa-angle-up"></i>
</div>

@include('layouts.scripts_footer')

</body>
</html>
