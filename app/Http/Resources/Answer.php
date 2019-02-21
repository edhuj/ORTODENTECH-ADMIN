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
        $question = Question::find($this->question_id);
        $user_answer = "Blank";
        if($this->user_answer == 1){
          $user_answer = $question->option1;
        }
        else if($this->user_answer == 2){
          $user_answer = $question->option2;
        }
        else if($this->user_answer == 3){
          $user_answer = $question->option3;
        }
        else if($this->user_answer == 4){
          $user_answer = $question->option4;
        }
        else if($this->user_answer == 5){
          $user_answer = $question->option5;
        }

        if($this->answer_state == 1)
          $answer_state = "Correct";
        else if($this->answer_state == 2)
          $answer_state = "Incorrect";
        else if($this->answer_state == 3)
          $answer_state = "Blank";

        return [
          'user_id' => $this->user_id,
          'question_statement' => Question::find($this->question_id)->statement,
          'answer_state' => $answer_state,
          'user_answer' => $user_answer,
          'points_received' => $this->points_received,
        ];
    }

}
