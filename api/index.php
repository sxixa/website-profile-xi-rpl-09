<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 1. Buat direktori sementara di /tmp Vercel
$dirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// 2. Autoload & Bootstrap
require __DIR__ . '/../vendor/autoload.php';

/** @var Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 3. Set path storage ke /tmp
$app->useStoragePath('/tmp/storage');
$app->useBootstrapPath('/tmp/bootstrap');

// 4. OVERRIDE CONFIG (Solusi untuk ArgumentCountError)
// Paksa Laravel menggunakan driver 'array' & 'file' tanpa butuh database
$app->booted(function () use ($app) {
    $app['config']->set('cache.default', 'array');
    $app['config']->set('session.driver', 'array');
    $app['config']->set('database.default', 'sqlite');
    $app['config']->set('database.connections.sqlite.database', '/tmp/database.sqlite');
});

// 5. Jalankan Request
$response = $app->handleRequest(Request::capture());