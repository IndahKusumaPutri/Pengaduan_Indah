<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'user';
    
    // protected $primaryKey = 'nik';

    protected $fillable = [
        'nik',
        'name',
        'email',
        'password',
        'telp',
        'jenis_kel',
        'level',
        'alamat',
        'rt',
        'rw',
        'kode_pos',
        'province_id',
        'regency_id',
        'district_id',
        'village_id'
    ];
}
