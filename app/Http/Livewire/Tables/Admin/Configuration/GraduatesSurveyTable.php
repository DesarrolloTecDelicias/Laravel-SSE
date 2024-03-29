<?php

namespace App\Http\Livewire\Tables\Admin\Configuration;

use App\Models\Career;
use App\Models\StudentSurvey;
use App\Models\SurveyOne;
use App\Constants\Constants;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class GraduatesSurveyTable extends LivewireDatatable
{
    public $model = StudentSurvey::class;
    public $hideable = "select";

    public function builder()
    {
        return StudentSurvey::query()
            ->join('users', 'users.id', 'student_surveys.user_id')
            ->join('careers', 'careers.id', 'users.career_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc'),

            Column::name('users.name')
                ->label('Nombre egresado')
                ->hideable()
                ->filterable(),

            Column::name('users.fathers_surname')
                ->label('Apellido Paterno')
                ->hideable()
                ->filterable(),

            Column::name('users.mothers_surname')
                ->label('Apellido Materno')
                ->hideable()
                ->filterable(),

            Column::name('users.email')
                ->label('Correo Electrónico')
                ->hideable()
                ->filterable(),

            Column::callback(['users.id'],
                function ($id) {
                    $survey = SurveyOne::where('user_id', $id)->first();
                    if ($survey) {
                        return '<a href="tel:' . $survey->cellphone . '">'. $survey->cellphone.'</a>';
                    } else {
                        return 'No registrado';
                    }
                }
            )
            ->exportCallback([
                'users.id',
            ], function (
                $id,
            ) {
                $survey = SurveyOne::where('user_id', $id)->first();
                if ($survey) {
                    return $survey->cellphone;
                } else {
                    return 'No registrado';
                }
            })->label('Teléfono'),

            Column::name('users.control_number')
                ->label('Número de control')
                ->hideable()
                ->filterable(),

            NumberColumn::name('users.income_year')
            ->label('Año de Ingreso')
            ->hideable()
                ->filterable(),

            Column::name('users.income_month')
            ->label('Período de Ingreso')
            ->hideable()
                ->filterable(Constants::MONTH),

            NumberColumn::name('users.year_graduated')
            ->label('Año de egreso')
            ->hideable()
                ->filterable(),

            Column::name('users.month_graduated')
            ->label('Período de Egreso')
            ->hideable()
                ->filterable(Constants::MONTH),

            Column::name('careers.name')
                ->label('Carrera')
                ->hideable()
                ->filterable(Career::pluck('name')),

            BooleanColumn::name("survey_one_done")
                ->label('E1: Perfil del egresado')
                ->hideable()
                ->exportCallback(function ($survey_one_done) {
                    return $survey_one_done ? 'Completada' : 'Pendiente';
                })
                ->filterable(),

            BooleanColumn::name("survey_two_done")
                ->label('E2: Pertinencia y disponibilidad')
                ->hideable()
                ->exportCallback(function ($survey_two_done) {
                    return $survey_two_done ? 'Completada' : 'Pendiente';
                })
                ->filterable(),

            BooleanColumn::name("survey_three_done")
                ->label('E3: Ubicación laboral')
                ->hideable()
                ->exportCallback(function ($survey_three_done) {
                    return $survey_three_done ? 'Completada' : 'Pendiente';
                })
                ->filterable(),

            BooleanColumn::name("survey_four_done")
                ->label('E4: Desempeño profesional')
                ->hideable()
                ->exportCallback(function ($survey_four_done) {
                    return $survey_four_done ? 'Completada' : 'Pendiente';
                })
                ->filterable(),

            BooleanColumn::name("survey_five_done")
                ->label('E5: Expectativas de desarrollo')
                ->hideable()
                ->exportCallback(function ($survey_five_done) {
                    return $survey_five_done ? 'Completada' : 'Pendiente';
                })
                ->filterable(),

            BooleanColumn::name("survey_six_done")
                ->label('E6: Participación social')
                ->hideable()
                ->exportCallback(function ($survey_six_done) {
                    return $survey_six_done ? 'Completada' : 'Pendiente';
                })
                ->filterable(),

            BooleanColumn::name("survey_seven_done")
                ->label('E7: Comentarios')
                ->hideable()
                ->exportCallback(function ($survey_seven_done) {
                    return $survey_seven_done ? 'Completada' : 'Pendiente';
                })
                ->filterable(),

            Column::callback([
                'users.name', 'users.email',
                'survey_one_done', 'survey_two_done',
                'survey_three_done', 'survey_four_done',
                'survey_five_done', 'survey_six_done', 'survey_seven_done'
            ], function (
                $name,
                $email,
                $surveyOne,
                $surveyTwo,
                $surveyThree,
                $surveyFour,
                $surveyFive,
                $surveySix,
                $surveySeven
            ) {
                if ($surveyOne && $surveyTwo && $surveyThree && $surveyFour && $surveyFive && $surveySix && $surveySeven) {
                    return '<span class="text-success">Encuestas Completadas</span>';
                }

                $userData = [
                    'name' => $name,
                    'email' => $email,
                    'surveys' => [
                        'survey_one_done' => $surveyOne,
                        'survey_two_done' => $surveyTwo,
                        'survey_three_done' => $surveyThree,
                        'survey_four_done' => $surveyFour,
                        'survey_five_done' => $surveyFive,
                        'survey_six_done' => $surveySix,
                        'survey_seven_done' => $surveySeven,
                    ]
                ];

                return view('table-actions.email-actions', [
                    'email' => 'sendEmail',
                    'userData' => json_encode($userData),

                ]);
            })
                ->label('Aviso')
                ->unsortable()
                ->hideable()
                ->excludeFromExport(),

            DateColumn::name('created_at')
                ->label('Registrado')
                ->filterable(),

            DateColumn::name('updated_at')
                ->label('Última actualización')
                ->filterable(),
        ];
    }

    public function buildActions()
    {
        return [
            Action::groupBy('Opciones a Exportar', function () {
                return [
                    Action::value('csv')->label('Exportar CSV')->export('Egresados_Encuestas.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Egresados_Encuestas.html'),
                    Action::value('xls')->label('Exportar XLS')->export('Egresados_Encuestas.xls')
                ];
            }),
        ];
    }
}
