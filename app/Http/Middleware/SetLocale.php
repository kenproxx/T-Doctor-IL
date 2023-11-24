<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = 'laos';
        app()->setLocale($locale);
//        LaravelLocalization::setLocale($locale);

        return $next($request);
    }
}
