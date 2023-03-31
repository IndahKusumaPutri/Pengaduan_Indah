<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Province;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;

class PetugasController extends Controller
{
    public function indexDataPetugas()
    {
        // $petugas = User::all();

        $petugas = User::where('role', 'petugas')->get();

        return view('admin.petugas.index', compact('petugas'));
    }

    public function createDataPetugas()
    {
        $provinces = Province::all();

        return view('admin.petugas.create', compact('provinces'));
    }

    public function storeDataPetugas(Request $request)
    {
        $message = [
            'nik.required' => 'NIK harus diisi.',
            'nik.numeric' => 'NIK harus berupa angka.',
            'nik.unique' => 'NIK sudah digunakan.',
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'password.required' => 'Password harus diisi.',
            'telp.required' => 'Nomor telepon harus diisi.'
        ];
        
        // $message = [
        //     'required'  => "Data tidak boleh kosong!",
        //     'numeric'   => "Harus berupa angka",
        //     'unique'    => "Data sudah terdaftar"
        // ];

        $this->validate($request,[
            'nik'               => 'required|numeric|unique:users,nik',
            'name'              => 'required',
            'email'             => 'required|email|unique:users,email',
            'password'          => 'required',
            'telp'              => 'required'
        ], $message);

        User::create([
            'nik'               => $request->nik,
            'name'              => $request->name,
            'email'             => $request->email,
            'password'          => bcrypt($request->password),
            'telp'              => $request->telp,
            'role'              => 'petugas',
            'jenkel'            => $request->jenkel
            // 'alamat'            => $request->alamat,
            // 'rt'                => $request->rt,
            // 'rw'                => $request->rw,
            // 'kode_pos'          => $request->kode_pos,
            // 'province_id'       => $request->province_id,
            // 'regency_id'        => $request->regency_id,
            // 'village_id'        => $request->village_id,
            // 'district_id'       => $request->district_id,
        ]);

        // dd($request);

        Alert::success('Berhasil!', 'Data Petugas Berhasil Tersimpan.');

        return redirect()->route('petugas.index')->with('Data ditambah', 'Data berhasil ditambah');
    
    }

    public function editDataPetugas($id)
    {
        $petugas = user::where('id', $id)->first();

        $provinces = Province::all();
        
        return view('admin.petugas.edit', compact('petugas', 'provinces'));
    }

    public function updateDataPetugas(Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'nik'               => $request->nik == null ? $user->nik : $request->nik,
            'name'              => $request->name == null ? $user->name : $request->name,
            'email'             => $request->email == null ? $user->email : $request->email,
            'password'          => $request->password == null ? $user->password : bcrypt($request->password),
            'jenkel'            => $request->jenkel == null ? $user->jenkel : $request->jenkel,
            'telp'              => $request->telp == null ? $user->telp : $request->telp,
            'role'              => $request->role == null ? $user->role :  $request->role,
            'alamat'            => $request->alamat == null ? $user->alamat : $request->alamat,
            'rt'                => $request->rt == null ? $user->rt : $request->rt,
            'rw'                => $request->rw == null ? $user->rw : $request->rw,
            'kode_pos'          => $request->kode_pos == null ? $user->kode_pos : $request->kode_pos,
            'province_id'       => $request->province_id == null ? $user->province_id : $request->province_id,
            'regency_id'        => $request->regency_id == null ? $user->regency_id : $request->regency_id,
            'village_id'        => $request->village_id == null ? $user->village_id : $request->village_id,
            'district_id'       => $request->district_id == null ? $user->district_id : $request->district_id,
            // 'foto'              => $imgName
        ]);

        Alert::success('Berhasil', 'Data berhasil diubah!');

        return redirect()->route('petugas.index');
    }

    public function detailDataPetugas($id)
    {
        $petugas = User::where('id', $id)->first();

        $user = Auth::user();

        $indoregion = User::where('id', $user->id)->get();
        
        // $provinces = Province::all();
        // $regencies = Regency::all();
        // $district  = District::all();
        // $village   = Village::all();

        return view('admin.petugas.show', compact('indoregion','petugas'));
    }

    public function detailPetugas($id)
    {
        // $user = User::all();

        // $pengaduan = Pengaduan::with(['details', 'user'])->findOrFail($id);

        // // $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();

        // $tanggapan = Tanggapan::where('id_pengaduan', $id)->first();

        // return view('admin.pengaduan.details', compact('pengaduan', 'tanggapan', 'user'));
    }

    public function deleteDataPetugas($id)
    {
        User::where('id', $id)->delete();

        Alert::success('Berhasil!', 'Data Berhasil Terhapus');
        return redirect()->route('petugas.index');
    }
    
}
