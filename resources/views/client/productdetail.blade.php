@extends('mainpages.mainfront')
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-order-product.css') }}">
    <meta property="og:site_name" content="{{ sitename()['site_title'] }}">
    <meta property="og:title" content="@product_name($product)" />
    <meta property="og:description" content="@productdesc($product)" />
    <meta property="og:image" itemprop="image" content="{{ $product->image }}">
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="{{ time() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />


    <style>
        /* .ltr-product-details{
            position: absolute !important;
        }
        .product-navbar.navbar-light .navbar-toggler{
            display: none;
        } */
        @media only screen and (max-width: 991px){
            .header-navbar > .row {
            display: none;

        }
        .btn-back {
                display: block !important;
            }

        }

        .header-navbar {
            padding: 0 !important;
        }
    </style>
@endsection
@section('header')
    <header class="order-header">
        <button type="button" class="btn-back">
            <a href="{{ url('/') }}">
                <i><svg width="1em" height="1em" viewBox="0 0 32 32"><path fill="currentColor" fill-rule="evenodd" d="M10.414 17l4.293 4.293a1 1 0 01-1.414 1.414l-6-6a1 1 0 010-1.414l6-6a1 1 0 111.414 1.414L10.414 15H24a1 1 0 010 2H10.414z"></path></svg></i>
            </a>
        </button>


    </header>


@endsection
@section('content')

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-img">
        @if(count($product->media) < 0)
            <img src="{{ count($product->media) > 0 ? $product->media[0]->path : '/storage/upload/default/default.png'}}">
        @endif
            @if(count($product->media) > 0)
                    @foreach($product->media as $media)
                        <img src="{{ $media->path }}">
                    @endforeach
            @endif

        </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-detail">

        <h2>@product_name($product)</h2>
        <h3>
          @productdesc($product)
        </h3>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price product-price-main" data-qty="{{ $qty>0?$qty:1 }}" data-is-stock="{{ $product->manage_stock }}" data-stock="{{ $product->stock }}" data-id="{{ $product->id }}" data-price="{{ $product->price }}">
        <span class="price1">@lang('messages.price')</span>
        <span class="price2" data-currency-symbol="{{ Session::get('currency') }}">
            @if($total>0)
{{--                count($product->variant_heads)>0?"":--}}
           <!-- {{ money($total) }} -->
            @else
                {{money(product_currency_price($product->id))  }}
            @endif
        </span>
    </div>

{{--    <div class="col-xl-12 col-lg-1f2 col-md-12 col-sm-12 col-12 product-price optional-addon">--}}
{{--        <h3>Optional Add-Ons</h3>--}}
{{--        <div class="optional-add-items">--}}
{{--            <form>--}}
{{--                <div class="form-group">--}}
{{--                    <input type="checkbox" id="check1">--}}
{{--                    <label for="check1">Frozen Skin-On Fries ( 500 gm )</label>--}}
{{--                    <span>+ KWD 2</span>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <input type="checkbox" id="check2">--}}
{{--                    <label for="check2">Frozen Curly Fries ( 500 gm )</label>--}}
{{--                    <span>+ KWD 2.5</span>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--        {{dd($options)}}--}}
        @foreach($varients as $key=>$vr)
{{--            {{dd($vr)}}--}}
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
        <h3>{{ variant_head($key ) }}</h3>
        <div class="optional-add-items">


                @foreach($vr as $vr1)

                    <div class="form-group">
                    <input class="varient-check variant_name_color" data-id="{{ $vr1->id }}" data-price="{{ variant_currency_price($vr1->id) }}" type="checkbox" {{ my_variant_check($vr1->id) }} {{ my_variant_check($vr1->id) }} id="check-{{$vr1->id}}">
                    <label for="check-{{$vr1->id}}">@variantname($vr1)</label>
                    <span> 
                    <!-- {{money($vr1->price)}} -->
                    {{money(variant_currency_price($vr1->id))}}
                    </span>
                </div>

                @endforeach

        </div>
            </div>
        @endforeach
    @foreach($addons as $key=>$add)

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
        <h3>{{ addon_head($key ) }}</h3>
        <div class="optional-add-items">


                @foreach($add as $ad)

                    <div class="form-group">
                    <input data-id="{{ $ad->id }}" data-price="{{ $ad->price }}" {{ my_addon_check($ad->id) }} class="addon-check variant_name_color" id="addon-check-{{ $ad->id }}" type="checkbox">
                    <label for="addon-check-{{ $ad->id }}">@variantname($ad)</label>
{{--                    <span> @money($ad->price)</span>--}}
                </div>

                @endforeach


        </div>
            </div>
        @endforeach



{{--    @foreach($addons as $key=>$addon)--}}
{{--        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">--}}
{{--            <h3>{{ addon_head($key ) }}</h3>--}}
{{--            <div class="optional-add-items-1">--}}
{{--                <form>--}}

{{--                    @foreach($vr as $vr1)--}}

{{--                        <div class="form-group">--}}
{{--                            <input class="addon-check" data-id="{{ $vr1->id }}" data-price="{{ $vr1->price }}" type="checkbox" {{ my_variant_check($vr1->id) }} {{ my_variant_check($vr1->id) }} id="check-1-2-{{$vr1->id}}">--}}
{{--                            <label for="check-{{$vr1->id}}">@variantname($vr1)</label>--}}
{{--                            <span> @money($vr1->price)</span>--}}
{{--                        </div>--}}

{{--                    @endforeach--}}

{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endforeach--}}


{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--            <input type="number" style="width: 130px;--}}
{{--    text-align: center;--}}
{{--    margin: auto;--}}
{{--    border: 1px solid {{ setting()['button_color'] }}" class="form-control" placeholder="Quantity">--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

        <input type="text" placeholder=" " required name="notes" id="notes" class="additional-info">
        <label for="notes" class="add-instruction">@lang('messages.add_instructions_optional')</label>

    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon increase-item">

        <button type="button" class="remove-item">
            <i>
                <svg width="1em" height="1em" viewBox="0 0 44 44"><path d="M32 22c0 2.761-.976 5.118-2.929 7.071C27.118 31.024 24.761 32 22 32s-5.118-.976-7.071-2.929C12.976 27.118 12 24.761 12 22s.976-5.118 2.929-7.071C16.882 12.976 19.239 12 22 12s5.118.976 7.071 2.929C31.024 16.882 32 19.239 32 22zm-14 0h8" fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"></path></svg>
            </i>

        </button>
        <span data-qty="{{ $qty>0?$qty:1 }}" class="product-qty">{{ $qty>0?$qty:1 }}</span>
        <button type="button" class="add-item">
            <i>
                <svg width="1em" height="1em" viewBox="0 0 44 44"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M32 22c0 2.761-.976 5.118-2.929 7.071C27.118 31.024 24.761 32 22 32s-5.118-.976-7.071-2.929C12.976 27.118 12 24.761 12 22s.976-5.118 2.929-7.071C16.882 12.976 19.239 12 22 12s5.118.976 7.071 2.929C31.024 16.882 32 19.239 32 22zm-10-4v8m-4-4h8"></path></svg>
            </i>
        </button>

    </div>




@endsection

@section('total-item-price')
    @money($total)
@endsection
@section('total-item-price')
@money($product->price)
@endsection
@section('scripts')
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('client/js/productdetails.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
      $('.product-img').slick();
    });
    </script>
@endsection