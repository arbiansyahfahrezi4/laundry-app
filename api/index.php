<?php

use Illuminate\Http\Request;

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';

try {
    $app->handleRequest(Request::capture());
} catch (Throwable $e) {
    error_log('VERCEL_LARAVEL_ERROR: ' . $e->__toString());

    http_response_code(500);
    header('Content-Type: text/plain');
    echo $e->getMessage();
}