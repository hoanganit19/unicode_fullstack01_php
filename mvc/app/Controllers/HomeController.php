<?php

namespace App\Controllers;

use Core\View;
use Core\Session;
use Core\Controller;

class HomeController extends Controller
{
    //private $data = [];



    //Action
    public function index()
    {

        $title = 'Unicode Academy';
        $users = [
            'User 1',
            'User 2',
            'User 3'
        ];

        $products = [
            'Product 1',
            'Product 2',
            'Product 3'
        ];

        $content = '<b>Khóa fullstack</b>';

        // $this->view(
        //     'home/index',
        // compact(
        //     'title',
        //     'users',
        //     'content',
        //     'products'
        // )
        // );
        View::render('home/index', compact(
            'title',
            'users',
            'content',
            'products',
        ));
    }

    public function report()
    {
        return 'HomeController Report';
    }
}
