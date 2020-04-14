<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    @yield('title')

    <!-- Fontfaces CSS-->
    <link href="{{ asset('bower_components/hai-bower/Admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bower_components/hai-bower/Admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bower_components/hai-bower/Admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bower_components/hai-bower/Admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('bower_components/hai-bower/Admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- bower_components/hai-bower/Admin/Vendor CSS-->
    <link href="{{ asset('bower_components/hai-bower/Admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bower_components/hai-bower/Admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bower_components/hai-bower/Admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bower_components/hai-bower/Admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bower_components/hai-bower/Admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bower_components/hai-bower/Admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bower_components/hai-bower/Admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('bower_components/hai-bower/font-awesome.js') }}" rel="stylesheet">
    <!-- Main CSS-->
    <link href="{{ asset('bower_components/hai-bower/Admin/css/theme.css') }}" rel="stylesheet" media="all">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>

<body>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{ route('dashboard') }}">
                            <img src="{{ asset('bower_components/hai-bower/Admin/images/icon/logo.png') }}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="{{ \Request::is('admin') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li class="has-sub {{ \Request::is('admin/category*') ? 'active' : '' }}">
                            <a class="js-arrow" href="#">
                                <i class="far fa-list-alt"></i>Categories</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('get.all.categories') }}"><i class="fas fa-ellipsis-h"></i>List Categories</a>
                                </li>
                                <li>
                                    <a href="{{ route('get.add.category') }}"><i class="fas fa-plus"></i>Add Category</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub {{ \Request::is('admin/course*') ? 'active' : '' }}">
                            <a class="js-arrow" href="#">
                                <i class="far fa-newspaper"></i>Courses</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('get.all.courses') }}"><i class="fas fa-ellipsis-h"></i>List Courses</a>
                                </li>
                                <li>
                                    <a href="{{ route('get.add.course') }}"><i class="fas fa-plus"></i>Add Course</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub {{ \Request::is('admin/lession*') ? 'active' : '' }}">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-book"></i>Lessions</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('get.all.lessions') }}"><i class="fas fa-ellipsis-h"></i>List Lessions</a>
                                </li>
                                <li>
                                    <a href="{{ route('get.add.lession') }}"><i class="fas fa-plus"></i>Add Lession</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub {{ \Request::is('admin/question*') ? 'active' : '' }}">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-question"></i>Questions</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('get.all.questions') }}"><i class="fas fa-ellipsis-h"></i>List Questions</a>
                                </li>
                                <li>
                                    <a href="{{ route('get.add.question') }}"><i class="fas fa-plus"></i>Add Question</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub {{ \Request::is('admin/test*') ? 'active' : '' }}">
                            <a class="js-arrow" href="{{ route('get.all.tests') }}">
                                <i class="fas fa-book"></i>Tests
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Users</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index.html"><i class="fas fa-ellipsis-h"></i>List Users</a>
                                </li>
                                <li>
                                    <a href="index2.html"><i class="fas fa-plus"></i>Add User</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('bower_components/hai-bower/Admin/images/icon/logo.png') }}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="{{ \Request::is('admin') ? 'active' : '' }} has-sub">
                            <a class="js-arrow" href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li class="has-sub {{ \Request::is('admin/category*') ? 'active' : '' }}">
                            <a class="js-arrow" href="#">
                                <i class="far fa-list-alt"></i>Categories</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('get.all.categories') }}"><i class="fas fa-ellipsis-h"></i>List Categories</a>
                                </li>
                                <li>
                                    <a href="{{ route('get.add.category') }}"><i class="fas fa-plus"></i>Add Category</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub {{ \Request::is('admin/course*') ? 'active' : '' }}">
                            <a class="js-arrow" href="#">
                                <i class="far fa-newspaper"></i>Courses</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('get.all.courses') }}"><i class="fas fa-ellipsis-h"></i>List Courses</a>
                                </li>
                                <li>
                                    <a href="{{ route('get.add.course') }}"><i class="fas fa-plus"></i>Add Course</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub {{ \Request::is('admin/lession*') ? 'active' : '' }}">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-book"></i>Lessions</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('get.all.lessions') }}"><i class="fas fa-ellipsis-h"></i>List Lessions</a>
                                </li>
                                <li>
                                    <a href="{{ route('get.add.lession') }}"><i class="fas fa-plus"></i>Add Lession</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub {{ \Request::is('admin/test*') ? 'active' : '' }}">
                            <a class="js-arrow" href="{{ route('get.all.tests') }}">
                                <i class="fas fa-book"></i>Tests</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('get.all.tests') }}"><i class="fas fa-ellipsis-h"></i>List Tests</a>
                                </li>
                                <li>
                                    <a href="{{ route('get.add.test') }}"><i class="fas fa-plus"></i>Add Test</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub {{ \Request::is('admin/question*') ? 'active' : '' }}">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-question"></i>Questions</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('get.all.questions') }}"><i class="fas fa-ellipsis-h"></i>List Questions</a>
                                </li>
                                <li>
                                    <a href="{{ route('get.add.question') }}"><i class="fas fa-plus"></i>Add Question</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Users</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index.html"><i class="fas fa-ellipsis-h"></i>List Users</a>
                                </li>
                                <li>
                                    <a href="index2.html"><i class="fas fa-plus"></i>Add User</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="{{ route('admin.search') }}" method="POST">
                                @csrf
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{ asset(Auth::user()->avatar) }}" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{ asset(Auth::user()->avatar) }}" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ Auth::user()->name }}</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ route('admin.get.logout') }}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    @yield('content')
                </div>
            </div>

            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->

    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('bower_components/hai-bower/Admin/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('bower_components/hai-bower/Admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('bower_components/hai-bower/Admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('bower_components/hai-bower/Admin/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('bower_components/hai-bower/Admin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('bower_components/hai-bower/Admin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('bower_components/hai-bower/Admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('bower_components/hai-bower/Admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('bower_components/hai-bower/Admin/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('bower_components/hai-bower/Admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('bower_components/hai-bower/Admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('bower_components/hai-bower/Admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('bower_components/hai-bower/Admin/vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('bower_components/hai-bower/Admin/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->
