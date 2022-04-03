<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserMeasurementsRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserMeasurements implements UserMeasurementsRepositoryInterface
{
    private $field_identify = 'session_id';
    private $foreign_field = 'user_id';

    public function createNewUser($data) : void
    {
        $user_identify = $this->getUserIdentify();
        $email = $data['email'];

        $user = new User;
        $user->fill([
            'name' => $this->generateUserName(),
            'email' => $email,
            'session_id' => $user_identify,
            'password' => $this->generatePassword(),
        ]);
        $user->save();
        $user->userinform()->updateOrCreate(["{$this->foreign_field}" => $user->id], $data);
    }

    public function updateUserInfo($request) : void
    {
        if($user = $this->getUser())
        {
            $user->fill($request);
            $user->save();
            $user->userinform()->updateOrCreate(["{$this->foreign_field}" => $user->id], $request);

        }else{
            $this->createNewUser($request);
        }
    }

    public function getUser()
    {
        return User::where($this->field_identify, '=', $this->getUserIdentify())->first();
    }

    public function getUserIdentify() : string
    {
        return Session::getId();
    }

    public function generateUserName() : string
    {
        return 'user'.time();
    }

    public function generatePassword() : string
    {
        return Hash::make(time());
    }

}
