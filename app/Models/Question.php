<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
    	'question_id',
    	'text',
    	'true_answer'
    ];

    public function answers()
    {
    	return $this->hasMany(Answer::class);
    }

    public function tests()
    {
    	return $this->belongsToMany(Test::class, 'test_question');
    }
}
