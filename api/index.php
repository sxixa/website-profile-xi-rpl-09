<?php

// Create ephemeral SQLite file in Vercel's writable directory
$dbFile = '/tmp/database.sqlite';
if (!file_exists($dbFile)) {
    touch($dbFile);
}

// Forward requests to Laravel's standard entrypoint
require __DIR__ . '/../public/index.php';