<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CorsMiddleware; 

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'cors' => CorsMiddleware::class, // Đăng ký middleware CORS
        ]);
        
        $middleware->append(CorsMiddleware::class); // Áp dụng middleware cho tất cả request
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
