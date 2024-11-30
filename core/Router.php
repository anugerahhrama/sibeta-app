<?php

class Router
{
    private $routes = [];

    public function __construct()
    {
        // Di sini Anda bisa memanggil parseUrl jika diperlukan
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', trim($_GET['url'], '/'));
        }
        return [];
    }

    public function get($path, $handler)
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post($path, $handler)
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function resolve($method, $urlSegments)
    {
        $path = implode('/', $urlSegments);
        // Jika path kosong, arahkan ke rute default
        if (empty($path)) {
            $path = ''; // Menunjukkan rute default
        }

        if (isset($this->routes[$method][$path])) {
            return $this->routes[$method][$path];
        }
        return false;
    }
}
