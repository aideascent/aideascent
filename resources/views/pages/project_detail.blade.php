@extends('layouts.app')

@section('content')
    <div class="page-banner" style="background-image: url({{ asset('public/uploads/'.$g_setting->banner_project_detail) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $project_detail->project_name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('front.projects') }}">Projects</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $project_detail->project_name }}</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="page-banner header-banner">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $project_detail->project_name }}</h1>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="single-section single-project">

                        <div class="text mt_20">
                            <h2>Project Details</h2>
                            <p>
                                <img src="{{ asset('public/uploads/'.$project_detail->project_featured_photo) }}" class="featured-photo">
                            </p>
                            <p>
                                {!!  $project_detail->project_content !!}
                            </p>

                            <h2 class="mt_30">Project Photos</h2>
                            <div class="project-photo-carousel owl-carousel">

                                @foreach ($project_photos as $row)
                                <div class="p-item">
                                    <div class="p-item-bg"></div>
                                    <a href="{{ asset('public/uploads/'.$row->project_photo) }}" class="magnific" title="{{ $row->project_photo_caption }}">
                                        <img src="{{ asset('public/uploads/'.$row->project_photo) }}" alt="Project Photo">
                                        <div class="plus-icon">
                                            <i class="fa fa-search-plus"></i>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>

                            <h2 class="mt_30">Project Video</h2>
                            <div class="iframe-container">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $project_detail->project_video }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">

                        <div class="widget">
                            <h3>Project Information</h3>
                            <div class="project-detail">
                                <div class="item">
                                    <h4>Client Name:</h4>
                                    <p>{{ $project_detail->project_client_name }}</p>
                                </div>
                                <div class="item">
                                    <h4>Client Company Name:</h4>
                                    <p>{{ $project_detail->project_client_company }}</p>
                                </div>
                                <div class="item">
                                    <h4>Project Start Date:</h4>
                                    <p>{{ $project_detail->project_start_date }}</p>
                                </div>
                                <div class="item">
                                    <h4>Project End Date:</h4>
                                    <p>{{ $project_detail->project_end_date }}</p>
                                </div>
                                <div class="item">
                                    <h4>Client Comment:</h4>
                                    <p>
                                        {!! nl2br(e($project_detail->project_client_comment)) !!}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="widget">
                            <h3>All Projects</h3>
                            <div class="type-2">
                                <ul>
                                    @foreach($project_items as $row)
                                        <li>
                                            <img src="{{ asset('public/uploads/'.$row->project_featured_photo) }}">
                                            <a href="{{ url('project/'.$row->project_slug) }}">{{ $row->project_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
