@extends('mainpages.mainadmin')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/editor/css/editor.bootstrap4.css') }}" rel="stylesheet" type="text/css">
    <style>
        .fixedHeader-floating{
            z-index: 100000!important;
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Products</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
{{--                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">--}}
{{--                            <li class="breadcrumb-item">--}}
{{--                                <a href="" class="text-muted">Crud</a>--}}
{{--                            </li>--}}
{{--                            <li class="breadcrumb-item">--}}
{{--                                <a href="" class="text-muted">Datatables.net</a>--}}
{{--                            </li>--}}
{{--                            <li class="breadcrumb-item">--}}
{{--                                <a href="" class="text-muted">Data sources</a>--}}
{{--                            </li>--}}
{{--                            <li class="breadcrumb-item">--}}
{{--                                <a href="" class="text-muted">Ajax Server-side</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
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
                        <div style="text-align: right" id="dtButtons"></div>
                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom table-foot-custom table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Name Arabic</th>
                                <th>Image</th>
                                <th>Sale Price (KWD)</th>
                                <th>Sale Price (BD)</th>
                                <th>Sale Price (OMR)</th>
                                <th>Sale Price (QAR)</th>
                                <th>Sale Price (SAR)</th>
                                <th>Sale Price (AED)</th>
                                <th>Sale Price (USD)</th>
                                <th>Sale Price Without Discount</th>
                                <th>Discount Percentage</th>
                                <th>Stock</th>
                                <th>Description</th>
                                <th>Description Arabic</th>
                                <th>Order Level</th>
                                <th>Display</th>
                                <th>Manage Stock</th>
                            </tr>
                            </thead>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->

@endsection

@section('js')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.5') }}"></script>
    <script src="{{ url('/assets/editor/js/dataTables.editor.js') }}" type="text/javascript"></script>

    <script src="{{ url('/assets/editor/js/editor.bootstrap4.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/js/select2custom.js') }}"></script>

    <script src="{{ asset('adminside/product/product.js') }}"></script>
@endsection
