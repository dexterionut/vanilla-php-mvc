<?php

namespace App\Core\Contracts;

interface IDependencyContainer
{
    public static function bind(string $key, $val);

    public static function get(string $key);
}