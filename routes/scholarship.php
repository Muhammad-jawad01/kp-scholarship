<?php

namespace App\Http\Controllers\Scholarship;

use Illuminate\support\Facades\Route;
use App\Http\Controllers\Scholarship\YouthController;
use App\Models\YouthExperience;


//Youth Registration
//Route::resource('youth', YouthController::class);

// Signup
Route::get('/signup', [YouthController::class, 'signup'])->name('youth-registration-signup');
//===========================
// Youth Registration Routes
//===========================

// Login
Route::get('/youth-registration/login', [YouthController::class, 'login'])->name('youth-registration-login');

// Register new user
Route::post('/youth-registration/register', [YouthController::class, 'register'])->name('youth-registration-register');





Route::group(['prefix' => 'Scholarship', 'middleware' => ['auth:student']], function () {

    // Dashboard
    Route::get('/', [YouthController::class, 'show_dashboard'])->name('youth-dashboard');

    // Personal Information
    Route::post('personalinformation', [YouthController::class, 'personalinformation'])->name('personalinformation');

    // Profile Management
    Route::resource('profile', YouthProfileController::class);

    // Experience Management
    Route::resource('experience', YouthExperienceController::class);
    Route::post('addExperience', [YouthExperienceController::class, 'addExperience'])->name('addExperience');
    Route::post('removeExperience', [YouthExperienceController::class, 'removeExperience'])->name('removeExperience');
    // Route::get('editExperience/{id}', [YouthExperienceController::class, 'editExperience'])->name('editExperience');

    // Education Management
    Route::resource('education', YouthEducationController::class);
    Route::post('addEducation', [YouthEducationController::class, 'addEducation'])->name('addEducation');
    Route::post('removeEducation', [YouthEducationController::class, 'removeEducation'])->name('removeEducation');
    // Route::get('editEducation/{id}', [YouthEducationController::class, 'editEducation'])->name('editEducation');

    // Scholarship Application Steps
    Route::get('general', [ScholarshipController::class, 'general'])->name('general');
    Route::post('general/update', [ScholarshipController::class, 'general_info'])->name('general_info.store');
    Route::get('familyinfo', [ScholarshipController::class, 'familyinfo'])->name('familyinfo');
    Route::post('familyinfo/update', [ScholarshipController::class, 'familyinfo_store'])->name('familyinfo.store');
    Route::get('expenses', [ScholarshipController::class, 'expenses'])->name('expenses');
    Route::post('expenses/update', [ScholarshipController::class, 'expenses_store'])->name('expenses.store');

    Route::get('documents', [ScholarshipController::class, 'documents'])->name('documents');
    Route::post('documents/update', [ScholarshipController::class, 'documents_store'])->name('documents.store');
    // Final Application
    Route::get('apply', [ScholarshipController::class, 'index'])->name('apply');
    Route::post('apply/store', [ScholarshipController::class, 'store'])->name('youth.scholarship.apply');
    // Print Application
    // Route::get('print', [ScholarshipController::class, 'print'])->name('print');

    Route::get('/print/{id}', [ScholarshipController::class, 'print'])->name('print');
    Route::get('print-history/{encryptedHistoryId}', [ScholarshipController::class, 'printFromHistory'])->name('print.history');

    // Application History Routes
    Route::get('history/{historyId}', [ScholarshipController::class, 'viewApplicationHistory'])->name('scholarship.history.view');
    Route::get('student-history/{studentId}', [ScholarshipController::class, 'getStudentHistory'])->name('scholarship.history.student');

    // Additional Features (commented out - can be enabled later)
    // Route::post('saveProfileImage', [YouthController::class, 'updateProfileImage'])->name('saveProfileImage');
    // Route::get('getCV', [YouthController::class, 'get_cv'])->name('getCV');
    // Route::get('get_educational_status/{id}', [YouthController::class, 'getEducationalStatus']);
});
