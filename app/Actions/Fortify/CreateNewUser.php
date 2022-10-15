<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Constants\Constants;
use App\Models\StudentSurvey;
use App\Models\CompanySurvey;
use App\Helpers\GlobalFunctions;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make(
            $input,
            [
                'role' => 'required|in:0,15',
                'name' => ['required', 'string', 'max:255'],
                'fathers_surname' => $input['role'] == 15 ?  ['required', 'string', 'max:100'] : '',
                'mothers_surname' => $input['role'] == 15 ?  ['required', 'string', 'max:100'] : '',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'control_number' => $input['role'] == 15 ? ['required', 'unique:users', 'regex:/^[C]?[B]?[0-9]{8,10}$/'] : '',
                'income_year' => $input['role'] == 15 ? 'required|digits:4' : '',
                'income_month' => $input['role'] == 15 ? 'required' : '',
                'year_graduated' => $input['role'] == 15 ? 'required|digits:4' : '',
                'month_graduated' => $input['role'] == 15 ?  'required' : '',
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            ],
            [
                'name.required' => GlobalFunctions::requiredMessage('nombre'),
                'fathers_surname.required' => GlobalFunctions::requiredMessage('apellido paterno'),
                'mothers_surname.required' => GlobalFunctions::requiredMessage('apellido materno'),
                'email.required' => GlobalFunctions::requiredMessage('email'),
                'email.unique' => GlobalFunctions::uniqueMessage('email'),
                'password.required' => GlobalFunctions::requiredMessage('contraseña'),
                'control_number.required' => GlobalFunctions::requiredMessage('número de control'),
                'control_number.unique' => GlobalFunctions::uniqueMessage('número de control'),
                'control_number.regex' => GlobalFunctions::formatMessage('número de control'),
                'income_year.required' => GlobalFunctions::requiredMessage('año de ingreso'),
                'income_year.digits' => GlobalFunctions::formatMessage('año de ingreso'),
                'income_month.required' => GlobalFunctions::requiredMessage('período de ingreso'),
                'year_graduated.required' => GlobalFunctions::requiredMessage('año de egreso'),
                'year_graduated.digits' => GlobalFunctions::formatMessage('año de egreso'),
                'month_graduated.required' => GlobalFunctions::requiredMessage('período de egreso'),
            ]
        )->validate();

        $input['role'] = $input['role'] == 15
            ? Constants::ROLE['Graduate']
            : ($input['role'] == 0 ? Constants::ROLE['Company'] : null);
        $input['password'] = Hash::make($input['password']);

        $roleGraduate = Constants::ROLE['Graduate'];
        $name = mb_strtoupper($input['name'], 'UTF-8');

        if ($input['role'] == $roleGraduate) {
            $fathersSurname =  $roleGraduate ? mb_strtoupper($input['fathers_surname'], 'UTF-8') : null;
            $mothersSurname =  $roleGraduate ? mb_strtoupper($input['mothers_surname'], 'UTF-8') : null;
        } else {
            $fathersSurname = null;
            $mothersSurname = null;
        }


        $user = User::create([
            'name' => $name,
            'fathers_surname' => $fathersSurname,
            'mothers_surname' => $mothersSurname,
            'email' => $input['email'],
            'password' => $input['password'],
            'role' => $input['role'],
            'career' => $input['role'] == $roleGraduate ? $input['career'] : null,
            'control_number' => $input['role'] == $roleGraduate ? $input['control_number'] : null,
            'income_month' => $input['role'] == $roleGraduate ? $input['income_month'] : null,
            'month_graduated' => $input['role'] == $roleGraduate ? $input['month_graduated'] : null,
            'income_year' => $input['role'] == $roleGraduate ? $input['income_year'] : null,
            'year_graduated' => $input['role'] == $roleGraduate ? $input['year_graduated'] : null,
        ]);

        $data = $user->role == $roleGraduate ? [
            'user_id' => $user->id,
            'survey_one_done' => false,
            'survey_two_done' => false,
            'survey_three_done' => false,
            'survey_four_done' => false,
            'survey_five_done' => false,
            'survey_six_done' => false,
            'survey_seven_done' => false
        ] : [
            'user_id' => $user->id,
            'survey_one_company_done' => false,
            'survey_two_company_done' => false,
            'survey_three_company_done' => false,
        ];

        if ($user->role == $roleGraduate) {
            StudentSurvey::create($data);
        } else {
            CompanySurvey::create($data);
        }

        return $user;
    }
}
