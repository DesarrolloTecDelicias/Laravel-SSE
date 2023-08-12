<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\CompanySurveyOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Constants\Constants;

class JobApplicationsController extends Controller
{
    public function getAll(Request $request)
    {
        $jobApplications = JobApplication::where('status', 1)->get();
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
    }

    public function getById(Request $request, $id)
    {
        $jobApplication = JobApplication::where('id', $id)->first();
        $companyInformation = CompanySurveyOne::where('user_id', $jobApplication['user_id'])->first();
        $jobApplication['informacion_empresa'] = $companyInformation;
        unset($jobApplication['user_id']);
        unset($companyInformation['id']);
        unset($companyInformation['email']);
        unset($companyInformation['business_structure']);
        unset($companyInformation['company_size']);
        unset($companyInformation['business_id']);
        unset($companyInformation['created_at']);
        unset($companyInformation['updated_at']);
        $jobApplication['photo_path'] = asset('storage/job_aplications/' . $jobApplication['photo_path']);
        return $jobApplication;
    }

    public function getByUserId(Request $request, $id)
    {
        $jobApplications = JobApplication::where([
            ['user_id', $id],
            ['status', 1]
        ])->get();
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
    }

    public function getByCareerId(Request $request, $id)
    {
        $jobApplications = JobApplication::where([
            ['career_id', $id],
            ['status', 1]
        ])->get();
        foreach ($jobApplications as $jobApplication) {
            $companyInformation = CompanySurveyOne::where('user_id', $jobApplication['user_id'])->first();
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
    }
}
