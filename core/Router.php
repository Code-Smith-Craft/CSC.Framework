<?php

namespace app\core;

class Router
{
    public Request $request;

    protected array $routes = [];

    /**
     * @param Request $request
     */
    public function __construct(\app\core\Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
//        echo '<pre>';
//        var_dump($this->routes);
//        echo '</pre>';
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false){
            echo "Not found";
            exit;
        }
//        echo '<pre>';
//        var_dump($callback);
//        echo '</pre>';
        call_user_func($callback);
    }
}