<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use App\Models\User;

class UserEloquentRepository extends EloquentRepository implements UserRepositoryInterface
{

    public function getModel()
    {
        return User::class;
    }

    public function search($key)
    {
        return $this->_model::where('name', 'like', '%' . $key . '%')->get();
    }

    public function userWord($id)
    {
        return $this->_model::with('words')->where('id', $id)->first();
    }

    public function followUser($id)
    {
        return $this->_model::with('followOtherUsers')->where('id', $id)->first()->followOtherUsers;
    }

    public function userLession($id)
    {
        return $this->_model::with('lessions')->where('id', $id)->first();
    }

    public function userCourse($id)
    {
        return $this->_model::with('courses')->where('id', $id)->first();
    }

    public function user()
    {
        return $this->_model::where('role_id', config('number.two'))->limit(5)->get();
    }

    public function getUserByMonth($year, $month)
    {
        return $this->_model::where('role_id', config('number.two'))->whereYear('created_at', $year)->whereMonth('created_at', $month)->count('id');
    }
}
