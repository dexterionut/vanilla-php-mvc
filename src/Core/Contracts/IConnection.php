<?php

namespace App\Core\Contracts;

interface IConnection
{
    public static function make(array $config);
}