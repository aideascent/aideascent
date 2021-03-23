@extends('layouts.app')

@section('content')
<div class="search-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12 topsearchbar">
				<form action="{{ url('shop') }}" method="get">
					<div class="search input-group md-form form-sm form-2 pl-0">
						<input name="s" value="{{Request::get('s')}}" class="form-control my-0 py-1 red-border" type="text" placeholder="Search Product ...">
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
            <h1>{{ $shop->name }}</h1>
        </div>
    </div> 
    <div class="page-content pt_60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $shop->detail !!}
                </div>
            </div>
            <div class="row">
				<div class="col-md-9">
				<div class="row">
                @foreach($products as $row)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-item">
                        <div class="photo"><a href="{{ url('product/'.$row->product_slug) }}"><img src="{{ asset('public/uploads/'.$row->product_featured_photo) }}"></a></div>
                        <div class="text">
                            <h3><a href="{{ url('product/'.$row->product_slug) }}">{{ $row->product_name }}</a></h3>
                            <div class="price">

                                @if($row->product_old_price != '')
                                <del>${{ $row->product_old_price }}</del>
                                @endif

                                ${{ $row->product_current_price }}
                            </div>
                            <div class="cart-button">

                                @if($row->product_stock == 0)
                                <a href="javascript:void(0);" class="stock-empty w-100-p text-center">Stock is empty</a>
                                @else
                                <form action="{{ route('front.add_to_cart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $row->id }}">
                                    <input type="hidden" name="product_qty" value="1">
									<div class="productbtn">
										<a class="viewbtn" href="{{ url('product/'.$row->product_slug) }}">View</a>
										<button name="btncode" value="cart" type="submit">Add to Cart</button>
										<button name="btncode" value="buy" type="submit">Buy Now</button>
									</div>
                                </form>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
				<div class="col-md-12">
                    {{ $products->links() }}
                </div>
				</div>	
				</div>	
                <div class="col-md-3">
                    @include('layouts.sidebar_product')
                </div>
            </div>
        </div>
    </div>
@endsection
