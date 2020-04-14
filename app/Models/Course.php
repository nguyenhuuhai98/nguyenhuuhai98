<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
    	'cate_id',
    	'name',
        'slug',
        'avatar',
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class, 'cate_id');
    }

    public function lessions()
    {
    	return $this->hasMany(Lession::class, 'course_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_course');
    }
}
