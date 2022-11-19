<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public static function generateArrayStats($array)
    {
        $countArray = [];
        $c = 0;

        foreach ($array as $key => $value) {
            $countArray[$c]['total'] = intval($value);
            $countArray[$c]['label'] = $key;
            $c++;
        }

        return $countArray;
    }

    public static function getRouteValidate($route)
    {
        if (Auth::check())
            return view($route);

        Auth::logout();
        Session::flush();
        return Redirect()->route('login');
    }
}
