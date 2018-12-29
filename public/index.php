<?php
/*
* Zien lite
*/
require __DIR__ . '/../vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__."/../");
$dotenv->load();
require __DIR__ . '/../config/router.php';
