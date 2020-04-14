<?php
namespace App\Repositories\Word;

interface WordRepositoryInterface
{
    public function getModel();

    public function attach($id);

    public function detach($id);
}
