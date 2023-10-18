<?php

namespace App\Http\Controllers\Caregiver;

use App\Http\Controllers\Controller;
use App\Models\CaregiverStatusInformation;
use App\Models\User;
use Illuminate\Http\Request;

class CaregiverProfileController extends Controller
{
    public function getCaregiverProfile($id){
        try{
            $caregiver_id = decrypt($id);

            $get_caregiver_detail = User::with('caregiverProfile', 'caregiverProfileStatus')->where('id', $caregiver_id)->first();

            $profile_percentage = 10;
            if($get_caregiver_detail->caregiverProfileStatus != null){

                if($get_caregiver_detail->caregiverProfileStatus->is_basic_info_added == 1){
                    $profile_percentage = $profile_percentage + 10;
                }

                if($get_caregiver_detail->caregiverProfileStatus->is_documents_uploaded == 1){
                    $profile_percentage = $profile_percentage + 10;
                }
    
                if($get_caregiver_detail->caregiverProfileStatus->is_profile_approved == 1){
                    $profile_percentage = $profile_percentage + 10;
                }
    
            }
            
            $total_percentage = ($profile_percentage/40)*100 ;



            return view('caregiver.profile.caregiver-profile')->with(['get_caregiver_detail' => $get_caregiver_detail, 'total_percentage' => $total_percentage]);
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong.'. $e;
        }
    }

    public function pendingProfile(){
        try{
            $get_pending_documents_verification = CaregiverStatusInformation::with('user', 'caregiverProfile')->where('is_verification_complete', 0)->get();
            $get_pending_profile_approval = CaregiverStatusInformation::with('user', 'caregiverProfile')->where('is_profile_approved', 0)->get();

            return view('caregiver.profile.pending-caregiver')->with(['get_pending_profile_approval' => $get_pending_profile_approval, 'get_pending_documents_verification' => $get_pending_documents_verification]);
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong.';
        }
    }
}
