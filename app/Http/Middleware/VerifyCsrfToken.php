<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/api/products/create',
        '/api/products/update/*',
        '/api/products/delete/*',
        '/api/wish-lists/**',
        '/api/clinics/**',
        '/api/questions/**',
        '/api/answers/**',
        '/api/reviews/**',
        'auth/*'
    ];
}
