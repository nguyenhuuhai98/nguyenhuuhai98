<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
    	'question_id',
    	'text',
    	'true_answer',
    ];

    public function question()
    {
    	return $this->belongsTo(Question::class);
    }
}
