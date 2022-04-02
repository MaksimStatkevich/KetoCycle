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

    public function createNewUser($data)
    {
        $user_session_id = Session::getId();
        $name = 'user1'.time();
        $email = $data['email'];
        $password = Hash::make(time());

        $user = new User;
        $user->fill([
            'name' => $name,
            'email' => $email,
            'session_id' => $user_session_id,
            'password' => $password,
        ]);
        $user->save();
        $user->userinform()->updateOrCreate(["{$this->foreign_field}" => $user->id], $data);

        return $user->getAuthIdentifier();
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
        return User::where($this->field_identify, '=', Session::getId())->first();
    }

}
