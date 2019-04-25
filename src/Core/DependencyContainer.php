<?php

namespace App\Core;

use App\Core\Contracts\IDependencyContainer;

class DependencyContainer implements IDependencyContainer
{
    protected static $registry = [];

    public static function bind(string $key, $val)
    {
        static::$registry[$key] = $val;
    }

    public static function get(string $key)
    {
        return static::$registry[$key];
    }
}