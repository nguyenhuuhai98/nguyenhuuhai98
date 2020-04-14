<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Lession extends Model
{
    protected $fillable = [
    	'user_id',
    	'lession_id',
    	'status',
    	'result',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function lession()
    {
    	return $this->belongsTo(Lession::class, 'lession_id');
    }
}
