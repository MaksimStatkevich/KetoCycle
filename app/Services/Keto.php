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
        $userInform = $this->userMeasurements->getUser()->information()->first();
        return $userInform ?? null;

    }


}
