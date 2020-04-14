<?php
namespace App\Repositories\Activity;

use App\Repositories\EloquentRepository;
use App\Models\Activity;

class ActivityEloquentRepository extends EloquentRepository implements ActivityRepositoryInterface
{

    public function getModel()
    {
        return Activity::class;
    }

    public function getWhere($id)
    {
        return $this->_model::where('user_id', $id)->orderBy('id', 'DESC')->paginate(config('number.seven'));
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
        return $this->_model::orderBy('id')->limit(config('number.five'))->get();
    }
}
