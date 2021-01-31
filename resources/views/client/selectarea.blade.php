@extends('mainpages.mainfront')
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-order-mode.css') }}">
    <style>
        .nav-link.active {
            outline: none;
            border-bottom: 2px solid {{ setting()['button_color'] }} !important;
            padding: 4px 0px;
            border-width:0px;
        }

        .accordion>.card{
            border:0px;
        }

        .accordion>.card>.card-header{
            background-color: white;
            border-bottom:0px;
            padding-right: 12px;
        }

        .btn-link {
            font-weight: 500;
            color: black;
            text-decoration: none;
            width: 100%;
            text-align: left;
            padding: 0 0 0 9px;
        }

        .btn-link i {
            float: right;
        }

        .btn-link:hover {
            color: black;
            text-decoration: none;
        }


    </style>
    @endsection
@section('content')


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-ltr">

                <div class="row">

                    <header class="order-header">
                        <h1>@lang('messages.order_mode')</h1>
                        <button type="button" class="btn-back">
                            <a href="{{ url('/') }}">
                                <i><svg width="1em" height="1em" viewBox="0 0 32 32"><path fill="currentColor" fill-rule="evenodd" d="M10.414 17l4.293 4.293a1 1 0 01-1.414 1.414l-6-6a1 1 0 010-1.414l6-6a1 1 0 111.414 1.414L10.414 15H24a1 1 0 010 2H10.414z"></path></svg></i>
                            </a>
                        </button>
                    </header>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a  class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">@lang('messages.delivery')</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


{{--                            @foreach($governments as $key=>$gove)--}}
{{--                            <button type="button" class="product-btn" id="product-btn-list" data-toggle="collapse" href="#collapse-menu-list{{ $key }}" role="button" aria-expanded="false" aria-controls="collapse-menu-list{{ $key }}">--}}
{{--                                <h2>{{ government($key) }}</h2>--}}
{{--                                <i class="fas fa-angle-down"></i>--}}
{{--                            </button>--}}

{{--                            <div class="collapse" id="collapse-menu-list{{ $key }}">--}}
{{--                                <div class="card card-body">--}}
{{--                                    <ul class="pd-menus">--}}
{{--                                        @foreach($gove as $area)--}}
{{--                                        <li class="menu-1">--}}
{{--                                            <a style="color: black;" href="{{ url('client/areaselection/'.$area->id) }}"><h6> @area($area) </h6></a>--}}

{{--                                        </li>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endforeach--}}

                            <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        @foreach($governments as $key=>$gove)
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                                    {{ government($key) }} <i class="fas fa-angle-down"></i>
                                                </button>
                                            </h2>
                                        </div>
                                            @foreach($gove as $area)
                                            <div id="collapse-{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body" style="padding:10px!important;padding-left: 40px!important;">

{{--                                                    <li class="menu-1">--}}
                                                        <a style="color: black;" href="{{ url('client/areaselection/'.$area->id) }}"><h6 style="border-left: 2px solid {{ setting()['button_color'] }};padding-left: 7px;"> @area($area) </h6></a>
{{--                                                    </li>--}}

                                            </div>
                                        </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>

                        </div>
                    </div>






{{--                    <div class="accordion" id="accordionExample">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header" id="headingOne">--}}
{{--                                <h2 class="mb-0">--}}
{{--                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
{{--                                        Collapsible Group Item #1 <i class="fas fa-angle-down"></i>--}}
{{--                                    </button>--}}
{{--                                </h2>--}}
{{--                            </div>--}}

{{--                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">--}}
{{--                                <div class="card-body">--}}
{{--                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>

            </div>





@endsection
