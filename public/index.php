<?php
/*
* Zien lite
*/
require __DIR__ . '/../vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__."/../");
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
$dotenv->load();
require __DIR__ . '/../config/router.php';
