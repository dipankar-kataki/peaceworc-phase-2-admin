<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\AgencyInformationStatus;
use App\Models\User;
use Illuminate\Http\Request;

class AgencyProfileController extends Controller
{
    public function getAgencyProfile($id){
        try{
            $agency_id = decrypt($id);

            $get_agency_detail = User::with('agencyProfile', 'agencyProfileStatus', 'authOfficer')->where('id', $agency_id)->first();

            $profile_percentage = 10;
            if($get_agency_detail->agencyProfileStatus->is_business_info_complete == 1){
                $profile_percentage = $profile_percentage + 10;
            }

            if($get_agency_detail->agencyProfileStatus->is_authorize_info_added == 1){
                $profile_percentage = $profile_percentage + 10;
            }

            if($get_agency_detail->agencyProfileStatus->is_profile_approved == 1){
                $profile_percentage = $profile_percentage + 10;
            }

            $total_percentage = ($profile_percentage/40)*100 ;



            return view('agency.profile.agency-profile')->with(['get_agency_detail' => $get_agency_detail, 'total_percentage' => $total_percentage]);
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong.';
        }
        
    }

    public function agencyProfileActivation(Request $request){
        try{
            $agency_id = decrypt($request->agency_id);
            $activation_status = $request->activation_status;

            $check_profile_status = AgencyInformationStatus::where('user_id', $agency_id)->first();

            if($check_profile_status->is_business_info_complete == 1 && $check_profile_status->is_authorize_info_added == 1){
                AgencyInformationStatus::where('user_id', $agency_id)->update([
                    'is_profile_approved' => $activation_status
                ]);

                session()->flash('success', 'Great! Profile Activation Status Updated');

                return back();
            }else{
                
                session()->flash('error', 'Oops! Profile Cannot Be Active. Few processes were still pending.');

                return back();
            }


        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong.';
        }
    }
}
