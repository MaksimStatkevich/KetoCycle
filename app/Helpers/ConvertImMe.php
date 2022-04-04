<?php

namespace App\Helpers;

use App\Repositories\Interfaces\ConvertImMeInterface;

class ConvertImMe implements ConvertImMeInterface
{
    public function convertToInches($cm) 
    {
        $inches = round($cm * 0.393701);
        $result = [
            'ft' => intval($inches / 12),
            'in' => $inches % 12,
        ];

        return $result;
    }

    public function convertToCm($feet, $inches = 0) 
    {
        $inches = ($feet * 12) + $inches;
        return round($inches / 0.393701);
    }

    public function convertLbsToKg($lbs)
    {
        $kg = 0.45; // 1lbs = 0.45 kg
        return round($lbs * $kg, 2); // returned KG
    }

    public function convertKgToLbs($kg)
    {
        $lbs = 2.204; // 1kg = 2.204 lbs
        return round($kg * $lbs,2); // returned LBS
    }
}
