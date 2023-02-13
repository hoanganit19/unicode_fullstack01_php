<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo '<pre>';
    print_r($_GET);
    echo '</pre>';

    if (!empty($_GET['id'])) {
        //Request (?id=123)
        $id = $_GET['id']; //Trên thực tế => Validate dữ liệu
        echo $id.'<br/>';
        //Truy vấn với Database => Xử lý => Hiển thị ra trình duyệt (Response)
    }
}
