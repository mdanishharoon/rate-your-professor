<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\RatingController;

Route::get('/', function () {
    return view('welcome');
});

// Professors
Route::get('/professors', [ProfessorController::class, 'index'])->name('professors.index');
Route::get('/professors/{id}', [ProfessorController::class, 'show'])->name('professors.show');

// Reviews
Route::post('/reviews', [RatingController::class, 'store'])->name('reviews.store');
