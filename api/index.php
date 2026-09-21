<?php

// 1. Create temporary writable directories
$dirs = [
    '/tmp/storage/app',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/views',
    '/tmp/storage/logs',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// 2. Create blank SQLite database file for database-less mode
if (!file_exists('/tmp/database.sqlite')) {
    touch('/tmp/database.sqlite');
}

// 3. Set storage path
putenv('LARAVEL_STORAGE_PATH=/tmp/storage');
$_ENV['LARAVEL_STORAGE_PATH'] = '/tmp/storage';

// 4. Forward request to Laravel public entrypoint
require __DIR__ . '/../public/index.php';