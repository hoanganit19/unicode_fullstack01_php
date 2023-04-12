# Rewrite URL

## Rewrite URL là gì?

- Viết lại đường dẫn của website => Ánh xạ tới đường dẫn thật ở trên server
- Đường dẫn viết lại => Đường dẫn ảo => Đường dẫn tĩnh: san-pham/san-pham-1.html
- Đường dẫn thật => Đường dẫn động: products.php?id=1

## Rewrite URL để làm gì?

- Cho đẹp, dễ nhớ
- Thân thiện với bộ máy tìm kiếm (SEO)
- Bảo mật (Giấu được file và folder thật trên server)

## Rewrite URL như thế nào?

- Rewrite URL được thực hiện trên server, không liên quan tới ngôn ngữ lập trình
- Thông các cú pháp của WebServer tương ứng
- Việc Rewrite URL bắt buộc phải dùng Regex
- Các Web Server phổ biến:

* Apache => Viết trong file .htaccess (Đặt ở thư mục cần rewrite)
* Nginx => Viết trong file config của domain (Virtual Host)
* IIS => Viết trong file web.config (Đặt ở thư mục cần rewrite)
* Litespeed => Giống apache

## Quy trình Rewrite Htaccess

- Enable mod_rewrite
- Enable `RewriteEngine On`
