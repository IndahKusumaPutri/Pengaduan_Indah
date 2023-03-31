<!-- Content Header (Page header) -->
@extends('admin.layouts.app')

@section('content')

<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold text-center">Tambah Data Petugas</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card">
                <div class="card-body">

                    <form method="post" action="{{ route('petugas.store') }}" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-group col-12">
                            <label for="nik">NIK</label>
                            <input type="number" class="form-control" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Masukkan nik">

                            @if($errors->has('nik'))
                            <div class="text-danger">
                                {{ $errors->first('nik')}}
                            </div>
                            @endif

                        </div>
                        <div class="form-group col-12">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama">

                            @if($errors->has('name'))
                            <div class="text-danger">
                                {{ $errors->first('name')}}
                            </div>
                            @endif

                        </div>
                        <div class="form-group col-12">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan email">

                            @if($errors->has('email'))
                            <div class="text-danger">
                                {{ $errors->first('email')}}
                            </div>
                            @endif

                        </div>
                        <div class="form-group col-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Masukkan password">

                            @if($errors->has('password'))
                            <div class="text-danger">
                                {{ $errors->first('password')}}
                            </div>
                            @endif

                        </div>
                        <div class="form-group col-12">
                            <label for="telp">No Handphone</label>
                            <input type="number" class="form-control" id="telp" name="telp" value="{{ old('telp') }}" placeholder="Masukkan no handphone">

                            @if($errors->has('telp'))
                            <div class="text-danger">
                                {{ $errors->first('telp')}}
                            </div>
                            @endif

                        </div>
                        <div class="form-group col-12">
                            <label for="jenkel">Jenis Kelamin</label>
                            <div class="col-sm-6">
                                <label for="jenkel">
                                    <input type="radio" name="jenkel" value="Laki-laki" id="jenkel" checked>&nbsp Laki-Laki &nbsp &nbsp &nbsp
                                    <input type="radio" name="jenkel" value="Perempuan" id="jenkel">&nbsp
                                    Perempuan
                                </label>

                                @if($errors->has('jenkel'))
                                <div class="text-danger">
                                    {{ $errors->first('jenkel')}}
                                </div>
                                @endif

                            </div>
                        </div>

                        <div class="form-group col-12">
                            <a href="{{ route('petugas.index') }}" class="btn btn-inverse-info btn-fw">Batal</a>
                            <button type="submit" class="btn btn-inverse-primary btn-fw" onclick="return confirm('Yakin anda ingin menyimpan data tersebut?')">Simpan</i></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>

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
    });
</script>

@endsection