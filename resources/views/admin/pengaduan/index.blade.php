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

    @if (session('Data diedit'))
    <div class="alert alert-success" role="alert">
        {{ session('Data diedit') }}
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
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="font-weight-bold">
                                <font color="#2B547E">
                                    <center>Data Pengaduan</center>
                                </font>
                            </h3>
                            <hr color="#E9967A">
                            <div class="card mt-2">
                                <div class="card-body">
                                    @if (auth()->user()->role === 'admin')
                                    <a href="{{ route('cetak.pengaduan') }}" target="_blank" class="btn btn-inverse-info btn-fw"><i class="ti-printer btn-icon-append">
                                            Cetak Data
                                        </i></a>
                                    @else
                                    @endif
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
                                                        <font color="#2B547E">NIK</font>
                                                    </th>
                                                    <th>
                                                        <font color="#2B547E">Email</font>
                                                    </th>
                                                    <th>
                                                        <font color="#2B547E">Isi Laporan</font>
                                                    </th>
                                                    <th>
                                                        <font color="#2B547E">Foto</font>
                                                    </th>
                                                    <th>
                                                        <font color="#2B547E">Status</font>
                                                    </th>
                                                    <th>
                                                        <font color="#2B547E">Opsi</font>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody>

                                                @forelse ($pengaduan as $i => $p)
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>{{ date('d F Y' . strtotime($p->tgl_tanggapan)) }}</td>
                                                    <td>{{ $p->user->nik }}</td>
                                                    <td>{{ $p->user->email }}</td>
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
                                                        @if ($p->status == '0')
                                                        <a href="/pengaduan/edit/{{ $p->id_pengaduan }}" class="btn btn-sm btn-inverse-success btn-fw">Beri Tanggapan</a>
                                                        @elseif ($p->status == 'proses')
                                                        <a href="/pengaduan/status/{{ $p->id_pengaduan }}" class="btn btn-sm btn-inverse-primary btn-fw" onclick="return confirm('Selesaikan pengaduan ini')">Selesai</a>
                                                        @else
                                                        <a href="/pengaduan/show/{{ $p->id_pengaduan }}" class="btn btn-sm btn-inverse-info btn-fw">Detail</a>
                                                        <a href="/pengaduan/delete/{{ $p->id_pengaduan }}" class="btn btn-sm btn-inverse-danger btn-fw" onclick="return confirm('Yakin anda ingin menghapus data tersebut?')">Hapus</a>
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
<script src="../dataTables/DataTables-1.10.13/js/jquery.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable();
    });
</script>

@endsection