<?php

// 1. MUST REQUIRE AUTOLOADER FIRST
require __DIR__ . '/../vendor/autoload.php';

// Prepare required writable folders in Vercel /tmp
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

// Auto-create SQLite database file in /tmp if using local DB
$dbFile = '/tmp/database.sqlite';
if (!file_exists($dbFile)) {
    touch($dbFile);
}

// 2. Load Laravel application
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->useStoragePath('/tmp/storage');

// 3. Handle request
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);