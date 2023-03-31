@extends('masyarakat.layouts.app')

@section('content')
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.1/dist/sweetalert2.min.css">
    <link href="../dataTables/DataTables-1.10.13/css/jquery.dataTables.css" rel="stylesheet">
    <link href="../fontawesome/css/all.css" rel="stylesheet">

</head>

<body>

    @if (session('Data dihapus'))
    <div class="alert alert-danger" role="alert">
        {{ session('Data dihapus') }}
    </div>
    @endif

    @if (session('Data ditambah'))
    <div class="alert alert-success" role="alert">
        {{ session('Data ditambah') }}
    </div>
    @endif

    <!-- <div class="main-panel"> -->
    <div class="content-wrapper">
        <div class="container">
            <h3 class="font-weight-bold">
                <center>Riwayat Pengaduan Anda</center>
            </h3>
            <div class="card mt-5">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                            <div class="card mt-2">
                                <div class="card-body">

                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered table-hover table-striped" id="datatables">

                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal Pengaduan</th>
                                                    <th>Isi Laporan</th>
                                                    <th>Foto</th>
                                                    <th>Status</th>
                                                    <th>Opsi</th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                @forelse ($pengaduan as $i => $p)

                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>{{ date('d F Y'. strtotime($p->tgl_tanggapan)) }}</td>
                                                    <td>{{ $p->isi_laporan }}</td>
                                                    <td>
                                                        @php
                                                        $foto = App\Models\Pengaduan_Image::where('id_pengaduan', $p->unique_id)->get();
                                                        @endphp
                                                        @foreach ($foto as $item)
                                                        <a href="{{ asset('images/' . $p->foto) }}/{{ $item->foto }}" target="_blank" rel="noopener noreferrer">
                                                            <img src="{{ asset('images/' . $p->foto) }}/{{ $item->foto }}" height="15%" width="30%">
                                                        </a>
                                                        @endforeach
                                                    </td>

                                                    <td>
                                                        @if ($p->status == '0')
                                                        <label>Menunggu Konfirmasi</label>
                                                        @elseif ($p->status == 'proses')
                                                        <label>Sedang Proses</label>
                                                        @else
                                                        <label>Selesai</label>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($p->status == 'proses')
                                                        <a class="btn btn-sm btn-inverse-info btn-fw" href="/detail/pengaduan/{{ $p->id_pengaduan }}" class="flex items-center justify-between  text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Detail">
                                                            Lihat Tanggapan
                                                        </a>
                                                        @elseif ($p->status == '0')
                                                        <button class="btn btn-sm btn-inverse-info btn-fw" onclick="showAlert()">Lihat Tanggapan</button>
                                                        @else
                                                        <a class="btn btn-sm btn-inverse-info btn-fw" href="/detail/pengaduan/{{ $p->id_pengaduan }}" class="flex items-center justify-between  text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Detail">
                                                            Detail
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>

                                                @empty
                                                <tr>
                                                    <td colspan="7" class="text-center text-gray-400">
                                                        Data Kosong
                                                    </td>
                                                </tr>
                                                @endforelse

                                                <div class="form-group row">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <a href="/" class="btn btn-inverse-danger btn-fw">Home</a>
                                                    </div>
                                                </div>
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
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    // Fungsi untuk memunculkan SweetAlert
    function showAlert() {
        Swal.fire(
            'Belum ada tanggapan',
            'Tunggu Tanggapan ya!',
            'error'
        )
    }
</script>
<script src="../dataTables/DataTables-1.10.13/js/jquery.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable();
    });
</script>

</html>

@endsection