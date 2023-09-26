<?php

namespace App\Http\Controllers;

use App\Models\AgencyPostJob;
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
            $get_job_details = AgencyPostJob::with('agencyProfile', 'clientProfile')->where('id', $job_id)->first();
            return view('agency.job.job-details')->with(['get_job_details' => $get_job_details]);
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong.';
        }
    }
}
