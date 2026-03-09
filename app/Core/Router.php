<?php
namespace App\Core;

class Router {
    private array $routes = [];

    public  function get(string $path, $handler, array $cm = []): void
    {
    
       $this->add('GET', $path, $handler, $cm);
    }

    public function post(string $path, callable $handler): void
    {
        $this->add('POST', $path, $handler);
    }


    private function add(string $method, string $path, $handler, array $cm = []): void
    {
        $path = '/' . trim($path, '/');

        $path = $path === '/' ? '/' : rtrim($path, '/');

        $this->routes[$method][$path] = [
            'handler' => $handler,
            'cm'      => $cm,
        ];
    }


    public function dispatch(Request $request, Response $response): void
    {
        $path = $request->uriPath();
        $method = $request->method();

        if (isset($this->routes[$method][$path])) {
            $this->run($this->routes[$method][$path], []);
            return;
        }


        // user/{id}

        foreach(($this->routes[$method] ?? []) as $route => $info) {
            $pattern = preg_replace('#\{([\w]+)\}#', '([^/]+)', $route);

            $pattern = '#^' . $pattern . '$#';

            if(preg_match($pattern, $path, $matches)) {
                array_shift($matches);
                $this->run($info, $matches);
                return;
            }
        }



        http_response_code(404);

        echo '404 Not Found';

    }

    // user/{id} => user/(\d+)


     private function run(array $info, array $params)
    {
        $handler = $info['handler'];
        $cm      = $info['cm'] ?? [];

        if (is_callable($handler)) {
            call_user_func_array($handler, $params);
            return;
        }

        if (is_array($handler) && count($handler) === 2) {
            [$class, $method] = $handler;
            $controller = new $class($cm); 
            call_user_func_array([$controller, $method], $params);
            return;
        }

        throw new \Exception("Invalid route handler");
    }
}