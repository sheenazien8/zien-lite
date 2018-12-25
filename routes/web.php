<?php
    $routes->uri([
        'url' => '/',
    ], 'HomeController', 'index');

    $routes->uri([
        'url' => '/file',
    ], 'FileController', 'index');

    $routes->uri([
        'url' => '/file/show/',
    ], 'FileController', 'store');
