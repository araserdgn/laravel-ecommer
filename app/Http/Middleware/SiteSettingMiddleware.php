<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\SiteSetting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteSettingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $settings = SiteSetting::pluck('data','name')->toArray();
        //! pluck => sutunları key-value seklinde ayırma saglar. key value ters yaz ama key'i value yerine value'i key yerine

        $categories=Category::where('status','1')->with('subcategory')->withCount('items')->get();

        view()->share(['settings'=>$settings,'categories'=>$categories]);
        // view , göster ve share ile paylaş. Yani bladeler ile yaplas komutudur
        return $next($request);
    }
}
