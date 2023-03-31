<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pengaduan Masyarakat</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo 1.png') }}" />
</head>

<body>
    @include('sweetalert::alert')

    @if (session('error'))

    <div class="alert alert-warning d-flex  alert-dismissible fade show" role="alert">

        {{ session('error') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>


    @endif
    @if (Session::has('success'))
    <div class="alert alert-success d-flex  alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <div class="card mt-2">
                                    <a class="navbar-brand brand-logo mr-5" href="/"><img src="{{ asset('assets/img/PP.png') }}" alt="logo"></a>

                                    <h4>LOGIN</h4>
                                    <h6 class="font-weight-light">Masuk untuk Memulai Pengaduan</h6>

                                    <form class="pt-3" action="{{ Route('login') }}" method="post">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" placeholder="Email" required autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Password" required>


                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-block btn btn-primary btn-lg font-weight-medium auth-form-btn">Masuk</button>
                                            </div>
                                        </div>

                                        <div class="my-2 d-flex justify-content-between align-items-center">
                                            <div class="form-check">

                                            </div>
                                            <a href="{{route('password.request')}}" class="auth-link text-black">Forgot password?</a>
                                        </div>


                                        <div class="text-center mt-4 font-weight-light">
                                            Belum Memiliki Akun? <a href="{{ route('register') }}" class="text-primary">Daftar</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>
            <!-- container-scroller -->
            <!-- plugins:js -->
            <script src="../../vendors/js/vendor.bundle.base.js"></script>

            <script src="../../js/off-canvas.js"></script>
            <script src="../../js/hoverable-collapse.js"></script>
            <script src="../../js/template.js"></script>
            <script src="../../js/settings.js"></script>
            <script src="../../js/todolist.js"></script>
            <!-- endinject -->
</body>

</html>