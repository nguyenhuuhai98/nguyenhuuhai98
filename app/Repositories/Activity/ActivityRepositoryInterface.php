<?php
namespace App\Repositories\Activity;

interface ActivityRepositoryInterface
{
    public function getModel();

    public function getWhere($id);

    public function getOrderBy();

    public function getWhereById($id);

    public function getOrderByLimit();
}
