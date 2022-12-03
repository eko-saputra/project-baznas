<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Mustahik extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tb_mustahik';
    protected $primaryKey = 'mustahik_id';

    protected $fillable = [
        'no_kartu_kk',
        'nama_kepala_kk',
        'jumlah_keluarga_tanggungan',
        'pekerjaan',
        'no_hp',
        'jenis_kelamin',
        'nama_penerima',
        'nik_penerima',
        'kecamatan',
        'kelurahan',
        'alamat',
        'jenis_bantuan',
        'status_keputusan',
        'tanggal_pengajuan',
        'pertimbangan_saran',
        'dana_yang_disetujui',
        'kegunaan',
        'photo',
    ];
}
