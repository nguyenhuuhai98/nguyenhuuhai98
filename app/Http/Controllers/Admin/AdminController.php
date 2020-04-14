<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Course\CourseRepositoryInterface;
use App\Repositories\Lession\LessionRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Test\TestRepositoryInterface;

class AdminController extends Controller
{
    public function __construct(
        CourseRepositoryInterface $courseRepository,
        LessionRepositoryInterface $lessionRepository,
        UserRepositoryInterface $userRepository,
        TestRepositoryInterface $testRepository
    ) {
        $this->middleware('auth');
        $this->courseRepository = $courseRepository;
        $this->lessionRepository = $lessionRepository;
        $this->userRepository = $userRepository;
        $this->testRepository = $testRepository;
    }

    public function index()
    {
        $user = $this->userRepository->getAll();
        $courses = $this->courseRepository->getAll();
        $lessions = $this->lessionRepository->getAll();

        return view('admin.index', [
            'courses' => $courses,
            'lessions' => $lessions,
            'user' => $user,
        ]);
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function search(Request $request)
    {
        return view('admin.search-result');
    }

    public function userByMonth(Request $request)
    {
        $month =
        $data = [];
        for ($i = 0; $i < 12; $i++) {
            $total = $this->userRepository->getUserByMonth($request->year, $i+1);
            $data[$i] = $total;
        }

        return response()->json($data);
    }

    public function testByMonth(Request $request)
    {
        $data = [];
        for ($i = 0; $i < 12; $i++) {
            $total = $this->testRepository->getTestByMonth($request->year, $i+1);
            $data[$i] = $total;
        }

        return response()->json($data);
    }
}

