<?php

require './bootstrap.php';


use App\Core\Request;
use App\Core\Router;


Router::load('routes.php')
    ->navigateTo(new Request());
