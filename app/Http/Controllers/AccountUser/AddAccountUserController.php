<?php

namespace App\Http\Controllers\AccountUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddAccountUserController extends Controller
{
    public function addAccountUserPage(){
        try{
            return view('add-account-user.add-account-user');
        }catch(\Exception $e){
            echo 'Oops! Something Went Wrong';
        }
    }
}
