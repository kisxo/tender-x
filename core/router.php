<?php

class Router {
    private array $routes = [];

    public function get(string $uri, callable|array $action): void {
        $this->addRoute('GET', $uri, $action);
    }

    public function post(string $uri, callable|array $action): void {
        $this->addRoute('POST', $uri, $action);
    }

    public function patch(string $uri, callable|array $action): void {
        $this->addRoute('PATCH', $uri, $action);
    }

    public function put(string $uri, callable|array $action): void {
        $this->addRoute('PUT', $uri, $action);
    }

    public function delete(string $uri, callable|array $action): void {
        $this->addRoute('DELETE', $uri, $action);
    }

    private function addRoute(string $method, string $uri, callable|array $action): void {
        $this->routes[$method][$uri] = $action;
    }

    public function dispatch(string $uri): void {
        $uri = parse_url($uri, PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $action = $this->routes[$method][$uri] ?? null;

        if (!$action) {
            http_response_code(404);
            echo "404 Not Found: $method $uri";
            return;
        }

        if (is_array($action)) {
            [$controller, $method] = $action;
            (new $controller)->$method();
        } else {
            $action(); // Closure or function
        }
    }
}