<?php

namespace App\Core;

class BaseController
{
    protected function view(string $view, array $data = []): void
    {
        View::render($view, $data);
    }


    protected function adminView(string $view, array $data = []): void
    {
        View::adminRender($view, $data);
    }
}