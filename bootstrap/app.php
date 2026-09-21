<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->booted(function ($app) {
        // Explicitly set drivers so Manager::createDriver() never receives null
        config([
            'app.maintenance.driver' => 'file',
            'cache.default' => env('CACHE_STORE', 'array'),
            'session.driver' => env('SESSION_DRIVER', 'cookie'),
            'database.default' => env('DB_CONNECTION', 'sqlite'),
        ]);
    })
    ->create();