@extends('front/layouts/layout')

@section('title', 'About Us')
@section('content')

    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <section class="custom-container">
        <article id="post-175" class="post-175 page type-page status-publish hentry">
            <header class="entry-header mt-4">
                <h1 class="entry-title"><b>About Us</b></h1>
                <hr>
                <h3><b>Youth Policy</b></h3>
                <p class="about_text">Khyber Pakhtunkhwa Youth Policy is the central tool to systemically integrate, implement, and evaluate
                    all youth development work in the province. The policy based on three pillars:</p>
                <p class="about_text">Youth development through Economic, Social and Political Empowerment To predict empowering strategies,
                    institutional mechanisms and the action points for multiple public, private and social sector
                    stakeholders which are working to develop youth in the province.</p>
                <h3><b>Why Youth Policy?</b></h3>
                <p class="about_text">In Khyber Pakhtunkhwa population of active youth (15 – 29) is 35%. Presence of a huge youth population
                    will mean more resources, jobs, food security; increased social vibrancy; and political participation.
                    In the desired and best case scenario, this youth bulge may serve as a dividend for the nation and youth
                    can become the vehicle for change.

                    To use this HR resources effectively and efficiently

                    According to need analysis of population if this HR resources didn’t manage properly then it will be a
                    great disaster for the province (increase in unemployment & threat to law and order situation)</p>
                <h3><b>Vision</b></h3>
                <p class="about_text">The Directorate of Youth Affairs, Khyber Pakhtunkhwa was established as independent Directorate in the
                    year 2017. The Khyber Purpose of the Directorate Establishement is to:-</p>
                <p class="about_text"><b>Youth Rights (Health, Decision Making, Political/Civic Participation, Marginalized & Minorities youth
                        etc.)</b></p>
                <p class="about_text">Youth activism and volunteerism plays important role in engagement of youth in peace building and
                    conflict transformation processes, inclusion of marginalized & minorities youth in main streamline.</p>
                <p class="about_text"><b> Personality grooming, Community engagement & development (Sports & Extracurricular activities,
                        Volunteerism, Entrepreneurship, Hassle Free Loan, Internship, On Campus Job & Job Placement)</b></p>
                <ol>
                    <li class="about_text">Sports/ Extracurricular activities (dedication and encouragement of youth) -- How?</li>
                    <li class="about_text">Physical activities (Sports – all categories)</li>
                    <li class="about_text">General (Soft activities i.e. Debate/Speech, drama, etc)</li>
                </ol>
            </header><!-- .entry-header -->
            <div class="entry-content">

            </div>
            <!-- .entry-content -->
        </article>
    </section>

@endsection

@section('script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script>
        $(document).ready(function() {

            $('.datatable').DataTable();
        });
    </script>
@endsection
