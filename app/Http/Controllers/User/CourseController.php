<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Repositories\Course\CourseRepositoryInterface;

class CourseController extends Controller
{
    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->middleware('auth');
        $this->courseRepository = $courseRepository;
    }

	public function index($id)
    {
    	$courses = $this->courseRepository->getWhereById($id);

        return view('pages.courses',['courses' => $courses]);
    }
}
