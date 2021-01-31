@foreach($products as $key=>$product)
<section class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ltr-product-1">


    <button type="button" href="#category-{{$key}}" class="product-btn"  id="product-btn-list">
           <h2 style="color: {{ setting()['button_color'] }}">{{ getcatbyid($key) }}</h2>
             <i class="fas fa-angle-down" style="color: {{ setting()['button_color'] }}"></i>
    </button>

    <ul class="product-list" id="category-{{$key}}">
        @foreach($product as $pr)
        <li class="product-list-detail" >
            <a class="product-detail-item-1" href="{{ url('client/productdetail/'.$pr->id) }}">
                <div class="item-detail">
                    <h3>@product_name($pr)</h3>
                    <h4>@productdesc($pr)</h4>

                    <button class="product-price">
                       @if($pr->discount>0)
                            {{ money(product_currency_price($pr->id)) }}
                            <span style="text-decoration: line-through;color:red;font-size: 10px;position: relative;bottom: 10px;"> {{ money($pr->discount) }}</span>

                        @else


                           {{ money(product_currency_price($pr->id)) }}
                        @endif
                    </button>

                </div>
                <img class="product-detail-img lazy-loading" data-src="{{ $pr->image }}">
                <div class="thumnail-shimmer body-shine lazy">
                    <div class="shine" style="top: -15px;right: -3px;width: 100%;height: 100%;"></div>
                </div>

            </a>
        </li>
        @endforeach

    </ul>



</section>

@endforeach



