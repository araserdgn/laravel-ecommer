<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PageHomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware'=>'sitesetting'], function() {

    Route::get('/', [PageHomeController::class, 'home'])->name('home');

    Route::get('/urunler', [PageController::class, 'products'])->name('products');
    Route::get('/erkek/{slug?}', [PageController::class, 'products'])->name('erkekproducts');
    Route::get('/kadin/{slug?}', [PageController::class, 'products'])->name('kadinproducts');
    Route::get('/cocuk/{slug?}', [PageController::class, 'products'])->name('cocukproducts');
    Route::get('/urun/{slug}', [PageController::class, 'urunDetay'])->name('urunDetay');
    Route::get('/indirimler',[PageController::class, 'discountproducts'])->name('indirimproducts');

    Route::get('/hakkimizda', [PageController::class, 'about'])->name('about');

    Route::get('/iletisim', [PageController::class, 'contact'])->name('contact');
    Route::post('/iletisim/kaydet', [AjaxController::class, 'savecontact'])->name('iletisim.kaydet');

    Route::get('/sepet',[CardController::class, 'basket'])->name('sepet');
    Route::post('/sepet/ekle',[CardController::class, 'add'])->name('sepet.add');
    Route::post('/sepet/cıkar',[CardController::class, 'remove'])->name('sepet.remove');

    Auth::routes();

    Route::get('/cıkıs', [AjaxController::class, 'logout'])->name('logout');

});

//! Kernel içine tanımladıgımız isimden çekiyoruz sitesetting adını
// ARtık sitesetting içine yazılan bütün kodlar içerisindeki kodları etkiler

