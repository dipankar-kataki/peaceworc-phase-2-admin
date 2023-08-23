<?php

namespace App\Http\Controllers\LandingPage\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageBannerController extends Controller
{
    public function getManageBannerPage(){
        return view('banner.manage-banner');
    }
}
