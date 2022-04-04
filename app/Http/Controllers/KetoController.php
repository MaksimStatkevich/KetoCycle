<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserMeasurementsRepositoryInterface;

class KetoController extends Controller
{
    public $userMeasurement;

    public function __construct(UserMeasurementsRepositoryInterface $userMeasurement)
    {
        $this->userMeasurement =  $userMeasurement;
    }

    public function index()
    {
        $user_inform = $this->userMeasurement->getUserInform();
        return view('keto', ['user_inform' => $user_inform->userinform]);
    }
}
