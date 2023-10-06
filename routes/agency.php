<?php

use App\Http\Controllers\Agency\AgencyListController;
use App\Http\Controllers\Agency\AgencyProfileController;
use App\Http\Controllers\AgencyJobController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Payment\PaymentController;
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

    Route::group(['prefix' => 'job'], function(){
        Route::get('list', [AgencyJobController::class, 'getAgencyPostedJobsList'])->name('admin.get.agency.posted.jobs.list');
        Route::get('details/{id}', [AgencyJobController::class, 'getAgencyPostJobDetails'])->name('admin.get.agency.posted.job.details');
    });

    Route::group(['prefix' => 'profile'], function(){
        Route::get('get/{id}', [AgencyProfileController::class, 'getAgencyProfile'])->name('admin.get.agency.profile');
        Route::post('activation', [AgencyProfileController::class, 'agencyProfileActivation'])->name('admin.agency.profile.activation');
    });

    Route::group(['prefix' => 'client'], function(){
        Route::get('list', [ClientController::class, 'getClientList'])->name('admin.get.client.list');
    });

    Route::group(['prefix' => 'payout'], function(){
        Route:: get('list',[PaymentController::class, 'getPayoutList'])->name('admin.get.payout.list');
    });
});