<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\AgencyPayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function getPayoutList(){
        try{
            $get_payouts =  AgencyPayment::all();
            return view('payout.list.payout-list')->with(['get_payouts' =>$get_payouts]);
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong';
        }
    }
}
