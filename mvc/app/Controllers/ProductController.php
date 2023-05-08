<?php

namespace App\Controllers;

use Core\Route;
use Core\Request;
use Core\Session;
use Core\Validator;
use Core\Controller;
use Core\Databases\DB;
use App\Models\Product;
use App\Models\Attribute;

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
        $productModel = new Product();
        $products = $productModel->getListProduct();
        return json_encode($products);

        //$attributeModel = new Attribute();
        //Logic
        //Load View
        // echo $request->keyword.'<br/>';
        // echo '<pre>';
        // print_r($request->category);
        // echo '</pre>';
        //return 'ProductController Index';
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
        $id = 7;

        $request->validate(
            [
                //tên trường => danh sách rules
                'name' => 'required|min:4|max:15',
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'required|min:6',
                'confirm_password' => 'required|min:6|same:password'
            ],
            [
                //tên rule => Nội dung thông báo
                'required' => ':attribute không được để trống',
                'min' => ':attribute phải từ :min ký tự',
                'max' => ':attribute không được lớn hơn :max ký tự',
                'same' => ':attribute không khớp với :same',
                'email' => ':attribute không đúng định dạng email',
                'unique' => ':attribute đã tồn tại trong hệ thống'
            ],
            [
                'name' => 'Tên',
                'email' => 'Email',
                'password' => 'Mật khẩu',
                'confirm_password' => 'Nhập lại mật khẩu'
            ]
        );
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //     //tên trường => danh sách rules
        //     'name' => 'required|min:4|max:15',
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        //     'confirm_password' => 'required|min:6|same:password'
        // ],
        //     [
        //         //tên rule => Nội dung thông báo
        //         'required' => ':attribute không được để trống',
        //         'min' => ':attribute phải từ :min ký tự',
        //         'max' => ':attribute không được lớn hơn :max ký tự',
        //         'same' => ':attribute không khớp với :same',
        //         'email' => ':attribute không đúng định dạng email'
        //     ],
        //     [
        //         'name' => 'Tên',
        //         'email' => 'Email',
        //         'password' => 'Mật khẩu',
        //         'confirm_password' => 'Nhập lại mật khẩu'
        //     ]
        // );

        // if ($validator->passes()) {
        //     echo 'thành công';
        // } else {
        //     echo 'thất bại';
        //     redirect('/san-pham/them');
        // }


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
