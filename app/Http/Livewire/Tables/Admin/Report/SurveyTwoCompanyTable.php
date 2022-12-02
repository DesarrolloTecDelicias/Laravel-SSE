<?php

namespace App\Http\Livewire\Tables\Admin\Report;

use App\Models\Career;
use App\Constants\Constants;
use App\Models\CompanySurveyTwo;
use App\Models\CompanyGraduatesWorking;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SurveyTwoCompanyTable extends LivewireDatatable
{
    public $model = CompanySurveyTwo::class;
    public $hideable = "select";

    public function builder()
    {
        return CompanySurveyTwo::query()
            ->join('users', 'users.id', 'company_survey_twos.user_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hideable()
                ->defaultSort('asc'),

            Column::name('users.name')
                ->label('Nombre de la empresa')
                ->hideable()
                ->filterable(),

            Column::name('number_graduates')
                ->label('Número de Profesionistas')
                ->hideable()
                ->filterable(Constants::NUMBER_GRADUATES),

            Column::name('congruence')
                ->label('Congruencia')
                ->hideable()
                ->filterable(Constants::CONGRUENCE),

            Column::callback(['id'], function ($id) {
                $graduates = CompanyGraduatesWorking::where('company_survey_id', $id)->get();
                return
                    view('table-actions.graduates-working', [
                        'graduates' => $graduates,
                    ]);;
            })
                ->label('Egresados trabajando en las empresas')
                ->unsortable()
                ->hideable()
                ->exportCallback(function ($id) {
                    $graduates = CompanyGraduatesWorking::where('company_survey_id', $id)->get();
                    $result = "";
                    foreach ($graduates as $graduate) {
                        $result .= "Carrera: " . $graduate->career . ".  Nivel: " . $graduate->level . ".  Total: " . $graduate->total . "\n";
                    }

                    return (string) $result;
                }),

            BooleanColumn::name("competence1")
                ->label('Área o campo de estudio')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("competence2")
                ->label('Títulación')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("competence3")
                ->label('Experiencia Laboral/Práctica (Antes de egresar)')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("competence4")
                ->label('Posicionamiento de la institución de egreso')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("competence5")
                ->label('Conocimiento de idiomas extranjeros')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("competence6")
                ->label('Recomendaciones / Referencias')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("competence7")
                ->label('Personalidad / Actitudes')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("competence8")
                ->label('Capacidad de liderazgo')
                ->hideable()
                ->filterable(),

            Column::name('most_demanded_career')
                ->label('Carrera Demandada')
                ->hideable()
                ->filterable(Career::pluck('name')),

            DateColumn::name('created_at')
                ->label('Contestada')
                ->hideable()
                ->filterable(),

            DateColumn::name('updated_at')
                ->label('Actualizada')
                ->hideable()
                ->filterable(),
        ];
    }

    public function buildActions()
    {
        return [
            Action::groupBy('Opciones a Exportar', function () {
                return [
                    Action::value('csv')->label('Exportar CSV')->export('Ubicacion_laboral.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Ubicacion_laboral.html'),
                    Action::value('xls')->label('Exportar XLS')->export('Ubicacion_laboral.xls')
                ];
            }),
        ];
    }
}
