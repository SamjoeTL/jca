<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
    <meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
    <meta name="author" content="CV. Patras Development">
    <title>JCA - Jembatan Cemerlang Abadi</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images\logo\Logo.ico') }}">
    <link rel="shortcut icon" href="{{ asset('images\logo\Logo.ico') }}">

    <!-- Main CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('app-assets/plugins/fancybox/jquery.fancybox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/real3d-317/real3d-flipbook/deploy/css/flipbook.style.css') }}">

    <!-- Swiper Css -->
    <link href="{{asset('css/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Custom styles -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
        <div class="container">
            <a class='navbar-brand' href='/'>
                <span class="logo">
                    <img src="images/logo/Logo.png" class="img-white" alt="logo">
                    <img src="images/logo/Logo.png" class="img-dark" alt="logo">
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="navbar-navlist">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">{{$lang == 'id' ? 'Beranda':'Home'}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">{{$lang == 'id' ? 'Tentang':'About'}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">{{$lang == 'id' ? 'Layanan':'Service'}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#product">{{$lang == 'id' ? 'Produk':'Product'}}</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="#sosmed">Social Media</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">{{$lang == 'id' ? 'Kontak':'Contact'}}</a>
                    </li>
                </ul>

            </div>
            <!-- End collapse -->
        </div>
        <!-- End container -->
    </nav>
    <!-- Navbar End -->

    <!-- Start Hero Section -->

    <section class="home-section d-table w-100 position-relative" style="background-color: #bfbfbf;" id="home">
        <div class="container h-100 d-flex flex-column justify-content-center">
            <div class="row align-items-center justify-content-between">
                <!-- Text Column -->

                <div class="col-lg-6 col-md-6">
                    <h1 class="display-4 display-md-3 fw-bold text-black mb-4 font-secondary">{{$lang == 'id' ? $home->judul : $home->judul_en}}</h1>
                    <div class="desc">
                        @if($lang == 'id')
                            {!!$home->desk!!}
                        @else 
                            {!!$home->desk_en!!}
                        @endif
                    </div>
                    <a href="#about" class="btn btn-dark rounded-pill mt-4">
                        {{$lang == 'id' ? 'Selengkapnya':'Learn More'}}
                    </a>
                </div>
                <!-- End Text Column -->

                <!-- Image Column -->
                <div class="col-lg-5 col-md-6 mt-4 mt-md-0">
                    <img src="{{asset($home->foto)}}" class="img-hero rounded-3 shadow-lg img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- End Hero Section -->

    <!-- Start About Section-->
    @foreach ($about as $a)
    <section class="about-section" id="about">
        <div class="container">
            {{-- @if ($loop->first)
            <div class="row align-items-center">
                <div class="col-xxl-12 text-center">
                    <div class="title-wrapper">
                        <h2 class="main-title mb-40 font-secondary">About Who We Are</h2>
                    </div>
                </div>
            </div>
            @endif --}}

            <div class="row justify-content-center align-items-center">
                <!-- Left Section: Profile Overview -->
                @if($a->foto == null || $a->position == 2)
                <div class="col-lg-10">
                  <div class="text-center">
                    <div class="title">
                        <h3 class="display-4 fw-bold text-dark font-secondary">{{$lang == 'id' ? $a->judul : $a->judul_en}}</h3>
                        @if($lang == 'id')
                            @if($a->subjudul != null)
                            <h4 class="sub">{{$a->subjudul}}</h4>
                            @endif
                        @else
                            @if($a->subjudul_en != null)
                            <h4 class="sub">{{$a->subjudul_en}}</h4>
                            @endif
                        @endif
                    </div>
                    @if($lang == 'id')
                        {!!$a->desk!!}
                    @else
                        {!!$a->desk_en!!}
                    @endif
                </div>
                </div>
                @else
                <div class="col-lg-6 col-md-12 mb-4 mb-lg-0 {{$a->position == 3 ? 'order-2':'order-1'}}">
                    <div class="about-overview position-{{$a->position}}">
                        <div class="title">
                            <h3 class="display-4 fw-bold text-dark font-secondary">{{$lang == 'id' ? $a->judul : $a->judul_en}}</h3>
                            @if($lang == 'id')
                                @if($a->subjudul != null)
                                <h4 class="sub">{{$a->subjudul}}</h4>
                                @endif
                            @else
                                @if($a->subjudul_en != null)
                                <h4 class="sub">{{$a->subjudul_en}}</h4>
                                @endif
                            @endif
                        </div>
                        <div class="desc">
                            @if($lang == 'id')
                                {!!$a->desk!!}
                            @else
                                {!!$a->desk_en!!}
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Right Section: About Details & Image -->
                <div class="col-lg-6 col-md-12 {{$a->position == 3 ? 'order-1':'order-2'}}">
                    <div class="position-relative mx-auto">
                        <img src="{{asset($a->foto)}}" class="shadow-lg img-fluid">
                    </div>
                </div>
                @endif

            </div><!-- End container -->
    </section>
    @endforeach
    <!-- End About Section-->


    <!-- Start Services Section -->
    <section class="services-section" id="services" style="background-color: #bfbfbf;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-12 text-center">
                    <div class="title-wrapper">
                        <h3 class="main-title mb-40 font-secondary">{{$lang == 'id' ? 'Layanan Kami' : 'Our services'}}</h3>
                    </div>
                </div>
            </div>

            <div class="row text-center justify-content-center">
                @foreach ($service as $s)
                <div class="col-md-6 col-lg-4">
                    <!-- Service Item -->
                    <!-- Profile Image -->
                    <div class="col-12 text-center">
                        <div class="profile-img-wrapper mb-4 position-relative mx-auto"
                            style="width: 200px; height: 200px;">
                            <img src="{{asset($s->foto)}}" alt="{{$s->judul_en}}" class="img-fluid rounded-circle shadow"
                                style="border: 5px solid #fff; object-fit: cover; width: 100%; height: 100%;">
                        </div>
                    </div>
                    <h5 class="service-title mb-3" style="font-size: 30px">{{$lang == 'id' ? $s->judul : $s->judul_en}}</h5>
                    <div class="service-description">
                        @if($lang == 'id')
                            {!!$s->desk!!}
                        @else
                            {!!$s->desk_en!!}
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Services Section -->


    <!-- Product Start -->
    <section class="product-section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-md text-center">
                    <h2 class="wow fadeInUp text-capitalize font-secondary mb-40" data-wow-delay="300">
                        {{$lang == 'id' ? 'Produk Unggulan' : 'Feature Product'}}
                    </h2>
                </div>
            </div>
            @foreach ($product as $item)
            <div class="row align-items-center mb-40 @if($loop->iteration % 2 == 0) flex-row-reverse @endif">
                <div class="col-lg-6">
                    <div class="img-hvr">
                        <img src="{{ asset($item->gambar) }}" class="mw-100" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp">
                    <div class="blog-content">
                        <div class="title">
                            <h3 class="font-secondary" data-wow-delay="300">{{ $lang == 'id' ? $item->nama : $item->nama_en }}</h3>
                        </div>
                        <div class="desc">
                            @if($lang == 'id')
                                {!! $item->desk !!}
                            @else
                                {!! $item->desk_en !!}
                            @endif
                        </div>
                        <button type="button" class="btn btn-dark rounded-pill mt-3" id="img-flip-{{ $item->id }}">{{$lang == 'id' ? 'Lihat Katalog' : 'See Catalog'}}</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- Product End -->


    <!-- Start Blog Section -->
    <!--<section class="divider-100 blog-section bg-secondary" id="blog">
    <div class="container">

      <div class="row align-items-center">
        <div class="col-xxl-12 text-center">
          <div class="title-wrapper">
            <h4 class="main-subtitle mb-20"> <a href="blog.html">Blog</a></h4>
            <h3 class="main-title mb-50">Recent blog</h3>
          </div>
        </div>
      </div>
      <div class="row blog-section">
        <div class="col-md-4">
          <div class="blog-card">
            <div class="blog-image">
              <img src="images/blog/img-1.jpg" alt="Blog post 1" class="img-fluid rounded">
            </div>
            <div class="blog-details">
              <p class="blog-meta">July 03, 2024 · <span class="author">Admin</span> · <span class="comments">3
                  Comments</span></p>
              <h5 class="blog-title"><a href="blog.html">Why Lead Generation is Key for Business Growth</a></h5>
              <p class="blog-excerpt">A small river named Duden flows by their place and supplies it with the necessary
                regelialia.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="blog-card">
            <div class="blog-image">
              <img src="images/blog/img-2.jpg" alt="Blog post 2" class="img-fluid rounded">
            </div>
            <div class="blog-details">
              <p class="blog-meta">August 15, 2024 · <span class="author">Admin</span> · <span class="comments">5
                  Comments</span></p>
              <h5 class="blog-title"><a href="blog.html">The Importance of Modern Web Design</a></h5>
              <p class="blog-excerpt">Designing for the web requires creativity and a keen understanding of user
                experience.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="blog-card">
            <div class="blog-image">
              <img src="images/blog/img-3.jpg" alt="Blog post 3" class="img-fluid rounded">
            </div>
            <div class="blog-details">
              <p class="blog-meta">September 10, 2024 · <span class="author">Admin</span> · <span class="comments">8
                  Comments</span></p>
              <h5 class="blog-title"><a href="blog.html">Top Business Apps to Watch in 2024</a></h5>
              <p class="blog-excerpt">Explore the most innovative business apps that are transforming industries this
                year.</p>
            </div>
          </div>
        </div>
      </div>
    </div>-->
    <!-- End container -->
    <!--</section>-->
    <!-- End Blog Section -->

    <!-- Facebook Post Slider Start -->
    <!--<section class=" divider-20 sosmed-section" id="sosmed" style="background-color: #bfbfbf;">
        <div class="container" style="margin-top: 170px;">
            <div class="row">
                <div class="col-md text-center">
                    <h2 class="wow fadeInUp text-capitalize font-secondary" style="margin-top: -100px; font-size: 45px"
                        data-wow-delay="300">
                        Instagram <span class="gradient">Jembatan Cemerlang Abadi</span>
                    </h2>
                </div>
                <div class="container swiper">
                    <div class="slide-container">
                        <div class="card-wrapper swiper-wrapper">
                            <div class="card swiper-slide">
                                <div class="image-box">
                                    <iframe src="https://www.instagram.com/p/C50JtvqPAG7/embed" width="254" height="210"
                                        style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                        allowfullscreen="true"></iframe>
                                </div>
                                <div class="profile-details">

                                    <div class="name-job">
                                        <h3 class="name">Post</h3>
                                        <h4 class="job">1</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="image-box">
                                    <iframe src="https://www.instagram.com/p/C50JtvqPAG7/embed" width="254" height="210"
                                        style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                        allowfullscreen="true"></iframe>
                                </div>
                                <div class="profile-details">

                                    <div class="name-job">
                                        <h3 class="name">Post</h3>
                                        <h4 class="job">2</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="image-box">
                                    <iframe src="https://www.instagram.com/p/C50JtvqPAG7/embed" width="254" height="210"
                                        style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                        allowfullscreen="true"></iframe>
                                </div>
                                <div class="profile-details">

                                    <div class="name-job">
                                        <h3 class="name">Post</h3>
                                        <h4 class="job">3</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="image-box">
                                    <iframe src="https://www.instagram.com/p/C50JtvqPAG7/embed" width="254" height="210"
                                        style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                        allowfullscreen="true"></iframe>
                                </div>
                                <div class="profile-details">

                                    <div class="name-job">
                                        <h3 class="name">Post</h3>
                                        <h4 class="job">4</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="image-box">
                                    <iframe src="https://www.instagram.com/p/C50JtvqPAG7/embed" width="254" height="210"
                                        style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                        allowfullscreen="true"></iframe>
                                </div>
                                <div class="profile-details">

                                    <div class="name-job">
                                        <h3 class="name">Post</h3>
                                        <h4 class="job">5</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next swiper-navBtn"></div>
                    <div class="swiper-button-prev swiper-navBtn"></div>
                </div>
            </div>
    </section>-->

    <!-- Facebook Post Slider End -->

    <!-- Start Contact Section -->
    <section class="contact-section-touch" id="contact" style="background-color: #f1eded;">
        <div class="container">
            {{-- <div class="row align-items-center">
                <div class="col-xxl-12 text-center">
                    <div class="title-wrapper">
                        <h2 class="main-title mb-40 font-secondary">Contact</h2>
                    </div>
                </div>
            </div> --}}

            <div class="row">
                <!-- Contact Info - Top on Small Screens, Right on Large Screens -->
                <div class="col-lg-7 order-1 order-lg-2" style="background-color: #f1eded;">
                    <div class="contact-form-touch" style="color: #f1eded;">
                        <form id="contact-form-touch">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <input type="text" class="form-control-touch" placeholder="{{$lang == 'id' ? 'Nama Anda' : 'Your Name'}}" name="name"
                                        id="form_name">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="email" class="form-control-touch" placeholder="{{$lang == 'id' ? 'Email Anda' : 'Your Email'}}" name="email"
                                        id="form_email">
                                </div>
                                <div class="col-12 mb-4">
                                    <input type="text" class="form-control-touch" placeholder="{{$lang == 'id' ? 'Subjek' : 'Subject'}}" name="subject"
                                        id="form_subject">
                                </div>
                                <div class="col-12 mb-4">
                                    <textarea class="form-control-touch" placeholder="{{$lang == 'id' ? 'Pesan Anda' : 'Your Message'}}" rows="5"
                                        name="message" id="form_message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-dark rounded-pill px-4 py-3 me-3 border-3"
                                        style="border-color:#fff;">{{$lang == 'id' ? 'Kirim Pesan' : 'Send Message'}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Form - Below Contact Info on Small Screens, Left on Large Screens -->
                <div class="col-lg-5 order-2 order-lg-1">
                    <div class="contact-info-touch" style="background-color: #f1eded;">
                        <div class="title-wrapper-touch mb-4">
                            <h2 class="main-title font-secondary">{{ $lang == 'id' ? 'Kontak Kami' : 'Contact Us' }}</h2>
                            <p class="pt-3 pb-4">
                                @if($lang == 'id') 
                                    Tertarik untuk bekerja sama? Harap berikan beberapa detail, dan kami akan segera menghubungi Anda. Kami tunggu kabar dari Anda!
                                @else
                                    Interested in collaborating? Please provide some details, and we’ll get back to you soon. We look forward to hearing from you!
                                @endif
                            </p>
                        </div>
                        <div class="contact-details-touch">
                            <div class="contact-item-touch d-flex align-items-center mb-3">
                                <div class="icon-touch d-flex justify-content-center align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                        class="bi bi-telephone" viewBox="0 0 16 16">
                                        <path
                                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                    </svg>
                                </div>
                                <div class="details ms-3">
                                    <h4>{{$lang == 'id' ? 'Telepon' : 'Phone'}}</h4>
                                    <p>+(00) 000 000 123</p>
                                </div>
                            </div>
                            <div class="contact-item-touch d-flex align-items-center mb-3">
                                <div class="icon-touch d-flex justify-content-center align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                        class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                    </svg>
                                </div>
                                <div class="details ms-3">
                                    <h4>Email</h4>
                                    <p>info@example.com</p>
                                </div>
                            </div>
                            <div class="contact-item-touch d-flex align-items-center mb-3">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->

    <!-- Start Footer -->
    <footer class="revealed">
        <div class="footer_bg">
            <div class="container">
                <div class="row move_content justify-content-center">
                    <div class="col-lg-8 col-md-12">
                        <div class="footer text-center">
                            <img src="images/logo/Logo.png" class="footer-img" alt="">
                            <ul class="contact">
                                <li>
                                    @foreach ($sosmed as $s)
                                    <a href="{{$s->link}}"
                                        style="font-size: 15px" target="blank">
                                    @if($s->jenis == 1)
                                    <i class="bi bi-envelope-paper"></i>{{$s->nama}}
                                    @elseif($s->jenis == 2)
                                    <i class="bi bi-whatsapp"></i>{{$s->nama}}
                            <div class="social" style="font-size: 15px">
                                <h6>Follow Us :</h6>@elseif($s->jenis == 3)
                                    <i class="bi bi-instagram "></i>{{$s->nama}}@endif
                                </a>
                                @endforeach
                            </li>
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
                    Jembatan Cemerlang Abadi © 2024 - <a href="#" style="font-size: 13px">Patras Dev</a>
                </div>
            </div>
    </footer>
    <!-- /footer -->

    <!-- End Footer -->

    <!-- Start Back to Top Button -->
    <button id="backToTop" title="Back to Top">
        <svg class="icon__arrow-up" viewBox="0 0 24 24">
            <title>Back to top</title>
            <path
                d="M18.71,11.71a1,1,0,0,1-1.42,0L13,7.41V19a1,1,0,0,1-2,0V7.41l-4.29,4.3a1,1,0,0,1-1.42-1.42l6-6a1,1,0,0,1,1.42,0l6,6A1,1,0,0,1,18.71,11.71Z" />
        </svg>
    </button>
    <!-- End Back to top -->

    <!-- Bootstrap Js -->
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

    <!-- swiper -->
    <script src="{{asset('js/swiper-bundle.min.js')}}"></script>

    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>

    <script src="{{ asset('assets/plugins/real3d-317/real3d-flipbook/deploy/js/flipbook.min.js') }}"></script>

    <script>
        $(document).ready(function () {
        @foreach ($product as $all)
            $("#img-flip-{{$all->id}}").flipBook({
                pdfUrl:'{{ asset($all->file) }}',
                lightBox:true,
                btnSelect : {enabled: false},
                btnSound : {enabled: false},
                btnToc : {enabled: false},
                btnDownloadPages : {enabled: false},
                btnDownloadPdf : {enabled: false},
                btnBookmark : {enabled: false},
                btnPrint : {enabled: false},
                btnShare : {enabled: false},
                wheelDisabledNotFullscreen:true,

                skin:'dark',

                menuMargin:0,
                menuBackground:'none',
                menuShadow:'none',
                menuAlignHorizontal:'right',
                menuOverBook:true,

                btnRadius:40,
                btnMargin:4,
                btnSize:14,
                btnPaddingV:16,
                btnPaddingH:16,
                btnBorder:'2px solid rgba(255,255,255,.7)',
                btnBackground:"rgba(0,0,0,.6)",
                btnColor:'rgb(255,255,255)',

                // sideBtnRadius:60,
                sideBtnSize:40,
                sideBtnBackground:"rgba(0,0,0,.6)",
                sideBtnColor:'rgb(255,255,255)',
            });
        @endforeach

        })
    </script>


    <!-- Main Js -->
    <script src="{{asset('js/app.js')}}"></script>

    <!-- Swiper init -->
    <script>
        var swiper = new Swiper(".slide-container", {
            slidesPerView: 4,
            spaceBetween: 20,
            sliderPerGroup: 4,
            loop: true,
            centerSlide: "true",
            fade: "true",
            grabCursor: "true",
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                520: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                1000: {
                    slidesPerView: 4,
                },
            },
        });

    </script>




</body>

</html>
