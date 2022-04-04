<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\UserMeasurementsPostForm;
use App\Models\User;

interface UserMeasurementsRepositoryInterface
{
    public function createNewUser(UserMeasurementsPostForm $data);

    public function updateUser(UserMeasurementsPostForm $request) : void;
    public function updateUserInfo(UserMeasurementsPostForm $request, User $user) : User;
    public function updateUserData(UserMeasurementsPostForm $request, User $user) : User;

    public function getUser();
}
