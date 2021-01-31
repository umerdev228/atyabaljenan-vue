@extends('mainpages.mainfront')
@section('css')
{{--    <link type="text/css" rel="stylesheet" href="{{asset('client/css/style-left-to-right.css')}}">--}}
{{--    <link type="text/css" rel="stylesheet" href="{{asset('client/css/style-review-order.css') }}">--}}
{{--    <link type="text/css" rel="stylesheet" href="{{asset('client/css/style-checkout-page.css') }}">--}}
{{--    <link type="text/css" rel="stylesheet" href="{{asset('client/css/style-order-delivery.css') }}">--}}
{{--    <link type="text/css" rel="stylesheet" href="{{asset('client/css/style-order-place-code.css') }}">--}}
{{--    --}}

    <link type="text/css" rel="stylesheet" href="{{ asset('/client/js/build/css/intlTelInput.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-order-product.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-checkout-page.css') }}">

<meta property="og:site_name" content="{{ sitename()['site_title'] }}">
<meta property="og:type" content="website" />
<meta property="og:updated_time" content="{{ time() }}" />
<style>
.header-navbar {
    padding: 0;
}
    .review-header{
        background-image: linear-gradient(rgb(255, 255, 255), rgb(255, 255, 255));
        -webkit-box-pack: justify;
        justify-content: space-between;
        top: 0px;
        position: sticky;
        width: 100%;
        z-index: 3000;
        -webkit-box-align: center;
        align-items: center;
        height: 48px;
        display: flex;
        color: rgb(0, 0, 0);
        padding: 8px;
        flex: 0 0 auto;
    }

    .review-header h1{
        font-size: 17px;
        font-weight: 600;
        line-height: 1.41;
        letter-spacing: -0.4px;
        text-align: center;
        padding-left: 9%;
        padding-right: 9%;
        -webkit-box-align: center;
        align-items: center;
        color: inherit;
        position: absolute;
        left: 0px;
        right: 0px;
        overflow-wrap: break-word;
        word-break: break-word;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        opacity: 1;
        transform: scale3d(1, 1, 1);
        flex: 1 1 auto;
        overflow: hidden;
        transition: opacity 0.5s ease 0s, transform 0.2s ease 0s;
    }

    .btn-back{
        font-size: 32px;
        height: 32px;
        color: currentcolor;
        display: inline-flex;
        cursor: pointer;
        text-align: center;
        background-color: transparent;
        appearance: none;
        font-stretch: normal;
        font-style: normal;
        user-select: none;
        vertical-align: middle;
        flex-shrink: 0;
        touch-action: manipulation;
        line-height: 1;
        transform: scale3d(1, 1, 1);
        border-width: initial;
        border-style: none;
        border-color: initial;
        border-image: initial;
        text-decoration: none;
        padding: 0 10px;
        position: absolute;
        top: 4px;
        left: 12px;

    }

    .btn-back a{
        color: #000000;
    }
    .order_list{
        color: {{setting()['button_color']}};
    }
    .order_list:hover{
        color: {{setting()['button_color']}};
        text-decoration: none;
    }

    .btn-back a:hover, .btn-back a:focus{
        outline: none;
        opacity: 0.65;
    }
</style>

@endsection
@section('header')
{{--    <header class="review-header">--}}
{{--        <h1>@lang('messages.review_order')</h1>--}}
{{--        <button type="button" class="btn-back">--}}
{{--            <a href="{{ url('/') }}">--}}
{{--                <i><svg width="1em" height="1em" viewBox="0 0 32 32"><path fill="currentColor" fill-rule="evenodd" d="M10.414 17l4.293 4.293a1 1 0 01-1.414 1.414l-6-6a1 1 0 010-1.414l6-6a1 1 0 111.414 1.414L10.414 15H24a1 1 0 010 2H10.414z"></path></svg></i>--}}
{{--            </a>--}}
{{--        </button>--}}
{{--    </header>--}}
    <header class="review-header">
        <h1>Order Look Up</h1>
        <button type="button" class="btn-back">
            <a href="{{ url('/') }}">
                <i><svg width="1em" height="1em" viewBox="0 0 32 32"><path fill="currentColor" fill-rule="evenodd" d="M10.414 17l4.293 4.293a1 1 0 01-1.414 1.414l-6-6a1 1 0 010-1.414l6-6a1 1 0 111.414 1.414L10.414 15H24a1 1 0 010 2H10.414z"></path></svg></i>
            </a>
        </button>
    </header>
@endsection
@section('content')


    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-detail" style="margin-top: 10px;">

        <h2></h2>
        <h3>
           @lang('messages.order_check')
        </h3>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price product-price-main">
{{--        <label for="notes" class="">Enter Phone Number</label>--}}
{{--        <input type="text" required name="phone_number" id="phone_number" class="form-control" placeholder="Enter Your Phone Number">--}}
        <input id="phone_number"  required name="phone_number" value="" type="tel" placeholder="Phone Number" class="additional-info">
        <label for="phone_number" class="add-instruction"></label>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price product-price-main" id="select_order" style="display: none;">
        <h3>Select Order</h3>
    </div>
    <div class="mainn">
{{--    <a href="{{url('')}}" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">--}}
{{--        <div for="notes" class="add-instruction">@lang('messages.add_instructions_optional')</div>--}}
{{--    </a>--}}
    </div>
@endsection





@section('scripts')


    <script src="{{ asset('client/js/build/js/data.js') }}"></script>

    <script src="{{ asset('client/js/build/js/intlTelInput.js') }}"></script>

    <script>
        var iti;
        $(document).ready(function (e) {
            var input = document.querySelector("#phone_number");
            iti = window.intlTelInput(input, {
                initialCountry: "kw",
                onlyCountries:['kw'],
                utilsScript: "/client/js/build/js/utils.js?1560794689211"
            });
        })

    </script>

<script>
    // alert("asdf")
    $(document).ready(function(e){
        $('#order_lookup').on('click',function () {
            var order_id=$('#orders').val();
            if (order_id == "" || order_id == null || order_id == "default"){
                toastr.error('','Please Select an Order First');
            }else{
                window.location.assign('{{url('client/view-receipt')}}/'+order_id);
            }

        });
        $("#phone_number").on("keyup", function(e) {
            // var phone=$('#phone_number').val();
            var phone = iti.getNumber();
            var isValid = iti.isValidNumber();
            console.log(phone);
            if(isValid===false && phone.length>10){
                toastr.error('','Number is Invalid !');
                return;
            }
            $.ajax({
                url:'{{url("client/get-orders")}}',
                type:'get',
                data:{'phone':phone},
                success:function(data){
                    console.log(data);
                   if (data){
                       $('#select_order').css('display','block');
                       $('.mainn').html('');
                       for(i=0;i<data.length;i++){
                           // $('#orders').append('<option value="'+data[i].id+'" >'+data[i].invoice_number+'</option>');
                           $('.mainn').append('<a href="{{url('client/view-receipt')}}/'+data[i].id+'" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon order_list"> <div class="add-instruction">'+data[i].invoice_number+'</div> </a>');
                       }
                }else{
                       $('#select_order').css('display','none');
                       $('.mainn').html('');
                       $('.mainn').append('<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon order_list"> <div class="add-instruction">No Orders Associated to this Number</div> </a>');

                   }
                },
                error:function(err){
                    console.log(err.responseText);
                }

            });
        })
    });
</script>
@endsection
