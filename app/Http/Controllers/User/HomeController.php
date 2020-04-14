<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Course\CourseRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Lession\LessionRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Activity\ActivityRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;
use App\Notifications\InvoicePaid;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function __construct(
        CourseRepositoryInterface $courseRepository,
        UserRepositoryInterface $userRepository,
        LessionRepositoryInterface $lessionRepository,
        CategoryRepositoryInterface $categoryRepository,
        ActivityRepositoryInterface $activityRepository,
        NotificationRepositoryInterface $notificationRepository
    ) {
        $this->middleware('auth');
        $this->courseRepository = $courseRepository;
        $this->userRepository = $userRepository;
        $this->lessionRepository = $lessionRepository;
        $this->categoryRepository = $categoryRepository;
        $this->activityRepository = $activityRepository;
        $this->notificationRepository = $notificationRepository;
    }

    public function index(Request $request)
    {
        $courses = $this->courseRepository->getOrderByLimit();
        $lessions = $this->lessionRepository->getAll();
        $activities = $this->activityRepository->getOrderByLimit();

        return view('pages.index', [
            'courses' => $courses,
            'lessions' => $lessions,
            'activities' => $activities,
        ]);
    }

    public function search(Request $request)
    {
        $courses = $this->courseRepository->search($request->search);
        $users = $this->userRepository->search($request->search);

        return view('pages.search',['courses' => $courses, 'users' => $users])->with('message', 'Search results for " <b>' . $request->search . '</b> "');
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function mark(Request $request, $id)
    {
        if ($request->type == 0) {
            $data = ['read_at' => Carbon::now()];
            $this->notificationRepository->update($id, $data);

            return response()->json(['read' => true]);
        }

        else if ($request->type == 1) {
            $data = ['read_at' => NULL];
            $this->notificationRepository->update($id, $data);

            return response()->json(['unread' => true]);
        }

    }
}
