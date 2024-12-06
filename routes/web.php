<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
    

Route::get('/', [StudentController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [StudentController::class, 'store'])->name('register.store');
Route::get('/test', [StudentController::class, 'showTest'])->name('test.show');
Route::post('/test', [StudentController::class, 'submitTest'])->name('test.submit');

Route::get('/test', [StudentController::class, 'showTest'])->name('test.show');
Route::post('/test/next', [StudentController::class, 'nextQuestion'])->name('test.next');
Route::get('/test/submit', [StudentController::class, 'submitTest'])->name('test.submit');