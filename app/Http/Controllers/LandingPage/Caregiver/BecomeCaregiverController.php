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

            $url = url('/');
            $becomeCaregiver_name = $request->becomeCaregiverName;
            $becomeCaregiver_details = $request->becomeCaregiverDetails;

            $main_image = $request->becomeCaregiverMainImage;

            // Upload file to folder
            $file = null;
            if($request->hasFile('becomeCaregiverMainImage')){
                $new_name = date('d-m-Y-H-i-s') . '_' . $main_image->getClientOriginalName();
                $main_image->move(public_path('admin/uploads/image/becomeCaregiver/'), $new_name);
                $file = $url . '/admin/uploads/image/becomeCaregiver/' . $new_name;    
            }
            
            BecomeCaregiver::create([
                'name' => $becomeCaregiver_name,
                'image' => $file,
                'details' => $becomeCaregiver_details,
            ]);

            return response()->json(['message' => 'Details submitted successfully', 'status' => 1]);

        }catch(\Exception $e){
            return response()->json(['message' => 'Oops! Something Went Wrong.'.$e->getMessage(), 'status' => 0]);
        }
    }
}
