<?php
namespace App\Repositories\Lession;

interface LessionRepositoryInterface
{
    public function getModel();

    public function getOrderBy();

    public function getWhere($id);

    public function getWhereNotIn(array $id);

    public function findTestId($id);

    public function lessionByUser($id);

    public function attach($id, array $data);

    public function updateExistingPivot($id, array $data);
}
