<?php

namespace App\Core\Contracts;

use PDO;

interface IQueryBuilder
{
    public function __construct(PDO $db);
}