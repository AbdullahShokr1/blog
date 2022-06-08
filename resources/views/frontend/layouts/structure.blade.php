<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!--Start Style Files-->
        <link rel="stylesheet" href="{{ asset("css/bootstrap.rtl.min.css") }}"/>
        <link rel="stylesheet" href="{{ asset('css/all.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}"/>
        <link rel='stylesheet' href="{{ asset('css/unicons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/darkmode.css') }}"/>
        <!--End Style Files-->
    </head>
    <body>
        @guest    
            @else
            @if (Auth::user()->isAdmin())
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <div >
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto" class="collapse multi-collapse" id="multiCollapseExample1">
                            <!-- Authentication Links -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">{{ Auth::user()->name }}</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            @endif
        @endguest
        <!--#1 Start Header-->
        <header>
            <!--#1.1 Start upper-bar-->
            <section class='upper-bar'>
                <section class='container'>
                    <section class='row'>
                        <section class='call-bar col-md'>أتصل الان رقم الواتس <i class="fa fa-phone"></i> : <span><a href='#'>201127251057+</a></span></section>
                        <section class='socil col-md '>
                            <ul>
                                <li class="nav-item"><a class="nav-link" href='#'><i class="fab fa-facebook"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href='#'><i class="fab fa-twitter"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href='#'><i class="fab fa-instagram"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href='#'><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </section>
                        <section class='mode col-md'>
                            <section class="switch"><section class="circle"></section></section>
                        </section>
                    </section>
                </section>
            </section>
            <!--#1.1 End upper-bar-->
            <!--#1.2 Start NavBar-->
            <section class='myNavbar'>
                <nav id='header' class="navbar navbar-expand-lg navbar-light px-5" dir="rtl">
                    <section class="container-fluid">
                        <section class='logo'>
                            <a href=''><img src='images/logo.png' alt='Logo'>أوامرك</a>
                        </section>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <section class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">الرئيسية</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            تنظيف منازل
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">جدة</a></li>
                            <li><a class="dropdown-item" href="#">مكة</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">المدينة المنورة</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">الرياض</a></li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">تنظيف بالرياض</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">مكافحة حشرات</a></li>
                                    <li><a class="dropdown-item" href="#">تنظيف خزانات</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">نقل عفش</a></li>
                                    </ul>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">شركة نقل عفش</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">تنظيف بجدة</a></li>
                                    <li><a class="dropdown-item" href="#">شركة تنظيف بجدة </a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">شركة ممافحة حشرات بجدة</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="#">القصيم</a></li>
                                </ul>
                            </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">مكافحة حشرات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">تنظيف خزانات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">تنظيف بالبخار</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">نقل عفش</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">سياسة الخصوصية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">من نحن</a>
                        </li>
                        </ul>
                    </section>
                    </section>
                </nav>
            </section>
            <!--#1.2 End NavBar-->
        </header>
        <!--#1 End Header-->
        <!-- Page Content -->
        @yield('content')
        <!--#7 Start Footer-->
        <footer>
            <section class="container">
                <footer class="py-5">
                <section class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                    <section class="col">
                        <img class="info-img d-block mx-auto" src="images/logo.png" alt="" width="72" height="57">
                        <h3 class="text-center"class="text-center">Section</h3>
                        <p>
                            حسب المجلس الثقافي البريطاني فإن تعليم الإنجليزية داخل بريطانيا يسهم في تعزيز اقتصادها بما يتجاوز ملياري جنيه سنوياً، كما أنه وفر أكثر من 26 ألف وظيفة.
                        </p>
                    </section>
                    <section class="col my-5">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                        </ul>
                    </section>
                    <section class="col my-5">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        </ul>
                    </section>
                    <section class="col my-5">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                        </ul>
                    </section>
                    <!-- <section class="col-4 offset-1">
                    <form>
                        <h5>Subscribe to our newsletter</h5>
                        <p>Monthly digest of whats new and exciting from us.</p>
                        <section class="d-flex w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                        </section>
                    </form>
                    </section> -->
                </section>
            
                <section class="d-flex justify-content-center py-4 my-4 border-top">
                    <p>&copy; 2021 Company, Inc. All rights reserved.</p>
                    <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-dark" href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><i class="fab fa-facebook"></i></a></li>
                    </ul>
                </section>
                </footer>
            </section>
        </footer>
        <!--#7 End Footer-->
        <section class="progress-wrap">
            <svg  class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
            </svg>
        </section>
        <!--Start JS Files-->
        <script src='{{ asset('js/jquery.min.js') }}'></script>
        <script src='{{ asset('js/bootstrap.min.js') }}'></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/fontawesome.min.js') }}"></script>
        <script src="{{ asset('js/all.min.js') }}"></script>
        <script src="{{ asset('js/myscript.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <!--End JS Files-->
    </body> 
</html>
        