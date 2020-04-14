<?php
namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getModel();

    public function search($key);

    public function userWord($id);

    public function followUser($id);

    public function userLession($id);

    public function userCourse($id);

    public function user();

    public function getUserByMonth($year, $month);
}
