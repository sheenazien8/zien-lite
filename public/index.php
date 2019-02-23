<?php
/*
* Zien lite
*/
require __DIR__ . '/../vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
$dotenv = new Dotenv\Dotenv(__DIR__."/../");
$dotenv->load();
require __DIR__ . '/../config/router.php';
