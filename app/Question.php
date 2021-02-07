<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // protected $table = 'questions';
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function answer()
    {
        return $this->hasMany('App\Answer');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'questions_tag', 'question_id', 'tag_id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
}
?>