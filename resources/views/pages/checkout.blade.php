@extends('layouts.app')

@section('content')
    <div class="page-banner" style="background-image: url({{ asset('public/uploads/'.$g_setting->banner_checkout) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>Checkout</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="page-banner header-banner">
        <div class="bg-page"></div>
        <div class="text">
            <h1>Checkout</h1>
        </div>
    </div> 
    <div class="page-content pt_50 pb_60">
        <div class="container">
            <div class="row cart">
                <div class="col-md-12 faq">
                    
                    
                    <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading1">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                        Have a coupon?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <form action="{{ route('front.coupon_update') }}" method="post">
                                            @csrf
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left pr-1">
                                                            <input type="text" class="form-control" placeholder="Coupon Code" name="coupon_code">
                                                        </td>
                                                        <td class="text-left">
                                                            <button type="submit" class="btn btn-primary btn-block">Apply Coupon</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading2">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                        Shipping Information
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" class="text-left table-top-bottom-no-border">
                                                        <form action="{{ route('front.shipping_update') }}" method="post">
                                                            @csrf
                                                            @php $i=0;  @endphp
                                                            @foreach($shipping_data as $row)
                                                                @php $i++;  @endphp
                                                                @if( !session()->get('shipping_id') )
                                                                    @if($i==1)
                                                                        @php $chk='checked'; @endphp
                                                                    @else
                                                                        @php $chk=''; @endphp
                                                                    @endif
                                                                @else
                                                                    @if(session()->get('shipping_id') == $row->id)
                                                                    
                                                                        @php $chk='checked'; @endphp
                                                                    
                                                                    @else
                                                                        @php $chk=''; @endphp
                                                                    @endif
                                                                @endif

                                                                <div class="shipping-checkbox-container">
                                                                    <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="shipping_id" id="shipping_radio_{{ $i }}" value="{{ $row->id }}" {{ $chk }}>
                                                                        <label class="form-check-label" for="shipping_radio_{{ $i }}">
                                                                            <div class="heading">
                                                                                {{ $row->shipping_name }}
                                                                                ($<span class="shipping_price">{{ $row->shipping_cost }})</span>
                                                                            </div>
                                                                            <div class="subheading">({!! nl2br(e($row->shipping_text)) !!})</div>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            @endforeach
                                                            <input type="submit" class="btn btn-primary" value="Apply Shipping">
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        



                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading3">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        Cart Details
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                @php
                                                    $arr_cart_product_id = array();
                                                    $arr_cart_product_qty = array();
                                                @endphp
                                                
                                                @php $i=0; @endphp
                                                @foreach(session()->get('cart_product_id') as $value)
                                                    @php 
                                                        $arr_cart_product_id[$i] = $value;
                                                        $i++;
                                                    @endphp
                                                @endforeach
                    
                                                @php $i=0; @endphp
                                                @foreach(session()->get('cart_product_qty') as $value)
                                                    @php
                                                        $arr_cart_product_qty[$i] = $value;
                                                        $i++;
                                                    @endphp
                                                @endforeach
                    
                                                @php $tot1 = 0; @endphp
                                                
                                                @for($i=0;$i<count($arr_cart_product_id);$i++)
                
                                                    @php
                                                        $product_detail = DB::table('products')->where('id', $arr_cart_product_id[$i])->first();
                                                        $product_name = $product_detail->product_name;
                                                        $product_slug = $product_detail->product_slug;
                                                        $product_current_price = $product_detail->product_current_price;
                                                        $product_featured_photo = $product_detail->product_featured_photo;
                                                    @endphp
                
                                                    <tr>
                                                        <td class="text-left">
                                                            {{ $product_name }} x {{ $arr_cart_product_qty[$i] }}
                                                        </td>
                                                        <td class="text-right">
                                                            @php $subtotal = $product_current_price * $arr_cart_product_qty[$i] @endphp
                                                            ${{ $subtotal }}
                                                        </td>
                                                    </tr>
                                                    
                                                    @php
                                                        $tot1 = $tot1+$subtotal; 
                                                    @endphp
                                                    
                                                @endfor
                
                                                @php 
                                                    session()->put('subtotal', $tot1);
                                                @endphp
                                                
                                                <tr>
                                                    <td class="text-left">Subtotal </td>
                                                    <td class="text-right">
                                                        $<span class="subtotal_price">{{ session()->get('subtotal') }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        Coupon <span class="font-weight-bold">@if(session()->get('coupon_code')) {{ '('.session()->get('coupon_code').')' }} @endif</span>
                                                    </td>
                                                    <td class="text-right">
                                                        @if(session()->get('coupon_amount'))
                                                            (-) $<span class="coupon_amount">{{ session()->get('coupon_amount') }}</span>
                                                        @else
                                                            @php session()->put('coupon_amount', 0); @endphp
                                                            (-) $<span class="coupon_amount">{{ session()->get('coupon_amount') }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                
                                                @if(session()->get('shipping_id'))
                                                <tr>
                                                    @php
                                                        $shipping_info = DB::table('shippings')->where('id', session()->get('shipping_id'))->first();
                                                    @endphp
                
                                                    <td class="text-left">
                                                        Shipping Information <br>(<span class="font-weight-bold">{{ $shipping_info->shipping_name }} - {{ $shipping_info->shipping_text }}</span>)
                                                    </td>
                                                    <td class="text-right">
                                                        (+) $<span class="">{{ session()->get('shipping_cost') }}</span>
                                                    </td>
                                                </tr>
                                                @endif
                    
                                                <tr>
                                                    <td class="text-left">Total </td>
                                                    <td class="text-right">
                                                        
                                                        @if(!session()->get('coupon_amount'))
                                                            @php session()->put('coupon_amount', 0) @endphp
                                                        @endif
                                                        
                                                        @if(session()->get('shipping_cost'))
                                                            @php 
                                                                $final_price = (session()->get('subtotal') + session()->get('shipping_cost'))-session()->get('coupon_amount'); 
                                                            @endphp
                                                        @else
                                                            @php
                                                                $final_price =session()->get('subtotal') - session()->get('coupon_amount');
                                                            @endphp
                                                        @endif
                                                       
                                                        $<span class="total_price">{{ $final_price }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                    
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div><!-- //panel-group -->


                    @if(!session()->get('customer_id'))
                    <form action="{{ route('customer.login_from_checkout_page.store') }}" method="post">
                        @csrf
                        <div class="customer-info mb_30">                       
                            <div class="form-check mt_10 mb_10">
                                <input class="form-check-input" type="checkbox" id="returning_customer_action">
                                <label class="form-check-label" for="returning_customer_action">
                                    Returning Customer? Click here to login                            
                                </label>
                            </div>
                            <div class="returning-customer-login-section d_n">
                                <h4>Login</h4>
                                <div class="row mb_10">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Email Address" name="customer_email">
                                    </div>
                                    <div class="col">
                                        <input type="password" class="form-control" placeholder="Password" name="customer_password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                    @endif

                    @if(session()->get('customer_id'))
                    <div class="existing-customer-container">
                        <h4>Existing Customer</h4>
                        <div class="row mb_30">
                            <div class="col">
                                <input type="text" class="form-control first_field" value="{{ session()->get('customer_name') }}" disabled>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control second_field" value="{{ session()->get('customer_email') }}" disabled>
                            </div>
                        </div>      
                    </div>
                    @endif

                    @php $temp_var = '';  @endphp
                    <form action="{{ route('customer.billing_shipping_submit') }}" method="post">
                        @csrf
                        <h4>Billing Information</h4>
                        <div class="row mb_10">
                            <div class="col">
                                @if(session()->get('billing_name'))
                                @php $temp_var = session()->get('billing_name') @endphp
                                @elseif(session()->get('customer_id'))
                                @php $temp_var = session()->get('customer_name') @endphp
                                @endif
                                <input type="text" class="form-control" placeholder="Full Name" name="billing_name" value="{{ $temp_var }}">
                            </div>
                            <div class="col">
                                @if(session()->get('billing_email'))
                                @php $temp_var = session()->get('billing_email') @endphp
                                @elseif(session()->get('customer_id'))
                                @php $temp_var = session()->get('customer_email') @endphp
                                @endif
                                <input type="text" class="form-control" placeholder="Email Address" name="billing_email" value="{{ $temp_var }}">
                            </div>
                        </div>
                        <div class="row mb_10">
                            <div class="col">
                                @if(session()->get('billing_phone'))
                                @php $temp_var = session()->get('billing_phone') @endphp
                                @elseif(session()->get('customer_id'))
                                @php $temp_var = session()->get('customer_phone') @endphp
                                @endif
                                <input type="text" class="form-control" placeholder="Phone Number" name="billing_phone" value="{{ $temp_var }}">
                            </div>
                            <div class="col">
                                @if(session()->get('billing_country'))
                                @php $temp_var = session()->get('billing_country') @endphp
                                @elseif(session()->get('customer_id'))
                                @php $temp_var = session()->get('customer_country') @endphp
                                @endif
                                <input type="text" class="form-control" placeholder="Country Name" name="billing_country" value="{{ $temp_var }}">
                            </div>
                        </div>
                        <div class="row mb_10">
                            <div class="col">
                                @if(session()->get('billing_address'))
                                @php $temp_var = session()->get('billing_address') @endphp
                                @elseif(session()->get('customer_id'))
                                @php $temp_var = session()->get('customer_address') @endphp
                                @endif
                                <input type="text" class="form-control" placeholder="Address" name="billing_address" value="{{ $temp_var }}">
                            </div>
                            <div class="col">
                                @if(session()->get('billing_state'))
                                @php $temp_var = session()->get('billing_state') @endphp
                                @elseif(session()->get('customer_id'))
                                @php $temp_var = session()->get('customer_state') @endphp
                                @endif
                                <input type="text" class="form-control" placeholder="State" name="billing_state" value="{{ $temp_var }}">
                            </div>
                        </div>
                        <div class="row mb_10">
                            <div class="col">
                                @if(session()->get('billing_city'))
                                @php $temp_var = session()->get('billing_city') @endphp
                                @elseif(session()->get('customer_id'))
                                @php $temp_var = session()->get('customer_city') @endphp
                                @endif
                                <input type="text" class="form-control" placeholder="City" name="billing_city" value="{{ $temp_var }}">
                            </div>
                            <div class="col">
                                @if(session()->get('billing_zip'))
                                @php $temp_var = session()->get('billing_zip') @endphp
                                @elseif(session()->get('customer_id'))
                                @php $temp_var = session()->get('customer_zip') @endphp
                                @endif
                                <input type="text" class="form-control" placeholder="Zip Code" name="billing_zip" value="{{ $temp_var }}">
                            </div>
                        </div>
                        <div class="form-check mt_30 mb_10">
                            <input class="form-check-input" type="checkbox" id="click_shipping_same_check" name="name_click_shipping_same_check" @if(session()->get('name_click_shipping_same_check')) checked  @endif>
                            <label class="form-check-label" for="click_shipping_same_check">
                                Ship to a different address?
                            </label>
                        </div>


                        <div class="shipping-info mt_15 @if(session()->get('name_click_shipping_same_check')) d_b @else d_n @endif">
                            <h4>Shipping Information</h4>
                            <div class="row mb_10">
                                <div class="col">
                                    @if(session()->get('shipping_name'))
                                    @php $temp_var = session()->get('shipping_name') @endphp
                                    @elseif(session()->get('customer_id'))
                                    @php $temp_var = session()->get('customer_name') @endphp
                                    @endif
                                    <input type="text" class="form-control" placeholder="Full Name" name="shipping_name" value="{{ $temp_var }}">
                                </div>
                                <div class="col">
                                    @if(session()->get('shipping_email'))
                                    @php $temp_var = session()->get('shipping_email') @endphp
                                    @elseif(session()->get('customer_id'))
                                    @php $temp_var = session()->get('customer_email') @endphp
                                    @endif
                                    <input type="text" class="form-control" placeholder="Email Address" name="shipping_email" value="{{ $temp_var }}">
                                </div>
                            </div>
                            <div class="row mb_10">
                                <div class="col">
                                    @if(session()->get('shipping_phone'))
                                    @php $temp_var = session()->get('shipping_phone') @endphp
                                    @elseif(session()->get('customer_id'))
                                    @php $temp_var = session()->get('customer_phone') @endphp
                                    @endif
                                    <input type="text" class="form-control" placeholder="Phone Number" name="shipping_phone" value="{{ $temp_var }}">
                                </div>
                                <div class="col">
                                    @if(session()->get('shipping_country'))
                                    @php $temp_var = session()->get('shipping_country') @endphp
                                    @elseif(session()->get('customer_id'))
                                    @php $temp_var = session()->get('customer_country') @endphp
                                    @endif
                                    <input type="text" class="form-control" placeholder="Country Name" name="shipping_country" value="{{ $temp_var }}">
                                </div>
                            </div>
                            <div class="row mb_10">
                                <div class="col">
                                    @if(session()->get('shipping_address'))
                                    @php $temp_var = session()->get('shipping_address') @endphp
                                    @elseif(session()->get('customer_id'))
                                    @php $temp_var = session()->get('customer_address') @endphp
                                    @endif
                                    <input type="text" class="form-control" placeholder="Address" name="shipping_address" value="{{ $temp_var }}">
                                </div>
                                <div class="col">
                                    @if(session()->get('shipping_state'))
                                    @php $temp_var = session()->get('shipping_state') @endphp
                                    @elseif(session()->get('customer_id'))
                                    @php $temp_var = session()->get('customer_state') @endphp
                                    @endif
                                    <input type="text" class="form-control" placeholder="State" name="shipping_state" value="{{ $temp_var }}">
                                </div>
                            </div>
                            <div class="row mb_10">
                                <div class="col">
                                    @if(session()->get('shipping_city'))
                                    @php $temp_var = session()->get('shipping_city') @endphp
                                    @elseif(session()->get('customer_id'))
                                    @php $temp_var = session()->get('customer_city') @endphp
                                    @endif
                                    <input type="text" class="form-control" placeholder="City" name="shipping_city" value="{{ $temp_var }}">
                                </div>
                                <div class="col">
                                    @if(session()->get('shipping_zip'))
                                    @php $temp_var = session()->get('shipping_zip') @endphp
                                    @elseif(session()->get('customer_id'))
                                    @php $temp_var = session()->get('customer_zip') @endphp
                                    @endif
                                    <input type="text" class="form-control" placeholder="Zip Code" name="shipping_zip" value="{{ $temp_var }}">
                                </div>
                            </div>
                        </div>

                        <div class="row mb_10">
                            <div class="col">
                                @if(session()->get('order_note'))
                                @php $temp_var = session()->get('order_note') @endphp
                                @else
                                @php $temp_var = '' @endphp
                                @endif
                                <textarea name="order_note" class="form-control h-100" cols="30" rows="10" placeholder="Order Notes">{{ $temp_var }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Continue to Payment</button>
                    </form>





                </div>
            </div>
        </div>
    </div>

    <script>
        (function($) {
            
            "use strict";
            
            $(document).ready(function() {
                $("#click_shipping_same_check").on('change',function(e) {
                    e.preventDefault();
                    if($(this).prop("checked") == true){
                        $('.shipping-info').attr('class','shipping-info mt_15 d_b');
                    } else {
                        $('.shipping-info').attr('class','shipping-info mt_15 d_n');
                    }
                });
        
                $("#returning_customer_action").on('change',function(e) {
                    e.preventDefault();
                    if($(this).prop("checked") == true){
                        $('.returning-customer-login-section').attr('class','returning-customer-login-section d_b');
                    } else {
                        $('.returning-customer-login-section').attr('class','returning-customer-login-section d_n');
                    }
                });
                
                $("#coupon_parent").on('change',function(e) {
                    e.preventDefault();
                    if($(this).prop("checked") == true){
                        $('.coupon_child').attr('class','coupon_child d_b');
                    } else {
                        $('.coupon_child').attr('class','coupon_child d_n');
                    }
                });
            });
        
        })(jQuery);
        </script>
@endsection