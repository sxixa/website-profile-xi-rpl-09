<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 1. Register Autoloader
require __DIR__.'/../vendor/autoload.php';

// 2. Prepare writable /tmp directories before booting Laravel
$storageDirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// 3. Create SQLite database file if used
$dbFile = '/tmp/database.sqlite';
if (!file_exists($dbFile)) {
    touch($dbFile);
}

// 4. Bootstrap Laravel application
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

// 5. Override storage path on the booted application
$app->useStoragePath('/tmp/storage');

// 6. Handle the incoming request
$app->handleRequest(Request::capture());