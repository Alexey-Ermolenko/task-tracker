<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProjectController;
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

Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::get('/register', function() {
    return view('auth.register');
})->name('register');

Route::get('/reset/password', function() {
    return view('auth.passwords.email');
})->name('password.request');


Route::get('/', function() {
    return view('layouts.landing');
})->name('/');

Route::get('/main', [MainController::class, 'index'])->name('main');


// Company Module
Route::get('/company', [CompanyController::class, 'index'])->name('company');

// Project Module
Route::get('/project', [ProjectController::class, 'index'])->name('project');


