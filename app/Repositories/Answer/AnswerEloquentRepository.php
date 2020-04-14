<?php
namespace App\Repositories\Answer;

use App\Repositories\EloquentRepository;
use App\Models\Answer;

class AnswerEloquentRepository extends EloquentRepository implements AnswerRepositoryInterface
{

    public function getModel()
    {
        return Answer::class;
    }

    public function getWhere($id)
    {
        return $this->_model::where('question_id', $id)->get();
    }

    public function getOrderBy()
    {
        return $this->_model::orderBy('id', 'DESC')->paginate(config('number.ten'));
    }

    public function deleteByQuestionId($id)
    {
        $answers = $this->getWhere($id);
        if ($answers) {
            unset($answers);

            return true;
        }

        return false;
    }

}
