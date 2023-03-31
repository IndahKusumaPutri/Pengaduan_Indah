@component('mail::message')
Yess!
Laporanmu sudah selesai ditindak lanjuti! Lihat detail laporanmu sekarang!

@component('mail::button', ['url' => route('history') ])
Lihat Tanggapan
@endcomponent


Terima kasih!,<br>
Pengaduan Masyarakat
@endcomponent

<!-- <table id="datatable" claas="table table-striped" data-toggle="data-table">
    <thead>
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tanggal Pengaduan</th>
            <th>Tanggal Tanggapan</th>
            <th>Isi Pengaduan</th>
            <th>Isi Tanggapan</th>
            <th>Status Pengaduan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $data['nik'] }}</td>
            <td>{{ $data['name'] }}</td>
            <td>{{ $data['tgl_pengaduan'] }}</td>
            <td>{{ $data['tgl_tanggapan'] }}</td>
            <td>{{ $data['isi_laporan'] }}</td>
            <td>{{ $data['tanggapan'] }}</td>
            <td>{{ $data['status'] }}</td>
        </tr>
    </tbody>
</table> -->