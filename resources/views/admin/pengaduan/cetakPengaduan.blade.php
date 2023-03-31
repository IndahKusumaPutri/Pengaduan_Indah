<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            /* left: 3%; */
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak Data Pengaduan</title>
</head>

<body>
    <!-- <center>
    <img src="Gambar/kopsurat.jpeg" width="500px">
    </center> -->
    <center>
        <br>
        <p>
            <font size="4"><b>&nbsp;&nbsp;&nbsp;&nbsp;Laporan Data Pengaduan Masyarakat</b></font>
        </p>
    </center>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%">
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Tanggal Pengaduan</th>
            <th>Isi Laporan</th>
            <th>Bukti</th>
            <th>Status</th>
            <th>Tanggal Ditanggapi</th>
            <th>Tanggapan</th>
        </tr>

        @foreach ($cetakpengaduan as $item)

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <center />
                {{ Auth::user()->nik }}
            </td>
            <td>
                <center />
                {{ date('d F Y'. strtotime($item->tgl_tanggapan)) }}
            </td>
            <td>
                {{ $item->isi_laporan }}</td>
            <td>
                @foreach ($pengaduan as $p)
                <center>
                    @php
                    $foto = App\Models\Pengaduan_Image::where('id_pengaduan', $item->unique_id)->get();
                    @endphp
                    @foreach ($foto as $item)
                    <a href="{{ asset('images/' . $p->foto) }}/{{ $item->foto }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('images/' . $p->foto) }}/{{ $item->foto }}" height="15%" width="30%">
                    </a>
                    @endforeach
                </center>
                @endforeach

            </td>
            <td>
                <center>
                    @if ($item->status == '0')
                    <label class="btn btn-sm btn-primary">Terkirim</label>
                    @elseif ($item->status == 'proses')
                    <label class="btn btn-sm btn-warning">Proses</label>
                    @else
                    <label class="btn btn-sm btn-success">Selesai</label>
                    @endif
            </td>
            <td>
                <center>
                    {{ Carbon\Carbon::parse($item->tgl_tanggapan)->format('d F Y') }}
                </center>
            </td>
            <td>{{$item->tanggapan}}</td>
        </tr>
        @endforeach
    </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>