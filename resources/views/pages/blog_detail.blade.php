@extends('layouts.app')

@section('content')
<div class="search-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12 topsearchbar">
				<form action="{{ url('academy') }}" method="get">
					<div class="search input-group md-form form-sm form-2 pl-0">
						<input name="s" value="{{Request::get('s')}}" class="form-control my-0 py-1 red-border" type="text" placeholder="Search Academy ...">
						<div class="input-group-append">
							<button type="submit">
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
    <div class="page-banner" style="background-image: url({{ asset('public/uploads/'.$g_setting->banner_blog_detail) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $blog_detail->blog_title }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('front.blogs') }}">Blogs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $blog_detail->blog_title }}</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="page-banner header-banner">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $blog_detail->blog_title }}</h1>
        </div>
    </div> 
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="single-section">
                        <div class="featured-photo">
                            @if($blog_detail->blog_photo != '')
                        <img src="{{ asset('public/uploads/'.$blog_detail->blog_photo) }}">
					@else
						<img src="{{ asset('public/uploads/'.$g_setting->logo) }}">
					@endif
                        </div>
						@if(isset($general_setting) && $general_setting->after_feature_image != '')
						<div class="blogwidget">
							<div class="type-1">
							{!! $general_setting->after_feature_image !!}
							</div>
						</div>
						@endif
                        <div class="text contentlink">
                            <h2>{{ $blog_detail->blog_title }}</h2>
							@if(isset($general_setting) && $general_setting->after_title != '')
						<div class="blogwidget">
							<div class="type-1">
							{!! $general_setting->after_title !!}
							</div>
						</div>
						@endif
                            <!--<h3>
                                Posted on: {{-- \Carbon\Carbon::parse($blog_detail->created_at)->format('d M, Y') --}}
                            </h3>-->
                            {!!  $blog_detail->blog_content !!}
                        </div>
					@if(isset($general_setting) && $general_setting->before_share_this != '')
						<div class="blogwidget">
							<div class="type-1">
							{!! $general_setting->before_share_this !!}
							</div>
						</div>
						@endif
                        <h2 class="mt_35">Share This</h2>
                        <div class="sharethis-inline-share-buttons"></div>
@if(isset($general_setting) && $general_setting->after_share_this != '')
						<div class="blogwidget">
							<div class="type-1">
							{!! $general_setting->after_share_this !!}
							</div>
						</div>
						@endif
						 
							<?php
							if($blog_detail->tags != ''){
								?>
								<h2 class="mt_35">Tags</h2>
								<div class="blogtags">
									<ul class="u-inlineList">
										<?php
										$tags = explode(',', $blog_detail->tags);
										foreach($tags as $tag){
											?>
											<li class="u-inlineList-item"><a href="{{URL::to('/academy?tag=')}}{{$tag}}" style="color:#dc3545!important"><?php echo $tag; ?></a></li>
											<?php
										}
										?>
									</ul>
								</div>
								<?php
							}
							?>
						
                        <!-- Comment Section Started -->
                        <hr class="mt_50">
                        <div class="comment mt_50">

                            <h2 class="mb_40">Comments ({{ count($comments) }})</h2>

                            @if(count($comments) == 0)
                                <div class="text-danger">No Comment Found</div>
                            @else
                                @foreach($comments as $row)
                                    <div class="comment-item">
                                        <div class="text">
                                            <h4>{{ $loop->iteration . '. ' . $row->person_name }}</h4>
                                            <div class="date">{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</div>
                                            <div class="des">
                                                <p>
                                                    {!! nl2br(e($row->person_message)) !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
@if(isset($general_setting) && $general_setting->after_comments != '')
						<div class="blogwidget">
							<div class="type-1">
							{!! $general_setting->after_comments !!}
							</div>
						</div>
						@endif
                            <hr class="mt_50">

                            <h2 class="mt_35">Post Your Comment</h2>
                            <form action="{{ route('front.comment') }}" method="post">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{ $blog_detail->id }}">
                                <input type="hidden" name="blog_slug" value="{{ $blog_detail->blog_slug }}">
                                <input type="hidden" name="comment_status" value="Pending">
                                <div class="row mb_20">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Name" name="person_name">
                                    </div>
                                    <div class="col">
                                        <input type="email" class="form-control" placeholder="Email Address" name="person_email">
                                    </div>
                                </div>
                                <div class="row mb_20">
                                    <div class="col">
                                        <textarea name="person_message" class="form-control h-200" cols="30" rows="10" placeholder="Comment"></textarea>
                                    </div>
                                </div>
								@if($g_setting->google_recaptcha_status == 'Show')
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Post Comment</button>
                                    </div>
                                </div>
                            </form>
@if(isset($general_setting) && $general_setting->after_post_comment != '')
						<div class="blogwidget">
							<div class="type-1">
							{!! $general_setting->after_post_comment !!}
							</div>
						</div>
						@endif
                        </div>
                        <!-- Comment Section End -->



                    </div>
                </div>
                <div class="col-md-4">
                    @include('layouts.sidebar_blog')
                </div>
            </div>
        </div>
    </div>
@endsection
