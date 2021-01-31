<?php
if (!function_exists('session_my')){
    function session_my($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('session');
        }

        if (is_array($key)) {
            return app('session')->put($key);
        }

        return app('session')->get($key, $default);
    }

}

if (!function_exists('setting')){
    function setting(){
        $setting=\App\Setting::first();
        if ($setting){

            return $setting;
        }

        return null;
    }
}

if (!function_exists('logo')){
    function logo(){
        $setting=\App\Setting::first();
        if ($setting){

            if(\Str::contains($setting->logo,'http')){
            return $setting->logo;

            }else{
                if($setting->logo==''){
                    return '';
                }else{
                    return url($setting->logo);
                }

            }
        }

        return null;
    }
}

if (!function_exists('favicon')){
    function favicon(){
        $setting=\App\Setting::first();
        if ($setting){

            if(\Str::contains($setting->favicon,'http')){
                return $setting->favicon;

            }else{
                if ($setting->favicon==''){
                    return  '';
                }
                return url($setting->favicon);
            }
        }

        return null;
    }
}

if (!function_exists('background')){
    function background(){
        $setting=\App\Setting::first();
        if ($setting){

            if (\Str::contains($setting->background,'http')){
                return $setting->background;
            }else{
                return url($setting->background);
            }

        }

        return null;
    }
}

if (!function_exists('sitename')){
    function sitename(){
        $setting=\App\Setting::first();
        if ($setting){
        if (\Session::get('applocale')=='ar'){
           $temp['site_title']=$setting->site_name_ar;

           $temp['site_description']=$setting->site_description_ar;

           return $temp;


        }else{
            $temp['site_title']=$setting->site_name;

            $temp['site_description']=$setting->site_description;

            return $temp;
        }

        $temp['site_title']='Casa-Shwarma';
        $temp['site_description']='Casa-Shwarma';
        return $temp;


        }

        return null;
    }
}

if (!function_exists('siteAddress')){
    function siteAddress(){
        $setting=\App\Setting::first();
        if ($setting){
        if (\Session::get('applocale')=='ar'){
           $siteAddress=$setting->restaurant_address_ar;
           return $siteAddress;
        }else{
            $siteAddress=$setting->restaurant_address;
            return $siteAddress;
        }
        }

        return null;
    }
}

if (!function_exists('variant_head')){
    function variant_head($id){
    $variantHead=\App\VariantHead::find($id);
    if (\Session::get('applocale')=='ar'){

        return $variantHead->name_ar;

    }
    return $variantHead->name;


    }
}
if (!function_exists('addon_head')){
    function addon_head($id){
    $addonHead=\App\AddonHead::find($id);
    if (\Session::get('applocale')=='ar'){

        return $addonHead->name_ar;

    }
    return $addonHead->name;


    }
}

if(!function_exists('variant_check')){
    function variant_check($productid)
    {
        $oldCart = \Session::get('cart') ? \Session::get('cart') : null;
        if ($oldCart) {
            $cart = new \App\Cart($oldCart);
            if ($cart->options != null) {
                if (is_array($cart->options)) {
                    foreach ($cart->options as $option) {

                        if ($option['product_id']==$productid){
                            return 'checked';
                        }

                    }
                }
            }
        }
        return '';

    }

}

if(!function_exists('my_variant_check')){
    function my_variant_check($variant_id)
    {
        $oldCart = \Session::get('cart') ? \Session::get('cart') : null;
        if ($oldCart) {
            $cart = new \App\Cart($oldCart);
            if ($cart->options != null) {
                if (is_array($cart->options)) {
                    foreach ($cart->options as $key=>$ar) {
                        if ($key==$variant_id){
                            return 'checked';
                        }

                    }
                }
            }
        }
        return '';

    }

}
if(!function_exists('my_addon_check')){
    function my_addon_check($addonid)
    {
        $oldCart = \Session::get('cart') ? \Session::get('cart') : null;
        if ($oldCart) {
            $cart = new \App\Cart($oldCart);
            if ($cart->addon != null) {
                if (is_array($cart->addon)) {
                    foreach ($cart->addon as $key=>$ar) {
                        if ($key==$addonid){
                            return 'checked';
                        }

                    }
                }
            }
        }
        return '';

    }

}

if(!function_exists('carttotal')){

    function carttotal(){
        $totalProducts=0;
        $totalVariant=0;
        $temp['items']=0;
        $temp['total']=0.00;
        $temp['totalvariant']=0;
        $temp['producttotal']=0;
        $oldCart = \Session::get('cart') ? \Session::get('cart') : null;
        if ($oldCart) {
            $cart = new \App\Cart($oldCart);
            foreach ($cart->items as $item) {
              $productid=$item['item']['id'];
              $temp['items']+=$item['qty'];
              if (variant_check($productid) !=='checked'){
                  $totalProducts+=$item['item']['price']*$item['qty'];
              }

              if (variant_check($productid)==='checked'){
                  if ($cart->options != null) {
                      if (is_array($cart->options)) {
                          foreach ($cart->options as $option) {

                              if ($option['product_id'] == $productid) {
                                  $totalVariant+=$option['price']*$item['qty'];


                              }

                          }
                      }
                  }
              }


            }
        }
        $temp['total']=$totalProducts+$totalVariant;
        $temp['totalvariant']=$totalVariant;
        $temp['producttotal']=$totalProducts;

        return $temp;

    }


}

if (!function_exists('government')){
   function government($id)
   {
       $gove = \App\Government::find($id);
       if(\Session::get('applocale')=='ar'){
           return $gove->name_ar;
       }
       return $gove->name;
   }
}
if (!function_exists('catcount')){
    function catcount($catid){
       return App\Product::where('category_id',$catid->id)->get()->count();
    }
}
if (!function_exists('catname')){
    function catname($cat){

        if ($cat){
            if (\Session::get('applocale')=='ar'){

                return $cat->category_ar;
            }
        return $cat->category;
        }

    }
}
if (!function_exists('getcatbyid')){
    function getcatbyid($id){

        $cat=\App\Category::find($id);
        if ($cat){
            if (\Session::get('applocale')=='ar'){

                return $cat->category_ar;
            }
            return $cat->category;
        }

    }
}

if (!function_exists('my_timezone')){
    function my_timezone($date){
        $setting=\App\Setting::first();
        if ($setting){
            date_default_timezone_set($setting->time_zone);
        }

        return date('d-m-y h:i:s a',strtotime($date));

    }


}if (!function_exists('settimezone')){
    function settimezone(){
        $setting=\App\Setting::first();
        if ($setting){
            date_default_timezone_set($setting->time_zone);
        }


    }


}
if (!file_exists('getarea')){
    function getarea(){
     $areaid=\Session::get('area')?\Session::get('area'):null;
    if ($areaid){
    $areaDetails=\App\Area::find($areaid);
    return $areaDetails;
    }

    return false;


    }
}


if (!file_exists('areaminutes')){
    function areaminutes(){
       if (getarea()){
           $carbon=\Carbon\Carbon::now();
           $carbon->addMinutes(getarea()->delivery_time);

           if ($carbon->diffInDays() >= 1) {
               return $carbon->diffInDays().' '.__('messages.days_from_now');
           }
           else {
               return $carbon->diffInMinutes().' '.__('messages.minutes_from_now');
           }
       }
       return false;


    }
}
if (!file_exists('productnamebyid')){
    function productnamebyid($id){
        $product=\App\Product::find($id);
        if ($product){
            if (\Session::get('applocal')=='ar'){
                return $product->name_ar;
            }

            return $product->name;
        }
        return '';

    }
}
if (!file_exists('productVariantName')){
    function productVariantName($order_id, $product_id){
        $variant = \App\OrderProductVariant::where('order_id', $order_id)->where('product_id', $product_id)->with('variant')->first();
        if ($variant){
            if (\Session::get('applocal')=='ar'){
                return $variant->variant->name_ar;
            }

            return $variant->variant->name;
        }
        return 'No Variant';

    }
}
if(!function_exists('productdetailsbyid')){
    function productdetailsbyid($id){
        $product=\App\Product::find($id);
        if ($product){

            return $product;
        }
        return null;
    }
}
if (!function_exists('schedual')){
    function schedual(){
    if (\Session::has('schedual')){
     $getSch=\Session::get('schedual');

     $returnString=$getSch->day->day.' '.$getSch->start_time.' - '.$getSch->end_time;
     return ucwords($returnString);


    }

    return 'Select';
    }
}

if (!function_exists('addon_head')){
    function addon_head($id){
        $product=\App\AddonHead::find($id);
        if ($product){
            if (\Session::get('applocal')=='ar'){
                return $product->name_ar;
            }

            return $product->name;
        }
        return '';
    }
}
if (!function_exists('order_item_addon')){
    function order_item_addon($id){
        $orderAddon=\App\OrderAddon::where('order_item_id',$id)->get();
        $spn='';
        foreach ($orderAddon as $addon){

           $addname=\App\Addon::find($addon->addon_id);
           if ($addname) {
               $spn .= '<span>' . $addname->name . '</span><br>';
           }
           }

        return $spn;
    }
}
if (!function_exists('product_currency_price')){
    function product_currency_price($id){
        $product=\App\Product::find($id);
        $currency=\Session::get('currency');
        if ($product){
            if ($currency==null || $currency=='KWD'){
                return $product->price;
            }
            if ($currency=='BD'){
                return $product->price_bd;
            }
            if ($currency=='OMR'){
                return $product->price_omr;
            }
            if ($currency=='QAR'){
                return $product->price_qar;
            }
            if ($currency=='SAR'){
                return $product->price_sar;
            }
            if ($currency=='AED'){
                return $product->price_aed;
            }
            if ($currency=='USD'){
                return $product->price_usd;
            }
        }
    }
}


//////// Varient Price Function ////////////

if (!function_exists('variant_currency_price')){
    function variant_currency_price($variant_id){
        $variant=\App\Variant::find($variant_id);
        $currency=\Session::get('currency');
        if ($variant){
            if ($currency==null || $currency=='KWD'){
                return $variant->price;
            }
            if ($currency=='BD'){
                return $variant->price_bd;
            }
            if ($currency=='OMR'){
                return $variant->price_omr;
            }
            if ($currency=='QAR'){
                return $variant->price_qar;
            }
            if ($currency=='SAR'){
                return $variant->price_sar;
            }
            if ($currency=='AED'){
                return $variant->price_aed;
            }
            if ($currency=='USD'){
                return $variant->price_usd;
            }
        }
    }
}

//////// Varient Price Function ////////////



if (!function_exists('money')){
    function money($amount){
        $setting=\App\Setting::first();
        $currency=\Session::get('currency');
        $symbol='';

        if($currency == 'KWD'){
            $symbol= 'KWD';
        }
        if ($currency=='BD'){
            $symbol= 'BD';
        }
        if ($currency=='OMR'){
            $symbol= 'OMR';
        }
        if ($currency=='QAR'){
            $symbol= 'QAR';
        }
        if ($currency=='SAR'){
            $symbol= 'SAR';
        }
        if ($currency=='AED'){
            $symbol= 'AED';
        }

        if ($setting) {


            if ($currency==null || $currency=='KWD'){
                $symbol= $setting->currency_symbol;
            }




            return $symbol . ' '.  number_format($amount, 2);




        }else{

            return $symbol .' ' . number_format($amount, 2);


        }
    }
}


