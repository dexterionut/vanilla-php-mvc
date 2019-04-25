<?php

namespace App\Core\Contracts;


interface IRouter
{
    public function get($uri, $controller);

    public function post($uri, $controller);

    public function navigateTo(IRequest $request);
}