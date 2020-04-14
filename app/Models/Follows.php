<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follows extends Model
{
    protected $fillable = [
    	'user_id',
    	'user_follow_id',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
