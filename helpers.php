<?php 

if(!function_exists('view')) {
    function view($view, $data = []) {
        extract($data);
        require "html/$view.php";
    }
}