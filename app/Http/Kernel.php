<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     */
    protected $middleware = [
        // Handles CORS
        \Illuminate\Http\Middleware\HandleCors::class,

        // Checks if the application is under maintenance
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,

        // Validates the signature of incoming requests
        \Illuminate\Routing\Middleware\ValidateSignature::class,

        // Trims strings in request data
        \Illuminate\Foundation\Http\Middleware\TrimStrings::class,

        // Converts empty strings to null
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,

            // Middleware untuk fitur login/session
            \Illuminate\Session\Middleware\AuthenticateSession::class,

            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // Throttle untuk API
            \Illuminate\Routing\Middleware\ThrottleRequests::class . ':api',

            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * Bisa dipakai di route seperti Route::middleware('auth')
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,

        'admin' => \App\Http\Middleware\AdminMiddleware::class,

        'role' => \App\Http\Middleware\RoleMiddleware::class,



        // Mencegah user login mengakses /login & /register
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,

        // Untuk memverifikasi email
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // Throttle
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        // Redirect untuk signed routes
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,

        // Authorization
        'can' => \Illuminate\Auth\Middleware\Authorize::class,

        // Password Confirmation
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
    ];
}



