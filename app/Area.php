<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable=['id','government_id','name','name_ar','delivery_charges','delivery_time'];
}
