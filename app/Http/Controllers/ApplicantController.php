<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller
{
    public function index()
    {
        DB::listen(function($query) {
            logger($query->sql);
        });
        $webDevApplicants = Applicant::with('job')->whereHas('job', function($query) {
            $query->where('name', 'Web Developer');
        })->get();
        
        $webTotal = 0;
        foreach($webDevApplicants as $applicants) {
            $webTotal += $applicants->skills->count();
        }
        $designerApplicants = Applicant::with('job')->whereHas('job', function($query) {
            $query->where('name', 'Designer');
        })->get();

        $designerTotal = 0;

        foreach($designerApplicants as $applicants) {
            $designerTotal += $applicants->skills->count();
        }
        
        $allOtherApplicants = Applicant::with('job')->whereHas('job', function($query) {
            $query->where('name', '!=', 'Designer')->where('name', '!=', 'Web Developer')
            ;
        })->get();

        $allOtherTotal = 0;        
            foreach($allOtherApplicants as $applicants) {
            $allOtherTotal += $applicants->skills->count();
        }

        $applicants = Applicant::with('job')->with('skills')->get();
        $skillCount = DB::table('skills')->count(DB::raw('DISTINCT name'));
        
        return view('applicants', [
            'webDevApplicants' => $webDevApplicants,
            'designerApplicants' => $designerApplicants,
            'applicants' => $applicants,
            'skillCount' => $skillCount,
            'designerTotal' => $designerTotal,
            'webDevTotal' => $webTotal,
            'allOtherTotal' => $allOtherTotal,
            'allOtherApplicants' => $allOtherApplicants
        ]);
    }
}
