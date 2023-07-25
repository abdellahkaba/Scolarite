<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\LevelsController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PayementController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\SchoolFraiController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::prefix('niveaux')->group(function(){
        Route::get('/', [LevelsController::class,'index'])->name('niveaux');
        Route::get('/create-level',[LevelsController::class,'create'])->name('niveaux.create-levels');
        Route::get('/edit-level/{level}', [LevelsController::class, 'edit'])->name('niveaux.edit-levels');
    });
    Route::prefix('settings')->group(function(){
        Route::get('/',[SchoolYearController::class,'index'])->name('settings');
        Route::get('/create_school_year',[SchoolYearController::class, 'create'])->name('settings.create_school_year');
        // Route::get('/create-level', [LevelsController::class, 'create'])->name('settings.create_levels');
       
    });

    Route::prefix('classes')->group(function(){
        Route::get('/', [ClasseController::class,'index'])->name('classes');
        Route::get('/create',[ClasseController::class, 'create'])->name('classes.create');
        Route::get('/edit-classe/{classe}',[ClasseController::class, 'edit'])->name('classes.edit');
    });

    Route::prefix('eleves')->group(function(){
        Route::get('/',[StudentController::class, 'index'])->name('eleves');
        Route::get('/student',[StudentController::class, 'show'])->name('eleves.show');
        Route::get('/create',[StudentController::class, 'create'])->name('eleves.create');
        Route::get('/edit-student/{student}',[StudentController::class, 'edit'])->name('eleves.edit');
        Route::get('/show-student/{student}',[StudentController::class, 'show'])->name('eleves.show');
    });

    Route::prefix('inscriptions')->group(function(){
        Route::get('/', [InscriptionController::class, 'index'])->name('inscriptions');
        Route::get('/create',[InscriptionController::class, 'create'])->name('inscriptions.create');
        Route::get('edit/{inscription}',[InscriptionController::class, 'edit'])->name('inscriptions.edit');
        Route::get('show-student/{student}',[InscriptionController::class, 'show'])->name('inscriptions.show');
    });

    Route::prefix('payements')->group(function(){
        Route::get('/',[PayementController::class,'index'])->name('payements');
        Route::get('/create',[PayementController::class,'create'])->name('payements.create');
        Route::get('/edit/{payement}',[PayementController::class, 'edit'])->name('payements.edit');
    });

    Route::prefix('parents')->group(function(){
        Route::get('/',[ParentController::class,'index'])->name('parents');
        Route::get('/create',[ParentController::class,'create'])->name('parents.create');
        Route::get('/edit/{parent}',[ParentController::class,'edit'])->name('parents.edit');
    });

    Route::prefix('frais')->group(function(){
        Route::get('/',[SchoolFraiController::class,'index'])->name('frais');
        Route::get('/create',[SchoolFraiController::class,'create'])->name('frais.create');
        Route::get('/edit/{frai}',[SchoolFraiController::class, 'edit'])->name('frais.edit');
    });
});

