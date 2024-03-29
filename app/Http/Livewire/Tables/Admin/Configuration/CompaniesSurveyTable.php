<?php

namespace App\Http\Livewire\Tables\Admin\Configuration;

use App\Models\User;
use App\Models\Agreement;
use App\Models\CompanySurvey;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CompaniesSurveyTable extends LivewireDatatable
{
    public $model = CompanySurvey::class;
    public $hideable = "select";

    public function builder()
    {
        return CompanySurvey::query()
            ->join('users', 'users.id', 'company_surveys.user_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc'),

            Column::name('users.name')
                ->label('Razón Social')
                ->hideable()
                ->filterable(),

            Column::name('users.email')
                ->label('Correo Electrónico')
                ->hideable()
                ->filterable(),

            Column::callback(['user_id', 'id'], function ($user_id, $id) {
                $agreement = Agreement::where('user_id', $user_id)->first();
                return $agreement == null ? 'No' : 'Sí';
            })
                ->label('¿Tiene convenio con el tecnológico?')
                ->unsortable()
                ->hideable()
                ->exportCallback(function ($user_id, $id) {
                    $agreement = Agreement::where('user_id', $user_id)->first();
                    return $agreement == null ? 'No' : 'Sí';
                }),

            Column::callback(['user_id'], function ($user_id) {
                $types = Agreement::where('user_id', $user_id);

                $types = $types->get()->map(function ($type) {
                    return $type->type;
                })->toArray();

                return implode(', ', $types);
                
            })
                ->label('Tipo de convenios')
                ->unsortable()
                ->hideable()
                ->exportCallback(function ($user_id) {
                $types = Agreement::where('user_id', $user_id);

                $types = $types->get()->map(function ($type) {
                    return $type->type;
                })->toArray();

                return implode(', ', $types);
                }),

            BooleanColumn::name("survey_one_company_done")
                ->label('E1: Datos generales de la empresa u organismo')
                ->hideable()
                ->exportCallback(function ($survey_one_company_done) {
                    return $survey_one_company_done ? 'Completada' : 'Pendiente';
                })
                ->filterable(),

            BooleanColumn::name("survey_two_company_done")
                ->label('E2: Ubicación laboral de los egresados')
                ->hideable()
                ->exportCallback(function ($survey_two_company_done) {
                    return $survey_two_company_done ? 'Completada' : 'Pendiente';
                })
                ->filterable(),

            BooleanColumn::name("survey_three_company_done")
                ->label('E3: Competencias Laborales')
                ->hideable()
                ->exportCallback(function ($survey_three_company_done) {
                    return $survey_three_company_done ? 'Completada' : 'Pendiente';
                })
                ->filterable(),

            Column::callback([
                'users.name', 'users.email',
                'survey_one_company_done', 'survey_two_company_done',
                'survey_three_company_done'
            ], function (
                $name,
                $email,
                $surveyOne,
                $surveyTwo,
                $surveyThree,
            ) {
                if ($surveyOne && $surveyTwo && $surveyThree) {
                    return '<span class="text-success">Encuestas Completadas</span>';
                }

                $userData = [
                    'name' => $name,
                    'email' => $email,
                    'surveys' => [
                        'survey_one_company_done' => $surveyOne,
                        'survey_two_company_done' => $surveyTwo,
                        'survey_three_company_done' => $surveyThree
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
                    Action::value('csv')->label('Exportar CSV')->export('Empresas_Encuestas.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Empresas_Encuestas.html'),
                    Action::value('xls')->label('Exportar XLS')->export('Empresas_Encuestas.xls')
                ];
            }),
        ];
    }
}
