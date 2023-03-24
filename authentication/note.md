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

# Xây dựng chức năng kích hoạt tài khoản

- Khi đăng ký => Update status =  0 (Chưa kích hoạt)
- Tạo token (md5(uniqid())) => Update vào trường active_token
- Gửi email kích hoạt
+ Lời chào
+ Link: tenmien/active.php?token=$token

- Xử lý file active.php
+ Lấy token từ url
+ So sánh với Database
+ Nếu khớp => Update status = 1, active_token = null => Tự động đăng nhập, gửi email chúc mừng
+ Nếu không khớp => Trả về thông báo

# Xây dựng chức năng quên mật khẩu

- Tạo form quên mật khẩu: Email
- Submit Form => Check email với database
- Nếu không tồn tại => thông báo lỗi
- Nếu tồn tại => 
+ Tạo token
+ Update vào trường reset_token
+ Gửi email kèm link: tenmien/reset.php?token=$token

- Xử lý file reset.php
+ Lấy token từ url
+ So sánh với database
+ nếu khớp => hiển form đặt lại mật khẩu: mật khẩu mới, nhập lại mật khẩu mới

- Xử lý form đặt lại mật khẩu
+ Validate
+ Update mật khẩu: password_hash
+ Xóa reset_token
+ Gửi email bạn đã đổi mật khẩu thành công