<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('favicon/favicon.ico') }}" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<style>
</style>
<body>


<form method="post" id="bookeeyPaymentForm" autocomplete="off">


    <input type="hidden" class="form-control" id="mid" name="mid" value="{{ $mid }}"/>
    <input type="hidden" class="form-control" id="txnRefNo" name="txnRefNo" value="{{ $txRefNo }}" maxlength="15" />
    <input type="hidden" class="form-control" value="{{ $amt }}" id="amt" name="amt" maxlength="20" />
    <input type="hidden" class="form-control" value="{{time()}}" id="txnTime" name="txnTime"/>
    <input type="hidden" class="form-control" value="{{ $crossCat }}" id="crossCat" name="crossCat" />
    <input type="hidden" class="form-control" id="surl" name="surl" value="{{ $surl }}" />
    <input type="hidden" class="form-control" id="furl" name="furl" value="{{ $furl }}" />
    <input type="hidden" class="form-control" id="paymentoptions" value="{{ $booking->payment_gateway }}" name="paymentoptions"  />
    <input type="hidden" class="form-control" id="hashMac" name="hashMac" value="{{ $sig }}" />
    <input type="hidden" value="Try Ryda" name="merchantName" />
</form>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<script>
    $(document).ready(function (e) {

        var urlString='https://demo.bookeey.com/portal/bookeeyPg';
        // var urlString='https://www.bookeey.com/portal/bookeeyPg';
        document.forms["bookeeyPaymentForm"].setAttribute('action',urlString);
        document.forms["bookeeyPaymentForm"].submit();
    })
</script>

</body>
</html>