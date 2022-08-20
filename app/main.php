<?php

session_start();

include dirname(__DIR__) . "/app/config.php";
include dirname(__DIR__) . '/vendor/autoload.php';

$database = [
    'type' => 'mysql',
    'host' => DB_HOST,
    'database' => DB_NAME,
    'username' => DB_USER,
    'password' => DB_PASS
];
global $database;
