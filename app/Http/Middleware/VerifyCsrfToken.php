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
        //admin
        '/api/products/**',
        '/api/wish-lists/**',
        '/api/clinics/**',
        '/api/questions/**',
        '/api/answers/**',
        '/api/reviews/**',
        '/api/categories/**',
        '/api/coupons/**',
        '/api/coupons-apply/**',
        '/api/doctors-info/**',
        '/api/users/**',
        '/api/pharmacies/**',
        // clients
        '/reviews/**',
        '/reviews/**',
        '/products/**',
        '/users/**',
        '/api/carts/**',
        '/api/users-social/**',
        'auth/*'
    ];
}
