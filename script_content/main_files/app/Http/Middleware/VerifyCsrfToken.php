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
        '/success',
        '/cancel',
        '/fail',
        '/ipn',
        '/pay-via-ajax',
        '/payment-api/success',
        '/payment-api/cancel',
        '/payment-api/fail',
        '/payment-api/ipn',
        '/payment-api/pay-via-ajax',
        
    ];
}
