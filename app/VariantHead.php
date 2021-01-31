<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariantHead extends Model
{
    protected $fillable=['id','name','name_ar','product_id'];

    public function variants(){
        return $this->hasMany(Variant::class,'variant_head_id');
    }
}
