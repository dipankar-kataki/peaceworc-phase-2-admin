<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AgencyProfileController extends Controller
{
    public function getAgencyProfile($id){
        try{
            $agency_id = decrypt($id);

            $get_agency_detail = User::with('agencyProfile', 'agencyProfileStatus', 'authOfficer')->where('id', $agency_id)->first();

            return view('agency.profile.agency-profile')->with(['get_agency_detail' => $get_agency_detail]);
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong.'. $e->getMessage();
        }
        
    }
}
