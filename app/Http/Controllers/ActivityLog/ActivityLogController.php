<?php

namespace App\Http\Controllers\ActivityLog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function getActivityLogsPage(){
        try{
            return view('activity-log.activity-log');
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong';
        }
    }
}
