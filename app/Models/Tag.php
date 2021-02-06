<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag_name'];
    public function question()
    {
        return $this->belongsToMany('App\Question', 'questions_tag', 'tag_id', 'question_id');
    }
}
