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
                        <h3 class="font-weight-bold">Detail Data Petugas</h3>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <form class="form-horizontal">
                            <div class="card-body">

                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-group row">
                                    <label class="col-sm-12">NIK</label>
                                    <div class="col-sm-12">
                                        <p>@if (!empty($petugas->nik))
                                        <p> {{ $petugas->nik }}</p>
                                        @else
                                        <p><strong>Belum dilengkapi</strong></p>
                                        @endif</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12">Name</label>
                                    <div class="col-sm-12">
                                        @if (!empty($petugas->name))
                                        <p> {{ $petugas->name }}</p>
                                        @else
                                        <p><strong>Belum dilengkapi</strong></p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12">Email</label>
                                    <div class="col-sm-12">
                                        @if (!empty($petugas->email))
                                        <p> {{ $petugas->email }}</p>
                                        @else
                                        <p><strong>Belum dilengkapi</strong></p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12">No Handphone</label>
                                    <div class="col-sm-12">
                                        @if (!empty($petugas->telp))
                                        <p> {{ $petugas->telp }}</p>
                                        @else
                                        <p><strong>Belum dilengkapi</strong></p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12">Role</label>
                                    <div class="col-sm-12">
                                        @if (!empty($petugas->role))
                                        <p> {{ $petugas->role }}</p>
                                        @else
                                        <p><strong>Belum dilengkapi</strong></p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12">Jenis Kelamin</label>
                                    <div class="col-sm-12">
                                        @if (!empty($petugas->jenkel))
                                        <p> {{ $petugas->jenkel }}</p>
                                        @else
                                        <p><strong>Belum dilengkapi</strong></p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12">Alamat</label>
                                    <div class="col-sm-12">
                                        @if (!empty($petugas->alamat))
                                        <p> {{ $petugas->alamat }}</p>
                                        @else
                                        <p><strong>Belum dilengkapi</strong></p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12">RT</label>
                                    <div class="col-sm-12">
                                        @if (!empty($petugas->rt))
                                        <p> {{ $petugas->rt }}</p>
                                        @else
                                        <p><strong>Belum dilengkapi</strong></p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12">Rw</label>
                                    <div class="col-sm-12">
                                        @if (!empty($petugas->rw))
                                        <p> {{ $petugas->rw }}</p>
                                        @else
                                        <p><strong>Belum dilengkapi</strong></p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12">Kode Pos</label>
                                    <div class="col-sm-12">
                                        @if (!empty($petugas->kode_pos))
                                        <p> {{ $petugas->kode_pos }}</p>
                                        @else
                                        <p><strong>Belum dilengkapi</strong></p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12">Provinsi</label>
                                    <div class="col-sm-12">
                                        @foreach ($indoregion as $v)

                                        @if (!empty($petugas->province_id))
                                        <p>{{ $v->province->name }}</p>
                                        @else
                                        <p><strong>Belum dilengkapi</strong></p>
                                        @endif

                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12">Kabupaten/Kota</label>
                                    <div class="col-sm-12">
                                        @foreach ($indoregion as $v)

                                        @if (!empty($petugas->regency_id))
                                        <p>{{ $v->regencies->name }}</p>
                                        @else
                                        <p><strong>Belum dilengkapi</strong></p>
                                        @endif

                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12">Kecamatan</label>
                                    <div class="col-sm-12">
                                        @foreach ($indoregion as $v)

                                        @if (!empty($petugas->village_id))
                                        <p>{{ $v->village->name }}</p>
                                        @else
                                        <p><strong>Belum dilengkapi</strong></p>
                                        @endif

                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12">Kelurahan</label>
                                    <div class="col-sm-12">
                                        @foreach ($indoregion as $v)

                                        @if (!empty($petugas->district_id))
                                        <p>{{ $v->district->name }}</p>
                                        @else
                                        <p><strong>Belum dilengkapi</strong></p>
                                        @endif

                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <a href="{{ route('petugas.index') }}" class="btn btn-inverse-danger btn-fw">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
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