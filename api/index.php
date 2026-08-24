<?php

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

$publicPath = __DIR__ . '/../public' . $uri;

if ($uri !== '/' && file_exists($publicPath) && !is_dir($publicPath)) {
    $mimeType = match (pathinfo($publicPath, PATHINFO_EXTENSION)) {
        'css' => 'text/css',
        'js' => 'application/javascript',
        'png' => 'image/png',
        'jpg', 'jpeg' => 'image/jpeg',
        'svg' => 'image/svg+xml',
        'ico' => 'image/x-icon',
        default => mime_content_type($publicPath) ?: 'text/plain',
    };

    header("Content-Type: {$mimeType}");
    header('Cache-Control: public, max-age=31536000');
    readfile($publicPath);
    exit;
}

require __DIR__ . '/../public/index.php';