<?php

use App\Http\Controllers\LandingPage\Banner\ManageBannerController;
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
    return view('dashboard.main');
});

Route::group(['prefix' => 'banner'], function(){
    Route::get('manage', [ManageBannerController::class, 'getManageBannerPage'])->name('admin.get.manage.banner.page');
});
