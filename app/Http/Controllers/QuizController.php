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
        $questions_list = $this->quiz->getQuestions();
        return view('quiz', ['questions_list' => $questions_list]);
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
