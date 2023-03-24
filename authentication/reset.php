<?php
require_once 'mail.php';
require_once 'connect.php';
require_once 'functions.php';
if (!empty($_GET['token'])){
    $token = $_GET['token'];
    $user = first('SELECT * FROM users WHERE reset_token = ?', [$token]);
    if (!empty($user)){

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $password = $_POST['password'];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            update('users', [
                'password' => $hash,
                'reset_token' => null,
                'updated_at' => date('Y-m-d H:i:s')
            ], "id = ".$user['id']);
            echo 'Đặt lại mật khẩu thành công';
        }

        ?>
        <form action="" method="post">
            <div>
                <label for="">Password</label> <br/>
                <input type="password" name="password" placeholder="New Password" required/>
            </div>
            <button type="submit">Confirm</button>
        </form>
        <?php
    }else{
        echo 'Link không tồn tại';
    }
}else{
    echo 'Link không tồn tại';
}