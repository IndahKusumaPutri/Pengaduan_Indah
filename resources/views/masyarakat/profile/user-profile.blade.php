<!-- Content Header (Page header) -->
@extends('masyarakat.layouts.app')

@section('content')
<!doctype html>

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
                                <h4 class="card-title">Profile Anda</h4>
                                <p class="card-description">
                                    Biodata Data Diri
                                </p>

                                <form type="hidden" value="post" name="_method">

                                    {{ csrf_field() }}

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">NIK</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" value="@if (!empty($user->nik)) {{ $user->nik }} @else Silahkan Perbaharui @endif" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" value="@if (!empty($user->name)) {{ $user->name }} @else Silahkan Perbaharui @endif" disabled>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" value="@if (!empty($user->email)) {{ $user->email }} @else Silahkan Perbaharui @endif" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="password" id="password" disabled>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">No handphone</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" value="@if (!empty($user->telp)) {{ $user->telp }} @else Silahkan Perbaharui @endif" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" value="@if (!empty($user->jenkel)) {{ $user->jenkel }} @else Silahkan Perbaharui @endif" disabled>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" value="@if (!empty($user->alamat)) {{ $user->alamat }} @else Silahkan Perbaharui @endif" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">RT</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" value="@if (!empty($user->rt)) {{ $user->rt }} @else Silahkan Perbaharui @endif" disabled>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">RW</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" value="@if (!empty($user->rw)) {{ $user->rw }} @else Silahkan Perbaharui @endif" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kode pos</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" value="@if (!empty($user->kode_pos)) {{ $user->kode_pos }} @else Silahkan Perbaharui @endif" disabled>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Provinsi</label>
                                                <div class="col-sm-9">
                                                    @foreach ($user_profile as $v)
                                                    <input class="form-control" value="@if ($user->province_id) {{$v->province->name}} @else Silahkan Perbaharui @endif" disabled>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kota</label>
                                                <div class="col-sm-9">
                                                    @foreach ($user_profile as $v)
                                                    <input class="form-control" value="@if ($user->regency_id) {{$v->regencies->name}} @else Silahkan Perbaharui @endif" disabled>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kecamatan</label>
                                                <div class="col-sm-9">
                                                    @foreach ($user_profile as $v)
                                                    <input class="form-control" value="@if ($user->village_id) {{$v->village->name}} @else Silahkan Perbaharui @endif" disabled>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kelurahan</label>
                                                <div class="col-sm-9">
                                                    @foreach ($user_profile as $v)
                                                    <input class="form-control" value="@if ($user->district_id) {{$v->district->name}} @else Silahkan Perbaharui @endif" disabled>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <a href="{{ route('user-profile.edit') }}" class="btn btn-inverse-success btn-fw">Edit</a>
                                    </div>

                                    <div class="form-group">
                                        <a href="/" class="btn btn-inverse-danger btn-fw">Kembali</a>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

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