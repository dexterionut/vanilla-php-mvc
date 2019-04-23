<?php

use App\Core\Request;
use App\Core\Router;

require './bootstrap.php';


Router::load('routes.php')
    ->navigateTo(new Request());
