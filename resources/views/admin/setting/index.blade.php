@extends('mainpages.mainadmin')
@section('css')
    <style>
        .bootstrap-switch {
            display: block;
            margin-left: auto;
        }
    </style>
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->

                        <h5 class="text-dark font-weight-bold my-1 mr-5">Settings</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Admin</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Setting</a>
                            </li>


                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->

                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-body">


                        <div class="card card-custom">
                            <div class="card-header">
                                <h3 class="card-title">
                                   Site Setting
                                </h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" method="post" enctype="multipart/form-data" action="{{ url('admin/setting/postsettings') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group form-group-last">
{{--                                        <div class="alert alert-custom alert-default" role="alert">--}}
{{--                                            <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>--}}
{{--                                            <div class="alert-text">--}}
{{--                                               This setting will effect you website.--}}
{{--                                                Colors and background will be effected and your site name.--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="form-group">
                                        <label>Site Name</label>
                                        <input type="text"  value="{{ $setting?$setting->site_name:'' }}" class="form-control form-control-solid" name="site_name"
                                               placeholder="Enter You Site Name"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Site Name (Arabic)</label>
                                        <input type="text"  value="{{ $setting?$setting->site_name_ar:'' }}" class="form-control form-control-solid" name="site_name_ar"
                                               placeholder="Enter You Site Name (Arabic)"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea">Site Description</label>
                                        <textarea class="form-control form-control-solid" name="site_description"
                                                  rows="3">{{ $setting?$setting->site_description:'' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea">Site Description (Arabic)</label>
                                        <textarea class="form-control form-control-solid" name="site_description_ar"
                                                  rows="3">{{ $setting?$setting->site_description_ar:'' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Currency Now ({{ $setting?$setting->currency:'' }})</label>
                                        <select class="form-control form-control-solid" name="currency">
                                            <option value="USD" selected="selected" label="US dollar">USD</option>
                                            <option value="EUR" label="Euro">EUR</option>
                                            <option value="JPY" label="Japanese yen">JPY</option>
                                            <option value="GBP" label="Pound sterling">GBP</option>
                                            <option disabled>──────────</option>
                                            <option value="AED" label="United Arab Emirates dirham">AED</option>
                                            <option value="AFN" label="Afghan afghani">AFN</option>
                                            <option value="ALL" label="Albanian lek">ALL</option>
                                            <option value="AMD" label="Armenian dram">AMD</option>
                                            <option value="ANG" label="Netherlands Antillean guilder">ANG</option>
                                            <option value="AOA" label="Angolan kwanza">AOA</option>
                                            <option value="ARS" label="Argentine peso">ARS</option>
                                            <option value="AUD" label="Australian dollar">AUD</option>
                                            <option value="AWG" label="Aruban florin">AWG</option>
                                            <option value="AZN" label="Azerbaijani manat">AZN</option>
                                            <option value="BAM" label="Bosnia and Herzegovina convertible mark">BAM
                                            </option>
                                            <option value="BBD" label="Barbadian dollar">BBD</option>
                                            <option value="BDT" label="Bangladeshi taka">BDT</option>
                                            <option value="BGN" label="Bulgarian lev">BGN</option>
                                            <option value="BHD" label="Bahraini dinar">BHD</option>
                                            <option value="BIF" label="Burundian franc">BIF</option>
                                            <option value="BMD" label="Bermudian dollar">BMD</option>
                                            <option value="BND" label="Brunei dollar">BND</option>
                                            <option value="BOB" label="Bolivian boliviano">BOB</option>
                                            <option value="BRL" label="Brazilian real">BRL</option>
                                            <option value="BSD" label="Bahamian dollar">BSD</option>
                                            <option value="BTN" label="Bhutanese ngultrum">BTN</option>
                                            <option value="BWP" label="Botswana pula">BWP</option>
                                            <option value="BYN" label="Belarusian ruble">BYN</option>
                                            <option value="BZD" label="Belize dollar">BZD</option>
                                            <option value="CAD" label="Canadian dollar">CAD</option>
                                            <option value="CDF" label="Congolese franc">CDF</option>
                                            <option value="CHF" label="Swiss franc">CHF</option>
                                            <option value="CLP" label="Chilean peso">CLP</option>
                                            <option value="CNY" label="Chinese yuan">CNY</option>
                                            <option value="COP" label="Colombian peso">COP</option>
                                            <option value="CRC" label="Costa Rican colón">CRC</option>
                                            <option value="CUC" label="Cuban convertible peso">CUC</option>
                                            <option value="CUP" label="Cuban peso">CUP</option>
                                            <option value="CVE" label="Cape Verdean escudo">CVE</option>
                                            <option value="CZK" label="Czech koruna">CZK</option>
                                            <option value="DJF" label="Djiboutian franc">DJF</option>
                                            <option value="DKK" label="Danish krone">DKK</option>
                                            <option value="DOP" label="Dominican peso">DOP</option>
                                            <option value="DZD" label="Algerian dinar">DZD</option>
                                            <option value="EGP" label="Egyptian pound">EGP</option>
                                            <option value="ERN" label="Eritrean nakfa">ERN</option>
                                            <option value="ETB" label="Ethiopian birr">ETB</option>
                                            <option value="EUR" label="EURO">EUR</option>
                                            <option value="FJD" label="Fijian dollar">FJD</option>
                                            <option value="FKP" label="Falkland Islands pound">FKP</option>
                                            <option value="GBP" label="British pound">GBP</option>
                                            <option value="GEL" label="Georgian lari">GEL</option>
                                            <option value="GGP" label="Guernsey pound">GGP</option>
                                            <option value="GHS" label="Ghanaian cedi">GHS</option>
                                            <option value="GIP" label="Gibraltar pound">GIP</option>
                                            <option value="GMD" label="Gambian dalasi">GMD</option>
                                            <option value="GNF" label="Guinean franc">GNF</option>
                                            <option value="GTQ" label="Guatemalan quetzal">GTQ</option>
                                            <option value="GYD" label="Guyanese dollar">GYD</option>
                                            <option value="HKD" label="Hong Kong dollar">HKD</option>
                                            <option value="HNL" label="Honduran lempira">HNL</option>
                                            <option value="HKD" label="Hong Kong dollar">HKD</option>
                                            <option value="HRK" label="Croatian kuna">HRK</option>
                                            <option value="HTG" label="Haitian gourde">HTG</option>
                                            <option value="HUF" label="Hungarian forint">HUF</option>
                                            <option value="IDR" label="Indonesian rupiah">IDR</option>
                                            <option value="ILS" label="Israeli new shekel">ILS</option>
                                            <option value="IMP" label="Manx pound">IMP</option>
                                            <option value="INR" label="Indian rupee">INR</option>
                                            <option value="IQD" label="Iraqi dinar">IQD</option>
                                            <option value="IRR" label="Iranian rial">IRR</option>
                                            <option value="ISK" label="Icelandic króna">ISK</option>
                                            <option value="JEP" label="Jersey pound">JEP</option>
                                            <option value="JMD" label="Jamaican dollar">JMD</option>
                                            <option value="JOD" label="Jordanian dinar">JOD</option>
                                            <option value="JPY" label="Japanese yen">JPY</option>
                                            <option value="KES" label="Kenyan shilling">KES</option>
                                            <option value="KGS" label="Kyrgyzstani som">KGS</option>
                                            <option value="KHR" label="Cambodian riel">KHR</option>
                                            <option value="KID" label="Kiribati dollar">KID</option>
                                            <option value="KMF" label="Comorian franc">KMF</option>
                                            <option value="KPW" label="North Korean won">KPW</option>
                                            <option value="KRW" label="South Korean won">KRW</option>
                                            <option value="KWD" label="Kuwaiti dinar">KWD</option>
                                            <option value="KYD" label="Cayman Islands dollar">KYD</option>
                                            <option value="KZT" label="Kazakhstani tenge">KZT</option>
                                            <option value="LAK" label="Lao kip">LAK</option>
                                            <option value="LBP" label="Lebanese pound">LBP</option>
                                            <option value="LKR" label="Sri Lankan rupee">LKR</option>
                                            <option value="LRD" label="Liberian dollar">LRD</option>
                                            <option value="LSL" label="Lesotho loti">LSL</option>
                                            <option value="LYD" label="Libyan dinar">LYD</option>
                                            <option value="MAD" label="Moroccan dirham">MAD</option>
                                            <option value="MDL" label="Moldovan leu">MDL</option>
                                            <option value="MGA" label="Malagasy ariary">MGA</option>
                                            <option value="MKD" label="Macedonian denar">MKD</option>
                                            <option value="MMK" label="Burmese kyat">MMK</option>
                                            <option value="MNT" label="Mongolian tögrög">MNT</option>
                                            <option value="MOP" label="Macanese pataca">MOP</option>
                                            <option value="MRU" label="Mauritanian ouguiya">MRU</option>
                                            <option value="MUR" label="Mauritian rupee">MUR</option>
                                            <option value="MVR" label="Maldivian rufiyaa">MVR</option>
                                            <option value="MWK" label="Malawian kwacha">MWK</option>
                                            <option value="MXN" label="Mexican peso">MXN</option>
                                            <option value="MYR" label="Malaysian ringgit">MYR</option>
                                            <option value="MZN" label="Mozambican metical">MZN</option>
                                            <option value="NAD" label="Namibian dollar">NAD</option>
                                            <option value="NGN" label="Nigerian naira">NGN</option>
                                            <option value="NIO" label="Nicaraguan córdoba">NIO</option>
                                            <option value="NOK" label="Norwegian krone">NOK</option>
                                            <option value="NPR" label="Nepalese rupee">NPR</option>
                                            <option value="NZD" label="New Zealand dollar">NZD</option>
                                            <option value="OMR" label="Omani rial">OMR</option>
                                            <option value="PAB" label="Panamanian balboa">PAB</option>
                                            <option value="PEN" label="Peruvian sol">PEN</option>
                                            <option value="PGK" label="Papua New Guinean kina">PGK</option>
                                            <option value="PHP" label="Philippine peso">PHP</option>
                                            <option value="PKR" label="Pakistani rupee">PKR</option>
                                            <option value="PLN" label="Polish złoty">PLN</option>
                                            <option value="PRB" label="Transnistrian ruble">PRB</option>
                                            <option value="PYG" label="Paraguayan guaraní">PYG</option>
                                            <option value="QAR" label="Qatari riyal">QAR</option>
                                            <option value="RON" label="Romanian leu">RON</option>
                                            <option value="RON" label="Romanian leu">RON</option>
                                            <option value="RSD" label="Serbian dinar">RSD</option>
                                            <option value="RUB" label="Russian ruble">RUB</option>
                                            <option value="RWF" label="Rwandan franc">RWF</option>
                                            <option value="SAR" label="Saudi riyal">SAR</option>
                                            <option value="SEK" label="Swedish krona">SEK</option>
                                            <option value="SGD" label="Singapore dollar">SGD</option>
                                            <option value="SHP" label="Saint Helena pound">SHP</option>
                                            <option value="SLL" label="Sierra Leonean leone">SLL</option>
                                            <option value="SLS" label="Somaliland shilling">SLS</option>
                                            <option value="SOS" label="Somali shilling">SOS</option>
                                            <option value="SRD" label="Surinamese dollar">SRD</option>
                                            <option value="SSP" label="South Sudanese pound">SSP</option>
                                            <option value="STN" label="São Tomé and Príncipe dobra">STN</option>
                                            <option value="SYP" label="Syrian pound">SYP</option>
                                            <option value="SZL" label="Swazi lilangeni">SZL</option>
                                            <option value="THB" label="Thai baht">THB</option>
                                            <option value="TJS" label="Tajikistani somoni">TJS</option>
                                            <option value="TMT" label="Turkmenistan manat">TMT</option>
                                            <option value="TND" label="Tunisian dinar">TND</option>
                                            <option value="TOP" label="Tongan paʻanga">TOP</option>
                                            <option value="TRY" label="Turkish lira">TRY</option>
                                            <option value="TTD" label="Trinidad and Tobago dollar">TTD</option>
                                            <option value="TVD" label="Tuvaluan dollar">TVD</option>
                                            <option value="TWD" label="New Taiwan dollar">TWD</option>
                                            <option value="TZS" label="Tanzanian shilling">TZS</option>
                                            <option value="UAH" label="Ukrainian hryvnia">UAH</option>
                                            <option value="UGX" label="Ugandan shilling">UGX</option>
                                            <option value="USD" label="United States dollar">USD</option>
                                            <option value="UYU" label="Uruguayan peso">UYU</option>
                                            <option value="UZS" label="Uzbekistani soʻm">UZS</option>
                                            <option value="VES" label="Venezuelan bolívar soberano">VES</option>
                                            <option value="VND" label="Vietnamese đồng">VND</option>
                                            <option value="VUV" label="Vanuatu vatu">VUV</option>
                                            <option value="WST" label="Samoan tālā">WST</option>
                                            <option value="XAF" label="Central African CFA franc">XAF</option>
                                            <option value="XCD" label="Eastern Caribbean dollar">XCD</option>
                                            <option value="XOF" label="West African CFA franc">XOF</option>
                                            <option value="XPF" label="CFP franc">XPF</option>
                                            <option value="ZAR" label="South African rand">ZAR</option>
                                            <option value="ZMW" label="Zambian kwacha">ZMW</option>
                                            <option value="ZWB" label="Zimbabwean bonds">ZWB</option>
                                        </select>
                                    </div>

                                    <?php
                                    $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
                                    ?>
                                    <div class="form-group">
                                        <label>Currency Symbol</label>
                                        <input type="text" class="form-control form-control-solid" value="{{ $setting?$setting->currency_symbol:'' }}" name="currency_symbol"
                                               placeholder="Enter Currency Symbol (Arabic)"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Time Zone- (Selected {{ $setting?$setting->timzone:'' }}</label>
                                        <select class="form-control form-control-solid" name="time_zone" id="time_zone_select">
                                            @foreach($tzlist as $tz)
                                                @if($tz=='Asia/Kuwait')
                                                    <option value="{{ $tz }}" selected>{{ $tz }}</option>

                                                @else
                                                    <option value="{{ $tz }}">{{ $tz }}</option>

                                                @endif

                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea">Delivery Information</label>
                                        <textarea class="form-control form-control-solid" rows="3"
                                                  name="delivery_info">{{ $setting?$setting->delivery_info:'' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea">Delivery Information (Arabic)</label>
                                        <textarea  class="form-control form-control-solid"  name="delivery_info_ar"
                                                  rows="3">{{ $setting?$setting->delivery_info_ar:'' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea">Restaurant Address</label>
                                        <textarea class="form-control form-control-solid" rows="3"
                                                  name="restaurant_address">{{ $setting?$setting->company_address:'' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea">Restaurant Address (Arabic)</label>
                                        <textarea  class="form-control form-control-solid"  name="restaurant_address_ar"
                                                  rows="3">{{ $setting?$setting->restaurant_address_ar:'' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea">Opening Time</label>

                                        <input class="form-control form-control-solid" value="{{ $setting?$setting->open_from:'' }}" name="opening_time" id="kt_timepicker_2" readonly
                                               placeholder="Select Opening Time" type="text"/>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea">Closing Time</label>

                                        <input class="form-control form-control-solid" name="closing_time" value="{{ $setting?$setting->open_to:'' }}" id="kt_timepicker_3" readonly
                                               placeholder="Select Closing Time" type="text"/>

                                    </div>
                                    <div class="form-group row">
                                        <label>Take Orders</label>
                                        <input style="display: block" {{ $setting?($setting->take_order==1?'checked':''):'' }} value="1" data-switch="true" name="take_order" type="checkbox"  data-on-text="Enabled" data-handle-width="70" data-off-text="Disabled" data-on-color="success" />

                                    </div>
                                    <div class="form-group row">
                                        <label>Min Order (Kw)</label>
                                        <input type="number" name="min_order" value="{{ $setting?$setting->min_order:'1' }}" class="form-control"  placeholder="Min Order...">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Logo</label>
                                        <div class="col-md-8">
                                            <div class="image-input image-input-outline" id="kt_image_4"
                                                 style="background-image: url('{{ url( $setting?($setting->logo!=null?$setting->logo:''):'') }}')">
                                                <div class="image-input-wrapper"
                                                     style="background-image:url('{{ url( $setting?($setting->logo!=null?$setting->logo:''):'') }}')"></div>

                                                <label
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="change" data-toggle="tooltip" title=""
                                                    data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="logo"
                                                           accept=".png, .jpg, .jpeg"/>
                                                    <input type="hidden" name="profile_avatar_remove"/>
                                                </label>

                                                <span
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                    </span>

                                                <span
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="remove" data-toggle="tooltip" title="Remove avatar">
  <i class="ki ki-bold-close icon-xs text-muted"></i>
 </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <label class="col-md-4">Background Image</label>
                                        <div class="image-input col-md-8 image-input-outline text-center"
                                             id="kt_image_5"
                                             style="background-image: url('{{ url( $setting?($setting->background!=null?$setting->background:''):'') }}')">
                                            <div sty class="image-input-wrapper"
                                                 style="background-image:url('{{ url( $setting?($setting->background!=null?$setting->background:''):'') }}');width: 100%"></div>

                                            <label
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="change" data-toggle="tooltip" title=""
                                                data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="background_image" accept=".png, .jpg, .jpeg"/>
                                                <input type="hidden" name="profile_avatar_remove"/>
                                            </label>

                                            <span
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                    </span>

                                            <span
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="remove" data-toggle="tooltip" title="Remove avatar">
  <i class="ki ki-bold-close icon-xs text-muted"></i>
 </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4">Favicon</label>
                                        <div class="col-md-8">
                                            <div class="image-input image-input-outline" id="kt_image_6"
                                                 style="background-image: url('{{ url( $setting? ($setting->favicon!=null?$setting->favicon:''):'') }}')">
                                                <div class="image-input-wrapper"
                                                     style="background-image:url('{{ url( $setting?($setting->favicon!=null?$setting->favicon:''):'') }}')"></div>

                                                <label
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="change" data-toggle="tooltip" title=""
                                                    data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="favicone"
                                                           accept=".png, .jpg, .jpeg"/>
                                                    <input type="hidden" name="profile_avatar_remove"/>
                                                </label>

                                                <span
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                    </span>

                                                <span
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="remove" data-toggle="tooltip" title="Remove avatar">
  <i class="ki ki-bold-close icon-xs text-muted"></i>
 </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-color-input" class="col-2 col-form-label">Button Color</label>
                                        <div class="col-10">
                                            <input class="form-control" name="button_color" type="color" value="{{  $setting?$setting->button_color:''}}" id="example-color-input"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-color-input" class="col-2 col-form-label">Primary Color</label>
                                        <div class="col-10">
                                            <input class="form-control" name="category_color" type="color" value="{{  $setting?$setting->category_color:''}}" id="example-color-input"/>
                                        </div>
                                    </div>
{{--                                    <div class="form-group row">--}}
{{--                                        <label for="example-color-input" class="col-2 col-form-label">Background Color</label>--}}
{{--                                        <div class="col-10">--}}
{{--                                            <input class="form-control" name="background_color"  type="color" value="{{  $setting?$setting->background_color:''}}" id="example-color-input"/>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.5') }}"></script>
    <script src="{{ asset('/assets/editor/js/dataTables.editor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/editor/js/editor.bootstrap4.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/select2custom.js') }}"></script>
    <script src="{{ url('adminside/governmentandareas/areas.js') }}"></script>

    <script>
        $(document).ready(function (e) {
            $('#time_zone_select').select2();

        })

        var KTBootstrapTimepicker = function () {

            // Private functions
            var demos = function () {
                // minimum setup


                // default time
                $('#kt_timepicker_2,#kt_timepicker_3').timepicker({
                    defaultTime: '11:45:20 AM',
                    minuteStep: 1,
                    showSeconds: true,
                    showMeridian: true
                });

                // default time

                var avatar5 = new KTImageInput('kt_image_5');

                avatar5.on('cancel', function (imageInput) {
                    swal.fire({
                        title: 'Image successfully changed !',
                        type: 'success',
                        buttonsStyling: false,
                        confirmButtonText: 'Awesome!',
                        confirmButtonClass: 'btn btn-primary font-weight-bold'
                    });
                });

            }
            var avatar4 = new KTImageInput('kt_image_4');

            avatar4.on('cancel', function (imageInput) {
                swal.fire({
                    title: 'Image successfully canceled !',
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonText: 'Awesome!',
                    confirmButtonClass: 'btn btn-primary font-weight-bold'
                });
            });

            avatar4.on('change', function (imageInput) {
                swal.fire({
                    title: 'Image successfully changed !',
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonText: 'Awesome!',
                    confirmButtonClass: 'btn btn-primary font-weight-bold'
                });
            });


            avatar4.on('remove', function (imageInput) {
                swal.fire({
                    title: 'Image successfully removed !',
                    type: 'error',
                    buttonsStyling: false,
                    confirmButtonText: 'Got it!',
                    confirmButtonClass: 'btn btn-primary font-weight-bold'
                });
            });


            var avatar6 = new KTImageInput('kt_image_6');

            avatar6.on('cancel', function (imageInput) {
                swal.fire({
                    title: 'Image successfully canceled !',
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonText: 'Awesome!',
                    confirmButtonClass: 'btn btn-primary font-weight-bold'
                });
            });

            avatar6.on('change', function (imageInput) {
                swal.fire({
                    title: 'Image successfully changed !',
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonText: 'Awesome!',
                    confirmButtonClass: 'btn btn-primary font-weight-bold'
                });
            });

            avatar6.on('remove', function (imageInput) {
                swal.fire({
                    title: 'Image successfully removed !',
                    type: 'error',
                    buttonsStyling: false,
                    confirmButtonText: 'Got it!',
                    confirmButtonClass: 'btn btn-primary font-weight-bold'
                });

            });




            return {
                // public functions
                init: function () {
                    demos();
                }
            };
        }();


        var KTBootstrapSwitch = function() {

// Private functions
            var demos = function() {
                // minimum setup
                $('[data-switch=true]').bootstrapSwitch();
            };

            return {
                // public functions
                init: function() {
                    demos();
                },
            };
        }();

        jQuery(document).ready(function() {
            KTBootstrapSwitch.init();
        });
        jQuery(document).ready(function () {
            KTBootstrapTimepicker.init();
        });
    </script>
@endsection

