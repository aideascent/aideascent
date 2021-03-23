@extends('layouts.app')

@section('content')
    <div class="page-banner" style="background-image: url({{ asset('public/uploads/'.$g_setting->banner_job_application) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>Apply for: {{ $job_detail->job_title }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('front.career') }}">Career</a></li>
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
                <div class="col-md-12">
                    <div class="career-sidebar">
                        <div class="widget">
                            <h3>Apply In This Job</h3>
                            <div class="type-3">
                                <form action="{{ route('front.apply_form') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <input type="hidden" name="job_id" value="{{ $job_detail->id }}">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>First Name *</label>
                                                <input type="text" class="form-control" name="applicant_first_name" value="{{ old('applicant_first_name') }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Last Name *</label>
                                                <input type="text" class="form-control" name="applicant_last_name" value="{{ old('applicant_last_name') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Email Address *</label>
                                                <input type="email" class="form-control" name="applicant_email" value="{{ old('applicant_email') }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Phone Number *</label>
                                                <input type="text" class="form-control" name="applicant_phone" value="{{ old('applicant_phone') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Country *</label>
                                                <input type="text" class="form-control" name="applicant_country" value="{{ old('applicant_country') }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>State *</label>
                                                <input type="text" class="form-control" name="applicant_state" value="{{ old('applicant_state') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Street *</label>
                                                <input type="text" class="form-control" name="applicant_street" value="{{ old('applicant_street') }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>City *</label>
                                                <input type="text" class="form-control" name="applicant_city" value="{{ old('applicant_city') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Zip Code *</label>
                                                <input type="text" class="form-control" name="applicant_zip_code" value="{{ old('applicant_zip_code') }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Expected Salary *</label>
                                                <input type="text" class="form-control" name="applicant_expected_salary" value="{{ old('applicant_expected_salary') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Cover Letter *</label>
                                        <textarea name="applicant_cover_letter" class="form-control h-300" cols="30" rows="10">{{ old('applicant_cover_letter') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Attach Resume *</label><br>
                                        <input type="file" name="applicant_cv"><br>
                                        <span class="text-danger">(Only doc, docx or pdf are allowed)</span>
                                    </div>

                                    @if($g_setting->google_recaptcha_status == 'Show')
                                        <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">By using this form you agree with the storage and handling of your data by this website.</label>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt_10 button_final" disabled>Submit Application</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#customCheck1").on('change',function() {
            if(this.checked)
            {
                $(".button_final").prop('disabled', false);
            }
            else
            {
                $(".button_final").prop('disabled', true);
            }
        });
    </script>

@endsection
