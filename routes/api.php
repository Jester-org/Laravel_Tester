<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginControllerAPI;
use App\Http\Controllers\UsersControllerAPI;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/users/login', [LoginControllerAPI::class, 'login']);

Route::get('/users', [UsersControllerAPI::class, 'getUser']);
Route::post('/users/create', [UsersControllerAPI::class, 'addUser']);
Route::delete('/users/delete/{id}', [UsersControllerAPI::class, 'deleteUser']);
Route::patch('/users/update/{id}', [UsersControllerAPI::class, 'updateUser']);