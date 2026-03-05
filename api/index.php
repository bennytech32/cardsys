<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

require __DIR__.'/../vendor/autoload.php';

// 1. TENGENEZA MA-FOLDER YA MUDA KWENYE VERCEL (Read-Only Fix)
$tmpStorage = '/tmp/storage';
$directories = [
    "$tmpStorage/app/public",
    "$tmpStorage/framework/cache/data",
    "$tmpStorage/framework/sessions",
    "$tmpStorage/framework/testing",
    "$tmpStorage/framework/views",
    "$tmpStorage/logs"
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

$app = require_once __DIR__.'/../bootstrap/app.php';

// 2. LAKIMISHA LARAVEL ITUMIE /tmp BADALA YA FOLDER LAKE
$app->useStoragePath($tmpStorage);

// 3. WASHA MFUMO
$request = Request::capture();
$app->handleRequest($request);