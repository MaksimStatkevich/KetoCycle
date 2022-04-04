<?php

namespace App\Repositories;

use App\Facades\ConvertImMeService;
use App\Models\User;
use App\Repositories\Interfaces\UserMeasurementsRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserMeasurementsPostForm;

class UserMeasurements implements UserMeasurementsRepositoryInterface
{
    const __FIELD_IDENTITY = 'session_id';
    const __FOREIGN_FIELD = 'user_id';

    public function createNewUser(UserMeasurementsPostForm $request) : void
    {
        $user_identify = $this->getUserIdentify();
        $email = $this->prepareUserData($request)['email'];

        $user = new User;
        $user->fill([
            'name' => $this->generateUserName(),
            'email' => $email,
            'session_id' => $user_identify,
            'password' => $this->generatePassword(),
        ]);
        $user->save();
        $this->updateUserData($request, $user);
    }

    public function updateUserInfo(UserMeasurementsPostForm $request, User $user) : User
    {
        $user->fill($this->prepareUserData($request));
        $user->save();
        return $user;
    }

    public function updateUserData(UserMeasurementsPostForm $request, User $user) : User
    {
        $user->userinform()->updateOrCreate([self::__FOREIGN_FIELD => $user->id], $this->prepareUserInfo($request));
        return $user;
    }

    public function updateUser(UserMeasurementsPostForm $request) : void
    {

        if($user = $this->getUser())
        {
            $user = $this->updateUserData($request, $user);
            $this->updateUserInfo($request, $user);
            
        }else{
            $this->createNewUser($request, $user);
        }
    }

    public function prepareUserData(UserMeasurementsPostForm $request) : array
    {
        return $request->all(['email']);
    }

    public function prepareUserInfo(UserMeasurementsPostForm $request) : array
    {
        $data = $request->all(['height', 'weight', 'age', 'sex', 'system_of_units', 'ft', 'inc']);

        if(isset($data['system_of_units']) && (int)$data['system_of_units'] === 0) // if metric
        {
            if(isset($data['ft']) && isset($data['inc']))
            {
                $sm = ConvertImMeService::convertToCm($data['ft'], $data['inc']);
                $data['height'] = $sm;
                unset($data['ft']);
                unset($data['inc']);
            }
            
        }

        return $data;
    }

    public function getUser()
    {
        return User::where(self::__FIELD_IDENTITY, '=', $this->getUserIdentify())->first();
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
