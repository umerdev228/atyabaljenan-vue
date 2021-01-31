@extends('mainpages.mainfront')
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-review-order.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-checkout-page.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/client/js/build/css/intlTelInput.css') }}">
    <style>
        .steppers .stepper0{
            width:130px
        }

        .steppers .stepper1{
            width: 130px;
        }
    </style>
@endsection
@section('content')


    <header class="review-header">
        <h1>@lang('messages.checkout')</h1>
        <button type="button" class="btn-back">
            <a href="{{ url('client/revieworder') }}">
                <i><svg width="1em" height="1em" viewBox="0 0 32 32"><path fill="currentColor" fill-rule="evenodd" d="M10.414 17l4.293 4.293a1 1 0 01-1.414 1.414l-6-6a1 1 0 010-1.414l6-6a1 1 0 111.414 1.414L10.414 15H24a1 1 0 010 2H10.414z"></path></svg></i>
            </a>
        </button>
    </header>

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 steppers">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 stepper0"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 stepper1"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 stepper1"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 stepper1"></div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row">

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 order-contact">

                                <h1>@lang('messages.contact_info')</h1>
                                <p>@lang('messages.we\'ll_use_it_to_get_back_to_you_for_order_updates' )</p>
                                <div class="row contact-row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                        <input type="text" placeholder=" " value="{{ $client?$client->name:'' }}" required name="firstname" id="names" class="additional-info">
                                        <label for="names" class="add-instruction">@lang('messages.name')</label>

                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                        <form>
                                            <input id="phone"  required name="phone" value=" {{ $client?$client->phone:'' }} " type="tel" placeholder="Phone Number" class="additional-info">
                                            <label for="phone" class="add-instruction"></label>
                                        </form>

                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                        <input type="text" placeholder=" " value="{{ $client?$client->email:'' }}" required name="firstname" id="email" class="additional-info1">
                                        <label for="email" class="add-instruction1">@lang('messages.email') (@lang('messages.optional'))</label>

                                    </div>

                                </div>
                            </div>



                        </div>

                    </div>



@endsection
@section('scripts')
    <script src="{{ asset('client/js/build/js/data.js') }}"></script>

    <script src="{{ asset('client/js/build/js/intlTelInput.js') }}"></script>


    <script>
       var iti;
        $(document).ready(function (e) {
            var input = document.querySelector("#phone");
             iti = window.intlTelInput(input, {
                 initialCountry: "kw",
                 onlyCountries:['kw','om','sa','qa','bh','ae'],
                 utilsScript: "/client/js/build/js/utils.js?1560794689211"
            });
        })

    </script>

    <script>
        $(document).ready(function(){
            $('#btn-product-nav').click(function(){
                $(this).find('span').toggleClass('fas fa-bars fas fa-arrow-left')
            });
            $('.product-btn').click(function(){
                $(this).find('i').toggleClass('fas fa-angle-down fas fa-angle-up')
            });

            $('.btn-next-contactinfo').on('click',function (e) {
                e.preventDefault();
            var name=$('#names').val();
            var email=$('#email').val();
            var number = iti.getNumber();
            if(name=='' || name.length<3){
                toastr.error('','Please Enter Your Name or Must be Greater than 3 character');
            return;
            }
            var isValid = iti.isValidNumber();
                if(isValid===false){
                    toastr.error('','Number is Invalid !');
                return;
                }

                $.ajax({
                    url:HOST_URL+'/client/addnameaddres',
                    type:'get',
                    data:{'name':name,'phone':number,'email':email},
                    success:function(data){
                        toastr.success('','First Step Completed');
                        window.location.href=data.url;
                    },
                    error:function(error){
                        console.log(error.responseText);
                    }
                })
            });



        });



    </script>

@endsection
