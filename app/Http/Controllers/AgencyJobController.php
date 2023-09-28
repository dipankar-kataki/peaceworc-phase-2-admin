<?php

namespace App\Http\Controllers;

use App\Models\AgencyPostJob;
use App\Models\User;
use Illuminate\Http\Request;

class AgencyJobController extends Controller
{
    public function getAgencyPostedJobsList(){
        try{
            $all_jobs = AgencyPostJob::with('agencyProfile', 'clientProfile')->latest()->get();
            return view('agency.job.all-agency-posted-job')->with(['posted_job'=> $all_jobs]);
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong.';
        }
    }

    public function getAgencyPostJobDetails($id){
        try{
            $job_id = decrypt($id);
            $get_job_details = AgencyPostJob::with('agencyProfile', 'clientProfile', 'jobAcceptedBy')->where('id', $job_id)->first();
            $get_job_accepted_by = null;
            if($get_job_details->jobAcceptedBy != null){
                $get_job_accepted_by = User::where('id', $get_job_details->jobAcceptedBy->user_id)->first();
            }
            return view('agency.job.job-details')->with(['get_job_details' => $get_job_details, 'get_job_accepted_by' => $get_job_accepted_by]);
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong.';
        }
    }
}
