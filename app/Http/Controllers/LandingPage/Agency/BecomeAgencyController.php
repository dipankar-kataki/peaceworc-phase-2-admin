<?php

namespace App\Http\Controllers\LandingPage\Agency;

use App\Http\Controllers\Controller;
use App\Models\BecomeAgency;
use Illuminate\Http\Request;

class BecomeAgencyController extends Controller
{
    public function getBecomeAgencyPage(){
        return view('agency.manage-become-agency');
    }

    public function saveBecomeAgencyDetails(Request $request){
        try{


            $becomeAgency_name = $request->becomeAgencyName;
            $becomeAgencyDuties = $request->becomeAgencyDuties;

            
            BecomeAgency::create([
                'main_text' => $becomeAgency_name,
                'duties_and_responsibilities' => json_encode($becomeAgencyDuties),
            ]);

            return response()->json(['message' => 'Details submitted successfully', 'status' => 1]);

        }catch(\Exception $e){
            return response()->json(['message' => 'Oops! Something Went Wrong.'.$e->getMessage(), 'status' => 0]);
        }
    }
}
