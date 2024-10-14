<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
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

//Account Login & Logout
Route::get('/', [AccountController::class, 'index'])->name('login');
Route::post('/login', [AccountController::class, "auth"])->name('login.submit');

Route::middleware('mgt_middleware')->group(function () {
    Route::post('/logout', [AccountController::class, 'endauth'])->name('logout');
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');;
    Route::post('/dashboard/project/add', [DashboardController::class, 'addProject'])->name('newProject.submit');
    //Project
    Route::get('/dashboard/project/{id}', [ProjectController::class, 'show'])->name('project.show');
    Route::put('/dashboard/project/{id}edit', [ProjectController::class, 'edit'])->name('project.edit');
});