<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\PageHomeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['panelsetting'], 'prefix'=>'panel','as'=>'panel.'], function() {
    //! prefix demek url'de ararken ne ile başalaycak onu belrliyoruz. /panel/... gibi düşün
    // as burada bize yönlendirme yaparken route('panel.XXXX') şeklinde çagıracagz

    Route::get('/', [DashboardController::class, 'index'])->name('index');

});
