<?php

namespace App\Controllers\Backend;

use App\Core\BaseController;
use App\Core\Session;

class DashboardController extends BaseController
{
    public function index()
    {
        return $this->adminView('admin.dashboard', [
            'title' => 'Dashboard',
            'user_id' => Session::get('user_id')
        ]);
    }
}