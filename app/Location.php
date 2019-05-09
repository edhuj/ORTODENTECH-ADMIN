<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    function getClosestHexagon(){
      $signumRaw = new SignumRaw();

      return DB::select('select hexagons.id from
                          hexagons order by
                          ST_Distance_Sphere( point(?, ?), point(hexagons.latitude, hexagons.longitude))
                          asc limit 1', [$this->latitude, $this->longitude]);

    }
}
