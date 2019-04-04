<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Question extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
          'id' => $this->id,
          'statement' => $this->statement,
          'option1' => $this->option1,
          'option2' => $this->option2,
          'option3' => $this->option3,
          'option4' => $this->option4,
          'answer' => $this->answer,
          'topic' => $this->topic,
          'url_photo' => '/uploads/'.$this->filename,
          'updated_at' => $this->updated_at,
      ];
    }
}
