<?php

class App
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $urlSegments = $this->router->parseUrl(); // Ambil segmen URL

        error_log("Received request: $method " . implode('/', $urlSegments)); // Log rute yang diterima

        $handler = $this->router->resolve($method, $urlSegments);

        if ($handler) {
            if (is_callable($handler)) {
                call_user_func($handler);
            } else {
                list($controllerName, $action) = $handler;
                if (class_exists($controllerName) && method_exists($controllerName, $action)) {
                    $controllerInstance = new $controllerName();
                    $controllerInstance->$action();
                } else {
                    http_response_code(500);
                    echo "Controller or action not found.";
                }
            }
        } else {
            error_log("404 Not Found: $method " . implode('/', $urlSegments));
            http_response_code(404);
            // echo "404 Not Found cok";
            require_once __DIR__ . ('/../resources/views/errors/404.php');
            exit;
        }
    }
}