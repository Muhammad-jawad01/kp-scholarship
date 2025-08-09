<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Download;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\News;
use App\Models\Gallary;
use App\Models\University;
use App\Models\UniversityDetails;
use App\Models\College;
use App\Models\CollegeDetails;
use App\Models\Slide;
use App\Models\News as NewsModel;
use App\Models\Book;
use App\Models\Facility;
use App\Models\Event;
use App\Models\ContactBook;
use App\Models\FAQ;
use App\Models\Scholarship;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Weather;

class PagesController extends Controller
{

    public function index()
    {
        return View('front.pages.index');
    }

    public function contact_us()
    {
        return View('front.pages.contact');
    }

    public function contact_book()
    {
        $pageData = Page::where('slug', 'contact-book')->firstorfail();
        $contacts = ContactBook::paginate(20);
        return view('front.pages.contact-book.index', compact('pageData', 'contacts'));
    }

    public function universities()
    {
        $pageData = Page::where('slug', 'education')->firstorfail();
        $universities = University::leftJoin('districts', 'districts.id', '=', 'universities.district_id')
            ->select('universities.*', 'districts.name as dist_name')
            ->paginate(20);
        return view('front.pages.universities.index', compact('pageData', 'universities'));
    }

    public function university_details($universityId)
    {
        $pageData = Page::where('slug', 'education')->firstorfail();
        $universityDetails = DB::table('university_details')
            ->where('university_id', $universityId)
            ->select('university_details.*')
            ->paginate(20);
        return view('front.pages.universities.details', compact('pageData', 'universityDetails'));
    }

    public function colleges()
    {
        $pageData = Page::where('slug', 'education')->firstorfail();
        $colleges = College::leftJoin('districts', 'districts.id', '=', 'colleges.district_id')
            ->select('colleges.*', 'districts.name as dist_name')
            ->paginate(20);
        return view('front.pages.colleges.index', compact('pageData', 'colleges'));
    }

    public function college_details($collegeId)
    {
        $pageData = Page::where('slug', 'education')->firstorfail();
        $collegeDetails = DB::table('college_details')
            ->where('college_id', $collegeId)
            ->select('college_details.*')
            ->paginate(20);
        return view('front.pages.colleges.details', compact('pageData', 'collegeDetails'));
    }

    public function scholarships()
    {
        return view('front.pages.scholarships.index');
    }

    public function books()
    {
        $pageData = Page::where('slug', 'education')->firstorfail();
        $books = Book::leftJoin('categories', 'categories.id', '=', 'books.category_id')
            ->select('books.*', 'categories.title')
            ->paginate(20);
        return view('front.pages.books.index', compact('pageData', 'books'));
    }

    public function internships()
    {
        $pageData = Page::where('slug', 'download')->firstorfail();
        $categoryId = DB::table('categories')->where('title', 'Internships')->value('id');
        $internships = Download::where('category_id', $categoryId)->paginate(20);
        return view('front.pages.internships.index', compact('pageData', 'internships'));
    }

    public function jobs()
    {
        $pageData = Page::where('slug', 'download')->firstorfail();
        $categoryId = DB::table('categories')->where('title', 'Jobs')->value('id');
        $jobs = Download::where(['category_id' => $categoryId, 'status' => 1])->orderBy('id', 'desc')->paginate(20);
        return view('front.pages.jobs.index', compact('pageData', 'jobs'));
    }

    public function facility_youth_affairs()
    {
        $pageData = Page::where('slug', 'facilities')->firstorfail();
        $facilities =   Facility::leftJoin('districts', 'districts.id', '=', 'facilities.district_id')
            ->select('facilities.*', 'districts.name')
            ->where('type', 'Youth Affairs')
            ->orderBy('id', 'desc')->paginate(20);

        return view('front.pages.facilities.youth-affairs.index', compact('pageData', 'facilities'));
    }

    public function facility_sports()
    {
        $pageData = Page::where('slug', 'facilities')->firstorfail();
        $facilities = Facility::leftJoin('districts', 'districts.id', '=', 'facilities.district_id')
            ->where('type', 'Sports')
            ->select('facilities.*', 'districts.name')
            ->orderBy('id', 'desc')->paginate(20);
        return view('front.pages.facilities.sports.index', compact('pageData', 'facilities'));
    }

    public function facility_tourism()
    {
        return redirect()->away('https://tourism.kp.gov.pk');
    }

    public function facility_culture()
    {
        $pageData = Page::where('slug', 'facilities')->firstorfail();
        $facilities = Facility::where('type', 'Culture')->orderBy('id', 'desc')->paginate(20);
        return view('front.pages.facilities.culture.index', compact('pageData', 'facilities'));
    }

    public function facility_jawan_marakiz()
    {
        $pageData = Page::where('slug', 'facilities')->firstorfail();
        $facilities = Facility::where(['type' => 'Jawan Marakiz', 'is_deleted' => 0])->orderBy('id', 'desc')->paginate(20);
        return view('front.pages.facilities.jawan-marakiz.index', compact('pageData', 'facilities'));
    }

    public function facility_youth_hostels()
    {
        $pageData = Page::where('slug', 'facilities')->firstorfail();
        $facilities = Facility::where(['type' => 'Youth Hostels', 'is_deleted' => 0])->orderBy('id', 'desc')->paginate(20);
        return view('front.pages.facilities.youth-hostels.index', compact('pageData', 'facilities'));
    }

    public function hostels_facility_details($id)
    {
        $pageData = Page::where('slug', 'facilities')->firstorfail();
        $facility = Facility::leftJoin('districts', 'districts.id', '=', 'facilities.district_id')
            ->where([
                ['facilities.id', $id],
                ['type', 'Youth Hostels']
            ])
            ->select('facilities.*', 'districts.name')
            ->first();

        return view('front.pages.facilities.youth-hostels.details', compact('pageData', 'facility'));
    }

    public function jawan_markaz_facility_details($id)
    {
        $pageData = Page::where('slug', 'facilities')->firstorfail();
        $facility = Facility::leftJoin('districts', 'districts.id', '=', 'facilities.district_id')
            ->where([
                ['facilities.id', $id],
                ['type', 'Jawan Marakiz']
            ])
            ->select('facilities.*', 'districts.name')
            ->first();

        return view('front.pages.facilities.jawan-marakiz.details', compact('pageData', 'facility'));
    }

    public function event_youth_affairs()
    {
        $pageData = Page::where('slug', 'events')->firstorfail();
        $events = Event::leftJoin('districts', 'districts.id', '=', 'events.district_id')
            ->where('type', 'Youth Affairs')
            ->select('events.*', 'districts.name')
            ->paginate(20);
        return view('front.pages.events.youth-affairs.index', compact('pageData', 'events'));
    }

    public function event_sports()
    {
        $pageData = Page::where('slug', 'sports')->firstorfail();
        $events = Event::leftJoin('districts', 'districts.id', '=', 'events.district_id')
            ->where('type', 'Sports')
            ->select('events.*', 'districts.name')
            ->paginate(20);
        return view('front.pages.events.sports.index', compact('pageData', 'events'));
    }

    public function event_tourism()
    {
        return redirect()->away('https://tourism.kp.gov.pk');
    }

    public function event_culture()
    {
        $pageData = Page::where('slug', 'events')->firstorfail();
        $events = Event::where('type', 'Culture')->paginate(20);
        return view('front.pages.events.culture.index', compact('pageData', 'events'));
    }

    public function download_tenders_bidding_documents()
    {
        $pageData = Page::where('slug', 'download')->firstorfail();
        $categoryId = DB::table('categories')->where('title', 'Tenders / Bidding Documents')->value('id');
        $biddingDocuments = Download::where(['category_id' => $categoryId, 'status' => 1])->orderBy('id', 'desc')->paginate(20);
        return view('front.pages.downloads.bidding-documents.index', compact('pageData', 'biddingDocuments'));
    }

    public function download_tenders()
    {
        $pageData = Page::where('slug', 'download')->firstorfail();
        // $categoryId = DB::table('categories')->where('title', 'Tenders')->value('id');
        $download = Download::orderBy('id', 'desc')->paginate(20);
        return view('front.pages.downloads.index', compact('pageData', 'download'));
    }

    public function download_kp_youth_policy()
    {
        // $pageData = Page::where('slug', 'download')->firstorfail();
        // $categoryId = DB::table('categories')->where('title', 'KP Youth Policy')->value('id');
        // $policies = Download::where('category_id', $categoryId)->orderBy('id', 'desc')->paginate(20);
        // return view('front.pages.downloads.youth-policies.index', compact('pageData','policies'));
        return response()->file(public_path('pdf/KP-Youth-Policy-2016.pdf'));
    }

    public function download_sports_policy()
    {
        // $pageData = Page::where('slug', 'download')->firstorfail();
        $categoryId = DB::table('categories')->where('title', 'Sports Policy')->value('id');
        $sportPolicy = Download::where('category_id', $categoryId)->first();
        return redirect(url($sportPolicy->getFirstMediaUrl('download')));
    }

    public function e_office()
    {
        return redirect()->away('https://kpyouthaffairs.gov.pk/hr/');
    }

    public function aboutus()
    {
        $pageData = Page::where('slug', 'about-us')->firstorfail();
        return view('front.pages.aboutus.aboutus', compact('pageData'));
    }

    public function create_organization()
    {
        $pageData = Page::where('slug', 'organization-registration')->firstorfail();
        return view('front.pages.organization-registration.create', compact('pageData'));
    }

    public function dynamic($slug)
    {
        $pageData = Page::where('slug', $slug)->firstorfail();
        return View('front.pages.dynamic', compact('pageData'));
    }


    public function gallery(Request $request)
    {
        $pageData = Page::where('slug', 'gallery')->firstorfail();
        $galleries = Gallary::where('status', 1)->paginate(10);
        return View('front.pages.gallery', compact('galleries'));
    }

    public function contactus()
    {
        return view('front.pages.contact');
    }

    public function events(Request $request)
    {

        $pageData = Page::where('slug', 'events')->firstorfail();
        // dd($pageData);

        if ($request->ajax()) {
            $data = Event::get();
            return response()->json($data);
        }
        $event = Event::get();

        return view('front.pages.events', compact('pageData', 'event'));
    }

    public function new_events()
    {
        $pageData = Page::where('slug', 'events')->firstorfail();
        $events = Event::where(['event_category' => 'new', 'is_deleted' => 0])->orderBy('id', 'desc')->paginate(6);
        return view('front.pages.new-events', compact('pageData', 'events'));
    }

    public function past_events()
    {
        $pageData = Page::where('slug', 'events')->firstorfail();
        $events = Event::where(['event_category' => 'past', 'is_deleted' => 0])->orderBy('id', 'desc')->paginate(6);
        return view('front.pages.past-events', compact('pageData', 'events'));
    }

    public function past_event_details($id)
    {
        $pageData = Page::where('slug', 'events')->firstorfail();
        $event = Event::where('id', $id)->first();
        $events = Event::where([['event_category', 'past'], ['id', '<>', $id]])->get();
        if (Str::length($event->social_links) > 0) {
            $socialLinks = explode(',', $event->social_links);
            return view('front.pages.past-event-details', compact('pageData', 'events', 'event', 'socialLinks'));
        } else {
            return view('front.pages.past-event-details', compact('pageData', 'events', 'event'));
        }
    }

    public function board_of_director()
    {

        $pageData = Page::where('slug', 'board-of-directors')->firstorfail();


        return view('front.pages.board_of_director', compact('pageData'));
    }


    public function financialassistance()
    {

        $pageData = Page::where('slug', 'financial-assistance')->firstorfail();


        return view('front.pages.financial_assistance', compact('pageData'));
    }

    public function kohatacadmey()
    {
        // dd("test");
        $pageData = Page::where('slug', 'kohat-academy')->firstorfail();
        return view('front.pages.kohatacadmey', compact('pageData'));
    }
    public function languagecenter()
    {
        // dd("test");
        // $pageData = Page::where('slug', 'kohatacadmey')->firstorfail();
        return view('front.pages.languagecenter');
    }



    public function staructure()
    {

        $pageData = Page::where('slug', 'staructure')->firstorfail();


        return view('front.pages.staructure', compact('pageData'));
    }

    public function functions()
    {

        $pageData = Page::where('slug', 'functions')->firstorfail();


        return view('front.pages.functions', compact('pageData'));
    }

    public function scholarshipget($slug)
    {


        // $pageData = Page::where('slug', 'scholarships')->firstorfail();
        $pageData = Page::where('slug', $slug)->firstorfail();
        // dd($pageData);

        $scholarship = Scholarship::where('slug', $slug)->firstorfail();
        // dd('test');

        return view('front.pages.scholarship', compact('pageData', 'scholarship'));
    }
    public function alumni()
    {

        $pageData = Page::where('slug', 'alumni')->firstorfail();
        $alumni = Team::where('type', 'alumni')->get();
        // dd('test');

        return view('front.pages.alumni', compact('pageData', 'alumni'));
    }

    public function download_proposal_template()
    {
        return response()->file(public_path('word/Templete-for-proposal.docx'));
    }

    public function download_service_rules_acts()
    {
        $pageData = Page::where('slug', 'download')->firstorfail();
        $categoryId = DB::table('categories')->where('title', 'Service Rules / Acts')->value('id');
        $serviceRulesActs = Download::where(['category_id' => $categoryId, 'status' => 1])->orderBy('id', 'desc')->paginate(20);
        return view('front.pages.downloads.rules.index', compact('pageData', 'serviceRulesActs'));
    }

    public function sports_events()
    {
        $pageData = Page::where('slug', 'events')->firstorfail();
        return view('front.pages.events.sports.index', compact('pageData'));
    }

    public function youth_affairs_events()
    {
        $pageData = Page::where('slug', 'youth-affairs-events')->firstorfail();
        return view('front.pages.events.youth-affairs.index', compact('pageData'));
    }

    public function show_message($id)
    {
        $admin = Team::where('id', $id)->firstOrFail();
        return view('front.pages.message', compact('admin'));
    }

    public function faqs()
    {
        $pageData = Page::where('slug', 'faqs')->firstorfail();
        $faqs = FAQ::paginate(5);
        return view('front.pages.faqs', compact('pageData', 'faqs'));
    }

    public function youth_affairs_gallery()
    {
        return redirect()->away('http://kpyep.kpitb.online/gallery');
    }

    public function work_index()
    {

        return view('front.pages.work');
    }
}
