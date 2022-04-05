<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserMeasurementsPostForm;
use App\Services\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public $quiz;

    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    public function index()
    {
        $questionsList = $this->quiz->getQuestions();
        return view('quiz', compact('questionsList'));
    }

    public function store(UserMeasurementsPostForm $request)
    {
        $this->quiz->updateUser($request);
        return redirect()->route('quiz.index');
    }

    public function saveTest(Request $request)
    {
        $data = $request->all('sex', 'testresult');
        if($data['testresult']){
            $data['user_answers'] = json_encode($data['testresult']);
        }
        $this->quiz->saveQuestions($data);
        return response()
            ->json(['save' => 'ok']);
    }

}
