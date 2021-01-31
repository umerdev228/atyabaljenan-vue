@extends('mainpages.mainfront')
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-review-order.css') }}">
    <style>
        .add-remove-btn{
            position: absolute;
            width: 150px;
        }
        .add-remove-btn button:first-child{
            height: 40px;
            top: 0px;
            /*position: absolute;*/
            color: rgba(255,82,54,1);
            display: inline-flex;
            cursor: pointer;
            text-align: center;
            background-color: transparent;
            appearance: none;
            border: none;
            font-stretch: normal;
            font-style: normal;
            text-decoration: none;
            user-select: none;
            vertical-align: middle;
            flex-shrink: 0;
            padding: 0;
            touch-action: manipulation;

        }
        .add-remove-btn button:last-child{
            height: 40px;

            top: 0px;
            right: 0px;



            color: rgba(255,82,54,1);
            display: inline-flex;
            cursor: pointer;
            text-align: center;
            background-color: transparent;
            appearance: none;
            border: none;
            font-stretch: normal;
            font-style: normal;
            text-decoration: none;
            user-select: none;
            vertical-align: middle;
            flex-shrink: 0;
            padding: 0;
            touch-action: manipulation;

        }
        .add-remove-btn span{
            font-weight: bolder;
            font-size: 16px;
            position: relative;
            text-align: center;
            margin: 0 auto;

            top: 2px;
            padding: 0px;



        }
        .add-remove-btn button svg{
            height: 41px;
            width: 36px;
        }

    </style>
@endsection
@section('header')
    <header class="review-header">
        <h1>@lang('messages.review_order')</h1>
        <button type="button" class="btn-back">
            <a href="{{ url('/') }}">
                <i><svg width="1em" height="1em" viewBox="0 0 32 32"><path fill="currentColor" fill-rule="evenodd" d="M10.414 17l4.293 4.293a1 1 0 01-1.414 1.414l-6-6a1 1 0 010-1.414l6-6a1 1 0 111.414 1.414L10.414 15H24a1 1 0 010 2H10.414z"></path></svg></i>
            </a>
        </button>
    </header>
@endsection
@section('content')


    <div class="container-fluid">

        <ul class="delivery-review">
            <h3>@lang('messages.delivery_info')</h3>
            <li class="delivery-time">
                <a href="{{ url('client/selectarea') }}">
                    <span>1 Hour 29 Minutes from Now</span>
                    <i>
                        <svg width="1em" height="1em" viewBox="0 0 32 32"><g fill="none" fill-rule="evenodd"><path d="M4 4h24v24H4z"></path><path d="M4 4h24v24H4z"></path><path stroke="#4A4A4A" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M13 22l6-6-6-6"></path></g></svg>
                    </i>
                </a>
            </li>
        </ul>

        <ul class="delivery-review">
            <h3>@lang('messages.order_items')</h3>

            @foreach($cart->items as $key=>$item)
                <?php $total=$item['price'];  ?>
                @if(variant_check($key)!=='checked')

                        <li class="delivery-time">
                            <div class="row review-row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price">
                                    <span class="price1"> @product_name($item['item']) </span>
                                    <span class="price2"> @money(product_currency_price($item['item']['id']))</span>


                                    <a href="{{ url('client/remove-item/'.$key) }}" style="color: {{ setting()['button_color'] }}; position: absolute;
                                            top: -20px;
                                            /* right: -11px; */
                                            border-radius: 50%;
                                            border: 0.1px solid {{ setting()['button_color'] }};
                                            width: 20px;
                                            height: 20px;
                                            text-align: center;
                                            padding: 2px;
                                            display: block;
                                            right: -12px;"><i class="fa fa-times"></i></a>

                                </div>



                                @if($cart->options)
                                    @foreach($cart->options as $option)
                                        @if($option['product_id']===$key)
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price">
                                                <span class="price3">@variantname($option['item'])</span>
                                                <span class="price4">@money($option['price'])</span>
                                                <a href="{{ url('remove-varient/'.$option['item']['id']) }}" style="color: {{ setting()['button_color'] }}; position: absolute; top: -20px; border-radius: 50%; width: 20px; height: 20px; text-align: center; padding: 1px 3px 0 0; display: block; right: 15px;"><i class="fa fa-times"></i></a>
                                            </div>
                                            <?php $total+=$option['price']; ?>
                                        @endif
                                    @endforeach
                                @endif

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon increase-item">
                                    <div class="add-remove-btn">
                                        <button type="button" data-is-variant="no" data-manage-stock="{{ $item['item']['manage_stock'] }}" data-stock="{{ $item['item']['stock'] }}" data-qty="{{ $item['qty'] }}" data-id="{{ $item['item']['id'] }}" data-price="{{ $item['item']['price'] }}" data-item-total="{{ $item['price'] }}" class="btn-minus">
                                            <i>
                                                <svg width="1em" height="1em" viewBox="0 0 44 44"><path d="M32 22c0 2.761-.976 5.118-2.929 7.071C27.118 31.024 24.761 32 22 32s-5.118-.976-7.071-2.929C12.976 27.118 12 24.761 12 22s.976-5.118 2.929-7.071C16.882 12.976 19.239 12 22 12s5.118.976 7.071 2.929C31.024 16.882 32 19.239 32 22zm-14 0h8" fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"></path></svg>
                                            </i>

                                        </button>
                                        <span>{{ $item['qty'] }}</span>
                                        <button type="button" data-is-variant="no" data-manage-stock="{{ $item['item']['manage_stock'] }}" data-stock="{{ $item['item']['stock'] }}" data-qty="{{ $item['qty'] }}" data-id="{{ $item['item']['id'] }}" data-price="{{ $item['item']['price'] }}" data-item-total="{{ $item['price'] }}" class="btn-plus">
                                            <i>
                                                <svg width="1em" height="1em" viewBox="0 0 44 44"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M32 22c0 2.761-.976 5.118-2.929 7.071C27.118 31.024 24.761 32 22 32s-5.118-.976-7.071-2.929C12.976 27.118 12 24.761 12 22s.976-5.118 2.929-7.071C16.882 12.976 19.239 12 22 12s5.118.976 7.071 2.929C31.024 16.882 32 19.239 32 22zm-10-4v8m-4-4h8"></path></svg>
                                            </i>
                                        </button>


                                    </div>
                                    <button class="product-price-btn">
                                        @money($total)
                                    </button>

                                </div>




                            </div>

                    @else






                        @if($cart->options)
                            @foreach($cart->options as $option)
                                <?php $total=$option['price']*$item['qty']; ?>
                                @if($option['product_id']===$key)

                                        <li class="delivery-time">
                                            <div class="row review-row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price">
                                                    <span class="price1"> @variantname(($cart->items[$option['product_id']]['item'])) </span>
                                                    <br>
                                                    <span class="price1"> @variantname($option['item']) </span>
                                                    <span class="price2"> @money($option['item']['price'])</span>
                                                </div>
                                                <a href="{{ url('remove-varient/'.$option['item']['id']) }}" style="color: {{ setting()['button_color'] }}; position: absolute; top: -20px; border-radius: 50%; width: 20px; height: 20px; text-align: center; padding: 1px 3px 0 0; display: block; right: 15px;"><i class="fa fa-times"></i></a>

                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon increase-item">
                                                    <div class="add-remove-btn">
                                                        <button type="button" data-product-id="{{ $item['item']['id'] }}" data-is-variant="yes" data-manage-stock="{{ $option['item']['manage_stock'] }}" data-stock="{{ $option['item']['stock'] }}" data-qty="{{ $item['qty'] }}" data-id="{{ $option['item']['id'] }}" data-price="{{ $option['item']['price'] }}" data-item-total="{{ $option['price'] }}" class="btn-minus">
                                                            <i>
                                                                <svg width="1em" height="1em" viewBox="0 0 44 44"><path d="M32 22c0 2.761-.976 5.118-2.929 7.071C27.118 31.024 24.761 32 22 32s-5.118-.976-7.071-2.929C12.976 27.118 12 24.761 12 22s.976-5.118 2.929-7.071C16.882 12.976 19.239 12 22 12s5.118.976 7.071 2.929C31.024 16.882 32 19.239 32 22zm-14 0h8" fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"></path></svg>
                                                            </i>

                                                        </button>
                                                        <span>{{ $item['qty'] }}</span>
                                                        <button type="button" data-product-id="{{ $item['item']['id'] }}" data-is-variant="yes" data-manage-stock="{{ $option['item']['manage_stock'] }}" data-stock="{{ $option['item']['stock'] }}" data-qty="{{ $item['qty'] }}" data-id="{{ $option['item']['id'] }}" data-price="{{ $option['item']['price'] }}" data-item-total="{{ $option['price'] }}" class="btn-plus">
                                                            <i>
                                                                <svg width="1em" height="1em" viewBox="0 0 44 44"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M32 22c0 2.761-.976 5.118-2.929 7.071C27.118 31.024 24.761 32 22 32s-5.118-.976-7.071-2.929C12.976 27.118 12 24.761 12 22s.976-5.118 2.929-7.071C16.882 12.976 19.239 12 22 12s5.118.976 7.071 2.929C31.024 16.882 32 19.239 32 22zm-10-4v8m-4-4h8"></path></svg>
                                                            </i>
                                                        </button>
                                                    </div>
                                                    <button class="product-price-btn">
                                                        @money($total)
                                                    </button>


                                                </div>




                                            </div>
                                            @endif

                                            @endforeach
                                            @endif
                                            @endif
                                        </li>
                                        @endforeach
        </ul>

        <ul class="delivery-review">
            <h3>@lang('messages.promo_code')</h3>
            <li  class="delivery-time">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                    <input type="text" placeholder=" " required name="promo_code" id="notes" class="additional-info promo-code">
                    <label for="notes" class="add-instruction">@lang('messages.enter_code')</label>
                    <button type="button" class="btn-promo">@lang('messages.apply')</button>
                </div>
            </li>
        </ul>

        <ul class="delivery-review">
            <li class="delivery-time">
                <div class="row review-row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price">
                        <span class="price3">@lang('messages.subtotal')</span>
                        <span class="price4 subtotal" data-subtota="{{ carttotal()['total'] }}">@money(carttotal()['total'])</span>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price">
                        <span class="price3">@lang('messages.delivery_charges')</span>
                        <span class="price4 delivery_charges" data-charges="{{ getarea()->delivery_charges }}">@money(getarea()->delivery_charges)</span>
                    </div>
                    @if($cart->promocode_amount>0)
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price">
                            <span class="price3">@lang('messages.promo_discount')</span>
                            <span class="price4 promo-amount" data-promo-amount="{{ $cart->promocode_amount }}">@money($cart->promocode_amount)</span>
                        </div>

                    @endif
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price price-total">
                        <h3>@lang('messages.total')</h3>
                        <span class="price2 grand-total">@money(carttotal()['total']+getarea()->delivery_charges-$cart->promocode_amount)</span>
                    </div>
                </div>
            </li>

        </ul>

    </div>


    <input type="hidden" class="currency_symbol" value="{{ setting()->currency_symbol }}">

@endsection
@section('scripts')
    <script src="{{ asset('client/js/checkoutdetail.js') }}"></script>
    <script>
        $(document).ready(function(e){
            $('.btn-promo').on('click',function(e){
                var code=$('.promo-code').val();
                $.ajax({
                    url:HOST_URL+'/client/addpromocode',
                    type:'GET',
                    data:{code:code},
                    success:function(data){
                        console.log(data);
                        if(data.status==='success'){
                            toastr.success('',data.message);
                            setTimeout(function () {

                                window.location.reload();
                            },500)
                        }
                        if(data.status==='error'){
                            toastr.error('',data.message);

                        }
                    }
                })
            })

        });
    </script>
    <script>
        var deliveryString = $(".delivery-time a span").text();
        if((deliveryString).includes('10079')){
            $(".delivery-time a span").text("10 Days Delivery");
        }else{
            console.log("false");
        }
    </script>
@endsection

<style>
    .col-xl-12.col-lg-12.col-md-12.col-sm-12.col-12.product-price.optional-addon.increase-item {
        display: none;
    }
</style>