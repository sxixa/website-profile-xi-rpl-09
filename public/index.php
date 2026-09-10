<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 1. Register Autoloader
require __DIR__.'/../vendor/autoload.php';

// 2. Prepare writable storage directories in Vercel /tmp
$storageDirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/logs',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// 3. Create SQLite DB if used
$dbFile = '/tmp/database.sqlite';
if (!file_exists($dbFile)) {
    touch($dbFile);
}

// 4. Bootstrap Laravel and override storage path FIRST
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->useStoragePath('/tmp/storage');

// 5. Handle Request AFTER storage path is set
$app->handleRequest(Request::capture());