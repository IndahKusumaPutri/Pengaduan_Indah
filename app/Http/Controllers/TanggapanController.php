<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Tanggapan;
use App\Models\Pengaduan;
use App\Models\User;

class TanggapanController extends Controller
{
    public function indexTanggapan()
    {
        $tanggapan = Tanggapan::all();

        $pengaduan = Pengaduan::all();

        $user = User::all();

        return view('admin.tanggapan.index', compact('user', 'tanggapan', 'pengaduan'));
    }

    public function editTanggapan($id)
    {
        $pengaduan = Pengaduan::all();

        $tanggapan = Tanggapan::where('id_tanggapan',$id)->first();

        return view('admin.tanggapan.edit', compact('tanggapan', 'pengaduan'));
    }

    public function updateTanggapan(Request $request, $id)
    {
        $message = ([
            'required'  => "Data tidak boleh kosong!"
        ]);

        $this->validate($request, [
            'tanggapan'    => 'required'
        ], $message);

        Tanggapan::where('id_tanggapan', $id)->update([
            'tanggapan'    => $request->tanggapan
        ]);

        Alert::success('Berhasil!', 'Data berhasil diubah!');

        return redirect()->route('tanggapan.index')->with('Data diedit', 'Data berhasil diedit');
    }

    public function deleteTanggapan($id)
    {
        Tanggapan::where('id_tanggapan', $id)->delete();

        Pengaduan::where('id_pengaduan', $id)->delete();

        return redirect()->route('tanggapan.index')->with('Data dihapus','Data berhasil dihapus');
    }
}
