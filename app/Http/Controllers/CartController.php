<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Events\OrderEvent;
use App\Order;
use App\OrderAddon;
use App\OrderProduct;
use App\OrderProductVariant;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cart;
use PhpParser\Node\Expr\Array_;
use function Matrix\add;

class CartController extends Controller
{
    //

    public function index() {
        $content = Cart::getContent();
        $price = Cart::getTotal();

        return response()->json([
            'type' => 'success',
            'cart' => $content,
            'totalPrice' => $price,
        ]);
    }



    public function cartStoreInSession(Request $request) {
        $oldCart = Session::get('cart') ? Session::get('cart') : null;
        if ($oldCart) {
            foreach ($oldCart as $cart) {
                dd($cart);
            }
        }
        else {
            foreach ($request['cart'] as $item) {

                Session::put('cart', [
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'stock' => $item['stock']
                ]);
            }


        }
//        $item = Product::find($request->id);
//        $cart = new Cart($oldCart);

//        Session::put('cart', $cart);
        return response(['data' => Session::get('cart')]);
    }

    public function store(Request $request) {
        $product = Product::where('id', $request->product)->first();
        $price = (integer)$product->price;

        if (count($request->variants) > 0) {
            foreach ($request->variants as $variant) {
                $price = (integer)$variant['price'];
            }
        }

        if (count($request->addons) > 0) {
            foreach ($request->addons as $addon) {
                $price += (integer)$addon['price'];
            }
        }

        Cart::add(array(
            'id' => $product->id, // inique row ID
            'name' => $product->name,
            'price' => (integer)$price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'addons' => $request->addons,
                'variants' => $request->variants,
                'instruction' => $request->instruction,
            )
        ));
        $totalPrice = Cart::getTotal();

        return response()->json([
            'message' => 'Product Added To Successfully',
            'type' => 'success',
            'totalPrice' => $totalPrice,
        ]);
    }

    public function getCart(Request $request) {
        $cart = Cart::get($request['product']);
        if ($cart) {
            return response()->json([
                'type' => 'success',
                'cart' => $cart,
            ]);
        }
        else {
            return response()->json([
                'type' => 'empty',
            ]);
        }

    }

    public function getAllCart() {
        $content = Cart::getContent();
        $totalPrice = Cart::getTotal();
        $cartTotalQuantity = Cart::getTotalQuantity();

        return response()->json([
            'type' => 'success',
            'cart' => $content,
            'totalPrice' => $totalPrice,
            'quantity' => $cartTotalQuantity,
        ]);
        dd($totalPrice, $cartTotalQuantity);
    }

    public function remove(Request $request) {
        Cart::remove($request->product);

        $content = Cart::getContent();
        $totalPrice = Cart::getTotal();
        $cartTotalQuantity = Cart::getTotalQuantity();

        return response()->json([
            'type' => 'success',
            'cart' => $content,
            'totalPrice' => $totalPrice,
            'quantity' => $cartTotalQuantity,
        ]);
    }


    public function createOrder(Request $request) {
        $trxid = time();
        $totalPrice = Cart::getTotal();
        $customer = Customer::where('phone', $request['mobile'])->first();
        if (!$customer) {
            $customer = Customer::create([
                'name' => $request['name'],
                'phone' => $request['phone'],
                'email' => $request['email'],
            ]);
        }

        $order = Order::create([
            'customer_id' => $customer['id'],
            'government_id' => $request['area']['government_id'],
            'area_id' => $request['area']['id'],
            'delivery_charges' => $request['area']['delivery_charges'],
            'total' => $totalPrice,
            'trx_id' => $trxid,
            'block' => $request['block'],
            'avanue' => $request['avenue'],
            'street' => $request['street'],
            'building' => $request['building'],
            'note' => $request['additional'],
        ]);

        foreach (Cart::getContent() as $content) {
            $order_item = OrderProduct::create([
                'order_id' => $order->id,
                'item_id' => $content->id,
                'qty' => $content->quantity,
                'total' => $content->price,
                'note' => $content->attributes->instruction,
            ]);
            if ($content->attributes->addons){
                foreach ($content->attributes->addons as $addon) {
                    OrderAddon::create([
                        'order_id' => $order->id,
                        'order_item_id' => $order_item->id,
                        'product_id' => $content->id,
                        'addon_id' => $addon['id'],
                    ]);
                }
            }
            if ($content->attributes->variants){
                foreach ($content->attributes->variants as $variant) {
                    OrderProductVariant::create([
                        'order_id' => $order->id,
                        'product_id' => $content->id,
                        'variant_id' => $variant['id'],
                        'variant_head_id' => $variant['variant_head_id'],
                    ]);
                }
            }
        }
        $order_message = "A new order with an id:  $order->id has been placed.";

        event(new OrderEvent($order->id, $order_message));

        return response()->json([
            'order_id' => $order->id,
            'type' => 'success'
        ]);
    }

}
