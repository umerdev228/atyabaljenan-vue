<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProductVariant extends Model
{
    //

    protected $guarded = [];
    public function variant() {
        return $this->belongsTo(Variant::class, 'variant_id', 'id');
    }
}
