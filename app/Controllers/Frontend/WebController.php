<?php

namespace App\Controllers\Frontend;

use App\Core\BaseController;

class WebController extends BaseController
{
    public function index()
    {
        return $this->view('frontend.home');
    }
}