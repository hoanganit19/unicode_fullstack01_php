<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_FILES['image']['name'])) {
        $count = 0;
        $allowed = [
            'image/jpeg',
            'image/jpg',
            'image/png',

        ];
        foreach ($_FILES['image']['name'] as $key => $name) {
            $nameArr = explode('.', $name);
            $ext = end($nameArr);
            $newFile = md5(uniqid()).'.'.$ext;

            $tmp = $_FILES['image']['tmp_name'][$key];

            $type = $_FILES['image']['type'][$key];

            if (in_array($type, $allowed)) {
                $upload = copy($tmp, './uploads/'.$newFile);

                if ($upload) {
                    $count++;
                }
            }
        }

        if ($count > 0) {
            echo 'Đã upload '.$count.' file';
        }
    }
}
?>
<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="image[]" multiple>
    <button type="submit">Upload</button>
</form>