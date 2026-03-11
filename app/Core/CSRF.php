<?php

namespace App\Core;

class CSRF
{
    public static function token()
    {
        $token = Session::get('_csrf');

        if(!$token) {
            $token = bin2hex(random_bytes(32));
            Session::set('_csrf', $token);
        }

        return $token;
    }

    public static function check(?string $token)
    {
        return $token && hash_equals((string) Session::get('_csrf'), $token);
    }
}