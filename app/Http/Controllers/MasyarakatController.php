<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\User;


class MasyarakatController extends Controller
{

    public function utama()
    {
        return view('masyarakat.pengaduan.utama');
    }
    
    public function userProfile()
    {
        $user = Auth::user();
        
        $user_profile = User::where('id', $user->id)->get();

        // $province = Province::all();

        // $provinces = $user->province->name;

        return view('masyarakat.profile.user-profile', compact( 'user', 'user_profile'));
    }

    public function userEditProfile()
    {
        $user = Auth::user();

        $provinces = Province::all();

        return view('masyarakat.profile.edit-profile', compact('user', 'provinces'));
    }
    
    public function updateProfile(Request $request, $id)
    {
        // if ($request->hasFile('foto') == null) {
        //     $imgName = $request->user()->foto;
        // } else {

        //     $image_path = public_path("uploads/" . $user->foto);

        //     if (File::exists($image_path)) {
        //         File::delete($image_path);
        //     }

        //     $foto = $request->file('foto');
        //     $imgName = $foto->getClientOriginalName();
        //     $destinationPath = public_path('/uploads/');
        //     $foto->move($destinationPath, $imgName);
        // }

        // auth()->user::where('nik', $id)->update($request->all);

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

        return redirect()->route('user-profile')->with(['Success' => 'Profile berhasil diperbaharui!']);
    }

    public function indexDataMasyarakat()
    {
        $m = User::where('role', 'masyarakat')->get();

        // $m = User::whereNull('role')->get();

        return view('admin.masyarakat.index', compact('m'));
    }
    
    public function deleteDataMasyarakat($id)
    {
        User::where('id', $id)->delete();

        return redirect()->route('masyarakat.index');
    }

    Public function editDataMasyarakat($id)
    {
        $masyarakat = User::where('id', $id)->first();

        $provinces = Province::all();

        

        return view('admin.masyarakat.edit',compact('masyarakat','provinces'));
    }

    public function updateDataMasyarakat(Request $request, $id)
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

        return redirect()->route('masyarakat.index');
    }

    public function detailDataMasyarakat($id)
    {
        $masyarakat = User::where('id', $id)->first();

        $user = Auth::user();

        $indoregion = User::where('id', $user->id)->get();
        
        // $provinces = Province::all();
        // $regencies = Regency::all();
        // $district  = District::all();
        // $village   = Village::all();

        return view('admin.masyarakat.show', compact('indoregion','masyarakat'));
    }
    
}
