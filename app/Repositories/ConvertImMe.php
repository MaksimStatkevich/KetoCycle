<?php

namespace App\Repositories;

class ConvertImMe
{
    public function convert_to_inches($cm) {
        $inches = round($cm * 0.393701);
        $result = [
            'ft' => intval($inches / 12),
            'in' => $inches % 12,
        ];

        return $result;
    }

    public function convert_to_cm($feet, $inches = 0) {
        $inches = ($feet * 12) + $inches;
        return (int) round($inches / 0.393701);
    }

    public function convert_lbs_to_kg($lbs)
    {
        $kg = 0.45; // 1lbs = 0.45 kg
        return round($lbs * $kg, 2); // returned KG
    }

    public function convert_kg_to_lbs($kg)
    {
        $lbs = 2.204; // 1kg = 2.204 lbs
        return round($kg * $lbs,2); // returned LBS
    }
}
