<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function urunler(Request $request, $slug=null) {

        $category= $request->segment(1) ?? null;

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

        $order = $request->order ?? 'id';
        $short = $request->short ?? 'desc';


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
        })->with('category:id,name,slug')
        ->whereHas('category', function($query) use($category,$slug) {
            if(!empty($slug)) {
                $query->where('slug',$slug);
            }
            return $query;
        });

        //! Where direkt tablodan sorgu ike whereHas ise ilişkili tablodan sorgu demek

        $minprice = $products->min('price');
        $maxprice = $products->max('price');



        $sizelist = Product::where('status','1')->groupBy('size')->pluck('size')->toArray();
        $colors = Product::where('status','1')->groupBy('color')->pluck('color')->toArray();


        $products = $products->orderBy($order,$short)->paginate(10); // get alırsak direkt json olarak alır verileri


        return view('frontend.pages.products',compact('products','minprice','maxprice','sizelist','colors'));
    }

    public function indirimurunler() {
        return view('frontend.pages.products');
    }

    public function urunDetay($slug) {
        $product = Product::where('slug',$slug)->where('status','1')->firstOrFail();
        // firstOrFail =Z eger slug yok ise hata ver demektir

        $products = Product::where('id','!=',$product->id)
        ->where('category_id',$product->category_id)
        ->where('status','1')
        ->limit(6)
        ->get();

        // Hangi ürün detay sayfasında isem o hariç diger aynı aktegoride olanları göstermesini sagladım diger ürünler kısmında
        return view('frontend.pages.product',compact('product','products'));
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
