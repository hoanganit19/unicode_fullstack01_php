<?php

use Core\Request;

function request($name = null, $default = null)
{
    $request = new Request();
    $request->setData();
    return !empty($name) ? ($request->{$name} ?? $default) : $request; //instance
    //Dùng để gọi nhanh request
    //Thường sẽ được gọi ở view
    //Quy định:
    //+ Nếu có tham số => Trả về dữ liệu theo tham số
    //+ Nếu không có tham số => Trả về instance của class Request
}
