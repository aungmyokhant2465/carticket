<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    public function driver(){
        return $this->belongsTo('App\Driver');
    }
}
