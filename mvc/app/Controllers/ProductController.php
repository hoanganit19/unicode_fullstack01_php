<?php

namespace App\Controllers;

class ProductController
{
    private $products = [];

    /**
     * Class constructor.
     */
    // public function __construct()
    // {
    //     $productModel = TenModel;
    //     $this->products = $productModel->all();
    // }

    public function index()
    {
        //Load model
        //Logic
        //Load View
        return 'ProductController Index';
    }

    public function add()
    {
        return 'ProductController Add';
    }

    public function edit($id=0, $slug='')
    {
        return 'Sửa - '.$id.' - '.$slug;
    }
}
