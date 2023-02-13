<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    $errors = []; //mảng lỗi

    //Kiểm tra các lỗi
    if (empty($_POST['email'])) {
        $errors['email']['required'] = 'Vui lòng nhập email';
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email']['email'] = 'Email không đúng định dạng';
        }
    }

    if (empty($_POST['password'])) {
        $errors['password']['required'] = 'Vui lòng nhập mật khẩu';
    } else {
        if (strlen($_POST['password']) < 8) {
            $errors['password']['min'] = 'Mật khẩu phải từ 8 ký tự';
        }
    }
}

/*
Bài tập: Xây dựng Validate form
- Email: bắt buộc phải nhập, định dạng email: https://www.w3schools.com/php/filter_validate_email.asp
- Password: Bắt buộc phải nhập, độ dài >=8 ký tự
*/
?>
<form action="" method="post">
    <div>
        <input type="text" name="email" placeholder="Email..." value="<?php echo $_POST['email'] ?? false; ?>" /> <br />
        <?php
        echo (!empty($errors['email'])) ? '<span style="color: red">'.reset($errors['email']).'</span>' : false;
?>

    </div>
    <div>
        <input type="text" name="password" placeholder="Password..."
            value="<?php echo $_POST['password'] ?? false; ?>" />
        <br />
        <?php
        echo (!empty($errors['password'])) ? '<span style="color: red">'.reset($errors['password']).'</span>' : false;
?>
    </div>
    <button type="submit">Submit</button>
</form>