<?php

use App\Http\Controllers\Caregiver\CaregiverListController;
use App\Http\Controllers\Caregiver\CaregiverProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Caregiver Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Caregiver routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "web" middleware group. Enjoy building your Routes!
|
*/

Route::group(['middleware' => 'auth'], function(){

    Route::get('list', [CaregiverListController::class, 'getCaregiverList'])->name('admin.get.caregiver.list');
    Route::group(['prefix' => 'profile'], function(){
        Route::get('get/{id}', [CaregiverProfileController::class, 'getCaregiverProfile'])->name('admin.get.caregiver.profile');
        Route::post('activation', [CaregiverProfileController::class, 'caregiverProfileActivation'])->name('admin.caregiver.profile.activation');
        Route::group(['prefix' => 'pending'], function(){
            Route::get('get', [CaregiverProfileController::class, 'pendingProfile'])->name('admin.get.caregiver.pending.profile');
        });
    });
});