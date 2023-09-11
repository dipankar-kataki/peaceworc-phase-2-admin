<?php

namespace App\Http\Controllers\LandingPage\Banner;

use App\Http\Controllers\Controller;
use App\Models\ManageBanner;
use Illuminate\Http\Request;

class ManageBannerController extends Controller
{
    public function getManageBannerPage(){
        try{
            $get_banner = ManageBanner::where('status', 1)->first();
            return view('landing-page.banner.manage-banner')->with(['banner_details' => $get_banner]);
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong.';
        }
        
    }

    public function saveBannerDetails(Request $request){
        try{

            $url = url('/');
            $main_text = $request->bannerMainText;
            $sub_text = $request->bannerSubText;

            $main_image = $request->bannerMainImage;

            $file = null;
            // Upload file to folder
            if($request->hasFile('bannerMainImage')){
                $new_name = date('d-m-Y-H-i-s') . '_' . $main_image->getClientOriginalName();
                $main_image->move(public_path('admin/uploads/image/'), $new_name);
                $file = $url . '/admin/uploads/image/' . $new_name;
            }
            

            ManageBanner::create([
                'main_text' => $main_text,
                'sub_text' => $sub_text,
                'image' => $file
            ]);

            return response()->json(['message' => 'Details submitted successfully', 'status' => 1]);

        }catch(\Exception $e){
            return response()->json(['message' => 'Oops! Something Went Wrong.', 'status' => 0]);
        }
    }
}
