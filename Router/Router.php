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

    // Method to handle route addition (for GET and POST)
    private function addRoute($method, $uri, $action)
    {
        // Clean the URI
        $uri = trim($uri, '/');

        // Check for duplicate routes
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
        
        foreach ($this->routes as $route) {
            // Match dynamic URL segments like {id} in the route URI
            $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9_]+)', $route['uri']);
            
            // Check if the current URI matches the route pattern and method
            if ($this->method === $route['method'] && preg_match("#^{$pattern}$#", $currentUri, $matches)) {
                // Remove the full match
                array_shift($matches); 

                // Extract controller and method
                $controllerClass = $route['action'][0];
                $method = $route['action'][1];

                // Instantiate controller and call the method
                if (class_exists($controllerClass) && method_exists($controllerClass, $method)) {
                    $controller = new $controllerClass();
                    call_user_func_array([$controller, $method], $matches);
                    return;
                } else {
                    $this->handleError(500, "Error: Controller or method not found: {$controllerClass}::{$method}");
                    return;
                }
            }
        }

        // No matching route found
        $this->handleError(404, "Page '{$this->uri}' does not exist.");
    }

    // Method to handle error responses
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
}
