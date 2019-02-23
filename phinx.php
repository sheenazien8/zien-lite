<?php
require 'vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__."/");
$dotenv->load();

return
    [
        'paths' => [
            'migrations' => 'database/migrations',
            'seeds' => 'database/seeds'
        ],
        'environments' =>
            [
                'default_database' => '*** CHOOSE AN ENVIRONMENT ***',
                'default_migration_table' => 'phinxlog',
                'development'      =>
                    [
                        'adapter' => getenv('DB_DRIVER', 'mysql'),
                        'host' => getenv('DB_HOST', 'localhost'),
                        'name' => getenv('DB_NAME', ''),
                        'user' => getenv('DB_USER', 'root'),
                        'pass' => getenv('DB_PASSWORD', ''),
                        'port' => 3306,
                        'charset' => 'utf8',
                        'collation' => 'utf8_unicode_ci',
                    ],
                'production'      =>
                    [
                        'adapter' => getenv('DB_DRIVER', 'mysql'),
                        'host' => getenv('DB_HOST', 'localhost'),
                        'name' => getenv('DB_NAME', ''),
                        'user' => getenv('DB_USER', 'root'),
                        'pass' => getenv('DB_PASSWORD', ''),
                        'port' => 3306,
                        'charset' => 'utf8',
                        'collation' => 'utf8_unicode_ci',
                    ],
                'staging'      =>
                    [
                        'adapter' => getenv('DB_DRIVER', 'mysql'),
                        'host' => getenv('DB_HOST', 'localhost'),
                        'name' => getenv('DB_NAME', ''),
                        'user' => getenv('DB_USER', 'root'),
                        'pass' => getenv('DB_PASSWORD', ''),
                        'port' => 3306,
                        'charset' => 'utf8',
                        'collation' => 'utf8_unicode_ci',
                    ],
            ],
    ];
