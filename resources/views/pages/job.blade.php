@extends('layouts.app')

@section('content')
    <div class="page-banner" style="background-image: url({{ asset('public/uploads/'.$g_setting->banner_job) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>Job Title: {{ $job_detail->job_title }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $job_detail->job_title }}</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="page-banner header-banner">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $job_detail->job_title }}</h1>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="career-detail">
                        <div class="item">
                            <h3>Job Title:</h3>
                            <p>
                                {{ $job_detail->job_title }}
                            </p>
                        </div>
                        <div class="item">
                            <h3>Job Responsibilities:</h3>
                            {!! $job_detail->job_responsibility !!}
                        </div>

                        <div class="item">
                            <h3>Educational Qualification:</h3>
                            {!! $job_detail->job_education !!}
                        </div>
                        <div class="item">
                            <h3>Experience Requirements:</h3>
                            {!! $job_detail->job_experience !!}
                        </div>
                        <div class="item">
                            <h3>Additional Requirements:</h3>
                            {!! $job_detail->job_additional_requirement !!}
                        </div>
                        <div class="item">
                            <h3>Compensation & Other Benefits</h3>
                            {!! $job_detail->job_benefit !!}
                        </div>
                        <div class="item">
                            <a href="{{ url('job/apply/'.$job_detail->job_slug) }}" class="btn btn-primary btn-arf">Apply Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="career-sidebar">
                        <div class="widget">
                            <h3>About This Job</h3>
                            <div class="career-detail-sidebar">
                                <div class="item">
                                    <h4>Vacancy</h4>
                                    <p>{{ $job_detail->job_vacancy }}</p>
                                </div>
                                <div class="item">
                                    <h4>Company Name</h4>
                                    <p>{{ $job_detail->job_company_name }}</p>
                                </div>
                                <div class="item">
                                    <h4>Job Location</h4>
                                    <p>{{ $job_detail->job_location }}</p>
                                </div>
                                <div class="item">
                                    <h4>Application Deadline</h4>
                                    <p>{{ $job_detail->job_deadline }}</p>
                                </div>
                                <div class="item">
                                    <h4>Job Type</h4>
                                    <p>{{ $job_detail->job_type }}</p>
                                </div>
                                <div class="item">
                                    <h4>Salary</h4>
                                    <p>{{ $job_detail->job_salary }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
