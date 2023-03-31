@extends('admin.layouts.app')

@section('content')

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengaduan</title>
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <h3 class="font-weight-bold">Masukkan Tanggapan</h3>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="card-body">
                                <form class="form-horizontal" action="/pengaduan/update/{{ $pengaduan->id_pengaduan }}" method="post" enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('POST') }}

                                    <div class="form-group row">
                                        <label class="col-sm-12">Tanggal Pengaduan</label>
                                        <div class="col-sm-12">
                                            <p>{{ date('d F Y'. strtotime($pengaduan->tgl_tanggapan)) }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12">NIK</label>
                                        <div class="col-sm-12">
                                            <p>{{ $pengaduan->nik }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12">Isi Laporan</label>
                                        <div class="col-sm-12">
                                            <p>{{ $pengaduan->isi_laporan }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12">Foto</label>
                                        <div class="col-sm-10">
                                            <p>
                                                @php
                                                $foto = App\Models\Pengaduan_Image::where('id_pengaduan', $pengaduan->unique_id)->get();
                                                @endphp
                                                @foreach ($foto as $item)
                                                <a href="{{ asset('images/' . $pengaduan->foto) }}/{{ $item->foto }}" target="_blank" rel="noopener noreferrer">
                                                    <img src="{{ asset('images/' . $pengaduan->foto) }}/{{ $item->foto }}" height="15%" width="30%">
                                                </a>
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12">Status</label>
                                        <div class="col-sm-12">
                                            <p>
                                                @if ($pengaduan->status == '0')
                                                <label>Terkirim</label>
                                                @elseif ($pengaduan->status == 'proses')
                                                <label>Proses</label>
                                                @else
                                                <label>Selesai</label>
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-12">Tanggapan</label>
                                        <div class="col-sm-12">
                                            <textarea name="tanggapan" class="form-control"></textarea>
                                        </div>

                                        @if($errors->has('tanggapan'))
                                        <div class="text-danger">
                                            {{ $errors->first('tanggapan')}}
                                        </div>
                                        @endif
                                        
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <button type="submit" class="btn btn-inverse-primary btn-fw" onclick="return confirm('Yakin anda ingin menyimpan data tersebut?')">Kirim</i></button>
                                        <a href="{{ route('pengaduan.index')}}" class="btn btn-inverse-danger btn-fw">Batal</a>
                                    </div>
                                </form>
                            </div>
                            </form>
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