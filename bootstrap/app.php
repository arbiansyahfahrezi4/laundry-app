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
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );

        $exceptions->render(function (\Throwable $e) {
            return response(
                "<div style='font-family:monospace;padding:24px;background:#1e1e1e;color:#ff6b6b;'>
                    <h2>🔥 Detail Error Laravel:</h2>
                    <p style='color:#fff;font-size:16px;'><b>Pesan:</b> " . htmlspecialchars($e->getMessage()) . "</p>
                    <p style='color:#aaa;'><b>File:</b> " . htmlspecialchars($e->getFile()) . " (Baris: " . $e->getLine() . ")</p>
                    <hr style='border-color:#444;'/>
                    <pre style='color:#ccc;white-space:pre-wrap;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>
                </div>",
                500
            );
        });
    })->create();