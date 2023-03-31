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
                        <h3 class="font-weight-bold">Ubah Data Petugas</h3>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="card-body">

                                <form class="form-horizontal" action="/petugas/update/{{ $petugas->id }}" method="post" enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('POST') }}

                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="number" class="form-control" id="nik" name="nik" value="{{ $petugas->nik }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $petugas->name }}">
                                    </div>

                                    <div class=" form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ $petugas->email }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="telp">No Telepon</label>
                                        <input type="number" class="form-control" id="telp" name="telp" value="{{ $petugas->telp }}">
                                    </div>

                                    <div class="">
                                        <label for="role">Role</label>
                                        <div class="form-group">
                                            <select class="form-control" id="role" name="role" value="{{ $petugas->role }}">
                                                <option value="admin" {{ $petugas->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="petugas" {{ $petugas->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                                <option value="masyarakat" {{ $petugas->role == '' ? 'selected' : '' }}>Masyarakat</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="jenkel">Jenis Kelamin</label>
                                        <div class="col-sm-6">
                                            <label for="jenkel">
                                                <input type="radio" name="jenkel" value="{{ $petugas->jenkel == 'laki-laki' ? 'laki-laki' : 'laki-laki' }}" {{ $petugas->jenkel == 'laki-laki' ? 'checked' : '' }}> &nbsp Laki-Laki
                                                &nbsp &nbsp &nbsp
                                                <input type="radio" name="jenkel" value="{{ $petugas->jenkel == 'perempuan' ? 'perempuan' : 'perempuan' }}" {{ $petugas->jenkel == 'perempuan' ? 'checked' : '' }}> &nbsp Perempuan
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" value=""></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="rt">Rt</label>
                                        <input type="text" class="form-control" id="rt" name="rt" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="rw">Rw</label>
                                        <input type="text" class="form-control" id="rw" name="rw" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="kode_pos">Kode Pos</label>
                                        <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="">
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
                                        <button type="submit" class="btn btn-inverse-primary btn-fw"  onclick="return confirm('Yakin anda ingin mengubah data tersebut?')">Ubah data</button>
                                        <a href="{{ route('petugas.index') }}" class="btn btn-inverse-danger btn-fw">Batal</a>
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
</script>

@endsection