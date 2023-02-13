<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $tmp = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];

        $nameArr = explode('.', $name);
        $ext = end($nameArr);
        $newFile = md5(uniqid()).'.'.$ext;

        $upload = move_uploaded_file($tmp, './uploads/'.$newFile);

        if ($upload) {
            echo 'Upload Success';
        }
    }
}
?>
<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="image">
    <button type="submit">Upload</button>
</form>