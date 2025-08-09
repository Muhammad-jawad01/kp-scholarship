<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\DashboardController;
use App\Models\Feedback;
use App\Models\Report;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    // Resources Controller
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('/scholarships/users/list', [UserController::class, 'index2'])->name('admin.user.scholarship.index');

    Route::resource('settings', SettingController::class);
    Route::resource('slides', SlideController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('downloads', DownloadController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('alerts', AlertController::class);
    Route::resource('hospitals', HospitalController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('news', NewsController::class);
    Route::resource('galleries', GallaryController::class);
    Route::resource('pages', PageController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('slides/list', [SlideController::class, 'list']);
    Route::resource('links', LinkController::class);
    Route::resource('achievements', AchievementController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('universities', UniversityController::class);
    Route::resource('university-details', UniversityDetailsController::class);
    Route::resource('colleges', CollegeController::class);
    Route::resource('college-details', CollegeDetailsController::class);
    Route::resource('books', BookController::class);
    Route::resource('facilities', FacilityController::class);
    Route::resource('events', EventController::class);
    Route::resource('contact-book', ContactBookController::class);
    Route::resource('districts', DistrictController::class);
    Route::resource('degree-certificate', DegreeCertificatesController::class);
    Route::resource('registered-youth', RegisteredYouthController::class);
    Route::resource('competition-categories', CompetitionCategoryController::class);
    Route::resource('competition-sub-categories', CompetitionSubCategoriesController::class);
    Route::resource('levels', LevelController::class);
    Route::resource('result', ResultController::class);
    Route::resource('participants', ParticipantController::class);
    Route::resource('contactus', ContactusController::class);
    Route::resource('registered-users', RegisteredUser::class);
    Route::resource('faqs', FAQController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('scholarship', ScholarshipController::class);
    Route::get('/download-excel', [ReportController::class, 'export'])->name('download.excel');


    //scholarships
    Route::put('scholarships/{id}', [ScholarshipController::class, 'updatesch'])->name('admin.scholarship.update');
    //
    Route::get('/scholarship/create', [ScholarshipController::class, 'create'])->name('admin.scholarship.create');

    Route::post('/scholarship/store', [ScholarshipController::class, 'store'])->name('admin.scholarship.store');

    Route::post('/scholarship/status', [ScholarshipController::class, 'update'])->name('admin.scholarship.status.update');


    // Route::get('/scholarship/general', [ScholarshipController::class, 'general'])->name('general');
    // Route::get('/scholarship/familyinfo', [ScholarshipController::class, 'familyinfo'])->name('familyinfo');
    // Route::get('/scholarship/expenses', [ScholarshipController::class, 'expenses'])->name('expenses');
    // Route::get('/scholarship/documents', [ScholarshipController::class, 'documents'])->name('documents');

    Route::resource('scholarship_applied', ScholarshipAppliedController::class);
    Route::post('scholarship_applied/update', [ScholarshipAppliedController::class, 'update'])->name('scholarship_applied.status.update');
    Route::get('statistics/{id}', [ScholarshipAppliedController::class, 'statistics'])->name('scholarship_applied.statistics');



    // Feedback Routes
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::get('/feedback/add/comment/{id}', [FeedbackController::class, 'add_comment'])->name('add.comment');
    Route::post('/feedback/add/comment', [FeedbackController::class, 'add'])->name('store.comment');
    Route::get('/feedback/comments/{id}', [FeedbackController::class, 'comments'])->name('comments');

    Route::get('account-settings', [UserController::class, 'account_settings'])->name('user-account-settings');
    Route::post('update-setting', [UserController::class, 'update_setting'])->name('user-update-setting');

    Route::get('/facility_details/{id}', [FacilityController::class, 'facility_details'])->name('facility-details');
    Route::get('/event_details/{id}', [EventController::class, 'event_details'])->name('event-details');
    Route::post('/search', [RegisteredYouthController::class, 'search'])->name('registered-youth.search');
    Route::get('/report', [RegisteredYouthController::class, 'getReport'])->name('registered-youth.report');

    Route::post('getapplications', [CompetitionSubCategoriesController::class, 'getapplications'])->name('getapplications');
});
