@extends('mainpages.mainfront')
@section('css')
    <style>
        .thumnail-shimmer{
            z-index: 1;
            height: 91px;
            width: 91px;
            position: absolute;
            right: 17px;

        }
    </style>
        <style>
        @media only screen and (max-width: 991px){
            /* .header-navbar > .row {
            display: none;

        } */
        .btn-back {
                display: block !important;
            }

        }
        .order-header{
            position:unset!important;
        }
        .header-navbar {
            padding: 0 !important;
        }
    </style>
        <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-order-product.css') }}">

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

    <div class="card-shine product-dummy">
    
        @foreach($products as $key=>$product)
            <section class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ltr-product-1">
                <!-- <button type="button" href="#category-{{$key}}" class="product-btn"  id="product-btn-list">
                    <h2 style="color: {{ setting()['button_color'] }}">{{ getcatbyid($key) }}</h2>
                    <i class="fas fa-angle-down" style="color: {{ setting()['button_color'] }}"></i>
                </button> -->

                <ul class="product-list" id="category-{{$key}}">
                    @foreach($product as $pr)
                        <li class="product-list-detail" >
                            <a class="product-detail-item-1" href="{{ url('client/productdetail/'.$pr->id) }}">
                                <div class="item-detail">
                                    <h3>@product_name($pr)</h3>
                                    <h4>@productdesc($pr)</h4>

                                    <button class="product-price">
                                        @if($pr->discount>0)

                                            @money(product_currency_price($pr->id))
                                            <span style="text-decoration: line-through;color:red;font-size: 10px;position: relative;bottom: 10px;"> @money($pr->discount)</span>

                                        @else
                                        <span class="price2" data-currency-symbol="{{ Session::get('currency') }}">
                                            <span class="currency"></span>{{product_currency_price($pr->id)}}
                                        </span>
                                        @endif
                                    </button>

                                </div>
                                <img class="product-detail-img lazy-loading" src="{{ count($pr->media) > 0 ? $pr->media[0]->path : '/storage/upload/default/default.png' }}">
                            </a>
                        </li>
                    @endforeach

                </ul>



            </section>

        @endforeach




    </div>
    {{--@include('client.products',['products'=>$products,'categories'=>$categories])--}}
@endsection

@section('scripts')
    <script src="{{ asset('client/js/lib/lazy/jquery.lazy.js') }}"></script>
    <script>
        $(document).ready(function(){

            
        var currencySymbol=$('.price2').attr('data-currency-symbol');

        $('.currency').text(currencySymbol + ' ');

            $(document).on('click','.menu-2',function(e) {
                e.preventDefault();
                $('#menu-list1').toggle("slidedown");
                console.log('Button Clicked');
                console.log($(this).attr('href'));
                var scrolltodive=$(this).attr('href');
                $('html, body').animate({
                    scrollTop: $(scrolltodive).offset().top
                }, 2000);
            });
        })
    </script>
@endsection
