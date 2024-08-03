<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student;
use App\Http\Controllers\Teacher;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('student')
        ->middleware('role:1')
        ->name('student.')
        ->group(function () {
            Route::get('timetable', [Student\TimetableController::class, 'index'])
                ->name('timetable');
        });

    Route::prefix('teacher')
        ->middleware('role:2')
        ->name('teacher.')
        ->group(function () {
            Route::get('timetable', [Teacher\TimetableController::class, 'index'])
                ->name('timetable');
        });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
