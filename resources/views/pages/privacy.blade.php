@extends('layouts.app')

@section('content')
    <div class="page-banner" style="background-image: url({{ asset('public/uploads/'.$g_setting->banner_privacy) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $privacy->name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $privacy->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="page-banner header-banner">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $privacy->name }}</h1>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $privacy->detail !!}
                </div>
            </div>
        </div>
    </div>
@endsection
