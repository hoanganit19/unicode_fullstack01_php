<?php

use Core\Route;

use App\Controllers\HomeController;
use App\Controllers\ProductController;

// Route::get('/', function () {
//     return 'HomePage';
// });

// Route::get('/san-pham', function () {
//     return 'Danh sách sản phẩm';
// });

// Route::post('/san-pham', function () {
//     return 'Thêm sản phẩm';
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/bao-cao', [HomeController::class, 'report']);

Route::get('/san-pham', [ProductController::class, 'index']);
Route::get('/san-pham/them', [ProductController::class, 'add']);
Route::get('/san-pham/sua/{id}/{slug}.html', [ProductController::class, 'edit']);

Route::get('/test/{id}', function ($id) {
    echo 'Test - '.$id;
});
