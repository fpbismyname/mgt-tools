<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
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

//MARK:Account Login & Logout
Route::get('/', [AccountController::class, 'index'])->name('login');
Route::post('/login', [AccountController::class, "auth"])->name('login.submit');


//MARK:Logged in Area
Route::middleware('mgt_middleware')->group(function () {
    //MARK:Image Resource
    Route::get('/images/{url}', function ($url) {
        $urlImage = $url;
        $file = Storage::get("images/$urlImage");
    
        if (!$file) {
            return abort(404);
        }
        $mimeFiles = Storage::mimeType("images/$urlImage");
        return response($file, 200)->header('Content-type', $mimeFiles);
    })->name('images');

    //MARK:logout
    Route::post('/logout', [AccountController::class, 'endauth'])->name('logout');

    //MARK:Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');;
    
    //MARK:Project
    Route::get('/dashboard/project/{id}', [ProjectsShowProject::class, 'index'])->name('project');
    Route::post('/dashboard/project/add', [DashboardController::class, 'addProject'])->name('project.add');
    Route::put('/dashboard/project/{id}/edit', [ProjectsShowProject::class, 'editProject'])->name('project.edit');
    Route::delete('/dashboard/project/{id}/delete', [ProjectsShowProject::class, 'deleteProject'])->name('project.delete');
    
    //MARK:Problem Domain
    Route::post('/dashboard/project/problem-domain/{id}/add', [ProjectsShowProject::class, 'addProblemDomain'])->name('problem-domain.add');
    Route::put('/dashboard/project/problem-domain/{id}/edit', [ProjectsShowProject::class, 'editProblemDomain'])->name('problem-domain.edit');
    Route::delete('/dashboard/project/{id_project}/problem-domain/{id}/delete', [ProjectsShowProject::class, 'deleteProblemDomain'])->name('problem-domain.delete');

    // MARK:Solution Domain
    Route::post('/dashboard/project/solution-domain/{id}/add', [ProjectsShowProject::class, 'addSolutionDomain'])->name('solution-domain.add');
    Route::put('/dashboard/project/solution-domain/{id}/edit', [ProjectsShowProject::class, 'editSolutionDomain'])->name('solution-domain.edit');
    Route::delete('/dashboard/project/{id_project}/solution-domain/{id}/delete', [ProjectsShowProject::class, 'deleteSolutionDomain'])->name('solution-domain.delete');
    
    //MARK:UseCase
    Route::post('/dashboard/project/use-case/{id}/add', [ProjectsShowProject::class, 'addUseCase'])->name('use-case.add');
    Route::put('/dashboard/project/use-case/{id}/edit', [ProjectsShowProject::class, 'editUseCase'])->name('use-case.edit');
    Route::delete('/dashboard/project/use-case/{id}/delete', [ProjectsShowProject::class, 'deleteUseCase'])->name('use-case.delete');
    
    //MARK:UseCase Actor
    Route::post('/dashboard/project/use-case-actor/{id}/add', [ProjectsShowProject::class, 'addUseCaseActor'])->name('use-case-actor.add');
    Route::put('/dashboard/project/use-case-actor/{id}/edit', [ProjectsShowProject::class, 'editUseCaseActor'])->name('use-case-actor.edit');
    Route::delete('/dashboard/project/use-case-actor/{id}/delete', [ProjectsShowProject::class, 'deleteUseCaseActor'])->name('use-case-actor.delete');

});
