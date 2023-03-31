@extends('admin.layouts.app')

@section('content')
<!doctype html>

<head>
</head>

<body>
    <div class="container">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">
                        <h3>Hallo {{ Auth::user()->name }} !! 👋</h3>
                        <h3>Selamat Datang di Website Pengaduan Masyarakat!</h3>
                    </h3>
                    <br/>
                </div>
                <br />
                <div class="col-md-10 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-4 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">Jumlah Pengaduan</p>
                                    <p class="fs-30 mb-2">{{ $pengaduan }}</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Jumlah Tanggapan</p>
                                    <p class="fs-30 mb-2">{{ $tanggapan }}</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">Belum ditanggapi</p>
                                    <p class="fs-30 mb-2">{{ $terkirim }}</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-4 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">Sedang diproses</p>
                                    <p class="fs-30 mb-2">{{ $proses }}</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Laporan selesai</p>
                                    <p class="fs-30 mb-2">{{ $selesai }}</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">Jumlah User</p>
                                    <p class="fs-30 mb-2">{{ $user }}</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-4 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">Jumlah Masyarakat</p>
                                    <p class="fs-30 mb-2">{{ $warga }}</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Jumlah Admin</p>
                                    <p class="fs-30 mb-2">{{ $admin }}</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">Jumlah Petugas</p>
                                    <p class="fs-30 mb-2">{{ $petugas }}</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
@endsection