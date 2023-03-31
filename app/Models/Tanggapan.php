<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapans';
    protected $fillable = ['id_pengaduan','tgl_tanggapan','tanggapan','nik'];

    public function pengaduan()
    {
        return $this->belongsTo('App\Models\Tanggapan', 'id_pengaduan', 'id_pengaduan');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'nik', 'nik');
    }
}
