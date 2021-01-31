<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //
    protected $guarded = [];

    public function product() {
        return $this->belongsTo(Product::class, 'id', 'item_id')->where('item_type', 'product');
    }
}
