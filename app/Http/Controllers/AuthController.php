<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mail\ResetPassword;
use Illuminate\Support\Str;
use App\Models\Pengaduan;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{

    // REGISTRASI
    public function getregister()
    {
        return view('auth.register');
    }

    public function postregister(Request $request)
    {
        $message = ([
            'required'  => "Data tidak boleh kosong!",
            'numeric'   => "Harus berupa angka",
            'unique'    => "Email sudah digunakan",
            'email'     => "Harus menggunakan @",
            'min:5'     => "Minimal 5 Huruf"
        ]);

        $this->validate($request, [
            'nik'       => 'required|min:16',
            'name'      => 'required|min:5',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|confirmed',
        ], $message);

        $userId = User::create([
            'nik'       => $request->nik,
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ]);

        // if($request->hasFile('foto')) {
        //     $request->file('foto')->move('img/', $request->file('foto')->getClientOriginalName());
        //     $user->foto = $request->file('foto')->getClientOriginalName();
        //     $user->save();
        // }

        Auth::loginUsingId($userId);

        // Alert::success('Berhasil', 'Akun berhasil terdaftar');

        return redirect()->route('login')->withSuccess('Akun Anda berhasil terdaftar!!');
    }


    // LOGIN
    public function getlogin()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $input = $request->all();

        $role = DB::table('users')->where('role');

        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if (Auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password']))) {

            $role = Auth::user()->role;

            if ($role == 'admin' || $role == 'petugas') {
                Alert::success('Berhasil Masuk', 'Selamat datang di Dashboard !!');
                return redirect()->route('dashboard');
            } else {
                Alert::success('Berhasil Masuk', 'Selamat datang di Website Pengaduan !!');
                return redirect()->route('utama');
            }
        } else {
            Alert::error('Gagal Masuk', 'Email atau Password Anda salah !!');
            return redirect()->route('login');
        }

        // } elseif (auth::attempt(array($fieldType => $input['email']), $input['password'] == null)) {
        //     return redirect()->route('login')->with('error', 'Data tidak boleh kosong !!');

        // } else {
        //     Alert::error('Error', 'Email atau password anda salah !!');
        //     return redirect()->route('login');
        // }

    }


    // LOGOUT
    public function logout()
    {
        Auth::logout();
        Session::flush();
        
        return redirect()->route('login');
    }




    // Verif Email
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $verify = User::where('email', $request->all()['email'])->exists();

        if ($verify) {

            $verify2 = DB::table('password_resets')->where([
                ['email', $request->all()['email']]
            ]);

            if ($verify2->exists()) {
                $verify2->delete();
            }

            $token = Str::random(64);

            $password_reset = DB::table('password_resets')->insert([
                'email' => $request->all()['email'],
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            if ($password_reset) {
                Mail::to($request->all()['email'])->send(new ResetPassword(['token' => $token]));

                return redirect('login')
                    ->with('success', 'Silahkan cek alamat email Anda untuk mereset kata sandi Anda.');
            }
        } else {
            return back()->with('error', 'This email does not exits');
        }
    }

    public function showResetForm($token)
    {
        return view('emails.forget-password-email', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('login')->with('success', 'Your password has been changed!');
    }
}
