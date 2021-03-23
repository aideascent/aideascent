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
    <div class="page-banner" style="background-image: url({{ asset('public/uploads/'.$g_setting->banner_blog) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $blog->name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $blog->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="page-banner header-banner">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $blog->name }}</h1>
        </div>
    </div> 
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $blog->detail !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="single-section">
<div class="row">
                        @foreach($blog_items as $row)
						<?php
									$category = \App\Models\Admin\Category::where('id', $row->category_id)->first();
									$subcategory = \App\Models\Admin\Category::where('id', $row->subcategory_id)->first();
									?>
									 <div class="col-lg-4 col-md-6 col-sm-12 commonspacesec">
                            <div class="blog-item">
							@if($row->blog_slug != '')
                                <div class="featured-photo">
                                    <a href="{{ url('academy/'.@$category->category_slug.'/'.@$subcategory->category_slug.'/'.$row->blog_slug) }}">
									
									@if($row->blog_photo != '')
                        <img src="{{ asset('public/uploads/'.$row->blog_photo) }}">
					@else
						<img src="{{ asset('public/uploads/'.$g_setting->logo) }}">
					@endif
									
									</a>
                                </div>
								@endif
                                <div class="text">
                                    <h2><a href="{{ url('academy/'.@$category->category_slug.'/'.@$subcategory->category_slug.'/'.$row->blog_slug) }}">{{ $row->blog_title }}</a></h2>
                                    <p>
                                       {{ @$row->blog_content_short == "" ? '' : \Illuminate\Support\Str::limit(@$row->blog_content_short, '100', '...') }}
                                    </p>
									
                                    <div class="read-more">
                                        <a href="{{ url('academy/'.@$category->category_slug.'/'.@$subcategory->category_slug.'/'.$row->blog_slug) }}">Read More</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        @endforeach

                    </div>
                    </div>
                    <div>
                        {{ $blog_items->links() }}
                    </div>
                </div>
                <div class="col-md-3">
                    @include('layouts.sidebar_blog')
                </div>
            </div>
        </div>
    </div>

@endsection
