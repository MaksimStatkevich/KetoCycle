<?php

namespace App\Services;

use App\Repositories\Interfaces\UserMeasurementsRepositoryInterface;
use App\Facades\ConvertImMeService;

class Keto
{
    public $userMeasurements;

    public function __construct(UserMeasurementsRepositoryInterface $repository)
    {
        $this->userMeasurements = $repository;
    }

    public function getUserInformation()
    {
        $userInformation = $this->userMeasurements->getUser();
        if(!is_null($userInformation)){
            $userInformation = $userInformation->information()->first()->toArray();
            
            if((int)$userInformation['system_of_units'] === 0)
            {
                $inches = ConvertImMeService::convertToInches($userInformation['height']);
                $userInformation['weight'] = ConvertImMeService::convertKgToLbs($userInformation['weight']);
                $userInformation = $userInformation+$inches;
            }

            $userInformation = (object)$userInformation;

        }
        return $userInformation ?? null;
    }


}
