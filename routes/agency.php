<?php

use App\Http\Controllers\Agency\AgencyListController;
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
});