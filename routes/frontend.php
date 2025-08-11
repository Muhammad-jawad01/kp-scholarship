<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use GuzzleHttp\Psr7\Request;

// Route for storefront


// Route::get('/', function () {
//     return redirect()->route('student.login');
// })->name('index.page');


Route::get('/', [PagesController::class, 'index'])->name('index.page');
// Route::get('{page}/{slug}', [PagesController::class, 'function']);
Route::post('sendemail', [ContactController::class, 'sendemail']);
Route::get('contact-us', [PagesController::class, 'contact_us']);
Route::get('gallery', [PagesController::class, 'gallery']);

//News section

Route::group(['prefix' => 'news'], function () {
    Route::get('/', [NewsController::class, 'index'])->name('pages.news');
    Route::get('{slug}', [NewsController::class, 'details']);
});

//Projects section
Route::group(['prefix' => 'projects'], function () {
    Route::get('/', [ProjectController::class, 'index']);
    Route::get('{slug}', [ProjectController::class, 'details']);
});


Route::get('/scholarships', [PagesController::class, 'scholarships'])->name('scholarships.pages');
Route::get('/scholarships/{id}', [PagesController::class, 'scholarshipsDetails'])->name('scholarships.pages.details');



Route::get('contactbook', [PagesController::class, 'contact_book'])->name('pages.contact-book');

//Education
Route::get('/education/universities', [PagesController::class, 'universities'])->name('pages.universities');
Route::get('/education/universities-details/{id}', [PagesController::class, 'university_details'])->name('pages.university-details');
Route::get('/education/colleges', [PagesController::class, 'colleges'])->name('pages.colleges');
Route::get('/education/colleges-details/{id}', [PagesController::class, 'college_details'])->name('pages.college-details');
Route::get('/education/scholarships', [PagesController::class, 'scholarships'])->name('pages.scholarships');
Route::get('/education/books', [PagesController::class, 'books'])->name('pages.books');

//Careers
Route::get('/careers/internships', [PagesController::class, 'internships'])->name('pages.internships');
Route::get('/careers/jobs', [PagesController::class, 'jobs'])->name('pages.jobs');

//Facilities
Route::get('/facilities/youthaffairs', [PagesController::class, 'facility_youth_affairs'])->name('pages.facilities.youthaffairs');
Route::get('/facilities/sports', [PagesController::class, 'facility_sports'])->name('pages.facilities.sports');
Route::get('/facilities/tourism', [PagesController::class, 'facility_tourism'])->name('pages.facilities.tourism');
Route::get('/facilities/culture', [PagesController::class, 'facility_culture'])->name('pages.facilities.culture');
Route::get('/facilities/jawan-marakiz', [PagesController::class, 'facility_jawan_marakiz'])->name('pages.facilities.jawan-marakiz');
Route::get('/facilities/youth-hostels', [PagesController::class, 'facility_youth_hostels'])->name('pages.facilities.youth-hostels');
Route::get('/hostels_facility_details/{id}', [PagesController::class, 'hostels_facility_details'])->name('hostels-facilities-details');
Route::get('/jawan_markaz_facility_details/{id}', [PagesController::class, 'jawan_markaz_facility_details'])->name('jawan-markaz-facilities-details');

//Events
Route::get('/events/youthaffairs', [PagesController::class, 'event_youth_affairs'])->name('pages.events.youthaffairs');
Route::get('/events/sports', [PagesController::class, 'event_sports'])->name('pages.events.sports');
Route::get('/events/tourism', [PagesController::class, 'event_tourism'])->name('pages.events.tourism');
Route::get('/events/culture', [PagesController::class, 'event_culture'])->name('pages.events.culture');

Route::get('/events', [PagesController::class, 'events'])->name('pages.events');

//Downloads
Route::get('/downloads/biddingdocuments', [PagesController::class, 'download_tenders_bidding_documents'])->name('pages.downloads.bidding-documents');
Route::get('/downloads', [PagesController::class, 'download_tenders'])->name('pages.downloads');
Route::get('/downloads/kpyouthpolicy', [PagesController::class, 'download_kp_youth_policy'])->name('pages.downloads.kp-youth-policy');

//About Us
Route::get('/about', [PagesController::class, 'aboutus'])->name('pages.about');

Route::get('/aboutus/{slug}', [PagesController::class, 'dynamic'])->name('pages.aboutus.dynamic');

//Contact Us
Route::get('/contactus', [PagesController::class, 'contactus'])->name('pages.contactus');
Route::get('/gallery', [PagesController::class, 'gallery'])->name('pages.gallery');

// FAQs
Route::get('/faqs', [PagesController::class, 'faqs'])->name('pages.faqs');

//E-Office
Route::get('/e-office', [PagesController::class, 'e_office'])->name('pages.e-office');

// kpef
Route::get('/BoardOfDirector', [PagesController::class, 'board_of_director'])->name('pages.BoardOfDirector');

Route::get('/Staructure', [PagesController::class, 'staructure'])->name('pages.Staructure');

Route::get('/functions', [PagesController::class, 'functions'])->name('pages.functions');

// Route::get('/scholarship/view', [PagesController::class, 'scholarshipget'])->name('pages.scholarship.get');
Route::get('scholarship/{slug}', [PagesController::class, 'scholarshipget'])->name('pages.scholarship.get');

Route::get('/Alumni', [PagesController::class, 'alumni'])->name('pages.alumni');



//Organization Registration
// Route::resource('organization', OrganizationController::class);
// Route::resource('youth-carnival', YouthCarnivalController::class);
// Route::get('youth/carnival/result', [YouthCarnivalController::class, 'result']);
// Route::post('getCompetitionCategory', [YouthCarnivalController::class, 'getCompetitionCategory'])->name('getCompetitionCategory');
// Route::get('getSubCompetitionCategory', [YouthCarnivalController::class, 'getSubCompetitionCategory'])->name('getSubCompetitionCategory');
// Route::get('getLevelCompetitionCategory', [YouthCarnivalController::class, 'getLevelCompetitionCategory'])->name('getLevelCompetitionCategory');
// Route::get('getResult', [YouthCarnivalController::class, 'getResult'])->name('getResult');
// Route::group(['prefix' => 'event'], function () {
//     Route::get('/', [EventController::class, 'index']);
//     Route::get('{slug}', [EventController::class, 'details']);
// });

// District Routes
Route::group(['prefix' => 'district'], function () {
    Route::post('getDistrict', [DistrictController::class, 'getDistrict'])->name('getDistrict');
});

Route::post('check_cnic', [YouthCarnivalController::class, 'check_cnic'])->name('check_cnic');

// Home page Events
Route::get('/event', [EventController::class, 'index']);
// Route::get('event', [PagesController::class, 'events']);

Route::get('/event/{id}', [EventController::class, 'details']);

Route::get('sports/events', [PagesController::class, 'sports_events'])->name('sports.events');
Route::get('youth-affairs/events', [PagesController::class, 'youth_affairs_events'])->name('youth.affairs.events');

//Hospital Section
// Route::group(['prefix' => 'hospitals'], function () {
//     Route::get('{slug}', [HospitalController::class, 'index']);
// });


// Youth affairs Gallery
// Route::get('youth-affairs/gallery/', [PagesController::class, 'youth_affairs_gallery'])->name('youth.affairs.gallery');

// Pages Section
Route::group(['prefix' => 'pages'], function () {

    // for future use
    Route::redirect('/', '/');
    // Route::get('{slug}', [PagesController::class, 'dynamic']);
    // Route::get('{slug}', [PagesController::class, 'dynamic'])->name('pages.dynamic');

    Route::get('financial-assistance', [PagesController::class, 'financialassistance'])->name('pages.financial-assistance');
    Route::get('kohat-academy', [PagesController::class, 'kohatacadmey'])->name('pages.kohatacadmey');
    Route::get('languagecenter', [PagesController::class, 'languagecenter'])->name('pages.languagecenter');
});


//Download Link
Route::get('downloads/{slug}', [DownloadController::class, 'index']);


// Pages Teams
Route::group(['prefix' => 'teams'], function () {
    // for future use
    Route::get('/', [TeamController::class, 'index'])->name('pages.team');
    // Route::get('{slug}', [PagesController::class, 'dynamic']);
});

// Past Events Details
Route::get('event/details/{id}', [PagesController::class, 'past_event_details'])->name('past-event-details');

// Proposal Template
Route::get('/proposal/template', [PagesController::class, 'download_proposal_template'])->name('pages.proposal.template');
// Service Rules and Acts
Route::get('/service-rules-acts', [PagesController::class, 'download_service_rules_acts'])->name('pages.service.rules.acts');

// Sports Policy
Route::get('sports/policy', [PagesController::class, 'download_sports_policy'])->name('pages.downloads.sports-policy');

Route::get('/message/{id}', [PagesController::class, 'show_message'])->name('show.message');

// ===============================
// Full Calender Controller Routes
// ===============================
Route::get('fullcalendar/{category}', [FullCalenderController::class, 'index']);
Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);

// Works Department
Route::get('/work', [PagesController::class, 'work_index'])->name('work.index');
