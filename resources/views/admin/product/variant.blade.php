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

                        <h5 class="text-dark font-weight-bold my-1 mr-5">Product Variants</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Admin</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Product</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Variants</a>
                            </li>

                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <a href="#VariantHeadModal" data-toggle="modal" data-target="#VariantHeadModal"  class="btn btn-success ">
                        Variant Head
                    </a>
                </div>
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

                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom table-foot-custom table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                            <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                <!-- <th>Product</th> -->
                                <th>Variant Head</th>
                                <th>Variant Name</th>
                                <!-- <th>Variant Name Arabic</th> -->
                                <th>Variant Price</th>
                                <th>Sale Price (USD)</th>
                                <th>Sale Price (BD)</th>
                                <th>Sale Price (OMR)</th>
                                <th>Sale Price (QAR)</th>
                                <th>Sale Price (SAR)</th>
                                <th>Sale Price (AED)</th>
                                <th>Manage Stock</th>
                                <th>Variant Stock</th>
                            </tr>
                            </thead>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>



{{--  variant head datatable in modal  --}}



    <div class="modal fade" id="VariantHeadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Variant Heads</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-body">


                                <div style="text-align: right;" class="btn-group" id="dtButtonsVariantHeads" role="group" aria-label="Button group with nested dropdown">
                                </div>

                                <!--begin: Datatable-->
                                <table class="table table-separate table-head-custom table-foot-custom table-checkable" id="variantHead" style="margin-top: 13px !important">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product </th>
                                        <th>Variant Head</th>
                                        <th>Variant Head Arabic</th>
                                    </tr>
                                    </thead>
                                </table>
                                <!--end: Datatable-->
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
{{--                    <button type="button" class="btn btn-primary font-weight-bold">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.5') }}"></script>
    <script src="{{ url('/assets/editor/js/dataTables.editor.js') }}" type="text/javascript"></script>
    <script src="{{ url('/assets/editor/js/editor.bootstrap4.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/js/select2custom.js') }}"></script>
    <script src="{{ asset('adminside/product/variant.js') }}"></script>
@endsection
