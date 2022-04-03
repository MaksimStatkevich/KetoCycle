<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    private $quiz;

    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    public function index()
    {
        $questions = $this->quiz->getQuestions();
        return view('quiz', ['questions' => $questions]);
    }

    public function save(Request $request)
    {
        $this->quiz->setUserQuizResult($request);
    }
}
