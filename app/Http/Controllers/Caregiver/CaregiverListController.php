<?php

namespace App\Http\Controllers\Caregiver;

use App\Common\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CaregiverListController extends Controller
{
    public function getCaregiverList(){
        try{
            $get_caregiver_list = User::with('caregiverProfile', 'caregiverProfileStatus')->where('role', Role::Caregiver)->get();
            return view('caregiver.list.caregiver-list')->with(['get_caregiver_list' => $get_caregiver_list]);
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong';
        }   
    }
}
