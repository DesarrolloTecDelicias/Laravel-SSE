<?php

namespace App\Http\Livewire\Tables\Admin\Configuration;

use App\Models\User;
use App\Models\Career;
use App\Models\StudentSurvey;
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
            ->join('users', 'users.id', 'student_surveys.user_id');
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

            Column::name('users.control_number')
                ->label('Número de control')
                ->hideable()
                ->filterable(),

            Column::name('users.career')
                ->label('Carrera')
                ->hideable()
                ->filterable(Career::pluck('name')),

            BooleanColumn::name("survey_one_done")
                ->label('E1: Perfil del egresado')
                ->hideable()
                ->filterable()
                ->filterable(),

            BooleanColumn::name("survey_two_done")
                ->label('E2: Pertinencia y disponibilidad')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("survey_three_done")
                ->label('E3: Ubicación laboral')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("survey_four_done")
                ->label('E4: Desempeño profesional')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("survey_five_done")
                ->label('E5: Expectativas de desarrollo')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("survey_six_done")
                ->label('E6: Participación social')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("survey_seven_done")
                ->label('E7: Comentarios')
                ->hideable()
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

    public function getUsersProperty()
    {
        return User::pluck('name');
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
