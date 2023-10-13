<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;

Route::get('/', function () {
    return view('welcome');
});

// admin section start
Route::get('/dashboard', [AdminController::class, 'index']);

Route::get('/dashboard/user', [UserController::class, 'index'])->name('all-user');
Route::get('/dashboard/user/add', [UserController::class, 'add'])->name('add-user');
Route::get('/dashboard/user/edit', [UserController::class, 'edit'])->name('edit-user');
Route::get('/dashboard/user/view', [UserController::class, 'view'])->name('view-user');
Route::post('/dashboard/user/submit', [UserController::class, 'insert'])->name('');
Route::post('/dashboard/user/update', [UserController::class, 'update'])->name('');
Route::post('/dashboard/user/softdelete', [UserController::class, 'softdelete'])->name('');
Route::post('/dashboard/user/restore', [UserController::class, 'restore'])->name('');
Route::post('/dashboard/user/delete', [UserController::class, 'delete'])->name('');

Route::get('/dashboard/income', [IncomeController::class, 'index'])->name('');
Route::get('/dashboard/income/add', [IncomeController::class, 'add'])->name('');
Route::get('/dashboard/income/edit', [IncomeController::class, 'edit'])->name('');
Route::get('/dashboard/income/view', [IncomeController::class, 'view'])->name('');
Route::post('/dashboard/income/submit', [IncomeController::class, 'insert'])->name('');
Route::post('/dashboard/income/update', [IncomeController::class, 'update'])->name('');
Route::post('/dashboard/income/softdelete', [IncomeController::class, 'softdelete'])->name('');
Route::post('/dashboard/income/restore', [IncomeController::class, 'restore'])->name('');
Route::post('/dashboard/income/delete', [IncomeController::class, 'delete'])->name('');
Route::get('/dashboard/income', [IncomeController::class, 'index'])->name('');

Route::get('/dashboard/expense/add', [ExpenseController::class, 'add'])->name('');
Route::get('/dashboard/expense/edit', [ExpenseController::class, 'edit'])->name('');
Route::get('/dashboard/expense/view', [ExpenseController::class, 'view'])->name('');
Route::post('/dashboard/expense/submit', [ExpenseController::class, 'insert'])->name('');
Route::post('/dashboard/expense/update', [ExpenseController::class, 'update'])->name('');
Route::post('/dashboard/expense/softdelete', [ExpenseController::class, 'softdelete'])->name('');
Route::post('/dashboard/expense/restore', [ExpenseController::class, 'restore'])->name('');
Route::post('/dashboard/expense/delete', [ExpenseController::class, 'delete'])->name('');

require __DIR__ . '/auth.php';
