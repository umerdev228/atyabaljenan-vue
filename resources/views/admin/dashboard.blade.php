@extends('mainpages.mainadmin')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/editor/css/editor.bootstrap4.css') }}" rel="stylesheet" type="text/css">
    <style>
        .dt-button-collection{
            left: 0 !important;
            min-width: 82px !important;
        }
    </style>
@endsection


@section('content')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
                    <!--end::Page Title-->
                    <!--begin::Actions-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                    <span class="text-muted font-weight-bold mr-4">#XRS-45670</span>
                    <a href="#" class="btn btn-light-warning font-weight-bolder btn-sm">Add New</a>
                    <!--end::Actions-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
{{--                <div class="d-flex align-items-center">--}}
{{--                    <!--begin::Actions-->--}}
{{--                    <a href="#" class="btn btn-clean btn-hover-light-primary- active btn-sm font-weight-bold font-size-base mr-1">Today</a>--}}
{{--                    <a href="#" class="btn btn-clean btn-hover-light-primary- btn-sm font-weight-bold font-size-base mr-1">Month</a>--}}
{{--                    <a href="#" class="btn btn-clean btn-hover-light-primary- btn-sm font-weight-bold font-size-base mr-1">Year</a>--}}
{{--                    <!--end::Actions-->--}}
{{--                    <!--begin::Dropdowns-->--}}
{{--                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">--}}
{{--                        <a href="#" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--											<span class="svg-icon svg-icon-success svg-icon-lg">--}}
{{--												<!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->--}}
{{--												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--														<polygon points="0 0 24 0 24 24 0 24" />--}}
{{--														<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />--}}
{{--														<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />--}}
{{--													</g>--}}
{{--												</svg>--}}
{{--                                                <!--end::Svg Icon-->--}}
{{--											</span>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right py-3">--}}
{{--                            <!--begin::Navigation-->--}}
{{--                            <ul class="navi navi-hover py-5">--}}
{{--                                <li class="navi-item">--}}
{{--                                    <a href="#" class="navi-link">--}}
{{--														<span class="navi-icon">--}}
{{--															<i class="flaticon2-drop"></i>--}}
{{--														</span>--}}
{{--                                        <span class="navi-text">New Group</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="navi-item">--}}
{{--                                    <a href="#" class="navi-link">--}}
{{--														<span class="navi-icon">--}}
{{--															<i class="flaticon2-list-3"></i>--}}
{{--														</span>--}}
{{--                                        <span class="navi-text">Contacts</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="navi-item">--}}
{{--                                    <a href="#" class="navi-link">--}}
{{--														<span class="navi-icon">--}}
{{--															<i class="flaticon2-rocket-1"></i>--}}
{{--														</span>--}}
{{--                                        <span class="navi-text">Groups</span>--}}
{{--                                        <span class="navi-link-badge">--}}
{{--															<span class="label label-light-primary label-inline font-weight-bold">new</span>--}}
{{--														</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="navi-item">--}}
{{--                                    <a href="#" class="navi-link">--}}
{{--														<span class="navi-icon">--}}
{{--															<i class="flaticon2-bell-2"></i>--}}
{{--														</span>--}}
{{--                                        <span class="navi-text">Calls</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="navi-item">--}}
{{--                                    <a href="#" class="navi-link">--}}
{{--														<span class="navi-icon">--}}
{{--															<i class="flaticon2-gear"></i>--}}
{{--														</span>--}}
{{--                                        <span class="navi-text">Settings</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="navi-separator my-3"></li>--}}
{{--                                <li class="navi-item">--}}
{{--                                    <a href="#" class="navi-link">--}}
{{--														<span class="navi-icon">--}}
{{--															<i class="flaticon2-magnifier-tool"></i>--}}
{{--														</span>--}}
{{--                                        <span class="navi-text">Help</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="navi-item">--}}
{{--                                    <a href="#" class="navi-link">--}}
{{--														<span class="navi-icon">--}}
{{--															<i class="flaticon2-bell-2"></i>--}}
{{--														</span>--}}
{{--                                        <span class="navi-text">Privacy</span>--}}
{{--                                        <span class="navi-link-badge">--}}
{{--															<span class="label label-light-danger label-rounded font-weight-bold">5</span>--}}
{{--														</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <!--end::Navigation-->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--end::Dropdowns-->--}}
{{--                </div>--}}
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="row">
                    <div class="col-xl-3">
                        <!--begin::Stats Widget 27-->
                        <div class="card card-custom bg-light-info card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-info">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
															<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
															<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
															<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block today-orders">0.00</span>
                                <span class="font-weight-bold text-muted font-size-sm">Today Orders</span>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 27-->
                    </div>
                    <div class="col-xl-3">
                      <!--begin::Stats Widget 26-->
                      <div class="card card-custom bg-light-danger card-stretch gutter-b">
                          <!--begin::ody-->
                          <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-danger">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24"></polygon>
															<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
															<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                              <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block new-customers">0.00</span>
                              <span class="font-weight-bold text-muted font-size-sm">New Customers</span>
                          </div>
                          <!--end::Body-->
                      </div>
                      <!--end::Stats Widget 26-->
                  </div>
                    <div class="col-xl-3">
                        <!--begin::Stats Widget 31-->
                        <div class="card card-custom bg-danger card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-white">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
															<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
															<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
															<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                                <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block today-sales">0.00</span>
                                <span class="font-weight-bold text-white font-size-sm">Today Sales</span>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 31-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Stats Widget 32-->
                        <div class="card card-custom bg-dark card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-white">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"></path>
															<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"></path>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                                <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 text-hover-primary d-block penigOrders">0.00</span>
                                <span class="font-weight-bold text-white font-size-sm">Pending Orders</span>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 32-->
                    </div>
              </div>

                  </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <div class="d-flex mt-2 flex-column-fluid">
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
                                <th>Order #</th>
                                <th>Promo Code</th>
                                <th>Government</th>
                                <th>Area</th>
                                <th>Payment Type</th>
                                <th>Delivery Charges</th>
                                <th>Subtotal</th>
                                <th>Promo Discount</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
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
    <!--end::Content-->

@endsection



@section('js')
{{--    <script src="https://cdn.jsdelivr.net/npm/[email protected]/dist/js/select2.min.js"></script>--}}
    <script src="{{ asset('/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.5') }}"></script>
    <script src="{{ url('/assets/editor/js/dataTables.editor.js') }}" type="text/javascript"></script>

    <script src="{{ url('/assets/editor/js/editor.bootstrap4.js') }}" type="text/javascript"></script>
    <script src="{{ url('/assets/js/select2custom.js') }}"></script>
    <script src="{{ asset('adminside/orders/order.js') }}"></script>

    <script>
    $(document).ready(function(e){
        $.ajax({
            url:HOST_URL+'/admin/getstatics',
            type:'get',
            success:function (data) {
                console.log(data);
                $('.new-customers').html(data.customer);
                $('.today-orders').html(data.todayorders);
                $('.today-sales').html(data.sales);
                $('.penigOrders').html(data.pendings);

            }
        })
    });
</script>
@endsection
