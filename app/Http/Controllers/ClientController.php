<?php

namespace App\Http\Controllers;

use App\Addon;
use App\AddonHead;
use App\Area;
use App\BookeySetting;
use App\Cart;
use App\Category;
use App\ClienttDetail;
use App\Customer;
use App\Events\OrderEvent;
use App\Government;
use App\Mail\NotifyMail;
use App\OpeningHours;
use App\Order;
use App\OrderAddon;
use App\OrderProduct;
use App\OrderProductVariant;
use App\OrderStatus;
use App\Product;
use App\PromoCode;
use App\Schedule;
use App\Setting;
use App\Variant;
use App\VariantHead;
use Carbon\Carbon;
use http\Client;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class ClientController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $settings = Setting::first();
        $products = Product::with('category')->orderBy('products.order_level')->join('categories', 'categories.id', '=', 'products.category_id')->groupBy('products.id')->get()->groupBy('category');

        //        $products=Product::select('products.id','products.name')->join('categories','categories.id','=','products.category_id')->groupBy('products.id')->get();
        $categories = Category::orderBy('order_level')->get();
        return view('client.index', compact('products', 'categories', 'settings', 'title'));

    }

    public function getProducts()
    {
        $products = Product::select('products.id as id', 'products.discount', 'products.discount_percentage', 'name', 'name_ar', 'category_ar',
            'category', 'price', 'products.created_at', 'products.updated_at', 'products.description', 'products.image', 'products.stock',
            'products.description_ar', 'categories.id as cat_id')->join('categories', 'categories.id', '=', 'products.category_id')
            ->orderBy('products.order_level')->groupBy('products.id')->get()->groupBy('cat_id');
        $categories = Category::orderBy('order_level')->get();

        $html = view('client.products', compact('products', 'categories'))->render();
        return response()->json(['html' => $html]);
    }


    public function searchProducts(Request $request)
    {
        $query = $request->search;
        $products = Product::select('products.id as id', 'name', 'name_ar', 'category_ar', 'products.discount', 'products.discount_percentage',
            'category', 'price', 'products.created_at', 'products.updated_at', 'products.description', 'products.image', 'products.stock',
            'products.description_ar', 'categories.id as cat_id')->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.name', 'Like', '%' . $query . '%')->orWhere('products.name_ar', 'Like', '%' . $query . '%')
            ->orderBy('products.order_level')->groupBy('products.id')->get()->groupBy('cat_id');

        $categories = Category::orderBy('order_level')->get();
        $html = view('client.products', compact('products', 'categories'))->render();
        return response()->json(['html' => $html]);
    }

    public function productDetail($id)
    {

        $settings = Setting::first();
        $product = Product::where('id', $id)->with('media')->first();
        $varients = VariantHead::with('variant')->select('variants.id', 'variants.name', 'variants.name_ar', 'variant_heads.name as head', 'variant_heads.name_ar as head_ar', 'variant_heads.id as head_id',
            'variants.created_at', 'variants.price', 'variants.stock',
            'variants.updated_at')->where('variant_heads.product_id', $id)
            ->join('variants', 'variants.variant_head_id', '=', 'variant_heads.id')
            ->groupBy('variants.id')->get()->groupBy('head_id');

        $addons = AddonHead::select('addons.id', 'addons.name', 'addons.name_ar', 'addon_heads.name as head', 'addon_heads.name_ar as head_ar', 'addon_heads.id as head_id',
            'addons.created_at', 'addons.price', 'addons.stock', 'addons.manage_stock',
            'addons.updated_at')
            ->where('addon_heads.product_id', $id)
            ->join('addons', 'addons.head_id', '=', 'addon_heads.id')
            ->groupBy('addons.id')->get()->groupBy('head_id');
//        dd($addons);
//        dd($addons);/

        $title = $product->name;

        $qty = 0;
        $total = 0;
        $totalVariant = 0;
        $oldCart = Session::get('cart') ? Session::get('cart') : null;
        $options = [];;
        if ($oldCart) {
            $cart = new Cart($oldCart);
            $total = 0;
            if ($cart->items) {
                foreach ($cart->items as $item) {
                    if ($item['item']['id'] == $product->id) {


                        if (variant_check($product->id) !== 'checked') {

                            $total = $item['item']['price'] * $item['qty'];
                        }

                        $qty = $item['qty'];

                    }
                }
            }

            if ($cart->options != null && count($cart->options) > 0) {
                $options = $cart->options;
                foreach ($options as $option) {
                    if ($option['product_id'] == $product->id) {
                        $totalVariant += $option['price'] * $qty;
                    }
                }
            }
        }

        if ($totalVariant > 0) {
            if (variant_check($product->id)) {
                $total = $totalVariant;
            }
        }


        return view('client.productdetail', compact('title', 'settings', 'product', 'addons', 'varients', 'qty', 'total', 'options', 'totalVariant'));
    }

    public function selectArea(Request $request)
    {
        $governments = Government::select('areas.id', 'areas.name', 'areas.name_ar',
            'areas.created_at', 'governments.name as gov_name', 'governments.name_ar as gove_name_ar'
            , 'governments.id as gov_id'
        )->join('areas', 'areas.government_id', '=', 'governments.id')
            ->groupBy('areas.id')->get()->groupBy('gov_id');

        Session::put('back', $request->path);
        $title = 'Select Area';
        return view('client.selectarea', compact('title', 'governments'));
    }

    public function areaSelection($id)
    {

        $path = Session::get('back') ? Session::get('back') : null;
        Session::put('area', $id);
        if ($path) {


            return redirect($path);
        }

        return redirect('/');

    }

    public function addCart(Request $request)
    {
        $oldCart = Session::get('cart') ? Session::get('cart') : null;
        $item = Product::find($request->id);
        $cart = new Cart($oldCart);
        $cart->update($request->qty, $item, $item->id, $request->note);
        Session::put('cart', $cart);
        return response(['data' => Session::get('cart')]);
    }

    public function addCartVariant(Request $request)
    {
        $oldCart = Session::get('cart') ? Session::get('cart') : null;
        $item = Product::find($request->product_id);
        $variant = Variant::find($request->id);
        $qty = $request->qty;
        $note = $request->note;
        $cart = new Cart($oldCart);
        $cart->addVarient($item->id, $variant->id, 1, $variant);
        $cart->addProductByVariant($qty, $item, $item->id, $variant->price, $note);
        Session::put('cart', $cart);
        return response(['data' => Session::get('cart')]);
    }


    public function addCartAddon(Request $request)
    {
        $oldCart = Session::get('cart') ? Session::get('cart') : null;
        $item = Product::find($request->product_id);
        $variant = Addon::find($request->id);
        $qty = $request->qty;
        $note = $request->note;
        $cart = new Cart($oldCart);
        $cart->update($qty, $item, $item->id, $note);
        $cart->addAddon($item->id, $variant->id, 1, $variant);
//        $cart->addProductByVariant($qty,$item,$item->id,$variant->price,$note);
        Session::put('cart', $cart);
        return response(['data' => Session::get('cart')]);
    }


    public function forgetCart()
    {
        Session::forget('cart');
        Session::forget('area');
        Session::forget('back');
        return 'success';
    }

    public function addPromoCode(Request $request)
    {
        $now = Carbon::now();
        $promo_verified = PromoCode::where('code', '=', $request->code)->where('active_until', '>', $now->toDateTimeString())->where('status', '=', 'active')->get()->last();
        if ($promo_verified) {
            $oldCart = Session::get('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->promoCode($promo_verified);
            Session::put('cart', $cart);
            $carttotal = carttotal()['total'] - $cart->promocode_amount;

            return response(['promo_discount' => $cart->promocode_amount, 'total' => $carttotal, 'status' => 'success', 'message' => "Promo Code Added Successfully.."]);


        }

        return response(['status' => 'error', 'message' => 'The Code You have Provided is expired or not found']);

    }

    public function reviewOrder()
    {
        $title = 'Review Order';
        $oldCart = Session::get('cart') ? Session::get('cart') : null;

        if ($oldCart) {
            $cart = new Cart($oldCart);
            return view('client.revieworder', compact('title', 'cart'));


        }
        return redirect('/');


    }

    public function checkout()
    {

        $title = 'Checkout';
        $setting = Setting::first();
        $oldCart = Session::get('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $total = (carttotal()['total'] + getarea()->delivery_charges) - $cart->promocode_amount;
        $bookey = BookeySetting::first();

        $trxid = time();

        $order = $this->reserveOrder($trxid, 'reserve');

        Session::put('order', $order);


        return view('client.checkout', compact('title', 'total', 'bookey', 'trxid'));
    }

    public function contactInfo()
    {
        $title = 'Contact Information';
        $oldClient = Session::get('client') ? Session::get('client') : null;
        $client = new ClienttDetail($oldClient);
        return view('client.contactinfo', compact('title', 'client'));
    }

    public function addnameandemail(Request $request)
    {

        $client = Session::get('client') ? Session::get('client') : null;
        $newClient = new ClienttDetail($client);
        $newClient->updateNameAndPhone($request->name, $request->phone, $request->email);
        Session::put('client', $newClient);

        return response(['url' => url('client/contactaddress'), 'data' => $newClient]);


    }

    public function contactaddress(Request $request)
    {

        $title = 'Customer Address';
        $oldClient = Session::get('client') ? Session::get('client') : null;
        $client = new ClienttDetail($oldClient);
        return view('client.contactaddress', compact('title', 'client'));
    }

    public function addressinfo(Request $request)
    {
        $client = Session::get('client') ? Session::get('client') : null;
        $newClient = new ClienttDetail($client);
        $newClient->addressinfo($request->block, $request->street, $request->avanue, $request->building, $request->officeno, $request->floor, $request->special_dir, $request->type, $request->house);

        Session::put('client', $newClient);
        return response(['url' => url('client/checkout'), 'data' => Session::get('client')]);


    }

    public function saveOrder(Request $request)
    {

        $olderOrder = Session::get('order');

        $order = Order::where('trx_id', $request->txnId)->get()->last();

        $updateOrder = Order::find($order->id);
        $updateOrder->trx_status = 'completed';
        $updateOrder->update();


        Session::flash('msg', 'Your Order Placed Successfully. Will be Delivered Soon');
        $order_message = "A new order with an id:  $order->id has been placed.";
        Session::put('invoice_number', $order->invoice_number);
        Session::put('invoice_id', $order->id);
        event(new OrderEvent($order->id, $order_message));


        Session::forget('cart');
        Session::forget('order');

        return redirect('client/order_placed');
    }

//    public function saveOrderold(Request $request){
//        dd($request->all());
//
//        $oldCart=Session::get('cart')?Session::get('cart'):'';
//        $cart=new Cart($oldCart);
//        $subtotal=0;
//        $deliveryCharges=0;
//        $total=0;
//        $promo=0;
//        $yesterday=Carbon::yesterday();
//        $today=Carbon::today();
//        $oldClient=Session::get('client')?Session::get('client'):null;
////        dd($oldClient->mapaddress);
//        $client=new ClienttDetail($oldClient);
////        dd($client);
//        $lastOrder=Order::whereBetween('created_at',[$yesterday->addHours(24)->toDateTimeString(),$today->addHours(22)->toDateTimeString()])->get()->last();
//
//        if ($oldClient){
//            $checkCustomer=Customer::whereNotNull('email')->where('email',$client->email)->orWhere('phone',$client->phone)->get()->last();
//            if ($checkCustomer){
//                $checkCustomer->email=$client->email;
//                $checkCustomer->name=$client->name;
//                $checkCustomer->block=$client->block;
//                $checkCustomer->phone=$client->phone;
//                $checkCustomer->type=$client->type;
//                $checkCustomer->house=$client->house;
//                $checkCustomer->street=$client->street;
//                $checkCustomer->officeno=$client->officeno;
//                $checkCustomer->floor=$client->floor;
//                $checkCustomer->building=$client->building;
//                $checkCustomer->avanue=$client->avanue;
//                $checkCustomer->special_dir=$client->specialdir;
//                $checkCustomer->map_address=$client->mapaddress;
//                $checkCustomer->update();
//            }else{
//                $newCustomer=new Customer();
//                $newCustomer->email=$client->email;
//                $newCustomer->name=$client->name;
//                $newCustomer->phone=$client->phone;
//                $newCustomer->type=$client->type;
//                $newCustomer->house=$client->house;
//                $newCustomer->street=$client->street;
//                $newCustomer->officeno=$client->officeno;
//                $newCustomer->floor=$client->floor;
//                $newCustomer->building=$client->building;
//                $newCustomer->avanue=$client->avanue;
//                $newCustomer->special_dir=$client->specialdir;
//                $newCustomer->map_address=$client->mapaddress;
//                $newCustomer->block=$client->block;
//                $newCustomer->save();
////                dd($client->mapaddress);
//            }
//
//        }
//
//
//        if ($oldCart){
//            $order=new Order();
//            $order->invoice_number=date('dmyhis');
//           if ($lastOrder){
//               $order->order_no=$lastOrder->order_no+1;
//           }else{
//               $order->order_no=1;
//           }
//      if ($checkCustomer){
//          $order->customer_id=$checkCustomer->id;
//      }else{
//          $order->customer_id=$newCustomer->id;
//      }
//            $order->type=$client->type;
//            $order->house=$client->house;
//            $order->street=$client->street;
//            $order->block=$client->block;
//            $order->officeno=$client->officeno;
//            $order->floor=$client->floor;
//            $order->building=$client->building;
//            $order->avanue=$client->avanue;
//            $order->special_dir=$client->specialdir;
//            $order->map_address=$client->mapaddress;
//            $order->delivery_charges=getarea()->delivery_charges;
//            $order->area_id=getarea()->id;
//            $order->government_id=getarea()->government_id;
//            $order->cart=serialize($cart);
//            $order->subtotal=carttotal()['total'];
//            $order->discount=$cart->promocode_amount;
//            $order->payment_type=Session::get('pay_type');
//            if(Session::has('schedual')){
//              $schedual=Session::get('schedual');
//                $order->order_type='Schedual';
//                $order->time_desc= schedual();
//                $order->schedual_id=$schedual->id;
//            }
//
//
//            if ($cart->promocode) {
////                dd($cart->promocode);
//                $promoCode=PromoCode::where('code',$cart->promocode)->get()->last();
//                if ($promoCode){
//                    $order->promo_code_id = $promoCode->id;
//                }
//            }
//            $order->total=carttotal()['total']+getarea()->delivery_charges- $cart->promocode_amount;
//            $order->save();
//        }
//        if ($cart->items){
//           if (count($cart->items)){
//            foreach ($cart->items as $key=>$item){
//
//                $newOrderItem=new OrderProduct();
//                $newOrderItem->order_id=$order->id;
//                $newOrderItem->item_id=$key;
//                $newOrderItem->qty=$item['qty'];
//                $newOrderItem->total=$item['price'];
//                $newOrderItem->note=$item['note'];
//                $newOrderItem->status='Active';
//                $newOrderItem->save();
//
//                if (is_array($cart->addon)){
//                    foreach ($cart->addon as $addon){
//                        if ($addon['product_id']==$key){
//                            $orderAddon=new OrderAddon();
//                            $orderAddon->order_id=$order->id;
//                            $orderAddon->order_item_id=$newOrderItem->id;
//                            $orderAddon->product_id=$addon['product_id'];
//                            $orderAddon->addon_id=$addon['item']['id'];
//
//                            $orderAddon->status='active';
//                            $orderAddon->save();
//                        }
//
//
//
//                    }
//
//                }
//
//
//
//            }
//
//
//           }
//
//        }
//
//        if ($cart->promocode){
////            dd($cart->promocode);
//            $updateCode=PromoCode::where('code',$cart->promocode)->get()->last();
////            $updateCode=PromoCode::find($cart->promocode['id']);
//            $updateCode->customer_usage=$updateCode->customer_usage+1;
//            $updateCode->update();
//        }
//
//
//
////        Mail::to('waqarulzafar@gmail.com')->send(new NotifyMail($order));
//
//
//
//
//
//
//
//
//        Session::forget('cart');
//        Session::flash('msg','Your Order Placed Successfully. Will be Delivered Soon');
//        $order_message="A new order with an id:  $order->id has been placed.";
//        event(new OrderEvent($order->id,$order_message));
//        Session::put('invoice_number',$order->invoice_number);
//        Session::put('invoice_id',$order->id);
//        return redirect('client/order_placed');
//
//
//
//
//
//
//    }


    public function reserveOrder($trxid, $status)
    {
//        dd($request->all());

        $oldCart = Session::get('cart') ? Session::get('cart') : '';
        $cart = new Cart($oldCart);
        $subtotal = 0;
        $deliveryCharges = 0;
        $total = 0;
        $promo = 0;
        $yesterday = Carbon::yesterday();
        $today = Carbon::today();
        $oldClient = Session::get('client') ? Session::get('client') : null;
//        dd($oldClient->mapaddress);
        $client = new ClienttDetail($oldClient);
//        dd($client);
        $lastOrder = Order::whereBetween('created_at', [$yesterday->addHours(24)->toDateTimeString(), $today->addHours(22)->toDateTimeString()])->get()->last();

        if ($oldClient) {
            $checkCustomer = Customer::whereNotNull('email')->where('email', $client->email)->orWhere('phone', $client->phone)->get()->last();
            if ($checkCustomer) {
                $checkCustomer->email = $client->email;
                $checkCustomer->name = $client->name;
                $checkCustomer->block = $client->block;
                $checkCustomer->phone = $client->phone;
                $checkCustomer->type = $client->type;
                $checkCustomer->house = $client->house;
                $checkCustomer->street = $client->street;
                $checkCustomer->officeno = $client->officeno;
                $checkCustomer->floor = $client->floor;
                $checkCustomer->building = $client->building;
                $checkCustomer->avanue = $client->avanue;
                $checkCustomer->special_dir = $client->specialdir;
                $checkCustomer->map_address = $client->mapaddress;
                $checkCustomer->update();
            } else {
                $newCustomer = new Customer();
                $newCustomer->email = $client->email;
                $newCustomer->name = $client->name;
                $newCustomer->phone = $client->phone;
                $newCustomer->type = $client->type;
                $newCustomer->house = $client->house;
                $newCustomer->street = $client->street;
                $newCustomer->officeno = $client->officeno;
                $newCustomer->floor = $client->floor;
                $newCustomer->building = $client->building;
                $newCustomer->avanue = $client->avanue;
                $newCustomer->special_dir = $client->specialdir;
                $newCustomer->map_address = $client->mapaddress;
                $newCustomer->block = $client->block;
                $newCustomer->save();
//                dd($client->mapaddress);
            }

        }


        if ($oldCart) {
            $order = new Order();
            $order->invoice_number = date('dmyhis');
            if ($lastOrder) {
                $order->order_no = $lastOrder->order_no + 1;
            } else {
                $order->order_no = 1;
            }
            if ($checkCustomer) {
                $order->customer_id = $checkCustomer->id;
            } else {
                $order->customer_id = $newCustomer->id;
            }
            $order->type = $client->type;
            $order->house = $client->house;
            $order->street = $client->street;
            $order->block = $client->block;
            $order->officeno = $client->officeno;
            $order->floor = $client->floor;
            $order->building = $client->building;
            $order->avanue = $client->avanue;
            $order->special_dir = $client->specialdir;
            $order->map_address = $client->mapaddress;
            $order->delivery_charges = getarea()->delivery_charges;
            $order->area_id = getarea()->id;
            $order->government_id = getarea()->government_id;
            $order->cart = serialize($cart);
            $order->subtotal = carttotal()['total'];
            $order->discount = $cart->promocode_amount;
            $order->payment_type = Session::get('pay_type');
            $order->trx_id = $trxid;
            if (Session::has('schedual')) {
                $schedual = Session::get('schedual');
                $order->order_type = 'Schedual';
                $order->time_desc = schedual();
                $order->schedual_id = $schedual->id;
            }


            if ($cart->promocode) {
//                dd($cart->promocode);
                $promoCode = PromoCode::where('code', $cart->promocode)->get()->last();
                if ($promoCode) {
                    $order->promo_code_id = $promoCode->id;
                }
            }
            $order->total = carttotal()['total'] + getarea()->delivery_charges - $cart->promocode_amount;
            $order->save();
        }
        if ($cart->items) {
            if (count($cart->items)) {
                foreach ($cart->items as $key => $item) {
                    $product_id = $item['item']->id;

                    $newOrderItem = new OrderProduct();
                    $newOrderItem->order_id = $order->id;
                    $newOrderItem->item_id = $key;
                    $newOrderItem->qty = $item['qty'];
                    $newOrderItem->total = $item['price'];
                    $newOrderItem->note = $item['note'];
                    $newOrderItem->status = 'Active';
                    $newOrderItem->save();
                    foreach ($cart->options as $options) {
                        if ($options['product_id'] == $product_id) {
                            OrderProductVariant::create([
                                'order_id' => $order->id,
                                'product_id' => $product_id,
                                'variant_id' => $options['item']->id,
                                'variant_head_id' => $options['item']->variant_head_id,
                            ]);
                        }
                    }
                    if (is_array($cart->addon)) {
                        foreach ($cart->addon as $addon) {
                            if ($addon['product_id'] == $key) {
                                $orderAddon = new OrderAddon();
                                $orderAddon->order_id = $order->id;
                                $orderAddon->order_item_id = $newOrderItem->id;
                                $orderAddon->product_id = $addon['product_id'];
                                $orderAddon->addon_id = $addon['item']['id'];

                                $orderAddon->status = 'active';
                                $orderAddon->save();
                            }


                        }

                    }


                }


            }

        }

        if ($cart->promocode) {
//            dd($cart->promocode);
            $updateCode = PromoCode::where('code', $cart->promocode)->get()->last();
//            $updateCode=PromoCode::find($cart->promocode['id']);
            $updateCode->customer_usage = $updateCode->customer_usage + 1;
            $updateCode->update();
        }


//        Mail::to('waqarulzafar@gmail.com')->send(new NotifyMail($order));


//        Session::forget('cart');
//        Session::flash('msg','Your Order Placed Successfully. Will be Delivered Soon');
//        $order_message="A new order with an id:  $order->id has been placed.";
//        event(new OrderEvent($order->id,$order_message));
//        Session::put('invoice_number',$order->invoice_number);
//        Session::put('invoice_id',$order->id);
//        return redirect('client/order_placed');

        return $order;


    }

    public function storepaymenttype(Request $request)
    {
        Session::put('pay_type', $request->type);
        return response(['status' => 'success']);
    }


    public function availabilityTime()
    {
        $title = "Availability Time";
        $days = Schedule::all();
        return view('client.availability_time', compact('title', 'days'));
    }

    public function order_placed()
    {
//        dd();
        $invoice_number = Session::get('invoice_number');
        $invoice_id = Session::get('invoice_id');

        $title = "Finished";
        $order = Order::with('customer')->where('orders.id', '=', $invoice_id)->select('orders.id', 'customer_id', 'order_statuses.desc', 'order_statuses.status', 'area_id')
            ->leftJoin('order_statuses', 'order_statuses.id', '=', 'orders.status_id')->get()->last();


        return view('client.order-status', compact('title', 'invoice_number', 'order'));
    }

    public function selectMap()
    {
        $title = 'Select Map';
        return view('client.select_map', compact('title'));
    }

    public function orderStatus($order_id)
    {
        $order = Order::find($order_id);
        $order_items = OrderProduct::where('order_id', '=', $order->id)
            ->join('products', 'products.id', '=', 'order_products.item_id')->get();
        $customer = Customer::find($order->customer_id);
        $area = Area::find($order->area_id);
        $status = OrderStatus::find($order->status_id);
        $title = "Order Status";
        return view('client.order-status-update', compact('order', 'title', 'order_items', 'customer', 'area', 'status'));
    }

    public function order_lookup()
    {
        $title = "Order Lookup";
        return view('client.order-lookup', compact('title'));
    }

    public function getOrders(Request $request)
    {
//        $customer=Customer::where('phone','LIKE','%'.$request->phone.'%')->get()->last();
        $customer = Customer::where('phone', '=', trim($request->phone))->get()->last();
//        return $customer;
        if ($customer) {
            $orders = Order::where('customer_id', '=', $customer->id)->get();
        } else {
            $orders = null;
        }
        return $orders;
    }

    public function saveMapAddress(Request $request)
    {
        $client = Session::get('client') ? Session::get('client') : null;
        $newClient = new ClienttDetail($client);
        $newClient->mapAddress($request->address);
        Session::put('client', $newClient);
        $final = Session::get('client');
        return response('success');
    }

    public function updateSchedual(Request $request)
    {
        $openingHour = OpeningHours::find($request->id);
        if ($openingHour) {
            Session::put('schedual', $openingHour);
            return response(['type' => 'success', 'message' => 'Schedual Updated Successfully']);
        }
        return response(['dat' => $request->all()]);
    }

    public function forgetSchedual()
    {
        Session::forget('schedual');
        return redirect()->back();
    }

    public function removeItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        if ($oldCart) {


            $cart = new Cart($oldCart);
            $item = Product::find($id);
            $cart->delete(0, $item, $id);
            Session::put('cart', $cart);


        }
        return redirect()->back();
    }

    public function removeVarient($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        if ($oldCart) {


            $cart = new Cart($oldCart);

            $cart->deletVariant($id);
            Session::put('cart', $cart);


        }
        return redirect()->back();
    }

    public function removeCartAddon($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        if ($oldCart) {


            $cart = new Cart($oldCart);
            $item = Addon::find($id);
            $cart->deletAddon($id);
            Session::put('cart', $cart);


        }
    }

    public function categories()
    {

        $limit = 15;
        $lastActivity = strtotime(Carbon::now()->subSeconds($limit));
        $order = \App\Order::latest()->with('products')->with('area')->with('customer')->first();
        if ($order) {
            if($order->products[0]->products !== null) {
                $image = '<img class=img-thumbnail rounded style= width:50px'. ' src=' . \url('/').'/'.$order->products[0]->products->media[0]->path . '/>';
                toastr()->info($image . ' ' .$order->products[0]->products->name . ' has been bought by ' . $order->customer->name. ' from '. $order->area->name);
            }
        }



        $categories = Category::all();
        $title = 'Categories';
        return view('client.categories', compact('categories', 'title'));
    }
    public function catProducts($id){
        $title = 'Home';
        $settings = Setting::first();
        $products = Product::select('products.id','products.name','products.name_ar','products.image','products.description','products.description_ar','products.price')->where('category_id',$id)->orderBy('products.order_level')->join('categories', 'categories.id', '=', 'products.category_id')->groupBy('products.id')->with('media')->get()->groupBy('category');

        //        $products=Product::select('products.id','products.name')->join('categories','categories.id','=','products.category_id')->groupBy('products.id')->get();
        $categories = Category::orderBy('order_level')->get();
        return view('client.cat_products', compact('products', 'categories', 'settings', 'title'));
    }
    public function switchCurrency($currency){
//        dd($currency);
        Session::put('currency',$currency);
//        dd(Session::get('currency'));
        return redirect()->back();
    }

}
