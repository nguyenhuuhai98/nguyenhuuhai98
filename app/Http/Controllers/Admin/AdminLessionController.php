<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLessionRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Carbon\Carbon;
use App\Repositories\Course\CourseRepositoryInterface;
use App\Repositories\Lession\LessionRepositoryInterface;
use App\Repositories\Test\TestRepositoryInterface;

class AdminLessionController extends Controller
{
    protected $categoryRepository;

    public function __construct(CourseRepositoryInterface $courseRepository, LessionRepositoryInterface $lessionRepository, TestRepositoryInterface $testRepository)
    {
        $this->middleware('auth');
        $this->courseRepository = $courseRepository;
        $this->lessionRepository = $lessionRepository;
        $this->testRepository = $testRepository;
    }

    public function index()
    {
        $lessions = $this->lessionRepository->getOrderBy();

        return view('admin.lessions.index', compact('lessions'));
    }

    public function getStore()
    {
        $courses = $this->courseRepository->getAll();

        return view('admin.lessions.form', compact('courses'));
    }

    public function store(AdminLessionRequest $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'course_id' => $request->course,
            'slug' => \Str::slug($request->name),

        ];
        $create = $this->lessionRepository->create($data);

        return redirect()->route('get.all.lessions');
    }

    public function getUpdate($id)
    {
        $courses = $this->courseRepository->getAll();
        $lession = $this->lessionRepository->find($id);
        $test = $this->testRepository->getWhere($id);

        return view('admin.lessions.form', [
            'lession' => $lession,
            'test' => $test,
            'courses' => $courses,
        ]);
    }

    public function postUpdate(AdminLessionRequest $request, $id)
    {
        $lession = $this->lessionRepository->find($id);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'course_id' => $request->course,
            'slug' => \Str::slug($request->name),

        ];
        $create = $this->lessionRepository->update($id, $data);

        return redirect()->route('get.all.lessions');
    }

    public function getDelete($id)
    {
        $this->lessionRepository->delete($id);

        return redirect()->back();
    }
}
