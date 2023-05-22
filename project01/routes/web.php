<?php

use Core\View;
use Core\Route;
use App\Controllers\Admin\PageController;
use App\Controllers\Admin\UserController;
use App\Controllers\Auth\LoginController;
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
