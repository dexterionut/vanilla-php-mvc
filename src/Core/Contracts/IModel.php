<?php

namespace App\Core\Contracts;


use App\Core\Database\QueryBuilder;

interface IModel
{
    static function getTableName();

    static function getQueryBuilder(): QueryBuilder;
}