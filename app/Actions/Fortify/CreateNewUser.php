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
        $roles = [
            15 => Constants::ROLE['Graduate'],
            0 => Constants::ROLE['Company']
        ];

        $validateData =  Validator::make(
            $input,
            [
                'role' => 'required|in:0,15',
                'name' => ['required', 'string', 'max:255'],
                'fathers_surname' => $input['role'] == 15 ?  ['required', 'string', 'max:100'] : '',
                'mothers_surname' => $input['role'] == 15 ?  ['required', 'string', 'max:100'] : '',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users',
                //add rule to validate email not allowed domains delicias.tecnm.mx and itmexicali.edu.mx only for role == 15
                $input['role'] == 15 ? function ($attribute, $value, $fail) {
                    if (in_array(explode('@', $value)[1], Constants::DOMAINS_NOT_ALLOWED)) {
                        $fail('El dominio de correo electrónico no está permitido. Por favor, use un correo electrónico personal no institucional.');
                    }
                } : ''
                
            ],
                'career_id' => $input['role'] == 15 ? 'required' : '',
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
                'career_id.required' => GlobalFunctions::requiredMessage('carrera'),
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

        $validateData['role'] = $roles[$input['role']];
        $validateData['password'] = Hash::make($input['password']);

        $isGraduate = Constants::ROLE['Graduate'] == $validateData['role'];
        $validateData['name'] = mb_strtoupper($input['name'], 'UTF-8');
        $validateData['fathers_surname'] = $isGraduate ? mb_strtoupper($input['fathers_surname'], 'UTF-8') : null;
        $validateData['mothers_surname'] = $isGraduate ? mb_strtoupper($input['mothers_surname'], 'UTF-8') : null;

        $user = User::create($validateData);

        if ($isGraduate) {
            StudentSurvey::create(['user_id' => $user->id]);
        } else {
            CompanySurvey::create(['user_id' => $user->id]);
        }

        return $user;
    }
}
