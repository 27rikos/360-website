<?php

use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KuisionerController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResponController;
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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('authentication', [AuthController::class, 'auth'])->name('auth');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('registration', [AuthController::class, 'accept'])->name('registration');

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('respon', [ResponController::class, 'index'])->name('respon.index');
    Route::get('respon-destroy', [ResponController::class, 'destroy'])->name('drop');
    Route::post('import-respon', [ResponController::class, 'import'])->name('import');

    Route::get('criteria', [KriteriaController::class, 'index'])->name('kriteria.index');
    Route::get('criteria-calculate', [KriteriaController::class, 'calculate'])->name('kriteria.calc');

    Route::get('result', [AnalisisController::class, 'index'])->name('analisis.index');
    Route::get('analyze', [AnalisisController::class, 'analyze'])->name('analisis.store');
    Route::resource('kuisioner', KuisionerController::class);
    Route::post('import-kuisioner', [KuisionerController::class, 'import'])->name('import-kuisioner');
    Route::get('show-quis', [QuizController::class, 'index'])->name('quiz.index');
    Route::post('quis-save', [QuizController::class, 'store'])->name('quiz.store');
});