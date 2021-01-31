<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Government extends Model
{
    protected $fillable=['id','name','name_ar','delivery_charges'];

    public function areas() {
        return $this->hasMany(Area::class);
    }
}
