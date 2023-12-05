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
        '/admin/service-clinics/**',
        '/admin/bookings/**',
        '/admin/new-event/**',
        '/admin/topic-videos/**',
        //api
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
        '/api/short-videos/**',
        '/api/departments/**',
        '/api/symptoms/**',
        // clients
        '/reviews/**',
        '/reviews/**',
        '/products/**',
        '/users/**',
        '/address/**',
        '/api/booking/**',
        '/api/carts/**',
        '/api/doctor-reviews/**',
        '/api/service-clinics/**',
        '/api/users-social/**',
        '/api/messages/**',
        'auth/*',
    ];
}
