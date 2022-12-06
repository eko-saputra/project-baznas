<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Penyalur extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tb_penyaluran';
    protected $primaryKey = 'penyalur_id';

    protected $fillable = [
        'user_id',
        'mustahik_id',
        'photo',
        'keterangan',
        'petugas_penyalur',
    ];
}
