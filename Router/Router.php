<?php

class Router
{
    private $uri;
    private $method;
    private $routes = [];

    public function __construct()
    {
        // Get the request URI and method
        $this->uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    // Define GET routes
    public function get($uri, $action)
    {
        $this->addRoute('GET', $uri, $action);
    }

    // Define POST routes
    public function post($uri, $action)
    {
        $this->addRoute('POST', $uri, $action);
    }

    // Define PUT routes
    public function put($uri, $action)
    {
        $this->addRoute('PUT', $uri, $action);
    }

    // Define DELETE routes
    public function delete($uri, $action)
    {
        $this->addRoute('DELETE', $uri, $action);
    }

    // Add a new route
    private function addRoute($method, $uri, $action)
    {
        $uri = trim($uri, '/');

        // Prevent empty route registration (set as root '/')
        if ($uri === '') {
            $uri = '/';
        }

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                throw new Exception("Route for '{$method} {$uri}' already exists.");
            }
        }

        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'action' => $action
        ];
    }

    // Route matching and dispatching
    public function route()
    {
        $currentUri = trim($this->uri, '/');
        $requestMethod = $this->method;

        // Support for PUT and DELETE via POST override
        if ($requestMethod === 'POST') {
            if (!empty($_POST['_method'])) {
                $overrideMethod = strtoupper($_POST['_method']);
                if (in_array($overrideMethod, ['PUT', 'DELETE'])) {
                    $requestMethod = $overrideMethod;
                }
            }
        }

        foreach ($this->routes as $route) {
            $routeUri = trim($route['uri'], '/');

            // Match dynamic URL segments like {id}
            $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9_]+)', $routeUri);

            if ($requestMethod === $route['method'] && preg_match("#^{$pattern}$#", $currentUri, $matches)) {
                array_shift($matches); // Remove full match

                $controllerClass = $route['action'][0];
                $method = $route['action'][1];

                if (class_exists($controllerClass) && method_exists($controllerClass, $method)) {
                    $controller = new $controllerClass();
                    call_user_func_array([$controller, $method], array_values($matches));
                    return;
                } else {
                    $this->handleError(500, "Error: Controller or method not found: {$controllerClass}::{$method}");
                    return;
                }
            }
        }

        $this->handleError(404, "Page '{$this->uri}' does not exist.");
    }

    // Error handling
    private function handleError($statusCode, $message)
    {
        http_response_code($statusCode);
        echo "<h3 style='color:red;'>{$statusCode} Error</h3><p>{$message}</p>";
    }

    // Debugging: Print all registered routes
    public function printRoutes()
    {
        echo "<h3>Registered Routes:</h3>";
        foreach ($this->routes as $route) {
            $controller = $route['action'][0];
            $method = $route['action'][1];
            echo "URI: <strong>/{$route['uri']}</strong> | Method: <strong>{$route['method']}</strong> | Action: <strong>{$controller}::{$method}</strong><br>";
        }
    }

    // Match multiple HTTP methods
    public function match(array $methods, $uri, $action)
{
    foreach ($methods as $method) {
        if (!in_array(strtoupper($method), ['GET', 'POST', 'PUT', 'DELETE'])) {
            throw new Exception("Invalid HTTP method: $method");
        }
        $this->addRoute(strtoupper($method), $uri, $action); // Ensure method is uppercase
    }
}


    // Define a group of routes
    public function group($prefix, $callback)
    {
        $originalUri = $this->uri;
        $prefix = trim($prefix, '/');
        
        // Apply prefix only if it's not empty
        if ($prefix !== '') {
            $this->uri = rtrim($this->uri . '/' . $prefix, '/');
        }

        call_user_func($callback, $this);

        $this->uri = $originalUri; // Restore original URI after group execution
    }

    public function loadView($view)
    {
        require_once "views/$view.php";
    }
}
