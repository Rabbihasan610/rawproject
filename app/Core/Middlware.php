<?php

namespace App\Core;


class Middlware
{
    public static function auth()
    {
        if(!Session::get('user_id')) {
            (new Response())->redirect('/login');

            return false;
        }

        return true;
    }

    public static function guest()
    {
        if(Session::get('user_id')) {
            (new Response())->redirect('/');

            return false;
        }

        return true;
    }
}