<?php

namespace App\Controllers\Admin;

use Core\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $this->view('admin/dashboard/index');
    }
}
