<?php

use Core\View;
use Core\Route;
use Core\Request;
use App\Controllers\Admin\PageController;
use App\Controllers\Admin\PostController;
use App\Controllers\Admin\UserController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\CategoriesController;

//Admin Routes
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard.index');
Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/add', [CategoriesController::class, 'add'])->name('admin.categories.add');

Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');

Route::get('/admin/users/add', [UserController::class, 'add'])->name('admin.users.add');

Route::post('/admin/users/add', [UserController::class, 'handleAdd']);

Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');

Route::post('/admin/users/edit/{id}', [UserController::class, 'handleEdit']);

Route::post('/admin/users/delete/{id}', [UserController::class, 'delete'])->name('admin.users.delete');

Route::post('/admin/users/deletes', [UserController::class, 'deletes'])->name('admin.users.deletes');

Route::get('/admin/users/profile', [UserController::class, 'profile'])->name('admin.users.profile');

Route::post('/admin/users/profile', [UserController::class, 'updateProfile']);

Route::get('/admin/users/change-password', [UserController::class, 'changePassword'])->name('admin.users.password');

Route::post('/admin/users/change-password', [UserController::class, 'updatePassword']);

//Pages
Route::get('/admin/pages', [PageController::class, 'index'])->name('admin.pages.index');

Route::get('/admin/pages/add', [PageController::class, 'add'])->name('admin.pages.add');

Route::post('/admin/pages/add', [PageController::class, 'handleAdd']);

Route::get('/admin/pages/edit/{id}', [PageController::class, 'edit'])->name('admin.pages.edit');

Route::post('/admin/pages/edit/{id}', [PageController::class, 'handleEdit']);

Route::post('/admin/pages/delete/{id}', [PageController::class, 'delete'])->name('admin.pages.delete');

Route::post('/admin/pages/deletes', [PageController::class, 'deletes'])->name('admin.pages.deletes');

//categories
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

Route::get('/admin/categories/add', [CategoryController::class, 'add'])->name('admin.categories.add');

Route::post('/admin/categories/add', [CategoryController::class, 'handleAdd']);

Route::get('/admin/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');

Route::post('/admin/categories/edit/{id}', [CategoryController::class, 'handleEdit']);

Route::post('/admin/categories/delete/{id}', [CategoryController::class, 'delete'])->name('admin.categories.delete');

Route::post('/admin/categories/deletes', [CategoryController::class, 'deletes'])->name('admin.categories.deletes');

//posts
Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts.index');

Route::get('/admin/posts/add', [PostController::class, 'add'])->name('admin.posts.add');

Route::post('/admin/posts/add', [PostController::class, 'handleAdd']);

Route::get('/admin/posts/edit/{id}', [PostController::class, 'edit'])->name('admin.posts.edit');

Route::post('/admin/posts/edit/{id}', [PostController::class, 'handleEdit']);

Route::post('/admin/posts/delete/{id}', [PostController::class, 'delete'])->name('admin.posts.delete');

Route::post('/admin/posts/deletes', [PostController::class, 'deletes'])->name('admin.posts.deletes');

//Route Prefix
//Nested Route

//Auth Routes
Route::get('/auth/login', [LoginController::class, 'getForm'])->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'login']);
Route::post('/admin/users/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::get('/', function () {
    View::render('welcome');
});

//Route Client
Route::get('/{slug}.html', function ($slug) {
    return 'Trang: '.$slug;
})->name('client.page');

Route::get('/chuyen-muc/{slug}.html', function ($slug) {
    return 'Chuyên mục: '.$slug;
})->name('client.category');

Route::get('/bai-viet/{slug}.html', function ($slug) {
    return 'Bài viết: '.$slug;
})->name('client.post');

Route::get('/tac-gia/{id}', function ($id) {
    return 'Tác giả: '.$id;
})->name('client.author');

Route::get('/download-image', function (

) {
    $url =  request()->url;

    header('Content-Type: image/png');
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($url));
    header('Content-Transfer-Encoding: binary');
    header('Connection: Keep-Alive');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    $image = file_get_contents($url);
    echo $image;
})->name('download-image');
