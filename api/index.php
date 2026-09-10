<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 1. Set environment variable dasar langsung dari PHP (Paling Awal)
$_ENV['CACHE_STORE'] = 'array';
$_ENV['SESSION_DRIVER'] = 'array';
$_ENV['QUEUE_CONNECTION'] = 'sync';
$_ENV['LOG_CHANNEL'] = 'stderr';
$_ENV['DB_CONNECTION'] = 'sqlite';

putenv('CACHE_STORE=array');
putenv('SESSION_DRIVER=array');
putenv('QUEUE_CONNECTION=sync');
putenv('LOG_CHANNEL=stderr');
putenv('DB_CONNECTION=sqlite');

// 2. Buat direktori sementara di /tmp Vercel
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

// 3. Autoload
require __DIR__ . '/../vendor/autoload.php';

// 4. Bootstrap Application
/** @var Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 5. Override Storage Path
$app->useStoragePath('/tmp/storage');
$app->useBootstrapPath('/tmp/bootstrap');

// 6. Jalankan Request
$response = $app->handleRequest(Request::capture());