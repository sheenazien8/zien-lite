<?php
/*
* Zien lite
*/
require __DIR__ . '/../vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__."/../");
$dotenv->load();
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
require __DIR__ . '/../config/router.php';
