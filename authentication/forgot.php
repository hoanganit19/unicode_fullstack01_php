<?php
require_once 'mail.php';
require_once 'connect.php';
require_once 'functions.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $user = first('SELECT * FROM users WHERE email=?', [$email]);
    if (!empty($user)){
        $token = md5(uniqid());

        update('users', [
            'reset_token' => $token,
            'updated_at' => date('Y-m-d H:i:s'),
        ], 'id='.$user['id']);

        $linkReset = _APP_URL.'/reset.php?token='.$token;

        $subject = 'Đặt lại mật tại Unicode Academy';
        $content = 'Vui lòng click vào link để đặt lại mật khẩu: <br/>';
        $content.=$linkReset;

        sendMail($email, $subject, $content);

        $msg = 'Vui lòng kiểm tra email để đặt lại mật khẩu';
    }else{
        $msg = 'Email không tồn tại trong hệ thống';   
    }
}

echo $msg ?? '';
?>
<form action="" method="post">
    <div>
        <label for="">Email</label>
        <input type="email" name="email" placeholder="Email..." required/>
    </div>
    <button type="submit">Submit</button>
</form>