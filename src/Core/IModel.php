<?php
/**
 * Created by PhpStorm.
 * User: sorinionut.zamfir
 * Date: 2019-04-23
 * Time: 15:45
 */

namespace App\Core;


use App\Core\Database\QueryBuilder;

interface IModel
{
    static function getTableName();
    static function getQueryBuilder(): QueryBuilder;
}