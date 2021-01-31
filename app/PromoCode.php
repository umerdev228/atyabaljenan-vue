<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    protected $fillable=['id','code','type','description','status','description_ar','percentage','amount','customer_usage','active_until','limited_usage'];
}
