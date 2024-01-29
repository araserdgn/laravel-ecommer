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
    public function home() {
        $slider = Slider::where('status','1')->first();
        $title="Anasayfa";

        $category = Category::where('cat_ust',null)->get();

        $about = About::where('id',1)->first();
        return view('frontend.pages.index',compact('slider','title','about','category'));
    }
}
