<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-ltr">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-ltr-header">
            <ul class="products-ltr-header-item">
                {{--                <li class="ltr-header-item">--}}
                {{--                    <h2>Delivery</h2>--}}
                {{--                    <a class="mode-pickup" href="order-mode.html">--}}
                {{--                        Switch to Car Pickup--}}
                {{--                        <i>--}}
                {{--                            <svg width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M3 3h18v18H3z"></path><path d="M3 3h18v18H3z"></path><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M9 18l6-6-6-6"></path></g></svg>--}}
                {{--                        </i>--}}
                {{--                    </a>--}}
                {{--                </li>--}}

                <li class="ltr-header-item" style="margin:0px auto;">
                    <a class="mode-pickup" href="{{ url('/') }}">
                        <h2 style="color: {{ setting()->button_color }}">{{ sitename()['site_title'] }}</h2>
                    </a>
                </li>
                @php

                    use Carbon\Carbon;
                     $limit = 15;
                     $lastActivity = strtotime(Carbon::now()->subSeconds($limit));
                     $sess = App\Session::where('last_activity', '>=',  $lastActivity)->get();
                     $order = \App\Order::latest()->with('products')->with('area')->with('customer')->first();

                     toastr()->info(count($sess) . ' ' . ' Active Users On Website ');

                @endphp
                <div id="online">
{{--                    <div id="online-inner">--}}
                    {{--<script type='text/javascript'
                        src='https://www.freevisitorcounters.com/auth.php?id=d16c216a6612f423111587f263d4a102fe5e37a6'>
                    </script>
                    <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/762490/t/1">
                    </script>--}}
{{--                    </div>--}}
                    <span>{{count($sess)}} Users Viewing the Website</span>
                </div>
                @if($order)
                <div id="online2" style="font-size: 12px">
                    <span>
                        {{$order->customer->name}}
                        from {{$order->area->name}} bought
                    <ol>
                        @foreach($order->products as $product)
                            <li>                            {{$product->products->name}}
                            </li>
                        @endforeach

                    </ol>
                    </span>
                </div>
                @endif
                <li class="ltr-header-item">
                    <h2>@lang('messages.area')</h2>
                    <a style="color: {{setting()['button_color']}}" class="mode-pickup" href="{{ url('client/selectarea') }}">
                        @if(getarea())
                        @area(getarea())

                        @else
                        @lang('messages.selectarea')
                        @endif
                        <i>
                            <svg width="1em" height="1em" viewBox="0 0 24 24">
                                <g fill="none" fill-rule="evenodd">
                                    <path d="M3 3h18v18H3z"></path>
                                    <path d="M3 3h18v18H3z"></path>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.4" d="M9 18l6-6-6-6"></path>
                                </g>
                            </svg>
                        </i>
                    </a>
                </li>

            </ul>

            <a class="search-item">
                <div class="search-product">
                    <input type="text" placeholder="{{ __('messages.search')  }}" autofocus autocomplete="off">
                </div>
            </a>

        </div>
    </div>
</div>


<style type="text/css">
    .visitor-box {
        pointer-events: none;
    }

    div#online-inner {
        height: 20px;
        overflow: hidden;
        pointer-events: none !important;
        float: left;
        width: 77px;
    }

    #online-inner img.counterimg {
        transform: translateY(-69px);
    }

    #online span {
        font-size: 12px;
        display: block;
        color: #888;
        line-height: 14px;
        width: 240px;
    }

    div#online {
        width: 240px;
        box-shadow: 1px 1px 11px;
        display: block;
        margin: 0 auto;
    }
    div#online-inner2 {
        height: 20px;
        overflow: hidden;
        pointer-events: none !important;
        float: left;
        width: 77px;
    }

    #online-inner2 img.counterimg {
        transform: translateY(-69px);
    }

    #online2 span {
        font-size: 12px;
        display: block;
        color: #888 !important;
        line-height: 14px;
        width: 240px;
    }

    div#online2 {
        padding: 10px;
        width: 240px;
        box-shadow: 1px 1px 11px;
        display: block;
        margin: 0 auto;
    }
    #online2 {
        margin-top: 8px !important;
        display:none !important;    }
    #online {
        padding: 10px;
        display:none !important;

    }

</style>