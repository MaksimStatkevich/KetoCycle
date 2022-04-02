<?php

namespace App\Facades;

use App\Repositories\ConvertImMe;
use Illuminate\Support\Facades\Facade;

class ConvertImMeService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ConvertImMe::class;
    }
}
