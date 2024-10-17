<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProblemDomain;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectsController;
use App\Http\Resources\Project;
use App\Livewire\ShowProject;
use App\View\Components\projects\showProject as ProjectsShowProject;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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


//Logged in Area
Route::middleware('mgt_middleware')->group(function () {
    //Image Resource
    Route::get('/images/{url}', function ($url) {
        $urlImage = $url;
        $file = Storage::get("images/$urlImage");
    
        if (!$file) {
            return abort(404);
        }
        $mimeFiles = Storage::mimeType("images/$urlImage");
        return response($file, 200)->header('Content-type', $mimeFiles);
    })->name('images');

    //logout
    Route::post('/logout', [AccountController::class, 'endauth'])->name('logout');

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');;
    
    //Project
    Route::get('/dashboard/project/{id}', [ProjectsShowProject::class, 'index'])->name('project');
    Route::post('/dashboard/project/add', [DashboardController::class, 'addProject'])->name('project.add');
    Route::put('/dashboard/project/{id}/edit', [ProjectsShowProject::class, 'editProject'])->name('project.edit');
    Route::delete('/dashboard/project/{id}/delete', [ProjectsShowProject::class, 'deleteProject'])->name('project.delete');
    
    //Problem Domain
    Route::post('/dashboard/project/problem-domain/{id}/add', [ProjectsShowProject::class, 'addProblemDomain'])->name('problem-domain.add');
    Route::put('/dashboard/project/problem-domain/{id}/edit', [ProjectsShowProject::class, 'editProblemDomain'])->name('problem-domain.edit');
    Route::delete('/dashboard/project/problem-domain/{id}/delete', [ProjectsShowProject::class, 'deleteProblemDomain'])->name('problem-domain.delete');
});
