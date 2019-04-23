<?php

namespace App\Core;


use App\Core\Database\QueryBuilder;

class Model implements IModel
{
    public static $tableName;

    /**
     * @return QueryBuilder
     */
    public static function getQueryBuilder(): QueryBuilder
    {
        return DependencyContainer::get('db');
    }

    public static function getTableName()
    {
        return static::$tableName;
    }

    public static function selectAll()
    {
        return static::getQueryBuilder()
            ->selectAll(static::getTableName());
    }
}