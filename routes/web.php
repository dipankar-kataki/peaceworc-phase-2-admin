<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\LandingPage\Banner\ManageBannerController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Logout\LogoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('login.main');
})->name('admin.web.login');

Route::group(['middleware' => ['checkRoleMiddleware',] ], function(){
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');
});

Route::group(['middleware' => 'auth'], function(){

    Route::group(['prefix' => 'dashboard'], function(){
        Route::get('', [DashboardController::class, 'getDashboard'])->name('admin.get.dashboard');
    });
    Route::group(['prefix' => 'banner'], function(){
        Route::get('manage', [ManageBannerController::class, 'getManageBannerPage'])->name('admin.get.manage.banner.page');
    });

    Route::get('logout', [LogoutController::class, 'logout'])->name('admin.logout');
});


