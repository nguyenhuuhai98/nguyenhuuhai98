<?php
namespace App\Repositories\Question;

use App\Repositories\EloquentRepository;
use App\Models\Question;

class QuestionEloquentRepository extends EloquentRepository implements QuestionRepositoryInterface
{

    public function getModel()
    {
        return Question::class;
    }

    public function getOrderBy()
    {
        return $this->_model::orderBy('id', 'DESC')->paginate(config('number.ten'));
    }

    public function getOrderByText()
    {
        return $this->_model::orderBy('text')->get();
    }

}
