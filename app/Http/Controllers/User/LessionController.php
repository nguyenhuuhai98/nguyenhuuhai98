<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;
use App\Repositories\Course\CourseRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Lession\LessionRepositoryInterface;
use App\Repositories\Question\QuestionRepositoryInterface;
use App\Repositories\Test\TestRepositoryInterface;
use App\Repositories\Answer\AnswerRepositoryInterface;
use App\Repositories\Word\WordRepositoryInterface;
use App\Repositories\Activity\ActivityRepositoryInterface;

class LessionController extends Controller
{
    public function __construct(
    CourseRepositoryInterface $courseRepository,
    ActivityRepositoryInterface $activityRepository,
    UserRepositoryInterface $userRepository,
    LessionRepositoryInterface $lessionRepository,
    QuestionRepositoryInterface $questionRepository,
    TestRepositoryInterface $testRepository,
    AnswerRepositoryInterface $answerRepository,
    WordRepositoryInterface $wordRepository
) {
        $this->middleware('auth');
        $this->courseRepository = $courseRepository;
        $this->userRepository = $userRepository;
        $this->lessionRepository = $lessionRepository;
        $this->questionRepository = $questionRepository;
        $this->testRepository = $testRepository;
        $this->answerRepository = $answerRepository;
        $this->wordRepository = $wordRepository;
        $this->activityRepository = $activityRepository;
    }

    public function index($id)
    {
        $lessions = $this->lessionRepository->getWhere($id);
        $course = $this->courseRepository->find($id);
        $user_course = $this->courseRepository->courseByUser($id);

        if (empty ($user_course->pivot)) {
            $data = [
                'created_at' => Carbon::now(),
            ];
            $this->courseRepository->attach($id, $data);

            $activities = [
                'user_id' => Auth::user()->id,
                'type' => 'registed',
                'name' => 'course',
                'description' => 'Has registed course <b>' . $course->name . '</b>',
                'created_at' => Carbon::now(),
            ];
            $this->activityRepository->create($activities);
        }

        return view('pages.lessions', ['lessions' => $lessions, 'course' => $course]);
    }

    public function getLession($id)
    {
        $lession = $this->lessionRepository->find($id);
        $user_lession = $this->lessionRepository->lessionByUser($id);
        $test_id = $this->lessionRepository->findTestId($id);
        $questions = $this->testRepository->randomQuestion($test_id);
        $user_word = $this->userRepository->userWord(Auth::user()->id);
        if (empty ($user_lession->pivot->lession_id)) {
            $data = [
                'created_at' => Carbon::now(),
            ];
            $this->lessionRepository->attach($id, $data);

            $activities = [
                'user_id' => Auth::user()->id,
                'type' => 'start',
                'name' => 'lession',
                'description' => 'Has started lession <b>' . $lession->name . '</b>',
                'created_at' => Carbon::now(),
            ];
            $new = $this->activityRepository->create($activities);
        }

        return view('pages.lession-details', ['questions' => $questions, 'lession' => $lession, 'user_word' => $user_word]);
    }

    public function getAnswers(Request $request, $lession_id, $test_id)
    {
        $test = $this->testRepository->testQuestion($test_id);
        $lession = $this->lessionRepository->find($lession_id);
        $count = config('number.zero');
        $true_answer = array();
        $questions = array();

        if($request->questions) {
            foreach ($request->questions as $key => $answer_id) {
                array_push($questions, $this->questionRepository->find($key));
                $answer = $this->answerRepository->find($answer_id);
                if ($answer->true_answer == config('number.one')) {
                    $count++;
                    array_push($true_answer, $answer);
                }
            }
        }
        $data = [
            'result' => $count,
            'updated_at' => Carbon::now(),
        ];
        $this->lessionRepository->updateExistingPivot($lession_id, $data);

        return view('pages.lession-result', [
            'request' => $request,
            'true_answer' => $true_answer,
            'lession' => $lession,
            'questions' => $questions
        ]);
    }

    public function memorised(Request $request, $id)
    {
        if ($request->type == 0) {
            $this->wordRepository->attach($id);

            return response()->json(['memory' => true]);
        }

        else if ($request->type == 1) {
            $this->wordRepository->detach($id);

            return response()->json(['unmemory' => true]);
        }

    }
}
