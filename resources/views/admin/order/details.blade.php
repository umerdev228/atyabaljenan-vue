@extends('mainpages.mainadmin')
@section('css')

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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Invoice</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Pages</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Invoice</a>
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
                <!-- begin::Card-->
                <div class="card card-custom overflow-hidden">
                    <div class="card-body p-0">
                        <!-- begin: Invoice-->
                        <!-- begin: Invoice header-->
                        <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                   <div class="display-4">
                                       <h1 class="font-weight-boldest mb-10">INVOICE</h1>

                                       <p class="font-size-h6">
                                           <b>Customer: {{ $order->customer->name }}</b><br>
                                           <b>Phone: {{ $order->customer->phone }}</b><br>
                                           <b>Email : {{ $order->customer->email }}</b><br>
                                           @if($order->status)
                                           <b>Status : {{ $order->status->status }}</b><br>
                                               @endif

                                           @if($order->order_type=='Schedual')
                                              <b>Schedual: {{ $order->time_desc  }}</b>
                                               @endif
                                       </p>
                                   </div>

                                    <div class="d-flex flex-column align-items-md-end px-0">
                                        <!--begin::Logo-->
                                        <a href="#" class="mb-5">
                                            <img src="{{ logo() }}" alt="" />
                                        </a>
                                        <!--end::Logo-->
                                        <span class="d-flex flex-column align-items-md-end opacity-70">
															{{ siteAddress() }}
														</span>
                                    </div>
                                </div>
                                <div class="border-bottom w-100"></div>
                                <div class="d-flex justify-content-between pt-6">
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">DATE</span>
{{--                                        {{ settimezone() }}--}}

                                        <span class="opacity-70">{{ date('M , d, Y h:i a',strtotime($order->created_at)) }}</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">Order NO.</span>
                                        <span class="opacity-70">Order #{{ sprintf('%04d',$order->order_no) }}</span>
                                        <span class="opacity-70">
                                        @if (is_null($order->products[0]->note))
                                            No Product Notes 
                                        @else
                                        @foreach($order->products as $product)
                                            {{ productnamebyid($product->item_id) }} <br>

                                            {{ $product->note }}<br>
                                        @endforeach
                                        @endif

                                        </span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">INVOICE TO.</span>
                                        <span class="opacity-70"><b>Area: {{ $order->area->name }}  </b> <b>Gov.: {{ $order->government->name }}</b>
														<br/>
                                            @if($order->map_address == "" || $order->map_address == null)
                                            <b>Area Type: {{ $order->type }}</b><br/> @if($order->block!='')<b>Block: {{ $order->block }}</b><br>@endif
                                            Street : {{ $order->street }},<br>
                                            House  : {{ $order->house }} <br>
                                            Block  : {{ $order->block }} <br>
                                            Avanue : {{ $order->avanue }}  <br>
                                            Building : {{ $order->building }}<br>
                                            Floor : {{ $order->floor }}<br>
                                            Office No : {{ $order->officeno }}<br>
                                            Special Directions : {{ $order->special_dir }}<br>
                                            @else
                                                {!! $order->map_address !!}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice header-->
                        <!-- begin: Invoice body-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="pl-0 font-weight-bold text-muted text-uppercase">Description</th>
                                            <th class="pl-0 font-weight-bold text-muted text-uppercase">Variant</th>
                                            <th class="text-right font-weight-bold text-muted text-uppercase">Qty</th>
                                            <th class="text-right font-weight-bold text-muted text-uppercase">Rate</th>
                                            <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->products as $product)
                                        <tr class="font-weight-boldest">
                                            <td class="pl-0 pt-7">{{ productnamebyid($product->item_id) }}
                                            <br>
                                                {!! order_item_addon($product->id) !!}
                                            </td>
                                            <td class="pl-0 pt-7">{{ productVariantName($order->id, $product->item_id) }}</td>
                                            <td class="text-right pt-7">{{ $product->qty }}</td>
                                            <td class="text-right pt-7"> @money(productdetailsbyid($product->item_id)->price) </td>
                                            <td class="text-danger pr-0 pt-7 text-right">@money($product->total)</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice body-->
                        <!-- begin: Invoice footer-->
                        <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="font-weight-bold text-muted text-uppercase">Payment Type</th>
                                            <th class="font-weight-bold text-muted text-uppercase">Sub Total</th>
                                            <th class="font-weight-bold text-muted text-uppercase">Delivery Charges</th>
                                            <th class="font-weight-bold text-muted text-uppercase">Discount</th>
                                            <th class="font-weight-bold text-muted text-uppercase">TOTAL AMOUNT</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="font-weight-bolder">
                                            <td>{{ $order->payment_type }}</td>
                                            <td>@money($order->subtotal)</td>
                                            <td>@money($order->delivery_charges)</td>
                                            <td class="text-danger font-size-h3 font-weight-boldest">@money($order->discount)</td>
                                            <td class="text-danger font-size-h3 font-weight-boldest">@money($order->subtotal+$order->delivery_charges-$order->discount)</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice footer-->
                        <!-- begin: Invoice action-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9 text-center">
                                {!! $statushtml !!}
                                <div class="d-flex justify-content-between">

                                    <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>

                                    <button type="button" class="btn btn-primary font-weight-bold" onclick="printInvoice()">Print Invoice</button>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice action-->
                        <!-- end: Invoice-->
                    </div>
                </div>
                <!-- end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>

    <div class="my_invoice" style="display: none;">
        <div class="cart col-sm-12">
            <table border="0" align="center" class="table table-condensed">
                <tr>
                    <td>

                        <table border="0" style="margin: auto;" class="header">
                            <tr>
                                <td  align="center" style="font-weight: bolder;font-size: 15pt; font-family: Arial, sans-serif">{{sitename()['site_title']}}</td>
                            </tr>
{{--                            <tr>--}}
{{--                                <td  align="center" style="font-weight: bolder;font-size: 8pt; font-family: Arial, sans-serif">{{credentials()->address}}</td>--}}
{{--                            </tr>--}}
                            {{--                                                            <tr>--}}
                            {{--                                                                <td  align="center" style="font-weight: bolder;font-size: 8pt; font-family: Arial, sans-serif">Near Rao Yaseen Shopping Center, Main Bazar, Kot Momin</td>--}}
                            {{--                                                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td style="font-family: Arial, sans-serif;font-size: 14px;" align="center">{{credentials()->phone1}}</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td style="font-family: Arial, sans-serif;font-size: 14px;" align="center">{{credentials()->phone2}}</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td style="font-family: Arial, sans-serif;font-size: 14px;" align="center" id="Idatetime"></td>--}}
{{--                            </tr>--}}
                        </table>
                        <table width="100%">
                            <tr>
{{--                                <td><nobr style="font-family: Arial, sans-serif;font-size: 12px;">ORDER No.:</nobr></td>--}}
                                <img style="display: block;margin-left: auto;margin-right: auto;" height="75" width="80" src="{{ logo() }}" alt="" />
                            </tr>
                            <tr>
                                <td><nobr style="font-family: Arial, sans-serif;font-size: 12px;">ORDER No.:</nobr></td>
                                <td style="font-family: Arial, sans-serif;font-size: 12px;" id="r_invoice">Order #{{ sprintf('%04d',$order->order_no) }}</td>
                            </tr>
                            <tr>
                                <td><nobr style="font-family: Arial, sans-serif;font-size: 12px;" >Date</nobr></td>
                                <td style="font-family: Arial, sans-serif;font-size: 12px;" id="">{{ date('M , d, Y h:i a',strtotime($order->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td><nobr style="font-family: Arial, sans-serif;font-size: 12px;">Customer :</nobr></td>
                                <td style="font-family: Arial, sans-serif;font-size: 12px;" >{{ $order->customer->name }}</td>
                            </tr>
                            <tr>
                                <td><nobr style="font-family: Arial, sans-serif;font-size: 12px;">Phone:</nobr></td>
                                <td style="font-family: Arial, sans-serif;font-size: 12px;">{{ $order->customer->phone }}</td>
                            </tr>
                            <tr>
                                <td><nobr style="font-family: Arial, sans-serif;font-size: 12px;">Address:</nobr></td>
                                @if($order->map_address == "" || $order->map_address == null)
                                    <td style="font-family: Arial, sans-serif;font-size: 12px;word-break: break-all">
                                         <span class="">
                                             <b>Area: {{ $order->area->name }} </b>
                                             <br /><b>Gov.: {{ $order->government->name }}</b><br>

                                        <b>Area Type: {{ $order->type }}</b><br/> @if($order->block!='')<b>Block: {{ $order->block }}</b><br>@endif
                                    Street : {{ $order->street }},<br>
                                    House  : {{ $order->house }} <br>
                                    Block  : {{ $order->block }} <br>
                                    Avanue : {{ $order->avanue }}  <br>
                                    Building : {{ $order->building }}<br>
                                    Floor : {{ $order->floor }}<br>
                                    Office No : {{ $order->officeno }}<br>
                                    Special Directions : {{ $order->special_dir }}<br>
                                    Product Notes: <br>
                                    @if (is_null($order->products[0]->note))
                                            No Product Notes 
                                        @else
                                        @foreach($order->products as $product)
                                            {{ productnamebyid($product->item_id) }} <br>
                                            {{ $product->note }}<br>
                                        @endforeach
                                        @endif

                                    </td>
                                @else
                                    <td style="font-family: Arial, sans-serif;font-size: 12px;word-break: break-all">{!!  $order->map_address !!}</td>
                                @endif
                            </tr>
                        </table>
                        <table border="1" style="margin-left: -9px;border: 1px solid black; border-collapse: collapse" class="table table-bordered mycart1">
                            <thead style="background-color: gainsboro;font-size: 12px;font-weight: bold;font-family: Arial, sans-serif">
                            <tr>
                                <th>PRODUCT</th>
                                <th>Qty</th>
                                <th>Rate</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody class="carttable1" style="font-size: 10px;font-family: Arial, sans-serif">
                            @foreach($order->products as $product)
                            <tr>
                                <td id="" style="padding: 3px; text-align: left;">{{productnamebyid($product->item_id)}}</td>
                                <td id="" style="padding: 3px; text-align: center;">{{$product->qty}}</td>
                                <td id="" style="padding: 3px; text-align: center;">@money(productdetailsbyid($product->item_id)->price)</td>
                                <td id="" style="padding: 3px; text-align: center;">@money($product->total)</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <table align="right" style="width: 150px;margin-bottom:50px;">
                            <tr>
                                <td><b style="font-family: Arial, sans-serif;font-size: 12px;">Payment Type</b></td>
                                <td><b style="font-family: Arial, sans-serif;font-size: 10px;" id="r_t_total_bill">{{$order->payment_type}}</b></td>
                            </tr>
                            <tr>
                                <td><b style="font-family: Arial, sans-serif;font-size: 12px;">Sub Total</b></td>
                                <td><b style="font-family: Arial, sans-serif;font-size: 10px;" id="r_t_total_bill">@money($order->subtotal)</b></td>
                            </tr>
                            <tr>
                                <td style="font-family: Arial, sans-serif;font-size: 12px;" >Delivery Charges:</td>
                                <td><b style="font-family: Arial, sans-serif;font-size: 10px;" id="r_t_delivery_charges">@money($order->delivery_charges)</b></td>
                            </tr>
                            <tr>
                                <td style="font-family: Arial, sans-serif;font-size: 12px;" >Discount:</td>
                                <td><b style="font-family: Arial, sans-serif;font-size: 10px;" id="r_t_discount">@money($order->discount)</b></td>
                            </tr>
                            <tr>
                                <td style="font-family: Arial, sans-serif;font-size: 12px;" >Grand Total:</td>
                                <td><b style="font-family: Arial, sans-serif;font-size: 10px;" id="r_t_grand_total">@money($order->subtotal+$order->delivery_charges-$order->discount)</b></td>
                            </tr>
                        </table>
                        <br></br>


                    </td>
                    <table  border="0" style="margin: auto;">
                        <tr>
                            <td  align="center" style="font-weight: bolder;font-size: 18px; font-family: Arial, sans-serif">POLICIES</td>
                        </tr>

                        <tr>
                            <td align="left" style="font-family: Arial, sans-serif;font-size: 10px;">1:-All Prices are fixed.</td></td>
                        </tr>
                        <tr>
                            <td align="left" style="font-family: Arial, sans-serif;font-size: 10px;">2:-No Cash Refund for any exchange and return.</td></td>
                        </tr>
{{--                        <tr>--}}
{{--                            <td align="left" style="font-family: Arial, sans-serif;font-size: 10px;">3:-Original Receipt is required for exchange and claim within 1 days of purchase.</td></td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td align="left" style="font-family: Arial, sans-serif;font-size: 10px;">4:-Clearance Sale Item and cut pieces are not exchangeable.</td></td>--}}
{{--                        </tr>--}}
{{--                        </br>--}}
{{--                        <tr>--}}
{{--                            <td align="left" style=" border: 1px solid black; font-family: Arial, sans-serif;font-size: 12px;">A Software by BRAINIAC CS(0303-2600069)</td></td>--}}
{{--                        </tr>--}}

                    </table>

                </tr>
            </table>
        </div>
    </div>
    <button class="btn btn-info" id="print" style="display: none; float: right;margin-top: 4px;">Print Invoice</button>







@endsection

@section('js')
    <script>
        function printInvoice(){
            var html = $('.my_invoice').html();
            var myWindow = window.open("", '', 'width=900,height=800');
            myWindow.document.write('<head></head>');
            myWindow.document.write(html);
            myWindow.print();
            // myWindow.close();
        }
        $(document).ready(function(){

            $(document).on('click','.btn-status',function(e){
                e.preventDefault();

                var id=$(this).attr('data-id');
                var statusId=$(this).attr('data-status-id');
                $.ajax({
                    url:HOST_URL+'/admin/order/statusupdate',
                    type:'get',
                    data:{id:id,'status_id':statusId},
                    success:function(data){
                        if(data.status==='success'){
                            Swal.fire(data.name, data.message, "success");

                        }


                    },
                    error:function(error){

                        console.log(error.responseText);
                    }
                })

            })
        })
    </script>
    @endsection
