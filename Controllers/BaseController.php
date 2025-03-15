<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class BaseController
{
    protected function view(string $view, array $data = [], string $layout = 'layout')
    {
        extract($data);
        ob_start();

        $viewFile = __DIR__ . '/../Views/' . $view . '.php';
        if (!file_exists($viewFile)) {
            http_response_code(404);
            require __DIR__ . '/../Views/errors/404.php';
            return;
        }

        require $viewFile;
        $content = ob_get_clean();

        require __DIR__ . "/../Views/{$layout}.php";
        
    }
    protected function viewAuthentication(string $view, array $data = [], string $layout = 'layout')
    {
        extract($data);
        ob_start();

        $viewFile = __DIR__ . '/../Views/' . $view . '.php';
        if (!file_exists($viewFile)) {
            http_response_code(404);
            require __DIR__ . '/../Views/errors/404.php';
            return;
        }

        require $viewFile;
        
    }

    protected function redirect(string $url)
    {
        header("Location: $url");
        exit;
    }

    protected function requireAuth()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }
}
