@extends('mainpages.mainadmin')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/editor/css/editor.bootstrap4.css') }}" rel="stylesheet" type="text/css">
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

                        <h5 class="text-dark font-weight-bold my-1 mr-5">Schedule</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Admin</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Schedule</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Edit Schedule</a>
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
                        <div class="row">
{{--                            <div class="col-md-2 text-center">Days</div>--}}
                            <div class="col-md-4 text-center">Open Hour</div>
                            <div class="col-md-4 text-center">Close Hour</div>
{{--                            <div class="col-md-3 text-center">Status</div>--}}
                            <div class="col-md-4 text-center">Action</div>
                        </div>
                        <hr>
                        <div class="row">
                            <h3 class="text-center pt-2" style="margin-left:20px;">Monday</h3>
                            <div class="switch switch-outline switch-icon switch-dark pl-3 pb-4" >
                                <label>
                                    <input type="checkbox" @if ($monday->status=="on") checked @endif name="monday_status" id="monday_status" />
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="row mt-5 monday" id="monday">
                            <div data-repeater-list="monday" class="col-lg-12">
                                @if(count($monday_times)>0)
                                @foreach($monday_times as $monday_time)
                                <div data-repeater-item class="form-group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="form-control monday_form" name="monday_from" placeholder="from" value="{{$monday_time->start_time}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="monday_to form-control" name="monday_to" placeholder="to" value="{{$monday_time->end_date}}" readonly>
                                        </div>
                                    </div>
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="form-group" >--}}
{{--                                        <span class="switch switch-outline switch-icon switch-dark" style="margin: 0 auto;width: 50px;">--}}
{{--																<label>--}}
{{--																	<input type="checkbox" checked="checked" name="monday_status" />--}}
{{--																	<span></span>--}}
{{--																</label>--}}
{{--															</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-md-3">
                                        <div class="form-group" style="margin-left: 155px;">
                                        <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                            <i class="la la-trash-o"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                    @else
                                    <div data-repeater-item class="form-group row align-items-center">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="form-control monday_form" name="monday_from" placeholder="from" value="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="monday_to form-control" name="monday_to" placeholder="to" value="" readonly>
                                            </div>
                                        </div>
                                        {{--                                    <div class="col-md-3">--}}
                                        {{--                                        <div class="form-group" >--}}
                                        {{--                                        <span class="switch switch-outline switch-icon switch-dark" style="margin: 0 auto;width: 50px;">--}}
                                        {{--																<label>--}}
                                        {{--																	<input type="checkbox" checked="checked" name="monday_status" />--}}
                                        {{--																	<span></span>--}}
                                        {{--																</label>--}}
                                        {{--															</span>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                        <div class="col-md-3">
                                            <div class="form-group" style="margin-left: 155px;">
                                                <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                    <i class="la la-trash-o"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            </div>
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <div class="form-group" style="margin-left: 65px;">
                                    <a href="javascript:;" data-repeater-create="" class="monday-btn-add btn btn-sm font-weight-bolder btn-light-primary">
                                        <i class="la la-plus"></i>Add</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <h3 class="text-center pt-2" style="margin-left:20px;">Tuesday</h3>
                            <div class="switch switch-outline switch-icon switch-dark pl-3 pb-4" >
                                <label>
                                    <input type="checkbox" @if ($tuesday->status=="on") checked @endif name="tuesday_status" id="tuesday_status" />
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="row mt-5" id="tuesday">
                            <div data-repeater-list="tuesday" class="col-lg-12">
                                @if(count($tuesday_times)>0)
                                @foreach($tuesday_times as $tuesday_time)
                                <div data-repeater-item="" class="form-group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="form-control tuesday_form" name="tuesday_from" placeholder="from" value="{{$tuesday_time->start_time}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="tuesday_to form-control" name="tuesday_to" placeholder="to" value="{{$tuesday_time->end_time}}" readonly>
                                        </div>
                                    </div>
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="form-group" >--}}
{{--                                        <span class="switch switch-outline switch-icon switch-dark" style="margin: 0 auto;width: 50px;">--}}
{{--																<label>--}}
{{--																	<input type="checkbox" checked="checked" name="tuesday_status" />--}}
{{--																	<span></span>--}}
{{--																</label>--}}
{{--															</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-left: 155px;">
                                            <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                <i class="la la-trash-o"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                    @else
                                    <div data-repeater-item="" class="form-group row align-items-center">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="form-control tuesday_form" name="tuesday_from" placeholder="from" value="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="tuesday_to form-control" name="tuesday_to" placeholder="to" value="" readonly>
                                            </div>
                                        </div>
                                        {{--                                    <div class="col-md-3">--}}
                                        {{--                                        <div class="form-group" >--}}
                                        {{--                                        <span class="switch switch-outline switch-icon switch-dark" style="margin: 0 auto;width: 50px;">--}}
                                        {{--																<label>--}}
                                        {{--																	<input type="checkbox" checked="checked" name="tuesday_status" />--}}
                                        {{--																	<span></span>--}}
                                        {{--																</label>--}}
                                        {{--															</span>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                        <div class="col-md-4">
                                            <div class="form-group" style="margin-left: 155px;">
                                                <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                    <i class="la la-trash-o"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                            </div>
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <div class="form-group" style="margin-left: 65px;">
                                    <a href="javascript:;" data-repeater-create="" class="tuesday-btn-add btn btn-sm font-weight-bolder btn-light-primary">
                                        <i class="la la-plus"></i>Add</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <h3 class="text-center pt-2" style="margin-left:20px;">Wednesday</h3>
                            <div class="switch switch-outline switch-icon switch-dark pl-3 pb-4" >
                                <label>
                                    <input type="checkbox" @if ($wednesday->status=="on") checked @endif name="wednesday_status" id="wednesday_status" />
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="row mt-5" id="wednesday">
                            <div data-repeater-list="wednesday" class="col-lg-12">
                                @if(count($wednesday_times)>0)
                                @foreach($wednesday_times as $wednesday_time)
                                <div data-repeater-item="" class="form-group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="form-control wednesday_form" name="wednesday_from" placeholder="from" value="{{$wednesday_time->start_time}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="wednesday_to form-control" name="wednesday_to" placeholder="to" value="{{$wednesday_time->end_time}}" readonly>
                                        </div>
                                    </div>
{{--                                    <div class="col-md-43>--}}
{{--                                        <div class="form-group" >--}}
{{--                                        <span class="switch switch-outline switch-icon switch-dark" style="margin: 0 auto;width: 50px;">--}}
{{--																<label>--}}
{{--																	<input type="checkbox" checked="checked" name="wednesday_status" />--}}
{{--																	<span></span>--}}
{{--																</label>--}}
{{--															</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-left: 155px;">
                                            <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                <i class="la la-trash-o"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                    @else
                                    <div data-repeater-item="" class="form-group row align-items-center">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="form-control wednesday_form" name="wednesday_from" placeholder="from" value="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="wednesday_to form-control" name="wednesday_to" placeholder="to" value="" readonly>
                                            </div>
                                        </div>
                                        {{--                                    <div class="col-md-43>--}}
                                        {{--                                        <div class="form-group" >--}}
                                        {{--                                        <span class="switch switch-outline switch-icon switch-dark" style="margin: 0 auto;width: 50px;">--}}
                                        {{--																<label>--}}
                                        {{--																	<input type="checkbox" checked="checked" name="wednesday_status" />--}}
                                        {{--																	<span></span>--}}
                                        {{--																</label>--}}
                                        {{--															</span>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                        <div class="col-md-4">
                                            <div class="form-group" style="margin-left: 155px;">
                                                <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                    <i class="la la-trash-o"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <div class="form-group" style="margin-left: 65px;">
                                    <a href="javascript:;" data-repeater-create="" class="wednesday-btn-add btn btn-sm font-weight-bolder btn-light-primary">
                                        <i class="la la-plus"></i>Add</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <h3 class="text-center pt-2" style="margin-left:20px;">Thursday</h3>
                            <div class="switch switch-outline switch-icon switch-dark pl-3 pb-4" >
                                <label>
                                    <input type="checkbox" @if ($thursday->status=="on") checked @endif name="thursday_status" id="thursday_status" />
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="row mt-5" id="thursday">
                            <div data-repeater-list="thursday" class="col-lg-12">
                                @if(count($thursday_times)>0)
                                @foreach($thursday_times as $thursday_time)
                                <div data-repeater-item="" class="form-group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="form-control thursday_form" name="thursday_from" placeholder="from" value="{{$thursday_time->start_time}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="thursday_to form-control" name="thursday_to" placeholder="to" value="{{$thursday_time->end_time}}" readonly>
                                        </div>
                                    </div>
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="form-group" >--}}
{{--                                        <span class="switch switch-outline switch-icon switch-dark" style="margin: 0 auto;width: 50px;">--}}
{{--																<label>--}}
{{--																	<input type="checkbox" checked="checked" name="thursday_status" />--}}
{{--																	<span></span>--}}
{{--																</label>--}}
{{--															</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-left: 155px;">
                                            <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                <i class="la la-trash-o"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                @else
                                    <div data-repeater-item="" class="form-group row align-items-center">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="form-control thursday_form" name="thursday_from" placeholder="from" value="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="thursday_to form-control" name="thursday_to" placeholder="to" value="" readonly>
                                            </div>
                                        </div>
                                        {{--                                    <div class="col-md-3">--}}
                                        {{--                                        <div class="form-group" >--}}
                                        {{--                                        <span class="switch switch-outline switch-icon switch-dark" style="margin: 0 auto;width: 50px;">--}}
                                        {{--																<label>--}}
                                        {{--																	<input type="checkbox" checked="checked" name="thursday_status" />--}}
                                        {{--																	<span></span>--}}
                                        {{--																</label>--}}
                                        {{--															</span>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                        <div class="col-md-4">
                                            <div class="form-group" style="margin-left: 155px;">
                                                <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                    <i class="la la-trash-o"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            </div>
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <div class="form-group" style="margin-left: 65px;">
                                    <a href="javascript:;" data-repeater-create="" class="thursday-btn-add btn btn-sm font-weight-bolder btn-light-primary">
                                        <i class="la la-plus"></i>Add</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <h3 class="text-center pt-2" style="margin-left:20px;">Friday</h3>
                            <div class="switch switch-outline switch-icon switch-dark pl-3 pb-4" >
                                <label>
                                    <input type="checkbox" @if ($friday->status=="on") checked @endif name="friday_status" id="friday_status" />
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="row mt-5" id="friday">
                            <div data-repeater-list="friday" class="col-lg-12">
                                @if(count($friday_times)>0)
                                @foreach($friday_times as $friday_time)
                                <div data-repeater-item="" class="form-group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="form-control friday_form" name="friday_from" placeholder="from" value="{{$friday_time->start_time}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="friday_to form-control" name="friday_to" placeholder="to" value="{{$friday_time->end_time}}" readonly>
                                        </div>
                                    </div>
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="form-group" >--}}
{{--                                        <span class="switch switch-outline switch-icon switch-dark" style="margin: 0 auto;width: 50px;">--}}
{{--																<label>--}}
{{--																	<input type="checkbox" checked="checked" name="friday_status" />--}}
{{--																	<span></span>--}}
{{--																</label>--}}
{{--															</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-md-3">
                                        <div class="form-group" style="margin-left: 155px;">
                                            <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                <i class="la la-trash-o"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                    @else
                                    <div data-repeater-item="" class="form-group row align-items-center">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="form-control friday_form" name="friday_from" placeholder="from" value="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="friday_to form-control" name="friday_to" placeholder="to" value="" readonly>
                                            </div>
                                        </div>
                                        {{--                                    <div class="col-md-3">--}}
                                        {{--                                        <div class="form-group" >--}}
                                        {{--                                        <span class="switch switch-outline switch-icon switch-dark" style="margin: 0 auto;width: 50px;">--}}
                                        {{--																<label>--}}
                                        {{--																	<input type="checkbox" checked="checked" name="friday_status" />--}}
                                        {{--																	<span></span>--}}
                                        {{--																</label>--}}
                                        {{--															</span>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                        <div class="col-md-3">
                                            <div class="form-group" style="margin-left: 155px;">
                                                <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                    <i class="la la-trash-o"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <div class="form-group" style="margin-left: 65px;">
                                    <a href="javascript:;" data-repeater-create="" class="friday-btn-add btn btn-sm font-weight-bolder btn-light-primary">
                                        <i class="la la-plus"></i>Add</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <h3 class="text-center pt-2" style="margin-left:20px;">Saturday</h3>
                            <div class="switch switch-outline switch-icon switch-dark pl-3 pb-4" >
                                <label>
                                    <input type="checkbox" @if ($saturday->status=="on") checked @endif name="saturday_status" id="saturday_status" />
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="row mt-5" id="saturday">
                            <div data-repeater-list="saturday" class="col-lg-12">
                                @if(count($saturday_times)>0)
                                @foreach($saturday_times as $saturday_time)
                                <div data-repeater-item="" class="form-group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="form-control saturday_form" name="saturday_from" placeholder="from" value="{{$saturday_time->start_time}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="saturday_to form-control" name="saturday_to" placeholder="to" value="{{$saturday_time->end_time}}" readonly>
                                        </div>
                                    </div>
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="form-group" >--}}
{{--                                        <span class="switch switch-outline switch-icon switch-dark" style="margin: 0 auto;width: 50px;">--}}
{{--																<label>--}}
{{--																	<input type="checkbox" checked="checked" name="saturday_status" />--}}
{{--																	<span></span>--}}
{{--																</label>--}}
{{--															</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-left: 155px;">
                                            <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                <i class="la la-trash-o"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                    @else
                                    <div data-repeater-item="" class="form-group row align-items-center">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="form-control saturday_form" name="saturday_from" placeholder="from" value="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="saturday_to form-control" name="saturday_to" placeholder="to" value="" readonly>
                                            </div>
                                        </div>
                                        {{--                                    <div class="col-md-3">--}}
                                        {{--                                        <div class="form-group" >--}}
                                        {{--                                        <span class="switch switch-outline switch-icon switch-dark" style="margin: 0 auto;width: 50px;">--}}
                                        {{--																<label>--}}
                                        {{--																	<input type="checkbox" checked="checked" name="saturday_status" />--}}
                                        {{--																	<span></span>--}}
                                        {{--																</label>--}}
                                        {{--															</span>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                        <div class="col-md-4">
                                            <div class="form-group" style="margin-left: 155px;">
                                                <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                    <i class="la la-trash-o"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            </div>
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <div class="form-group" style="margin-left: 65px;">
                                    <a href="javascript:;" data-repeater-create="" class="saturday-btn-add btn btn-sm font-weight-bolder btn-light-primary">
                                        <i class="la la-plus"></i>Add</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <h3 class="text-center pt-2" style="margin-left:20px;">Sunday</h3>
                            <div class="switch switch-outline switch-icon switch-dark pl-3 pb-4" >
                                <label>
                                    <input type="checkbox" @if ($sunday->status=="on") checked @endif name="sunday_status" id="sunday_status" />
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="row mt-5" id="sunday">
                            <div data-repeater-list="sunday" class="col-lg-12">
                                @if(count($sunday_times)>0)
                                @foreach($sunday_times as $sunday_time)
                                <div data-repeater-item="" class="form-group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="form-control sunday_form" name="sunday_from" placeholder="from" value="{{$sunday_time->start_time}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="sunday_to form-control" name="sunday_to" placeholder="to" value="{{$sunday_time->end_time}}" readonly>
                                        </div>
                                    </div>
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="form-group" >--}}
{{--                                        <span class="switch switch-outline switch-icon switch-dark" style="margin: 0 auto;width: 50px;">--}}
{{--																<label>--}}
{{--																	<input type="checkbox" checked="checked" name="sunday_status" />--}}
{{--																	<span></span>--}}
{{--																</label>--}}
{{--															</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-left: 155px;">
                                            <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                <i class="la la-trash-o"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                    @else
                                    <div data-repeater-item="" class="form-group row align-items-center">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="form-control sunday_form" name="sunday_from" placeholder="from" value="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="sunday_to form-control" name="sunday_to" placeholder="to" value="" readonly>
                                            </div>
                                        </div>
                                        {{--                                    <div class="col-md-3">--}}
                                        {{--                                        <div class="form-group" >--}}
                                        {{--                                        <span class="switch switch-outline switch-icon switch-dark" style="margin: 0 auto;width: 50px;">--}}
                                        {{--																<label>--}}
                                        {{--																	<input type="checkbox" checked="checked" name="sunday_status" />--}}
                                        {{--																	<span></span>--}}
                                        {{--																</label>--}}
                                        {{--															</span>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                        <div class="col-md-4">
                                            <div class="form-group" style="margin-left: 155px;">
                                                <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                    <i class="la la-trash-o"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <div class="form-group" style="margin-left: 65px;">
                                    <a href="javascript:;" data-repeater-create="" class="sunday-btn-add btn btn-sm font-weight-bolder btn-light-primary">
                                        <i class="la la-plus"></i>Add</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-success" id="submit">Submit</button>
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
    <script src="https://cdn.jsdelivr.net/npm/[email protected]/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.5') }}"></script>
    <script src="{{ asset('/assets/editor/js/dataTables.editor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/select2custom.js') }}"></script>
    <script src="{{ asset('/assets/editor/js/editor.bootstrap4.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/adminside/schedule/edit_schedule.js') }}"></script>
    <script src="{{ asset('adminside/promocode/promocode.js') }}"></script>
@endsection
