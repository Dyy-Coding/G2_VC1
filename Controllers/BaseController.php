<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Assuming you have a user authentication system in place
if (isset($userLoggedIn) && $userLoggedIn) {
    if ($_SESSION["user_id"]) {
        $_SESSION['user_id'] = $user['id']; // Store user ID or other identifying information
        $_SESSION['status'] = 'Online';     // User is logged in, set status to Online
    }
} else {
    // User is not logged in, set status to Offline
    $_SESSION['status'] = 'Offline';
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

        if ($view === 'forgot-password' || $view === 'reset-password') {
            echo $content;
        } else {
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
    protected function renderAuthView(string $view, array $data = []) {
        extract($data);
        ob_start();
    
        $viewFile = __DIR__ . '/../Views/' . $view . '.php';
        if (!file_exists($viewFile)) {
            die("Error: View file not found at $viewFile");
        }
    
        require $viewFile;
        echo ob_get_clean();
    }

    /**
     * Render a customer-specific view with optional layout.
     *
     * @param string $view The customer view name to render.
     * @param array $data Data to be passed to the view.
     * @param string $layout The layout name (default is 'customer_layout').
     */
    protected function renderCustomerView(string $view, array $data = [], string $layout = 'customer_layout')
    {
        extract($data);
        ob_start();

        $viewFile = __DIR__ . '/../Views/customer/' . $view . '.php';
        if (!file_exists($viewFile)) {
            $this->handleError(404, 'Customer view not found');
            return;
        }

        require $viewFile;
        $content = ob_get_clean();

        if ($layout) {
            $this->loadLayout($layout, $content, true);
        } else {
            echo $content;
        }
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
        $this->logError($errorCode, $message);
        http_response_code($errorCode);

        if ($errorCode == 404) {
            $userMessage = 'Sorry, the page you are looking for could not be found.';
        } elseif ($errorCode == 500) {
            $userMessage = 'Sorry, something went wrong on our end. Please try again later.';
        } else {
            $userMessage = 'An unexpected error occurred. Please try again.';
        }

        echo "<h1>Error $errorCode</h1>";
        echo "<p>$userMessage</p>";

        $errorView = __DIR__ . '/../Views/errors/' . $errorCode . '.php';
        if (file_exists($errorView)) {
            require $errorView;
        } else {
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
        $logDir = __DIR__ . '/../Logs';
        $logFile = $logDir . '/error_log.txt';
    
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }
    
        $date = date('Y-m-d H:i:s');
        $logMessage = "[$date] Error $errorCode: $message" . PHP_EOL;
        file_put_contents($logFile, $logMessage, FILE_APPEND);
    }

    /**
     * Load layout with content, excluding navbar and footer for auth pages, with customer-specific option.
     *
     * @param string $layout The layout file name.
     * @param string $content The content to be inserted into the layout.
     * @param bool $isCustomer Whether to use customer-specific layout files (default is false).
     */
    private function loadLayout(string $layout, string $content, bool $isCustomer = false)
    {
        $authPages = ['login.php', 'register.php', 'forgot_password.php', 'reset_password.php'];
        // handle page headerCustomer, navbarCustomer for this page
        $customersPage = ['welcome.php', 'stock.php'];
        $currentPage = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '';
        $currentFile = basename($currentPage);
        $isAuthPage = in_array($currentFile, $authPages);

        $layoutFile = __DIR__ . "/../Views/{$layout}.php";
        if (!file_exists($layoutFile)) {
            $this->handleError(500, 'Layout not found');
            return;
        }

        $headerFile = $isCustomer ? __DIR__ . '/../Views/layouts/headerCustomer.php' : __DIR__ . '/../Views/layouts/header.php';
        require_once $headerFile;

        if (!$isAuthPage) {
            $navbarFile = $isCustomer ? __DIR__ . '/../Views/layouts/navbarCustomer.php' : __DIR__ . '/../Views/layouts/navbar.php';
            require_once $navbarFile;
        }

        echo $content;

        if (!$isAuthPage) {
            require_once __DIR__ . '/../Views/layouts/footer.php';
        }
    }

    public function setFlashMessage($type, $message) {
        $_SESSION['flash'][$type] = $message;
    }

    public function getFlashMessage($type) {
        if (isset($_SESSION['flash'][$type])) {
            $message = $_SESSION['flash'][$type];
            unset($_SESSION['flash'][$type]); // Remove after retrieving
            return $message;
        }
        return null;
    }
}
?>