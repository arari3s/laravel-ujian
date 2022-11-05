<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuestionBankController;
use App\Http\Controllers\Trash\QuestionBankTrashController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])
    ->name('dashboard.')
    ->prefix('dashboard')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        // admin
        Route::middleware(['admin'])->group(function () {
            // users
            Route::resource('user', UserController::class);
            // courses
            Route::resource('courses', CourseController::class);
            // question bank
            Route::resource('questionbank', QuestionBankController::class);
            Route::post('questionbank/upload', [QuestionBankController::class, 'questionUploadImage'])->name('questionbank.upload');

            // trash questinbank
            Route::get('trash-questionbank', [QuestionBankTrashController::class, 'trashquestinbank'])->name('trash-questionbank.index');
            Route::get('trash-questionbank/restore/{id}', [QuestionBankTrashController::class, 'trashquestinbankrestore'])->name('trash-questionbank.restore');
        });
    });
