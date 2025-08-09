<?php
namespace App\Http\Controllers\Feedback;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

Route::get('/feedback/login', [AuthController::class, 'login'])->name('feedback.login');
Route::post('/feedback/verify', [AuthController::class, 'verifyUser'])->name('feedback.verify');
Route::get('/feedback/signup', [AuthController::class, 'signup'])->name('feedback.signup');
Route::post('feedback/register', [AuthController::class, 'register'])->name('feedback.register');

Route::group(['prefix' => 'feedback', 'middleware' => ['auth:feedback']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('feedback.dashboard');
    Route::post('/add/feedback', [FeedbackController::class, 'add_feedback'])->name('add.feedback');
    Route::get('/comments', [FeedbackController::class, 'feedbacks'])->name('user.feedbacks');
});

Route::get('/feedback/logout', function(){
    Auth::guard('feedback')->logout();
    return redirect()->route('feedback.login');
})->name('feedback.logout');