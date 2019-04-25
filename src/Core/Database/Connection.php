<?php

namespace App\Core\Database;


use App\Core\Contracts\IConnection;
use \PDO;

class Connection implements IConnection
{
    public static function make(array $config)
    {
        try {
            return new PDO(
                "{$config['driver']}:host={$config['host']};dbname={$config['dbname']}",
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (\Exception $e) {
            print_r($e->getMessage());
            return false;
        }
    }
}