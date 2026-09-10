<?php
// Force PHP to show all errors directly on the screen
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

try {
    // Check if vendor folder exists
    if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
        throw new Exception("Fatal Error: vendor/autoload.php is missing. Composer dependencies were not installed or packaged correctly.");
    }

    require __DIR__ . '/../public/index.php';
} catch (Throwable $e) {
    echo "<h1 style='color: red;'>Laravel Startup Error:</h1>";
    echo "<pre>" . htmlspecialchars($e->getMessage()) . "</pre>";
    echo "<h3>File:</h3> " . htmlspecialchars($e->getFile()) . " on line " . $e->getLine();
    echo "<h3>Stack Trace:</h3><pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}