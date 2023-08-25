<?php

namespace App\Http\Middleware;

use App\Common\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try{
            if($request->email != null){

                $check_user_role = User::where('email', $request->email)->first();
                if($check_user_role->role == Role::Web_Admin || $check_user_role == Role::Web_Operator){
                    return $next($request);
                }else{
                    return redirect('/');
                }
            }else{
                return redirect('/');
            }
        }catch(\Exception $e){
            return response()->json(['message' => 'Invalid Credentials', 'status' => 0 ]);
        }
        
        
    }
}
