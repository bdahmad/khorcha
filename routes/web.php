<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;



// admin section start
Route::get('/dashboard', [AdminController::class, 'index']);

Route::get('/dashboard/user', [UserController::class, 'index']);
Route::get('/dashboard/add', [UserController::class, 'add']);
Route::get('/dashboard/edit', [UserController::class, 'edit']);
Route::get('/dashboard/view', [UserController::class, 'view']);

require __DIR__.'/auth.php';
