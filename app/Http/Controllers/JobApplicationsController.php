<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\CompanySurveyOne;

class JobApplicationsController extends Controller
{
    public function getAll(){
        $jobApplications = JobApplication::all();
        foreach ($jobApplications as $jobApplication) {
            $companyInformation = CompanySurveyOne::where('user_id', $jobApplication['user_id'])->first();
            $jobApplication['informacion_empresa'] = $companyInformation;
            $jobApplication['photo_path'] = asset('storage/job_aplications/' . $jobApplication['photo_path']);
            unset($jobApplication['user_id']);
        }
        return $jobApplications;
    }

    public function getById($id){
        $jobApplication = JobApplication::findOrFail($id);
        $companyInformation = CompanySurveyOne::where('user_id', $jobApplication['user_id'])->first();
        dd($companyInformation);
        $jobApplication['informacion_empresa'] = $companyInformation;
        unset($jobApplication['user_id']);
        $jobApplication['photo_path'] = asset('storage/job_aplications/' . $jobApplication['photo_path']);
        return $jobApplication;
    }

    public function getByUserId($id){
        $jobApplication = JobApplication::where('user_id', $id)->first();
        $companyInformation = CompanySurveyOne::where('user_id', $jobApplication['user_id'])->first();
        $jobApplication['informacion_empresa'] = $companyInformation;
        unset($jobApplication['user_id']);
        $jobApplication['photo_path'] = asset('storage/job_aplications/' . $jobApplication['photo_path']);
        return $jobApplication;
    }

    public function getByCareerId($id){
        $jobApplications = JobApplication::where('career_id', $id)->get();
        foreach ($jobApplications as $jobApplication) {
            $companyInformation = CompanySurveyOne::where('user_id', $jobApplication['user_id'])->first();
            $jobApplication['informacion_empresa'] = $companyInformation;
            $jobApplication['photo_path'] = asset('storage/job_aplications/' . $jobApplication['photo_path']);
            unset($jobApplication['user_id']);
        }
        return $jobApplications;
    }
}
