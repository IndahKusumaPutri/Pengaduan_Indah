<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Mail\SendTanggapan;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Mail\SendStatus;
use App\Models\User;


class PengaduanAdminController extends Controller
{
    public function indexPengaduanAdmin()
    {
        $pengaduan = Pengaduan::all();

        // $user = Auth::user()->nik;

        $nik = Auth::user()->nik;

        return view('admin.pengaduan.index', compact('pengaduan', 'nik'));
    }

    public function detailPengaduanAdmin($id)
    {
        $user = User::all();

        $pengaduan = Pengaduan::with(['details', 'user'])->findOrFail($id);

        $tanggapan = Tanggapan::where('id_pengaduan', $id)->first();

        $tanggapans = DB::table('tanggapans as T')
            ->select('T.*', 'P.*', 'U.name', 'U.email')
            ->join('pengaduans as P', 'T.id_pengaduan', '=', 'P.id_pengaduan')
            ->join('users as U', 'P.nik', '=', 'U.nik')
            ->where('P.id_pengaduan', '=', $id)
            ->first();

        return view('admin.pengaduan.show', compact('pengaduan', 'tanggapan', 'tanggapans', 'user'));
    }

    public function editPengaduanAdmin($id)
    {
        $user = Auth::User()->nik;
        // $user = User::where('id', $id)->first();


        $pengaduan = Pengaduan::with(['details', 'user'])->findOrFail($id);

        // $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();

        $tanggapan = Tanggapan::where('id_pengaduan', $id)->first();

        return view('admin.pengaduan.edit', compact('pengaduan', 'tanggapan', 'user'));
    }

    public function updatePengaduanAdmin(Request $request, $id)
    {
        $message = ([
            'required'  => "Data tidak boleh kosong!"
        ]);

        $this->validate($request, [
            'tanggapan'    => 'required'
        ], $message);

        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();

        Tanggapan::create([
            'id_pengaduan'  => $pengaduan->id_pengaduan,
            'tgl_tanggapan' => Carbon::now()->format('Y-m-d'),
            'tanggapan'     => $request->tanggapan,
            'nik'           => $pengaduan->nik,
        ]);

        Pengaduan::where('id_pengaduan', $id)->update([
            'status'        => 'proses'
        ]);

        $send_tanggapan = DB::table('tanggapans as T') // tb tanggapans di bikin alias T jadi bukan variable
            ->select('T.*', 'P.*', 'U.name', 'U.email') //seluruh data di tb tanggapan diambil, seluruh data di tb pengaduan, di tb user yang di ambil hanya name dan email
            ->join('pengaduans as P', 'T.id_pengaduan', '=', 'P.id_pengaduan') //tb menjoin antara T.id_pengaduan(yg mnjdi foreign key di tb T/tanggapan yaitu id_pengaduan, yg menjadi primary key di tb P/pengaduan yaitu id_pengaduan)
            ->join('users as U', 'P.nik', '=', 'U.nik')
            ->where('P.id_pengaduan', '=', $id)
            ->first();

        $data_tanggapan = [
            'nik'           => $send_tanggapan->nik,
            'name'          => $send_tanggapan->name,
            'tgl_pengaduan' => $send_tanggapan->tgl_pengaduan,
            'tgl_tanggapan' => $send_tanggapan->tgl_tanggapan,
            'isi_laporan'   => $send_tanggapan->isi_laporan,
            'tanggapan'     => $send_tanggapan->tanggapan,
            'status'        => $send_tanggapan->status
        ];

        Mail::to($send_tanggapan->email)->send(new SendTanggapan($data_tanggapan));

        Alert::success('Berhasil!', 'Tanggapan Anda Berhasil Terkirim!');

        return redirect()->route('tanggapan.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function statusPengaduan($id)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();

        $status_sekarang = $pengaduan->status;

        if ($status_sekarang == 1) {
            Pengaduan::where('id_pengaduan', $id)->update([
                'status' => 0
            ]);
        } else {
            Pengaduan::where('id_pengaduan', $id)->update([
                'status' => 1
            ]);
        }

        $send_status = DB::table('tanggapans as T')
            ->select('T.*', 'P.*', 'U.name', 'U.email')
            ->join('pengaduans as P', 'T.id_pengaduan', '=', 'P.id_pengaduan')
            ->join('users as U', 'P.nik', '=', 'U.nik')
            ->where('P.id_pengaduan', '=', $id)
            ->first();

        $data_tanggapan = [
            'nik' => $send_status->nik,
            'name' => $send_status->name,
            'tgl_pengaduan' => $send_status->tgl_pengaduan,
            'tgl_tanggapan' => $send_status->tgl_tanggapan,
            'isi_laporan' => $send_status->isi_laporan,
            'tanggapan' => $send_status->tanggapan,
            'status' => $send_status->status,
        ];
        Mail::to($send_status->email)->send(new SendStatus($data_tanggapan));

        return redirect()->route('pengaduan.index')->with('Data diubah', 'Data berhasil diubah!');
    }

    public function cetakPengaduanAdmin(Request $request)
    {

        $pengaduan = Pengaduan::all();

        $cetakpengaduan = DB::table('tanggapans as u')
            ->select('u.id_tanggapan', 'u.id_pengaduan', 'u.tgl_tanggapan', 'u.tanggapan', 'b.*')
            ->join('pengaduans as b', 'b.id_pengaduan', '=', 'u.id_pengaduan')
            ->where('u.tgl_tanggapan', '=', Carbon::now()->format('Y-m-d'))
            ->get();

        return view('admin.pengaduan.cetakPengaduan', compact('cetakpengaduan', 'pengaduan'));
    }

    public function deletePengaduanAdmin($id)
    {
        Pengaduan::where('id_pengaduan', $id)->delete();

        Tanggapan::where('id_pengaduan', $id)->delete();

        return redirect()->route('pengaduan.index');
    }
}
