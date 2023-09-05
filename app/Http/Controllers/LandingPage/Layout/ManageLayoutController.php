<?php

namespace App\Http\Controllers\LandingPage\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageLayoutController extends Controller
{
    public function getLandingPageLayout(){
        try{
            return view('manage-layout.manage-layout');
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong.';
        }
    }
}
