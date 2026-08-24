<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';

if (! $app->bound('view')) {
    http_response_code(500);
    echo 'VIEW_NOT_BOUND';
    exit;
}

echo 'VIEW_BOUND';
exit;

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

$publicPath = __DIR__ . '/../public' . $uri;

// Jika request adalah file fisik yang ada di public (seperti /css/services.css), sajikan langsung
if ($uri !== '/' && file_exists($publicPath) && !is_dir($publicPath)) {
    $mimeType = match (pathinfo($publicPath, PATHINFO_EXTENSION)) {
        'css'  => 'text/css',
        'js'   => 'application/javascript',
        'png'  => 'image/png',
        'jpg', 'jpeg' => 'image/jpeg',
        'svg'  => 'image/svg+xml',
        'ico'  => 'image/x-icon',
        default => mime_content_type($publicPath) ?: 'text/plain',
    };

    header("Content-Type: {$mimeType}");
    header('Cache-Control: public, max-age=31536000');
    readfile($publicPath);
    exit;
}

// Untuk rute halaman web biasa, jalankan Laravel
require __DIR__ . '/../public/index.php';