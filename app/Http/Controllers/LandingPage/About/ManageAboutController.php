<?php

namespace App\Http\Controllers\LandingPage\About;

use App\Http\Controllers\Controller;
use App\Models\ManageAbout;
use Illuminate\Http\Request;

class ManageAboutController extends Controller
{
    public function getManageAboutPage(){
        return view('about.manage-about');
    }

    public function saveAboutDetails(Request $request){
        try{

            $url = url('/');
            $main_text = $request->aboutMainText;
            $sub_text_1 = $request->aboutSubText1;
            $sub_text_2 = $request->aboutSubText2;
            $sub_text_3 = $request->aboutSubText3;

            $main_image = $request->aboutMainImage;

            // Upload file to folder
            $file = null;
            if($request->hasFile('aboutMainImage')){
                $new_name = date('d-m-Y-H-i-s') . '_' . $main_image->getClientOriginalName();
                $main_image->move(public_path('admin/uploads/image/'), $new_name);
                $file = $url . '/admin/uploads/image/' . $new_name;
            }
            

            ManageAbout::create([
                'main_text' => $main_text,
                'sub_text_1' => $sub_text_1,
                'sub_text_2' => $sub_text_2,
                'sub_text_3' => $sub_text_3,
                'image' => $file
            ]);

            return response()->json(['message' => 'Details submitted successfully', 'status' => 1]);

        }catch(\Exception $e){
            return response()->json(['message' => 'Oops! Something Went Wrong.', 'status' => 0]);
        }
    }
}
