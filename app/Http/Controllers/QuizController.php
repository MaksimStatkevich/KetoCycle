<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserMeasurementsPostForm;
use App\Services\Quiz;

class QuizController extends Controller
{
    public $quiz;

    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    public function index()
    {
        return view('quiz');
    }

    public function store(UserMeasurementsPostForm $request)
    {
        $this->quiz->updateUser($request);
        return redirect()->route('quiz.index');
    }

}
