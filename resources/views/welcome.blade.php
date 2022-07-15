<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Kegiatan Pelibatan Masyarakat</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('landing_page/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('landing_page/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('landing_page/assets/css/templatemo-digimedia-v3.css') }}">
    <link rel="stylesheet" href="{{ asset('landing_page/assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('landing_page/assets/css/owl.css') }}">
    <!--

TemplateMo 568 DigiMedia

https://templatemo.com/tm-568-digimedia

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->
    <a target="_blank" href="https://wa.me/6289670184654?text=Assalamualaikum%0ASaya%20ingin%20bertanya%20tentang%20Kegiatan%20Pelibatan%20Masyarakat" class="float">
        <i class="fa fa-whatsapp fa-lg my-float" aria-hidden="true"></i>
    </a>
    <!-- Pre-header Starts -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8 col-7">
                    <ul class="info">
                        <li><a href="#"><i class="fa fa-envelope"></i>arpusindramayu7@gmail.com</a></li>
                        <li><a href="#"><i class="fa fa-phone"></i>0234 - 277139</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-sm-4 col-5">
                    <ul class="social-media">
                        <li><a href="https://www.facebook.com/disarpusindramayu/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/perpusdaimyu"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.instagram.com/dpa_indramayu/"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCetO3E36sJ1Qfv_R5pAeY2w"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-header End -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="{{ asset('landing_page/assets/images/logo-v3.png') }}" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">Tentang Kami</a></li>
                            <li class="scroll-to-section"><a href="#services">Kelas</a></li>
                            @if (count($events)>0)
                                <li class="scroll-to-section"><a href="#event">Event</a></li>
                            @endif
                            @if (count($testimoni)>0)
                                <li class="scroll-to-section"><a href="#free-quote">Testimoni</a></li>
                            @endif
                            @if (count($tutor)>0)
                                <li class="scroll-to-section"><a href="#portfolio">Tutor</a></li>
                            @endif
                            @if (count($berita)>0)
                                <li class="scroll-to-section"><a href="#blog">Berita</a></li>
                            @endif
                            @if (count($faq)>0)
                                <li class="scroll-to-section"><a href="#faq">Bantuan</a></li>
                            @endif
                            <li class="scroll-to-section"><a href="#contact">Kontak</a></li>
                            @if (Route::has('login'))
                                @auth
                                    @if (Auth::user()->level == 'admin')
                                    <li class="">
                                        <div class="border-first-button"><a href="{{ url('admin/dashboard') }}">Dashboard</a></div>
                                    </li>
                                    @elseif (Auth::user()->level == 'tutor')
                                    <li class="">
                                        <div class="border-first-button"><a href="{{ url('tutor/dashboard') }}">Dashboard</a></div>
                                    </li>
                                    @elseif (Auth::user()->level == 'peserta')
                                    <li class="">
                                        <div class="border-first-button"><a href="{{ url('peserta/dashboard') }}">Dashboard</a></div>
                                    </li>
                                    @endif
                                @else
                                    <li class="">
                                        <div class="border-first-button"><a href="{{ route('login') }}">Log in</a></div>
                                    </li>
                                @endauth
                            @endif
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h6>Digital Media Agency</h6>
                                        <h2>We Boost Your Website Traffic</h2>
                                        <p>This template is brought to you by TemplateMo website. Feel free to use this for a commercial purpose. You are not allowed to redistribute the template ZIP file on any other template website. Thank you.</p>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="border-first-button scroll-to-section">
                                            <a href="#services">Lihat Kelas</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{ asset('landing_page/assets/images/slider-dec-v3.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="about section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-left-image  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{ asset('landing_page/assets/images/about-dec-v3.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                            <div class="about-right-content">
                                <div class="section-heading">
                                    <h6>Tentang Kami</h6>
                                    <h4>Apa itu Kegiatan Pelibatan <em>Masyarakat</em></h4>
                                    <div class="line-dec"></div>
                                </div>
                                <p>We hope this DigiMedia template is useful for your work. You can use this template for any purpose. You may <a rel="nofollow" href="http://paypal.me/templatemo" target="_blank">contribute a little amount</a> via PayPal to <a href="https://templatemo.com/contact" target="_blank">support TemplateMo</a> in creating new templates regularly.</p>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="skill-item first-skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                                            <div class="progress" data-percentage="90">
                                                <span class="progress-left">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <span class="progress-right">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <div class="progress-value">
                                                    <div>
                                                        90%<br>
                                                        <span>Coding</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="skill-item second-skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                                            <div class="progress" data-percentage="80">
                                                <span class="progress-left">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <span class="progress-right">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <div class="progress-value">
                                                    <div>
                                                        80%<br>
                                                        <span>Photoshop</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="skill-item third-skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                                            <div class="progress" data-percentage="80">
                                                <span class="progress-left">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <span class="progress-right">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <div class="progress-value">
                                                    <div>
                                                        80%<br>
                                                        <span>Animation</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h6>Our Services</h6>
                        <h4>What Our Agency <em>Provides</em></h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="naccs">
                        <div class="grid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="menu">
                                        <div class="first-thumb active">
                                            <div class="thumb">
                                                <span class="icon"><img src="{{ asset('landing_page/assets/images/service-icon-01') }}.png" alt=""></span>
                                                Apartments
                                            </div>
                                        </div>
                                        <div>
                                            <div class="thumb">
                                                <span class="icon"><img src="{{ asset('landing_page/assets/images/service-icon-02.png') }}" alt=""></span>
                                                Food &amp; Life
                                            </div>
                                        </div>
                                        <div>
                                            <div class="thumb">
                                                <span class="icon"><img src="{{ asset('landing_page/assets/images/service-icon-03.png') }}" alt=""></span>
                                                Cars
                                            </div>
                                        </div>
                                        <div>
                                            <div class="thumb">
                                                <span class="icon"><img src="{{ asset('landing_page/assets/images/service-icon-04.png') }}" alt=""></span>
                                                Shopping
                                            </div>
                                        </div>
                                        <div class="last-thumb">
                                            <div class="thumb">
                                                <span class="icon"><img src="{{ asset('landing_page/assets/images/service-icon-01.png') }}" alt=""></span>
                                                Traveling
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <ul class="nacc">
                                        <li class="active">
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="left-text">
                                                                <h4>SEO Analysis &amp; Daily Reports</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedr do eiusmod deis tempor incididunt ut labore et dolore kengan darwin doerski token.
                                                                    dover lipsum lorem and the others.</p>
                                                                <div class="ticks-list"><span><i class="fa fa-check"></i> Optimized Template</span> <span><i class="fa fa-check"></i> Data Info</span> <span><i class="fa fa-check"></i> SEO Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span> <span><i class="fa fa-check"></i> SEO Analysis</span> <span><i class="fa fa-check"></i> Optimized Template</span></div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedr do eiusmod deis tempor incididunt.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="right-image">
                                                                <img src="{{ asset('landing_page/assets/images/services-image.jpg') }}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="left-text">
                                                                <h4>Healthy Food &amp; Life</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedr do eiusmod deis tempor incididunt ut labore et dolore kengan darwin doerski token.
                                                                    dover lipsum lorem and the others.</p>
                                                                <div class="ticks-list"><span><i class="fa fa-check"></i> Optimized Template</span> <span><i class="fa fa-check"></i> Data Info</span> <span><i class="fa fa-check"></i> SEO Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span> <span><i class="fa fa-check"></i> SEO Analysis</span> <span><i class="fa fa-check"></i> Optimized Template</span></div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedr do eiusmod deis tempor incididunt.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="right-image">
                                                                <img src="{{ asset('landing_page/assets/images/services-image-02.jpg') }}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="left-text">
                                                                <h4>Car Re-search &amp; Transport</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedr do eiusmod deis tempor incididunt ut labore et dolore kengan darwin doerski token.
                                                                    dover lipsum lorem and the others.</p>
                                                                <div class="ticks-list"><span><i class="fa fa-check"></i> Optimized Template</span> <span><i class="fa fa-check"></i> Data Info</span> <span><i class="fa fa-check"></i> SEO Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span> <span><i class="fa fa-check"></i> SEO Analysis</span> <span><i class="fa fa-check"></i> Optimized Template</span></div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedr do eiusmod deis tempor incididunt.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="right-image">
                                                                <img src="{{ asset('landing_page/assets/images/services-image-03.jpg') }}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="left-text">
                                                                <h4>Online Shopping &amp; Tracking ID</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedr do eiusmod deis tempor incididunt ut labore et dolore kengan darwin doerski token.
                                                                    dover lipsum lorem and the others.</p>
                                                                <div class="ticks-list"><span><i class="fa fa-check"></i> Optimized Template</span> <span><i class="fa fa-check"></i> Data Info</span> <span><i class="fa fa-check"></i> SEO Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span> <span><i class="fa fa-check"></i> SEO Analysis</span> <span><i class="fa fa-check"></i> Optimized Template</span></div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedr do eiusmod deis tempor incididunt.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="right-image">
                                                                <img src="{{ asset('landing_page/assets/images/services-image-04.jpg') }}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="left-text">
                                                                <h4>Enjoy &amp; Travel</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedr do eiusmod deis tempor incididunt ut labore et dolore kengan darwin doerski token.
                                                                    dover lipsum lorem and the others.</p>
                                                                <div class="ticks-list"><span><i class="fa fa-check"></i> Optimized Template</span> <span><i class="fa fa-check"></i> Data Info</span> <span><i class="fa fa-check"></i> SEO Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span> <span><i class="fa fa-check"></i> SEO Analysis</span> <span><i class="fa fa-check"></i> Optimized Template</span></div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedr do eiusmod deis tempor incididunt.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="right-image">
                                                                <img src="{{ asset('landing_page/assets/images/services-image.jpg') }}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (count($events)>0)
        <div id="event" class="our-portfolio section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                            <h6>Event </h6>
                            <h4>Lihat daftar <em>event</em></h4>
                            <div class="line-dec"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            @foreach ($events as $event)
                                <div class="col-sm-3">
                                    <a href="{{ url('peserta/event/'.$event->id) }}">
                                        <div class="card h-100">
                                            @if($event->banner != null)
                                                <img src="{{ Storage::url($event->banner) }}" class="card-img-top" alt="...">
                                            @else
                                                <img src="{{ asset('admin_dashboard/assets/img/400x300.jpg') }}" class="card-img-top" alt="...">
                                            @endif
                                            <div class="card-body">
                                                <div>
                                                    <span class="badge bg-primary mb-3">{{ $event->kategori }}</span>
                                                </div>
                                                <h5 class="card-title">{{ $event->nama_event }}</h5>
                                                <span class="tipe text-muted">oleh: 
                                                    <span class="text-muted">{{ $event->pembuat_event }}</span>
                                                </span>
                                                <div class="mt-1 mb-3" style="text-align: justify">
                                                    {!! Str::limit($event->deskripsi, 150, $end='...') !!}
                                                </div>
                                            </div>
                                            <div class="card-footer d-flex justify-content-end">
                                                @if (\Carbon\Carbon::now()->format('Y-m-d') <= $event->deadline_pendaftaran)
                                                    <small class="text-secondary">Batas Pendaftaran: {{ \Carbon\Carbon::parse($event->deadline_pendaftaran)->format('j F Y') }}</small>
                                                @else
                                                    <small class="text-secondary">Pendaftaran Ditutup</small>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- <div id="free-quote" class="free-quote">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h4>Periksa Sertifikat</h4>
                        <h6>Masukkan kode unik sertifikat di kolom bawah</h6>
                        <div class="line-dec"></div>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-2  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                    <form id="search" action="#" method="GET">
                        <div class="row">
                            <div class="col-lg-8 col-sm-8">
                                <fieldset>
                                    <input type="text" name="kode_sertifikat" class="" placeholder="Kode Sertifikat..." autocomplete="off" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <fieldset>
                                    <button type="submit" class="main-button">Periksa Sekarang</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    @if (count($testimoni)>0) 
        <div id="free-quote" class="free-quote">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4">
                        <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                            <h4>Apa kata mereka</h4>
                            <h6>Dengarkan cerita menarik dari peserta</h6>
                            <div class="line-dec"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="testimoni-loop owl-carousel">
                            @forelse ($testimoni as $testimonis)
                                <div class="testimoni-card">
                                    <div class="">
                                        <p>{{ $testimonis->deskripsi }}</p> 
                                    </div>
                                    <hr>
                                    <div class="">
                                        <div class="row d-flex justify-content-center align-items-center">
                                            <img src="{{ Storage::url($testimonis->user->foto) }}" class="rounded-circle" alt="" style="max-width: 56px">
                                            Oleh: {{ $testimonis->user->nama }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="testimoni-card">
                                    <div class="">
                                        <p>Data Testimoni Kosong</p> 
                                    </div>
                                    <hr>
                                    <div class="">
                                        <div class="row d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('landing_page/assets/images/90x90.jpg') }}" class="rounded-circle" alt="" style="max-width: 56px">
                                            Oleh: No Name
                                        </div>
                                    </div>
                                </div>
                                
                            @endforelse
                            {{-- <div class="testimoni-card">
                                <div class="">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doers itii eiumod deis tempor incididunt ut labore.</p> 
                                </div>
                                <hr>
                                <div class="">
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('landing_page/assets/images/author-post.jpg') }}" class="rounded-circle" alt="" style="max-width: 56px">
                                        By: Andrea Mentuzi
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (count($tutor)>0)
        <div id="portfolio" class="our-portfolio section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                            <h6>Tutor Kelas</h6>
                            <h4>Tutor yang <em>Berpengalaman</em></h4>
                            <div class="line-dec"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="loop owl-carousel">
                            @forelse ($tutor as $tutors)
                                <div class="item">
                                    <a href="#">
                                        <div class="portfolio-item">
                                            <div class="thumb">
                                                @if($tutors->foto!=null)
                                                    <img src="{{ Storage::url($tutors->foto) }}" width="284px" height="284px" alt="">
                                                @else
                                                    @if($tutors->jenis_kelamin=="Laki-laki")
                                                        <img src="{{ asset('landing_page/assets/images/avatar-male.png') }}" width="284px" height="284px" alt="">
                                                    @elseif($tutors->jenis_kelamin=="Perempuan")
                                                        <img src="{{ asset('landing_page/assets/images/avatar-female.png') }}" width="284px" height="284px" alt="">
                                                    @else
                                                        <img src="{{ asset('landing_page/assets/images/255x255.jpg') }}" width="284px" height="284px" alt="">
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="down-content">
                                                <h4>{{ $tutors->nama }}</h4>
                                                @if ($tutors->kelas->last() != null)   
                                                    <span>{{ preg_replace('~\\s+\\S+$~', "", $tutors->kelas->last()->nama_kelas) }}</span>
                                                @else
                                                    <span>Tutor Kelas</span>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                
                            @endforelse
                            {{-- <div class="item">
                                <a href="#">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{ asset('landing_page/assets/images/portfolio-01.jpg') }}" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4>Website Builder</h4>
                                            <span>Marketing</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{ asset('landing_page/assets/images/portfolio-02.jpg') }}" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4>Website Builder</h4>
                                            <span>Marketing</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{ asset('landing_page/assets/images/portfolio-03.jpg') }}" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4>Website Builder</h4>
                                            <span>Marketing</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{ asset('landing_page/assets/images/portfolio-04.jpg') }}" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4>Website Builder</h4>
                                            <span>Marketing</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{ asset('landing_page/assets/images/portfolio-04.jpg') }}" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4>Website Builder</h4>
                                            <span>Marketing</span>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (count($berita)>0)
        <div id="blog" class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="section-heading">
                            <h6>Berita Terbaru</h6>
                            <h4>Silahkan baca informasi dari <em>kami</em></h4>
                            <div class="line-dec"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($berita as $key => $item)
                        @if($loop->iteration == 4)
                            @break
                        @endif
                        <div class="col-lg-4 show-up wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <a href="{{ url('berita/'.$item->slug) }}">
                                <div class="blog-post h-100">
                                    <div class="thumb">
                                        <img height="230px" class="fit-image" src="{{ Storage::url($item->banner) }}" alt="">
                                    </div>
                                    <div class="down-content">
                                        @if ($item->kategori != null)
                                            <span class="category">{{ $item->kategori->nama_kategori }}</span>
                                        @else
                                            <span class="category">Tidak Berkategori</span>
                                        @endif
                                        <span class="date">{{ \Carbon\Carbon::parse($item->created_at)->format('j F Y') }}</span>
                                        <h4>{{ $item->judul }}</h4>
                                        <div>
                                            {!! substr($item->isi, 0, 200) !!}
                                        </div>
                                        <span class="author">
                                            {{-- <img src="{{ asset('landing_page/assets/images/author-post.jpg') }}" alt=""> --}}
                                            By: Admin
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    @if (count($berita)>3)
                        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                            <div class="border-first-button scroll-to-section d-flex justify-content-center mt-3">
                                <a href="{{ url('berita') }}">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

    @if (count($faq)>0)
        <div id="faq" class="faq section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                            <h6>Pusat Bantuan</h6>
                            <h4>Dika Nakon Kula <em>Jawab</em></h4>
                            <div class="line-dec"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.25s">
                        <div class="accordion" id="accordionExample">
                            @forelse ($faq as $key => $item) 
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $key }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
                                            {{ $item->pertanyaan }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{ $item->jawaban }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Apa itu kegiatan pelibatan masyarakat?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Kegiatan Pelibatan Masyarakat merupakan kegiatan di perpustakaan untuk memfasilitasi kebutuhan masyarakat melalui penyediaan informasi yang luas (buku, internet, pelatihan) dengan melibatkan masyarakat secara aktif.
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        @if (count($faq)>0)
                            <div class="col-lg-12 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.25s">
                                <div class="border-first-button scroll-to-section d-flex justify-content-center mt-3">
                                    <a href="{{ url('/faq') }}">Lihat Selengkapnya</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h6>Hubungi Kami</h6>
                        <h4>Lebih Dekat Dengan <em>Kami</em></h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
                <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" action="mailto:arpusindramayu7@gmail.com?subject=Tanya Kegiatan Pelibatan Masyarakat" method="post" enctype="text/plain">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-dec">
                                    <img src="{{ asset('landing_page/assets/images/contact-dec-v3.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div id="map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15862.002000962684!2d108.3195666!3d-6.329133!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x56b333828a7c4ce8!2sDINAS%20PERPUSTAKAAN%20DAN%20ARSIP%20KABUPATEN%20INDRAMAYU!5e0!3m2!1sid!2sid!4v1654502397408!5m2!1sid!2sid" width="100%" height="636px" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="fill-form">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-post">
                                                <div class="icon">
                                                    <img src="{{ asset('landing_page/assets/images/phone-icon.png') }}" alt="">
                                                    <a href="#">0234 - 277139</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="info-post">
                                                <div class="icon">
                                                    <img src="{{ asset('landing_page/assets/images/email-icon.png') }}" alt="">
                                                    <a href="#">arpusindramayu7@gmail.com</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="info-post">
                                                <div class="icon">
                                                    <img src="{{ asset('landing_page/assets/images/location-icon.png') }}" alt="">
                                                    <a href="#">Jl. MT Haryono No. 49</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <fieldset>
                                                        <input type="name" name="nama" id="nama" placeholder="Nama" autocomplete="on" required>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-6">
                                                    <fieldset>
                                                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email Anda" required="">
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <textarea name="Pesan" type="text" class="form-control" id="Pesan" placeholder="Pesan" required=""></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="main-button ">Send Message Now</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © {{ Carbon\Carbon::now()->year }} DigiMedia Co., Ltd. All Rights Reserved.
                        <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a>
                        {{-- <br>Distributed By: <a href="https://themewagon.com" target="_blank" title="free css templates">ThemeWagon</a> --}}
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="{{ asset('landing_page/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('landing_page/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing_page/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('landing_page/assets/js/animation.js') }}"></script>
    <script src="{{ asset('landing_page/assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('landing_page/assets/js/custom.js') }}"></script>

</body>
</html>
