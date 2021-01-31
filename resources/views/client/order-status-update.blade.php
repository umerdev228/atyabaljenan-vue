@extends('mainpages.mainfront')
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-left-to-right.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-checkout-page.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-order-delivery.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-review-order.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-place-order.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-order-update.css') }}">
@endsection

@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ltr-product-details">

        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-ltr">

                <div class="row">

                    <header class="review-header">
                        <h1>@lang('messages.order_status')</h1>
                        <button type="button" class="btn-back">
                            <a href="{{url('/')}}">
                                <i><svg width="1em" height="1em" viewBox="0 0 32 32"><path fill="currentColor" fill-rule="evenodd" d="M10.414 17l4.293 4.293a1 1 0 01-1.414 1.414l-6-6a1 1 0 010-1.414l6-6a1 1 0 111.414 1.414L10.414 15H24a1 1 0 010 2H10.414z"></path></svg></i>
                            </a>
                        </button>
                    </header>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pr-0 pl-0">
                        <h2 class="stepper-header">@lang('messages.estimated_time')
                            <span>{{ areaminutes() }}</span>
                        </h2>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 steppers">
                            <div class="row">

                                <div class="stepper0"></div>
                                <div class="stepper0"></div>
                                <div class="stepper1"></div>
                                <div class="stepper1"></div>
                            </div>
                        </div>
                        @if($status)
                            <p class="order-progress">{{$status->status}}</p>

                        @else
                            <p class="order-progress">@lang('messages.confirming_your_order')</p>

                        @endif

                    </div>



                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-review">

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 order-contact order-payment">
                                <ul class="delivery-review">
                                    <h3>@lang('messages.delivery_info')</h3>

                                    <li class="delivery-time p-4">
                                        <a  href="#">
                                                            <span>
                                                                <i class="clock">
                                                                    <svg width="1em" height="1em" viewBox="0 0 35 35"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M8 15.786v12.198C8 28.544 8.455 29 9.016 29H15v-7.115h5V29h5.984c.56 0 1.016-.455 1.016-1.016V15.786M4 17.82L16.302 5.315a1.016 1.016 0 011.422-.027L31 17.82"></path></svg>
                                                                </i>
                                                                {{$area->name}}
                                                                <span class="delivery-address">Block: {{$order->block}},  Avenue {{$order->avanue}},  Street:  {{$order->street}}</span>
                                                            </span>

                                        </a>
                                    </li>
                                    <li class="delivery-time p-4">
                                        <a  href="#">
                                                            <span>
                                                                <i class="clock">
                                                                    <svg width="1em" height="1em" viewBox="0 0 35 35"><path d="M29.999 23.968v3.612a2.308 2.308 0 01-.782 1.785c-.524.48-1.14.688-1.849.624a23.589 23.589 0 01-10.413-3.697 23.228 23.228 0 01-7.24-7.226 23.48 23.48 0 01-3.704-10.44 2.308 2.308 0 01.621-1.841A2.318 2.318 0 018.412 6h3.62c1.412-.014 2.216.677 2.413 2.072.154 1.16.435 2.287.845 3.383.363.963.182 1.81-.543 2.541l-1.532 1.53a18.948 18.948 0 007.24 7.225l1.532-1.53c.733-.722 1.581-.903 2.546-.541 1.098.409 2.228.69 3.39.843 1.42.2 2.111 1.015 2.076 2.445zM21 5c2.366.263 4.39 1.237 6.075 2.921C28.759 9.605 29.735 11.631 30 14m-9-4c2.231.435 3.565 1.769 4 4" fill="none" fill-rule="evenodd" stroke="#4A4A4A" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"></path></svg>
                                                                </i>
                                                                {{$customer->name}}
                                                                <span class="delivery-address">{{$customer->phone}}</span>
                                                            </span>

                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 order-contact order-payment">
                                <ul class="delivery-review">
                                    <h3>@lang('messages.order_items')</h3>
                                    <li class="delivery-time">
                                        <div class="row review-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                @foreach($order_items as $order_item)
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price" style="margin-bottom: 5px">
                                                    <span class="price1">{{$order_item->name}}</span>
                                                    <span class="price2">@money($order_item->total)</span>
                                                </div>
                                                @endforeach

{{--                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price">--}}
{{--                                                    <span class="price3">With Cheese</span>--}}
{{--                                                    <span class="price4">KWD 0.35</span>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price">--}}
{{--                                                    <span class="price3">Extra sauce</span>--}}
{{--                                                    <span class="price4">KWD 0.2</span>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price">--}}
{{--                                                    <span class="price3">Kimchi Spicy Sauce</span>--}}
{{--                                                    <span class="price4">KWD 0.2</span>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price">--}}
{{--                                                    <span class="price3">Frozen Curly Fries ( 500 gm )</span>--}}
{{--                                                    <span class="price4">KWD 0.2</span>--}}
{{--                                                </div>--}}

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 order-contact order-payment">
                                <ul class="delivery-review">
                                    <h3>@lang('messages.payment_method')</h3>
                                    <li  class="delivery-time">
                                        <a href="#">
                                            <i class="clock">
                                                <svg width="1.4em" height="1.4em" viewBox="0 0 44 44"><g fill="none" transform="translate(10 14)"><rect width="24" height="16" fill="#0E9347" rx="2"></rect><path fill="#3BB54A" d="M20.6 15H3.4c0-1.4-1.08-2.545-2.4-2.545v-8.91C2.32 3.545 3.4 2.4 3.4 1h17.2c0 1.4 1.08 2.545 2.4 2.545v8.91c-1.32 0-2.4 1.145-2.4 2.545zM12 12a4 4 0 100-8 4 4 0 000 8zM5 9a1 1 0 100-2 1 1 0 000 2zm14 0a1 1 0 100-2 1 1 0 000 2z"></path></g></svg>
                                            </i>
                                            <p>{{$order->payment_type}}</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 order-contact order-payment">
                                <ul class="delivery-review" style="margin-bottom: 53px;">
                                    <li class="delivery-time">
                                        <div class="row review-row">
                                            <div class="col-xl-12 col-lg-12 p-2 col-md-12 col-sm-12 col-12 product-price">
                                                <span class="price3">@lang('messages.sub_total')</span>
                                                <span class="price4">@money($order->subtotal)</span>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 p-2 col-md-12 col-sm-12 col-12 product-price">
                                                <span class="price3">@lang('messages.delivery_charges')</span>
                                                <span class="price4">@money($order->delivery_charges)</span>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 p-2 col-md-12 col-sm-12 col-12 product-price price-total">
                                                <h3>@lang('messages.total')</h3>
                                                <span class="price2">@money($order->total)</span>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                        </div></div>

                        </div>

                    </div>



                </div>

            </div>


        </div>

    </div>

@endsection


@section('js')
@endsection
