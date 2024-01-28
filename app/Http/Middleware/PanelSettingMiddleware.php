<?php

namespace App\Http\Middleware;

use App\Models\SiteSetting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PanelSettingMiddleware
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



        view()->share(['settings'=>$settings]);
        // view , göster ve share ile paylaş. Yani bladeler ile yaplas komutudur
        return $next($request);
    }
}
