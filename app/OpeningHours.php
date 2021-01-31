<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpeningHours extends Model
{
    //
    public function day(){
        return $this->belongsTo(Schedule::class,'schedule_id');
    }
}
