@extends('layouts.app')

@section('content')
<style>
.read-more a{background: #B71312!important;border: 0;padding: 10px 30px;
    display: inline-block;
    color: #fff;font-weight: 600;
    text-transform: uppercase;}
</style>
<div class="page-banner header-banner">
        <div class="bg-page"></div>
        <div class="text">
            <h1>Page not found - 404</h1>
        </div>
    </div>
	<div class="page-content">
		 <div class="container">
			<div class="row">
                <div class="col-md-12">
                    <p>The page your looking for is not available</p>
                </div>
				 <div class="col-md-12">
					 <div class="read-more">
						<a href="{{URL::to('/')}}">Back to Home</a>
					</div>
                </div>
            </div>
		 </div>
	</div>
@endsection