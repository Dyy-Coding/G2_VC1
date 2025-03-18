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
        // Prevent adding empty URIs or duplicate routes
        if (empty($uri)) {
            throw new Exception("URI cannot be empty.");
        }
        $this->addRoute('GET', $uri, $action);
    }

    // Define POST routes
    public function post($uri, $action)
    {
        // Prevent adding empty URIs or duplicate routes
        if (empty($uri)) {
            throw new Exception("URI cannot be empty.");
        }
        $this->addRoute('POST', $uri, $action);
    }
     

    private function addRoute($method, $uri, $action)
{
    // Clean the URI (remove leading/trailing slashes)
    $uri = trim($uri, '/');

    // Check for duplicate routes
    foreach ($this->routes as $route) {
        if ($route['uri'] === $uri && $route['method'] === $method) {
            throw new Exception("Route for '{$method} {$uri}' already exists.");
        }
    }

    // Debugging: Log routes being added
   

    // Add the new route
    $this->routes[] = [
        'uri' => $uri,
        'method' => $method,
        'action' => $action
    ];
}

    // Method to handle route addition (for GET and POST)
    // Route matching and dispatching
    public function route()
    {
        $currentUri = trim($this->uri, '/'); // Clean the current URI

        foreach ($this->routes as $route) {
            $routeUri = trim($route['uri'], '/'); // Clean the route URI

            // Match dynamic URL segments like {id}
            $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9_]+)', $routeUri);

            // Check if the current URI matches the route pattern and method
            if ($this->method === $route['method'] && preg_match("#^{$pattern}$#", $currentUri, $matches)) {
                array_shift($matches); // Remove the full match (we don't need it)

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

    // Define a group of routes
    public function group($prefix, $callback)
    {
        $originalPrefix = $this->uri;
        $this->uri = rtrim($this->uri . '/' . trim($prefix, '/'), '/');

        call_user_func($callback, $this);

        $this->uri = $originalPrefix;
    }
}
