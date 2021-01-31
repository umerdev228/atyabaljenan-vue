<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable=['id','variant_head_id','product_id',
        'name','name_ar',
        'price','price_bd','price_omr','price_qar','price_sar','price_aed','price_usd',
        'manage_stock','stock'];
}
