<?php

use App\Core\Database\Connection;
use App\Core\Database\QueryBuilder;
use App\Core\DependencyContainer;

require 'autoload.php';


DependencyContainer::bind('config', require 'config.php');

DependencyContainer::bind(
    'db',
    new QueryBuilder(Connection::make(DependencyContainer::get('config')['database']))
);