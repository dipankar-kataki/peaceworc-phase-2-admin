<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\LandingPage\About\ManageAboutController;
use App\Http\Controllers\LandingPage\Banner\ManageBannerController;
use App\Http\Controllers\LandingPage\Caregiver\BecomeCaregiverController;
use App\Http\Controllers\LandingPage\Service\ManageServiceController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Logout\LogoutController;
use App\Models\BecomeCaregiver;
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
        Route::post('save-details', [ManageBannerController::class, 'saveBannerDetails'])->name('admin.save.banner.details');
    });

    Route::group(['prefix' => 'about'], function(){
        Route::get('manage', [ManageAboutController::class, 'getManageAboutPage'])->name('admin.get.manage.about.page');
        Route::post('save-details', [ManageAboutController::class, 'saveAboutDetails'])->name('admin.save.about.details');
    });

    Route::group(['prefix' => 'services'], function(){
        Route::get('manage', [ManageServiceController::class, 'getManageServicePage'])->name('admin.get.manage.service.page');
        Route::post('save-details', [ManageServiceController::class, 'saveServiceDetails'])->name('admin.save.service.details');
    });

    Route::group(['prefix' => 'become-caregiver'], function(){
        Route::get('manage', [BecomeCaregiverController::class, 'getBecomeCaregiverPage'])->name('admin.get.become.caregiver.page');
        Route::post('save-details', [BecomeCaregiverController::class, 'saveBecomeCaregiverDetails'])->name('admin.save.become.caregiver.details');
    });

    Route::get('logout', [LogoutController::class, 'logout'])->name('admin.logout');
});


