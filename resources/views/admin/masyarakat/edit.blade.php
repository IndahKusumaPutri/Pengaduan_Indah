@extends('admin.layouts.app')

@section('content')
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <h3 class="font-weight-bold">Ubah Data User</h3>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="card-body">

                                <form class="form-horizontal" action="/masyarakat/update/{{ $masyarakat->id }}" method="post" enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('POST') }}

                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="number" class="form-control" id="nik" name="nik" value="{{ $masyarakat->nik }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $masyarakat->name }}">
                                    </div>

                                    <div class=" form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ $masyarakat->email }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="telp">No Telepon</label>
                                        <input type="number" class="form-control" id="telp" name="telp" value="{{ $masyarakat->telp }}">
                                    </div>

                                    <div class="">
                                        <label for="role">Role</label>
                                        <div class="form-group">
                                            <select class="form-control" id="role" name="role" value="{{ $masyarakat->role }}">
                                                <option value="admin" {{ $masyarakat->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="admin" {{ $masyarakat->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="petugas" {{ $masyarakat->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                                <option value="masyarakat" {{ $masyarakat->role == 'masyarakat' ? 'selected' : '' }}>Masyarakat</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="jenkel">Jenis Kelamin</label>
                                        <div class="col-sm-6">
                                            <label for="jenkel">
                                                <input type="radio" name="jenkel" value="{{ $masyarakat->jenkel == 'laki-laki' ? 'laki-laki' : 'laki-laki' }}" {{ $masyarakat->jenkel == 'laki-laki' ? 'checked' : '' }}> &nbsp
                                                Laki-Laki
                                                &nbsp &nbsp &nbsp
                                                <input type="radio" name="jenkel" value="{{ $masyarakat->jenkel == 'perempuan' ? 'perempuan' : 'perempuan' }}" {{ $masyarakat->jenkel == 'perempuan' ? 'checked' : '' }}> &nbsp
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" value="{{ $masyarakat->alamat }}"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="rt">Rt</label>
                                        <input type="text" class="form-control" id="rt" name="rt" value="{{ $masyarakat->rt }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="rw">Rw</label>
                                        <input type="text" class="form-control" id="rw" name="rw" value="{{ $masyarakat->rw }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="kode_pos">Kode Pos</label>
                                        <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="{{ $masyarakat->kode_pos }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="province_id">Provinsi</label>
                                        <select name="province_id" id="province_id" class="selectpicker form-control" data-style="py-0">
                                            <option value="">Pilih Provinsi...</option>
                                            @foreach ($provinces as $provinsi)
                                            <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="regency_id">Kabupaten/Kota</label>
                                        <select name="regency_id" id="regency_id" class="selectpicker form-control" data-style="py-0">

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="village_id">Kecamatan</label>
                                        <select name="village_id" id="village_id" class="selectpicker form-control" data-style="py-0">

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="district_id">Kelurahan</label>
                                        <select name="district_id" id="district_id" class="selectpicker form-control" data-style="py-0">

                                        </select>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <a href="{{ route('masyarakat.index') }}" class="btn btn-inverse-danger btn-fw">Batal</a>
                                        <button type="submit" class="btn btn-inverse-primary btn-fw" onclick="return confirm('Yakin anda ingin mengubah data tersebut?')">Ubah data</button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    $(document).on('ready', () => {
        $("#select-image").on('change', function() {
            $(".filearray").empty(); //you can remove this code if you want previous user input
            for (let i = 0; i < this.files.length; ++i) {
                let filereader = new FileReader();
                let $img = jQuery.parseHTML("<img src='' height='100px' widht='50px'> ");
                filereader.onload = function() {
                    $img[0].src = this.result;
                };
                filereader.readAsDataURL(this.files[i]);
                $(".filearray").append($img);
            }
        });
    });
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
        });
    });
</script>
@endsection