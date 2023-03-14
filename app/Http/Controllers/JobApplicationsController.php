<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JobApplication;
use App\Models\CompanySurveyOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Constants\Constants;

class JobApplicationsController extends Controller
{
    public function getAll(Request $request)
    {
        $user = User::where([
            ['email', $request->email],
        ])->first();

        if (!$user) {
            return response()->json([
                'message' => 'El usuario no existe.'
            ], 401);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Las credenciales son incorrectas.'
            ], 401);
        }

        if ($user->role == Constants::ROLE['Support'] || $user->role == Constants::ROLE['Administrator']) {
            $jobApplications = JobApplication::all();
            foreach ($jobApplications as $jobApplication) {
                $companyInformation = CompanySurveyOne::where('user_id', $jobApplication['user_id'])
                    ->first();
                unset($companyInformation['id']);
                unset($companyInformation['email']);
                unset($companyInformation['business_structure']);
                unset($companyInformation['company_size']);
                unset($companyInformation['business_id']);
                unset($companyInformation['created_at']);
                unset($companyInformation['updated_at']);
                $jobApplication['informacion_empresa'] = $companyInformation;
                $jobApplication['photo_path'] = asset('storage/job_aplications/' . $jobApplication['photo_path']);
                unset($jobApplication['user_id']);
            }
            return $jobApplications;
        } else {
            return response()->json([
                'message' => 'No cuentas con los permisos para realizar esta consulta, contacte al administrador.'
            ], 401);
        }
    }

    public function getById(Request $request, $id)
    {
        $user = User::where([
            ['email', $request->email],
        ])->first();

        if (!$user) {
            return response()->json([
                'message' => 'El usuario no existe.'
            ], 401);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Las credenciales son incorrectas.'
            ], 401);
        }

        if ($user->role == Constants::ROLE['Support'] || $user->role == Constants::ROLE['Administrator']) {
            $jobApplication = JobApplication::findOrFail($id);
            $companyInformation = CompanySurveyOne::where('user_id', $jobApplication['user_id'])->first();
            $jobApplication['informacion_empresa'] = $companyInformation;
            unset($jobApplication['user_id']);
            $jobApplication['photo_path'] = asset('storage/job_aplications/' . $jobApplication['photo_path']);
            return $jobApplication;
        } else {
            return response()->json([
                'message' => 'No cuentas con los permisos para realizar esta consulta, contacte al administrador.'
            ], 401);
        }
    }

    public function getByUserId(Request $request, $id)
    {
        $user = User::where([
            ['email', $request->email],
        ])->first();

        if (!$user) {
            return response()->json([
                'message' => 'El usuario no existe.'
            ], 401);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Las credenciales son incorrectas.'
            ], 401);
        }

        if ($user->role == Constants::ROLE['Support'] || $user->role == Constants::ROLE['Administrator']) {
            $jobApplications = JobApplication::where('user_id', $id)->get();
            foreach ($jobApplications as $jobApplication) {
                $companyInformation = CompanySurveyOne::where('user_id', $jobApplication['user_id'])
                    ->first();
                unset($companyInformation['id']);
                unset($companyInformation['email']);
                unset($companyInformation['business_structure']);
                unset($companyInformation['company_size']);
                unset($companyInformation['business_id']);
                unset($companyInformation['created_at']);
                unset($companyInformation['updated_at']);
                $jobApplication['informacion_empresa'] = $companyInformation;
                $jobApplication['photo_path'] = asset('storage/job_aplications/' . $jobApplication['photo_path']);
                unset($jobApplication['user_id']);
            }
            return $jobApplications;
        } else {
            return response()->json([
                'message' => 'No cuentas con los permisos para realizar esta consulta, contacte al administrador.'
            ], 401);
        }
    }

    public function getByCareerId(Request $request, $id)
    {
        $user = User::where([
            ['email', $request->email],
        ])->first();

        if (!$user) {
            return response()->json([
                'message' => 'El usuario no existe.'
            ], 401);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Las credenciales son incorrectas.'
            ], 401);
        }

        if ($user->role == Constants::ROLE['Support'] || $user->role == Constants::ROLE['Administrator']) {
            $jobApplications = JobApplication::where('career_id', $id)->get();
            foreach ($jobApplications as $jobApplication) {
                $companyInformation = CompanySurveyOne::where('user_id', $jobApplication['user_id'])->first();
                $jobApplication['informacion_empresa'] = $companyInformation;
                $jobApplication['photo_path'] = asset('storage/job_aplications/' . $jobApplication['photo_path']);
                unset($jobApplication['user_id']);
            }
            return $jobApplications;
        } else {
            return response()->json([
                'message' => 'No cuentas con los permisos para realizar esta consulta, contacte al administrador.'
            ], 401);
        }
    }
}
