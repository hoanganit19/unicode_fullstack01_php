<?php

require_once '../database/connect.php';
require_once '../database/functions.php';
if (!empty($_GET['district'])) {
    $districtId = $_GET['district'];

    $ward = get('SELECT * FROM ward WHERE _district_id  = ?', [$districtId]);

    if (!empty($ward)) {
        $response = [
            'status' => 'success',
            'data' => $ward
        ];
    } else {
        $response = [
            'status' => 'error'
        ];
    }

    echo json_encode($response);
}


//DB::table('users')->select('id', 'name')->where('id', 1)->get()
//DB::select();

//User::where('id', 1)->get()
//User::all();
//Eloquent Relationship

/*
function index(Request $request)
*/
