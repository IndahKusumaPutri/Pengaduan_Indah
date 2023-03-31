<!-- Content Header (Page header) -->
@extends('masyarakat.layouts.app')

@section('content')
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold text-center">Silahkan ajukan pengaduan Anda!</h3>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card">
                <div class="card-body">

                    <form method="post" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-group col-12">
                            <label for="isi_laporan">Isi Laporan Pengaduan</label>
                            <textarea style="width:1040px;height:100px;" name="isi_laporan" class="form-control" placeholder="Masukkan Isi Pengaduan"></textarea>
                            <p style="color: red;"><strong>*Mohon isi laporan pengaduan ini dengan alamat lokasi yang lengkap!</strong></p>

                            @if ($errors->has('isi_laporan'))
                            <div class="text-danger">
                                {{ $errors->first('isi_laporan') }}
                            </div>
                            @endif

                        </div>

                        <div class="form-group col-12">
                            <label class="form-label" for="foto">Foto Pengaduan</label>
                            <input type="file" class="form-control" id="select-image" name="foto[]" multiple />
                            <br />
                            <div class="filearray">
                            </div>

                            @if ($errors->has('foto'))
                            <div class="text-danger">
                                {{ $errors->first('foto') }}
                            </div>
                            @endif

                        </div>

                        <div class="form-group col-12">
                            <a href="/" class="btn btn-inverse-danger btn-fw">Home</a>
                            <button type="submit" class="btn btn-inverse-primary btn-fw" onclick="return confirm('Yakin anda ingin menyimpan data tersebut?')">Simpan</i></button>
                        </div>

                    </form>
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