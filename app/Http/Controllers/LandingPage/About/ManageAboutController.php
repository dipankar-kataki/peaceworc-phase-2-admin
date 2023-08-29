<?php

namespace App\Http\Controllers\LandingPage\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageAboutController extends Controller
{
    public function getManageAboutPage(){
        return view('about.manage-about');
    }
}
