<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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

// Users workers
Route::get('/workers/index', [UserController::class, 'index'])->middleware(['auth', 'XSS'])->name('workers');
Route::get('/workers/{user_id}/view', [UserController::class, 'view'])->middleware(['auth', 'XSS'])->name('worker.view');

// Company Uses
Route::get('profile',[UserController::class, 'profile'])->middleware(['auth','XSS'])->name('profile');
Route::post('/profile',[UserController::class,'updateProfile'])->middleware(['auth','XSS'])->name('updateProfile');

// Company Module
Route::get('/companies', [CompanyController::class, 'index'])->middleware(['auth','XSS'])->name('companies');
Route::get('/company/{id}/view', [CompanyController::class, 'view'])->middleware(['auth','XSS'])->name('company.view');
Route::get('/company/{id}/edit', [CompanyController::class, 'edit'])->middleware(['auth','XSS'])->name('company.edit');


// Project Module
Route::get('/company/{company_id}/projects/{pid?}', [ProjectController::class, 'index'])->middleware(['auth','XSS'])->name('projects');
Route::get('/company/{company_id}/project/{id}/view', [ProjectController::class, 'view'])->middleware(['auth','XSS'])->name('project.view');
Route::get('/company/{company_id}/project/{id}/edit', [ProjectController::class, 'edit'])->middleware(['auth','XSS'])->name('project.edit');

// Task Module
Route::get('/company/{company_id}/project/{id}/task-kanban', [TaskController::class, 'taskKanban'])->middleware(['auth','XSS'])->name('task.kanban');
Route::get('/task-list', [TaskController::class, 'taskList'])->middleware(['auth','XSS'])->name('task.list');
Route::get('/task/view/{code}', [TaskController::class, 'taskView'])->middleware(['auth','XSS'])->name('task.view');

// Calendar Module
Route::get('/calendar/{pid?}/{project_id?}', [CalendarController::class, 'index'])->middleware(['auth','XSS'])->name('calendar');

// Settings
Route::get('/settings', [SettingsController::class, 'index'])->middleware(['auth','XSS'])->name('settings');

// Activity Log
Route::get('/activity-log', [ActivityLogController::class, 'index'])->middleware(['auth','XSS'])->name('activity_log');

//require __DIR__.'/auth.php';
