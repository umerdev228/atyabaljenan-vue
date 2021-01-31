<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Account</title>
    <style>
        .bg-product-img{
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            width: inherit;
            height: inherit;
            background-image:url("{{ asset('client/logo/WhatsApp_Image_2020-04-22_at_8.19.09_PM_(2).jpeg') }}");
        }
    </style>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" >
    <!-- FontAwesome CDN-->
    <link type='text/css' rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <!-- Custom Style-->
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-left-to-right.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-shimmer.css') }}">

</head>
<body>

<div id="root">

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 App">

        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ltr-main">

                <div class="row">

                    <header class="product-nav pd-navbar-1">
                        <nav class="product-navbar navbar navbar-expand-lg navbar-light ">
                            <button class="navbar-toggler" type="button" id="btn-product-nav" data-toggle="collapse" data-target="#navbarProductView1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="fas fa-bars"></span>
                            </button>

                            <div class="collapse navbar-collapse"  id="navbarProductView1">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">Menu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Search</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link status" href="#">Order Status</a>
                                    </li>
                                    <p class="tap-order">Enabling one-tap ordering</p>
                                    <li class="ordering">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Save your addresses</p>
                                    </li>
                                    <li class="ordering">
                                        <i class="far fa-credit-card"></i>
                                        <p>Save your payments. Comming soon!</p>
                                    </li>
                                    <li class="ordering">
                                        <i class="far fa-clock"></i>
                                        <p>Re-order with one tap. Comming soon!</p>
                                    </li>

                                    <button type="button" class="btn-login">Login</button>

                                </ul>


                            </div>

                        </nav>

                        <button type="button" class="btn-language">
                            <i>
                                <svg width="1em" height="1em" viewBox="0 0 32 32">
                                    <path fill-rule="evenodd" d="M22 22.424c-1.099.95-2.388 1.675-3.868 2.174-.952.268-1.919.402-2.901.402-1.48 0-2.721-.399-3.725-1.197C10.502 23.006 10 21.711 10 19.921c0-.743.117-1.463.35-2.16.233-.698.65-1.403 1.252-2.115.289-.317.505-.553.65-.708.144-.155.271-.266.382-.333-.792-.683-1.188-1.346-1.188-1.992-.03-.749.497-1.857 1.584-3.325C13.779 8.429 14.605 8 15.507 8c.455 0 .91.132 1.368.397.457.265.792.488 1.004.667.212.18.39.375.534.585.144.21.216.412.216.607-.006.03-.021.046-.046.046-.847-.305-1.565-.457-2.155-.457-.233 0-.532.054-.898.16-.365.107-.744.3-1.137.58-.393.28-.59.563-.59.85 0 .286.274.59.82.913.547.323.875.506.986.548.233-.03 1.092-.231 2.578-.603l1.073-.205c.237-.046.557-.117.963-.215l-.857 2.64h-.064c-.24 0-.792.085-1.658.256-4.163.962-6.244 2.552-6.244 4.768 0 .396.224.84.672 1.334.995.719 2.22 1.163 3.675 1.334.46.085.878.14 1.252.164.375.025 1.02.052 1.934.082A122.29 122.29 0 0122 22.424z"></path></svg>
                            </i>
                        </button>
                    </header>

                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ltr-product-views1">

                        <div class="row">

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ltr-views-detail">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 bg-product-img">

                                </div>

                                <div class="product-logo">
                                    <div class="logo-detail">
                                        <img class="product-logo-img" src="{{ asset('client/logo/logo.png') }}">
                                        <h1>Casa Shawarma</h1>
                                        <p>Yard Bird, Brown to Crisp</p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ltr-product-details">

                        <div class="row">

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-ltr">

                                <div class="row" id="product-container">

                                    <div id="viewport" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-ltr-header">

                                        <ul class="products-ltr-header-item">
                                            <li class="ltr-header-item">
                                                <h2>Delivery</h2>
                                                <a class="mode-pickup" href="order-mode.html">
                                                    Switch to Car Pickup
                                                    <i>
                                                        <svg width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M3 3h18v18H3z"></path><path d="M3 3h18v18H3z"></path><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M9 18l6-6-6-6"></path></g></svg>
                                                    </i>
                                                </a>
                                            </li>
                                            <li class="ltr-header-item">
                                                <h2>Area</h2>
                                                <a class="mode-pickup" href="order-mode.html">
                                                    Abdullah Al Saleem
                                                    <i>
                                                        <svg width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M3 3h18v18H3z"></path><path d="M3 3h18v18H3z"></path><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M9 18l6-6-6-6"></path></g></svg>
                                                    </i>
                                                </a>
                                            </li>
                                            <li class="ltr-header-item">
                                                <h2>Scheduled time</h2>
                                                <a class="mode-pickup time" href="#">
                                                    Today 3:00 PM - 4:00 PM
                                                    <i>
                                                        <svg width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M3 3h18v18H3z"></path><path d="M3 3h18v18H3z"></path><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M9 18l6-6-6-6"></path></g></svg>
                                                    </i>
                                                </a>
                                            </li>
                                        </ul>

                                        <a class="search-item">
                                            <div class="search-product">
                                                <input type="text" placeholder="search" autofocus autocomplete="off">
                                            </div>
                                        </a>

                                    </div>

                                    <ul class="product-dummy">
                                        <!--begin::card-shimmer-->
                                        <div class="card-shine">
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
                                        <div class="card-shine">
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
                                        <div class="card-shine">
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
                                        <div class="card-shine">
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
                                        <!--end::card-shimmer-->
                                    </ul>
                                </div>

                            </div>


                        </div>

                    </div>

                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ltr-product-views">

                        <div class="row">

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ltr-views-detail">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 bg-product-img">

                                </div>

                                <header class="product-nav pd-nav-2">
                                    <nav class="product-navbar navbar navbar-expand-lg navbar-light ">
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>

                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav mr-auto">
                                                <li class="nav-item active">
                                                    <a class="nav-link" href="#">Menu</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Search</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="#">Order Status</a>
                                                </li>

                                            </ul>

                                        </div>

                                        <button type="button" class="btn-language">
                                            <i>
                                                <a href="index-arabic.html">
                                                    <svg width="1em" height="1em" viewBox="0 0 32 32">
                                                        <path fill-rule="evenodd" d="M22 22.424c-1.099.95-2.388 1.675-3.868 2.174-.952.268-1.919.402-2.901.402-1.48 0-2.721-.399-3.725-1.197C10.502 23.006 10 21.711 10 19.921c0-.743.117-1.463.35-2.16.233-.698.65-1.403 1.252-2.115.289-.317.505-.553.65-.708.144-.155.271-.266.382-.333-.792-.683-1.188-1.346-1.188-1.992-.03-.749.497-1.857 1.584-3.325C13.779 8.429 14.605 8 15.507 8c.455 0 .91.132 1.368.397.457.265.792.488 1.004.667.212.18.39.375.534.585.144.21.216.412.216.607-.006.03-.021.046-.046.046-.847-.305-1.565-.457-2.155-.457-.233 0-.532.054-.898.16-.365.107-.744.3-1.137.58-.393.28-.59.563-.59.85 0 .286.274.59.82.913.547.323.875.506.986.548.233-.03 1.092-.231 2.578-.603l1.073-.205c.237-.046.557-.117.963-.215l-.857 2.64h-.064c-.24 0-.792.085-1.658.256-4.163.962-6.244 2.552-6.244 4.768 0 .396.224.84.672 1.334.995.719 2.22 1.163 3.675 1.334.46.085.878.14 1.252.164.375.025 1.02.052 1.934.082A122.29 122.29 0 0122 22.424z"></path></svg>
                                                </a>
                                            </i>
                                        </button>

                                    </nav>


                                </header>

                                <div class="product-logo">
                                    <div class="logo-detail">
                                        <img class="product-logo-img" src="{{ asset('client/logo/logo.png') }}">
                                        <h1>Casa Shawarma</h1>
                                        <p>Yard Bird, Brown to a Crisp</p>
                                        <p>Yard Bird, Brown to a Crisp</p>
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
{{--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>--}}
<script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script>
var HOST_URL="{{url('')}}";
</script>
<script src="{{ asset('client/js/index.js') }}"></script>
<script src="{{ asset('client/js/lib/jquery.inview.js') }}"></script>

<script>
    $(function() {
        $(document).on('inview','.ltr-product-1', function(event, isVisible) {
            if (!isVisible) {
                $(this).css('background','white');

                return; }
            $(this).css('background','red');
            var element = $(this);

            console.log(element);





        });
    });
</script>
</body>
</html>
