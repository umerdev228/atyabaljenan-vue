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

                        <h5 class="text-dark font-weight-bold my-1 mr-5">New User</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Admin</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">User</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">New User</a>
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


                        <div style="text-align: right;" class="btn-group" id="dtButtons" role="group" aria-label="Button group with nested dropdown">
                        </div>
                        <div class="container">
                            <h3 align="center">New User</h3>
                            <form class="form" id="kt_form_1" enctype="multipart/form-data" method="post"  action="{{ url('admin/user/postuser') }}">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Full Name:</label>
                                            <input type="email" class="form-control" name="name" placeholder="Enter full name"/>
                                            <span class="form-text text-muted">Please enter your full name</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Contact Number:</label>
                                            <input type="email" name="phone" class="form-control" placeholder="Enter contact number"/>
                                            <span class="form-text text-muted">Please enter your contact number</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Email:</label>
                                            <div class="input-group">
                                                <input name="email" type="text" class="form-control" placeholder="Enter your email"/>
                                                <div class="input-group-append"><span class="input-group-text"><i class="la la-mail-forward"></i></span></div>
                                            </div>
                                            <span class="form-text text-muted">Please Enter Email</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Password :</label>
                                            <div class="input-group">
                                                <input name="password" type="password" class="form-control" placeholder="Enter Password"/>
                                                <div class="input-group-append"><span class="input-group-text"><i class="la la-lock"></i></span></div>
                                            </div>
                                            <span class="form-text text-muted">Please Enter Password</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Address:</label>
                                            <div class="input-group">
                                                <input name="address" type="text" class="form-control" placeholder="Enter your address"/>
                                                <div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker"></i></span></div>
                                            </div>
                                            <span class="form-text text-muted">Please enter your address</span>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>User Group:</label>
                                            <div class="radio-inline">
                                                <label class="radio radio-solid">
                                                    <input type="radio" name="type"  checked="checked" value="Owner"/>
                                                    <span></span>
                                                    Owner
                                                </label>

                                            </div>
                                            <div class="radio-inline">
                                                <label class="radio radio-solid">
                                                    <input type="radio" name="type"  checked="checked" value="Staff"/>
                                                    <span></span>
                                                    Staff
                                                </label>

                                            </div>
                                            <span class="form-text text-muted">Please select user group</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 text-center">
                                            <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url('{{ url('assets/media/users/blank.png') }}')">
                                                <div class="image-input-wrapper"></div>

                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="profile_avatar" id="profile_avatar" accept=".png, .jpg, .jpeg"/>
                                                    <input type="hidden" name="profile_avatar_remove"/>
                                                </label>

                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar"><i class="ki ki-bold-close icon-xs text-muted"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-primary mr-2">Save</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <button type="reset" class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!--begin: Datatable-->

                        <!--end: Datatable-->
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
    <script src="{{ asset('adminside/user/newuser.js') }}"></script>
    <script>
        $('#profile_avatar').on('change',function(e){
            console.log(e);
            readURL(this);
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // $('#blah').attr('src', e.target.result);
                    // $('#kt_image_5').css('background_image', e.target.result);
                    $('#kt_image_5').css('background-image', 'url(' + e.target.result + ')');


                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
    </script>
@endsection
