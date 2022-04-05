<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserMeasurementsRepositoryInterface;
use App\Services\Keto;

class KetoController extends Controller
{
    public $userMeasurement;

    public $keto;

    public function __construct(UserMeasurementsRepositoryInterface $userMeasurement, Keto $keto)
    {
        $this->userMeasurement = $userMeasurement;
        $this->keto = $keto;
    }

    public function index()
    {
        $userInform = $this->keto->getUserInformation();
        
        return view('keto', compact('userInform'));
    }
}
