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
        $this->post("$name", [$controller, 'store'])->name("$name.store");
        $this->get("$name/{id}", [$controller, 'show'])->name("$name.show");
        $this->get("$name/{id}/edit", [$controller, 'edit'])->name("$name.edit");
        $this->put("$name/{id}", [$controller, 'update'])->name("$name.update");
        $this->delete("$name/{id}", [$controller, 'destroy'])->name("$name.destroy");
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
            Controller::setRouter($this);

            if (is_callable($handler)) {
                call_user_func($handler);
            } elseif (is_array($handler)) {
                [$controllerClass, $method] = $handler;
                $controller = new $controllerClass();
                $controller->$method();
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
        if (isset($this->routes[$method][$path])) {
            $handler = $this->routes[$method][$path]['handler'];

            if (is_array($handler) && class_exists($handler[0]) && method_exists($handler[0], $handler[1])) {
                return $handler;
            }

            if (is_callable($handler)) {
                return $handler;
            }

            throw new Exception("Handler for route '{$path}' is invalid.");
        }

        return null;
    }
}
