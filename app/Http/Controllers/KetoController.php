<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserMeasurementsRepositoryInterface;
use App\Services\Keto;

class KetoController extends Controller
{
    public $userMeasurement;

    public function __construct(UserMeasurementsRepositoryInterface $userMeasurement, Keto $keto)
    {
        $this->userMeasurement =  $userMeasurement;
        $this->keto = $keto;
    }

    public function index()
    {
        $user_inform = $this->keto->getUserInformation();
        return view('keto', ['user_inform' => $user_inform]);
    }
}
