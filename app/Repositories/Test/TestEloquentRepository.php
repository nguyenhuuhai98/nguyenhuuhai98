<?php
namespace App\Repositories\Test;

use App\Repositories\EloquentRepository;
use App\Models\Test;

class TestEloquentRepository extends EloquentRepository implements TestRepositoryInterface
{

    public function getModel()
    {
        return Test::class;
    }

    public function getOrderBy()
    {
        return $this->_model::orderBy('id', 'DESC')->paginate(config('number.ten'));
    }

    public function sync($test, array $data)
    {
        return $test->questions()->sync($data);
    }

    public function detach($id)
    {
        $test = $this->find($id);
        if ($test->questions) {
            $test->questions->detach();

            return true;
        }

        return false;
    }

    public function testQuestion($id)
    {
        return $this->_model::with('questions')->where('id', $id)->first();
    }

    public function randomQuestion($id)
    {
        return $this->testQuestion($id)->questions->random(config('number.five'));
    }

    public function getTestByMonth($year, $month)
    {
        return $this->_model::whereYear('created_at', $year)->whereMonth('created_at', $month)->count('id');
    }

}
