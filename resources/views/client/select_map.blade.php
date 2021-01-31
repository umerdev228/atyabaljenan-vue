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
        #pac-input{
            background: whitesmoke;
            border:1px solid grey;
        }
    </style>

@endsection


@section('content')


    <header class="review-header">
        <h1>Checkout</h1>
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

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-ltr-header">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                                <input id="pac-input" placeholder="Search Address Here " value="" required name="house"  class="additional-info3 house-house form-control">
                                <label for="pac-input" class="add-instruction3">@lang('messages.search') @lang('messages.address')</label>
                        </div>

                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="map" style="height: 400px;">
                    </div>
                </div>
            </div>



        </div>


        @endsection

        @section('scripts')
            {{--            <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>--}}
            <script>
                let address=null;
                $('#select_address').on('click',function () {
                    if (address == "" || address == null){
                        toastr.error('','Please Select Your Precise Address on map');
                    }else{
                        console.log(address);
                        $.ajax({
                            url:'{{url("client/saveMapAddress")}}',
                            type:'get',
                            data:{'address':address},
                            success:function(data){
                                console.log(data);
                                if(data=="success"){
                                    window.location.assign('{{url('client/checkout')}}');
                                    }
                                },
                            error:function(err){
                                console.log(err.responseText);
                            }
                        });
                    }
                });

                function initAutocomplete() {
                    const map = new google.maps.Map(document.getElementById("map"), {
                        center: { lat: 29.3117, lng: 47.4818 },
                        zoom: 13,
                        mapTypeId: "roadmap"
                    });
                    // Create the search box and link it to the UI element.
                    const input = document.getElementById("pac-input");
                    const searchBox = new google.maps.places.SearchBox(input);
                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
                    // Bias the SearchBox results towards current map's viewport.
                    map.addListener("bounds_changed", () => {
                        searchBox.setBounds(map.getBounds());
                    });
                    let markers = [];
                    // Listen for the event fired when the user selects a prediction and retrieve
                    // more details for that place.
                    searchBox.addListener("places_changed", () => {
                        const places = searchBox.getPlaces();
                        if (places.length == 0) {
                            return;
                        }
                        // Clear out the old markers.
                        markers.forEach(marker => {
                            marker.setMap(null);
                        });
                        markers = [];
                        // For each place, get the icon, name and location.
                        const bounds = new google.maps.LatLngBounds();
                        places.forEach(place => {
                            address=place.adr_address;
                            if (!place.geometry) {

                                console.log("Returned place contains no geometry");
                                return;
                            }
                            const icon = {
                                url: place.icon,
                                size: new google.maps.Size(71, 71),
                                origin: new google.maps.Point(0, 0),
                                anchor: new google.maps.Point(17, 34),
                                scaledSize: new google.maps.Size(25, 25)
                            };
                            // Create a marker for each place.
                            markers.push(
                                new google.maps.Marker({
                                    map,
                                    icon,
                                    title: place.name,
                                    position: place.geometry.location
                                })
                            );

                            if (place.geometry.viewport) {
                                // Only geocodes have viewport.
                                bounds.union(place.geometry.viewport);
                            } else {
                                bounds.extend(place.geometry.location);
                            }
                        });
                        map.fitBounds(bounds);
                    });
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


            </script>

            <script src="https://maps.google.com/maps/api/js?key=AIzaSyC1JUHjsnQZtKx5eBOpG42E_CLoJ1s39AU&&libraries=places&callback=initAutocomplete"></script>



@endsection
