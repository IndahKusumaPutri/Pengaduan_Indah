<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing_page');
});


// //middleware 
// Route::group(['middleware' => ['auth', 'Ceklevel:masyarakat']], function () {
//     //
// });

Route::middleware(['auth', 'ceklevel:masyarakat'])->group(function () {
});

//login dan regis
Route::get('/register', 'AuthController@getregister')->name('register');
Route::post('/register', 'AuthController@postregister');
Route::get('/login', 'AuthController@getlogin')->name('login');
Route::post('/login', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout')->middleware('auth')->name('logout');

// route reset
Route::get('/password/reset', 'AuthController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'AuthController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'AuthController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'AuthController@reset')->name('password.update');



//index data masyarakat
Route::get('/masyarakat', 'MasyarakatController@indexDataMasyarakat')->name('masyarakat.index');
Route::get('/masyarakat/edit/{id}', 'MasyarakatController@editDataMasyarakat')->name('masyarakat.edit');
Route::post('/masyarakat/update/{id}', 'MasyarakatController@updateDataMasyarakat');
Route::get('/masyarakat/detail/{id}', 'MasyarakatController@detailDataMasyarakat');
Route::delete('/masyarakat/delete/{id}', 'MasyarakatController@deleteDataMasyarakat')->name('masyarakat.delete');

//petugas
Route::get('/petugas', 'PetugasController@indexDataPetugas')->name('petugas.index');
Route::get('/petugas/create', 'PetugasController@createDataPetugas')->name('petugas.create');
Route::post('/petugas/store', 'PetugasController@storeDataPetugas')->name('petugas.store');
Route::get('/petugas/edit/{id}', 'PetugasController@editDataPetugas')->name('petugas.edit');
Route::post('/petugas/update/{id}', 'PetugasController@updateDataPetugas');
Route::get('/petugas/detail/{id}', 'PetugasController@detailDataPetugas')->name('petugas.detail');
Route::delete('/petugas/delete/{id}', 'PetugasController@deleteDataPetugas')->name('petugas.delete');



Route::get('/profile', 'AdminController@profile')->name('profile.index'); //ke halaman profile
Route::get('/profile/edit/{id}', 'AdminController@editProfile')->name('profile.edit'); // ke halaman edit profile
Route::post('/profile/update/{id}', 'AdminController@updateProfile')->name('profile.update'); // route update profile


Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard'); //dashboard seluruh data


Route::get('/pengaduan', 'PengaduanAdminController@indexPengaduanAdmin')->name('pengaduan.index'); // data data pengaduan masyarakat
Route::get('/cetakpengaduan', 'PengaduanAdminController@cetakPengaduanAdmin')->name('cetak.pengaduan'); // cetak data pengaduan
Route::get('/pengaduan/show/{id_pengaduan}', 'PengaduanAdminController@detailPengaduanAdmin'); //detail data pengaduan 
Route::get('/pengaduan/status/{id_pengaduan}', 'PengaduanAdminController@statusPengaduan'); // route status
Route::get('/pengaduan/edit/{id_pengaduan}', 'PengaduanAdminController@editPengaduanAdmin'); //edit data pengaduan di halaman admin
Route::post('/pengaduan/update/{id_pengaduan}', 'PengaduanAdminController@updatePengaduanAdmin')->name('pengaduan.update'); // route pengaduan update
Route::get('/pengaduan/delete/{id_pengaduan}', 'PengaduanAdminController@deletePengaduanAdmin'); // button hapus nanti nya ada di opsi admin


Route::get('/tanggapan', 'TanggapanController@indexTanggapan')->name('tanggapan.index'); // data data tanggapan 
Route::get('/tanggapan/edit/{id_tanggapan}', 'TanggapanController@editTanggapan')->name('tanggapan.edit'); // route edit tanggapan kalo typo
Route::post('/tanggapan/update/{id_tanggapan}', 'TanggapanController@updateTanggapan')->name('pengaduan.update'); // route update tanggapan
Route::delete('/tanggapan/delete/{id_tanggapan}', 'TanggapanController@deleteTanggapan')->name('tanggapan.destroy'); // route hapus tanggapan


//indoregion untuk update profile admin + user
Route::post('getKota', 'IndoRegionController@getKota')->name('getKota');  //get kota
Route::post('getKecamatan', 'IndoRegionController@getKecamatan')->name('getKecamatan'); //get kecamaatan
Route::post('getKelurahan', 'IndoRegionController@getKelurahan')->name('getKelurahan');  //get kelurahan  





Route::get('/utama', 'MasyarakatController@utama')->name('utama');


Route::get('/history', 'PengaduanController@historyPengaduan')->name('history'); //index masyarakat =  history pengaduan


Route::get('/pengaduan/create', 'PengaduanController@formCreateMasyarakat')->name('form.pengaduan'); // form isi pengaduan untuk masyarakat
Route::post('/pengaduan/store', 'PengaduanController@storePengaduan')->name('pengaduan.store'); // simpan data pengaduan
Route::get('/detail/pengaduan/{id}', 'PengaduanController@detailPengaduanMasyarakat'); //detail data pengaduan di masyarakat


Route::get('/user-profile', 'MasyarakatController@userProfile')->name('user-profile'); // mengarah ke halaman profile
Route::get('/user-profile/edit', 'MasyarakatController@userEditProfile')->name('user-profile.edit'); // halaman edit profile
Route::post('/user-profile/update/{id}', 'MasyarakatController@updateProfile')->name('user-profile.update'); // route update





//Route back history

// Route::group(['middleware' => 'prevent-back-history'], function () {

//     Auth::routes();

//     Route::get('/home', 'MasyarakatController@home')->name('home')->middleware('auth');

// });
