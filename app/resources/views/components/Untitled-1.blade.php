  <nav class="navbar navbar-expand-lg navbar-light">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 border-right">
              <li class="nav-item">
                  <a class="nav-link  {{ Request::is('/') == true ? 'active' : '' }}" aria-current="page"
                      href="{{ url('/') }}">Home</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle {{ Request::is('aboutus/*') == true ? 'active' : '' }}"
                      href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      About
                      <img src="{{ asset('front/assets/images/angle-small-down.svg') }}" alt=""
                          class="dropdown-icon float-lg-none float-end mt-2 mt-lg-0" />
                  </a>
                  <ul class="dropdown-menu rounded-0 p-0" aria-labelledby="navbarDropdown">
                      <li><a class="nav-link" href="{{ route('pages.aboutus.dynamic', ['slug' => 'about-us']) }}">About
                              Us</a></li>
                      <li><a class="nav-link" href="{{ route('pages.aboutus.dynamic', ['slug' => 'our-vision']) }}">Our
                              Vision</a></li>
                      <li><a class="nav-link" href="{{ route('pages.aboutus.dynamic', ['slug' => 'our-mission']) }}">Our
                              Mission</a></li>

                  </ul>
              </li>
              <!-- <li class="nav-item">
                                                <a class="nav-link  {{ Request::is('contactbook') == true ? 'active' : '' }}" aria-current="page" href="{{ route('pages.contact-book') }}">Contact Book</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle {{ Request::is('education/*') == true ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Education
                                                    <img src="{{ asset('front/assets/images/angle-small-down.svg') }}" alt="" class="dropdown-icon float-lg-none float-end mt-2 mt-lg-0" />
                                                </a>
                                                <ul class="dropdown-menu rounded-0 p-0 " aria-labelledby="navbarDropdown">
                                                    <li><a class="dropdown-item" href="{{ route('pages.universities') }}">Universities</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('pages.colleges') }}">Colleges</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('pages.scholarships') }}">Scholarships</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('pages.books') }}">Books</a></li>
                                                </ul>
                                            </li> -->
              <!-- <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle {{ Request::is('careers/*') == true || Request::is('careers/*') == true ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Careers
                                                    <img src="{{ asset('front/assets/images/angle-small-down.svg') }}" alt="" class="dropdown-icon float-lg-none float-end mt-2 mt-lg-0" />
                                                </a>
                                                <ul class="dropdown-menu rounded-0 p-0" aria-labelledby="navbarDropdown">
                                                    <li><a class="dropdown-item" href="{{ route('pages.internships') }}">Internships</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('pages.jobs') }}">Jobs</a></li>
                                                </ul>
                                            </li> -->
              {{-- <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle {{ ((Request::is('facilities/*')==true)) ? 'active' : ''}}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Facilities
                                                    <img src="{{asset('front/assets/images/angle-small-down.svg')}}" alt="" class="dropdown-icon float-lg-none float-end mt-2 mt-lg-0" />
                                                </a>
                                                <ul class="dropdown-menu rounded-0 p-0" aria-labelledby="navbarDropdown">
                                                    <!-- <li><a class="dropdown-item" href="{{route('pages.facilities.youthaffairs')}}">Youth Affairs</a></li>
                                                    <li><a class="dropdown-item" href="{{route('pages.facilities.sports')}}">Sports</a></li>
                                                    <li><a class="dropdown-item" href="{{route('pages.facilities.tourism')}}">Tourism</a></li>
                                                    <li><a class="dropdown-item" href="{{route('pages.facilities.culture')}}">Culture</a></li> -->
                                                    <li><a class="dropdown-item" href="{{route('pages.facilities.jawan-marakiz')}}">Jawan Marakiz</a></li>
                                                    <li><a class="dropdown-item" href="{{route('pages.facilities.youth-hostels')}}">Youth Hostels</a></li>
                                                </ul>
                                            </li> --}}
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle {{ Request::is('events/*') == true ? 'active' : '' }}"
                      href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Events Calendar
                      <img src="{{ asset('front/assets/images/angle-small-down.svg') }}" alt=""
                          class="dropdown-icon float-lg-none float-end mt-2 mt-lg-0" />
                  </a>
                  <ul class="dropdown-menu rounded-0 p-0" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{ route('sports.events') }}">Sports Events</a></li>
                      <li><a class="dropdown-item" href="{{ route('youth.affairs.events') }}">Youth Affairs
                              Events</a></li>
                  </ul>
              </li>
              <!-- <li class="nav-item">
                                                <a class="nav-link {{ Request::is('events') == true ? 'active' : '' }}" href="{{ route('pages.events') }}">Events</a>
                                            </li> -->
              <!-- <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle {{ Request::is('events/*') == true ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Events
                                                    <img src="{{ asset('front/assets/images/angle-small-down.svg') }}" alt="" class="dropdown-icon float-lg-none float-end mt-2 mt-lg-0" />
                                                </a>
                                                <ul class="dropdown-menu rounded-0 p-0" aria-labelledby="navbarDropdown">
                                                    <li><a class="dropdown-item" href="{{ route('pages.events.youthaffairs') }}">Youth Affairs</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('pages.events.sports') }}">Sports</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('pages.events.tourism') }}">Tourism</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('pages.events.culture') }}">Culture</a></li>
                                                </ul>
                                            </li> -->
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle {{ Request::is('downloads/*') == true || Request::is('careers/*') == true ? 'active' : '' }}"
                      href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Downloads
                      <img src="{{ asset('front/assets/images/angle-small-down.svg') }}" alt=""
                          class="dropdown-icon float-lg-none float-end mt-2 mt-lg-0" />
                  </a>
                  <ul class="dropdown-menu rounded-0 p-0" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{ route('pages.proposal.template') }}">Proposal
                              Template</a></li>
                      <li><a class="dropdown-item" href="{{ route('pages.jobs') }}">Advertisements</a></li>
                      <li><a class="dropdown-item" href="{{ route('pages.downloads.bidding-documents') }}">Tenders
                              and Bidding Documents</a></li>
                      <li><a class="dropdown-item" href="{{ route('pages.service.rules.acts') }}">Service
                              Rules / Acts</a></li>
                      <li><a class="dropdown-item" href="{{ route('pages.downloads.kp-youth-policy') }}">KP
                              Youth Policy</a></li>
                      <li><a class="dropdown-item" href="{{ route('pages.downloads.sports-policy') }}">Sports
                              Policy</a></li>
                  </ul>
              </li>
              <!-- <li class="nav-item">
                                                <a class="nav-link {{ Request::is('contact-us') == true ? 'active' : '' }}" href="{{ url('contact-us') }}">Contact Us</a>
                                            </li> -->



              <li class="nav-item">
                  <a class="nav-link {{ Request::is('gallery') == true ? 'active' : '' }}"
                      href="{{ route('pages.gallery') }}">Gallery</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('teams') == true ? 'active' : '' }}"
                      href="{{ route('pages.team') }}">Team</a>
              </li>
              <!-- <li class="nav-item">
                                                <a class="nav-link {{ Request::is('aboutus') == true ? 'active' : '' }}" href="{{ route('pages.aboutus.dynamic', ['slug' => 'about-us']) }}">About Us</a>
                                            </li> -->
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('feedback') == true ? 'active' : '' }}"
                      href="{{ route('feedback.login') }}">Feedback</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('contactus') == true ? 'active' : '' }}"
                      href="{{ route('pages.contactus') }}">Contact Us</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('faqs') == true ? 'active' : '' }}"
                      href="{{ route('pages.faqs') }}">FAQs</a>
              </li>
              {{-- <li class="nav-item">
                                                <a class="nav-link {{Request::is('e-office')==true? 'active' : ''}}" href="{{route('pages.e-office')}}">E-Office</a>
                                            </li> --}}
          </ul>
      </div>
  </nav>
