<?php

namespace App\Http\Controllers\LandingPage\Caregiver;

use App\Http\Controllers\Controller;
use App\Models\BecomeCaregiver;
use Illuminate\Http\Request;

class BecomeCaregiverController extends Controller
{
    public function getBecomeCaregiverPage(){
        try{
            
            $become_caregiver_details =  BecomeCaregiver::where('status', 1)->first();
            return view('landing-page.become-caregiver.manage-become-caregiver')->with(['become_caregiver_details' => $become_caregiver_details]);

        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong.';
        }
        
    }

    public function saveBecomeCaregiverDetails(Request $request){
        try{

            $becomeCaregiver_name = $request->becomeCaregiverName;
            $becomeCaregiverDuties = $request->becomeCaregiverDuties;

            
            BecomeCaregiver::create([
                'main_text' => $becomeCaregiver_name,
                'duties_and_responsibilities' => json_encode($becomeCaregiverDuties),
            ]);

            return response()->json(['message' => 'Details submitted successfully', 'status' => 1]);

        }catch(\Exception $e){
            return response()->json(['message' => 'Oops! Something Went Wrong.', 'status' => 0]);
        }
    }
}
