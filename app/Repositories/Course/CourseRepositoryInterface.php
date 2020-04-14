<?php
namespace App\Repositories\Course;

interface CourseRepositoryInterface
{
    public function getModel();

    public function getWhere();

    public function getOrderBy();

    public function getWhereById($id);

    public function getOrderByLimit();

    public function search($key);

    public function courseByUser($id);

    public function attach($id, array $data);
}
