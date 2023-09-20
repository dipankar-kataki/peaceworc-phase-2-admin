<?php

namespace App\Http\Controllers;

use App\Models\AgencyPostJob;
use Illuminate\Http\Request;

class AgencyJobController extends Controller
{
    public function getAgencyPostedJobs(){
        try{
            $all_jobs = AgencyPostJob::with('agencyProfile', 'clientProfile')->latest()->get();
            return view('agency.job.all-agency-posted-job')->with(['posted_job'=> $all_jobs]);
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong.' . $e->getMessage();
        }
    }
}
