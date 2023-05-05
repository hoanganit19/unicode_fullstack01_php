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
