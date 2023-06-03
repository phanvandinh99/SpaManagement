<?php

// Controller => Auth
use App\Http\Controllers\Auth\LoginController;

// Controller => User
use App\Http\Controllers\User\HomeController as UserHomeController;

// Controller => Admin
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

use App\Shared\Constants\Role;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', function () {
    return view('welcome');
});

// ===================== AUTH ===================== //
Route::get('login', [LoginController::class, 'getLogin']);
Route::post('login', [LoginController::class, 'postLogin']);





// ===================== GUEST ===================== //
Route::get('user/home', [UserHomeController::class, 'index']);

// ===================== USER ===================== //
Route::middleware([Role::AUTH_ADMIN])->group((function () {
}));

// ===================== ADMIN ===================== //
Route::middleware([Role::AUTH_ADMIN])->group((function () {
    Route::get('admin/home', [AdminHomeController::class, 'index']);

    // Route::get('admin/product', [AdminProductController::class, 'index']);
    Route::get('admin/product', [AdminProductController::class, 'index'])->name('admin/product');
    Route::Post('admin/product/store', [AdminProductController::class, 'store']);
}));
