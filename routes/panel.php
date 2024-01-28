<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\PageHomeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'panelsetting', 'prefix'=>'panel'], function() {
    //! prefix demek url'de ararken ne ile başalaycak onu belrliyoruz. /panel/... gibi düşün

    Route::get('/', [DashboardController::class, 'panel'])->name('panel');

});
