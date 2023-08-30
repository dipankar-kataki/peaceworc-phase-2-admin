<?php

namespace App\Http\Controllers\LandingPage\Caregiver;

use App\Http\Controllers\Controller;
use App\Models\BecomeCaregiver;
use Illuminate\Http\Request;

class BecomeCaregiverController extends Controller
{
    public function getBecomeCaregiverPage(){
        return view('caregiver.manage-become-caregiver');
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
