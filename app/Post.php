<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function comments(){
      return $this->hasMany('App\Comment');
    }
    public function forum_user(){
      return $this->belongsTo('App\ForumUser');
    }
}
