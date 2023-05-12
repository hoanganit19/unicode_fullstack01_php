# MVC

/app => Chứa controllers, models, views => Chứa code của ứng dụng

/core => Lõi của ứng dụng

Hàm thuần => Helpers

@foreach ($users as $user) => <?php foreach ($users as $user): ?>

@endforeach => <?php endforeach; ?>

@if () => <?php if (): ?>

@else => <?php else: ?>

@endif => <?php endif; ?>

@for()
@endfor

@while()

@endwhile

## Master Layout

home/index.php => View

@extends ('layouts/client')

@section('content')

<h1>Nội dung </h1>

@endsection

## Xử lý định danh routes

- Lấy tất cả các Path của config
- Lưu vào 1 mảng

## Helper

- Helper Core => Có sẵn trong bộ core
- Helper App => Hàm tự tạo đi theo dự án

Index => Bootstrap => App => Request, Response => Route

- Abtract class
- Interface

Về nhà

- Viết các phương thức truy vấn Database trong class Model
- Thực hành: Xây dựng CRUD đơn giản (Có thể làm todolist)

Buổi sau:

- Tích hợp Query Builder vào dự án => Thuận tiện hơn trong quá trình truy vấn
- Chữa bài tập CRUD

=> Hướng tới làm project đơn giản

Tình huống: Gọi Database ngoài Model

Connect => DB Driver => DB Business

Bài tập về nhà: Xây dựng CRUD đơn giản (TodoList)

Master Layouts

- Dùng Regex => Lấy đường dẫn tới file master layout

- Lấy nội dung trong file master layout

- Dùng Regex => Lấy nội dung section (Trong view)

- Thay thế yield('name') thành nội dung trong section

Sử dụng Javascript Internal và CSS Internal trong Layout

$( "button.continue" ).html( "Next Step..." )

document.querySelector('button.continue').innerHTML = "Next Step..."

$('.item').each(function(){
    console.log($(this).text())
});

Provider => Route => Middleware => Controller => View

## Dự án blog cá nhân

### Phân tích chức năng

1. Quản trị (Admin)

- Đăng nhập hệ thống: Đăng nhập và quên mật khẩu
- Quản lý người dùng:

* Thêm, sửa, xóa người dùng

- Quản lý chuyên mục

* Thêm, sửa, xóa chuyên mục
* Có đa cấp hay không?
* Nếu có đa cấp => Có giải pháp => Xác định mối quan hệ

- Quản lý bài viết

* Thêm, sửa, xóa bài viết
* Xác định mối quan hệ với chuyên mục: 1-1, 1-n, n-n

- Quản lý trang (Trang tĩnh: Trang không có chuyên mục)

* Thêm, sửa, xóa bài viết

- Thiết lập (Options, Settings)

2. Người dùng (User)

- Trang chủ:

* Slider
* Hiển thị danh sách bài viết mới nhất
* Phân trang: Paginate, Loadmore, Scroll Infinity

- Trang tĩnh: Giới thiệu, điều khoản, liên hệ

- Chuyên mục: Hiển thị danh sách bài viết theo chuyên mục

- Bài viết: Hiển thị chi tiết bài viết

- Tác giả: Hiển thị danh sách bài viết theo tác giả

- Tags: Hiển thị danh sách bài viết theo tag

### Phân tích CSDL

1. Table users

- id

* int
* auto_increment
* primary key

- name

* varchar(100)
* null

- email

* varchar(100)
* null
* index unique

- password

* varchar(100)
* null

- status

* tinyint
* default: 0

- remember_token: Lưu token trong trường xây dựng chức năng ghi nhớ mật khẩu

* varchar(100)
* null

- reset_token: Lưu token trong trường hợp xây dựng chức năng quên mật khẩu

* varchar(100)
* null

- created_at

* timestamp
* null

- updated_at

* timestamp
* null

2. Table categories

- id

* int
* auto_increment
* primary key

- name:

* varchar(200)
* null

- slug (alias)

* varchar(200)
* null
* index unique

- description

* text
* null

- created_at

* timestamp
* null

- updated_at

* timestamp
* null

3. Table posts

- id

* int
* auto_increment
* primary key

- title

* varchar(255)
* null

- slug

* varchar(255)
* null

- content

* text
* null

- category_id

* int
* foreign key categories(id)

- tags

* varchar(255)
* null

- user_id

* int
* foreign key users(id)

- excerpt

* text
* null

- thumbnail

* varchar(150)
* null

- created_at

* timestamp
* null

- updated_at

* timestamp
* null

4. Table pages

- id

* int
* auto_increment
* primary key

- title

* varchar(255)
* null

- slug

* varchar(255)
* null

- content

* text
* null

- created_at

* timestamp
* null

- updated_at

* timestamp
* null

5. Table options

- id

* int
* auto_increment
* primary key

- key

* varchar(200)
* not null

- value

* text
* null

### Ghép giao diện trang quản trị

- Xác định Route: Tiền tố `/admin`

- Tạo Controller => Action

- Tạo Layouts

- Tạo Views

- Tạo assets: css, js, images, fonts,...

Đặc điểm Controller

- Không được hard code: Thông báo, chuỗi cố định
- Không được lưu trữ HTML, trả về html

### Middleware

- Lớp trung gian giữa Route => Controller
- Lọc Request: Cho phép Request từ Route tới Controller hay không?
- 2 loại Middleware:

* Route Middleware: Chỉ áp dụng cho 1 số route nhất định
* Global Middleware: Áp dụng cho tất cả route

Alias Class trong OOP

- Đổi tên 1 class của PHP và vẫn giữ nguyên class gốc
- Import bằng use kết hợp với as
- Dùng qua class_alias

Đăng nhập qua Cookie

- Không an toàn: Vì lưu ở browser
- Không đồng nhất giữa user client và user trên database

Xây dựng chức năng lưu mật khẩu

- Đăng nhập bình thường: Set session
- Nếu check vào Remember
- Tạo token
- Update token vào Database
- Lưu Token vào cookie

Khi kiểm tra đăng nhập

- Session có tồn tại hay không?
- Session không tồn tại:

* Cookie rememberToken có tồn tại hay không? Nếu không => Không làm gì
* Cookie rememberToken tồn tại: Truy vấn tới database với data là rememberToken => trả về dữ liệu => set Session => Login

Lợi ích:

- An toàn: Cookie chỉ lưu token
- Kiểm soát được user có còn tồn tại hay không?
- Tránh được việc connect database nhiều lần
