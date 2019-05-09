<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\SignumRaw;

class Location extends Model
{
    //
    function getClosestHexagon(){

      return DB::select('select hexagons.id from
                          hexagons order by
                          ST_Distance_Sphere( point(?, ?), point(hexagons.latitude, hexagons.longitude))
                          asc limit 1', [$this->latitude, $this->longitude]);

    }

    function assignHexagon(){
      $signumRaw = new SignumRaw();

      $hexagon = DB::select('select hexagons.id from
                          hexagons order by
                          ST_Distance_Sphere( point(?, ?), point(hexagons.latitude, hexagons.longitude))
                          asc limit 1', [$this->latitude, $this->longitude]);

      $signumRaw->manufacturer = $this->manufacturer;
      $signumRaw->model = $this->model;
      $signumRaw->version_release = $this->version_release;
      $signumRaw->version_name = $this->version_name;

      $signumRaw->provider = $this->provider;
      $signumRaw->accuracy = $this->accuracy;
      $signumRaw->latitude = $this->latitude;
      $signumRaw->longitude = $this->longitude;

      $signumRaw->cdmaDbm = $this->cdmaDbm;
      $signumRaw->cdmaEcio = $this->cdmaEcio;
      $signumRaw->evdoDbm = $this->evdoDbm;
      $signumRaw->evdoEcio = $this->evdoEcio;
      $signumRaw->evdoSnr = $this->evdoSnr;
      $signumRaw->gsmBitErrorRate = $this->gsmBitErrorRate;
      $signumRaw->mLteRsrp = $this->mLteRsrp;
      $signumRaw->mLteRsrq = $this->mLteRsrq;
      $signumRaw->mLteRssnr = $this->mLteRssnr;
      $signumRaw->mLteCqi = $this->mLteCqi;

      $signumRaw->signal = $this->signal;
      $signumRaw->level = $this->level;
      $signumRaw->networkType = $this->networkType;
      $signumRaw->gpsEnabled = $this->gpsEnabled;
      $signumRaw->isgsm = $this->isgsm;
      $signumRaw->signum_hexagon_id = $hexagon[0]->id;

      return $signumRaw->save();
    }


}
