<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('student')
        ->name('student.')
        ->group(function () {
            Route::get('timetable', [\App\Http\Controllers\Student\TimetableController::class, 'index'])
                ->name('timetable');
        });

    Route::prefix('teacher')
        ->name('teacher.')
        ->group(function () {
            Route::get('timetable', [\App\Http\Controllers\Teacher\TimetableController::class, 'index'])
                ->name('timetable');
        });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
