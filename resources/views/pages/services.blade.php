@extends('layouts.app')

@section('content')
<div class="search-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12 topsearchbar">
				<form action="{{ url('services') }}" method="get">
					<div class="search input-group md-form form-sm form-2 pl-0">
						<input name="s" value="{{Request::get('s')}}" class="form-control my-0 py-1 red-border" type="text" placeholder="Search Services ...">
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
<div class="page-banner header-banner">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $service->name }}</h1>
            
        </div>
    </div>  
	
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $service->detail !!}
                </div>
            </div>
            <div class="row service pt_0 pb_0">
			<div class="col-md-9">
				<div class="row">
                @foreach($service_items as $row)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="service-item wow fadeInUp mb_30">
                            <div class="photo">
                                <a href="{{ url('service/'.$row->slug) }}"><img src="{{ asset('public/uploads/'.$row->photo) }}" alt=""></a>
                            </div>
                            <div class="text">
                                <h3><a href="{{ url('service/'.$row->slug) }}">{{ $row->name }}</a></h3>
                                <p>{{ @$row->short_description == "" ? '' : \Illuminate\Support\Str::limit(@$row->short_description, '100', '...') }}</p>
                                <div class="read-more">
                                    <a href="{{ url('service/'.$row->slug) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
				<div class="col-md-12">
                    {{ $service_items->links() }}
                </div>
				</div>
            </div>
             <div class="col-md-3">
                    @include('layouts.sidebar_service')
                </div>
        </div>
    </div>
    </div>
@endsection
