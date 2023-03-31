<!-- Content Header (Page header) -->
@extends('masyarakat.layouts.app')

@section('content')
<!Doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Profile</h4>
                                <p class="card-description">
                                    Personal info
                                </p>
                                <form class="form-horizontal" action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    <input type="hidden" name="_method" value="post">

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">NIK</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="nik" name="nik" value="{{ $user->nik }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="password" id="password">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">No handphone</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="telp" name="telp" value="{{ $user->telp }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" id="jenkel" name="jenkel" value="{{ $user->jenkel == 'laki-laki' ? 'laki-laki' : 'laki-laki' }}" {{ $user->jenkel == 'laki-laki' ? 'checked' : '' }}> &nbsp Laki-Laki &nbsp &nbsp &nbsp
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" id="jenkel" name="jenkel" value="{{ $user->jenkel == 'perempuan' ? 'perempuan' : 'perempuan' }}" {{ $user->jenkel == 'perempuan' ? 'checked' : '' }}> &nbsp Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="alamat" name="alamat" value="{{ $user->alamat }}"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">RT</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="rt" name="rt" value="{{ $user->rt }}">
                                                </div>
                                            </div> 
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">RW</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="rw" name="rw" value="{{ $user->rw }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kode pos</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="{{ Auth::user()->kode_pos }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Provinsi</label>
                                                <div class="col-sm-9">
                                                    <select name="province_id" id="province_id" class="selectpicker form-control" data-style="py-0">
                                                        <option value="">Pilih Provinsi...</option>

                                                        @foreach ($provinces as $provinsi)
                                                        <option value="{{ $provinsi->id }}">
                                                            {{ $provinsi->name }}
                                                        </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kota</label>
                                                <div class="col-sm-9">
                                                    <select name="regency_id" id="regency_id" class="selectpicker form-control" data-style="py-0">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kecamatan</label>
                                                <div class="col-sm-9">
                                                    <select name="village_id" id="village_id" class="selectpicker form-control" data-style="py-0">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kelurahan</label>
                                                <div class="col-sm-9">
                                                    <select name="district_id" id="district_id" class="selectpicker form-control" data-style="py-0">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-inverse-primary btn-fw">Ubah data</button>
                                    <a href="{{ route('profile.index') }}" class="btn btn-inverse-danger btn-fw">Batal</a>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

</body>

</html>

<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/js/isotope.min.js') }}"></script>
<script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
<script src="{{ asset('assets/js/tabs.js') }}"></script>
<script src="{{ asset('assets/js/popup.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script>
    $(function() {
        $('#province_id').on('change', function() {
            let province_id = $('#province_id').val();

            if (province_id) {
                $.ajax({
                    url: "{{ route('getKota') }}",
                    type: "POST",
                    data: {
                        province_id: province_id
                    },
                    cache: false,
                    success: function($msg) {
                        $('#regency_id').html($msg);
                        $('#village_id').html('');
                        $('#district_id').html('');
                    },
                    error: function(data) {
                        console.log('error:', data);
                    }
                })
            }
        })
        $('#regency_id').on('change', function() {
            let regency_id = $('#regency_id').val();
            if (regency_id) {
                $.ajax({
                    url: "{{ route('getKecamatan') }}",
                    type: "POST",
                    data: {
                        regency_id: regency_id
                    },
                    cache: false,
                    success: function($msg) {
                        $('#village_id').html($msg);
                        $('#district_id').html('');
                    },
                    error: function(data) {
                        console.log('error:', data);
                    }
                })
            }
        })
        $('#village_id').on('change', function() {
            let village_id = $('#village_id').val();
            if (village_id) {
                $.ajax({
                    url: "{{ route('getKelurahan') }}",
                    type: "POST",
                    data: {
                        village_id: village_id
                    },
                    cache: false,
                    success: function($msg) {
                        $('#district_id').html($msg);
                    },
                    error: function(data) {
                        console.log('error:', data);
                    }
                })
            }
        })
        $('#inputGambar_profile').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            var panjangnamafile = fileName.length;

            if (panjangnamafile > 22) {
                hasilpotong = fileName.substring(0, 22);
                $(this).next('.custom-file-label').html(hasilpotong);
            } else {
                $(this).next('.custom-file-label').html(fileName);
            }
        })

        function filePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(function() {
            $("#inputGambar_profile").change(function() {
                filePreview(this);
            });
        });

    });
</script>
@endsection