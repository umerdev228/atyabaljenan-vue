<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- FontAwesome CDN-->
    <link type='text/css' rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <!-- Custom Style-->
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-left-to-right.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-shimmer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="shortcut icon" href="{{ favicon() }}" />
    <link href="toastr.css" rel="stylesheet"/>
    @toastr_css

    <style>
        .alert-box {
            font-size: 9px;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            z-index: 10000;
        }
        .success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
    .order-header{
        background:unset!important;
    }
    .logo-detail{
    display:none !important; 
}
        .nav-link.active {
            outline: none;

            border-color: {
                    {
                    setting()['button_color']
                }
            }

             !important;
            border-width: 2px;
            padding: 4px 0px;
        }

        .tryrydalink {
            text-decoration: none;
            color: grey;
            font-size: 14px;
        }

        .tryrydalink:hover {
            text-decoration: none;
            color: black;
            font-size: 14px;
        }

        .powered_by_message {
            text-decoration: none;
            color: grey;
            font-size: 14px;
        }

        .order-map i {

            color: {
                    {
                    setting()['button_color']
                }
            }

             !important;
        }

        .order-btn {
            background: {
                    {
                    setting()['button_color']
                }
            }

            ;
            color: white !important;
        }

        .add-remove-btn button:first-child {

            /* position: absolute; */
            color: {
                    {
                    setting()['button_color']
                }
            }

             !important;

        }

        .add-remove-btn button:last-child {

            /* position: absolute; */
            color: {
                    {
                    setting()['button_color']
                }
            }

             !important;

        }

        .product-price span.price1 {
            color: {
                    {
                    setting()['button_color']
                }
            }

             !important;
        }

        .form-group label:hover:before {
            border: 2px solid {
                    {
                    setting()['button_color']
                }
            }

             !important;
        }

        .form-group label:hover {
            color: {
                    {
                    setting()['button_color']
                }
            }

             !important;
        }

        .btn-promo {
            color: {
                    {
                    setting()['button_color']
                }
            }

             !important;
        }

        .ltr-header-item a.mode-pickup {
            color: {
                    {
                    setting()['button_color']
                }
            }

             !important;
        }

        .ltr-header-item a.mode-pickup i {
            color: {
                    {
                    setting()['button_color']
                }
            }

             !important;
        }

        .remove-item,
        .add-item {
            color: {
                    {
                    setting()['button_color']
                }
            }

             !important;
        }

        .steppers .stepper0 {
            background-color: {
                    {
                    setting()['button_color']
                }
            }

             !important;
        }

        .btn-language {
            z-index: 10000 !important;
        }

        @media screen and (max-width: 750px) {
            .logo-detail {
                display: none !important;
            }


        }



        .pd-navbar-1 .btn-language {
            position: absolute;
            right: 8px;
            top: 8px;
            z-index: 999999 !important;
        }

        .order-header {
            z-index: 2 !important;
        }

        .ltr-main {
            height: auto !important;
        }

        .ltr-product-views1 {
            overflow: hidden !important;
        }

        .order-btn {
            background-color: {
                    {
                    setting()['button_color']
                }
            }

             !important;
        }

        #nav-profile-tab:hover,
        #nav-contact-tab:hover {
            outline: none;

            border-color: {
                    {
                    setting()['button_color']
                }
            }

             !important;
            border-width: 2px;
            padding: 4px 0px;
        }

        #navbarProductView1 {
            display: none;
        }

        #navbarProductView1 .navbar-nav {
            background-color: #fff;
            height: 294px;
            position: absolute;
            width: 100%;
            left: 0;
            top: 0px;
            padding: 59px 20px 0;
        }

        .overlay-nav {
            height: 638px;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgb(33, 37, 41);
        }

        .bootstrap-select {
            position: absolute;
            right: 55px;
            top: 6px;
            z-index: 99999;
        }
        .dropdown-menu li {
    background-color: #e5c545 !important;
}
    </style>
    @yield('css')




</head>

<body>
<div id="sound" style="display: none;"></div>

    <div id="root">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 App">

            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 header-navbar" style="">

                    <div class="row">

                        <header class="product-nav pd-navbar-1">
                            <nav class="product-navbar navbar navbar-expand-lg navbar-light ">
                                <button class="navbar-toggler" type="button" id="btn-product-nav">
                                    <span class="fas fa-bars" style="color: #989797;"></span>
                                </button>


                                <div class=" navbar-collapse" id="navbarProductView1">

                                    <div class="overlay-nav">

                                    </div>
                                    {{--                                <button class="navbar-toggler toggler-1" type="button" id="btn-product-nav btn-pd-nav-1" data-toggle="collapse" data-target="#navbarProductView1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
                                    {{--                                    <span class="fas fa-times" style="color: #989797;"></span>--}}
                                    {{--                                </button>--}}

                                    <ul class="navbar-nav mr-auto" style="z-index: 9">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ url('/') }}">@lang('messages.menu')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/') }}">@lang('messages.search')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link status"
                                                href="{{ url('client/order-lookup') }}">@lang('messages.order_status')</a>
                                        </li>
                                        @if(url('')=='https://sugar-salon.online')
                                        <li class="nav-item">
                                            <a class="nav-link status" href="https://calendly.com/sugarsalonkw"
                                                target="_blank">@lang('messages.booking')</a>
                                        </li>
                                        @endif

                                </ul>

                                </div>

                            </nav>

                            <a href="{{ url('client/revieworder') }}" class="btn-language"
                                style="font-size: 16px;right: 28px;top: 21.3px;">
                                <i class="fa fa-shopping-cart">
                                </i>
                            </a>


                            @if(\Session::get('applocale')==='ar')
                            <a href="{{ url('lang/en') }}" class="btn-language" style="right: 0px;position: absolute;">
                                <i>
                                    <svg width="1em" height="1em" viewBox="0 0 32 32">
                                        <path fill-rule="evenodd"
                                            d="M14.665 21H8V11h6.665v1.742h-4.69v2.345h3.994v1.742H9.975v2.43h4.69V21zM24 21h-1.762l-4.008-6.138V21h-1.975V11h1.762l4.008 6.124V11H24v10z">
                                        </path>
                                    </svg>
                                </i>
                            </a>
                            @else
                            <a href="{{ url('lang/ar') }}" class="btn-language" style="right: 0px;position: absolute;">
                                <i>
                                    <svg width="1em" height="1em" viewBox="0 0 32 32">
                                        <path fill-rule="evenodd"
                                            d="M22 22.424c-1.099.95-2.388 1.675-3.868 2.174-.952.268-1.919.402-2.901.402-1.48 0-2.721-.399-3.725-1.197C10.502 23.006 10 21.711 10 19.921c0-.743.117-1.463.35-2.16.233-.698.65-1.403 1.252-2.115.289-.317.505-.553.65-.708.144-.155.271-.266.382-.333-.792-.683-1.188-1.346-1.188-1.992-.03-.749.497-1.857 1.584-3.325C13.779 8.429 14.605 8 15.507 8c.455 0 .91.132 1.368.397.457.265.792.488 1.004.667.212.18.39.375.534.585.144.21.216.412.216.607-.006.03-.021.046-.046.046-.847-.305-1.565-.457-2.155-.457-.233 0-.532.054-.898.16-.365.107-.744.3-1.137.58-.393.28-.59.563-.59.85 0 .286.274.59.82.913.547.323.875.506.986.548.233-.03 1.092-.231 2.578-.603l1.073-.205c.237-.046.557-.117.963-.215l-.857 2.64h-.064c-.24 0-.792.085-1.658.256-4.163.962-6.244 2.552-6.244 4.768 0 .396.224.84.672 1.334.995.719 2.22 1.163 3.675 1.334.46.085.878.14 1.252.164.375.025 1.02.052 1.934.082A122.29 122.29 0 0122 22.424z">
                                        </path>
                                    </svg>
                                </i>
                            </a>
                            @endif

                            <select class="selectpicker" data-width="fit"   style="z-index: 999999;font-size: 16px;right: 0;top: 21.3px; position: absolute">
                                <option value="" selected>Currency</option>
                                <option value="KWD"  data-content='<img src="https://upload.wikimedia.org/wikipedia/commons/a/aa/Flag_of_Kuwait.svg" style="    width: 24px;" />'></option>

                                <option value="BD" data-content='<img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/Flag_of_Bahrain_%283-2%29.svg" style="    width: 24px;" /> '></option>

                                <option value="OMR" data-content='<img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Flag_of_Oman_%283-2%29.svg" style="    width: 24px;" />  '></option>
                                <option value="QAR" data-content='<img src="https://upload.wikimedia.org/wikipedia/commons/6/65/Flag_of_Qatar.svg" style="    width: 24px;" />  '></option>

                                <option value="SAR" data-content='<img src="https://upload.wikimedia.org/wikipedia/commons/0/0d/Flag_of_Saudi_Arabia.svg" style="    width: 24px;" />  '></option>
                                <option value="AED" data-content='<img src="https://upload.wikimedia.org/wikipedia/commons/c/cb/Flag_of_the_United_Arab_Emirates.svg" style="    width: 24px;" />  '></option>
                                <option value="USD" data-content='<img src="https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg" style="    width: 24px;" />  '></option>

                            </select>
                        </header>

                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ltr-product-views1">

                            <div class="row">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ltr-views-detail">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 bg-product-img">

                                    </div>

                                    <div class="product-logo"
                                        style="background:url('{{ background() }}');background-size: 100%;">
                                        <div class="logo-detail">
                                            <img class="product-logo-img" src="{{ logo() }}">
                                            <h1>{{ sitename()['site_title'] }}</h1>
                                            <p>{{ sitename()['site_description'] }}</p>
                                        </div>
                                    </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ltr-product-details">

                    <div class="row">

                        @yield('header')


                        <div class="product-container-main" id="product-container" style="width: 100%">

                            @yield('content')

                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-footer">

                            <div class="footer-title powered_by_message">
                                @lang('messages.powered_by_zyda')
                                <a target="_blank" class="tryrydalink" href="https://www.instagram.com/tryryda/">
                                    @lang('messages.company')
                                </a>
                            </div>

                        </div>



                        <div style="background:transparent;"
                            class="col-xl-4 text-center col-lg-4 col-md-12 col-sm-12 col-12 product-oder-btn">

                            @if(setting()->take_order==1)
                            @if(Request::is('client/contactinfo') || Request::is('client/contactaddress'))
                            <a style="background-color: red" href="#" class="btn-next-contactinfo" data-url="{{ url('') }}">
                                <buttton type="button" class="order-btn">
                                    <span class="item-content">@lang('messages.next')</span>

                                </buttton>
                            </a>
                            @elseif(Request::is('client/order_placed'))
                            {{--                                            <a href="{{ url('/') }}"
                            class="btn-next-contactinfo">--}}
                            {{--                                                <buttton type="button" class="order-btn">--}}
                            {{--                                                    <span class="item-content">@lang('messages.order_again')</span>--}}

                            {{--                                                </buttton>--}}
                            {{--                                            </a>--}}
                            @elseif(Request::is('client/view-receipt/*'))

                            @elseif(Request::is('client/order-lookup'))
                            <buttton type="button" class="order-btn btn-next-contactinfo" id="order_lookup">
                                <span class="item-content">@lang('messages.order_lookup')</span>
                            </buttton>
                            @elseif(Request::is('client/select-map'))
                            <buttton type="button" class="order-btn btn-next-contactinfo" id="select_address">
                                <span class="item-content">@lang('messages.select_address')</span>
                            </buttton>
                            @elseif(!Request::is('client/productdetail/*'))
                            {{--                                            {{dd(carttotal()['total'])}}--}}
                            @if(carttotal()['total']>0 && Request::is('client/checkout'))
                            <a href="#">
                                <buttton type="button" class="order-btn proceed-next">
                                    <span class="item-content">@lang('messages.proceed')</span>

                                </buttton>
                            </a>
                            @elseif(carttotal()['total']>0 && !Request::is('client/revieworder'))

                            <a href="{{ url('/client/revieworder') }}">
                                <buttton type="button" class="order-btn">
                                    <span class="item-cart">{{ carttotal()['items'] }}</span>
                                    <span class="item-content">@lang('messages.review_order')</span>
                                    <span class="item-right-extra">{{ setting()->currency_symbol }}
                                        {{ carttotal()['total'] }}</span>

                                </buttton>
                            </a>
                            @elseif(Request::is('client/revieworder'))
                            @if(carttotal()['total']>=setting()->min_order)
                            <a href="{{ url('client/contactinfo')}}">
                                <buttton type="button" class="order-btn">
                                    <span class="item-content">@lang('messages.go_to_checkout')</span>

                                </buttton>
                            </a>
                            @else

                            <buttton disabled type="button" class="order-btn">
                                <span class="item-content">@lang('messages.min_order')
                                    {{ setting()->min_order.' '.setting()->currency_symbol }}</span>

                            </buttton>

                            @endif
                            @elseif(Request::is('client/contactinfo'))
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-oder-btn btn-next">
                                <a href="#" data-url="{{ url('') }}">
                                    <buttton type="button" class="order-btn">
                                        <span class="item-content">@lang('messages.next')</span>

                                    </buttton>
                                </a>
                            </div>
                            @else

                            <a href="{{ url('client/selectarea?path='.url('')) }}">
                                <buttton style="background-color: {{setting()['button_color']}}" type="button" class="order-btn">
                                    <span class="item-content">@lang('messages.start_order')</span>

                                </buttton>
                            </a>
                            @endif
                            @elseif(Request::is('client/productdetail/*'))
                            @if(Session::get('area'))
                            <buttton type="button" class="order-btn" id="add-to-order">
                                <span class="item-content">@lang('messages.add_to_order') <span
                                        class="total-item-price">@yield('total-item-price')</span></span>
                            </buttton>
                            @else

                            <a href="{{ url('client/selectarea?path='.url()->current()) }}">
                                <buttton type="button" class="order-btn">
                                    <span class="item-content">@lang('messages.start_order')</span>

                                </buttton>
                            </a>
                            @endif


                            @endif
                            @else

                            <buttton type="button" disabled="true" class="order-btn">
                                <span class="item-content">@lang('messages.not_take_order')</span>

                            </buttton>

                            @endif

                        </div>

                    </div>

                </div>


            </div>

        </div>


        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ltr-product-views">

            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ltr-views-detail">

                    <header class="product-nav pd-nav-2">
                        <nav class="product-navbar navbar navbar-expand-lg navbar-light ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">@lang('messages.menu')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">@lang('messages.search')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link "
                                            href="{{url('client/order-lookup')}}">@lang('messages.order_status')</a>
                                    </li>
                                    @if(url('')=='https://sugar-salon.online')
                                    <li class="nav-item">

                                        <a class="nav-link" href="https://calendly.com/sugarsalonkw"
                                            target="_blank">@lang('messages.booking')</a>

                                    </li>

                                    @endif
                                    <li style="position: absolute; right: 90px; top: 13px;
">
                                        <select class="selectpicker" data-width="fit">
                                            <option value="" selected>Currency</option>

                                            <option value="KWD"
                                                data-content='<img src="https://upload.wikimedia.org/wikipedia/commons/a/aa/Flag_of_Kuwait.svg" style="    width: 24px;" /> '>
                                                </option>

                                            <option value="BD"
                                                data-content='<img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/Flag_of_Bahrain_%283-2%29.svg" style="    width: 24px;" /> '>
                                                </option>

                                            <option value="OMR"
                                                data-content='<img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Flag_of_Oman_%283-2%29.svg" style="    width: 24px;" />  '>
                                                </option>
                                            <option value="QAR"
                                                data-content='<img src="https://upload.wikimedia.org/wikipedia/commons/6/65/Flag_of_Qatar.svg" style="    width: 24px;" />  '>
                                                </option>

                                            <option value="SAR"
                                                data-content='<img src="https://upload.wikimedia.org/wikipedia/commons/0/0d/Flag_of_Saudi_Arabia.svg" style="    width: 24px;" />  '>
                                                </option>
                                            <option value="AED"
                                                data-content='<img src="https://upload.wikimedia.org/wikipedia/commons/c/cb/Flag_of_the_United_Arab_Emirates.svg" style="    width: 24px;" />  '>
                                                </option>
                                                <option value="USD" data-content='<img src="https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg" style="    width: 24px;" />  '></option> 
                                        </select>
                                    </li>
                                </ul>

                            </div>

                            <button type="button" class="btn-language">
                                <i>
                                    @if(\Session::get('applocale')==='ar')
                                    <a href="{{ url('lang/en') }}">
                                        <svg width="1em" height="1em" viewBox="0 0 32 32">
                                            <path fill-rule="evenodd"
                                                d="M14.665 21H8V11h6.665v1.742h-4.69v2.345h3.994v1.742H9.975v2.43h4.69V21zM24 21h-1.762l-4.008-6.138V21h-1.975V11h1.762l4.008 6.124V11H24v10z">
                                            </path>
                                        </svg>
                                    </a>
                                    @else
                                    <a href="{{ url('lang/ar') }}" style="background: whitesmoke;right: 0px;text-decoration: none;top: 16px;position: absolute;font-size: 28px;">
                                        <svg width="1em" height="1em" viewBox="0 0 32 32">
                                            <path fill-rule="evenodd"
                                                d="M22 22.424c-1.099.95-2.388 1.675-3.868 2.174-.952.268-1.919.402-2.901.402-1.48 0-2.721-.399-3.725-1.197C10.502 23.006 10 21.711 10 19.921c0-.743.117-1.463.35-2.16.233-.698.65-1.403 1.252-2.115.289-.317.505-.553.65-.708.144-.155.271-.266.382-.333-.792-.683-1.188-1.346-1.188-1.992-.03-.749.497-1.857 1.584-3.325C13.779 8.429 14.605 8 15.507 8c.455 0 .91.132 1.368.397.457.265.792.488 1.004.667.212.18.39.375.534.585.144.21.216.412.216.607-.006.03-.021.046-.046.046-.847-.305-1.565-.457-2.155-.457-.233 0-.532.054-.898.16-.365.107-.744.3-1.137.58-.393.28-.59.563-.59.85 0 .286.274.59.82.913.547.323.875.506.986.548.233-.03 1.092-.231 2.578-.603l1.073-.205c.237-.046.557-.117.963-.215l-.857 2.64h-.064c-.24 0-.792.085-1.658.256-4.163.962-6.244 2.552-6.244 4.768 0 .396.224.84.672 1.334.995.719 2.22 1.163 3.675 1.334.46.085.878.14 1.252.164.375.025 1.02.052 1.934.082A122.29 122.29 0 0122 22.424z">
                                            </path>
                                        </svg>
                                    </a>
                                    @endif
                                </i>
                            </button>
                            <a href="{{ url('client/revieworder') }}" class="btn-language"
                               onmouseover="this.style.color='hsl(0,0%,86%)';"
                               onmouseout="this.style.color='white';"
                                style="font-size: 16px;right: 34px;text-decoration: none;top: 16px;background: whitesmoke;position: absolute;padding-top: 8px;">
                                <i class="fa fa-shopping-cart">
                                </i>
                                {{Session::get('currency')}}
                            </a>



                        </nav>


                    </header>

                    <div class="product-logo" style="background: url('{{ background() }}');background-size: 100% 100%;">
                        <div class="logo-detail">
                            <img class="product-logo-img" src="{{ logo() }}">
                            <h1>{{sitename()['site_title']}}</h1>
                            <p>{{ sitename()['site_description'] }}</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    </div>

    </div>

    </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap js-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous"></script>

    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        var HOST_URL = "{{url('')}}";
    </script>
    <script>
        $(document).ready(function () {
            console.log('hello')


            setTimeout(function() {
                $('#online').fadeOut('slow');
            }, 3000); // <--

            setTimeout(function() {
                $('#online2').fadeOut('slow');
            }, 3000); // <--

            $('#btn-product-nav').click(function () {
                $(this).find('span').toggleClass('fas fa-bars fas fa-times')
            });
            $('.product-btn').click(function () {
                $(this).find('i').toggleClass('fas fa-angle-down fas fa-angle-up')
            });

            $(document).on('click', '#product-btn-list', function () {
                $('#menu-list1').toggle("slidedown");
            });

            $("#btn-product-nav").click(function () {
                $("#navbarProductView1").animate({
                    width: "toggle"
                });
            });

            $('#product-btn-list1').click(function () {
                $('#menu-list1').toggle("slidedown");
            });

            $('#product-btn-list2').click(function () {
                $('#menu-list2').toggle("slidedown");
            });

            $('#product-btn-list3').click(function () {
                $('#menu-list3').toggle("slidedown");
            });

            $('#product-btn-list4').click(function () {
                $('#menu-list4').toggle("slidedown");
            });

            $('#product-btn-list5').click(function () {
                $('#menu-list5').toggle("slidedown");
            });

            $(document).on('click', '.remove-schedual', function (e) {
                e.stopPropagation();
                e.preventDefault();
                console.log('Clicked');
                window.location.href = HOST_URL + '/client/forget-schedual'
            })

            $(function () {
                $('.selectpicker').selectpicker();

                $('.selectpicker').on('changed.bs.select', function (e, clickedIndex, isSelected,
                    previousValue) {
                    // do something...
                    var currency = $(this).val();
                    console.log(currency);
                    {{--window.location.href = '{{ url('/client/switch-currency') }}/' + currency;--}}
                });
            });
        });

       
    </script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('ed647b741254ac5a1e08', {
        cluster: 'ap2'
    });

    var channel = pusher.subscribe('order-channel');
    channel.bind('App\\Events\\OrderEvent', function(data) {
        var link= HOST_URL+"/admin/order/details/"+data.order_id;
        // alert(link);
        newtable.ajax.reload();
        var mp3Source = '<source src="'+HOST_URL+'/adminside/files/sounds/just-saying.mp3" type="audio/mpeg">';
        var oggSource = '<source src="'+HOST_URL+'/adminside/files/sounds/just-saying.ogg" type="audio/ogg">';
        var embedSource = '<embed hidden="true" autostart="true" loop="false" src="'+HOST_URL+'/admin/files/sounds/just-saying.mp3">';
        document.getElementById("sound").innerHTML='<audio autoplay="autoplay">' + mp3Source + oggSource + embedSource + '</audio>';
        toastr.success(data.message+'<a href="'+link+'">&nbsp;&nbsp;&nbsp;View</a>');
          });
       
        $(function(){

            $('.selectpicker').selectpicker();
            $('.selectpicker').selectpicker('val','{{ Session::get('currency') }}');

            $('.selectpicker').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
                // do something...
                e.preventDefault();
                var currency=$(this).val();
                console.log(currency);

                if(("{{ url('/client/switch-currency') }}/"+currency)!='{{ Session::get('currency') }}') {
                    window.location.href = '{{ url('/client/switch-currency') }}/' + currency;
                }


          });
        });


</script>
@toastr_js
@toastr_render
    @yield('scripts')
</body>

</html>
<style>
.toast-message,.toast{
    background-color:#fff !important;
}
.toast-message{
    color:#850000;
}

</style>