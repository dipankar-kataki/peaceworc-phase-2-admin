<?php

use App\Http\Controllers\Agency\AgencyListController;
use App\Http\Controllers\Agency\AgencyProfileController;
use App\Http\Controllers\AgencyJobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Agency Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Agency routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "web" middleware group. Enjoy building your Routes!
|
*/

Route::group(['middleware' => 'auth'], function(){
  
    Route::get('list', [AgencyListController::class, 'getAgencyList'])->name('admin.get.agency.list');

    Route::get('jobs', [AgencyJobController::class, 'getAgencyPostedJobs'])->name('admin.get.agency.posted.jobs');

    Route::group(['prefix' => 'profile'], function(){
        Route::get('{id}', [AgencyProfileController::class, 'getAgencyProfile'])->name('admin.get.agency.profile');
        Route::post('activation', [AgencyProfileController::class, 'agencyProfileActivation'])->name('admin.agency.profile.activation');
    });
});