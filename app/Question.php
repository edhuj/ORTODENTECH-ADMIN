<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Quiz;

class Question extends Model
{
    public function answers(){
      return $this->hasMany(Answer::class);
    }

    public function quiz(){
      return $this->hasOne(Quiz::class);
    }
}
