<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tanggapan;
use App\Models\Pengaduan;
use App\Models\Province;
use App\Models\User;


class AdminController extends Controller
{
    // Profile Admin
    public function profile()
    {
        $user = Auth::user();

        $profile = User::where('id', $user->id)->get();

        return view('admin.profile.admin-profile', compact('profile', 'user'));
    }

    public function editProfile($id)
    {
        $provinces = Province::all();

        // $user = User::where('id', Auth::user()->id)->first();

        $user = User::where('id', $id)->first();


        return view('admin.profile.edit-profile', compact('user', 'provinces'));
    }

    public function updateProfile(Request $request, $id)
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

        return redirect()->route('profile.index')->with(['Success' => 'Profile berhasil diperbaharui!']);
    }


    // dashboard admin
    public function dashboard()
    {
        $pengaduan  = Pengaduan::count();
        $tanggapan  = Tanggapan::count();
        $terkirim   = Pengaduan::where('status', '0')->count();
        $selesai    = Pengaduan::where('status', 'selesai')->count();
        $proses     = Pengaduan::where('status', 'proses')->count();
        $warga      = User::where('role', 'masyarakat')->count();
        $petugas    = User::where('role', 'petugas')->count();
        $admin      = User::where('role', 'admin')->count();
        $user       = User::count();
        return view('admin.dashboard', compact('pengaduan', 'tanggapan', 'terkirim', 'selesai', 'proses', 'warga', 'user','admin','petugas'));
    
    }
}
