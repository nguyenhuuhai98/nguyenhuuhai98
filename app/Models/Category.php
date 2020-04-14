<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name',
    	'parent_id',
    	'slug',
        'avatar',
    ];

    public function courses()
    {
    	return $this->hasMany(Course::class, 'cate_id');
    }
}
