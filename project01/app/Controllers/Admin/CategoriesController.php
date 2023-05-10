<?php

namespace App\Controllers\Admin;

use Core\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $this->view('admin/categories/index');
    }

    public function add()
    {

    }
}
