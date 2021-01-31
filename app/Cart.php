<?php
namespace App;
use Illuminate\Support\Facades\Session;

class Cart{
    public $items = null;
    public $options=null;
    public $addon=null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $promocode = null;
    public $promocode_amount = 0;
    public $grand_total = 0;

    public function __construct($oldcart)
    {
        if($oldcart){
            $this->items= $oldcart->items;
            $this->totalQty= $oldcart->totalQty;
            $this->totalPrice= $oldcart->totalPrice;
            $this->options=$oldcart->options;
            $this->addon=$oldcart->addon;
            $this->grand_total=$oldcart->grand_total;
            $this->promocode=$oldcart->promocode;
            $this->promocode_amount=$oldcart->promocode_amount;
        }
    }


//    public function  add($qty,$item, $id,$note=''){
//        $storedItem =['qty'=> 0,'price'=>$item->price, 'item'=>$item];
//        if($this->items){
//            if(array_key_exists($id, $this->items)){
//                $storedItem = $this->items[$id];
//            }
//        }
//        $storedItem['qty']+=$qty;
//        $storedItem['price'] = $item->price * $qty;
//        $storedItem['note']=$note;
//        $fortotalprice= $item->price * $qty;
//        $this->items[$id] = $storedItem;
//        $this->totalPrice = 0;
//        $this->totalQty = 0;
//
//        foreach ($this->items as $item){
//
//            if ($item){
//                $this->totalQty=$item['qty'];
//                $this->totalPrice+=($item['price']);
//            }
//        }
//        $this->promoCode($this->promocode);
//
//    }



    public function  update($qty,$item, $id,$note=''){
        $storedItem =['qty'=> 0,'price'=>$item->sale_price, 'item'=>$item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']=$qty;
        $storedItem['price'] = $item->price * $qty;
        $storedItem['note']=$note;

        $fortotalprice= $item->price * $qty;
        $this->items[$id] = $storedItem;
        $this->totalQty = 0;
//        $this->totalPrice += $fortotalprice;
        $this->totalPrice=0;

        foreach ($this->items as $item){

            if ($item){
                $this->totalQty=$item['qty'];
                $this->totalPrice+=($item['price']);
                $this->grand_total+=($item['price']);
            }
        }
        $this->promoCode($this->promocode);

    }
    public function delete($itemqty, $item, $id){

        unset($this->items[$id]);
        $this->totalQty=0;
        foreach ($this->items as $item){
            $this->totalQty+=$item['qty'];
        }
        $this->promoCode($this->promocode);
    }
    public function addVarient($itemid,$id,$qty,$item){
        $this->options=null;
        $storedItem =['qty'=> 0,'price'=>$item->price, 'item'=>$item,'product_id'=>$itemid];
        if($this->options){
            if(array_key_exists($id, $this->options)){
                $storedItem = $this->options[$id];
            }
        }

        $storedItem['qty']=$qty;
        $storedItem['price'] = $item->price * $qty;
        $fortotalprice= $item->price * $qty;
        $this->options[$id] = $storedItem;
        if ($qty<0){
            unset($this->options[$id]);
        }

    }
    public function addAddon($itemid,$id,$qty,$item){
        $this->addon=null;

        $storedItem =['qty'=> 0,'price'=>$item->price, 'item'=>$item,'product_id'=>$itemid];
        if($this->addon){
            if(array_key_exists($id, $this->addon)){
                $storedItem = $this->addon[$id];
            }
        }

        $storedItem['qty']=$qty;
        $storedItem['price'] = $item->price * $qty;
        $fortotalprice= $item->price * $qty;
        $this->addon[$id] = $storedItem;
//        if ($qty<0){
//            unset($this->addon[$id]);
//        }

    }
    public function deletVariant($id){


        unset($this->options[$id]);
        $this->totalQty=0;
        foreach ($this->items as $item){
            $this->totalQty+=$item['qty'];
        }
    }
    public function deletAddon($id){


        unset($this->addon[$id]);
        $this->totalQty=0;
        foreach ($this->items as $item){
            $this->totalQty+=$item['qty'];
        }
    }
    public function  addProductByVariant($qty,$item, $id,$price,$note=''){
        $storedItem =['qty'=> 0,'price'=>$price, 'item'=>$item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']=$qty;
        $storedItem['price'] = $price * $qty;
        $storedItem['note']=$note;

        $fortotalprice= $price * $qty;
        $this->items[$id] = $storedItem;
        $this->totalQty = 0;
//        $this->totalPrice += $fortotalprice;
        $this->totalPrice=0;

        foreach ($this->items as $item){

            if ($item){
                $this->totalQty=$item['qty'];
                $this->totalPrice+=($item['price']);
                $this->grand_total+=($item['price']);
            }
        }
        $this->promoCode($this->promocode);

    }



    public function promoCode($code){
        if ($code){
            if ($code->type=="percentage"){
                $code_amount=$code->percentage/100*$this->totalPrice;
                $this->promocode_amount = $code_amount;
                $this->promocode=$code->code;
                $this->grand_total=$this->totalPrice-$code_amount;
            }else{
                $code_amount=$code->amount;
                $this->promocode_amount = $code_amount;
                $this->promocode=$code->code;
                $this->grand_total=$this->totalPrice-$code_amount;
            }
        }else{
            $this->promocode_amount=0;
            $this->promocode=null;
            $this->grand_total=$this->totalPrice;
        }

    }







// Add to cart
//$product= products:: find($request->product_id);
//$qty=$request->qty;
//$oldcart=Session::has('cart') ? Session::get('cart'): null;
//$cart = new cart($oldcart);
//$cart->add($qty,$product, $product->id);
//$request->session()->put('cart',$cart);
//session()->flash('message','Product was successfully added to cart');
//return back();









//updatecart
//$product= products:: find($request->id);
//$qty=$request->qty;
//$oldcart=Session::has('cart') ? Session::get('cart'): null;
//$cart = new cart($oldcart);
//$cart->update($qty,$product, $product->id);
//Session::put('cart',$cart);
//return back();





}
