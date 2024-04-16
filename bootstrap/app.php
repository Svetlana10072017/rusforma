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
        $middleware->alias([
            'basket_not_empty' => \App\Http\Middleware\BasketIsNotEmpty::class,
            'role_admin' => \App\Http\Middleware\CheckRoleAdmin::class,
            'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        ]);
        // $middleware->alias([
        //     'role_admin' => \App\Http\Middleware\CheckRoleAdmin::class,
        // ]);

        // $middleware->appendToGroup('web', \App\Http\Middleware\BasketIsNotEmpty::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
