<?php

namespace App\Http\Controllers\Client;

use App\Common\JobStatus;
use App\Http\Controllers\Controller;
use App\Models\AgencyPostJob;
use App\Models\ClientProfile;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function getClientList(){
        try{
            $get_client_list = ClientProfile::with('agencyProfile')->get();
            return view('client.list.client-list')->with(['get_client_list' => $get_client_list]);
        }catch(\Exception $e){  
            echo 'Something Went Wrong';
        }
    }

    public function getClientDetails($id){
        try{
            $client_id = decrypt($id);
            $get_details = ClientProfile::where('id', $client_id)->first();
            return view('client.details.client-details')->with(['get_details' => $get_details]);
        }catch(\Exception $e){
            echo 'Something Went Wrong';
        }
    }

    public function changeProfileStatus(Request $request){
        try{
            $client_id = decrypt($request->client_id);
            $activation_status = $request->activation_status;

            $check_if_no_active_job_by_client = AgencyPostJob::where('client_id', $client_id)->where('status', JobStatus::Closed)->exists();

            if($check_if_no_active_job_by_client){

                ClientProfile::where('id', $client_id)->update([
                    'status' => $activation_status
                ]);

                session()->flash('success', 'Great! Profile status updated');

                return back();
            }else{
                
                session()->flash('error', 'Oops! Failed to change status. Client has an active job.');

                return back();
            }


        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong.';
        }
    }
}
