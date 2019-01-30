<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  public function answers(){
    return $this->hasMany(Answer::class);
  }
}
