<?php

namespace App\Repositories\Interfaces;

interface UserMeasurementsRepositoryInterface
{
    public function createNewUser($data);

    public function updateUserInfo($request);

    public function getUser();
}
