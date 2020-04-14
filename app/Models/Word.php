<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = [
    	'lession_id',
    	'key_word',
    	'sentence',
    ];

    public function users()
    {
    	return $this->belongsToMany(User::class, 'user_word');
    }
    public function lession()
    {
        return $this->belongsTo(Lession::class);
    }
}
