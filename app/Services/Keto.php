<?php

namespace App\Services;

use App\Repositories\Interfaces\UserMeasurementsRepositoryInterface;

class Keto
{
    public $userMeasurements;

    public function __construct(UserMeasurementsRepositoryInterface $repository)
    {
        $this->userMeasurements = $repository;
    }

    public function getUserInformation()
    {
        $userinform = $this->userMeasurements->getUserInform();
        if(!$userinform)
        {
            return null;
        }else{

            return $userinform->userinform;
        }
    }

 
}
