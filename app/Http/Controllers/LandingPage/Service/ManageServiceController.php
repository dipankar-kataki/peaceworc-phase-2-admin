<?php

namespace App\Http\Controllers\LandingPage\Service;

use App\Http\Controllers\Controller;
use App\Models\ListOfService;
use App\Models\ManageService;
use App\Models\ServiceContent;
use Illuminate\Http\Request;

class ManageServiceController extends Controller
{
    public function getManageServicePage(){
        // $service_details = ManageService::where('status', 1)->first();
        $list_of_services = ListOfService::where('status', 1)->get();
        return view('landing-page.service.manage-service')->with(['list_of_services' => $list_of_services]);
    }

    public function getSelectedServiceDetails(Request $request){
        // return response()->json(['message' => 'Great! Service Fetched Successfully.', 'data' =>  $request->all(), 'status' => 1]);
        try{
            $service_content = ServiceContent::where('service_id', $request->service_id)->first();
            return response()->json(['message' => 'Great! Service Fetched Successfully.', 'data' =>  $service_content->content, 'status' => 1]);
        }catch(\Exception $e){
            return response()->json(['message' => 'Oops! Something Went Wrong.'. $e->getMessage(), 'status' => 0]);
        }
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
            return response()->json(['message' => 'Oops! Something Went Wrong.', 'status' => 0]);
        }
    }
}
