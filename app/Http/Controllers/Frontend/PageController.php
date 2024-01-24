<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function urunler() {
        $products = Product::where('status','1')->get();
        return view('frontend.pages.products',compact('products'));
    }

    public function indirimurunler() {
        return view('frontend.pages.products');
    }

    public function urunDetay() {
        return view('frontend.pages.product');
    }

    public function hakkimizda() {
       $about = About::where('id',1)->first();
        return view('frontend.pages.about', compact('about'));
    }

    public function iletisim() {
        return view('frontend.pages.contact');
    }

    public function iletisimkaydet() {
        return view('frontend.pages.contact');
    }

    public function basket() {
        return view('frontend.pages.basket');
    }

}
