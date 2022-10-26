<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/reset/password', [LoginController::class, 'showLinkRequestForm'])->name('password.request');

Route::get('/', [LandingController::class, 'landingPage'])->middleware(['XSS'])->name('/');
Route::get('/main', [MainController::class, 'index'])->middleware(['auth', 'XSS'])->name('main');

// Company Module
Route::get('/company', [CompanyController::class, 'index'])->middleware(['auth'])->name('company');

// Project Module
Route::get('/project', [ProjectController::class, 'index'])->middleware(['auth'])->name('project');

// Task Module
Route::get('/task', [TaskController::class, 'index'])->middleware(['auth'])->name('task');


//require __DIR__.'/auth.php';
