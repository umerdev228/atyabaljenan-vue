<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddonHead extends Model
{
    protected $fillable=['id','product_id','name','name_ar'];

    public function addons(){
        return $this->hasMany(Addon::class,'head_id');
    }
}
