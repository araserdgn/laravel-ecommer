<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\PageHomeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['panelsetting'], 'prefix'=>'panel','as'=>'panel.'], function() {
    //! prefix demek url'de ararken ne ile başalaycak onu belrliyoruz. /panel/... gibi düşün
    // as burada bize yönlendirme yaparken route('panel.XXXX') şeklinde çagıracagz

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');

    // Route::resource('/slider', [SliderController::class, 'index'])->name('slider.index');
    // Burda make:controller --resource ile olsutrdysan direkt sınıfları oto tanımayı saglar

    Route::get('/slider/ekle', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider/ekle', [SliderController::class, 'create'])->name('slider.create');
    Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
    Route::put('/slider/{id}/update', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/slider/{id}/destroy', [SliderController::class, 'destroy'])->name('slider.destroy');

});
