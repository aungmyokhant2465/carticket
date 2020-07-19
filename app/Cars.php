<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    public function Driver(){
        return $this->belongsTo('App\Driver');
    }
}
