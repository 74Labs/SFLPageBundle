<?php

$file = __DIR__.'/../vendor/autoload.php';
if (!file_exists($file)) {
    throw new RuntimeException('Could not find autoload.php in vendor/. Did you run "composer install --dev"?');
}

require_once $file;