<?php
session_start();
if (empty($_SESSION['userLogin'])) {
    header("Location: login.php"); //redirect
    exit;
}
?>
<h1>HOME</h1>
<p>Xin chào: <?php echo $_SESSION['userLogin']['name']; ?> - <a href="logout.php">Đăng xuất</a></p>