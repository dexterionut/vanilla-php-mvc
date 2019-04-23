<?php

use App\Core\Request;
use App\Core\Router;

require './autoload.php';


Router::load('routes.php')
    ->navigateTo(new Request());
