@extends('mainpages.mainfront')
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-review-order.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-checkout-page.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-order-delivery.css') }}">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
        .product-footer{
            display: none;
        }

        .steppers .stepper0{
            width:130px
        }

        .steppers .stepper1{
            width: 130px;
        }
    </style>

    <style type="text/css">
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>

@endsection


@section('content')


    <header class="review-header">
        <h1>@lang('messages.checkout')</h1>
        <button type="button" class="btn-back">
            <a href="{{ url('client/contactinfo') }}">
                <i><svg width="1em" height="1em" viewBox="0 0 32 32"><path fill="currentColor" fill-rule="evenodd" d="M10.414 17l4.293 4.293a1 1 0 01-1.414 1.414l-6-6a1 1 0 010-1.414l6-6a1 1 0 111.414 1.414L10.414 15H24a1 1 0 010 2H10.414z"></path></svg></i>
            </a>
        </button>
    </header>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 steppers">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 stepper0"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 stepper0"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 stepper1"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 stepper1"></div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-review">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 order-map">
                <i>
                    <svg width="1em" height="1em" viewBox="0 0 160 160"><g fill="none" fill-rule="evenodd"><path stroke="#4A4A4A" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M57.366 69C60.66 78.322 69.55 85 80 85c10.45 0 19.34-6.678 22.634-16H107l15-9 14 51-26 16-30-10-30 10-26-15 14-52 16 9h3.366zM110 125l-6-46 6 46zm-30-8V99v18zm-29 10l6-49-6 49zm29-42c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24z"></path><path fill="currentColor" d="M91 57.816c0 .841-.096 1.658-.282 2.444l.008.003c-1.342 5.788-4.754 10.794-9.42 14.234-.118.087-.237.172-.357.258a1.912 1.912 0 01-.938.245c-.426 0-.82-.138-1.136-.372-4.8-3.471-8.295-8.585-9.632-14.498l.007-.003a10.742 10.742 0 01-.25-2.31C69 51.841 73.925 47 79.999 47 86.075 47 91 51.842 91 57.816zm-11-4.13c-2.319 0-4.2 1.849-4.2 4.13 0 2.28 1.881 4.127 4.2 4.127 2.32 0 4.2-1.847 4.2-4.128 0-2.28-1.88-4.128-4.2-4.128zm9 85.316c-2.82 0-2.995 2.503-3 3.005a1.001 1.001 0 01-2 .018v-.002c.005 0 .002-.008 0-.016v-.005c-.005-.495-.177-3-3-3a1 1 0 01-.002-2c.502-.007 3.002-.177 3.002-3 0-.552.448-1.002 1-1.002s1 .45 1 1.002c0 2.823 2.502 2.993 3.005 3a1 1 0 01.025 2H89zM146.4 93.6c-1.692 0-1.797 1.5-1.8 1.803a.601.601 0 01-1.2.015l.003-.006s-.003-.006-.003-.012c-.003-.297-.108-1.8-1.8-1.8a.601.601 0 01-.003-1.2c.303-.003 1.803-.108 1.803-1.8a.6.6 0 111.2 0c0 1.692 1.5 1.797 1.803 1.8a.601.601 0 01.009 1.2h-.012zm-109-53c-1.692 0-1.797 1.5-1.8 1.803a.601.601 0 01-1.2.015l.003-.006s-.003-.006-.003-.012c-.003-.297-.108-1.8-1.8-1.8a.601.601 0 01-.003-1.2c.303-.003 1.803-.108 1.803-1.8a.6.6 0 111.2 0c0 1.692 1.5 1.797 1.803 1.8a.601.601 0 01.009 1.2H37.4z"></path></g></svg>
                </i>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 order-contact">
                <h1>@lang('messages.delivery_address')</h1>
                <p>@lang('messages.precise_location_will_help_reach_you_faster')</p>
                <div class="row mb-4">
{{--                    <input id="autocomplete" class="controls mb-4 form-control" type="text" placeholder="Search Box">--}}
                </div>
                <div class="row contact-row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="map" style="height: 200px;background: url('{{ url('client/images/download.svg') }}')">
                        <div class="map-address"></div>
                        <div ></div>
                        <a href="{{ url('client/select-map') }}">
                        <button class="product-price">
                            @lang('messages.tap_to_edit_location')
                        </button>

                        </a>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-ltr-header">

                        <ul class="products-ltr-header-item">
                            <li class="ltr-header-item">
                                <h2>@lang('messages.area')</h2>
                                <a class="mode-pickup" href="{{ url('client/selectarea') }}">
                                    @if(getarea())
                                        @area(getarea())

                                    @else
                                        @lang('messages.selectarea')
                                    @endif
                                    <i>
                                        <svg width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M3 3h18v18H3z"></path><path d="M3 3h18v18H3z"></path><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M9 18l6-6-6-6"></path></g></svg>
                                    </i>
                                </a>
                            </li>
                        </ul>

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-order-address" style="min-height: 400px !important;">

                        <nav>
                            <label class="nav_title">@lang('messages.choose_unit_type')</label>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link {{ $client?($client->type=='House'?'active':''):'active' }} type-link" data-type="House" id="nav-profile-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <i>
                                        <svg width="1em" height="1em" viewBox="0 0 35 35"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M8 15.786v12.198C8 28.544 8.455 29 9.016 29H15v-7.115h5V29h5.984c.56 0 1.016-.455 1.016-1.016V15.786M4 17.82L16.302 5.315a1.016 1.016 0 011.422-.027L31 17.82"></path></svg>
                                    </i>
                                    @lang('messages.house')
                                </a>
                                <a class="nav-item nav-link {{ $client->type=='Appartment'?'active':'' }} type-link" id="nav-profile-tab" data-type="Appartment" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                    <i>
                                        <svg width="1em" height="1em" viewBox="0 0 35 35"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M5 29V6a1 1 0 011-1h23a1 1 0 011 1v23a1 1 0 01-1 1h-8v-8.333h-7V30H6a1 1 0 01-1-1zm6-18.5h1-1zm0 6h1-1zm6-6h1-1zm0 6h1-1zm6-6h1-1zm0 6h1-1z"></path></svg>
                                    </i>
                                    @lang('messages.apartment')
                                </a>
                                <a class="nav-item nav-link {{ $client->type=='Office'?'active':'' }} type-link" id="nav-contact-tab" data-type="Office" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                                    <i>
                                        <svg width="1em" height="1em" viewBox="0 0 35 35"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M5 17.9V28a1 1 0 001 1h23a1 1 0 001-1V18m-10 1.88V19a1 1 0 00-1-1h-2a1 1 0 00-1 1v.957c-3.721-.214-7.528-1.22-11.42-3.017a1 1 0 01-.58-.907V11a1 1 0 011-1h25a1 1 0 011 1v5.033a1 1 0 01-.58.907c-3.544 1.637-7.017 2.617-10.42 2.94zM17 18h2a1 1 0 011 1v2a1 1 0 01-1 1h-2a1 1 0 01-1-1v-2a1 1 0 011-1zm-4-9V7a1 1 0 011-1h8a1 1 0 011 1v2a1 1 0 01-1 1h-8a1 1 0 01-1-1z"></path></svg>
                                    </i>
                                    @lang('messages.office')
                                </a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent" style="min-height: 450px;">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <input type="text" placeholder=" " value="{{ $client->block }}" required name="block" id="block" class="additional-info house-block">
                                    <label for="block" class="add-instruction">@lang('messages.block')</label>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <form>
                                        <input id="street" placeholder=" " value="{{ $client->street }}" required name="street"  class="additional-info1 house-street">
                                        <label for="street" class="add-instruction1">@lang('messages.street')</label>
                                    </form>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <form>
                                        <input id="avenue" placeholder=" " value="{{ $client->avanue }}" required name="avenue"  class="additional-info2 house-avanue">
                                        <label for="avenue" class="add-instruction2">@lang('messages.avenue') (@lang('messages.optional'))</label>
                                    </form>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <form>
                                        <input id="house" placeholder=" " value="{{ $client->house }}" required name="house"  class="additional-info3 house-house">
                                        <label for="house" class="add-instruction3">@lang('messages.house')</label>
                                    </form>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <form>
                                        <input id="direction" placeholder=" " value="{{ $client->specialdir }}" required name="direction"  class="additional-info6 house-special-direction">
                                        <label for="direction" class="add-instruction6">@lang('messages.special_direction') (@lang('messages.optional'))</label>
                                    </form>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <input type="text" placeholder=" " value="{{ $client->block }}" required name="block" id="block" class="additional-info apa-block">
                                    <label for="block" class="add-instruction">@lang('messages.block')</label>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <form>
                                        <input id="street" placeholder=" " value="{{ $client->street }}" required name="street"  class="additional-info1 apa-street">
                                        <label for="street" class="add-instruction1">@lang('messages.street')</label>
                                    </form>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <form>
                                        <input id="avenue" placeholder=" " value="{{ $client->avanue }}" required name="avenue"  class="additional-info2 apa-avanue">
                                        <label for="avenue" class="add-instruction2">@lang('messages.avenue') (@lang('messages.optional'))</label>
                                    </form>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <form>
                                        <input id="building" placeholder=" " value="{{ $client->building }}" required name="building"  class="additional-info3 apa-building">
                                        <label for="building" class="add-instruction3">@lang('messages.building')</label>
                                    </form>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <form>
                                        <input id="floor" placeholder=" " value="{{ $client->floor }}" required name="floor"  class="additional-info4 apa-floor">
                                        <label for="floor" class="add-instruction4">@lang('messages.floor')</label>
                                    </form>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <form>
                                        <input id="office" placeholder=" " value="{{ $client->officeno }}" required name="office"  class="additional-info5 apa-office-no">
                                        <label for="office" class="add-instruction5">@lang('messages.office')</label>
                                    </form>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <form>
                                        <input id="direction" placeholder=" " value="{{ $client->specialdir }}" required name="direction"  class="additional-info6 apa-special-direction">
                                        <label for="direction" class="add-instruction6">@lang('messages.special_direction') (@lang('messages.optional'))</label>
                                    </form>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <input type="text" value="{{ $client->block }}" placeholder=" " required name="block" id="block" class="additional-info office-block">
                                    <label for="block" class="add-instruction ">@lang('messages.block')</label>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <form>
                                        <input id="street" placeholder=" " value="{{ $client->street }}" required name="street"  class="additional-info1 office-street">
                                        <label for="street" class="add-instruction1">@lang('messages.street')</label>
                                    </form>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <form>
                                        <input id="avenue" placeholder=" " value="{{ $client->avanue }}" required name="avenue"  class="additional-info2 office-avanue">
                                        <label for="avenue" class="add-instruction2">@lang('messages.avenue') (@lang('messages.optional'))</label>
                                    </form>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <form>
                                        <input id="building" value="{{ $client->building  }}" placeholder=" " required name="building"  class="additional-info3 office-building">
                                        <label for="building" class="add-instruction3">@lang('messages.block')</label>
                                    </form>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <form>
                                        <input id="floor" value="{{  $client->floor  }}" placeholder=" " required name="floor"  class="additional-info4 office-floor">
                                        <label for="floor" class="add-instruction4">@lang('messages.floor')</label>
                                    </form>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <form>
                                        <input id="office" value="{{ $client->officeno }}" placeholder=" " required name="office"  class="additional-info5 office-no">
                                        <label for="office" class="add-instruction5">@lang('messages.office_no')</label>
                                    </form>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                    <form>
                                        <input id="direction" placeholder=" " value="{{ $client->specialdir }}" required name="direction"  class="additional-info6 office-special-direction">
                                        <label for="direction" class="add-instruction6">@lang('messages.special_direction') (@lang('messages.optional'))</label>
                                    </form>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>



        </div>


@endsection

@section('scripts')
{{--            <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>--}}
           <script>
            var placeSearch, autocomplete;

            var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
            };

            function initAutocomplete() {
            // Create the autocomplete object, restricting the search predictions to
            // geographical location types.
            autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('autocomplete'), {types: ['geocode']});

            // Avoid paying for data that you don't need by restricting the set of
            // place fields that are returned to just the address components.
            autocomplete.setFields(['address_component']);

            // When the user selects an address from the drop-down, populate the
            // address fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
            }

            function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details,
            // and then fill-in the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
            }
            }
            }

            // Bias the autocomplete object to the user's geographical location,
            // as supplied by the browser's 'navigator.geolocation' object.
            function geolocate() {
            if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
            };
            var circle = new google.maps.Circle(
            {center: geolocation, radius: position.coords.accuracy});
            autocomplete.setBounds(circle.getBounds());
            });
            }
            }
            </script>

            <script>
                // let map;
                // var uluru = {lat: -25.344, lng: 131.036};
                // function initMap() {
                //     let map = new google.maps.Map(document.getElementById("map"), {
                //         center: { lat: -25.344, lng: 131.036 },
                //         zoom: 8
                //     });
                //
                //     var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));
                //     map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('pac-input'));
                //     google.maps.event.addListener(searchBox, 'places_changed', function() {
                //         searchBox.set('map', null);
                //
                //         var places = searchBox.getPlaces();
                //         var bounds = new google.maps.LatLngBounds();
                //         var i, place;
                //         for (i = 0; place = places[i]; i++) {
                //             (function(place) {
                //                 var marker = new google.maps.Marker({
                //
                //                     position: place.geometry.location
                //                 });
                //                 marker.bindTo('map', searchBox, 'map');
                //                 google.maps.event.addListener(marker, 'map_changed', function() {
                //                     if (!this.getMap()) {
                //                         this.unbindAll();
                //                     }
                //                 });
                //                 bounds.extend(place.geometry.location);
                //
                //
                //             }(place));
                //
                //         }
                //         map.fitBounds(bounds);
                //         searchBox.set('map', map);
                //         map.setZoom(Math.min(map.getZoom(),12));
                //
                //     });
                //     var marker = new google.maps.Marker({position: uluru, map: map});
                //     google.maps.event.addDomListener(window, 'load', initMap);
                //
                // }
                // function init() {
                //     var input = document.getElementById('pac-input');
                //     var autocomplete = new google.maps.places.Autocomplete(input);
                //     google.maps.event.addDomListener(window, 'load', init);
                //
                // }
                // init();

                // var defaultBounds = new google.maps.LatLngBounds(
                //     new google.maps.LatLng(-33.8902, 151.1759),
                //     new google.maps.LatLng(-33.8474, 151.2631));
                //
                // var input = document.getElementById('pac-input');
                // var options = {
                //     bounds: defaultBounds,
                //     types: ['establishment']
                // };
                //
                // autocomplete = new google.maps.places.Autocomplete(input, options);
                //

















                $(document).ready(function(){
                    var nextCheck=false;
                    var type='House';
                    $(document).on('click','.type-link',function (e) {

                        type=$(this).attr('data-type');
                    });

                    $('.btn-next-contactinfo').on('click',function(e){
                        e.preventDefault();
                        if(type==='House'){
                         var block=$('.house-block').val();
                         var street=$('.house-street').val();
                         var avanue=$('.house-avanue').val();
                         var house=$('.house-house').val();
                         var specialdir=$('.house-special-direction').val();
                         var building='';
                         var officeno='';


                        }
                        if(type==='Appartment'){
                            var block=$('.apa-block').val();
                            var street=$('.apa-street').val();
                            var avanue=$('.apa-avanue').val();
                            var house='';
                            var building=$('.apa-building').val();
                            var officeno=$('.apa-office-no').val();
                            var specialdir=$('.apa-special-direction').val();
                            var floor=$('.apa-floor').val();


                        }



                        if(type==='Office'){
                            var block=$('.office-block').val();
                            var street=$('.office-street').val();
                            var avanue=$('.office-avanue').val();
                            var house='';
                            var building=$('.office-building').val();
                            var officeno=$('.office-no').val();
                            var specialdir=$('.office-special-direction').val();

                            var floor=$('.office-floor').val();

                        }



                        if(block==='' || block==null){
                            toastr.error('','Block is Required');
                            return;
                        }
                        if(street==='' || street==null) {
                            toastr.error('', 'Street is Required');
                            return;
                        }
                        if(avanue==='' || avanue==null){
                            toastr.error('','Avavnue is Required');
                            return;
                        }
                        if(house==='' || house==null){
                            toastr.error('','House is Required');
                            return;
                        }

                        // if(building==='' || building==null){
                        //     toastr.error('','building is Required');
                        //     return;
                        // }
                        $.ajax({
                            url:HOST_URL+"/client/addressinfo",
                            type:'GET',
                            data:{'block':block,'street':street,
                                'avanue':avanue,'house':house,'building':building,
                                'officeno':officeno,'special_dir':specialdir,'type':type,
                                'floor':floor
                            },
                            success:function (data) {
                            console.log(data);
                            toastr.success('','Address Added Successfully...');
                            window.location.href=data.url;

                            },
                            error:function(error){
                                console.log(error.responseText);
                            }

                        })

                    });


                    function requiredCheck(value,message){

                       if(value=='' || value==null){
                        nextCheck=false;
                           toastr.error('',message);

                       }
                       nextCheck=true;

                    }
                });

            </script>

            <script src="https://maps.google.com/maps/api/js?key=AIzaSyC1JUHjsnQZtKx5eBOpG42E_CLoJ1s39AU&&libraries=places&callback=initAutocomplete"></script>



@endsection
