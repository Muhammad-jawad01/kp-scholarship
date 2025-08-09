<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Youth Registration - Directorate of Youth Affairs</title>

    <!-- Theme Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/metisMenu.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/morris-0.4.3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


    <script src="{{ asset('js/modernizr.js') }}"></script>
</head>

<body style="overflow: hidden;">
    <!--top bar-->
    <div class="topbar bg-success">

        <div class="topbar-left">
            <div class="text-center bg-info">
                <a href="index.html" class="bg-info text-white"><img src="images/logo.png" alt="">Directorate of
                    Youth Affairs</a>
            </div>
        </div>
        <div class="pull-left menu-toggle">
            <i class="fa fa-bars"></i>
        </div>

        <ul class="nav navbar-nav  top-right-nav hidden-xs">


            <li class="dropdown profile-link hidden-xs">
                <div class="clearfix">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="images/user.png" alt="" class="pull-left">
                        <span>{{Auth::User()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                </div>

            </li>

        </ul>
    </div>
    <!--end top bar-->
    <div class="side-menu left" id="side-menu">

        <ul class="metismenu clearfix" id="menu">
            <li class="profile-menu visible-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="images/user.png" alt="" class="pull-left">
                    <span>{{ $youth_name }}</span>
                </a>
                <!-- <ul class="dropdown-menu profile-drop">
                            <li><a href="#">Account</a></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul> -->
            </li>
            <li><a href="{{ route('profile.index') }}"><i class="fa fa-user"></i><span>Profile</span></a></li>

            <li>
                <a href="{{ route('experience.index') }}"><i
                        class="fa fa-user-plus"></i><span>Experience</span></span></a>
            </li>

            <li>
                <a href="{{ route('education.index') }}"><i class="fa fa-book"></i><span>Education</span></span></a>
            </li>
            <li>
                <a href="{{ route('education.index') }}"><i class="fa fa-photo"></i><span>Profile
                        Picture</span></span></a>
            </li>

            <!-- <li>
                        <a href="#"><i class="fa fa-envelope"></i> <span>Mailbox </span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="mailbox.html">Inbox</a></li>
                            <li><a href="mail_detail.html">Email view</a></li>
                            <li><a href="mail_compose.html">Compose email</a></li>
                        </ul>
                    </li> -->
            <!-- <li>
                        <a href="#"><i class="fa fa-edit"></i> <span>Forms</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="form_basic.html">Basic form</a></li>
                            <li><a href="form_wizard.html">Wizard</a></li>
                            <li><a href="form_file_upload.html">File Upload</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i> <span>Tables</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="table_basic.html">Static Tables</a></li>
                            <li><a href="table_data_tables.html">Data Tables</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="lockscreen.html">Lockscreen</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="404.html">404 Page</a></li>
                            <li><a href="empty_page.html">Empty page</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">UI Elements</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="icons.html">Icons</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="video.html">Video</a></li>
                            <li><a href="tabs.html">Tabs</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> <span>Menu Levels </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="nav-bottom clearfix">
                    <a href="#" style="border-right: 0px;"><i class="fa fa-lock"></i></a>
                    <a href="#" style="border-right: 0px;"><i class="fa fa-download"></i></a>
                    <a href="#" style="border-right: 0px;"><i class="fa fa-globe"></i></a>
                    <a href="#" style="border-right: 0px;"><i class="fa fa-phone"></i></a>
                </div> -->
    </div>
    <!--left menu end-->
    <div class="content-page equal-height">
        <div class="content">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
    <div class="footer">
        <span>Copyright &copy; 2022. KPITB.</span>
    </div>
    <!-- Plugins  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.js') }}"></script>
    <script src="{{ asset('assets/js/moment.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.flot.selection.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('assets/js/raphael-2.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/morris.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/core.js') }}"></script>
    <script src="{{ asset('assets/js/mediaquery.js') }}"></script>
    <script src="{{ asset('assets/js/equalize.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script>
        $("#sparkline8").sparkline([5, 6, 7, 2, 0, 4, 2, 4, 5, 7, 2, 4, 12, 14, 4, 2, 14, 12, 7], {
            type: 'bar',
            barWidth: 4,
            height: '60px',
            barColor: '#f7b03e',
            negBarColor: '#c6c6c6'
        });
        $(".sparkline8").sparkline([4, 2], {
            type: 'pie',
            sliceColors: ['#f7af3e', '#404652']
        });
        $(".sparkline9").sparkline([3, 2], {
            type: 'pie',
            sliceColors: ['#f7af3e', '#404652']
        });
        $(".sparkline10").sparkline([4, 1], {
            type: 'pie',
            sliceColors: ['#f7af3e', '#404652']
        });
        $(".sparkline11").sparkline([1, 3], {
            type: 'pie',
            sliceColors: ['#f7af3e', '#404652']
        });
        $(".sparkline12").sparkline([3, 5], {
            type: 'pie',
            sliceColors: ['#f7af3e', '#404652']
        });
        $(".sparkline13").sparkline([6, 2], {
            type: 'pie',
            sliceColors: ['#f7af3e', '#404652']
        });

        //moris chart
        $(function() {
            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: "Example dataset",
                        fillColor: "rgba(235, 162, 59,0.5)",
                        strokeColor: "rgba(235, 162, 59,1)",
                        pointColor: "rgba(235, 162, 59,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(235, 162, 59,1)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "Example dataset",
                        fillColor: "rgba(247, 176, 62,0.5)",
                        strokeColor: "rgba(247, 176, 62,0.7)",
                        pointColor: "rgba(247, 176, 62,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(247, 176, 62,1)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };
            var lineOptions = {
                scaleShowGridLines: true,
                scaleGridLineColor: "#b5884c",
                scaleGridLineWidth: 1,
                bezierCurve: true,
                bezierCurveTension: 0.4,
                pointDot: true,
                pointDotRadius: 4,
                pointDotStrokeWidth: 1,
                pointHitDetectionRadius: 20,
                datasetStroke: true,
                datasetStrokeWidth: 2,
                datasetFill: true,
                responsive: true
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            var myNewChart = new Chart(ctx).Line(lineData, lineOptions);


            var polarData = [{
                    value: 300,
                    color: "#f7b03e",
                    highlight: "#3d3f4b",
                    label: "App"
                },
                {
                    value: 140,
                    color: "#f5c06c",
                    highlight: "#3d3f4b",
                    label: "Software"
                },
                {
                    value: 200,
                    color: "#bd914a",
                    highlight: "#3d3f4b",
                    label: "Laptop"
                }
            ];

            var polarOptions = {
                scaleShowLabelBackdrop: true,
                scaleBackdropColor: "rgba(255,255,255,0.75)",
                scaleBeginAtZero: true,
                scaleBackdropPaddingY: 1,
                scaleBackdropPaddingX: 1,
                scaleShowLine: true,
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
                responsive: true

            };

            var ctx = document.getElementById("polarChart").getContext("2d");
            var myNewChart = new Chart(ctx).PolarArea(polarData, polarOptions);

            var barData = {
                labels: ["Monday", "Tuesday", "Wedneday", "Thrusday", "Friday"],
                datasets: [{
                    label: "My Second dataset",
                    fillColor: "#aeaeae",
                    strokeColor: "#aeaeae",
                    highlightFill: "#eda01c",
                    highlightStroke: "#eda01c",
                    data: [28, 48, 40, 19, 86]
                }]
            };

            var barOptions = {
                scaleBeginAtZero: true,
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                barShowStroke: true,
                barStrokeWidth: 1,
                barValueSpacing: 1,
                barDatasetSpacing: 1,
                responsive: true
            };


            var ctx = document.getElementById("barChart").getContext("2d");
            var myNewChart = new Chart(ctx).Bar(barData, barOptions);

            var radarData = {
                labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
                datasets: [{
                        label: "My First dataset",
                        fillColor: "rgba(235, 162, 59,1)",
                        strokeColor: "rgba(235, 162, 59,1)",
                        pointColor: "rgba(235, 162, 59,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(235, 162, 59,1)",
                        data: [65, 59, 90, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(247, 176, 62,1)",
                        strokeColor: "rgba(247, 176, 62,1)",
                        pointColor: "rgba(247, 176, 62,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(255,255,255,1)",
                        data: [28, 48, 40, 19, 96, 27, 100]
                    }
                ]
            };

            var radarOptions = {
                scaleShowLine: true,
                angleShowLineOut: true,
                scaleShowLabels: false,
                scaleBeginAtZero: true,
                angleLineColor: "rgba(0,0,0,.1)",
                angleLineWidth: 1,
                pointLabelFontStyle: "normal",
                pointLabelFontSize: 10,
                pointLabelFontColor: "#666",
                pointDot: true,
                pointDotRadius: 3,
                pointDotStrokeWidth: 1,
                pointHitDetectionRadius: 20,
                datasetStroke: true,
                datasetStrokeWidth: 2,
                datasetFill: true,
                responsive: true
            };

            var ctx = document.getElementById("radarChart").getContext("2d");
            var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

            var data = [{
                label: "Sales 1",
                data: 21,
                color: "#d3d3d3"
            }, {
                label: "Sales 2",
                data: 3,
                color: "#bababa"
            }, {
                label: "Sales 3",
                data: 15,
                color: "#79d2c0"
            }, {
                label: "Sales 4",
                data: 52,
                color: "#f7b03e"
            }];

            var doughnutData = [{
                    value: 300,
                    color: "#d53d2f",
                    highlight: "#ba8036",
                    label: "Chorme"
                },
                {
                    value: 150,
                    color: "#dedede",
                    highlight: "#ba8036",
                    label: "Mozilla"
                },
                {
                    value: 130,
                    color: "#03a679",
                    highlight: "#ba8036",
                    label: "Safari"
                }
            ];

            var doughnutOptions = {
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 4,
                percentageInnerCutout: 45, // This is 0 for Pie charts
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
                responsive: true
            };


            var ctx = document.getElementById("doughnutChart").getContext("2d");
            var myNewChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

            //line chart
            Morris.Line({
                element: 'morris-line-chart',
                data: [{
                        y: '2006',
                        a: 0,
                        b: 10
                    },
                    {
                        y: '2007',
                        a: 25,
                        b: 35
                    },
                    {
                        y: '2008',
                        a: 30,
                        b: 40
                    },
                    {
                        y: '2009',
                        a: 20,
                        b: 25
                    },
                    {
                        y: '2010',
                        a: 37,
                        b: 40
                    }
                ],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Series A', 'Series B'],
                hideHover: 'auto',
                resize: true,
                lineColors: ['#ddcc36', '#f7b03e']
            });


        });
    </script>
</body>

</html>
