# Import File php

- Import toàn bộ nội dung file
- Toàn quyền sử dụng các tài nguyên trong file: biến, hằng và hàm

- include, include_once

* include: Nếu import lỗi => Chương trình vẫn hoạt động
* include_once: Chỉ import 1 file

- require, require_once

* require: Nếu import => Chương trình sẽ dừng
* require_once: Chỉ import 1 file

=> Khuyên dùng: require_once

Có 1 số tình huống cần import nhiều file giống nhau => dùng require

4 lệnh trên có thể viết dưới dạng hàm

require(), require_once(), include(), include_once()
