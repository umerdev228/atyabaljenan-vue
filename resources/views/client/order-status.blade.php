@extends('mainpages.mainfront')
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-left-to-right.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-review-order.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-checkout-page.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-order-delivery.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-order-place-code.css') }}">
    @endsection
@section('content')
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ltr-product-details">

                        <div class="row">

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-ltr">

                                <div class="row">

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-review">

                                        <div class="row">

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 order-map">
                                                <i style="color: {{ setting()['button_color'] }}">
                                                    <svg style="color: red !important;width: 150px;" height="150" viewBox="0 0 60 60" width="512" xmlns="http://www.w3.org/2000/svg"><g id="Page-1" fill="red" fill-rule="evenodd"><g id="064---Computer" fill="{{ setting()['button_color'] }}" fill-rule="nonzero"><path id="Shape" d="m56 0h-52c-2.209139 0-4 1.790861-4 4v4c0 .55228475.44771525 1 1 1s1-.44771525 1-1v-4c0-1.1045695.8954305-2 2-2h52c1.1045695 0 2 .8954305 2 2v35h-56v-26c0-.5522847-.44771525-1-1-1s-1 .4477153-1 1v32c0 2.209139 1.790861 4 4 4h15.9c-.5389789.9403318-1.2608437 1.7631829-2.123 2.42-1.7467611 1.3238647-2.7741424 3.3882464-2.777 5.58v1c0 1.1045695.8954305 2 2 2h26c1.1045695 0 2-.8954305 2-2v-1c-.0030899-2.1909119-1.0300523-4.2544551-2.776-5.578-.8624616-.6575798-1.584636-1.4810762-2.124-2.422h15.9c2.209139 0 4-1.790861 4-4v-41c0-2.209139-1.790861-4-4-4zm-14.981 53.02c1.2546043.9370488 1.9897942 2.4141089 1.981 3.98l.000078 1h-26.0001532l.0000752-1c-.0086394-1.5668738.727326-3.0447428 1.983-3.982 1.3754242-1.0480944 2.4589633-2.4315263 3.147-4.018h15.74c.6892715 1.5868539 1.7733623 2.9707997 3.149 4.02zm14.981-6.02h-52c-1.1045695 0-2-.8954305-2-2v-4h56v4c0 1.1045695-.8954305 2-2 2z"/><path id="Shape" d="m32 43h-4c-.5522847 0-1 .4477153-1 1s.4477153 1 1 1h4c.5522847 0 1-.4477153 1-1s-.4477153-1-1-1z"/><circle id="Oval" cx="6" cy="6" r="1"/><circle id="Oval" cx="10" cy="6" r="1"/><circle id="Oval" cx="14" cy="6" r="1"/><path id="Shape" d="m20 36c3.868559.0011202 7.5356134-1.7249623 10-4.707 3.4958554 4.2206222 9.2631283 5.7955898 14.4189651 3.9376329 5.1558367-1.857957 8.5927502-6.7497445 8.5927502-12.2301329s-3.4369135-10.3721759-8.5927502-12.2301329c-5.1558368-1.8579569-10.9231097-.2829893-14.4189651 3.9376329-3.850506-4.6492667-10.3949091-6.03613287-15.8002595-3.3483335-5.4053503 2.6877993-8.24921885 8.7429642-6.86599826 14.6190835s6.62953306 10.0268803 12.66625776 10.02125zm20-24c6.0751322 0 11 4.9248678 11 11s-4.9248678 11-11 11-11-4.9248678-11-11c.0071635-6.0721626 4.9278374-10.9928365 11-11zm-20 0c3.4706714-.0018423 6.7362549 1.6435665 8.8 4.434-2.4000274 4.0494335-2.4000274 9.0855665 0 13.135-3.094971 4.146022-8.6620916 5.5727717-13.3696858 3.4264024-4.7075941-2.1463693-7.28137377-7.2848619-6.18104529-12.3403165 1.10032849-5.0554546 5.57691959-8.6594217 10.75073109-8.6550859z"/><path id="Shape" d="m17 26.5c0-.5522847-.4477153-1-1-1s-1 .4477153-1 1c.0965423 2.2415987 1.7783513 4.0953727 4 4.409v.091c0 .5522847.4477153 1 1 1s1-.4477153 1-1v-.091c2.2216487-.3136273 3.9034577-2.1674013 4-4.409-.0965423-2.2415987-1.7783513-4.0953727-4-4.409v-4.937c1.1128409.2524624 1.9267959 1.2072317 2 2.346 0 .5522847.4477153 1 1 1s1-.4477153 1-1c-.0965423-2.2415987-1.7783513-4.0953727-4-4.409v-.091c0-.5522847-.4477153-1-1-1s-1 .4477153-1 1v.091c-2.2216487.3136273-3.9034577 2.1674013-4 4.409.0965423 2.2415987 1.7783513 4.0953727 4 4.409v4.937c-1.1128409-.2524624-1.9267959-1.2072317-2-2.346zm6 0c-.0732041 1.1387683-.8871591 2.0935376-2 2.346v-4.692c1.1128409.2524624 1.9267959 1.2072317 2 2.346zm-6-7c.0732041-1.1387683.8871591-2.0935376 2-2.346v4.692c-1.1128409-.2524624-1.9267959-1.2072317-2-2.346z"/><path id="Shape" d="m32.293 25.707 4 4c.3904999.3903819 1.0235001.3903819 1.414 0l10-10c.3789722-.3923789.3735524-1.0160848-.0121814-1.4018186s-1.0094397-.3911536-1.4018186-.0121814l-9.293 9.293-3.293-3.293c-.3923789-.3789722-1.0160848-.3735524-1.4018186.0121814s-.3911536 1.0094397-.0121814 1.4018186z"/></g></g></svg>
                                                    </i>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 order-contact order-payment">
                                                <h1>@lang('messages.thank_you')</h1>
                                                <p>@lang('messages.your_order_is_placed_successfully')</p>
                                                <h3>
                                                    Invoice Number
                                                    <span class="order-code" style="color: {{ setting()['button_color'] }} !important;font-weight: bolder;"> #{{$invoice_number}}</span>
                                                </h3>
                                                <div class="row contact-row">


                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-order-address product-payment">

                                                        <h2>@lang('messages.estimated_time')
                                                            <span>{{ areaminutes() }} </span>
                                                        </h2>
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 steppers">
                                                            <div class="row">
                                                                <div class="stepper0"></div>
                                                                <div class="stepper0"></div>
                                                                <div class="stepper1"></div>
                                                                <div class="stepper1"></div>
                                                            </div>
                                                        </div>
                                                        @if(isset($order->desc))
                                                        <p class="order-progress">{{$order->desc}}</p>
                                                        @else
{{--                                                            <p class="order-progress">Thanks for Ordering</p>--}}
                                                            <p class="order-progress">@lang('messages.confirming_your_order')</p>

                                                        @endif
                                                        <div class="order-buttons">
                                                        <a href="{{ url('client/view-receipt/'.$order->id) }}">
                                                            <button class="product-price-btn btn-receipt">
                                                                @lang('messages.view_receipt')
                                                            </button>
                                                        </a>
{{--                                                            <button class="product-price-btn btn-help">--}}
{{--                                                                @lang('messages.get_help')--}}
{{--                                                            </button>--}}
                                                        </div>


{{--                                                        <buttton type="button" class="order-btn">--}}
{{--                                                            <a href="#" style="color: black">--}}
{{--                                                                <span class="item-content">Create Account</span>--}}
{{--                                                            </a>--}}
{{--                                                        </buttton>--}}

                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

{{--                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 product-oder-btn btn-next">--}}

{{--                                        <buttton type="button" class="order-btn">--}}
{{--                                            <a href="order-delivery-payment.html" >--}}
{{--                                                <span class="item-content">Next</span>--}}
{{--                                            </a>--}}
{{--                                        </buttton>--}}

{{--                                    </div>--}}

                                </div>
                            </div>
                        </div>
                    </div>
@endsection
@section('scripts')

    <script src="{{ asset('js/intlTelInput.js') }}"></script>




    <script>
        $(document).ready(function (e) {







        })

    </script>
    @foreach($order->products as $product)
    <script>

        toastr.success('{{ $order->customer->name }}, {{ $order->area->name }}','Bought {{ productnamebyid($product->id) }}')
    </script>
    @endforeach
@endsection
