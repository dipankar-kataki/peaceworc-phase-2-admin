<?php

namespace App\Http\Controllers\Agency;

use App\Common\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AgencyListController extends Controller
{
    public function getAgencyList(){
        try{
            $get_agency_list = User::with('agencyProfile')->where('role', Role::Agency_Admin)
                            ->orWhere('role', Role::Agency_Operator)
                            ->orWhere('role', Role::Agency_Owner)
                            ->OrderBy('created_at', 'DESC')->get();
            return view('agency.list.agency-list')->with(['get_agency_list' => $get_agency_list]);
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong';
        }
    }
}
