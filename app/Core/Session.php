<?php

namespace App\Core;

class Session {
    public static function start() {
        if(session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function set(string $key, $value){
        $_SESSION[$key] = $value;
    }


    public static function get(string $key){
        return $_SESSION[$key] ?? null;
    }

    public static function flash(string $key, $value = null){
        
        if($value !== null) {
           $_SESSION['_flash'][$key] = $value;
           return null;
        }

        $val = $_SESSION['_flash'][$key] ?? null;

        unset($_SESSION['_flash'][$key]);

        return $val;
    }

    public static function forget(string $key){
        unset($_SESSION[$key]);
    }
}