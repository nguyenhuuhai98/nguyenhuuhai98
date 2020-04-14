<?php
namespace App\Repositories\Answer;

interface AnswerRepositoryInterface
{
    public function getModel();

    public function getOrderBy();

    public function getWhere($id);

    public function deleteByQuestionId($id);
}
