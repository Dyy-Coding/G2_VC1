<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class BaseController
{
    /**
     * Render a view with optional layout.
     *
     * @param string $view The view name to render.
     * @param array $data Data to be passed to the view.
     * @param string $layout The layout name (default is 'layout').
     */
    protected function renderView(string $view, array $data = [], string $layout = 'layout')
    {
        extract($data);
        ob_start();

        $viewFile = __DIR__ . '/../Views/' . $view . '.php';
        if (!file_exists($viewFile)) {
            $this->handleError(404, 'View not found');
            return;
        }

        require $viewFile;
        $content = ob_get_clean();

        // Check if the view is "forgot-password.php" or "reset-password.php"
        // If so, set the layout to false to skip the header, navbar, and footer
        if ($view === 'forgot-password' || $view === 'reset-password') {
            // Output the content directly without layout
            echo $content;
        } else {
            // Load the layout only if it's not one of the special pages
            if ($layout) {
                $this->loadLayout($layout, $content);
            } else {
                echo $content;
            }
        }
    }

    /**
     * Render an authentication-related view without layout.
     *
     * @param string $view The view name to render.
     * @param array $data Data to be passed to the view.
     */
    protected function renderAuthView(string $view, array $data = [])
    {
        extract($data);
        ob_start();

        $viewFile = __DIR__ . '/../Views/' . $view . '.php';
        if (!file_exists($viewFile)) {
            $this->handleError(404, 'View not found');
            return;
        }

        require $viewFile;
        echo ob_get_clean();
    }

    /**
     * Redirect to a given URL and terminate script.
     *
     * @param string $url The URL to redirect to.
     */
    protected function redirect(string $url)
    {
        header("Location: $url");
        exit;
    }

    /**
     * Ensure that the user is authenticated before proceeding.
     */
    protected function requireAuth()
    {
        if (empty($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }

    /**
     * Handle errors and render appropriate error pages.
     *
     * @param int $errorCode The HTTP error code.
     * @param string $message The error message.
     */
    private function handleError(int $errorCode, string $message)
    {
        // Log the error to a file
        $this->logError($errorCode, $message);

        // Set the HTTP response code
        http_response_code($errorCode);

        // Display a user-friendly message
        if ($errorCode == 404) {
            $userMessage = 'Sorry, the page you are looking for could not be found.';
        } elseif ($errorCode == 500) {
            $userMessage = 'Sorry, something went wrong on our end. Please try again later.';
        } else {
            $userMessage = 'An unexpected error occurred. Please try again.';
        }

        // Display a basic error page with the message
        echo "<h1>Error $errorCode</h1>";
        echo "<p>$userMessage</p>";

        // Optionally render a custom error view if available
        $errorView = __DIR__ . '/../Views/errors/' . $errorCode . '.php';
        if (file_exists($errorView)) {
            require $errorView;
        } else {
            // Fallback to a generic error view
            require __DIR__ . '/../Views/errors/404.php';
        }

        exit();
    }

    /**
     * Log error details to a log file.
     *
     * @param int $errorCode The HTTP error code.
     * @param string $message The error message.
     */
    private function logError(int $errorCode, string $message)
    {
        $logDir = __DIR__ . '/../Logs'; // Define logs directory
        $logFile = $logDir . '/error_log.txt';
    
        // Ensure the Logs directory exists, create it if not
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }
    
        // Prepare the log message
        $date = date('Y-m-d H:i:s');
        $logMessage = "[$date] Error $errorCode: $message" . PHP_EOL;
    
        // Write to the log file
        file_put_contents($logFile, $logMessage, FILE_APPEND);
    }

    /**
     * Load layout with content.
     *
     * @param string $layout The layout file name.
     * @param string $content The content to be inserted into the layout.
     */
    private function loadLayout(string $layout, string $content)
    {
        $layoutFile = __DIR__ . "/../Views/{$layout}.php";
        if (file_exists($layoutFile)) {
            require $layoutFile;
        } else {
            $this->handleError(500, 'Layout not found');
        }
    }
}
?>