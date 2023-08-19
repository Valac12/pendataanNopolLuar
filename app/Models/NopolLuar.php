<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NopolLuar extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_polisi',
        'kd_plat',
        'samsat_asal',
        'asal_kendaraan',
        'alamat_sesuai_stnk',
        'tipe_kendaraan',
        'pemilik',
        'no_telp',
        'gambar',
        'id_user_pendataan',
        'nama_user',
        'tgl_pendataan',
        'status',
        'latitude',
        'longitude',
    ];
    public function kodePlat()
    {
        return $this->belongsTo(KodePlat::class, 'kd_plat');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'id_user_pendataan');
    }
}
