<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    protected $fillable=['id','head_id','name','name_ar','price','manage_stock','stock'];
}
