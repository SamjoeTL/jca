<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pacha Mama">
    <meta name="keywords" content="Pacha Mama Guest House, Guest House Canggu, Canggu, Bali">
    <meta name="author" content="Patras Dev">
    <title>JCA - @yield('title-head')</title>

    <!-- Favicons-->
    <link rel="icon" href="{{ asset('images\logo\Logo.ico') }}">
    <link rel="shortcut icon" href="{{ asset('images\logo\Logo.ico') }}">
    {{-- <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('assets/img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('assets/img/apple-touch-icon-72x72-precomposed.pn') }}g">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('assets/img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('assets/img/apple-touch-icon-144x144-precomposed.png') }}"> --}}

    <!-- GOOGLE WEB FONT-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500&amp;family=Montserrat:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/vendors.min.css') }}" rel="stylesheet">

    @yield('css')
    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
</head>

<body>

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div>

    <header class="fixed_header menu_v4 submenu_version">
        <div class="layer"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-3">
                    <a href="index.html" class="logo_normal"><img src="{{ asset('assets/img/logo-light.png') }}" alt=""></a>
                    <a href="index.html" class="logo_sticky"><img src="{{ asset('assets/img/logo-light.png') }}" alt=""></a>
                </div>
                <div class="col-9">
                    <div class="main-menu">
                        <a href="#" class="closebt open_close_menu"><i class="bi bi-x"></i></a>
                        <div class="logo_panel"><img src="{{ asset('assets/img/logo-footer.png') }}" alt=""></div>
                        <nav id="mainNav">
                            <ul>
                                 <li>
                                    <a class="{{ Request::is('/') ? 'active' : '' }}" href="{{ Request::is('/') ? '#' : route('Dashboard') }}">Dashboard</a>
                                </li>
                                <li>
                                    <a class="{{ Request::is('home') ? 'active' : '' }}" href="{{ Request::is('home') ? '#' : route('home') }}">Home</a>
                                </li>
                                <li>
                                    <a class="{{ Request::is('about') ? 'active' : '' }}" href="{{ Request::is('about') ? '#' : route('about') }}">About</a>
                                </li>
                                <li>
                                    <a class="{{ Request::is('product') ? 'active' : '' }}" href="{{ Request::is('product') ? '#' : route('product') }}">Product</a>
                                </li>
                                <li class="d-none d-lg-inline"><a href="https://wa.me/+6281911666767" target="_blank" class="btn_1">Book Now</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="d-flex align-items-center justify-content-end d-block d-lg-none">
                        <div class="header-book">
                            <a href="https://wa.me/+6281911666767" target="_blank" class="btn_1">Book Now</a>
                        </div>
                        <div class="hamburger_2 open_close_menu float-end">
                            <div class="hamburger__box">
                                <div class="hamburger__inner"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>

        @yield('content')

    </main>

    <footer class="revealed">
        <div class="footer_bg">
            <div class="gradient_over"></div>
            <div class="background-image" data-background="url({{ asset('assets/img/home/bg-footer.jpg') }})"></div>
        </div>
        <div class="container">
            <div class="row move_content justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="footer text-center">
                        <img class="footer-img" src="{{asset('assets/img/logo-footer.png')}}" alt="">
                        <ul class="contact">
                            <li>
                                <i class="bi bi-geo-alt"></i>
                                <a href="https://maps.app.goo.gl/SWExuf91RVtGg6S77" target="_blank">Tumbakbayuh Street, Pererenan</a>
                            </li>
                            <li>
                                <i class="bi bi-envelope-paper"></i>
                                <a href="mailto:jca@gmail.com">jca@gmail.com</a></li>
                            <li>
                                <i class="bi bi-whatsapp"></i>
                                <a href="https://wa.me/+62812494736607" target="_blank">+62 812-49147-3660</a>
                            </li>
                        </ul>
                        <div class="social">
                            <h6>Follow Us :</h6>
                            <ul>
                                <li><a href="#0"><i class="bi bi-instagram"></i></a></li>
                                <li><a href="#0"><i class="bi bi-facebook"></i></a></li>
                                <li><a href="#0"><i class="bi bi-twitter"></i></a></li>
                                <li><a href="#0"><i class="bi bi-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/container-->
        <div class="copy">
            <div class="container">
                Jembatan Cemerlang Abadi © 2024 - <a href="#">Patras Dev</a>
            </div>
        </div>
    </footer>
    <!-- /footer -->

    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
        </svg>
    </div>
    <!-- /back to top -->

    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('assets/js/common_scripts.js') }}"></script>
    <script src="{{ asset('assets/js/common_functions.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/datepicker_inline.js') }}"></script> --}}
    <script src="{{ asset('assets/phpmailer/validate.js') }}"></script>

    @yield('page-js')

</body>

</html>
