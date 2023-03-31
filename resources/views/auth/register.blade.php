<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Pengaduan Masyarakat </title>
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
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('assets/img/PP.png') }}" alt="logo">
                            </div>
                            <h4>Ayo Daftar</h4>
                            <h6 class="font-weight-light">Daftar Mudah. Laporkan Masalah Anda!</h6>

                            <form class="pt-3" action="{{ Route('register') }}" method="post">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg {{ $errors->has('nik') ? 'is-invalid' : '' }}" name="nik" placeholder="NIK" value="{{ old('nik') }}" required autofocus>

                                    @if ($errors->has('nik'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nik') }}
                                    </div>
                                    @endif

                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="Full name" value="{{ old('name') }}" required autofocus>
                                    <!-- <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                    </div>
                                    </div> -->

                                    @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                    @endif

                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                    <!-- <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                    </div>
                                    </div> -->

                                    @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif

                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" placeholder="Password" required autofocus>
                                    <!-- <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                    </div> -->

                                    @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                    @endif

                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation" placeholder="Retype password" required autofocus>
                                    <!-- <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                    </div> -->

                                    @if ($errors->has('pasword_confirmation'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('pasword_confirmation') }}
                                    </div>
                                    @endif

                                </div>

                                <!-- <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            I agree to all Terms & Conditions
                                        </label>
                                    </div>
                                </div>  -->

                                <!-- <div class="mt-3">
                                    <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        href="{{ route('pengaduan.index') }}">MASUK</a>
                                </div> -->

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                                    </div>
                                </div>

                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>