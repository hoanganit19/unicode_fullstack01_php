<?php

namespace App\Core;

class Message
{
    public static $pageTitle = [
        'auth' => [
            'login' => 'Đăng nhập hệ thống',
            'password' => 'Đặt lại mật khẩu'
        ]
    ];

    public static $messages = [
        'auth' => [
            'validate' => [
                'required' => ':attribute bắt buộc phải nhập',
                'email' => ':attribute không đúng định dạng'
            ],
            'attributes' => [
                'email' => 'Email',
                'password' => 'Mật khẩu'
            ],
            'login.failed' => 'Email hoặc mật khẩu không chính xác'
        ]
    ];
}
