<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class travel_time extends Model
{
    public function Travel(){
        return $this->belongsTo("App\Travels");
    }
    public function Car(){
        return $this->belongsTo("App\Cars");
    }
}
