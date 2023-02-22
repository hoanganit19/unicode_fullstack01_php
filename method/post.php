<?php
session_start();
require_once 'functions.php';
$token = md5(uniqid());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_SESSION['csrf_token']) && !empty($_POST['_token']) && $_SESSION['csrf_token'] == $_POST['_token'])
    {
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
    
        setSession('errors', $errors);
        setSession('msg', 'Vui lòng kiểm tra thông tin');
        setSession('old', $_POST);
        reload();
    }else{
        die('Token miss');
    }
   
}

$_SESSION['csrf_token'] = $token;

$errors = getFlashData('errors');
$msg = getFlashData('msg');
$old = getFlashData('old');
/*
Bài tập: Xây dựng Validate form
- Email: bắt buộc phải nhập, định dạng email: https://www.w3schools.com/php/filter_validate_email.asp
- Password: Bắt buộc phải nhập, độ dài >=8 ký tự
*/
?>
<form action="" method="post">
    <?php echo !empty($msg) ? $msg : false; ?>
    <div>
        <input type="text" name="email" placeholder="Email..." value="<?php echo $old['email'] ?? false; ?>" /> <br />
        <?php
        echo (!empty($errors['email'])) ? '<span style="color: red">'.reset($errors['email']).'</span>' : false;
?>

    </div>
    <div>
        <input type="text" name="password" placeholder="Password..." value="<?php echo $old['password'] ?? false; ?>" />
        <br />
        <?php
        echo (!empty($errors['password'])) ? '<span style="color: red">'.reset($errors['password']).'</span>' : false;
?>
    </div>
    <button type="submit">Submit</button>
    <input type="hidden" name="_token" value="<?php echo $token; ?>" />
</form>