<?php

namespace App\Repositories;

use App\Facades\ConvertImMeService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Repositories\Interfaces\UserMeasurementsRepositoryInterface;

class UserMeasurements implements UserMeasurementsRepositoryInterface
{
    const __FIELD_IDENTITY = 'session_id';
    const __FOREIGN_FIELD = 'user_id';


    public function createNewUser($data): User
    {
        $user_identify = $this->getUserIdentify();
        $email = $this->prepareUserData($data)['email'];

        $user = new User;
        $user->fill([
            'name' => $this->generateUserName(),
            'email' => $email,
            'session_id' => $user_identify,
            'password' => $this->generatePassword(),
        ]);
        $user->save();
        return $user;
    }

    public function updateUserData(User $user, $data) : bool
    {
        return $user->fill($this->prepareUserData($data))->save();
    }

    public function updateUserInfo(User $user, $data) : bool
    {
        return $user->userinform()->updateOrCreate([self::__FOREIGN_FIELD => $user->id], $data)->save();
    }

    public function prepareUserData($data): array
    {
        return $data;
    }

    public function prepareUserInfo($data): array
    {
        if (isset($data['system_of_units']) && (int)$data['system_of_units'] === 0) // if metric
        {
            if (isset($data['ft']) && isset($data['inc'])) {
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
        return User::where(self::__FIELD_IDENTITY, '=', $this->getUserIdentify())->first();
    }

    public function getUserInform()
    {
        return User::with('userinform')
            ->where(self::__FIELD_IDENTITY, '=', $this->getUserIdentify())
            ->first();
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
        return Hash::make(time());
    }

}
