<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class travels extends Model
{
    public function  Travel_time() {
        return $this->hasMany('App\Travel_time');
    }
}
