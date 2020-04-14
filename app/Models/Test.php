<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
    	'lession_id',
    	'name',
    ];

    public function lession()
    {
    	return $this->hasOne(Lession::class, 'lession_id');
    }

    public function questions()
    {
    	return $this->belongsToMany(Question::class, 'test_question');
    }
}
