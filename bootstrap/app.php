<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);

        // VULN: Cookie acak portal tidak dienkripsi sehingga nilainya tersimpan
        // plaintext dan mudah dibaca/dimanipulasi oleh pengguna.
        $middleware->encryptCookies(except: [
            'spmb_visitor',
        ]);

        // Set cookie acak (insecure flags) pada setiap request.
        $middleware->web(append: [
            \App\Http\Middleware\GenerateRandomCookie::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );
    })->create();
