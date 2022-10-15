<?php

namespace App\Helpers;

class GlobalFunctions
{
    public static function requiredMessage($value)
    {
        return "El campo $value es obligatorio.";
    }

    public static function formatMessage($value)
    {
        return "El campo $value tiene un formato incorrecto.";
    }

    public static function uniqueMessage($value)
    {
        return "El campo $value ya fue registrado.";
    }

    public static function surveyMessage($survey, $messageState)
    {
        return array(
            'message' => "Encuesta *$survey* $messageState con éxito.",
            'alert-type' => 'success'
        );
    }

    public static function generateArrayStats($array){
        $countArray = [];
        $c = 0;

        foreach ($array as $key => $value) {
            $countArray[$c]['total'] = intval($value);
            $countArray[$c]['label'] = $key;
            $c++;
        }

        return $countArray;
    }
}
