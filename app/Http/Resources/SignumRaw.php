<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\SignumRaw;

class SignumRaw extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return parent::toArray('id' => $this->id,
            'latitude' => SignumRaw::find($this->id)->latitude,
            'longitude' => SignumRaw::find($this->id)->longitude,
            'average' => $this->average,);
    }
}
