<?php

class Router 
{
    private $uri;
    private $method;
    private $routes = [];

    public function __construct()
    {
        $this->uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function get($uri, $action)
    {
        $this->routes[] = [
            'uri' => trim($uri, '/'),
            'method' => 'GET',
            'action' => $action
        ];
    }

    public function post($uri, $action)
    {
        $this->routes[] = [
            'uri' => trim($uri, '/'),
            'method' => 'POST',
            'action' => $action
        ];
    }

    public function route()
    {
        $currentUri = trim($this->uri, '/');

        foreach ($this->routes as $route) {
            $pattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $route['uri']);
            if ($this->method === $route['method'] && preg_match("#^{$pattern}$#", $currentUri, $matches)) {
                array_shift($matches); // Remove full match
                $controllerClass = $route['action'][0];
                $method = $route['action'][1];

                // Instantiate and call controller action
                if (class_exists($controllerClass) && method_exists($controllerClass, $method)) {
                    $controller = new $controllerClass();
                    call_user_func_array([$controller, $method], $matches);
                    return;
                } else {
                    http_response_code(500);
                    echo "Controller or method not found: {$controllerClass}::{$method}";
                    return;
                }
            }
        }

        // If no route matched
        http_response_code(404);
        echo "<h3 style='color:red;'>404 Not Found</h3><p>Page '{$this->uri}' does not exist.</p>";
    }

    public function printRoutes()
    {
        echo "<h3>Registered Routes:</h3>";
        foreach ($this->routes as $route) {
            $controller = $route['action'][0];
            $method = $route['action'][1];
            echo "URI: <strong>/{$route['uri']}</strong> | Method: <strong>{$route['method']}</strong> | Action: <strong>{$controller}::{$method}</strong><br>";
        }
    }
}
