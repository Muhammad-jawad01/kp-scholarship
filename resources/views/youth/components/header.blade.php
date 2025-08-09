<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow" style="background-color: #047f43; color:white" >
    <div class="navbar-wrapper" >
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile" >
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>

                    </ul>

                </div>
                <ul class="nav navbar-nav float-right">

                    <!-- ================================= -->
                    <!--  Youth Name and profile -->
                    <!-- ================================= -->
                    {{-- <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600 mr-1 mt-1">{{Auth::user()->name}}</span></div><span><img class="round" src="{{Auth::user()->getFirstMediaUrl('profile')}}" style="display: {{\Auth::user()->getFirstMediaUrl('profile') != '' ? 'block' : 'none'}}" alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><!--<a class="dropdown-item" href="page-user-profile.html"><i class="feather icon-user"></i> Edit Profile</a><a class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> My Inbox</a><a class="dropdown-item" href="app-todo.html"><i class="feather icon-check-square"></i> Task</a><a class="dropdown-item" href="app-chat.html"><i class="feather icon-message-square"></i> Chats</a> -->
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="{{url('logout')}}"><i class="feather icon-power"></i> Logout</a>
                        </div>
                    </li> --}}
                    <ul class="nav navbar-nav align-items-center ml-auto">
                        <li class="nav-item dropdown dropdown-language">
                          <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-us"></i>
                            <span class="selected-language  text-white">English</span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                            <a class="dropdown-item" href="{{url('lang/en')}}" data-language="en">
                              <i class="flag-icon flag-icon-us"></i> English
                            </a>

                            <a class="dropdown-item" href="{{url('lang/ur')}}" data-language="ur">
                              <i class="flag-icon flag-icon-pk"></i> اردو
                            </a>

                        </li>
                        <li class="nav-item dropdown dropdown-user">
                          <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="user-nav d-sm-flex d-none">
                              <span class="user-name font-weight-bolder text-white">{{Auth::User()->name}}</span>
                              @if(Auth::User()->has('roles'))
                              @foreach(Auth::User()->roles as $role)
                              <span class="user-status  text-white">{{$role->name}}</span>
                              @endforeach
                              @endif
                            </div>
                            <!-- <span class="avatar">
                              <img class="round" src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="40" width="40">
                              <span class="avatar-status-online"></span>
                            </span> -->
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">

                            <div class="dropdown-divider"></div>

                              <a class="dropdown-item" href="{{url('logout')}}">
                                <i class="mr-50" data-feather="power"></i> Logout
                              </a>
                          </div>
                        </li>

                </ul>

            </div>
        </div>
    </div>
</nav>
