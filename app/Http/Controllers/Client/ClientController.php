<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ClientProfile;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function getClientList(){
        try{
            $get_client_list = ClientProfile::all();
            return view('client.list.client-list')->with(['get_client_list' => $get_client_list]);
        }catch(\Exception $e){  
            echo 'Something Went Wrong';
        }
    }
}
