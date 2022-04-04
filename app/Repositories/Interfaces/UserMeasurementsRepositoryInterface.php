<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserMeasurementsRepositoryInterface
{
    public function createNewUser($data) : User;
    public function updateUserData(User $user, $data) : bool;
    public function updateUserInfo(User $user, $data) : bool;
}
