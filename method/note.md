Phương thức GET

- Dùng để lấy dữ liệu
- Truy vấn thông qua query string: http://domain/?id=12345678&q=123
- Trong PHP sử dụng `$_GET` lấy các thông tin từ query string

Ứng dụng của GET

- Dùng để đọc dữ liệu từ server (server phải xử lý)
- Sử dụng để thiết kế cấu trúc Module cho dự án

Content-Type:

- application/json
- application/x-www-form-urlencode
- multipart/fom-data => Gửi file từ client lên server (Mặc định của http request)
