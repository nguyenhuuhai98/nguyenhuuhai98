<?php
namespace App\Repositories\Test;

interface TestRepositoryInterface
{
    public function getModel();

    public function getOrderBy();

    public function sync($id, array $data);

    public function detach($id);

    public function testQuestion($id);

    public function randomQuestion($id);

    public function getTestByMonth($year, $month);
}
