<?php
namespace App\Repositories\Course;

use App\Repositories\EloquentRepository;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseEloquentRepository extends EloquentRepository implements CourseRepositoryInterface
{

    public function getModel()
    {
        return Course::class;
    }

    public function getWhere()
    {
        return $this->_model::where('cate_id', config('number.zero'))->get();
    }

    public function getWhereById($id)
    {
        return $this->_model::where('cate_id', $id)->get();
    }

    public function getOrderBy()
    {
        return $this->_model::orderBy('id', 'DESC')->paginate(config('number.ten'));
    }

    public function getOrderByLimit()
    {
        return $this->_model::orderBy('id')->limit(config('number.three'))->get();
    }

    public function search($key)
    {
        return $this->_model::where('name', 'like', '%' . $key . '%')->get();
    }

    public function courseByUser($id)
    {
        return Auth::user()->courses()->where('course_id', $id)->first();
    }

    public function attach($id, array $data)
    {
        return Auth::user()->courses()->attach($id, $data);
    }
}
