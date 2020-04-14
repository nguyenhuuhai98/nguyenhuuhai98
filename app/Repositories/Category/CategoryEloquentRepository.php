<?php
namespace App\Repositories\Category;

use App\Repositories\EloquentRepository;
use App\Models\Category;

class CategoryEloquentRepository extends EloquentRepository implements CategoryRepositoryInterface
{

    public function getModel()
    {
        return Category::class;
    }

    public function getWhere()
    {
        return $this->_model::where('parent_id', 0)->get();
    }

    public function getOrderBy()
    {
        return $this->_model::orderBy('id', 'DESC')->paginate(10);
    }

}
