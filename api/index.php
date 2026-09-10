<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

// 1. Require Autoloader
require __DIR__ . '/../vendor/autoload.php';

// 2. Create writable directories in Vercel's /tmp environment
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

// 3. Create SQLite DB file if needed
$dbFile = '/tmp/database.sqlite';
if (!file_exists($dbFile)) {
    touch($dbFile);
}

// 4. Create Laravel Application Instance
/** @var \Illuminate\Foundation\Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 5. Call useStoragePath on the instantiated Application object
$app->useStoragePath('/tmp/storage');

// 6. Handle Request
$app->handleRequest(\Illuminate\Http\Request::capture());