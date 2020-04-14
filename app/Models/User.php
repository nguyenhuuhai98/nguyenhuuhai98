<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'role_id',
        'address',
        'birthday',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class, 'user_id');
    }

    public function followOtherUsers()
    {
        return $this->belongsToMany($this, 'follows', 'user_id', 'user_follow_id');
    }

    public function otherUsersFollow()
    {
        return $this->belongsToMany($this, 'follows', 'user_follow_id', 'user_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function lessions()
    {
        return $this->belongsToMany(Lession::class, 'user_lession')->withPivot('status', 'result');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'user_course')->withPivot('progress', 'status');
    }

    public function words()
    {
        return $this->belongsToMany(Word::class, 'user_word');
    }
}
