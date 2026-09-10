<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

try {
    // 1. Require Autoloader
    if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
        throw new Exception("vendor/autoload.php missing.");
    }
    require __DIR__ . '/../vendor/autoload.php';

    // 2. Prepare writable /tmp storage directories
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

    // 3. Prepare SQLite DB file
    $dbFile = '/tmp/database.sqlite';
    if (!file_exists($dbFile)) {
        touch($dbFile);
    }

    // 4. Create Laravel App Instance
    /** @var \Illuminate\Foundation\Application $app */
    $app = require_once __DIR__ . '/../bootstrap/app.php';

    // 5. Override Storage Path
    $app->useStoragePath('/tmp/storage');

    // 6. Handle Request
    $app->handleRequest(\Illuminate\Http\Request::capture());

} catch (\Throwable $e) {
    echo "<h1 style='color: red;'>Laravel Crash Detected:</h1>";
    echo "<p><b>Message:</b> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><b>File:</b> " . htmlspecialchars($e->getFile()) . " on line " . $e->getLine() . "</p>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}