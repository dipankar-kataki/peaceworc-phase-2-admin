<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required | email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['message'=>'Oops! Validation Failed. '.$validator->errors()->first(), 'status' => 0]);
        }else{
            try{
                if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

                    return $this->error('Login Failed. Credentials did not match with our records.', null, null, 400);
                }else{
                    return response()->json(['message' => 'Great! Login Successful.', 'url' => "/dashboard", 'status' => 1]);
                }
            }catch(\Exception $e){
                return response()->json(['message' => 'Oops! Something Went Wrong.',  'status' => 0]);
            }
        }
    }
}
