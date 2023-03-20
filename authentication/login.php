<?php
session_start();
require_once 'connect.php';
require_once 'functions.php';

//Kiểm tra trạng thái đăng nhập
if (!empty($_SESSION['userLogin'])) {
    header("Location: home.php"); //redirect
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = first("SELECT * FROM users WHERE email=?", [$email]);
    if (!empty($user)) {
        $passwordHash = $user['password'];
        if (password_verify($password, $passwordHash)) {
            $_SESSION['userLogin'] = $user;
            header("Location: login.php"); //redirect
            exit;
        } else {
            $msg = 'Email hoặc mật khẩu không chính xác';
        }
    } else {
        $msg = 'Email hoặc mật khẩu không chính xác';
    }
}

echo $msg ?? '';
?>
<form action="" method="post">
    <div>
        <label for="">Email</label>
        <input type="email" name="email" placeholder="Email..." required />
    </div>
    <div>
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Password..." required />
    </div>
    <button type="submit">Login</button>
</form>