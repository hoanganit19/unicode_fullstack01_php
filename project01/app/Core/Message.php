<?php

namespace App\Core;

class Message
{
    public static $pageTitle = [
        'auth' => [
            'login' => 'Đăng nhập hệ thống',
            'password' => 'Đặt lại mật khẩu'
        ],
        'users' => [
            'profile' => 'Tài khoản',
            'password' => 'Đổi mật khẩu',
            'lists' => 'Danh sách người dùng',
            'add' => 'Thêm người dùng',
            'edit' => 'Cập nhật người dùng'
        ],
        'pages' => [
            'lists' => 'Danh sách trang',
            'add' => 'Thêm trang',
            'edit' => 'Cập nhật trang'
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
        ],
        'users' => [
           'validate' => [
                'required' => ':attribute bắt buộc phải nhập',
                'email' => ':attribute không đúng định dạng',
                'min' => ':attribute phải từ :min ký tự',
                'unique' => ':attribute đã có người sử dụng',
                'same' => ':attribute không khớp với :same',
                'password.correct' => 'Mật khẩu cũ không khớp'
           ],
           'attributes' => [
                'email' => 'Email',
                'name' => 'Tên',
                'old_password' => 'Mật khẩu cũ',
                'password' => 'Mật khẩu mới',
                'confirm_password' => 'Nhập lại mật khẩu mới'
            ],
        ],

        'pages' => [
            'validate' => [
                 'required' => ':attribute bắt buộc phải nhập',
                 'unique' => ':attribute đã có người sử dụng',
            ],
            'attributes' => [
                 'title' => 'Tiêu đề',
                 'slug' => 'Slug',
                 'content' => 'Nội dung',

             ],
         ],
    ];
}
