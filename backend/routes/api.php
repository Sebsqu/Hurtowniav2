<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;

Route::get('users', [UsersController::class, 'index']);
Route::get('products', [ProductsController::class, 'index']);