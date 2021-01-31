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
@endsection
@section('header')
@include('includes.header');
@endsection

@section('content')
    <div  id="menu-list1" class="col-md-4" style="display: none;position: fixed;top: 0px;z-index: 1000000">
        <div class="overlay"></div>
        <ul class="pd-menus">
            <li class="menu-2" style="width: 100%">
                <button type="button" style="margin-left: auto;
    padding-right: 20px;
    margin-right: 20px;
    background: white;
    border: 0px;
}" class="product-btn" id="product-btn-list">
                    <i class="fas fa-angle-down"></i>
                </button>
            </li>
            @foreach($categories as $category)

                <li class="menu-2" href="#category-{{$category->id}}">

                    <h2>{{ catname($category)}}</h2>
                    <span>{{catcount($category) }}</span>


            </li>
            @endforeach

        </ul>
    </div>
    <div class="card-shine product-dummy">
        <div class="body-shine">

            <div>
                <lines class="shine"></lines>
                <lines class="shine shine1 "></lines>
                <lines class="shine shine2"></lines>
                <lines class="shine shine2"></lines>
            </div>

            <box class="shine"></box>

            <div class="shine-btn">
                <lines class="shine shines"></lines>
            </div>

        </div>
    </div>
    <div class="card-shine product-dummy">
        <div class="body-shine">

            <div>
                <lines class="shine"></lines>
                <lines class="shine shine1 "></lines>
                <lines class="shine shine2"></lines>
                <lines class="shine shine2"></lines>
            </div>

            <box class="shine"></box>

            <div class="shine-btn">
                <lines class="shine shines"></lines>
            </div>

        </div>
    </div>  <div class="card-shine product-dummy">
        <div class="body-shine">

            <div>
                <lines class="shine"></lines>
                <lines class="shine shine1 "></lines>
                <lines class="shine shine2"></lines>
                <lines class="shine shine2"></lines>
            </div>

            <box class="shine"></box>

            <div class="shine-btn">
                <lines class="shine shines"></lines>
            </div>

        </div>
    </div>
{{--@include('client.products',['products'=>$products,'categories'=>$categories])--}}
@endsection

@section('scripts')
    <script src="{{ asset('client/js/lib/lazy/jquery.lazy.js') }}"></script>
    <script src="{{ asset('client/js/index.js') }}"></script>
    <script src="{{ asset('client/js/productdetails.js') }}"></script>

    <script>
        $(document).ready(function(){
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
