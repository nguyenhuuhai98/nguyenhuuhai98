<?php
namespace App\Repositories\Question;

interface QuestionRepositoryInterface
{
    public function getModel();

    public function getOrderBy();

    public function getOrderByText();
}
