<?php


return [
    'database' => [
        'dbname' => 'test_vanilla',
        'username' => 'root',
        'password' => 'password',
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ],
    ],
];