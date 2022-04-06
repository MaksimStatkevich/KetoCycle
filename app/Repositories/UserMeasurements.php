<?php

namespace App\Repositories;

use App\Facades\ConvertImMeService;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Repositories\Interfaces\UserMeasurementsRepositoryInterface;

class UserMeasurements implements UserMeasurementsRepositoryInterface
{
    public function createNewUser($data): User
    {
        $data = [
            'name' => $this->generateUserName(),
            'email' => $this->prepareUserData($data)['email'],
            'session_id' => $this->getUserIdentify(),
            'password' => $this->generatePassword(),
        ];
        return User::create($data);
    }

    public function updateUserData(User $user, $data): bool
    {
        return $user->fill($this->prepareUserData($data))->save();
    }

    public function updateUserInfo(User $user, $data): bool
    {
        return $user->information()->updateOrCreate(['user_id' => $user->id], $this->prepareUserInfo($data))->save();
    }

    public function prepareUserData($data): array
    {
        return $data;
    }

    public function prepareUserInfo($data): array
    {
        if (isset($data['system_of_units']) && (int)$data['system_of_units'] === 0)
        {
            if (isset($data['ft'], $data['inc'])) {
                $data['height'] = ConvertImMeService::convertToCm($data['ft'], $data['inc']);
                unset($data['ft'], $data['inc']);
            }
            if (isset($data['weight'])) {
                $data['weight'] = ConvertImMeService::convertLbsToKg($data['weight']);
            }
        }

        return $data;
    }

    public function getUser()
    {
        return User::with('information')->where('session_id', $this->getUserIdentify())->first();
    }

    public function getUserIdentify(): string
    {
        return Session::getId();
    }

    public function generateUserName(): string
    {
        return 'user' . time();
    }

    public function generatePassword(): string
    {
        return bcrypt(time());
    }

}
