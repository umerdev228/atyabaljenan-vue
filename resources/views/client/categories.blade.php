@extends('mainpages.mainfront')
@section('header')
@include('includes.header')
@endsection
@section('content')
@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-order-product.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-review-order.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-checkout-page.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-order-delivery.css') }}">
<style>
    .ltr-product-details {
        /* position: absolute !important; */
    }

    /* .product-navbar.navbar-light .navbar-toggler {
        display: none;
    } */

    /* 
        .cat-inner {
            height: 98%;
            width: 98%;
            /* position: absolute; */
    /* border: 1px solid black; */
    /* border-radius: 5px; */
    /* margin: 0px; 
    }
*/
    /* .cat-image {
            /*border: 1px solid green;
            height: 80%;
            border-radius: 5px;
        } */
    .cat-image img {
        width: 100%;
        border-radius: 10px;
        box-shadow: 1px 2px 5px #666;
        transition: 0.2s ease;

    }

    .cat-text {
        text-align: center;
        font-weight: bold;
        margin-top: 5px;
        font-size: 1em !important;
        color: {{ setting()->button_color }};
    }
    .cat-main-grid-container a:hover{
        text-decoration:none;
    }

    .cat-main-grid-container a:hover img{
        box-shadow: 5px 5px 5px #666;
        transition: 0.2s ease;
    }
    .cat-main-grid-container {
    padding: 10px;
}
.header-navbar{
    padding:0 !important;
}

#toast-container{
    display:block !important;
}
</style>
@endsection

@section('content')
    <!-- <header class="review-header">
        <h1>@lang('messages.categories')</h1>
        <button type="button" class="btn-back">
            <a href="{{ url('client/contactinfo') }}">
                <i><svg width="1em" height="1em" viewBox="0 0 32 32"><path fill="currentColor" fill-rule="evenodd" d="M10.414 17l4.293 4.293a1 1 0 01-1.414 1.414l-6-6a1 1 0 010-1.414l6-6a1 1 0 111.414 1.414L10.414 15H24a1 1 0 010 2H10.414z"></path></svg></i>
            </a>
        </button>
    </header> -->
    <div class="row" style="width: 100%;margin: 0!important;">
        @foreach($categories as $category)
        <div class="col-6 cat-main-grid-container">
            <a href="{{ url('client/cat-products/'.$category->id) }}" style="color: black;">
            <div class="cat-inner">
                <div class="cat-image">
                    <img style="width: 100%;height: 100%;" src="{{ asset($category->image) }}">
                </div>
                <div class="cat-text">
                    {{ catname($category) }}
                </div>

            </div>
            </a>

        </div>
        @endforeach

    </div>
@endsection


@section('scripts')

@endsection