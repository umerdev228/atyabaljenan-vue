<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $guarded = [];

    public function products(){
        return $this->hasMany(OrderProduct::class,'order_id')->with('products');
    }

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function area(){
        return $this->belongsTo(Area::class,'area_id');
    }
    public function government(){
        return $this->belongsTo(Government::class,'government_id');
    }
    public function status(){
        return $this->belongsTo(OrderStatus::class,'status_id');
    }
}
