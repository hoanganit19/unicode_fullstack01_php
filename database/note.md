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

Thực hành: Tạo 1 số table như sau:

Table posts:

- id: int, primary key, auto_increment
- title: varchar(255)
- content: text
- excerpt: text
- status: tinyint(1) default 0;
- created_at: datetime, default current_timestamp
- updated_at: datetime, default current_timestamp

Table categories:

- id: int, primary key, auto_increment
- name: varchar(255)
- created_at: datetime, default current_timestamp
- updated_at: datetime, default current_timestamp

Table categories_posts:

- id: int, primary key, auto_increment
- post_id: int, foreign key posts(id)
- category_id: int, foreign key categories(id);
- created_at: datetime, default current_timestamp

Table comments:

- id: int, primary key, auto_increment
- user_id: int, foreign key users(id)
- subject: varchar(255)
- message: text
- status: tinyint(1) default 0
- post_id: int, foreign key posts(id)
- category_id: int, foreign key categories(id);
- created_at: datetime, default current_timestamp

=> Insert dữ liệu vào tất cả các bảng

Bài tập filters

Table users có các trường

- id
- name
- email
- phone
- status
- created_at
- updated_at

=> Yêu cầu: Viết câu lệnh sql tìm kiếm theo status và keyword (tìm từ khóa ở các trường: name, email, phone)

Ví dụ thực tế của Left Join

- Hiển thị danh sách các bài viết và số lượng comment của từng bài (left join)
- Hiển thị danh sách người dùng (Có tỉnh thành phố của người dùng)

Table users

- id
- name
- email
- provinceId
- districtId
- wardId

Table province

- id
- name

Table district

- id
- name
- provinceId

Table ward

- id
- name
- districtId

HÀM

- SUM()
- COUNT()
- MAX()
- MIN()
- AVG()
- DATE()
- DAY()
- MONTH()
- YEAR()
- NOW()

Group By, Having

Có 2 table

- posts
- comments

=> Liên kết khóa ngoại
=> Nhập liệu
=> Truy vấn hiển thị danh sách các bài viết và thêm 1 cột comment_count

Tạo tables

posts

- id
- title
- created_at
- updated_at

categories

- id
- name
- created_at
- updated_at

posts_categories

- id
- post_id
- category_id
- created_at

Dữ liệu mẫu

Bài viết 1 thuộc 2 chuyện mục

- Thời sự
- Kinh doanh

Bài tập: Xóa tất cả các bài viết thuộc chuyên mục "Thời sự" (id = 1)

Ôn tập

- Truy vấn Select
- Join bảng, sub query
- Tìm hiểu cách sử dụng phần mềm phpmyadmin (Hoặc phần mềm liên quan)
