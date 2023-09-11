<?php

namespace App\Http\Controllers\LandingPage\Layout;

use App\Http\Controllers\Controller;
use App\Models\ManageLayout;
use Illuminate\Http\Request;

class ManageLayoutController extends Controller
{
    public function getLandingPageLayout(){
        try{
            $get_layout = ManageLayout::get();
            return view('landing-page.manage-layout.manage-layout')->with(['get_layout' => $get_layout]);
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong.';
        }
    }

    public function changeLayoutVisibilityStatus(Request $request){
        try{
            // return response()->json(['message' => $request->all(), 'status' => 1]);
            ManageLayout::where('id', $request->id)->update([
                'status' => $request->status
            ]);
            return response()->json(['message' => $request->status == 0 ? 'Visibility Updated To Private' : 'Visibility Updated To Public', 'status' => 1]);
        }catch(\Exception $e){
            return response()->json(['message' => 'Something Went Wrong', 'status' => 0]);
        }
    }
}
