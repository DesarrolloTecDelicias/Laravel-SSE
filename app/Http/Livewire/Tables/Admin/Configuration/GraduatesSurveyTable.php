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

                $schoolName = env('SCHOOL_NAME');
                $projectURL = env('PROJECT_URL');
                $message = "Hola egresado $name nos comunicamos contigo del departamento de vinculación del $schoolName, este correo es para informarle que en la plataforma de seguimiento de egresados no cuenta con registros en las siguientes encuestas:%0D%0A%0D%0A";

                !$surveyOne ? $message .= "%20%20• Encuesta 1: Perfil del egresado. %0D%0A" : null;
                !$surveyTwo ? $message .= "%20%20• Encuesta 2: Pertinencia y disponibilidad de medio y recursos para el aprendizaje. %0D%0A" : null;
                !$surveyThree ? $message .= "%20%20• Encuesta 3: Ubicación laboral de los egresados. %0D%0A" : null;
                !$surveyFour ? $message .= "%20%20• Encuesta 4: Desempeño profesional de los egresados. %0D%0A" : null;
                !$surveyFive ? $message .= "%20%20• Encuesta 5: Expectativas de desarrollo, superación profesional y de actualización. %0D%0A" : null;
                !$surveySix ? $message .= "%20%20• Encuesta 6: Participación social de los egresados. %0D%0A" : null;
                !$surveySeven ? $message .= "%20%20• Encuesta 7: Comentarios y sugerencias. %0D%0A" : null;
                $message .= "%0D%0ATe invitamos a contestarla(s) estos datos son muy importantes para el ITD. Esto lo puedes realizar mediante el siguiente enlace: $projectURL.%0D%0A";
                $message .= "Pasos para darse de alta en el S.S.E:%0D%0A %20%20 1. Ingresar al siguiente enlace: $projectURL . %0D%0A";
                $message .= "%20%20%20 2. En la parte principal, seleccionar la opción \"Registro Egresado\" . %0D%0A";
                $message .= "%20%20%20 3. Llenar sus datos para llenar el registro y dar click en REGISTRARSE. %0D%0A";
                $message .= "%20%20%20 4. Contestar las 7 encuestas, lo cual no tomará más de 10 minutos. %0D%0A";
                $message .= "%0D%0ADe antemano, muchas gracias.%0D%0A%0D%0A-$schoolName, Departamento de Gestión y Vinculación.%0D%0A%0D%0A";

                return view('table-actions.email-actions', [
                    'email' => $email,
                    'subject' => "Estado de encuestas $name",
                    'body' => $message,
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
