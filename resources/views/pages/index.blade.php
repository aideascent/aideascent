@extends('layouts.app')

@section('content')
<div class="hero-area hero-bg" id="particles-js" style="background-image: url({{ asset('public/uploads/'.$page_home->banner_bg) }});">
   <div class="container">
      <div class="hero-txt home-3">
         <div class="row">
           <div class="col-12">

              <div class="slider-table">
					<div class="slider-text">
						<div class="text-animated">
							<h1>{{ $page_home->banner_title }}</h1>
						</div>
						<div class="text-animated">
							<p>
								{{ $page_home->banner_subtitle }}
							</p>
						</div>
						<div class="text-animated">
							<ul>
								<li><a href="{{ $page_home->banner_button_url }}">{{ $page_home->banner_button_text }}</a></li>
							</ul>
						</div>
					</div>
				</div>
           </div>
         </div>
      </div>
   </div>
   <div class="hero-area-overlay"></div>
</div>
<!--    introduction area start   -->
  <div class="intro-section">
     <div class="container">
        <div class="hero-features">
           <div class="row">
		    @foreach (\App\Models\Admin\Feature::all() as $key => $feature)
              <div class="col-md-3 col-sm-6 single-hero-feature">
                   <div class="outer-container">
                      <div class="inner-container">
                         <div class="icon-wrapper">
                            <i class="{{$feature->icon}}"></i>
                         </div>
                         <h3>{{$feature->title}}</h3>
                      </div>
                   </div>
                </div>
				@endforeach
				
           </div>
        </div>
        <div class="row">
           <div class="col-lg-6 pr-0">
              <div class="intro-txt">
                 <span class="section-title">{{ $page_home->intro_title }}</span>
                 <h2 class="section-summary">{{ $page_home->intro_subtitle }}</h2>
                 <a href="{{ $page_home->intro_button_url }}" class="intro-btn" target="_blank"><span>{{ $page_home->intro_button_text }}</span></a>
              </div>
           </div>
           <div class="col-lg-6 pl-lg-0 px-md-3 px-0">
              <div class="intro-bg" style="background-image: url({{ asset('public/uploads/'.$page_home->intro_bg) }});">
                <a id="" class="video-button" href="{{ $page_home->intro_video_url }}">
                  <span></span>
                </a>
              </div>
           </div>
        </div>
     </div>
  </div>
  <!--   how we do section start   -->
  <div class="approach-section">
     <div class="container">
        <div class="row">
           <div class="col-lg-6">
              <div class="approach-summary">
                {!! $page_home->left_vision_description !!}
              </div>
           </div>
           <div class="col-lg-6">
              {!! $page_home->right_vision_description !!}
           </div>
        </div>
     </div>
  </div>
  <!--   how we do section end   -->
  <!--    introduction area end   -->
<?php /*<div class="slider">
    <div class="slide-carousel owl-carousel">

        @foreach($sliders as $row)
        <div class="slider-item" style="background-image:url({{ asset('public/uploads/'.$row->slider_photo) }});">
            <div class="slider-bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <div class="slider-table">
                            <div class="slider-text">
                                <div class="text-animated">
                                    <h1>{{ $row->slider_heading }}</h1>
                                </div>
                                <div class="text-animated">
                                    <p>
                                        {!! nl2br(e($row->slider_text)) !!}
                                    </p>
                                </div>
                                <div class="text-animated">
                                    <ul>
                                        <li><a href="{{ $row->slider_button_url }}">{{ $row->slider_button_text }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div> */ ?>


@if($page_home->why_choose_status == 'Show')
<div class="feature">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->why_choose_title }}</h2>
                    <h3>{{ $page_home->why_choose_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($why_choose_items as $row)
            <div class="col-md-4">
                <div class="feature-item wow fadeInUp">
                    <div class="icon">
                        <img src="{{ asset('public/uploads/'.$row->photo) }}" alt="">
                    </div>
                    <h4>{{ $row->name }}</h4>
                    <p>
                        {!! nl2br(e($row->description)) !!}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif


@if($page_home->special_status == 'Show')
<div class="special" style="background-image: url({{ asset('public/uploads/'.$page_home->special_bg) }});">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow fadeInLeft">
                <h2>{{ $page_home->special_title }}</h2>
                <h3>{{ $page_home->special_subtitle }}</h3>
                <p>
                    {!! nl2br(e($page_home->special_content)) !!}
                </p>
                <div class="read-more">
                    <a href="{{ $page_home->special_btn_url }}" class="btn btn-primary btn-arf">{{ $page_home->special_btn_text }}</a>
                </div>
            </div>
            <div class="col-md-6 wow fadeInRight">
                <div class="video-section" style="background-image: url({{ asset('public/uploads/'.$page_home->special_video_bg) }})">
                    <div class="bg video-section-bg"></div>
                    <div class="video-button-container">
                        <a class="video-button" href="https://www.youtube.com/watch?v={{ $page_home->special_yt_video }}"><span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($page_home->service_status == 'Show')
<div class="service">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->service_title }}</h2>
                    <h3>{{ $page_home->service_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="service-carousel owl-carousel">
                    @foreach($services as $row)
                    <div class="service-item myblog-item wow fadeInUp">
                        <div class="photo">
                            <a href="{{ url('service/'.$row->slug) }}"><img src="{{ asset('public/uploads/'.$row->photo) }}" alt=""></a>
                        </div>
                        <div class="text">
                            <h3><a href="{{ url('service/'.$row->slug) }}">{{ $row->name }}</a></h3>
                            <p>
							{{ @$row->short_description == "" ? '' : \Illuminate\Support\Str::limit(@$row->short_description, '100', '...') }}
                                
                            </p>
                            <div class="read-more">
                                <a href="{{ url('service/'.$row->slug) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($page_home->testimonial_status == 'Show')
<div class="testimonial" style="background-image: url({{ asset('public/uploads/'.$page_home->testimonial_bg) }});">
    <div class="testimonial-bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->testimonial_title }}</h2>
                    <h3>{{ $page_home->testimonial_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-carousel owl-carousel">
                    @foreach($testimonials as $row)
                    <div class="testimonial-item wow fadeInUp">
                        <div class="photo">
                            <img src="{{ asset('public/uploads/'.$row->photo) }}" alt="">
                        </div>
                        <div class="text">
                            <p>
                                {!! nl2br(e($row->comment)) !!}
                            </p>
                            <h3>{{ $row->name }}</h3>
                            <h4>{{ $row->designation }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($page_home->project_status == 'Show')
<div class="project">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->project_title }}</h2>
                    <h3>{{ $page_home->project_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="project-carousel owl-carousel">
                    @foreach($projects as $row)
                    <div class="project-item wow fadeInUp">
                        <div class="photo">
                            <a href="{{ url('project/'.$row->project_slug) }}"><img src="{{ asset('public/uploads/'.$row->project_featured_photo) }}" alt=""></a>
                        </div>
                        <div class="text">
                            <h3><a href="{{ url('project/'.$row->project_slug) }}">{{ $row->project_name }}</a></h3>
                            <p>
                                {!! nl2br(e($row->project_content_short)) !!}
                            </p>
                            <div class="read-more">
                                <a href="{{ url('project/'.$row->project_slug) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($page_home->team_member_status == 'Show')
<div class="team bg-lightblue">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->team_member_title }}</h2>
                    <h3>{{ $page_home->team_member_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="team-carousel owl-carousel">

                    @foreach($team_members as $row)
                    <div class="team-item wow fadeInUp">
                        <div class="team-photo">
                            <a href="{{ url('team-member/'.$row->slug) }}" class="team-photo-anchor">
                                <img src="{{ asset('public/uploads/'.$row->photo) }}" alt="Team Member Photo">
                            </a>
                        </div>
                        <div class="team-text">
                            <h4><a href="{{ url('team-member/'.$row->slug) }}">{{ $row->name }}</a></h4>
                            <p>{{ $row->designation }}</p>
                        </div>
                    </div>
                    @endforeach
                                        
                </div>
            </div>
        </div>
    </div>
</div>
@endif



@if($page_home->appointment_status == 'Show')
<div class="cta" style="background-image: url({{ asset('public/uploads/'.$page_home->appointment_bg) }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="cta-box text-center">
                    <h2>{{ $page_home->appointment_title }}</h2>
                    <p class="mt-3">
                        {!! nl2br(e($page_home->appointment_text)) !!}
                    </p>
                    <a href="{{ $page_home->appointment_btn_url }}" class="btn btn-primary">{{ $page_home->appointment_btn_text }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif



@if($page_home->latest_blog_status == 'Show')
<div class="blog-area">
    <div class="container wow fadeIn">

        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->latest_blog_title }}</h2>
                    <h3>{{ $page_home->latest_blog_subtitle }}</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="blog-carousel owl-carousel">

                    @foreach($blogs as $row)
					<?php
									$category = \App\Models\Admin\Category::where('id', $row->category_id)->first();
									$subcategory = \App\Models\Admin\Category::where('id', $row->subcategory_id)->first();
									?>
                    <div class="blog-item myblog-item wow fadeInUp">
                        <a href="{{ url('academy/'.@$category->category_slug.'/'.@$subcategory->category_slug.'/'.$row->blog_slug) }}">
                            <div class="blog-image">
                                <img src="{{ asset('public/uploads/'.$row->blog_photo) }}" alt="Blog Image">
                                <div class="date">
                                    <h3>03</h3>
                                    <h4>Apr</h4>
                                </div>
                            </div>
                        </a>
                        <div class="blog-text">
                            <h3><a href="{{ url('academy/'.@$category->category_slug.'/'.@$subcategory->category_slug.'/'.$row->blog_slug) }}">{{ $row->blog_title }}</a></h3>
                            <p>
                                {{ @$row->blog_content_short == "" ? '' : \Illuminate\Support\Str::limit(@$row->blog_content_short, '100', '...') }}
                            </p>
                            <div class="read-more">
                                <a href="{{ url('academy/'.@$category->category_slug.'/'.@$subcategory->category_slug.'/'.$row->blog_slug) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!--   partner section start    -->
  <div class="partner-section">
     <div class="container top-border">
        <div class="row">
           <div class="col-md-12">
              <div class="mypartner-carousel owl-carousel owl-theme common-carousel">
                 @foreach (\App\Models\Admin\Partner::all() as $key => $partner)
                   <a class="single-partner-item d-block" href="{{$partner->partner_link}}" target="_blank">
                      <div class="outer-container">
                         <div class="inner-container">
                            <img src="{{asset('public/uploads/'.$partner->partner_img)}}" alt="">
                         </div>
                      </div>
                   </a>
                 @endforeach
              </div>
           </div>
        </div>
     </div>
  </div>
  <!--   partner section end    -->

@if($page_home->newsletter_status == 'Show')
<div class="newsletter-area" style="background-image: url({{ asset('public/uploads/'.$page_home->newsletter_bg) }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 newsletter">
                <div class="newsletter-text wow fadeInUp">
                    <h2>{{ $page_home->newsletter_title }}</h2>
                    <p>
                        {!! nl2br(e($page_home->newsletter_text)) !!}
                    </p>
                </div>
                <div class="newsletter-button wow fadeInUp">
                    <form action="{{ route('front.subscription') }}" method="post" class="frm_newsletter justify-content-center">
                        @csrf
                        <input type="text" placeholder="Enter Your Email" name="subs_email">
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection