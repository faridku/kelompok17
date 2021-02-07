<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    // protected $table = 'answers';
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
    public function like()
    {
        return $this->hasMany('App\Like');
    }
}
