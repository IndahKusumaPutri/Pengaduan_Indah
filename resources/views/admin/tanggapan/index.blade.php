@extends('admin.layouts.app')

@section('content')

<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../dataTables/DataTables-1.10.13/css/jquery.dataTables.css" rel="stylesheet">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
</head>

<body>

    @if (session('Data dihapus'))
    <div class="alert alert-danger" role="alert">
        {{ session('Data dihapus') }}
    </div>
    @endif

    @if(session('Data diedit'))
    <div class="alert alert-success" role="alert">
        {{session('Data diedit')}}
    </div>
    @endif

    @if (session('Data ditambah'))
    <div class="alert alert-success" role="alert">
        {{ session('Data ditambah') }}
    </div>
    @endif

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <h3 class="font-weight-bold">
                    <font color="#2B547E">
                        <center>Data Tanggapan</center>
                    </font>
                </h3>
                <div class="card mt-5">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">

                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="table-responsive pt-3">

                                            <table class="table table-bordered table-hover table-striped" id="datatables">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <font color="#2B547E">No</font>
                                                        </th>
                                                        <th>
                                                            <font color="#2B547E">Tanggal Pengaduan</font>
                                                        </th>
                                                        <th>
                                                            <font color="#2B547E">Tanggapan</font>
                                                        </th>
                                                        <th>
                                                            <font color="#2B547E">NIK</font>
                                                        </th>
                                                        <th>
                                                            <font color="#2B547E">Nama</font>
                                                        </th>
                                                        <th>
                                                            <font color="#2B547E">Opsi</font>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @forelse ($tanggapan as $i => $p)
                                                    <tr>
                                                        <td>{{ $i + 1 }}</td>
                                                        <td>{{ $p->tgl_tanggapan }}</td>
                                                        <td>{{ $p->tanggapan }}</td>
                                                        <td>{{ $p->pengaduan->nik }}</td>
                                                        <td>{{ $p->user->name }}</td>
                                                        <td>
                                                            <form method="post" action="{{ route('tanggapan.destroy', $p->id_tanggapan) }}"> {{ csrf_field() }}
                                                                <a href="{{ route('tanggapan.edit', $p->id_tanggapan) }}" class="btn btn-sm btn-inverse-success btn-fw">Edit</a>
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button class="btn btn-sm btn-inverse-danger btn-fw" type="submit" onclick="return confirm('Yakin anda ingin menghapus data tersebut?')">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>

                                                    @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center text-gray-400">
                                                            Data Kosong
                                                        </td>
                                                    </tr>
                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="../dataTables/DataTables-1.10.13/js/jquery.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable();
    });
</script>
@endsection