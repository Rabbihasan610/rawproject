<?php

namespace App\Controllers\Backend;

use App\Core\BaseController;
use App\Core\Session;
use App\Models\User;

class DashboardController extends BaseController
{
    public function index()
    {
        $user = User::;


        return $this->adminView('admin.dashboard', [
            'title' => 'Dashboard',
            'user' => $user
        ]);
    }
}