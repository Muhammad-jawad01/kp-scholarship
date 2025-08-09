<?php

use App\Http\Controllers\Auth\StudentAuthenticatedSessionController;
use App\Http\Controllers\Auth\StudentRegisterController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Student\ScholarshipApplicationController;
use Illuminate\Support\Facades\Route;

// Student Authentication Routes
Route::middleware('guest:student')->prefix('student')->name('student.')->group(function () {
    Route::get('login', [StudentAuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [StudentAuthenticatedSessionController::class, 'store']);

    Route::get('register', [StudentRegisterController::class, 'create'])
        ->name('register');
    Route::post('register', [StudentRegisterController::class, 'store']);
});

// Student Dashboard Routes
// Route::middleware('auth:student')->prefix('student')->name('student.')->group(function () {
        // Logout
        Route::prefix('student')->name('student.')->group(function () {

            Route::post('logout', [StudentAuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Dashboard
    Route::get('dashboard', [StudentDashboardController::class, 'index'])
        ->name('dashboard');

    // Profile
    Route::get('profile', [StudentDashboardController::class, 'profile'])
        ->name('profile');
    Route::get('profile/edit', [StudentDashboardController::class, 'editProfile'])
        ->name('profile.edit');
    Route::put('profile', [StudentDashboardController::class, 'updateProfile'])
        ->name('profile.update');

    // Scholarship Applications
    Route::get('scholarships', [ScholarshipApplicationController::class, 'index'])
        ->name('scholarships.index');
    Route::get('scholarships/{scholarship}', [ScholarshipApplicationController::class, 'show'])
        ->name('scholarships.show');
    Route::get('scholarships/{scholarship}/apply', [ScholarshipApplicationController::class, 'apply'])
        ->name('scholarships.apply');
    Route::post('scholarships/{scholarship}/apply', [ScholarshipApplicationController::class, 'storeApplication'])
        ->name('scholarships.store');
});
