<?php

require_once '../database/connect.php';
require_once '../database/functions.php';
if (!empty($_GET['province'])) {
    $provinceId = $_GET['province'];

    $district = get('SELECT * FROM district WHERE _province_id = ?', [$provinceId]);

    if (!empty($district)) {
        $response = [
            'status' => 'success',
            'data' => $district
        ];
    } else {
        $response = [
            'status' => 'error'
        ];
    }

    echo json_encode($response);
}
