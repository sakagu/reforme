<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Like;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['title', 'body', 'summary', 'user_id'];

    public function comments() {
      return $this->hasMany('App\Comment');
    }

    public function likes()
    {
      return $this->hasMany('App\Like');
    }

    public function like_by()
    {
      return Like::where('user_id', Auth::user()->id)->first();
    }

}
