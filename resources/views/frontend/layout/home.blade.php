<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}
    <meta charset="utf-8">
    <link rel="icon" href="https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/31/7f/317fd2c69deab791235b99265df49060.jpg">
    <link rel="apple-touch-icon" href="https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/31/7f/317fd2c69deab791235b99265df49060.jpg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Cairo&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&amp;display=swap" rel="stylesheet">
    <title>Atyabeljenan</title>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
</head>
<body>
@include('frontend.includes.head')
<div id="app"></div>
<script type="text/javascript">var APP_URL = '{{ (url('/')) }}'</script>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>