<?php

namespace App\Http\Controllers\LandingPage\WebsiteDocuments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebDocsController extends Controller
{
    public function termsAndConditions(Request $request){
        return view('landing-page.website-docs.terms-and-conditions');
    }
}