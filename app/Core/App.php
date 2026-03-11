<?php
namespace App\Core;

use App\Core\Router;

class App {
    private static Router $router;
    private static Request $request;
    private static Response $response;

    public static function boot(string $basePath): void
    {
        Env::load($basePath . '/.env');

        Session::start();

        self::$router = new Router();
        self::$request = new Request();
        self::$response = new Response();
    }

    public static function router(): Router
    {
        return self::$router;
    }

    public static function request(): Request
    {
        return self::$request;
    }

    public static function response(): Response
    {
        return self::$response;
    }

    // App::router();
    
}