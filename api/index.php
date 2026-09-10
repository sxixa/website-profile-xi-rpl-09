<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 1. Buat folder temporary di /tmp Vercel
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

// 2. Set environment variable penting secara programmatic (opsional/backup)
$_ENV['APP_STORAGE_PATH'] = '/tmp/storage';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

// 3. Autoload
require __DIR__ . '/../vendor/autoload.php';

// 4. Bootstrap Laravel
/** @var Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 5. Override Storage & Cache Paths
$app->useStoragePath('/tmp/storage');
$app->useBootstrapPath('/tmp/bootstrap');

// 6. Handle Request
$response = $app->handleRequest(Request::capture());