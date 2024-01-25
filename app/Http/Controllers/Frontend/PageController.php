<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function urunler(Request $request) {

        if(!empty($request->size)) {
            $size = $request->size;
        }
        else {
            $size = null;
        }


        if(!empty($request->color)) {
            $color = $request->color;
        }
        else {
            $color = null;
        }


        $startprice= $request->start_price ?? null;
        $endprice= $request->end_price ?? null;

        // $size = $request->size ?? null;

        $products = Product::where('status','1')->select('id','name','slug','size','color','price','category_id','image')
        ->where(function($q) use($size, $color,$startprice,$endprice){
            if(!empty($size)) {
                $q->where('size',$size);
            }

            if(!empty($color)) {
                $q->where('color',$color);
            }

            if(!empty($startprice) && $endprice) {
                $q->whereBetween('price',[$startprice,$endprice]);
            }
            return $q;
        })->with('category:id,name,slug');

        $minprice = $products->min('price');
        $maxprice = $products->max('price');



        $sizelist = Product::where('status','1')->groupBy('size')->pluck('size')->toArray();
        $colors = Product::where('status','1')->groupBy('color')->pluck('color')->toArray();


        $products = $products->paginate(1); // get alırsak direkt json olarak alır verileri

        $categories=Category::where('status','1')->where('cat_ust',null)->withCount('items')->get();
        return view('frontend.pages.products',compact('products','categories','minprice','maxprice','sizelist','colors'));
    }

    public function indirimurunler() {
        return view('frontend.pages.products');
    }

    public function urunDetay($slug) {
        $product = Product::where('slug',$slug)->first();
        return view('frontend.pages.product',compact('product'));
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
