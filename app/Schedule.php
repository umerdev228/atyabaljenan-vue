<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function times()
    {
        return $this->hasMany('App\OpeningHours','schedule_id','id');
    }
}
