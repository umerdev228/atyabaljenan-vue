<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cart;
use PhpParser\Node\Expr\Array_;

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


}
