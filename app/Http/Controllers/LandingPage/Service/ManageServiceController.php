<?php

namespace App\Http\Controllers\LandingPage\Service;

use App\Http\Controllers\Controller;
use App\Models\ManageService;
use Illuminate\Http\Request;

class ManageServiceController extends Controller
{
    public function getManageServicePage(){
        return view('service.manage-service');
    }

    public function saveServiceDetails(Request $request){
        try{

            $url = url('/');
            $service_name = $request->serviceName;
            $service_details = $request->serviceDetails;

            $main_image = $request->serviceMainImage;

            // Upload file to folder
            $file = null;
            if($request->hasFile('serviceMainImage')){
                $new_name = date('d-m-Y-H-i-s') . '_' . $main_image->getClientOriginalName();
                $main_image->move(public_path('admin/uploads/image/service/'), $new_name);
                $file = $url . '/admin/uploads/image/service/' . $new_name;    
            }
            
            ManageService::create([
                'name' => $service_name,
                'image' => $file,
                'details' => $service_details,
            ]);

            return response()->json(['message' => 'Details submitted successfully', 'status' => 1]);

        }catch(\Exception $e){
            return response()->json(['message' => 'Oops! Something Went Wrong.'.$e->getMessage(), 'status' => 0]);
        }
    }
}
