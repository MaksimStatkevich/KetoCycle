<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserMeasurementsPostForm;
use App\Services\Quiz;
use Illuminate\Http\JsonResponse;
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

    /**
     * @throws \JsonException
     */
    public function saveTest(Request $request): JsonResponse
    {
        $answers = '';

        if ($request->has('testresult')) {
            $answers = json_encode($request->testresult, JSON_THROW_ON_ERROR);
        }
        $this->quiz->saveQuestions($answers);
        return response()
            ->json(['save' => 'ok']);
    }

}
