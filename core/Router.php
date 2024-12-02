<?php

class Router
{
    private array $routes = [];
    private array $namedRoutes = [];

    public function parseUrl(): array
    {
        if (isset($_GET['url'])) {
            return explode('/', trim($_GET['url'], '/'));
        }
        return [];
    }

    public function get(string $path, $handler): self
    {
        $this->routes['GET'][$path] = $handler;
        return $this; // Enable method chaining
    }

    public function post(string $path, $handler): self
    {
        $this->routes['POST'][$path] = $handler;
        return $this; // Enable method chaining
    }

    public function name(string $name)
    {
        // Pastikan method terakhir adalah GET atau POST
        $method = $_SERVER['REQUEST_METHOD'];

        if (!isset($this->routes[$method])) {
            throw new Exception("No routes defined for method '{$method}'.");
        }

        $lastRoute = array_key_last($this->routes[$method]);

        if (!$lastRoute) {
            throw new Exception("Cannot name route, no routes defined yet for '{$method}'.");
        }

        $this->namedRoutes[$name] = $lastRoute; // Simpan nama rute
        return $this; // Chainable
    }

    public function getRouteByName(string $name): ?string
    {
        return $this->namedRoutes[$name] ?? null;
    }

    public function dispatch(): void
    {
        $urlSegments = $this->parseUrl();
        $method = $_SERVER['REQUEST_METHOD'];

        $route = $this->resolve($method, $urlSegments);

        if ($route) {
            if (is_callable($route)) {
                call_user_func($route);
            } elseif (is_array($route)) {
                [$controller, $method] = $route;
                (new $controller)->$method();
            }
            return;
        }

        http_response_code(404); // Set 404 status
        include __DIR__ . '/../views/errors/404.php'; // Display 404 page
    }

    public function route(string $name, array $params = []): string
    {
        $path = $this->getRouteByName($name);

        if (!$path) {
            throw new Exception("Route name '{$name}' not found.");
        }

        // Ganti placeholder parameter (jika ada)
        foreach ($params as $key => $value) {
            $path = str_replace("{{$key}}", $value, $path);
        }

        return rtrim(BASE_URL, '/') . '/' . ltrim($path, '/');
    }


    public function resolve($method, $urlSegments)
    {
        $path = implode('/', $urlSegments);
        if (empty($path)) {
            $path = ''; // Menunjukkan rute default
        }

        if (isset($this->routes[$method][$path])) {
            $handler = $this->routes[$method][$path];

            // Jika handler adalah array (misal: [ClassName::class, 'method']), pastikan callable
            if (is_array($handler) && class_exists($handler[0]) && method_exists($handler[0], $handler[1])) {
                return function () use ($handler) {
                    $controller = new $handler[0](); // Buat instance controller
                    return call_user_func([$controller, $handler[1]]); // Panggil metode
                };
            }

            // Jika handler adalah callable, kembalikan langsung
            if (is_callable($handler)) {
                return $handler;
            }

            // Jika handler tidak valid, lemparkan error
            throw new Exception("Handler untuk rute '$path' tidak valid.");
        }

        return null; // Rute tidak ditemukan
    }
}
