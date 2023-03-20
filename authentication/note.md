Khi insert user vào database => Mã hóa password (md5, sha1)

Khi user login => check email và password đã mã hóa với database

Nhược điểm

- Dễ bị dịch ngược lại mật khẩu (Nếu đặt các mật khẩu phổ biến: 123456, password, matkhau, admin...)

- Dễ bị reset password khi sử dụng database (Bị lộ csdl)

Giải pháp mới: Hàm băm (Hash)

password_hash($password, PASSWORD_DEFAULT)

Kiểm tra password: password_verify($password, $hash)

# Quy trình xây dựng chức năng đăng nhập

- Thiết kế form: email và password

- Validation

- Truy vấn lấy passwordHash trong Database thông qua email

* Email không tồn tại => Thông báo đăng nhập thất bại
* Email tồn tại => Chuyển xuống bước dưới

- Dùng password_verify để check

* true => Đăng nhập thành công => Gán session: full user
* false => Thông báo đăng nhập thất bại

Lưu ý: nếu thông báo cụ thể => dễ bị tấn công qua hình thức: brute force attack

# Xây dựng chức năng đăng ký

- Tạo form: Password và Confirm Password
- Validation Form: Unique email, Confirm Password
- Lấy thông tin của form: name, email, password: Tạo hash
- Insert vào Database
- set session tự động login
