<head>
    <!-- Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Atyabaljinan </title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- FontAwesome CDN-->
    <link type='text/css' rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <!-- Custom Style-->
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-left-to-right.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-shimmer.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-order-mode.css') }}">
    <link rel="shortcut icon" href="{{ favicon() }}" />
    <link type="text/css" rel="stylesheet" href="{{asset('client/css/style-review-order.css')}}">

    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>

    @yield('css')



</head>
