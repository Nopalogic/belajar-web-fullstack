<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function () {
    return view('profile.index');
});

Route::get('/login', [LoginController::class, 'login_view'])->name('login_view');

Route::get('/register', [LoginController::class, 'register_view'])->name('register_view');

Route::get('/students', [StudentController::class, 'index']);