<?php

namespace App\Core;


use App\Core\Contracts\IRequest;
use App\Core\Contracts\IRouter;

class Router implements IRouter
{
    protected $routes = [
        'GET' => [],
        'POST' => [],
    ];

    /**
     * Load
     * @param string $file
     * @return Router
     */
    public static function load(string $file)
    {
        $router = new static();
        require $file;
        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * @param IRequest $request
     */
    public function navigateTo(IRequest $request)
    {
        $uri = $request->getUri();
        $method = $request->getMethod();
        if (array_key_exists($uri, $this->routes[$method])) {
            $explodedRoute = explode('@', $this->routes[$method][$uri]);
            $controller = $explodedRoute[0];
            $action = $explodedRoute[1];

            $this->callAction($request, $controller, $action);
        } else {
            echo Helper::jsonResponse(['message' => "Route doesn't exist."], 404);
        }
    }

    /**
     * @param $request
     * @param $controller
     * @param $action
     * @return mixed
     */
    protected function callAction($request, $controller, $action)
    {
        $controllerString = "App\\Controllers\\{$controller}";
        $controllerClass = new $controllerString;
        if (!method_exists($controllerClass, $action)) {
            echo Helper::jsonResponse([
                'message' => "{$controller}@{$action} not found",
                'status' => "failed"
            ]);
            return false;
        }

        $callActionResult = $controllerClass->$action($request);


        if ($callActionResult !== NULL) {
            echo Helper::jsonResponse($callActionResult);
            return true;
        } else {
            echo Helper::jsonResponse([
                'message' => "NULL response from {$controller}@{$action}",
                'status' => "failed"
            ]);
            return false;
        }
    }
}
