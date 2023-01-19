<?php

namespace App\Constants;

class SurveyConstants
{
    public static $GRADUATE_SURVEY_NAME = [
        1 => "Perfil del egresado.",
        2 => "Pertinencia y disponibilidad de medio y recursos para el aprendizaje.",
        3 => "Ubicación laboral de los egresados.",
        4 => "Desempeño profesional de los egresados.",
        5 => "Expectativas de desarrollo, superación profesional y de actualización.",
        6 => "Participación social de los egresados.",
        7 => "Comentarios y sugerencias.",
    ];

    public static $GRADUATE_SURVEY_REPORT = [
        1 => "Perfil del egresado.",
        2 => "Pertinencia y disponibilidad de medio y recursos para el aprendizaje.",
        3 => "Ubicación laboral de los egresados.",
        4 => "Desempeño profesional de los egresados.",
        5 => "Expectativas de desarrollo, superación profesional y de actualización.",
        6 => "Participación social de los egresados.",
    ];

    public static $GRADUATE_SURVEY_NAME_BY_SURVEY_DONE = [
        'survey_one_done' => "Perfil del egresado.",
        'survey_two_done' => "Pertinencia y disponibilidad de medio y recursos para el aprendizaje.",
        'survey_three_done' => "Ubicación laboral de los egresados.",
        'survey_four_done' => "Desempeño profesional de los egresados.",
        'survey_five_done' => "Expectativas de desarrollo, superación profesional y de actualización.",
        'survey_six_done' => "Participación social de los egresados.",
        'survey_seven_done' => "Comentarios y sugerencias.",
    ];

    public static $GRADUATE_ROUTES = [
        'survey_one_done' => "graduate.survey.one",
        'survey_two_done' => "graduate.survey.two",
        'survey_three_done' => "graduate.survey.three",
        'survey_four_done' => "graduate.survey.four",
        'survey_five_done' => "graduate.survey.five",
        'survey_six_done' => "graduate.survey.six",
        'survey_seven_done' => "graduate.survey.seven",
    ];

    public static $COMPANY_SURVEY_NAME_BY_SURVEY_DONE = [
        'survey_one_company_done' => "Datos generales de la empresa u organismo.",
        'survey_two_company_done' => "Ubicación laboral de los egresados.",
        'survey_three_company_done' => "Competencias laborales.",
    ];

    public static $COMPANY_SURVEY_NAME = [
        1 => "Datos generales de la empresa u organismo.",
        2 => "Ubicación laboral de los egresados.",
        3 => "Competencias laborales.",
    ];


}
