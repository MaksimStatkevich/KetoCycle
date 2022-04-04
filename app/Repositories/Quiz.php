<?php

namespace App\Repositories;


use App\Models\Questions;
use App\Models\UserQuizLog;
use App\Repositories\Interfaces\UserMeasurementsRepositoryInterface;

class Quiz
{
    private $userMeasurement;
    private $user;

    public function __construct(UserMeasurementsRepositoryInterface $userMeasurement)
    {
        $this->userMeasurement = $userMeasurement;
    }

    public function getQuestions()
    {
        return Questions::with('answers')->get();
    }

    public function setUserQuizResult($user_result)
    {
        $user_id = $this->userMeasurement->getUser()->id;
        UserQuizLog::create([
            'user_id' => $user_id,
            'user_answers' => json_encode($user_result)
        ]);

    }
}
