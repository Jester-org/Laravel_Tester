<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\UserAuthentication;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/home', function () {
    return view('home.welcome');
});

Route::get('/dashboard', function () {
    return view('home.dashboard');
});

Route::view('/login', 'admin.login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'userLogout']);

Route::middleware([UserAuthentication::class])->group(function () {
    Route::get('/', function () {
        return view('home.home');
    });
    
    // User CRUD
    Route::get('/users', [UsersController::class, 'index']);
    Route::get('/adduser', [UsersController::class, 'create']);
    Route::post('/adduser', [UsersController::class, 'store']);
    Route::get('/edituserform/{id}', [UsersController::class, 'edit']);
    Route::put('/edituser/{id}', [UsersController::class, 'update']);
    Route::get('/deleteuser/{id}', [UsersController::class, 'destroy']);

    // Category CRUD
    Route::get('/categories', [CategoryController::class, 'getCategories']);
    Route::get('/addcategory', [CategoryController::class, 'addCategoryForm']);
    Route::post('/addcategory', [CategoryController::class, 'addCategory']);
    Route::get('/editcategory/{id}', [CategoryController::class, 'editCategoryForm']);
    Route::put('/editcategory/{id}', [CategoryController::class, 'editCategory']);
    Route::get('/deletecategory/{id}', [CategoryController::class, 'deleteCategory']);
    
    // Product CRUD
    Route::get('/products', [ProductController::class, 'getProducts']);    
    Route::get('/addproduct', [ProductController::class, 'addProductForm']);
    Route::post('/addproduct', [ProductController::class, 'addProduct']);
    Route::get('/editproduct/{id}', [ProductController::class, 'editProductForm']);
    Route::put('/editproduct/{id}', [ProductController::class, 'editProduct']);
    Route::get('/deleteproduct/{id}', [ProductController::class, 'deleteProduct']);
});