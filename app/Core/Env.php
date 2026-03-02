<?php

namespace App\Core;

class Env  {
    public static function load(string $path): void
    {
        if(!file_exists($path)) return;

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach($lines as $line) {
            $line = trim($line);

            if($line === '' || str_starts_with($line, "#")){
                continue;
            }

            // APP_NAME="Raw Project"
            // DB_HOST=127.0.0.1
            // DB_PORT=3306

            [$key, $value] = array_map('trim', explode('=', $line, 2));

            $value = trim($value, "\"'");

            if(!isset($_ENV[$key])) {
                $_ENV[$key] = $value;
                putenv("$key=$value");
            }

        }
    }
}