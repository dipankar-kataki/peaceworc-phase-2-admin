<?php

namespace App\Http\Controllers\Dashboard;

use App\Common\JobStatus;
use App\Http\Controllers\Controller;
use App\Models\AgencyInformationStatus;
use App\Models\AgencyPayment;
use App\Models\AgencyPostJob;
use App\Models\CaregiverProfileRegistration;
use App\Models\CaregiverStatusInformation;
use App\Traits\FormatNumber;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use FormatNumber;
    public function getDashboard(Request $request){
        try{
            $get_pending_caregivers_count = CaregiverStatusInformation::where('is_verification_complete', 0)->orWhere('is_profile_approved', 0)->count();
            $get_approved_caregivers_count = CaregiverStatusInformation::Where('is_profile_approved', 1)->count();

            $get_pending_agencies_count = AgencyInformationStatus::where('is_profile_approved', 0)->count();
            $get_approved_agencies_count = AgencyInformationStatus::Where('is_profile_approved', 1)->count();

            $get_posted_jobs_count = AgencyPostJob::where('payment_status', 1)->count();
            $get_closed_jobs_count = AgencyPostJob::where('status', JobStatus::Closed)->count();

            $total_earnings = $this->getFormatedNumber(AgencyPayment::where('payment_status', 1)->sum('peaceworc_charge'));


            return view('dashboard.main')->with([
                'total_pending_caregivers' => $get_pending_caregivers_count,
                'total_approved_caregivers' => $get_approved_caregivers_count,
                'total_pending_agencies' => $get_pending_agencies_count,
                'total_approved_agencies' => $get_approved_agencies_count,
                'total_posted_jobs' => $get_posted_jobs_count,
                'total_closed_jobs' => $get_closed_jobs_count,
                'total_peaceworc_earnings' => $total_earnings,
            ]);
        }catch(\Exception $e){
            echo "Oops! Something went wrong inside dashboard.";
        }
        
    }

    public function getPendingCaregiversCount(){
        
    }
}
