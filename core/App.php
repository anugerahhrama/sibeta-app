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

        $handler = $this->router->resolve($method, implode('/', $urlSegments));

        if ($handler) {
            list($handlerFunction, $params) = $handler; // Ambil handler dan params

            if (is_callable($handlerFunction)) {
                call_user_func($handlerFunction, $params); // Pass params ke callable
            } elseif (is_array($handlerFunction)) {
                [$controllerName, $action] = $handlerFunction;

                if (class_exists($controllerName) && method_exists($controllerName, $action)) {
                    $controllerInstance = new $controllerName();
                    $controllerInstance->$action($params); // Pass params ke metode controller
                } else {
                    http_response_code(500);
                    echo "Controller or action not found.";
                }
            }
        } else {
            error_log("404 Not Found: $method " . implode('/', $urlSegments));
            http_response_code(404);
            require_once __DIR__ . '/../resources/views/errors/404.php'; // Ini adalah output
            exit;
        }
    }
}
