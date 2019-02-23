<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
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
          'title' => $this->title,
          'content' => $this->content,
          'url_photo' => '/uploads/'.$this->filename,
          'updated_at' => $this->updated_at,
      ];
    }
}
