<?php

//Xử lý server
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user'];
    if ($username == 'hoangan.web') {
        $response = [
            'status' => 'error'
        ];
    } else {
        $response = [
            'status' => 'success'
        ];
    }

    echo json_encode($response);
}

header("Content-Type: application/json");
