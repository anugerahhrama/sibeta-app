<?php

use App\Controllers\Controller;

class Router
{
    private array $routes = [];
    private array $namedRoutes = [];

    public function parseUrl(): array
    {
        return isset($_GET['url']) ? explode('/', trim($_GET['url'], '/')) : [];
    }

    public function get(string $path, $handler): self
    {
        return $this->addRoute('GET', $path, $handler);
    }

    public function post(string $path, $handler): self
    {
        return $this->addRoute('POST', $path, $handler);
    }

    public function put(string $path, $handler): self
    {
        return $this->addRoute('PUT', $path, $handler);
    }

    public function delete(string $path, $handler): self
    {
        return $this->addRoute('DELETE', $path, $handler);
    }

    public function resource(string $name, string $controller): void
    {
        $this->get("$name", [$controller, 'index'])->name("$name.index");
        $this->get("$name/create", [$controller, 'create'])->name("$name.create");
        $this->post("$name/store", [$controller, 'store'])->name("$name.store");
        $this->get("$name/{id}", [$controller, 'show'])->name("$name.show");
        $this->get("$name/{id}/edit", [$controller, 'edit'])->name("$name.edit");
        $this->post("$name/update/{id}", [$controller, 'update'])->name("$name.update");
        $this->post("$name/delete/{id}", [$controller, 'destroy'])->name("$name.destroy");
    }

    public function name(string $name): self
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if (empty($this->routes[$method])) {
            throw new Exception("No routes defined for method '{$method}'.");
        }

        $lastRoute = array_key_last($this->routes[$method]);

        if ($lastRoute === null) {
            throw new Exception("Cannot name route, no routes defined yet for '{$method}'.");
        }

        $this->namedRoutes[$name] = $this->routes[$method][$lastRoute]['path'];

        return $this;
    }

    public function getRouteByName(string $name): ?string
    {
        return $this->namedRoutes[$name] ?? null;
    }

    public function route(string $name, array $params = []): string
    {
        $path = $this->getRouteByName($name);

        if (!$path) {
            throw new Exception("Route name '{$name}' not found.");
        }

        foreach ($params as $key => $value) {
            $path = str_replace("{{$key}}", $value, $path);
        }

        return rtrim(BASE_URL, '/') . '/' . ltrim($path, '/');
    }

    public function dispatch(): void
    {
        $urlSegments = $this->parseUrl();
        $method = $_SERVER['REQUEST_METHOD'];
        $path = implode('/', $urlSegments);

        error_log("Dispatching: {$method} {$path}");

        $handler = $this->resolve($method, $path);

        if ($handler) {
            // Inject router instance globally

            list($handlerFunction, $params) = $handler; // Ambil handler dan params

            if (is_callable($handlerFunction)) {
                call_user_func($handlerFunction, $params); // Pass params ke callable
            } elseif (is_array($handlerFunction)) {
                [$controllerClass, $method] = $handlerFunction;

                if (empty($controllerClass) || empty($method)) {
                    throw new Exception("Handler class or method cannot be empty.");
                }

                if (!class_exists($controllerClass)) {
                    throw new Exception("Handler class '{$controllerClass}' not found.");
                }

                $controller = new $controllerClass();

                if (!method_exists($controller, $method)) {
                    throw new Exception("Handler method '{$method}' not found in class '{$controllerClass}'.");
                }

                $controller->$method($params); // Pass params ke metode controller
            }
            return;
        }

        http_response_code(404);
        include __DIR__ . '/../resources/views/errors/404.php';
    }

    private function addRoute(string $method, string $path, $handler): self
    {
        $this->routes[$method][$path] = [
            'path' => $path,
            'handler' => $handler,
        ];
        return $this;
    }

    public function resolve(string $method, string $path)
    {
        foreach ($this->routes[$method] as $routePath => $handler) {
            if ($this->matchRoute($routePath, $path)) {
                $params = $this->extractParams($routePath, $path);
                return [$handler['handler'], $params]; // Mengembalikan handler dan params
            }
        }

        return null;
    }

    private function matchRoute(string $routePath, string $path): bool
    {
        // Mengonversi route ke regex
        $regex = preg_replace('/{(\w+)}/', '([^\/]+)', $routePath); // Menangkap alfanumerik
        $regex = '#^' . str_replace('/', '\/', $regex) . '$#';

        return preg_match($regex, $path) === 1;
    }

    private function extractParams(string $routePath, string $path): array
    {
        $routeParts = explode('/', $routePath);
        $pathParts = explode('/', $path);
        $params = [];

        foreach ($routeParts as $index => $part) {
            if (preg_match('/{(\w+)}/', $part, $matches)) {
                $params[$matches[1]] = $pathParts[$index]; // Menyimpan nilai dinamis
            }
        }

        return $params;
    }
}
