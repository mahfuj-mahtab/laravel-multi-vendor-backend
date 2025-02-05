<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
            $middleware->append(\Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class);
      
        $middleware->alias([
           
            'vendor' => \App\Http\Middleware\VendorMiddleware::class, // Custom Vendor Middleware
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->stopIgnoring(AuthenticationException::class);

        // Handle authentication failures globally
        $exceptions->render(function (AuthenticationException $exception, $request) {
            return response()->json(['message' => 'Denied'], 401);
        });

       
    })->create();
