<?php

namespace App\Http\Controllers;

use App\Addon;
use App\AddonHead;
use App\Category;
use App\DataTables\AddonDataTableEditor;
use App\DataTables\AddOnHeadDataTableEditor;
use App\DataTables\CategoryDataTableEditor;
use App\DataTables\ProductDataTableEditor;
use App\DataTables\variantDataTableEditor;
use App\DataTables\VariantHeadDataTableEditor;
use App\Product;
use App\Variant;
use App\VariantHead;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;
use Yajra\DataTables\DataTables;
use Cart;
class ProductController extends Controller
{
    //categories
    public function category(){
        return view('admin.product.category');
    }
    public function getCategories(Request $request){
        $data=Category::select('id','category','image','category_ar','icon','order_level','status')->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtCategories(CategoryDataTableEditor $editor){
        return $editor->process(\request());
    }



    //products
    public function product(){
        return view('admin.product.product');
    }




    public function getProduct(Request $request){
        $data=Product::select('products.id',
            'name','discount','discount_percentage','products.order_level','category_id','name_ar',
            'products.image','manage_stock','price','price_bd','price_omr','price_qar','price_sar','price_aed','price_usd','stock','description','description_ar','display','categories.category')
            ->leftJoin('categories','categories.id','=','products.category_id')->with('media')
            ->orderBY('products.order_level');

        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }

    public function getCategoriesForSelect2(Request $request){
        $categories=Category::all();
        return response(['dat'=>$categories]);
    }
    public function getProductsForSelect2(Request $request){
        $products=Product::all();
        return response(['dat'=>$products]);
    }
    public function getVariantHeadsForSelect2(Request $request){
        $variantHeads=VariantHead::all();
        return response(['dat'=>$variantHeads]);
    }
    public function getAddOnnHeadsForSelect2(Request $request){
        $addOnHeads=AddonHead::all();
        return response(['dat'=>$addOnHeads]);
    }

    public function dtProducts(ProductDataTableEditor $editor){
        return $editor->process(\request());
    }


    //variants
    public function variant(){
        return view('admin.product.variant');
    }
    public function getVariants(Request $request){
        $data=Variant::select('variants.id','variants.name','products.name as product','variant_heads.name as variant_head','variant_heads.product_id','variants.name_ar','variants.price','variants.price_bd','variants.price_omr','variants.price_qar','variants.price_sar','variants.price_aed','variants.price_usd','variants.stock','variants.manage_stock')
            ->leftJoin('variant_heads','variant_heads.id','=','variants.variant_head_id')
            ->leftJoin('products','products.id','=','variants.product_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtVariants(variantDataTableEditor $editor){
        return $editor->process(\request());
    }

    // Variant Heads
    public function getVariantHeads(){
        $data=VariantHead::select('variant_heads.id','variant_heads.name','product_id','variant_heads.name_ar','products.name as product')->leftJoin('products','products.id','=','variant_heads.product_id')->get();
        try{
            return DataTables::of($data)->make(true);
        }catch (\Exception $e){

        }
    }
    public function dtVariantHeads(VariantHeadDataTableEditor $editor){
        return $editor->process(\request());
    }


    //Add-ons
    public function addon(){
        return view('admin.product.addon');
    }
    public function getAddOns(){
        $data=Addon::select('addons.id','addons.name','addons.name_ar','price','stock','manage_stock','addon_heads.name as addon_head')
            ->leftJoin('addon_heads','addon_heads.id','=','addons.head_id')->get();
        try{
            return DataTables::of($data)->make(true);
        }catch (\Exception $e){}
    }
    public function dtAddOns(AddonDataTableEditor $editor){
        return $editor->process(\request());
    }
    //Add-on Heads
    public function getAddOntHeads(){
        $data=AddonHead::select('addon_heads.id','addon_heads.name','addon_heads.name_ar','products.name as product')
            ->join('products','addon_heads.product_id','=','products.id');
        try{
            return DataTables::of($data)->make(true);
        }catch (\Exception $e){
        }
    }
    public function dtAddOnHeads(AddOnHeadDataTableEditor $editor){
        return $editor->process(\request());
    }


    public function getProducts(Request $request) {
        $products = Product::where('category_id', $request['id'])->with('media')->get();
        return response()->json([
            'type' => 'success',
            'message' => 'Product Got Successfully',
            'products' => $products,
        ]);
    }

    public function getProductDetails(Request $request) {
        $product = Product::where('id', $request['id'])->with('variantHead')->with('addonsHead')->with('media')->first();
//        dd($product);
        $price = Cart::getTotal();
        $cart = Cart::get($product->id);

        return response()->json([
            'type' => 'success',
            'message' => 'Product Got Successfully',
            'product' => $product,
            'price' => $price,
            'cart' => $cart,
        ]);
    }

}
