<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumUser extends Model
{
  public function posts(){
    return $this->hasMany('App\Post');
  }

  public function comments(){
    return $this->hasMany('App\Comment');
  }
}
