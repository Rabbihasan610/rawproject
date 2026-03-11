<?php 


if(!function_exists('csrf_token')) {
    function csrf_token() {
        return \App\Core\CSRF::token();
    }
}