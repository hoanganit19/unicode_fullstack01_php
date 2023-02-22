Database là gì?

- Giống tủ tài liệu được sắp xếp 1 cách khoa học
- Quy trình hoạt động:

PHP (tiền xử lý) => Xử lý dữ liệu (Database) => PHP (Hậu xử lý)

MySQL => Hệ quản trị cơ sở dữ liệu quan hệ

SQL và MySQL

- SQL ngôn ngữ truy vấn CSDL quan hệ
- MySQL => Phần mềm (Phiên bản)

Các thao tác:

- Đăng nhập vào mysql
- Tạo CSDL
- Chọn CSDL
- Tạo bảng
- Thêm dữ liệu vào bảng

Bài tập:

- Tạo CSDL
- Tạo bảng users

* id
* name
* email
* password
* group_id
* status
* created_at
* updated_at

- Tạo bảng groups

* id
* name
* created_at
* updated_at

- Insert dữ liệu vào 2 bảng users, groups

Quan hệ trong Database

- 1 nhiều (Nhiều 1)
- nhiều nhiều
- 1 - 1

categories

- id
- name
- parent_id => Foreign key tới categories(id)

posts

- id
- title
- content

categories_posts

- id
- post_id
- category_id
