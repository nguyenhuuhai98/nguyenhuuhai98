<?php
namespace App\Repositories\Lession;

use App\Repositories\EloquentRepository;
use App\Models\Lession;
use Illuminate\Support\Facades\Auth;

class LessionEloquentRepository extends EloquentRepository implements LessionRepositoryInterface
{

    public function getModel()
    {
        return Lession::class;
    }

    public function getWhere($id)
    {
        return $this->_model::where('course_id', $id)->paginate(config('number.five'));
    }

    public function getOrderBy()
    {
        return $this->_model::orderBy('id', 'DESC')->paginate(config('number.ten'));
    }

    public function getWhereNotIn(array $id)
    {
        return $this->_model::whereNotIn('id', $id)->orderBy('name')->get();
    }

    public function findTestId($id)
    {
        return $this->find($id)->test->id;
    }

    public function lessionByUser($id)
    {
        return Auth::user()->lessions()->where('lession_id', $id)->first();
    }

    public function attach($id, array $data)
    {
        return Auth::user()->lessions()->attach($id, $data);
    }

    public function updateExistingPivot($id, array $data)
    {
        return Auth::user()->lessions()->updateExistingPivot($id, $data);
    }

}
