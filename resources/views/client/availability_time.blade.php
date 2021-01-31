@extends('mainpages.mainfront')
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-order-mode.css') }}">
    <style>
        .nav-link.active {
            outline: none;
            border-bottom: 2px solid {{ setting()['button_color'] }} !important;
            padding: 4px 0px;
            border-width:0px;
        }

        .accordion>.card{
            border:0px;
        }

        .accordion>.card>.card-header{
            background-color: white;
            border-bottom:0px;
            padding-right: 12px;
        }

        .btn-link {
            font-weight: 500;
            color: black;
            text-decoration: none;
            width: 100%;
            text-align: left;
            padding: 0 0 0 9px;
        }

        .btn-link i {
            float: right;
        }

        .btn-link:hover {
            color: black;
            text-decoration: none;
        }



    </style>
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style-order-product.css') }}">

@endsection
@section('content')


    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-ltr">

        <div class="row">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">



                    <ul class="nav nav-tabs nav-tabs-line" style="width: auto;padding: 0;margin:0;text-align: center;box-shadow: 0 3px 6px -6px black;background-color: rgba(248,247,247,0.36)">
                        @foreach($days as $day)
                        <li class="nav-item" style="width: 25%;padding: 0; margin: 0;">
                            <a class="nav-link @if($day->day == "monday") active @endif" data-toggle="tab" href="#{{$day->day}}">{{strtoupper($day->day)}}</a>
                        </li>
                        @endforeach
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">Link</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                                Dropdown--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu">--}}
{{--                                <a class="dropdown-item" data-toggle="tab" href="#kt_tab_pane_3">Action</a>--}}
{{--                                <a class="dropdown-item" data-toggle="tab" href="#kt_tab_pane_3">Another action</a>--}}
{{--                                <a class="dropdown-item" data-toggle="tab" href="#kt_tab_pane_3">Something else here</a>--}}
{{--                                <div class="dropdown-divider"></div>--}}
{{--                                <a class="dropdown-item" data-toggle="tab" href="#kt_tab_pane_3">Separated link</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link disabled" data-toggle="tab" href="#kt_tab_pane_4" tabindex="-1" aria-disabled="true">Disabled</a>--}}
{{--                        </li>--}}
                    </ul>
                    <div class="tab-content mt-5" id="myTabContent">
                       <?php $count=0; ?>
                        @foreach($days as $key=>$day)
                        <div class="tab-pane fade {{ $count==0?'active show':'' }}" id="{{$day->day}}" role="tabpanel" aria-labelledby="{{$day->day}}">
                            @foreach($day->times as $times)
                            <div class="container"></div>
                                <hr>


                                <div class="form-group">
                                    <input type="radio" data-day="{{ $key }}" data-id="{{ $times->id }}" class="schedual-check variant_name_color" name="check-{{ $key }}"  id="check-{{$times->id}}">
                                    <label for="check-{{$times->id}}">{{$times->start_time .' - '.$times->end_time}}</label>
                                    <span> </span>
                                </div>


                            @endforeach
                            <?php $count++; ?>
                        </div>
                        @endforeach
{{--                        <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">Tab content 2</div>--}}
{{--                        <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel" aria-labelledby="kt_tab_pane_3">Tab content 4</div>--}}
{{--                        <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel" aria-labelledby="kt_tab_pane_4">Tab content 5</div>--}}
                    </div>

                </div>
            </div>
        </div>

    </div>





@endsection

@section('scripts')
    <script>
        $(document).ready(function(e){
            $(document).on('click','.schedual-check',function (e) {
            var id=$(this).attr('data-id');
            var day=$(this).attr('data-day');
            $.ajax({
                url:HOST_URL+"/client/addschedual",
                type:'GET',
                data:{'day_id':day,'id':id},
                success:function (data) {
                    if(data.type=='success'){
                        toastr.success('','Schedual Set Successfully');
                    }else{

                        toastr.error('','Problem While Updating Schedual');
                    }


                }
            })

            })


        })
    </script>
@endsection
