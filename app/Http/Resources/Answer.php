<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Question;

class Answer extends JsonResource
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
          'user_id' => $this->user_id,
          'question_statement' => Question::find($this->question_id)->statement,
          'answer_state' => $this->answer_state,
          'user_answer' => $this->user_answer,
          'points_received' => $this->points_received,
        ];
    }

}
