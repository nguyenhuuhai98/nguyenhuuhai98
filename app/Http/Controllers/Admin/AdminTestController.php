<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Question\QuestionRepositoryInterface;
use App\Repositories\Lession\LessionRepositoryInterface;
use App\Repositories\Test\TestRepositoryInterface;

class AdminTestController extends Controller
{
    public function __construct(QuestionRepositoryInterface $questionRepository, LessionRepositoryInterface $lessionRepository, TestRepositoryInterface $testRepository)
    {
        $this->middleware('auth');
        $this->questionRepository = $questionRepository;
        $this->lessionRepository = $lessionRepository;
        $this->testRepository = $testRepository;
    }

    public function index()
    {
    	$tests = $this->testRepository->getOrderBy();

    	return view('admin.tests.index', compact('tests'));
    }

    public function getStore()
    {
        $tests = $this->testRepository->getAll();
        foreach ($tests as $test) {
            $lession_id[] = $test->lession_id;
        }
        $lessions = $this->lessionRepository->getWhereNotIn($lession_id);
        $questions = $this->questionRepository->getOrderByText();

        return view('admin.tests.form', ['questions' => $questions, 'lessions' => $lessions]);
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'lession_id' => $request->lession,
            'number_of_ques' => count($request->question),
        ];
        $test = $this->testRepository->create($data);
        $this->testRepository->sync($test, $request->question);

        return redirect()->route('get.all.tests');

    }

    public function getUpdate($id)
    {
        $questions = $this->questionRepository->getOrderByText();
        $tests = $this->testRepository->getAll();
        foreach ($tests as $test) {
            $lession_id[] = $test->lession_id;
        }
        $lessions = $this->lessionRepository->getWhereNotIn($lession_id);
    	$test = $this->testRepository->find($id);

    	return view('admin.tests.form', ['questions' => $questions, 'test' => $test, 'lessions' => $lessions]);
    }

    public function postUpdate(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'lession_id' => $request->lession,
            'number_of_ques' => count($request->question),
        ];
        $this->testRepository->update($id, $data);
    	$this->testRepository->sync($this->testRepository->find($id), $request->question);

    	return redirect()->route('get.all.tests');
    }

    public function getDelete($id)
    {
        $this->testRepository->delete($id);

    	return redirect()->back();
    }
}
