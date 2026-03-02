<?php
namespace App\Core;

class Request {
    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

    public static function uriPath(): string
    {
        $uri  = $_SERVER['REQUEST_URI'] ?? '/';
        $path = parse_url($uri, PHP_URL_PATH) ?? '/';

        $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
        $basePath   = str_replace('\\', '/', dirname($scriptName));

        if ($basePath !== '/' && str_starts_with($path, $basePath)) {
            $path = substr($path, strlen($basePath));
        }

        $path = '/' . trim($path, '/');

        return $path === '/' ? '/' : rtrim($path, '/');
    }


    public function input(string $key, $default = null)
    {
        return $_POST[$key] ?? $default;
    }

    public function all(): array 
    {
        return array_merge($_GET, $_POST);
    }
}