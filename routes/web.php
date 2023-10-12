<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;



// admin section start
Route::get('/dashboard', [AdminController::class, 'index']);

require __DIR__.'/auth.php';
