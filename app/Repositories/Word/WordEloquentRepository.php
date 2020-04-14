<?php
namespace App\Repositories\Word;

use App\Repositories\EloquentRepository;
use App\Models\Word;
use Illuminate\Support\Facades\Auth;

class WordEloquentRepository extends EloquentRepository implements WordRepositoryInterface
{

    public function getModel()
    {
        return Word::class;
    }

    public function attach($id)
    {
        return Auth::user()->words()->attach($id);
    }

    public function detach($id)
    {
        return Auth::user()->words()->detach($id);
    }
}
