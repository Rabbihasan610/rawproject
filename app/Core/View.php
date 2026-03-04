<?php

namespace App\Core;

class View
{
    public static function render(string $view, array $data = []): void
    {
        $viewPath = __DIR__ . '/../../Views/' . str_replace('.', '/', $view) . '.php';


        if(!file_exists($viewPath)) {
            http_response_code(500);
            echo '500 Internal Server Error' . htmlspecialchars($viewPath) . 'does not exist';
            return;
        }


        extract($data);
        ob_start();

        require $viewPath;

        $content = ob_get_clean();

        $layout = __DIR__ . '/../../Views/layouts/master.php';

        require $layout;
    }
}