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
