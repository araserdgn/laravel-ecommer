<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class PageHomeController extends Controller
{
    public function anasayfa() {
        $slider = Slider::where('status','1')->first();
        $title="Anasayfa";

        $category = Category::where('cat_ust',null)->get();
        $categories=Category::where('status','1')->get();

        $about = About::where('id',1)->first();
        return view('frontend.pages.index',compact('slider','title','categories','about','category'));
    }
}
