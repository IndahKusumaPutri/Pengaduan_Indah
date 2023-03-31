<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduans';
    protected $fillable = ['unique_id', 'tgl_pengaduan', 'nik', 'isi_laporan', 'status'];
    protected $primaryKey = 'id_pengaduan';

    public function details()
    {
        return $this->hasMany(Pengaduan::class, 'id_pengaduan', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nik', 'nik'); 
        // nik 1 untuk field di tbpengaduan,
        // nik 2 untuk field di tbuser.
    }

    public function tanggapan()
    {
        return $this->hasMany('App\Models\Tanggapan');
    }


    public function status()
    {
        return $this->belongsTo(Tanggapan::class, 'status_id', 'status');
    }
}
