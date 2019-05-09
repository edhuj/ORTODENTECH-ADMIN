<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    function getClosestHexagon(){
      return DB::select('call assignHexagon2(?)', [$this->id]);
    }
}
