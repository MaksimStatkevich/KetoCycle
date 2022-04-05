<?php

namespace App\Services;

use App\Repositories\Interfaces\UserMeasurementsRepositoryInterface;
use App\Models\Questions;

class Quiz
{
    public $userMeasurements;

    public function __construct(UserMeasurementsRepositoryInterface $repository)
    {
        $this->userMeasurements = $repository;
    }

    public function updateUser($request)
    {
        $user = $this->userMeasurements->getUser();
        $user_info = $request->all(['height', 'weight', 'age', 'sex', 'system_of_units', 'ft', 'inc']);
        $user_data = $request->all(['email']);
        if(!is_null($user)){
            $this->userMeasurements->updateUserData($user, $user_data);
            $this->userMeasurements->updateUserInfo($user, $user_info);
        }else{
            $new_user =  $this->userMeasurements->createNewUser($user_data);
            $this->userMeasurements->updateUserInfo($new_user, $user_info);
        }
        return response()->json(['status' => 'ok']);
    }


    public function getQuestions()
    {
        return Questions::with('answers')->get();
    }

}
