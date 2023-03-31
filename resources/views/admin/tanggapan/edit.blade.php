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
            <h3 class="font-weight-bold">Ubah Data Tanggapan</h3>
          </div>
        </div>
        <div class="card mt-5">
          <div class="card">
            <div class="card-body">

              <form class="form-horizontal" action="/tanggapan/update/{{ $tanggapan->id_tanggapan }}" method="POST">

                {{ csrf_field() }}
                {{ method_field('POST') }}

                <div class="form-group row">
                  <label class="col-sm-12">Tanggapan</label>
                  <div class="col-sm-12">
                    <textarea class="form-control" name="tanggapan" value="{{ $tanggapan->pengaduan->tanggapan }}"></textarea>
                    @if($errors->has('tanggapan'))
                    <div class="text-danger">
                      {{ $errors->first('tanggapan')}}
                    </div>
                    @endif
                  </div>
                </div>



                <div class="form-group row">
                  <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" class="btn btn-inverse-primary btn-fw" onclick="return confirm('Yakin anda ingin mengubah data tersebut?')">Ubah Data</button>
                    <a href="{{ route('tanggapan.index') }}" class="btn btn-inverse-danger btn-fw">Batal</a>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
</body>

</html>
@endsection