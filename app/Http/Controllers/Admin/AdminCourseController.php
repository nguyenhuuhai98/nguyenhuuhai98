<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminCourseRequest;
use Illuminate\Http\File;
use Carbon\Carbon;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Course\CourseRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Notifications\RepliedToThread;
use Illuminate\Support\Facades\Notification;
use App\Jobs\SendEmail;
use Mail;

class AdminCourseController extends Controller
{
    public function __construct(
        UserRepositoryInterface $userRepository,
        CourseRepositoryInterface $courseRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->courseRepository = $courseRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $courses = $this->courseRepository->getOrderBy();

        return view('admin.courses.index', compact('courses'));
    }

    public function getStore()
    {
        $categories = $this->categoryRepository->getWhere();

        return view('admin.courses.form', compact('categories'));
    }

    public function store(AdminCourseRequest $request)
    {
        $users = $this->userRepository->getAll();
        if ($request->hasFile('avatar')){
            $extension = $request->avatar->extension();
            $file = $request->avatar;
            $fileName = \Str::slug(Carbon::now().$request->name).'.'.$extension;
            $file->move('upload', $fileName);
            $avatar = 'upload/'.$fileName;
        }
        else {
            $avatar = 'upload/no-image.png';
        }

        $data = [
            'name' => $request->name,
            'cate_id' => $request->category,
            'slug' => \Str::slug($request->name),
            'avatar' => $avatar
        ];
        $create = $this->courseRepository->create($data);
        $customers = $this->userRepository->user();

        $message  = [
            'type' => 'Create course',
            'title' => "The administrator has created the course: ",
            'content' => $request->name,
            'course_id' => $create->id,
            'course_slug' => \Str::slug($request->name),
        ];

        Notification::send($customers, new RepliedToThread($message));
        SendEmail::dispatch($message, $customers)->delay(now()->addMinutes(1));

        return redirect()->route('get.all.courses');
    }

    public function getUpdate($id)
    {
        $course = $this->courseRepository->find($id);

        return view('admin.courses.form', compact('course'));
    }

    public function postUpdate(AdminCourseRequest $request, $id)
    {
        $course = $this->courseRepository->find($id);

        if ($request->hasFile('avatar')){
            $extension = $request->avatar->extension();
            $file = $request->avatar;
            $fileName = \Str::slug(Carbon::now().$request->name).'.'.$extension;
            $file->move('upload', $fileName);
            $course->avatar = 'upload/'.$fileName;
        }

        $data = [
            'name' => $request->name,
            'cate_id' => $request->category,
            'slug' => \Str::slug($request->name),
            'avatar' => $course->avatar
        ];

        $update = $this->courseRepository->update($id, $data);
        $customers = $this->userRepository->user();

        $message  = [
            'type' => 'Update course',
            'title' => "The administrator has updated the course: ",
            'content' => $request->name,
            'course_id' => $id,
            'course_slug' => \Str::slug($request->name),
        ];

        Notification::send($customers, new RepliedToThread($message));
        SendEmail::dispatch($message, $customers)->delay(now()->addMinutes(1));

        return redirect()->route('get.all.courses');
    }

    public function getDelete($id)
    {
        $this->courseRepository->delete($id);

        return redirect()->back();
    }

    public function broadcastOn()
    {
        return ['development'];
    }
}
