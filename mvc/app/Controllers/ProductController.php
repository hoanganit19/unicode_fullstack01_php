<?php

namespace App\Controllers;

use Core\Route;
use Core\Request;
use Core\Controller;

class ProductController extends Controller
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

    public function index(Request $request)
    {
        //Load model
        //Logic
        //Load View
        echo $request->keyword.'<br/>';
        echo '<pre>';
        print_r($request->category);
        echo '</pre>';
        return 'ProductController Index';
    }

    public function add(Request $request)
    {
        //Request

        //Xử lý

        //Response

        //echo Route::getUrl('products-add');

        $this->view('products/add');
    }

    public function postAdd(Request $request)
    {
        //Xử lý:
        // - Lấy dữ liệu (Request)

        //$request = new Request() => Tạo 1 request mới (Không có dữ liệu)
        //postAdd(Request $request) => Lấy request hiện tại

        if ($request->email) {
            echo $request->email.'<br/>';
        }

        // $request->abc = '123';
        // echo $request->abc;

        // $request = new Request();
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';

        // - Tương tác với Database
        // - Redirect về get (Response)
        return 'Submit';
    }

    public function edit($id, Request $request, $slug)
    {
        echo $request->keyword;
        $this->view('products/edit', compact('id'));
    }

    public function postEdit($id)
    {
        return $id;
    }
}
