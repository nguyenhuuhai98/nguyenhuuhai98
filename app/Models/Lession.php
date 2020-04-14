<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lession extends Model
{
    protected $fillable = [
    	'course_id',
    	'name',
    	'description',
        'slug',
    ];

    public function course()
    {
    	return $this->belongsTo(Course::class, 'course_id');
    }

    public function test()
    {
    	return $this->hasOne(Test::class, 'lession_id');
    }

    public function words()
    {
    	return $this->hasMany(Word::class, 'lession_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_lession');
    }

}
