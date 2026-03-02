<?php
namespace App\Core;

class Response {
    public function redirect(string $to): void 
    {
        header("Location: $to");
        exit;
    }
}