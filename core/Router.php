<?php

namespace app\core;

class Router
{
    protected array $routes = [];
    public function get($path, $callback)
    {
        $this->routes[$path] = $callback;
    }

    public function resolve()
    {

    }
}