<?php

namespace App\Services;

use App\Models\UserQuizLog;
use App\Repositories\Interfaces\UserMeasurementsRepositoryInterface;
use App\Models\Question;
use Illuminate\Http\JsonResponse;

class Quiz
{
    public $userMeasurements;

    public function __construct(UserMeasurementsRepositoryInterface $repository)
    {
        $this->userMeasurements = $repository;
    }

    public function updateUser($request): JsonResponse
    {
        $user = $this->userMeasurements->getUser();
        $user_info = $request->all(['height', 'weight', 'age', 'sex', 'system_of_units', 'ft', 'inc']);
        $user_data = $request->all(['email']);
        if (!$user) {
            $new_user = $this->userMeasurements->createNewUser($user_data);
            $this->userMeasurements->updateUserInfo($new_user, $user_info);
        } else {
            $this->userMeasurements->updateUserData($user, $user_data);
            $this->userMeasurements->updateUserInfo($user, $user_info);
        }
        return response()->json(['status' => 'ok']);
    }


    public function getQuestions()
    {
        return Question::with('answers')->get();
    }

    public function saveQuestions($data)
    {
        $user_id = $this->userMeasurements->getUser()->id;
        return UserQuizLog::create([
            'user_id' => $user_id,
            'answers' => $data['answers']
        ]);

    }

}
