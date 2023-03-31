<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pengaduan_Image;
use Laravel\Ui\Presets\React;
use Illuminate\Http\Request;
use App\Models\Tanggapan;
use App\Models\Pengaduan;
use App\Models\Regency;
use App\Models\User;
use Carbon\Carbon;

class PengaduanController extends Controller
{

    
    public function historyPengaduan()
    {
        $nik = Auth::user()->nik;

        $pengaduan =  Pengaduan::where('nik', $nik)->get();

        return view('masyarakat.history', compact('pengaduan'));
    }

    public function formCreateMasyarakat()
    {
        $tanggapan = Tanggapan::all();

        $pengaduan = Pengaduan::all();

        return view('masyarakat.pengaduan.create', compact('pengaduan', 'tanggapan'));
    }

    public function storePengaduan(Request $request)
    {
        $message = ([
            'required'  => "Data tidak boleh kosong!",
            'numeric'   => "Harus berupa angka",
            'unique'    => "Sudah ada yang bertugas",
            'mimes'     => "Format tidak tersedia"
        ]);

        $this->validate($request, [
            'isi_laporan'   => 'required',
            'foto.*'        => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000|required',
            'foto'          => 'required'
        ], $message);

        $nik = Auth::user()->nik;

        $uniqID = Carbon::now()->timestamp . uniqid();

        $data = new Pengaduan;
        $data->unique_id  = $uniqID;
        $data->tgl_pengaduan = Carbon::now()->format('Y-m-d');
        $data->nik = $nik;
        $data->isi_laporan = $request->isi_laporan;
        $data->status = '0';

        foreach ($request->foto as $key => $pimage) {
            $pimage = new Pengaduan_Image();
            $pimage->id_pengaduan = $uniqID; //foreign key di tb pengaduan images

            $imageName = Carbon::now()->timestamp . $key . '.' . $request->foto[$key]->extension();
            $request->foto[$key]->move(public_path("images"), $imageName);

            $pimage->foto = $imageName;
            $pimage->save();
        }

        $data->save();

        // Pengaduan::create($data); //bisa pake ini

        Alert::success('Berhasil', 'Pengaduan Berhasil Terkirim');

        return redirect()->route('history')->with('Data ditambah', 'Data berhasil ditambah');
    }


    public function detailPengaduanMasyarakat($id)
    {
        // $pengaduan = Pengaduan::with(['details', 'user'])->findOrFail($id);

        // $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();

        $user = User::all();

        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();

        $tanggapan = Tanggapan::where('id_pengaduan', $id)->first();

        $tanggapans = DB::table('tanggapans as T')
            ->select('T.*', 'P.*', 'U.name', 'U.email')
            ->join('pengaduans as P', 'T.id_pengaduan', '=', 'P.id_pengaduan')
            ->join('users as U', 'P.nik', '=', 'U.nik')
            ->where('P.id_pengaduan', '=', $id)
            ->first();

        return view('masyarakat.pengaduan.detail', compact('pengaduan', 'tanggapan', 'user', 'tanggapans'));
    }

    public function statusMasyarakat($id)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();

        $status_sekarang = $pengaduan->status;

        if ($status_sekarang == 1) {
            Pengaduan::where('id_pengaduan', $id)->update([
                'status' => 0
            ]);
        } elseif ($status_sekarang == 2) {
            Pengaduan::where('id_pengaduan', $id)->update([
                'status' => 1
            ]);
        } else {
            Pengaduan::where('id_pengaduan', $id)->update([
                'status' => 2
            ]);
        }

        return redirect()->route('pengaduan.index')->with('Data diubah', 'Data berhasil diubah!');
    }

    
}
