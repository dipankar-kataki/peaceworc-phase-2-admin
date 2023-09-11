<?php

namespace App\Http\Controllers\LandingPage\AppLink;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageAppLinkController extends Controller
{
    public function getManageAppLinkPage(){
        try{
            return view('landing-page.app-link.manage-app-link');
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong';
        }
    }
}
