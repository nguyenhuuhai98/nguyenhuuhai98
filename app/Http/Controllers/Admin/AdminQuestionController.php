<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminQuestionRequest;
use App\Repositories\Question\QuestionRepositoryInterface;
use App\Repositories\Answer\AnswerRepositoryInterface;

class AdminQuestionController extends Controller
{
    public function __construct(QuestionRepositoryInterface $questionRepository, AnswerRepositoryInterface $answerRepository)
    {
        $this->middleware('auth');
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
    }

    public function index()
    {
        $questions = $this->questionRepository->getOrderBy();;

        return view('admin.questions.index', compact('questions'));
    }

    public function getStore()
    {
        return view('admin.questions.form');
    }

    public function store(Request $request)
    {
        $data = ['text' => $request->text];
        $question = $this->questionRepository->create($data);

        foreach ($request->newAnswer as $key => $text) {
            if ($key == $request->radio) {
                $true_answer = 1;
            }
            else {
                $true_answer = 0;
            }
            $data = [
                'question_id' => $question->id,
                'text' => $text,
                'true_answer' => $true_answer
            ];
            $this->answerRepository->create($data);
        }

        return redirect()->route('get.all.questions');
    }

    public function getUpdate($id)
    {
        $question = $this->questionRepository->find($id);
        $answers = $this->answerRepository->getWhere($id);

        return view('admin.questions.form', [
            'question' => $question,
            'answers' => $answers,
        ]);
    }

    public function postUpdate(Request $request, $id)
    {
        $answers_u = $this->answerRepository->getWhere($id);
        $data = ['text' => $request->text];
        $question = $this->questionRepository->update($id, $data);

        foreach ($answers_u as $key => $answer) {
            if (isset ($request->answer[$key])){
                if ($request->radio == $key) {
                    $true_answer = 1;
                }
                else {
                    $true_answer = 0;
                }
                $data = [
                    'question_id' => $id,
                    'text' => $request->answer[$key],
                    'true_answer' => $true_answer,
                ];

                $this->answerRepository->update($answer->id, $data);
            }
            else {
                $this->answerRepository->delete($answer->id);
            }
        }
        if (isset($request->newAnswer)) {
            foreach ($request->newAnswer as $key => $new) {
                if ($request->radio == $key) {
                    $true_answer = 1;
                }
                else {
                    $true_answer = 0;
                }
                $data = [
                    'question_id' => $id,
                    'text' => $new,
                    'true_answer' => $true_answer
                ];
                $this->answerRepository->create($data);
            }
        }
        return redirect()->route('get.all.questions');
    }

    public function getDelete($id)
    {
        $this->questionRepository->delete($id);
        $this->answerRepository->deleteByQuestionId($id);

        return redirect()->back();
    }
}
