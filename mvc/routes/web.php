<?php

use Core\View;

use Core\Route;
use Core\Databases\DB;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/bao-cao', [HomeController::class, 'report']);

Route::get('/san-pham', [ProductController::class, 'index'])->name('products');
Route::get('/san-pham/them', [ProductController::class, 'add'])->name('products-add');
Route::post('/products/handle-add', [ProductController::class, 'postAdd'])->name('products-post');
Route::get('/san-pham/sua/{id}/{slug}', [ProductController::class, 'edit'])->name('products-get-edit');
Route::post('/products/update/{id}', [ProductController::class, 'postEdit'])->name('products-post-edit');

// Route::get('/test/{id}', function ($id) {
//     echo 'Test - '.$id;
// });

Route::get('/flash-sales', function () {
    View::render('home/flash-sales');
})->name('flash-sales');

Route::get('/test-database', function () {
    //Truy vấn tới CSDL
    $users = DB::get("SELECT * FROM users");
    echo '<pre>';
    print_r($users);
    echo '</pre>';
});
