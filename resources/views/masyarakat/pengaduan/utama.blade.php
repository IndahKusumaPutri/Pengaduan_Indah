<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pengaduan Masyarakat</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo 1.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
    @include('sweetalert::alert')

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="">Pengaduan Masyarakat </a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    @if (Auth::check())
                    @if (Auth::user()->role == 'masyarakat')
                    <li><a class="nav-link scrollto" href="{{ route('history') }}">History</a></li>
                    @else
                    @endif
                    @endif
                    <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto" href="#services">Mekanisme</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#portfolio">History</a></li> -->
                    <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li>  -->
                    @if (Auth::check())
                    @if (Auth::user()->role == 'masyarakat')
                    <li><a class="nav-link scrollto" href="{{ route('user-profile') }}">Profile</a></li>
                    @else
                    <li><a class="nav-link scrollto" href="{{ route('profile.index') }}">Profile</a></li>
                    @endif
                    @endif

                    @if (Auth::check())
                    <li><a class="getstarted scrollto" href="{{ route('logout') }}">Logout</a></li>
                    @else
                    <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h1>Hallo {{ Auth::user()->name }} !!</h1>
                    <h4>
                        <font color="white">
                            <p>Selamat Datang di Website Pengaduan Online</p>
                        </font>
                    </h4>
                    <!-- <h5>
                        <font color="white">Berani Lapor!
                            <p>Untuk Pelayanan Publik yang Lebih Baik.</p>
                        </font>
                    </h5> -->



                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="{{ route('form.pengaduan') }}" id="swal-6" class="btn-get-started scrollto">
                            Laporkan!
                        </a>
                    </div>

                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
                </div>

            </div>
        </div>

    </section>

    <main id="main">

        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Tentang Kami</h2>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <h4>
                            APA ITU
                            PENGADUAN MASYARAKAT?
                        </h4>
                        <p>
                            Pengaduan Masyarakat adalah pengawasan yang dilakukan oleh masyarakat yang disampaikan secara lisan atau tertulis kepada Pejabat Arsip Nasional Republik Indonesia (ANRI) yang berkepentingan, berupa sumbangan pikiran, saran, gagasan, keluhan, atau pengaduan yang bersifat membangun yang disampaikan baik secara langsung maupun melalui media.
                        </p>
                        <a href="#why-us" class="btn-learn-more">Learn More</a>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us section-bg">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content">
                            <h4>
                                APA YANG BISA PENGADUAN INI LAKUKAN?
                            </h4>
                        </div>

                        <div class="accordion-list">
                            <ul>
                                <li>
                                    <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Kami menerima pengaduan masyarakat berupa : <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                        <p>
                                            1. Keluhan yang bersifat membangun yang mengandung informasi adanya indikasi penyimpangan atau penyalahgunaan wewenang oleh Aparatur Negara atau pihak yang mendapatkan izin atau perjanjian kerja di bidang kearsipan yang dapat mengakibatkan kerugian masyarakat dan negara.
                                        </p>
                                        <p>
                                            2. Sumbang saran, kritik, gagasan yang membangun yang mengandung informasi yang bermanfaat bagi perbaikan dalam rangka penyelenggaraan pemerintahan umum, pembangunan dan pelayanan masyarakat di bidang kearsipan.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Pengaduan dapat disampaikan secara lisan atau tertulis melalui :
                                        <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                        <p>1. Pusat Layanan Informasi, Telp : 021 7805851 ext.118 atau Inspektorat ext.119</p>
                                        <p>2. Kotak Saran di Ruang Baca.</p>
                                        <p>3. Surat Elektronik dengan alamat: info@anri.go.id</p>
                                        <p>4. Surat terbuka yang disampaikan kepada Kepala ANRI.</p>
                                        <p>5. Buku saran pada Counter Layanan Arsip/ Ruang Baca.</p>
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Mekanisme Pengaduan Masyarakat</h2>
                    <p></p>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-pencil-square"></i></div>
                            <h4><a href="">Tulis Laporan</a></h4>
                            <!-- <p>Pelapor Wajib melakukan Login. Jika belum Pelapor belum memiliki akun, Pelapor bisa melakukan Registrasi.</p> -->
                            <p>Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap !!</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-clipboard-data"></i></div>
                            <h4><a href="">Proses Verifikasi</a></h4>
                            <!-- <p>Pelapor memasukkan isi laporan pengaduan dengan bukti dan alamat yang jelas.</p> -->
                            <p>Dalam 3 hari, laporan Anda akan diverifikasi dan diteruskan kepada instansi berwenang</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-chat-right-text"></i></div>
                            <h4><a href="">Proses Tindak Lanjut dan Tunggu Tanggapan </a></h4>
                            <!-- <p>Petugas akan memverifikasi dan melakukan validasi laporan. Selanjutnya Petugas akan memberikan tanggapan terkait pengaduan yang diberikan Pelapor.</p> -->
                            <p>Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda. </p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-check2-all"></i></div>
                            <h4><a href="">Selesai</a></h4>
                            <!-- <p>Petugas melakukan tindak lanjut dan memberikan konfirmasi</p> -->
                            <p>Laporan Anda akan terus ditindaklanjuti hingga terselesaikan</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">



        <div class="container footer-bottom clearfix">
            <div class="copyright">
                Copyright &copy; 2023 <strong><span>Indah Kusuma Putri</span></strong>. All Rights Reserved
            </div>
            <div class="credits"></div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        $("#swal-6").click(function() {
            console.log("ok");
            swal({
                    title: 'Harus login dulu',
                    text: 'Untuk mengisi pengaduan anda harus login terlebih dahulu',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = "/login";
                    } else {
                        swal('Oke!');
                    }
                });
        });
    </script>

</body>

</html>