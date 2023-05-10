<?php

use Core\View;
use Core\Route;
use App\Controllers\Auth\LoginController;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\CategoriesController;

//Admin Routes
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard.index');
Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/add', [CategoriesController::class, 'add'])->name('admin.categories.add');
//Route Prefix
//Nested Route

//Auth Routes
Route::get('/auth/login', [LoginController::class, 'getForm'])->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'login']);


Route::get('/', function () {
    View::render('welcome');
});