<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;

class PageHomeController extends Controller
{
    public function anasayfa() {
        $slider = Slider::where('status','1')->first();
        $title="Anasayfa";

        $categories=Category::where('status','1')->get();
        return view('frontend.pages.index',compact('slider','title','categories'));
    }
}
