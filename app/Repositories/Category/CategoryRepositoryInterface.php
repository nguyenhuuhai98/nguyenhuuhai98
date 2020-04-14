<?php
namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    public function getModel();

    public function getOrderBy();

    public function getWhere();
}
