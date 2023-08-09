<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodePlat extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_plat',
        'warna_plat'
    ];

    // public function nopolLuar()
    // {
    //     return $this->hasMany(NopolLuar::class);
    // }

}
