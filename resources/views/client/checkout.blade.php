@extends('mainpages.mainfront')
<?php
$mid = $bookey->mid;
$secret_key = $bookey->secrete;

$txRefNo = $trxid;
$furl = url('client/checkout');
$surl =  url('client/saveorder');
$crossCat = "GEN";
$txTime = time();
$amt = $total;

// "mid|txnRefNo|su|fu|amt|txnTime|crossCat|secret_key"
$hstring = $mid . "|" .  $txRefNo . "|" .  $surl . "|" . $furl . "|" .
	$amt . "|" . $txTime . "|" . $crossCat . "|" . $secret_key;

$sig = hash('sha512', $hstring);

//echo $hstring . "\n";
//echo $sig . "\n";
?>

@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-review-order.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-checkout-page.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-order-delivery.css') }}">
    <style>
        .product-oder-btn.btn-next {
            margin-top: 160px;
        }

        .steppers .stepper0{
            width:130px
        }

        .steppers .stepper1{
            width: 130px;
        }
        .product-footer{
            /*background-color: grey;*/
        }
    </style>
    @endsection
@section('content')

    <header class="review-header">
        <h1>Checkout</h1>
        <button type="button" class="btn-back">
            <a href="{{ url('client/contactaddress') }}">
                <i><svg width="1em" height="1em" viewBox="0 0 32 32"><path fill="currentColor" fill-rule="evenodd" d="M10.414 17l4.293 4.293a1 1 0 01-1.414 1.414l-6-6a1 1 0 010-1.414l6-6a1 1 0 111.414 1.414L10.414 15H24a1 1 0 010 2H10.414z"></path></svg></i>
            </a>
        </button>
    </header>
    <div class="coml-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 steppers">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 stepper0"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 stepper0"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 stepper0"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 stepper1"></div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-review">

        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 order-map">
                <i>
                    <svg width="1em" height="1em" viewBox="0 0 160 160"><g fill="none" fill-rule="evenodd"><path stroke="#4A4A4A" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M29 62.575v-7.46C29 46.8 35.8 40 44.111 40h58.542c8.31 0 15.111 6.801 15.111 15.114 0 0 .236 1.768.236 7.024m-84.22-2.583c1.15-6.652 6.931-11.75 13.835-11.75h54.398c7.723 0 14.042 6.38 14.042 14.178m-79.653-2.128c2.569-3.437 6.645-5.669 11.213-5.669h54.398c6.179 0 10.123 2.325 11.987 7.952m-69.796 56.987c-8.362 0-15.204-6.904-15.204-15.342V60.346h73.763c3.128 0 6.043.966 8.467 2.617m5.77 48.484c13.255 0 24-10.813 24-24.151 0-13.339-10.745-24.151-24-24.151s-24 10.812-24 24.15c0 13.339 10.745 24.152 24 24.152zM39 77.233v27.17m10 15.094h5m4.705-.216h56.24c2.1 0 3.802-1.719 3.802-3.829"></path><path fill="currentColor" d="M126.375 82.333c1.444 0 2.625 1.2 2.625 2.667v13.333c0 1.467-1.181 2.667-2.625 2.667h-15.75c-1.444 0-2.625-1.2-2.625-2.667V85c0-1.467 1.181-2.667 2.625-2.667h1.313v-2.666c0-3.68 2.94-6.667 6.562-6.667 3.623 0 6.563 2.987 6.563 6.667v2.666h1.312zM123 82v-2.745c0-2.347-2.018-4.255-4.5-4.255s-4.5 1.908-4.5 4.255V82h9zm-37 61.007a1 1 0 11-2 .025v-.01c.005 0 .002-.007 0-.014v-.006c-.005-.495-.177-3-3-3a1 1 0 01-.002-2c.502-.007 3.002-.177 3.002-3 0-.552.448-1.002 1-1.002s1 .45 1 1.002c0 2.823 2.502 2.993 3.005 3a1 1 0 01.025 2H89c-2.82 0-2.995 2.503-3 3.005zm20.6-115.604a.601.601 0 01-1.2.015v-.003s0-.003.003-.003l-.003-.009V27.4c-.003-.297-.108-1.8-1.8-1.8a.601.601 0 01-.003-1.2c.303-.003 1.803-.108 1.803-1.8a.6.6 0 111.2 0c0 1.692 1.5 1.797 1.803 1.8a.601.601 0 01.012 1.2h-.015c-1.692 0-1.797 1.5-1.8 1.803zm-87 53a.601.601 0 01-1.2.015v-.003s0-.003.003-.003l-.003-.009V80.4c-.003-.297-.108-1.8-1.8-1.8a.601.601 0 01-.003-1.2c.303-.003 1.803-.108 1.803-1.8a.6.6 0 111.2 0c0 1.692 1.5 1.797 1.803 1.8a.601.601 0 01.012 1.2H21.4c-1.692 0-1.797 1.5-1.8 1.803z"></path></g></svg>
                </i>
            </div>



            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 order-contact order-payment">
                <h1>@lang('messages.payment_method')</h1>
                <p>@lang('messages.choose_your_preferred_method')</p>
                <div class="row contact-row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 order-payment-mode">
                        <i>
                            <svg width="1em" height="1em" viewBox="0 0 49 57"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.464" d="M11.29 26.957V5.45a2.66 2.66 0 012.65-2.67h0a2.66 2.66 0 012.65 2.67v18.34m5.302 0V5.45a2.66 2.66 0 012.65-2.67h0a2.66 2.66 0 012.65 2.67v15.657m3.067 27.496V62m-3.067-41.43V8.382a2.66 2.66 0 012.65-2.67h0a2.66 2.66 0 012.651 2.67v14.027M16.591 23.79V3.67A2.66 2.66 0 0119.241 1h0a2.66 2.66 0 012.65 2.67v20.12m1.56 11.961s-.728-7.748-12.161-7.748L7.652 24.76l-1.316-5.261c-.53-2.156-2.734-3.433-4.85-2.81L1 16.802l1.622 8.234c.096.51.268 1.004.51 1.463l3.524 6.78a5.17 5.17 0 001.257 1.557l4.401 3.595a2.95 2.95 0 011.055 2.263v21.19m28.906-14.786l-4.666 3.76-4.666-3.76a15.406 15.406 0 01-5.725-11.999V24.34l.625.242a12.689 12.689 0 009.281-.049l.485-.193.755.284a12.687 12.687 0 009.293-.143L48 24.34v10.758a15.41 15.41 0 01-5.725 12zm-9.302-9.66l2.185 2.202 7.886-7.945"></path></svg>
                        </i>
                        <p>
                            @lang('messages.for_hygiene_reasons_electronic_payments_are_much_safer_than_cash_bills')
                        </p>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-order-address product-payment">

                        <nav>
                            <label class="nav_title">@lang('messages.choose_payment_type')</label>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a data-type="Knet" class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <i>
                                        <svg width="1em" height="1em" viewBox="0 0 44 44"><g fill="none" fill-rule="evenodd"><rect width="24" height="16" x="10" y="14" fill="#0772B8" rx="3"></rect><path fill="#FCED20" fill-rule="nonzero" d="M28 23.892l-3.115-2.162L27.654 20h-5.077l-2.77 1.73V20H16v4h3.808v-2.162l2.769 2.054z"></path><path fill="#F5F5F9" d="M10 19h24v.2H10zm0 6.4h24v.2H10z"></path><path fill="#FFF" fill-rule="nonzero" d="M17.616 27.927h-.469v-.742c0-.157-.01-.258-.03-.304a.223.223 0 00-.098-.108.325.325 0 00-.162-.038.437.437 0 00-.22.055.289.289 0 00-.132.145c-.024.06-.036.171-.036.334v.658H16v-1.454h.436v.214a.769.769 0 01.584-.246.84.84 0 01.284.045c.086.031.15.07.195.117a.395.395 0 01.092.162c.017.06.025.146.025.259v.903zm4.587-.463l.468.065a.654.654 0 01-.285.32.977.977 0 01-.487.111c-.308 0-.536-.083-.685-.248a.729.729 0 01-.175-.5c0-.242.077-.43.23-.567a.845.845 0 01.583-.204c.264 0 .472.07.625.214.152.143.225.361.219.656H21.52a.35.35 0 00.114.266.396.396 0 00.27.096.33.33 0 00.186-.05.3.3 0 00.113-.159zm.027-.388c-.004-.112-.039-.196-.105-.254a.36.36 0 00-.244-.087.361.361 0 00-.254.092.316.316 0 00-.099.249h.702zm5.732-.563v.307h-.321v.586c0 .119.003.188.01.207.005.02.02.036.04.049a.158.158 0 00.08.019.72.72 0 00.189-.037l.04.299c-.11.038-.233.057-.37.057a.703.703 0 01-.23-.035.336.336 0 01-.149-.09.32.32 0 01-.066-.15 1.532 1.532 0 01-.015-.271v-.634h-.215v-.307h.215v-.288l.471-.225v.513h.32z"></path><path fill="#FFF" d="M30.054 16l.25.375h-1.619l.212.25h1.655L31 17l-.572.5h-2.863l-.249-.25V18h-3.484v-1.5h2.489v.625h-1.37v.375h1.743v-1h.871l.573.625h1.792v-.25h-1.618L27.565 16h2.49zm-1.867 1.625V18h-.373v-.375h.373zm.872 0V18h-.374v-.375h.374zM15.618 16l-.622 1.125h4.355v-.375h.623v.375h.373v-.375h.871v1h-6.72L14 17.125 14.871 16h.747zm7.467.875v.5H21.84v-.5h1.245zm-1.991-.75v.5h-.498v-.5h.498zm-4.73 0v.5h-.497v-.5h.498zm.623 0v.5h-.498v-.5h.498z"></path></g></svg>
                                    </i>
                                    @lang('messages.knet')
                                </a>
                                <a data-type="Credit" class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                    <i>
                                        <svg width="1em" height="1em" viewBox="0 0 44 44"><g fill="none"><path fill="#1565C0" d="M34 27.867C34 29.045 32.977 30 31.714 30H12.286C11.023 30 10 29.045 10 27.867V16.133C10 14.955 11.023 14 12.286 14h19.428c1.263 0 2.286.955 2.286 2.133v11.734z"></path><path d="M17.473 18.963l-1.401 4.061s-.356-1.718-.39-1.934c-.798-1.768-1.975-1.67-1.975-1.67l1.387 5.247v-.001h1.686l2.33-5.703h-1.637zm1.334 5.704h1.532l.926-5.704h-1.55zm10.837-5.704h-1.61l-2.513 5.704h1.521l.314-.815h1.918l.163.815h1.393l-1.186-5.704zm-1.864 3.8l.834-2.156.436 2.156h-1.27zm-4.343-2.138c0-.314.265-.548 1.027-.548.495 0 1.062.35 1.062.35l.248-1.198s-.724-.267-1.435-.267c-1.61 0-2.44.75-2.44 1.697 0 1.714 2.122 1.48 2.122 2.36 0 .15-.123.5-1.007.5-.887 0-1.472-.316-1.472-.316l-.264 1.149s.567.314 1.663.314c1.098 0 2.621-.798 2.621-1.945 0-1.38-2.125-1.48-2.125-2.096z" fill="#FFF"></path><path fill="#FFC107" d="M15.4 22l-.487-2.192s-.22-.475-.794-.475H11.88s2.855.772 3.52 2.667z"></path></g></svg>
                                    </i>
                                    <i>
                                        <svg width="1em" height="1em" viewBox="0 0 44 44"><g fill="none" transform="translate(10 14)"><path fill="#3F51B5" d="M24 13.867C24 15.045 22.977 16 21.714 16H2.286C1.023 16 0 15.045 0 13.867V2.133C0 .955 1.023 0 2.286 0h19.428C22.977 0 24 .955 24 2.133v11.734z"></path><ellipse cx="15.143" cy="8" fill="#FFC107" rx="5.238" ry="5.333"></ellipse><path fill="#FF3D00" d="M10.96 11.2a5.347 5.347 0 01-.616-1.067h2.789c.146-.339.26-.695.334-1.066H10.01A5.356 5.356 0 019.904 8h3.666a5.43 5.43 0 00-.105-1.067H10.01a5.35 5.35 0 01.334-1.066h2.789a5.322 5.322 0 00-.616-1.067H10.96a5.35 5.35 0 01.775-.85 5.16 5.16 0 00-3.402-1.283C5.44 2.667 3.095 5.054 3.095 8s2.345 5.333 5.238 5.333c1.713 0 3.228-.84 4.183-2.133H10.96z"></path></g></svg>
                                    </i>
                                    <p>@lang('messages.credit_card')</p>
                                </a>
                                <a style="background: url('{{ url('images/bookeey.png') }}');background-size: 32px;background-repeat: no-repeat;background-position: center;" data-type="Bookeey" class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile22" role="tab" aria-controls="nav-profile" aria-selected="false">
                                    <i style="height: 10px;"></i>
                                    <p style="bottom: -40px;position: relative">Bookey</p>
                                </a>
                                <a data-type='Cash' class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                                    <i>
                                        <svg width="1em" height="1em" viewBox="0 0 44 44"><g fill="none" transform="translate(10 14)"><rect width="24" height="16" fill="#0E9347" rx="2"></rect><path fill="#3BB54A" d="M20.6 15H3.4c0-1.4-1.08-2.545-2.4-2.545v-8.91C2.32 3.545 3.4 2.4 3.4 1h17.2c0 1.4 1.08 2.545 2.4 2.545v8.91c-1.32 0-2.4 1.145-2.4 2.545zM12 12a4 4 0 100-8 4 4 0 000 8zM5 9a1 1 0 100-2 1 1 0 000 2zm14 0a1 1 0 100-2 1 1 0 000 2z"></path></g></svg>
                                    </i>
                                    @lang('messages.cash')
                                </a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                            </div>

                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                            </div>
                        </div>

                    </div>

                </div>
            </div>



        </div>

    </div>
    <form method="post" id="bookeeyPaymentForm"
          autocomplete="off">


        <input type="hidden" class="form-control" id="mid" name="mid" value="{{ $mid }}"/>
        <input type="hidden" class="form-control" id="txnRefNo" name="txnRefNo" value="{{ $txRefNo }}" maxlength="15" />
        <input type="hidden" class="form-control" value="{{ $amt }}" id="amt" name="amt" maxlength="20" />
        <input type="hidden" class="form-control" value="{{time()}}" id="txnTime" name="txnTime"/>
        <input type="hidden" class="form-control" value="{{ $crossCat }}" id="crossCat" name="crossCat" />
        <input type="hidden" class="form-control" id="surl" name="surl" value="{{ $surl }}" />
        <input type="hidden" class="form-control" id="furl" name="furl" value="{{ $furl }}" />
        <input type="hidden" class="form-control" id="paymentoptions" value="Bookeey" name="paymentoptions"  />
        <input type="hidden" class="form-control" id="hashMac" name="hashMac" value="{{ $sig }}" />
        <input type="hidden" value="Try Ryda" name="merchantName" />
    </form>



@endsection

@section('scripts')
<script>
    $(document).ready(function (e) {

        var paymentType;
        $(document).on('click','.nav-link',function(e){
            var type=$(this).attr('data-type');
            paymentType=type;
            console.log(type);

            storePaymentType();
        })
        storePaymentType();

        function storePaymentType(){
            $.ajax({
                url:HOST_URL+'/client/storepaymenttype',
                type:'get',
                data:{type:paymentType},
                success:function(data){
                    console.log(data);
                },
                error:function (error) {

                }
            })
        }


        function bookeey(check){

        }

        $(document).on('click','.proceed-next',function (e) {
        e.preventDefault();
            submit_payment_method();
        });
        function submit_payment_method(){

            if(paymentType==='Cash') {
                window.location.assign('{{ url('client/saveorder?txnId='.$trxid) }}')
            }else{
                $('#paymentoptions').val(paymentType);
                var urlString='https://www.bookeey.com/portal/bookeeyPg';
                document.forms["bookeeyPaymentForm"].setAttribute('action',urlString);
                document.forms["bookeeyPaymentForm"].submit();
            }

        }
    })
</script>

@endsection


<style>
#nav-contact-tab{
    visibility:hidden;
}
</style>
