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

class ProfileController extends Controller
{
    public function __construct(
        CourseRepositoryInterface $courseRepository,
        UserRepositoryInterface $userRepository,
        LessionRepositoryInterface $lessionRepository,
        CategoryRepositoryInterface $categoryRepository,
        ActivityRepositoryInterface $activityRepository
    )
    {
        $this->middleware('auth');
        $this->courseRepository = $courseRepository;
        $this->userRepository = $userRepository;
        $this->lessionRepository = $lessionRepository;
        $this->categoryRepository = $categoryRepository;
        $this->activityRepository = $activityRepository;
    }

    public function index($id)
    {
        $user = Auth::user();
        if($user->id != $id){
            $user = User::find($id);
        }

        $followUser = $this->userRepository->followUser(Auth::user()->id);
        $userFollow = Auth::user()->with('otherUsersFollow')->where('id', $id)->first()->otherUsersFollow;

        $activities = $this->activityRepository->getWhere($user->id);
        $lessions = $this->userRepository->userLession($id);
        $courses = $this->userRepository->userCourse($id);

        return view('profiles.index', [
            'user' => $user,
            'activities' => $activities,
            'followUser' => $followUser,
            'userFollow' => $userFollow,
            // 'lessions' => $lessions,
            // 'courses' => $courses,
        ]);
    }

    public function getEditProfile()
    {
        $user = Auth::user();

        return view('profiles.edit', compact('user'));
    }

    public function postEditProfile(Request $request, $id)
    {
        User::find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'birthday' => $request->birthday,
        ]);

        return redirect()->route('get.profile', [$id]);
    }

    public function getFollow(Request $request, $id)
    {
        $newValue = $request->value;

        if ($request->type == 1) {
            Auth::user()->followOtherUsers()->detach($id);
            $newValue = $newValue - 1;

            return response()->json(['unfollow' => true, 'newValue' => $newValue]);
        }
        else if ($request->type == 0) {
            Auth::user()->followOtherUsers()->attach($id);
            $newValue = $newValue + 1;

            return response()->json(['follow' => true, 'newValue' => $newValue]);
        }
    }

}
