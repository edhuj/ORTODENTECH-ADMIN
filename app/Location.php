<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //

    public function hexagon(){
      return $this->hasOne('App\Hexagon');
    }
}
