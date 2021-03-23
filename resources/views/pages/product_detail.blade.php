@extends('layouts.app')

@section('content')
    <div class="page-banner" style="background-image: url({{ asset('public/uploads/'.$g_setting->banner_product_detail) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $product_detail->product_name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('front.shop') }}">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product_detail->product_name }}</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="page-banner header-banner">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $product_detail->product_name }}</h1>
        </div>
    </div> 
    <div class="page-content">
        <div class="container">
            <div class="row product-detail pt_30 pb_40">
                <div class="col-md-5">
                    <div class="photo"><img src="{{ asset('public/uploads/'.$product_detail->product_featured_photo)  }}"></div>
                </div>
                <div class="col-md-7">
                    <form action="{{ route('front.add_to_cart') }}" method="post">
                        @csrf
                        <h2>{{ $product_detail->product_name }}</h2>
                        <p class="contentlink">
                            <a href="javascript:void(0);" class="">Stock Available: {{ $product_detail->product_stock }}</a>
                        </p>
                        <p>
                            {!! nl2br(e($product_detail->product_content_short)) !!}
                        </p>

                        <h2 class="mt_30">Product Price</h2>
                        <div class="price">
                            ${{ $product_detail->product_current_price }}
                            @if($product_detail->product_old_price != '')
                            <del>${{ $product_detail->product_old_price }}</del>
                            @endif
                        </div>

                        <h2 class="mt_30">Quantity</h2>
                        <div class="qty">
                            <input type="number" class="form-control" name="product_qty" step="1" min="1" max="" value="1" pattern="[0-9]*" inputmode="numeric">
                        </div>
                        <input type="hidden" name="product_id" value="{{ $product_detail->id }}">

                    
                        <button type="submit" name="btncode" value="cart" class="btn btn-primary mt_30">Add To Cart</button>
						<button type="submit" name="btncode" value="buy" class="btn btn-primary mt_30">Buy Now</button>
                       
                    </form>
                </div>
            </div>

            <div class="row product-detail pt_30 pb_40">
                <div class="col-md-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Return Policy</a>
                        </li>
						<?php 
						if($product_detail->additionaltab != ''){
							$i =0;
						$addi = unserialize($product_detail->additionaltab); 
						foreach($addi as $key => $l){
							//print_r($l);
						?>
						 <li class="nav-item">
                            <a class="nav-link" id="pills-{{$i}}-tab" data-toggle="pill" href="#pills-{{$i}}" role="tab" aria-controls="pills-{{$i}}" aria-selected="false"><?php echo base64_decode(@$l['name']); ?></a>
                        </li>
							<?php $i++; }} ?>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            {!! $product_detail->product_content !!}
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            {!! $product_detail->product_return_policy !!}
                        </div>
						<?php 
						if($product_detail->additionaltab != ''){
							$is =0;
						$addi = unserialize($product_detail->additionaltab); 
						foreach($addi as $key => $l){
							//print_r($l);
							$des = base64_decode(@$l['description']); 
						?>
						<div class="tab-pane fade" id="pills-{{$is}}" role="tabpanel" aria-labelledby="pills-{{$is}}-tab">
                            {!! $des !!}
                        </div>
							<?php $is++; }} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
